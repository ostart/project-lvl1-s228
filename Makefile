#Makefile

install:
	composer install
	
test:
	composer run-script phpunit tests

lint:
	composer run-script phpcs -- --standard=PSR2 src tests

	

	
