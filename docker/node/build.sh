#!/usr/bin/env sh

npm install

npm run prod

# Leave container running for development
while true; do sleep 1; done
