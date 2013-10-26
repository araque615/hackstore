<?php
/**
 * Single product short description
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
include('phpqrcode/qrlib.php');

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//global $post;
global $post, $product;

if ( ! $post->post_excerpt ) return;
?>
<div itemprop="description">
	<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
	<?php
		$image_link = wp_get_attachment_url( get_post_thumbnail_id() );
	    	$price = $product->get_price(); 
    		$codeContents  = '-------------------------'."\n"; 
		$codeContents .= ' HackStore - Product'."\n"; 
		$codeContents .= ' Name: '.get_the_title()."\n"; 
    		$codeContents .= ' ID: '.$product->id."\n"; 
		$codeContents .= ' Price: '.$price." euros\n"; 
    		$codeContents .= ' Stock: '.($product->is_in_stock() ? 'InStock' : 'OutOfStock')."\n"; 
    		$codeContents .= ' Permalink: '.get_permalink( apply_filters('woocommerce_in_cart_product_id', $values['$product->id'] ))."\n";
		$codeContents .= ' Thumbnail: '.$image_link."\n";
		$codeContents .= '-------------------------'; 
		$path = 'QRtmp/tmp_'.md5($product->id).'.png';
		QRcode::png($codeContents, $path, QR_ECLEVEL_L, 3); 
		echo '<img src="http://hackstore.azurewebsites.net/'.$path.'" />';
	?>
</div>
