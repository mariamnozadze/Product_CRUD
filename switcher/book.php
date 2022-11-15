<?php

class Book extends Product
{
    /** Attributes **/
    protected $weight;

    /** Methods **/
    function __construct($sku, $name, $price, $weight)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;
    }

    //Gets all books from the database
    protected function getBook($connection)
    {
        try {
            $sql = $connection->query("SELECT * FROM `products` WHERE `sku` = $this->sku AND `type` = 'book'");

            return $sql;
        } catch (PDOException) {
            echo "error";
        }
    }
}
