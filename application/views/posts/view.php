
<div class="card">
    <div class="card-header text-center">
        <h4><?php echo $post['title']; ?></h4>
        date: 
        <small class = "post-date"><?php echo $post['created_at']; ?>
        </small>
    </div>
    <div class="card-body text-center">
        <img class="img-thumbnail" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
        <p class="card-text "> 
            <?php echo $post['body']; ?>
        </p>
    </div>
    <div class="card-footer">
    <?php if($this->session->userdata('user_id') == $post['user_id']): ?>
        <a href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>" class="btn btn-info float-left">
            edit
        </a>
        <?php echo form_open('/posts/delete/'.$post['id']); ?>
            <input type="submit" value="delete" class="btn btn-danger">
        <?php echo form_close(); ?>
        <hr> 
    <?php endif; ?>
<!-- --------------------- post comments --------------------- -->
        <h4>comments:</h4>
        <?php if($comments): ?>
            <?php foreach($comments as $comment): ?>
              <div class="card">
                  <div class="card-header bg-info">
                      <?php echo $comment['name']; ?>
                  </div>
                  <div class="card-body">
                      <p class="card-text">
                          <?php echo $comment['body']; ?>
                      </p>
                  </div>
              </div>
              <hr>
            <?php endforeach; ?>
        <?php else: ?>
            <p>no comments to display</p>
        <?php endif; ?>
<!-- --------------------- create a new comment --------------------- -->
        <h3>add comment:</h3>
        <?php echo validation_errors(); ?>
        <?php echo form_open('comments/create/'.$post['id']); ?>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Body</label>
                <textarea name="body" class="form-control"></textarea>
            </div>
            <input type="hidden" name ="slug" value="<?php echo $post['slug']; ?>">
            <button class="btn btn-info">submit</button>
        <?php echo form_close(); ?>    
    </div>
    </div>
</div>
