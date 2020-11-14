<?php include 'includes/header.php' ?>
<?php echo isset($title) ? $title : ''; ?>

<div class="container">
    <div class="main-body">

        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="<?php echo $profile['avatar'] ?>" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4><?php echo $profile['firstname'] .' ' .  $profile['surname'] ?></h4>
                                <p class="text-secondary mb-1"><?php echo $profile['education'] ?></p>
                                <p class="text-muted font-size-sm"><?php echo $profile['gender'] ?></p>
                                <button class="btn btn-primary">Follow</button>

                                <a class="btn btn-outline-primary"
                                    href="<?php echo '/message?id=' . $profile['id'] ?>">Message</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $profile['firstname'] .' ' .  $profile['surname'] ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $profile['email']; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $profile['phoneno']; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Mobile</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $profile['phoneno']; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                --
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gutters-sm">
                    <?php if ($items): ?>
                    <div class="col-sm-12 mb-3">
                        <div class="card h-100">
                            <section class=" pt-4">
                                <div class="container row">
                                    <?php foreach ($items as $item): ?>
                                    <div class="col-3">
                                        <a href="<?php echo '/item?id=' . $item['sid'] ?>">
                                            <div class="card-image">
                                                <img src="<?php echo $item['image'] ?>" class="card-img-top"
                                                    alt="<?php echo $item['image'] ?>">
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">Price: $<?php echo $item['bid'] ?></p>
                                                <h6><?php echo $item['status'] ?></h6>
                                            </div>
                                        </a>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </section>

                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</article>

<?php include 'includes/footer.php' ?>