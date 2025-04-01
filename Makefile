.PHONY : main build-image build-container start test shell stop clean
main: build-image build-container

build-image:
	docker build -t kata-php .

build-container:
	docker run -dt --name kata-php -v .:/540/Boilerplate kata-php
	docker exec kata-php composer install

start:
	docker start kata-php

test: start
	docker exec kata-php ./vendor/bin/phpunit tests/$(target)

shell: start
	docker exec -it kata-php /bin/bash

stop:
	docker stop kata-php

clean: stop
	docker rm kata-php
	rm -rf vendor
