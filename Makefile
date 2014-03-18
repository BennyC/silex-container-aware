default: codesniff test

test:
	./vendor/bin/phpunit -d date.timezone=UTC

codesniff:
	./vendor/bin/phpcs --standard=PSR2 --ignore=vendor --report=full .
