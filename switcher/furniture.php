<?php
class Furniture extends Product
{
  /** Attributes **/
  protected $height;
  protected $width;
  protected $length;

  /** Methods **/
  function __construct($sku, $name, $price, $height, $width, $length)
  {
    $this->sku = $sku;
    $this->name = $name;
    $this->price = $price;
    $this->height = $height;
    $this->width = $width;
    $this->length = $length;
  }

  //Gets all furniture in the database
  protected function getFurniture($connection)
  {
    try {
      $sql = $connection->query("SELECT * FROM `products` WHERE `sku` = $this->sku AND `type` = 'furniture';");

      return $sql;
    } catch (PDOException) {
      echo "error";
    }
  }
}
