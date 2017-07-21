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
    }
?>
