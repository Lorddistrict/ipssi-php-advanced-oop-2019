# Created : 17.07.2019
# Source author : Cyrille Grandval
# Edited by Etienne Crespi

DC=docker-compose
HAS_DOCKER:=$(shell command -v $(DC) 2> /dev/null)

ifdef HAS_DOCKER
	ifdef PHP_ENV
		EXECROOT=$(DC) exec -e PHP_ENV=$(PHP_ENV) php_88
		EXEC=$(DC) exec -e PHP_ENV=$(PHP_ENV) php_88
	else
		EXECROOT=$(DC) exec php_88
		EXEC=$(DC) exec php_88
	endif
else
	EXECROOT=
	EXEC=
endif

.DEFAULT_GOAL := help

.PHONY: help ## Generate list of targets with descriptions
help:
		@grep '##' Makefile \
		| grep -v 'grep\|sed' \
		| sed 's/^\.PHONY: \(.*\) ##[\s|\S]*\(.*\)/\1:\t\2/' \
		| sed 's/\(^##\)//' \
		| sed 's/\(##\)/\t/' \
		| expand -t14

##
## Project setup & day to day shortcuts
##---------------------------------------------------------------------------

.PHONY: start ## Start the project (Install in first place)
start: docker-compose.override.yml
	$(DC) pull || true
	$(DC) build
	$(DC) up -d

.PHONY: stop ## stop the project
stop:
	$(DC) down

.PHONY: exec ## Run bash in the php container
exec:
	$(EXEC) /bin/bash

##
## Replace local files with your own configuration
##---------------------------------------------------------------------------

docker-compose.override.yml: docker-compose.override.yml.dist
	$(RUN) cp docker-compose.override.yml.dist docker-compose.override.yml