<?php
/*
Template Name: 固定ページabout
*/
?>

<?php get_header(); ?>

<h1>固定ページaboutテンプレートです</h1>

<?php
if(have_posts()): while(have_posts()): the_post();?>
<h2><?php the_title(); ?></h2>

<?php the_content(); ?>


<?php endwhile; endif; ?>
<?php get_footer(); ?>
