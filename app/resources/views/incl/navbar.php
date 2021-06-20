<?php if(isset($_SESSION['cheese_user'])): ?>
<nav class="navbar navbar-expand-lg navbar-default bg-light mb-3">
    <div class="container">
        <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>">Home</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link">Welcome <?php echo $_SESSION['cheese_user'];?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT; ?>/auths/logout">Logout</a>
                    </li>


            </ul>
        </div>
    </div>
</nav>
<?php endif;?>