<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Add</title>
    <!-- CSS link -->
    <link rel="stylesheet" href="../public/css/styles.css">
    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="margin-top: 60px">
        <div class="row">
            <div class="col-9">
                <h1>Product Add</h1>
            </div>
            <div class="col-1">
                <button type="submit" class="btn btn-light" form="product_form" value="save">Save</button>
            </div>
            <div class="col-2">
                <a href="list_page.php" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </div>
    <hr>
    <!-- Change action -->
    <form action="/AddToDatabase.php" method="post" id="product_form" enctype="multipart/form-data" style="margin: 40px">
        <div class="form-group">
            <label for="sku" class="col-1">SKU</label>
            <input type="text" id="sku" name="sku" class="col-4" required />
        </div>
        <br>
        <div class="form-group">
            <label for="name" class="col-1">Name</label>
            <input type="text" name="name" id="name" class="col-4" required />
        </div>
        <br>
        <div class="form-group">
            <label for="price" class="col-1">Price ($)</label>
            <input type="number" id="price" name="price" step="any" class="col-4" required />
        </div>
        <br>
        <div class="form-group">
            <label for="productType">Type Switcher</label>
            <select name="productType" id="productType" onchange="Switcher(this)">
                <option class="dropdown-item text-light" value="0" disabled selected>Choose type</option>
                <option value="dvd">DVD</option>
                <option value="book">Book</option>
                <option value="furniture">Furniture</option>
            </select>
        </div>

        <div class="switcher form-group">
            <!-- Product type-specific attribute -->
            <div id="DVD" style="display: none">
                <div class="mb-3 mt-3">
                    <label for="size" class="col-1">Size (MB)</label>
                    <input type="number" id="size" name="size" step="any" class="col-4">
                </div>
                <br>
                <p><b>Please, provide disk space size in MB.</b></p>
            </div>
            <div id="Furniture" style="display: none">
                <div class="mb-3 mt-3">
                    <label for="height" class="col-1">Height (CM)</label>
                    <input type="number" id="height" name="height" step="any" class="col-4">
                </div>
                <div class="mb-3 mt-3">
                    <label for="width" class="col-1">Width (CM)</label>
                    <input type="number" id="width" name="width" step="any" class="col-4">
                </div>
                <div class="mb-3 mt-3">
                    <label for="length" class="col-1">Length (CM)</label>
                    <input type="number" id="length" name="length" step="any" class="col-4">
                </div>
                <br>
                <p><b>Please, provide furniture dimensions in CM.</b></p>
            </div>
            <div id="Book" style="display: none">
                <div class="mb-3 mt-3">
                    <label for="weight" class="col-1">Weight (KG)</label>
                    <input type="number" id="weight" name="weight" step="any" class="col-4">
                </div>
                <br>
                <p><b>Please, provide book weight in KG.</b></p>
            </div>
        </div>
    </form>
</body>
<script src="index.js"></script>

</html>