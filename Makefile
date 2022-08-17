#!/bin/bash

APP = zertegi
VERSION := $(shell cat ./VERSION)
USER_ID = $(shell id -u)
GROUP_ID= $(shell id -g)
user==www-data

help:
	@echo 'usage: make [target]'
	@echo
	@echo 'targets'
	@egrep '^(.+)\:\ ##\ (.+)' ${MAKEFILE_LIST} | column -t -c 2 -s ":#"

build: ## build
	docker compose --env-file .env.local build

build-force:## build-force
	docker compose --env-file .env.local build --force-rm --no-cache

restart:##restart
	$(MAKE) stop && $(MAKE) run

run:
	docker compose --env-file .env.local up -d

stop:
	docker compose down

ssh:
	docker compose exec app zsh

