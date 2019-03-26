<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

get_header(); ?>

<div id="main" role="main" class="l-main">
  <div class="row">
    <div class="column small-12 medium-8">
      <h2 class="page-title"></h2>
      <p class="tags-list"></p>
      <div class="row posts">
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
            <div class="column small-12 medium-6">
              <article id="post-<?php the_ID(); ?>" class="c-card" data-link="<?php the_permalink() ?>">
                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                <div class="card-image" style="background-image: url('<?php echo $image[0]; ?>')"></div>
                <div class="card-content">
                  <h3 class="card-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                  <span><?php the_category(', ') ?> · <?php the_time('F jS, Y') ?></span>
                </div>
              </article>
            </div>
          <?php endwhile; ?>
          <nav class="prev-p-cont">
            <span class="navigation-dir"><?php posts_nav_link('','<span class="prev-p"></span>',''); ?></span>
            <span class="navigation-dir"><?php posts_nav_link('','','<span class="prev-p next"></span>'); ?></span>
          </nav>
        <?php else : ?>
          <h2>Not Found</h2>
          <p>Sorry, but you are looking for something that isn't here.</p>
          <?php get_search_form(); ?>

        <?php endif; ?>
      </div>
      <?php if (function_exists("pagination")) {
          pagination($additional_loop->max_num_pages);
      } ?>
    </div>
    <div class="column small-12 medium-4">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
