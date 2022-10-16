<?php

//Create connection to the database
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');

//If connection isn't successful; so when there is an error, throw an exception
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//Select and display products from mysql
$statement = $pdo->prepare('SELECT * FROM products');
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// var_dump($products);
// echo '</pre>';


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="./app.css">
    <title>Product CRUD</title>
</head>

<body>
    <div class="header justify-content-around align-content-center">
        <h1>Product List</h1>

        <div class="buttons align-content-center">
            <p>
                <a href="add.php" class="btn btn-success">Add Product</a>
            </p>
            <p>
                <a href="#" name='but_delete' class="btn btn-danger">Delete</a>
            </p>
        </div>
    </div>

    <div class="container">
        <?php foreach ($products as $product) : ?>
            <div class="card">
                <input type='checkbox'>
                <div class="card-body">
                    <div class="card-text">
                        <?php echo $product['sku'] ?>
                    </div>
                    <div class="card-text">
                        <?php echo $product['title'] ?>
                    </div>
                    <div class="card-text">
                        <?php echo $product['price'] . ' ' . '$' ?>
                    </div>
                    <div class="card-text">
                        <?php echo $product['size_mb'] . ' ' . 'MB'  ?>
                    </div>
                    <form method="post" action="delete.php" style="display: inline-block">
                        <input type="hidden" name="id" value="<?php echo $product['id'] ?>" />
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</body>

</html>