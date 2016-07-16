# Makefile for Sphinx documentation

.PHONY: help
help:
	@echo "Please use \`make <target>' where <target> is one of"
	@echo " Generation: "
	@echo "     install"
	@echo "     clean"
	@echo "     test"

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

.PHONY: test
test:
	./flow import:importfiles Packages/Application/CodeMonitoring.Framework/Resources/Private/Example/checkstyle-psr2.xml
