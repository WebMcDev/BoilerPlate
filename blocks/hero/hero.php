<?php 
$image = get_field( 'hero_image' );
$title = get_field( 'hero_headline' );
?>
<div class="hero">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if($title){ ?><h1><?php echo $title; ?></h1><?php } ?>
            </div>
        </div>
    </div>
</div>