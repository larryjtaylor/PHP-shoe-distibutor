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
    }
?>
