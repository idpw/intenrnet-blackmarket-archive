<?php get_header(); ?>
<?php get_sidebar(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <h2><?php the_title() ?></h2>
    <?php the_content() ?>

    <?php
    $iframe = get_field('youtube');
    preg_match('/src="(.+?)"/', $iframe, $matches);
    $src = $matches[1];

    $params = array(
        'controls' => 0,
        'hd' => 1,
        'autohide' => 1
    );

    $new_src = add_query_arg($params, $src);
    $iframe = str_replace($src, $new_src, $iframe);
    $attributes = 'frameborder="0"';
    $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
    echo $iframe;
    ?>


<?php endwhile; endif; ?>

<?php get_footer(); ?>
