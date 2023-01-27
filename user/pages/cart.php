<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="icon" type="image/x-icon" href="../assets/img/logo.png">
  <title>Homepage</title>
</head>

<body>
  <?php require_once(__DIR__ . '\navbar.php'); ?>

  <div class="container fluid" style="padding: 20px;">
    <h2 style="margin-bottom:20px">Carrello:</h2>
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 g-1">
      <?php
      include_once dirname(__FILE__) . '/../function/cart.php';

      $id = 2; //$_SESSION['user_id'];
      $cart = getCartUser($id);
      ?>
      <?php if ($cart == -1): ?>
        <div class="d-flex justify-content-center">
          <h1 class="text-danger"><b>Errore, server non risponde</b></h1>
        </div>
      <?php endif ?>

      <?php if ($cart != -1): ?>
        <?php foreach ($cart as $row): ?>
          <div class="col">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-2"
              style="border-color: orange; border-style: solid; border-radius: 10px; ">
              <div class="col-3" style="padding: 10px; ">
                <img src="../assets/img/panino.jpeg"></img>
              </div>
              <div class="col" style="vertical-align: middle;">
                <p><b>id:</b>
                  <?php echo $row['product'] ?>
                </p>
                <h5><b>prodotto:</b>
                  <?php echo $row['name'] ?>
                </h5>
                <h7><b>quantity:</b>
                  <?php echo $row['quantity'] ?>
                </h7>
                <h5><b>price:</b>
                  <?php echo $row['price'] ?>€
                  <h5>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      <?php endif ?>


    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>