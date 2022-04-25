<?php require APPROOT . '/views/includes/header.php'; ?>
<?php require APPROOT . '/views/includes/navbar.php'; ?>

<div class="container">
  <div class="w-75 mx-auto">
    <h1>Create Your Card!</h1>
  </div>
</div>

<div class="update-form">
    <form action="" method="POST">
      

        <input type="text" class="update-form<?php echo (!empty($data['card_name_error'])) ? '-error' : ''; ?>
        " placeholder="Card Name" name="card_name">
        

        <input tjype="text" class="update-form<?php echo (!empty($data['card_rarity_error'])) ? '-error' : ''; ?>
        " placeholder="Card Rarity" name="card_rarity">
        
        
        <input tjype="text" class="update-form<?php echo (!empty($data['card_image_error'])) ? '-error' : ''; ?>
        " placeholder="Card Image" name="card_image"> 

        <input tjype="text" class="update-form<?php echo (!empty($data['card_image_error'])) ? '-error' : ''; ?>
        " placeholder="Post Title" name="post_title">
        
        <input tjype="text" class="update-form<?php echo (!empty($data['card_image_error'])) ? '-error' : ''; ?>
        " placeholder="Post Description" name="post_description">
        
        <input tjype="text" class="update-form<?php echo (!empty($data['card_image_error'])) ? '-error' : ''; ?>
        " placeholder="Post Price" name="post_price"> 
        

    
        <br>
        <button class="btn btn-success" type="submit" name="next">Next</button>
    </form>
    
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>