<?php get_header(); ?>
<?php get_sidebar(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

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
  <div>
      <?php the_field('map') ?>
  </div>
  <p>
    from <?php the_field('start_date') ?> to <?php the_field('end_date') ?> <br/>
  </p>
  <p>
      <?php the_field('time') ?>
  </p>


  <div>
      <?php
      if (have_rows('organizers')):?>
        Organized by
        <ul class="organizers">
            <?php
            while (have_rows('organizers')) : the_row();

                echo('<li>');
                if (get_sub_field('website')) {
                    echo('<a href="' . get_sub_field('website') . '" target="_blank">');
                }
                if (get_sub_field('name')) {
                    the_sub_field('name');
                } else {
                    the_sub_field('website');
                }

                if (get_sub_field('website')) {
                    echo('</a>');
                }
                echo('</li>');

            endwhile;
            ?>
        </ul>
      <?php endif; ?>
  </div>


  <div>
    Gallery
    <div class="l-content-wrapper">
        <?php theSlickGallery('gallery') ?>
    </div>
  </div>
  <div>
      <?php
      if (have_rows('organizers')):?>
        Vendors
        <ul class="vendors">
            <?php
            while (have_rows('vendors')) : the_row();

                echo('<li>');
                if (get_sub_field('website')) {
                    echo('<a href="' . get_sub_field('website') . '" target="_blank">');
                }
                if (get_sub_field('name')) {
                    the_sub_field('name');
                } else {
                    the_sub_field('website');
                }

                if (get_sub_field('website')) {
                    echo('</a>');
                }
                echo('</li>');

            endwhile;
            ?>
        </ul>
      <?php endif; ?>
  </div>
  <div>
      <?php
      if (have_rows('related_links')):?>
        Related Links
        <ul class="related_links">
            <?php
            while (have_rows('related_links')) : the_row();

                echo('<li>');
                if (get_sub_field('website')) {
                    echo('<a href="' . get_sub_field('website') . '" target="_blank">');
                }
                if (get_sub_field('name')) {
                    the_sub_field('name');
                } else {
                    the_sub_field('website');
                }

                if (get_sub_field('website')) {
                    echo('</a>');
                }
                echo('</li>');

            endwhile;
            ?>
        </ul>
      <?php endif; ?>
  </div>
    <?php the_content() ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>




