<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package sparkling
 */

get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
					<?php
				 $args = array(
				   'posts_per_page' => 30,
				   'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
				   );

	query_posts($args);
			
			?>

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			
			<?php while ( have_posts() ) : the_post(); ?>
			<?php foreach (get_the_category() as $category) {
				if ( $category->name !== 'BANNER TOPO' && $category->name !== 'xyz' && $category->name !== 'app-tela1' && $category->name !== 'app-tela2' && $category->name !== 'app-tela2-banners') { ?>

							<a href="<?php the_permalink(); ?>">
								<h1> <?php the_title(); ?> </h1>
							</a>
							<a href="<?php the_permalink(); ?>">
								<?php if(has_post_thumbnail()) {                    
									$image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'full' );
									 echo '<img src="' . $image_src[0]  . '" width="100%"  />';
								}  ?>
							</a>
						<p style="width: 95%; text-align: justify;">	<?php the_excerpt(); ?> </p>
						</br>
						</br>
			<?php } ?>
			<?php } ?>

			<?php endwhile; ?>

			<?php wp_pagenavi(); ?>
		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
