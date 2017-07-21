<?php

    class Store
    {
        private $store_name;
        private $id;

        function __construct($store_name, $id = null)
        {
            $this->store_name = $store_name;
            $this->id = $id;
        }

        function getStoreName()
        {
            return $this->store_name;
        }

        function setStoreName($new_store_name)
        {
            $this->store_name = (string) $new_store_name;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $executed = $GLOBALS['DB']->exec("INSERT INTO stores (store_name) VALUES ('{$this->getStoreName()}');");
            if ($executed) {
                $this->id = $GLOBALS['DB']->lastInsertId();
                return true;
            } else {
                return false;
            }
        }

        static function getAll()
        {
            $returned_stores = $GLOBALS['DB']->query("SELECT * FROM stores;");
            $stores = array();
            foreach ($returned_stores as $store) {
                $store_name = $store['store_name'];
                $id = $store['id'];
                $new_store = new Store($store_name, $id);
                array_push($stores, $new_store);
            }
            return $stores;
        }
        static function deleteAll()
        {
            $executed = $GLOBALS['DB']->exec("DELETE FROM stores;");
            if ($executed) {
                return true;
            } else {
                return false;
            }
        }

        static function find($search_id)
       {
           $found_store = null;
           $returned_stores = $GLOBALS['DB']->prepare("SELECT * FROM stores WHERE id = :id");
           $returned_stores->bindParam(':id', $search_id, PDO::PARAM_STR);
           $returned_stores->execute();
           foreach($returned_stores as $store) {
               $store_name = $store['store_name'];
               $id = $store['id'];
               if ($id == $search_id) {
                   $found_store = new Store($store_name, $id);
               }
           }
           return $found_store;
       }

       function update($new_store_name)
        {
            $executed = $GLOBALS['DB']->exec("UPDATE stores SET store_name = '{$new_store_name}' WHERE id = {$this->getId()};");
            if ($executed) {
                $this->setStoreName($new_store_name);
                return true;
            } else {
                return false;
            }
        }

        function delete()
        {
            $executed = $GLOBALS['DB']->exec("DELETE FROM stores WHERE id = {$this->getId()};");
            if ($executed){
                return true;
            } else {
                return false;
            }
        }

        function addBrand($brand)
        {
            $executed = $GLOBALS['DB']->exec("INSERT INTO brands_stores (store_id, brand_id) VALUES ({$this->getId()}, {$brand->getId()});");
            if ($executed) {
                return true;
            } else {
                return false;
            }
        }

        function getBrands()
        {
            $returned_brands = $GLOBALS['DB']->query("SELECT brands.* FROM stores JOIN brands_stores ON (brands_stores.store_id = stores.id) JOIN brands ON (brands.id = brands_stores.brand_id) WHERE stores.id = {$this->getId()};");
            $brands = array();
            foreach($returned_brands as $brand) {
                $brand_name = $brand['brand_name'];
                $price = $brand['price'];
                $id = $brand['id'];
                $new_brand = new Brand($brand_name, $price, $id);
                array_push($brands, $new_brand);
            }
            return $brands;
        }
    }
?>
