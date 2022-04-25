<?php require APPROOT . '/views/includes/header.php'; ?>
<?php require APPROOT . '/views/includes/navbar.php'; ?>

<div class="container">
  <div class="w-75 mx-auto">
    <h1>Create Post</h1>
  </div>
</div>

<div class="update-form">
    <form action="" method="POST">
      
        <input type="text" class="update-form<?php echo (!empty($data['post_title_error'])) ? '-error' : ''; ?>" placeholder="Post Title" name="post_title">
        
        <input type="text" class="update-form<?php echo (!empty($data['price_error'])) ? '-error' : ''; ?>" placeholder="Price" name="post_price">
        
        <textarea class="update-form<?php echo (!empty($data['post_description_error'])) ? '-error' : ''; ?>" name="post_description"  placeholder="Post Description" ></textarea>

      
        <br>
        
        <label>
            <input type="checkbox" name="is_offered">Is it offered?
        </label>
        <br>
        <button class="button-primary" type="submit" name="confirm">Confirm</button>
    </form>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>