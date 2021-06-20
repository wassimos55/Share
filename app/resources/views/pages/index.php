<?php include APPROOT . '/resources/views/incl/header.blade.php';?>
<div class="container text-center">
   
    <h1 class='cheese'><?php echo $data['title']; ?></h1>
    <p class='lead'><?php echo $data['description']; ?></p>
    <p class='lead grid'><?php echo $data['links']; ?></p>
</div>
<?php include APPROOT . '/resources/views/incl/footer.blade.php';?>