# Hairdresser Calendar

# Installation

Run commands:

1. `docker-compose up -d`
2. `docker-compose run --rm composer install`

# Tests running

### PHPUnit

```bash
docker-compose exec php bin/phpunit
```

# Code analyzing

### Infection (mutation testing)

```bash
docker-compose exec php vendor/bin/infection --ansi --threads=5 --coverage=build/reports/infection
```

### PHPStan

```bash
docker-compose exec php vendor/bin/phpstan analyse --ansi
```
