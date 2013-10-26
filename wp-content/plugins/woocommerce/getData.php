<?php include( 'woocommerce.php' ); ?>

<?php $a=query_posts( array('post_type'=> 'product') );?>
<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>

<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
<?php the_content(); ?>
<?php echo '<h1>Regular Price :</h1>'.get_post_meta($post->ID, '_regular_price', true); ?>
<?php echo '<h1>Sale Price :</h1>'.get_post_meta($post->ID, '_sale_price', true); ?>
<?php echo '<h1>Stock Status :</h1>'.get_post_meta($post->ID, '_stock_status', true); ?>
<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('front');?></a>

<?php endwhile; endif;?>
<?php wp_reset_query(); ?>
