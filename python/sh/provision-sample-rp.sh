#!/bin/sh

printf "\e[33m*** \e[32mProvisioning RP Maple Inc (https://www.maple.com/protect/) ... \e[33m***\e[0m\n"
curl -v -H 'Content-Type: application/json' \
  -X POST --data @overlays/iam-launchpad/src/main/webapp/WEB-INF/idp/credentials/oidc-idp-protect-provision.json \
  http://localhost:8080/platform/oidc/api/clients

printf "\e[33m*** \e[32mWhitelisting RP Maple Inc (https://www.maple.com/protect/) ... \e[33m***\e[0m\n"
curl -v -H 'Content-Type: application/json' \
  -X POST --data @overlays/iam-launchpad/src/main/webapp/WEB-INF/idp/credentials/oidc-idp-protect-whitelist.json \
  http://localhost:8080/platform/oidc/api/whitelist