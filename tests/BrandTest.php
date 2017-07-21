<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Brand.php";
    require_once 'src/Store.php';

    $server = 'mysql:host=localhost:8889;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class BrandTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Brand::deleteAll();
            Store::deleteAll();
        }

        function testGetBrandName()
        {
            // Arrange
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
            // Arrange
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
            // Arrange
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
            // Arrange
            $brand_name = "Nykeee";
            $price = 50;
            $test_brand = new Brand($brand_name,    $price);

            $new_price = 1;

            // Act
            $test_brand->setPrice($new_price);
            $result = $test_brand->getPrice();

            // Assert
            $this->assertEquals($new_price, $result);
        }

       function testGetId()
        {
            // Arrange
            $brand_name = "Nykeee";
            $price = 50;
            $test_brand = new Brand($brand_name, $price);
            $test_brand->save();

            // Act
            $result = $test_brand->getId();

            // Assert
            $this->assertTrue(is_numeric($result));
        }


        function testSave()
        {
            // Arrange
            $brand_name = "Nykeee";
            $price = 50;
            $test_brand = new Brand($brand_name, $price);
            $test_brand->save();

            // Act
            $executed = $test_brand->save();

            // Assert
            $this->assertTrue($executed, "Brand not successfully saved to database");
        }

        function testGetAll()
        {
            // Arrange
            $brand_name = "Nykeee";
            $price = 50;
            $test_brand = new Brand($brand_name, $price);
            $test_brand->save();

            $brand_name2 = "Oddidaws";
            $price2 = 100;
            $test_brand2 = new Brand($brand_name2, $price2);
            $test_brand2->save();

            // Act
            $result = Brand::getAll();

            // Assert
            $this->assertEquals([$test_brand, $test_brand2], $result);
        }

        function testDeleteAll()
        {
            // Arrange
            $brand_name = "Nykeee";
            $price = 50;
            $test_brand = new Brand($brand_name, $price);
            $test_brand->save();

            $brand_name2 = "Oddidaws";
            $price2 = 100;
            $test_brand2 = new Brand($brand_name2, $price2);
            $test_brand2->save();

            // Act
            Brand::deleteAll();
            $result = Brand::getAll();

            // Assert
            $this->assertEquals([], $result);
        }

        function testFind()
        {
            // Arrange
            $brand_name = 'Nykeee';
            $price = 50;
            $test_brand = new Brand($brand_name, $price);
            $test_brand->save();

            $brand_name2 = 'Oddidaws';
            $price2 = 60;
            $test_brand2 = new Brand($brand_name2, $price2);
            $test_brand2->save();

            // Act
            $result = Brand::find($test_brand->getId());

            // Assert
            $this->assertEquals($test_brand, $result);
        }

        function testAddStore()
        {
            $store_name = "Footsies";
            $test_store = new Store($store_name);
            $test_store->save();

            $brand_name = "Nykee";
            $price = 50;
            $test_brand = new Brand($brand_name, $price);
            $test_brand->save();

            $test_brand->addStore($test_store);

            $this->assertEquals($test_brand->getStores(), [$test_store]);
        }
      function testGetStores()
        {
            $store_name = "Footsies";
            $test_store = new Store($store_name);
            $test_store->save();

            $store_name2 = "Shoeville";
            $test_store2 = new Store($store_name2);
            $test_store2->save();

            $brand_name = "Nykeee";
            $price = 50;
            $test_brand = new Brand($brand_name, $price);
            $test_brand->save();

            $test_brand->addStore($test_store);
            $test_brand->addStore($test_store2);

            $this->assertEquals($test_brand->getStores(), [$test_store, $test_store2]);
        }
    }
?>
