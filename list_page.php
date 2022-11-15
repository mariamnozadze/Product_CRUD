<?php
require_once "./database.php";
require "./product.php";

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="app.css">
    <title>Product CRUD</title>
</head>

<body>

    <div class="header">
        <div class="title">
            <h1>Product List</h1>
        </div>

        <div class="buttons">
            <div class="col">
                <a href="add.php" class="btn btn-light">ADD</a>
            </div>
            <div class="col">
                <button type="submit" id="delete-product-btn" class="btn btn-danger" name="deleteBtn">MASS DELETE</button>
            </div>
        </div>

    </div>

    <div class="container row justify-content-center align-items-center mt-4">
        <?php
        $Product = new Product();
        $products = $Product->getProducts($conn);
        foreach ($products as $product) {
        ?>
            <div class="card" style="width: 200px;">
                <div class="card-body">
                    <input type="checkbox" class="delete-checkbox" name="checkbox" value="<?php echo $product['id'] ?>">
                    <div class="card-text">
                        <?php echo $product['sku'] ?>
                    </div>
                    <div class="card-text">
                        <?php echo $product['title'] ?>
                    </div>
                    <div class="card-text">
                        <?php echo $product['price'] . ' ' . '$' ?>
                    </div>
                    <!---when types will be added, uncomment this--->
                    <!-- <?php
                            switch ($product['type']) {
                                case 'dvd':
                                    echo "Size: " . $product['size'] . " MB";
                                    break;
                                case 'furniture':
                                    echo "Dimension: " . $product['height'] . "x" . $product['width'] . "x" . $product['length'];
                                    break;
                                case 'book':
                                    echo "Weight: " . $product['weight'] . "KG";
                                    break;
                            }
                            ?> -->
                </div>
            </div>
        <?php } ?>
    </div>
</body>

</html>
