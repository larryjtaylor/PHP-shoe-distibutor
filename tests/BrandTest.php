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
            $brand_name = "JK Rowling";
            $test_brand = new Brand($brand_name);

            // Act
            $result = $test_brand->getBrandName();

            // Assert
            $this->assertEquals($brand_name, $result);
        }
        function testSetBrandName()
        {
            // Assert
            $brand_name = "JK Rowling";
            $test_brand = new Brand($brand_name);

            $new_brand_name = "Sugar Ray";

            // Act
            $test_brand->setBrandName($new_brand_name);
            $result = $test_brand->getBrandName();

            // Assert
            $this->assertEquals($new_brand_name, $result);
        }
    }
?>
