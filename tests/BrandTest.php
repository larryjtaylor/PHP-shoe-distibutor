<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Brand.php";

    $server = 'mysql:host=localhost:8889;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class BrandTest extends PHPUnit_Framework_TestCase
    {
        function testGetBrandName()
        {
            // Assert
            $brand_name = "Nykeee";
            $price = 50;
            $test_brand = new Brand($brand_name, $price);

            // Act
            $result = $test_brand->getBrandName();

            // Assert
            $this->assertEquals($brand_name, $result);
        }
        function testSetBrandName()
        {
            // Assert
            $brand_name = "Nykeee";
            $price = 50;
            $test_brand = new Brand($brand_name, $price);

            $new_brand_name = "Oddidaws";

            // Act
            $test_brand->setBrandName($new_brand_name);
            $result = $test_brand->getBrandName();

            // Assert
            $this->assertEquals($new_brand_name, $result);
        }


        function testGetPrice()
        {
            // Assert
            $brand_name = "Nykeee";
            $price = 50;
            $test_brand = new Brand($brand_name, $price);

            // Act
            $result = $test_brand->getPrice();

            // Assert
            $this->assertEquals($price, $result);
        }

        function testSetPrice()
       {
           // Assert
           $brand_name = "Blowfish";
           $price = 50;
           $test_brand = new Brand($brand_name, $price);

           $new_price = 1;

           // Act
           $test_brand->setPrice($new_price);
           $result = $test_brand->getPrice();

           // Assert
           $this->assertEquals($new_price, $result);
       }
    }
?>
