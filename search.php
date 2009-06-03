<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>
          <?php $keys= explode(" ",$s); ?>

		<h2 class="pagetitle">Search Results for "<em style="color: #666;"><?php echo $s; ?></em>"</h2>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; More Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Previous Entries &raquo;') ?></div>
		</div>


		<?php while (have_posts()) : the_post(); ?>
			<div <?php post_class() ?>>
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
<?php
$excerpt = get_the_excerpt();
$excerpt = preg_replace('/('.implode('|', $keys) .')/iu', '<strong class="search-excerpt">\0</strong>', $excerpt);
?>
                        <?php echo $excerpt; ?>
			</div>
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; More Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Previous Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">No posts found. Try a different search?</h2>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
