#!/bin/bash

docker run -it --rm --name my-running-script -v "$PWD":/usr/src/myapp -w /usr/src/myapp composer:lts composer install

docker run -it --rm --name my-running-script -v "$PWD":/usr/src/myapp -w /usr/src/myapp php:8.1-alpine php index.php