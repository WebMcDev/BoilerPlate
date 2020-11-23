<?php if ( has_post_thumbnail() ) { ?>
   <style type="text/css">
    .hero-image {
        background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>);
        background-size: cover;
        background-position: center;
    }
    @media (max-width:1024px) {
        .hero-image {
            background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>);
        }
    }    
    @media (max-width:768px) {
        .hero-image {
            background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium_large'); ?>);
        }
    }
    @media (max-width:300px) {
        .hero-image {
            background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>);
        }
    }
    </style>
<?php } ?>


<div class="hero-image">
    <div class="overlay">
        <div class="text-center">
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
</div>