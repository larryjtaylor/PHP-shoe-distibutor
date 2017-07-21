<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Store.php";
    require_once "src/Brand.php";

    $server = 'mysql:host=localhost:8889;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StoreTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Store::deleteAll();
            Brand::deleteAll();
        }
        function testGetStoreName()
        {
            // Arrange
            $store_name = 'Footsies';
            $test_store = new Store($store_name);
            // Act
            $result = $test_store->getStoreName();
            // Assert
            $this->assertEquals($store_name, $result);
        }

        function testSetStoreName()
       {
           // Arrange
           $store_name = 'Footsies';
           $test_store = new Store($store_name);
           $new_store_name = 'Shoeville';
           // Act
           $test_store->setStoreName($new_store_name);
           $result = $test_store->getStoreName();
           // Assert
           $this->assertEquals($new_store_name, $result);
        }

        function testGetId()
        {
            // Arrange
            $store_name = 'Footsies';
            $test_store = new Store($store_name);
            $test_store->save();

            // Act
            $result = $test_store->getId();

            // Assert
            $this->assertTrue(is_numeric($result));
        }

        function testSave()
        {
            //Arrange
            $store_name = "Footsies";
            $test_store= new Store($store_name);
            //Act
            $executed = $test_store->save();
            // Assert
            $this->assertTrue($executed, "Store not successfully saved to database");
        }

        function testGetAll()
        {
            // Arrange
            $store_name = 'Footsies';
            $test_store = new Store($store_name);
            $test_store->save();

            $store_name2 = 'Shoeville';
            $test_store2 = new Store($store_name2);
            $test_store2->save();

            // Act
            $result = Store::getAll();

            // Assert
            $this->assertEquals([$test_store, $test_store2], $result);
        }

        function testDeleteAll()
        {
            // Arrange
            $store_name = 'Footsies';
            $test_store = new Store($store_name);
            $test_store->save();

            $store_name2 = 'Shoeville';
            $test_store2 = new Store($store_name2);
            $test_store2->save();

            // Act
            Store::deleteAll();
            $result = Store::getAll();

            // Assert
            $this->assertEquals([], $result);
        }

        function testFind()
        {
            // Arrange
            $store_name = 'Footsies';
            $test_store = new Store($store_name);
            $test_store->save();

            $store_name2 = 'Shoeville';
            $test_store2 = new Store($store_name2);
            $test_store2->save();

            // Act
            $result = Store::find($test_store->getId());

            // Assert
            $this->assertEquals($test_store, $result);
        }


        function testUpdate()
        {
            // Arrange
            $store_name = 'Footsies';
            $test_store = new Store($store_name);
            $test_store->save();

            $new_store_name = 'Shoeville';

            // Act
            $test_store->update($new_store_name);

            // Assert
            $this->assertEquals('Shoeville', $test_store->getStoreName());
        }

        function testDelete()
        {
            // Arrange
            $store_name = 'Footsies';
            $test_store = new Store($store_name);
            $test_store->save();

            $store_name_2 = 'Shoeville';
            $test_store_2 = new Store($store_name_2);
            $test_store_2->save();

            // Act
            $test_store->delete();

            // Assert
            $this->assertEquals([$test_store_2], Store::getAll());
        }

        function testAddBrand()
        {
            //Arrange
            $brand_name = "Nykeee";
            $price = 50;
            $test_brand = new brand($brand_name, $price);
            $test_brand->save();

            $store_name = "Footsies";
            $test_store = new Store($store_name);
            $test_store->save();

            //Act
            $test_store->addBrand($test_brand);

            //Assert
            $this->assertEquals($test_store->getBrands(), [$test_brand]);
        }

        function testGetBrands()
        {
            //Arrange
            $brand_name = "Nykeee";
            $price = 50;
            $test_brand = new Brand($brand_name, $price);
            $test_brand->save();

            $brand_name2 = "Oddidaws";
            $price2 = 60;
            $test_brand2 = new Brand($brand_name2, $price2);
            $test_brand2->save();

            $store_name = "Footsies";
            $test_store = new Store($store_name);
            $test_store->save();

            //Act
            $test_store->addBrand($test_brand);
            $test_store->addBrand($test_brand2);

            //Assert
            $this->assertEquals($test_store->getBrands(), [$test_brand, $test_brand2]);
        }
    }
?>
