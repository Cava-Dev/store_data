# Read json file and Populate 

A small End-Point to read an Input Json file and save its content within a Database;

## Installation

```bash
composer require symfony/orm-pack

php bin/console doctrine:database:create

php bin/console doctrine:migrations:migrate                                     
```

## Usage

Call a /storeData to start;