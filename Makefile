install:
	composer install

brain-games:
	./bin/brain-games

validate:
	composer validate

run:
	./bin/brain-games

lint:
	composer phpcs