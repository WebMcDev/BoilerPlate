<?php get_header(); ?>

<div class="container-lg">
    <div class="row">
        <div class="col">
            <?php 
            the_title(); 
            the_content();
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>