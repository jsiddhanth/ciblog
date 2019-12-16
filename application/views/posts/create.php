
<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>
<?php echo form_open_multipart('posts/create'); ?>
    <div class="form-group">
        <label >Title</label>
        <input type="text" class="form-control" name="title" placeholder="add title">
    </div>

    <div class="form-group">
        <label>Body</label>
        <textarea  id="editor1"class="form-control" name="body" placeholder="add body"></textarea>
    </div>

    <div class="input-group mb-3">    
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Category</label>
        </div>    
        <select name="category_id" class="custom-select" id="inputGroupSelect01">
         <?php foreach($categories as $category): ?>
           <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
         <?php endforeach; ?>   
        </select>
    </div>

    <div class="form-group">
        <div class="custom-file">
            <label class="custom-file-label" for="customFile">choose file</label>
            <input type="file" name="userfile" class="custom-file-input" size="20"id="customFile">  
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">submit</button>
    </div>



</form>