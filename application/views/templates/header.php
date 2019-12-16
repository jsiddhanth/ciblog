<html>
    <head>
    <title>Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/style.css">
    <script src="//cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    </head>

    <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <span class="navbar-brand">
                BLOG
            </span>
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>home" class="nav-link">home</a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>about" class="nav-link">about</a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>posts" class="nav-link">blog</a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>categories" class="nav-link">Categories</a>
            </li>
        </ul>

        <ul class="navbar-nav my-2 my-lg-0">
        <!-- --------------------- show login/register if not logged_in --------------------- -->
        <?php if(!$this->session->userdata('logged_in')): ?>
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>users/login" class="nav-link">login</a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>users/register" class="nav-link">register</a>
            </li>
        <?php endif; ?>
        <!-- --------------------- show only when logged in --------------------- -->
        <?php if($this->session->userdata('logged_in')): ?>
            <span class="navbar-text text-white">
                <?php echo $this->session->userdata('username'); ?>
            </span>
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>posts/create" class="nav-link">create post</a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>categories/create" class="nav-link">create category</a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>users/logout" class="nav-link">logout</a>
            </li>
        <?php endif; ?>
        </ul>
    </nav>
    <br>
<div class="container">
<br><br>
<!-- --------------------- flash messages --------------------- -->
<?php if($this->session->flashdata('post_created')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
<?php endif; ?>

<?php if($this->session->flashdata('post_updated')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
<?php endif; ?>

<?php if($this->session->flashdata('post_deleted')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('post_deleted').'</p>'; ?>
<?php endif; ?>
    
<?php if($this->session->flashdata('category_created')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>' ?>
<?php endif; ?>

<?php if($this->session->flashdata('user_loggedin')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>' ?> 
<?php endif; ?>

<?php if($this->session->flashdata('login_failed')): ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>' ?> 
<?php endif; ?>

<?php if($this->session->flashdata('user_loggedout')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>' ?> 
<?php endif; ?>