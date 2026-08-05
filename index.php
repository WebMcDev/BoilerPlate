<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <?php 
            $current_page = get_queried_object();
            $content = apply_filters( 'the_content', $current_page->post_content );
            echo $content; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>