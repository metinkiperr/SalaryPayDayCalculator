## SalaryPayDayCalculator


This application is about creating a command-line utility for determining salary payment dates.


## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

## Prerequisities

Docker has to be preinstalled before set up this project.

## Installing

After Docker installed , please run 

```
docker-compose up 
```

For testing please open a new terminal window and run 
```
docker-compose exec salarycalculator php artisan
```

## Commands
The command is at app/Console/Commands/SalaryCalculator.php. You can run that command like this after open a new terminal for that project.


```
docker-compose exec salarycalculator php artisan payroll:export
```

And our file(file.csv) will be created at the storage/csv folder.

For unit tests please run 

```
docker-compose exec salarycalculator  php vendor/bin/phpunit 
```
