<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package skorpius
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="row">
			<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
				<!--<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit data-use-m-u-i="false">-->
				<ul class="orbit-container">
					<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
					<button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
					<li class="is-active orbit-slide">
						<img class="orbit-image" src="http://foundation.zurb.com/sites/docs/assets/img/orbit/01.jpg" alt="Space">
					</li>
					<li class="orbit-slide">
						<img class="orbit-image" src="http://foundation.zurb.com/sites/docs/assets/img/orbit/02.jpg" alt="Space">
					</li>
					<li class="orbit-slide">
						<img class="orbit-image" src="http://foundation.zurb.com/sites/docs/assets/img/orbit/03.jpg" alt="Space">
					</li>
					<li class="orbit-slide">
						<img class="orbit-image" src="http://foundation.zurb.com/sites/docs/assets/img/orbit/04.jpg" alt="Space">
					</li>
				</ul>
				<nav class="orbit-bullets">
					<button class="is-active" data-slide="0"><span class="show-for-sr">First slide details.</span><span class="show-for-sr">Current Slide</span></button>
					<button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
					<button data-slide="2"><span class="show-for-sr">Third slide details.</span></button>
					<button data-slide="3"><span class="show-for-sr">Fourth slide details.</span></button>
				</nav>
			</div>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'skorpius' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'skorpius' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
