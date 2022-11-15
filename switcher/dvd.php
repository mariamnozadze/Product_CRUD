<?php
class DVD extends Product
{
    //Attributes
    protected $size;

    // Methods 
    function __construct($sku, $name, $price, $size)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->size = $size;
    }

    //gets all DVDs from the database
    protected function getDVD($connection)
    {
        try {
            $sql = $connection->query("SELECT * FROM `products` WHERE `sku` = $this->sku AND `type` = 'dvd';");

            return $sql;
        } catch (PDOException) {
            echo "error";
        }
    }
}
