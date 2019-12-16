
<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>
<?php echo form_open('posts/update'); ?>
    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
    <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" value="<?php echo $post['title']; ?>" class="form-control" placeholder="add title">
    </div>

    <div class="form-group">
        <label>Body</label>
        <textarea  id="editor1"class="form-control" name="body" placeholder="add body">
            <?php echo $post['body']; ?>
        </textarea>
    </div>

    <div class="input-group mb-3">    
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Category</label>
        </div>    
        <select name="category_id" class="custom-select" id="inputGroupSelect01">
         <?php foreach($categories as $category): ?>
           <option  
                <?php if($post['category_id'] == $category['id']){echo "selected";}?>
                value="<?php echo $category['id']; ?>"
           >
                <?php echo $category['name']; ?></option>
         <?php endforeach; ?>   
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">update</button>
    </div>

</form>