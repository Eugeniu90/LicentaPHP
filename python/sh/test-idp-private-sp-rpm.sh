#!/bin/sh

# Install IdP metadata file
docker exec -u uxp idp-proxy \
  /bin/bash -c "curl -kv -o  uxp/apps/proxy/shibboleth/etc/idp-metadata.xml \
    https://www.maple.com/saml/idp/metadata"

# restart all services
docker exec idp-proxy \
  /bin/bash -c "service shibd start && service supervisord start"

if [[ $ARG = "base" ]];
  then
  docker exec idp-proxy \
    /bin/bash -c "service nginx restart"
else
  # signal nginx to reload configuration
  docker kill -s HUP idp-proxy
fi

# Install SP metadata file on IdP (tomcat-platform)
docker exec -u uxp tomcat-platform \
  /bin/bash -c "curl -kv -o  uxp/config/tomcat-platform/idp/metadata/idp-private-metadata.xml \
    https://www.maple.com/private/sso/metadata"

# provision IdP protect RP on the IdP (tomcat-platform)
docker exec -u uxp tomcat-platform \
  /bin/bash -c "curl -v -H 'Content-Type: application/json' -X POST --data @ uxp/config/tomcat-platform/idp/credentials/oidc-idp-protect-provision.json http://localhost:8080/platform/oidc/api/clients"

# whitelisting IdP protect RP on the IdP (tomcat-platform)
docker exec -u uxp tomcat-platform \
  /bin/bash -c "curl -v -H 'Content-Type: application/json' -X POST --data @ uxp/config/tomcat-platform/idp/credentials/oidc-idp-protect-whitelist.json http://localhost:8080/platform/oidc/api/whitelist"

echo "completed."
echo