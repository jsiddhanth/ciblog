
<h2><?= $title ?></h2>
<hr>
<?php foreach($posts as $post):?>

<div class="row">

    <div class="col-md-3">
        <img class="img-thumbnail" src="<?php echo site_url(); ?>/assets/images/posts/<?php echo $post['post_image']; ?>">
    </div>

    <div class="col-md-9">
        <div class="card">
            <div class="card-header text-center">
                <h4>
                <?php echo $post['title']; ?>  <strong>in:<?php echo $post['name']; ?></strong>
                </h4>
            </div>
            <div class="card-body text-center">
                <p><?php echo word_limiter($post['body'],20); ?></p>
                <p>
                    <a href="<?php echo site_url('/posts/'.$post['slug']); ?>" class="btn btn-info">READ MORE</a>
                </p>
            </div>
        </div>
    </div>
</div>
<br><br>
<?php endforeach; ?>

<!-- --------------------- pagination links --------------------- -->
<div class="pagination-links">
    <?php echo $this->pagination->create_links(); ?>
</div>


