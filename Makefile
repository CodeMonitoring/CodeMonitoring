# Makefile to ease development

.PHONY: help
help:
	@echo "Please use \`make <target>' where <target> is one of"
	@echo " Generation: "
	@echo "     install Setup the project (todo: not complete yet)"
	@echo "     clean   Clear caches"
	@echo "     test    Test import with some provided examples"

.PHONY: install
install:
	composer update
	./flow doctrine:migrate

.PHONY: clean
clean:
	./flow flow:cache:flush
	./flow cache:warmup

.PHONY: generate
generate:
	phpcs --standard=PSR2 --report-checkstyle=Packages/Application/CodeMonitoring.Framework/Resources/Private/Example/checkstyle-psr2.xml  Packages/Application/CodeMonitoring.Framework/Classes

.PHOHNY: classdiagram
classdiagram:
	plantumlwriter write Packages/Application/CodeMonitoring.* > classdiagram.tmp \
	&& plantuml -config Packages/Application/CodeMonitoring.Framework/Documentation/plantuml.cfg classdiagram.tmp \
	&& rm classdiagram.tmp \
	&& open -a Google\ Chrome\ Canary classdiagram.svg

.PHONY: test
test:
	./flow import:importfiles Packages/Application/CodeMonitoring.Framework/Resources/Private/Example/checkstyle-psr2.xml
