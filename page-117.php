
<?php get_header(); ?>

<?php
    global $wpdb;

    $deviceid = $GET["did"];
?>


<div  style="min-height: 100vh">
    <div class="container mt-5">
        <?php echo $deviceid; ?>
    </div>
</div>



<?php get_footer(); ?>
