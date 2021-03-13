install:
	composer install

brain-games:
	./bin/brain-games

brain-even:
	./bin/brain-even

validate:
	composer validate

run:
	./bin/brain-games

lint:
	composer phpcs