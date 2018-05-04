#!/bin/bash
set -e
#reading input args or defaults
liquibase_dropFirst=${1:-false}
log_level=${2:-severe}

script_dir=$(dirname $0)
pushd $script_dir

script_dir=$(cd ../..;pwd -P)
printf "Script directory" "$script_dir"

printf "\e[33m*** \e[32m Getting DB artifacts version... \e[33m***\e[0m\n"

mint_product_db_version=$(mvn -f "$script_dir" -q -Dexec.executable='echo' -Dexec.args='${com.uxpsystems.mint.db.schemas.version}' --non-recursive exec:exec)

#Getting deployment dir
mvn_project_build_dir=$(mvn -f "$script_dir"/deployment/pom.xml -q -Dexec.executable='echo' -Dexec.args='${project.build.directory}' --non-recursive exec:exec)
liquibase_dir=$script_dir/deployment/mint-platform-database-migration-$mint_product_db_version

changeLogFile=$liquibase_dir/migrations/changelog.xml
db_username=adminuser
db_password=uxp4life
db_port=1521
db_service_name=XE
db_host=oracledb
db_url=jdbc:oracle:thin:@$db_host:$db_port/$db_service_name
default_schema_name=mint_platform
liquibase_classpath_dir=lib

#function to drop objects
dropAll (){
	$liquibase_dir/liquibase.sh \
	--driver="oracle.jdbc.driver.OracleDriver" \
	--url="${db_url}" \
	--username="${db_username}" \
	--password="${db_password}" \
	--defaultSchemaName=$1 \
	--changeLogFile=${changeLogFile} \
	--logLevel=$log_level \
	dropAll

}

is_oracle_ready() {
    oracle_status="$(echo -e "select status, database_status from v\$instance;" | docker run --rm -i -e URL=$db_username/$db_password@//$db_host:$db_port/$db_service_name sflyr/sqlplus)"
    connected_str=$(echo $oracle_status | grep -o "ACTIVE")
    echo $([ "$connected_str" == "ACTIVE" ] && echo "true" || echo "false")
}

#Retries WAIT_LOOPS times for WAIT_SLEEP seconds
i=0
WAIT_LOOPS=6
WAIT_SLEEP=5
printf "\e[33m*** \e[32m Checking if DB is ready... \e[33m***\e[0m\n"
while ! $(is_oracle_ready); do
    i=`expr $i + 1`
    if [ $i -ge $WAIT_LOOPS ]; then
        printf "DB at [%s:%s/%s] is NOT running\n" "$db_host" "$db_port" "$db_service_name"
        exit 1
    fi
    printf "DB at [%s:%s/%s] is NOT ready, waiting %s secs to retry...\n" "$db_host" "$db_port" "$db_service_name" "$WAIT_SLEEP"
    sleep $WAIT_SLEEP
done

pushd $liquibase_dir
chmod 755 *.sh
if [ "$liquibase_dropFirst" = "true" ]; then
    printf "\e[33m*** \e[32m Dropping all DB objects... \e[33m***\e[0m\n"
    dropAll "mint_platform"
    dropAll "mint_application_batch"
    dropAll "mint_application_quartz"
fi

#executing changelogs
printf "\e[33m*** \e[32m Creating all DB objects... \e[33m***\e[0m\n"
$liquibase_dir/liquibase.sh \
--driver="oracle.jdbc.driver.OracleDriver" \
--url="${db_url}" \
--username="${db_username}" \
--password="${db_password}" \
--logLevel=$log_level \
--defaultSchemaName=${default_schema_name} \
--changeLogFile=${changeLogFile} \
update
popd
popd
