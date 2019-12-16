

<div class="card">
    <?php echo validation_errors(); ?>
    <?php echo form_open('users/login'); ?>
    <div class="card-header text center">
        <?php echo $title; ?>        
    </div>
    <div class="card-body">
        <p class="card-text">
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="username" required autoofocus>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="password" required autoofocus>
            </div>
            <button type="submit" class="btn btn-info">login</button>
        </p>
    </div>
    <?php echo form_close(); ?>
</div>