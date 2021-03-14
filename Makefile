install:
	composer install


validate:
	composer validate

run:
	./bin/brain-games

lint:
	composer phpcs

brain-games:
	./bin/brain-games

brain-even:
	./bin/brain-even

brain-calc:
	./bin/brain-calc

brain-gcd:
	./bin/brain-gcd
