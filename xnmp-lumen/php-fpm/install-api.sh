#!/bin/bash

composer create-project --prefer-dist laravel/lumen api
cp -R ./api/. ./lumen
rm -fr ./api
rm -f ./lumen/README.md