<?php

//Create connection to the database
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');

//If connection isn't successful; so when there is an error, throw an exception
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/* -------check what do i get from submit-------
echo '<pre?>';
var_dump($_GET);
echo '</pre>';
*/

$errors = [];

$sku = '';
$title = '';
$price = '';
$size_mb = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $sku = $_POST['sku'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $size_mb = $_POST['size_mb'];

    if (!$sku) {
        $errors[] = 'Product SKU is required';
    }

    if (!$title) {
        $errors[] = 'Product title is required';
    }

    if (!$price) {
        $errors[] = 'Product price is required';
    }

    if (!$size_mb) {
        $errors[] = 'Product Size is required';
    }

    if (empty($errors)) {
        $statement = $pdo->prepare("INSERT INTO products (sku, title, price, size_mb)
                VALUES (:sku, :title,  :price, :size_mb)");
        $statement->bindValue(':sku', $sku);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':size_mb', $size_mb);

        $statement->execute();
        header('Location: index.php');
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">


    <link rel="stylesheet" href="app.css">
    <title>Product CRUD</title>
</head>

<body>
    <div class="header align-content-start">
        <h1>Add New Product</h1>
    </div>

    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error) : ?>
                <div><?php echo $error ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>SKU</label>
            <input required type="text" name="sku" class="form-control" value="<?php echo $sku ?>">
        </div>
        <div class="form-group">
            <label>Title</label>
            <input required type="text" name="title" class="form-control" value="<?php echo $title ?>">
        </div>
        <div class="form-group">
            <label>Price</label>
            <input required type="number" step=".01" name="price" class="form-control" value="<?php echo $price ?>">
        </div>
        <!-- <div class="form-group">
            <label>Size</label>
            <input type="text" name="size_mb" class="form-control" value="<?php echo $size_mb ?>">
        </div> -->
        <div class="form-group">
            <label>Product Type</label>
            <select required id="productType" name="type" class="form-select">
                <option>Book</option>
                <option>Disc</option>
                <option>Furniture</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>