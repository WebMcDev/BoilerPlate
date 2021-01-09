<?php get_header(); ?>

<?php get_template_part('template-parts/content', 'hero'); ?>

<div class="container-lg">
    <div class="row">
        <div class="col">
            <?php 
            the_content();
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>