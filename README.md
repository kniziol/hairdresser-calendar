# Hairdresser Calendar

---

# Installation

Run commands:

1. Start Docker containers
    ```shell
    docker-compose up -d
    ```
2. Install Composer packages
    ```shell
    docker-compose run --rm composer install
    ```

# Tests running

### PHPUnit

```shell
docker-compose exec php bin/phpunit
```

# Code analyzing

### Infection (mutation testing)

```shell
docker-compose exec php vendor/bin/infection --ansi --threads=5 --coverage=build/reports/infection
```

### PHPStan

```shell
docker-compose exec php vendor/bin/phpstan analyse --ansi
```
