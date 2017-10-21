<?php get_header(); ?>
<?php get_sidebar(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

  <a href="<?php the_permalink() ?>">
    <h2>
        <?php the_title() ?>
    </h2>

      <?php
      $image = get_field('main_image');
      $size = 'large';
      if ($image) :?>
        <div>
            <?php
            echo(wp_get_attachment_image($image['ID'], $size));
            if ($image['caption']) {
                echo('<p>' . $image['caption'] . '</p>');
            }
            if ($image['description']) {
                echo('<p>' . $image['description'] . '</p>');
            }
            ?>
        </div>
      <?php endif; ?>
    <p>
        <?php the_field('country') ?>
        <?php the_field('city') ?>
        <?php the_field('venue') ?>
    </p>
    <p>
      from <?php the_field('start_date') ?> to <?php the_field('end_date') ?> <br/>
    </p>
    <p>
        <?php the_field('time') ?>
    </p>
  </a>

<?php endwhile; endif; ?>
<?php get_footer(); ?>
