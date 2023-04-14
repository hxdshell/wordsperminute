<h1 align="center"><b>WORDSPERMINUTE</b><h1>

### Table of contents
- [About](#about)
- [How it works](#how-it-works)
- [Features](#features)
- [Technology used](#technology-used)
    - [How to run](#how-to-run)
    - [Project Structure](#project-structure)
- [Author](#author)

## About

*wordsperminute* tests and improves your typing speed.

Test your speed quickly without any account. However having an account provides more functionalities. You can even show your friends how swift you are with your keyboard.Compete with Keyboard Gladiators all over the world. You can check your current rank on the leaderboard page and some statistics about the tests on your profile. Result contains speed,accuracy, real accuracy and incorrect words that you can work upon.

## How It Works
The test will be of 60 seconds. In the 60 seconds you have to type as fast and as accurate as you can. A paragraph with random words will be generated from a dictionary-common.txt file.

As the test starts (just type in the input box to start the test) a word will be highlighted and as you type, a script will check if the current letter is correct or not. if it is incorrect the word will turn to red. Green word indicates that the word is typed correctly.

After 60 seconds the test will automatically end and the result will be shown in the result page. It will show your wpm and accuracy as well real accuracy and incorrect words that you can work upon. In the next test try to beat your own highscore.

If you want to save your progress and compete with other keyboard gladiators, you can create and account.Registration and login process is secure. After registering you can check your progress by data like highest wpm and avg wpm. You can also see the score of last 10 tests. You can also see the Best scores in the leaderboard section and set some new goals for yourself.
## Features
- secure registration and authentication
- smooth typing environment
- real-time feedback on errors(typos)
- accurate results
- secure database
## Technology used
The Project is made using [Laravel](https://laravel.com/), a PHP frameowrk.

It follows MVC architecture, therefore makes code more maintainable and scalable. It provides many built in functionalites such as authentication,validation, ORM for database etc.

Database: [MySQL](https://www.mysql.com/)
### How to run
**Requirements**
- PHP
- MySQL
- Laravel

**Setup**
1. Clone the project
2. navigate to project's root directory and and execute following command composer install 

``` 
composer install 
```
3. edit the ```.env``` file to set the configuration of the project based on your requirements like app configurations and database configurations

4. Generate the application key using following command

```
php artisan key:generate
```

5. Create a database and set the name of the database in ```.env``` file as mentioned above and then run the following command to import the tables

```
php aritsan migrate
```
this does not provide dummy data. Instead you can also import the ```wordperminute.sql``` sql file provided in the root directory.

### Project Structure

**Controllers**

```app/Http/Controllers```
- Paragraph.php : For Tests and Results
- User.php : For users

**Modles**

```app/Models```
- Test.php : for tests table
- User.php : for users table

**Migrations**

```databse/migrations```

- 2014_10_12_000000_create_users_table.php : for users table
- 2023_03_31_105809_create_tests_table.php : for tests table

**CSS & JS**

```public/css```
main.css

```public/js```
- main.js
- result.js

**Storage**
```public/storage```
- dictionary-common.txt : to generate paragraph of random words

**Views**

```resources/views``` contains all the blade templates .
```resources/views/components``` contains the layout template.

**Routes**

```routes/web.php``` contains all the routes.

**Configure**

Change environments settings in ```.env``` file

Change settings like timezone in ```config/app.php```

you can also find ```wordsperminute.sql``` file in the root directory to import all the tables.

## Author

***Harshal Dave***

- [Linkedin](https://www.linkedin.com/in/harshal-dave-63b7a5236/)
- [Twitter](https://twitter.com/heyharshal_)
