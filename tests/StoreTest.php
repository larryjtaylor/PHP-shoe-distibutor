<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */
    require_once "src/Store.php";

    $server = 'mysql:host=localhost:8889;dbname=shoes';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StoreTest extends PHPUnit_Framework_TestCase
    {
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

        function testSetTitle()
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
    }
?>
