<?php include APPROOT . '/resources/views/incl/header.blade.php';?>
<div class="row mt-4">
    <div class="mx-auto col-md-6">
        <h3 class="text-center"><?php echo SITENAME;?></h3>
        <?php form_open('post');?>
        <div class="form-group">
        <label for="">Username</label>
            <input type="text" name="name" id="name" class="form-control <?php echo !empty($data['name_err']) ?'is-invalid':'';?>" value="<?php echo $data['name'];?>">
            <span class="invalid-feedback"><?php echo $data['name_err'];?></span>
            <span class="invalid-feedback"><?php echo $data['suggest_name'];?></span>
        </div>
        <div class="form-group">
        <label for="">Email</label>
            <input type="email" name="email" id="email" class="form-control <?php echo !empty($data['email_err']) ?'is-invalid':'';?>" value="<?php echo $data['email'];?>">
            <span class="invalid-feedback"><?php echo $data['email_err'];?></span>
        </div>
        <div class="form-group">
        <label for="">Password</label>
            <input type="password" name="password" id="password" class="form-control <?php echo !empty($data['password_err']) ?'is-invalid':'';?>" value="<?php echo $data['password'];?>">
            <span class="invalid-feedback"><?php echo $data['password_err'];?></span>
        </div>
        <div class="form-group">
        <label for="">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm_password" class="form-control <?php echo !empty($data['confirm_password_err']) ?'is-invalid':'';?>" value="<?php echo $data['confirm_password'];?>">
            <span class="invalid-feedback"><?php echo $data['confirm_password_err'];?></span>
        </div>
        <div class="form-group">
            <input type="submit" value="Register" class="btn btn-primary btn-block" name="register">
        </div>
        <p><a href="<?php echo URLROOT;?>/auths/auth_in" class="btn btn-link bg-light">Have an Account? Login</a></p>
        <?php form_close();?>
    </div>
</div>
<?php include APPROOT . '/resources/views/incl/footer.blade.php';?>