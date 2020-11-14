<?php include 'includes/header.php' ?>
<link rel="stylesheet" href="assets/css/main.css" type="text/css">


<!--Section: Block Content-->
<section class="mb-5 mt-5">

  <div class="row">
    <div class="col-md-6 mb-4 mb-md-0">

      <div id="mdb-lightbox-ui"></div>

      <div class="mdb-lightbox">

        <div class="row product-gallery mx-1">

          <div class="col-12 mb-0">
            <figure class="view overlay rounded z-depth-1 main-img">
              <?php echo "<img src='$item[image]'>"."<br>"; ?>
            </figure>

          </div>
        </div>

      </div>

    </div>
    <div class="col-md-6">

      <h5><?php
      echo "$item[status]"."<br>";

 ?></h5>
      <p class="mb-2 text-muted text-uppercase small">
        <?php

      echo "Category  : "."$item[category]"."<br>";

 ?>
      </p>

      <p><span class="mr-1"><strong>
            <?php echo "BID range:"."$item[bid]"."<br>"; ?>
          </strong></span></p>
      <p class="pt-1">
        <?php echo "Posted date:"."$item[time_date]"; ?>
      </p>
      <p class="pt-1"> <?php echo "Location:"."$item[category]"."<br>"; ?></p>
      <p class="pt-1"> <?php echo "Item ID:"."$item[id]"."<br>";; ?></p>
      <p class="pt-1"> <?php echo "Item SID:"."$item[sid]"; ?></p>
    </div>

</section>

<section class="container">
<h1 class="text-center">Item provider details</h1>

</section>
<!--Section: Block Content-->
<article class="main">


  <div id="registered container">
    <link rel="stylesheet" href="form.css">
    <div class="row card col-6">
      <p class="p-2">Seller name: <a target='_parent' href="<?php echo 'user_profile?su_id=' . $user['id'] ?>"><?php echo ($user['firstname'] . $user['surname']); ?></a></p>
      <p class="p-2">User ID: <?php echo ($user['id']); ?></p>
      <p class="p-2">Email: <?php echo ($user['email']); ?></p>
    </div>
  </div>
  <br>



  <div class="card container mb-5">
    <h1 class="text-center">Bid or Comment</h1>

    <form class="form text-center" name="comment" action="/item?sid=<?php echo $sid ?>" method="post" enctype="multipart/form-data" autocomplete="off">
      <input type="comment" name="comment_data" placeholder="I want this deal">
      <input type="bid" name="bid" placeholder="$***">
      <input type="submit" name="i_comment" value="Comment"><br>
    </form>

    <div class="container p-4 text-center mb-5">
      <?php foreach($comments as $comment): ?>
        <p>
        <a target='_parent' href="user_profile?su_id=<?php echo $comment['uid'] ?>" >
        <?php echo $comment['firstname'] . " " . $comment['surname'] ?> </a>

        <?php echo $comment['comment']; ?>
        BID :<?php echo $comment['bid']; ?>
      </p>
      <?php endforeach; ?>
      <p>
      </p>
    </div>
  </div>


</article>


