<?php get_header();

$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="page-content">
                <?php 
                $current_page = get_queried_object();
                $content = apply_filters( 'the_content', $current_page->post_content );
                echo $content; ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>