<?php 
/* Template Name: Posts Page */

$args = array(
    'hide_empty'      => false,
);
$categories = get_categories($args);

get_header(); ?>

<div class="container-lg">
	<div class="row">
		<div class="col">
			<?php 
            the_title(); 
            the_content();
			?>
		</div>
	</div>

	<div class="row">
		<?php
			if ( $categories != '') { ?>
		<div class="col-md-3">

			<form data-js-form="filter" class="filters category-filter">
				<div class="row">
					<div class="col-md-12 col-6">
						<a class="filter-collapse icon" data-bs-toggle="collapse" href="#multiCollapsefilter" role="button" aria-expanded="true" aria-controls="multiCollapseFilter">Filter by</a>

						<div class="collapse show multi-collapse" id="multiCollapsefilter">

							<input class="filter-option see-all" type="checkbox" name="category" value="" id="all" checked><label class="category" for="all">See All</label>

							<?php
								foreach ( $categories as $category ) { ?>

							<input class="filter-option category" type="checkbox" id="<?= $category->slug; ?>" name="category" value="<?= $category->slug; ?>" data-category="<?= $category->slug; ?>"><label class="filter-option-label" for="<?= $category->slug; ?>">
								<?= $category->name; ?></label>

							<?php } ?>

						</div>
					</div>

					<div class="col-md-12 col-6">
						<br class="mobile-hide" />
						<a class="filter-collapse icon" data-bs-toggle="collapse" href="#multiCollapseSort" role="button" aria-expanded="true" aria-controls="multiCollapseSort">Sort by</a>

						<div class="collapse show multi-collapse" id="multiCollapseSort">
							<form data-js-form="sort" class="filters">

								<input class="filter-option sort" type="radio" name="sort" value="ASC" id="ASC" checked><label class="filter-option-label" for="ASC">Oldest First</label>
								<input class="filter-option sort" type="radio" name="sort" value="DESC" id="DESC"><label class="filter-option-label" for="DESC">Newest First</label>

							</form>
						</div>
					</div>
				</div>
			</form>

		</div>
		<?php } ?>

		<div class="col">
			<div class="row">
				<div class="posts-page-loop">
					<?php
					$loop = new WP_Query( array ('post_type' => 'post', 'order' => 'ASC','posts_per_page' => 3 ));
					
					if ( $loop->have_posts() ) { ?>

					<div class="row">
						<div class="col text-center">
							<div id="filter-message"></div>
						</div>
					</div>
					
					<div class="page-wrapper" data-page="1" data-max="<?php echo $loop->max_num_pages ?>">
						<div class="row">
							<?php while ( $loop->have_posts() ) { $loop->the_post(); ?>
								<?php get_template_part('template-parts/content', 'single_preview'); ?>
							<?php }

							} else {
								echo 'No Posts found.';
							} ?>
						</div>
					</div>
					
					<?php if (  $loop->max_num_pages > 1 ) : ?>
						<div class="row">
							<div class="col text-center">
								<?php echo '<div class="btn" id="loadmore">See More</div>'; // you can use <a> as well ?>
							</div>
						</div>
					<?php endif; ?>

				</div>
			</div>
		</div>

	</div>

</div>

<?php get_footer(); ?>