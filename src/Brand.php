<?php
    class Brand
    {
        private $brand_name;
        private $price;
        private $id;

        function __construct($brand_name, $price, $id = null)
        {
            $this->brand_name = $brand_name;
            $this->price = $price;
            $this->id = $id;
        }

        function getBrandName()
        {
            return $this->brand_name;
        }

        function setBrandName($new_brand_name)
        {
            $this->brand_name = (string) $new_brand_name;
        }

        function getPrice()
        {
            return $this->price;
        }

        function setPrice($new_price)
        {
            $this->price = (float) $new_price;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $executed = $GLOBALS['DB']->exec("INSERT INTO brands (brand_name, price) VALUES ('{$this->getBrandName()}', {$this->getPrice()});");

            if ($executed) {
                $this->id = $GLOBALS['DB']->lastInsertId();
                return true;
            } else {
                return false;
            }
        }

        static function getAll()
        {
            $returned_brands = $GLOBALS['DB']->query("SELECT * FROM brands;");
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

        static function deleteAll()
        {
            $executed = $GLOBALS['DB']->exec("DELETE FROM brands;");
            if ($executed) {
                return true;
            } else {
                return false;
            }
        }

        static function find($search_id)
        {
            $found_brand = null;
            $returned_brands = $GLOBALS['DB']->prepare("SELECT * FROM brands WHERE id = :id");
            $returned_brands->bindParam(':id', $search_id, PDO::PARAM_STR);
            $returned_brands->execute();
            foreach($returned_brands as $brand) {
                $brand_name = $brand['brand_name'];
                $price = $brand['price'];
                $id = $brand['id'];
                if ($id == $search_id) {
                    $found_brand = new Brand($brand_name, $price, $id);
                }
            }
            return $found_brand;
        }
    }
?>
