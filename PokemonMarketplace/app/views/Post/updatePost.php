<?php require APPROOT . '/views/includes/header.php'; ?>
<?php require APPROOT . '/views/includes/navbar.php'; ?>

<div class="wrapper">
    <div class="form-group">
        <div class="update-form">
            <form action="" method="POST" style="margin: auto; width: 590px;">
                <h1>Update Post</h1>
                <br>
                <input type="text" class="update-form<?php echo (!empty($data['post_title_error'])) ? '-error' : ''; ?>" placeholder="post Title" name="post_title" value="<?php echo (!empty($data['post']->post_title)) ? $data['post']->post_title : ''; ?>">
                <p class="update-form-error"><?php echo (!empty($data['post_title_error'])) ? $data['post_title_error'] : ''; ?></p>
                
                <input class="update-form<?php echo (!empty($data['post_text_error'])) ? '-error' : ''; ?>" name="post_text" id="post_text" placeholder="post description" cols="30" rows="10"><?php echo (!empty($data['post']->post_description)) ? $data['post']->post_description : ''; ?></input>
                <p class="update-form-error"><?php echo (!empty($data['post_text_error'])) ? $data['post_text_error'] : ''; ?></p>
                
                <input type="text" class="update-form<?php echo (!empty($data['post_price_error'])) ? '-error' : ''; ?>" placeholder="post Price" name="post_price" value="<?php echo (!empty($data['post']->post_price)) ? $data['post']->post_price : ''; ?>">
                <p class="update-form-error"><?php echo (!empty($data['post_title_error'])) ? $data['post_title_error'] : ''; ?></p>
                <label>
                    <input type="checkbox" name="isoffered">Is it offered?
                </label>
                <br>
                <br>
                <button class="btn btn-success" type="submit" name="confirm">Confirm</button>
            </form>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>