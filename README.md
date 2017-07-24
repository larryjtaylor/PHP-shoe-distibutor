# _Shoe Distribution_

#### _PHP Solo Project for Epicodus, 7.21.2017_

#### By _**Larry Taylor**_

## Description

_This PHP project allows a user to add shoe stores to a database, as well as adding new shoe brands. They can then see a list of all available stores and brands. They can see which brands are available at a given store, and the can see which stores carry a given brand._

## Setup Requirements

This project requires the installation of [MAMP](https://www.mamp.info/en/), [Composer](https://getcomposer.org/), and [PHP](https://secure.php.net/).

* Find repo in browser by typing https://github.com/larryjtaylor/PHP-shoe-distributor
* Select the dropdown (green box) "Clone or download"
* Copy the link for the GitHub repository
* Open Terminal on your computer
* In Terminal, perform the following steps:
  * type 'cd desktop' and press enter
  * type 'git clone', copy the repository link and press enter
  * type 'cd PHP-shoe_distributor' to access the path on your computer
  * type 'composer install' in terminal to download required dependencies
* In browser, type 'localhost:8888/phpmyadmin' to access Apache and databases
  * Click 'import' tab and choose file 'shoes.sql' to import database to your computer
* In MAMP, perform the following steps:
    * Open preferences>ports and verify that Apache Port is 8888
    * Go to preferences>web server and click the file folder next to document root
  * Select the PHP-shoe_distributor directory
  * Select the web folder inside the directory
  * Click OK at the bottom of preferences and then click 'Start Servers'
* In your browser, enter 'localhost:8888' to access the web app
* Type a Brand name in the input field to get started!

## Specifications
* The program will maintain a list of inputted show brands and prices.
    * Input: Reebike
             50
    * Display: Reebike - $50.00

* The program will maintain a list of inputted shoe stores.
    * Input: Shoeville
    * Display: Shoeville

* The program will allow the user to delete all shoe brands.
    * Input: <press delete button>
    * Display: <delete all brands and return to home screen>

* The program will allow the user to delete all shoe stores.
    * Input: <press delete button>
    * Display: <delete all stores and return to home screen>

* The program will allow the user to edit a shoe store.
    * Input: Footsies
    * Display: Footsies, Inc.

* The program will allow a user to see which shoe brands are available at a store.
    * Input: Shoeville
    * Display: Reebike - $50.00
               Nykeee - $65.35
               Oddidaws - $120.99

* The program will allow a user to see which shoe stores carry a  given brand.
    * Input: Reebike
    * Display: Shoeville
               Footsies, Inc.

* The program will return all store names and brand names as capitalized, however it is input.
    * Input: reeBIKE
    * Display: Reebike

* The program will display the brand price as currency, however it is input.
    * Input: 35
    * Display: $35.00

## Technologies Used

PHP, HTML, Bootstrap CSS, Silex, Twig, Composer, MAMP, PHPUnit, MySQL, phpMyAdmin

### License

Copyright &copy; 2017 Larry Taylor

This software is licensed under the MIT license.
