<?php include APPROOT . '/resources/views/incl/header.blade.php';?>
    <div class="row mt-4">
        <div class="mx-auto col-md-6">
            <h3 class="text-center"><?php echo SITENAME;?></h3>
            <?php form_open('post');?>
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
                <input type="submit" value="Login" class="btn btn-primary btn-block" name="login">
            </div>
            <p><a href="<?php echo URLROOT;?>/auths/auth" class="btn btn-link bg-light">Need an Account? Sign up</a></p>
            <?php form_close();?>
        </div>
    </div>
<?php include APPROOT . '/resources/views/incl/footer.blade.php';?>