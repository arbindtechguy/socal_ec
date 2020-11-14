<?php include 'includes/header.php' ?>
<link rel="stylesheet" href="assets/css/main.css" type="text/css">


<?php




?>


<!-- listing product -->
<section class=" pt-4">
  <h2 class="text-center"><?php echo $title ?></h2>
  <div class="container">
    <div class="row justify-content-center">
      <div class="card col-10">
        <form class="form" name="pst" action="/post" method="post" enctype="multipart/form-data" autocomplete="off">
          <div class="m-2">list something:
            <input type="normaltext" name="status" placeholder="product title" required>
          </div>
          <div class="m-2">Category:
            <input type="radio" name="category" value="product" checked> product
            <input type="radio" name="category" value="services"> services
            <span class="m-5"></span>
            <input type="normaltext" placeholder="Location" name="address" required>
            <input type="normaltext" placeholder="$bid-range" name="bid" required>

          </div>
          <div class="m-2">Select image: <input type="file" name="image" accept="image/*">
            <div class="m-2">

            </div>
            <input type="submit" value="post" name="pst" class="btn btn-block btn-primary">
        </form>
      </div>
    </div>
  </div>
  <!-- end listing product -->
</section>

<section class=" pt-4">
  <div class="container row">
    <?php foreach ($items as $item): ?>
    <div class="col-3">
      <a href= "<?php echo '/item?id=' . $item['sid'] ?>">
        <div class="card-image">
          <img src="<?php echo $item['image'] ?>" class="card-img-top" alt="<?php echo $item['image'] ?>">
        </div>
        <div class="card-body">
          <p class="card-text">Price: <?php echo $item['bid'] ?></p>
          <h6><?php echo $item['status'] ?></h6>
        </div>
      </a>
    </div>
    <?php endforeach; ?>
  </div>
</section>



<?php include 'includes/footer.php' ?>