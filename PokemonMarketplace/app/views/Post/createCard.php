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
        " placeholder="Card Name" name="card_name"><br><br>
        
        <h5> Card Rarity </h5>
        
        <select name="card_rarity">
              <option value="common" selected>Common</option>
              <option value="rare">Rare</option>
              <option value="epic">Epic</option>
              <option value="legendary">Legendary</option>
            </select> <br><br>
        
        
        <input tjype="text" class="update-form<?php echo (!empty($data['card_image_error'])) ? '-error' : ''; ?>
        " placeholder="Card Image" name="card_image"> <br><br>

        <input tjype="text" class="update-form<?php echo (!empty($data['post_title_error'])) ? '-error' : ''; ?>
        " placeholder="Post Title" name="post_title"><br><br>
        
        <input tjype="text" class="update-form<?php echo (!empty($data['post_drscription_error'])) ? '-error' : ''; ?>
        " placeholder="Post Description" name="post_description"><br><br>
        
        <input tjype="text" class="update-form<?php echo (!empty($data['post_price_error'])) ? '-error' : ''; ?>
        " placeholder="Post Price" name="post_price"> <br>
        

    
        <br>
        <button class="btn btn-success" type="submit" name="next">Next</button>
    </form>
    
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>