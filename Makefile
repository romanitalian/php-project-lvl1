install:
	composer install

reinstall:
	 chmod +x bin/brain-* && rm -rf ./vendor && make install

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

brain-progression:
	./bin/brain-progression

brain-prime:
	./bin/brain-prime
