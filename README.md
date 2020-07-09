# Read json file and Populate Database

A small End-Point to read an Input Json file and save its content within a Database;

## Installation

Rename the .env.example in .env;

```bash
composer require symfony/orm-pack

php bin/console doctrine:database:create

php bin/console doctrine:migrations:migrate                                     
```

## Usage

Call a /storeData to start;
