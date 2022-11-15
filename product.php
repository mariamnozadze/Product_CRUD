<?php
class Product
{
    /* Attributes */
    protected $sku;
    protected $name;
    protected $price;
    protected $type;

    /* Methods */
    function __construct()
    {
        //let me think ...
    }

    function validation()
    {
    }

    //Deletes selected products by their id
    function deleteProducts($conn, $id)
    {
        // Get checked checkboxes' values
        try {
            $sql = $conn->query("DELETE FROM products WHERE id = $id");
            return $sql;
        } catch (PDOException $e) {
            echo "Connection failed ";
            //  $e->getMessage();
        }
    }
    //gets products in the database
    function getProducts($conn)
    {
        try {
            $sql = $conn->query("SELECT * FROM products");
            return $sql;
        } catch (PDOException $e) {
            echo "Connection failed ";
            //  $e->getMessage();
        }
    }
}
