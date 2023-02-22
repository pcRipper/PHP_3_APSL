# Prerequisites

* git
* docker
* docker-compose

# Launching

1. clone/fork & clone this repository.
2. enter `docker` directory:
```bash
cd docker
```
3. be sure docker is running and port 80 is free.
4. start docker containers:
```bash
docker-compose up -d
```

If you want to rebuild your environment, launch:
```bash
docker-compose build --pull
```

If you want to stop your environment, launch:
```bash
docker-compose down
```

# First run
Start docker containers:
```bash
docker-compose up -d
```
Run bash in PHP container:
```bash
docker-compose exec php bash
```
Install composer.phar
```bash
curl -s https://getcomposer.org/installer | php
```
Install composer dependencies and generate autoloads:
```bash
./composer.phar install
```
