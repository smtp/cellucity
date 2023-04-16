<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
$Switchpay = get_field('switchpay');
$payjoy = get_field('payjoy'); 
$vodacom = get_field('vodacom'); 
$moretyme = get_field('moretyme'); 
$float = get_field('float'); 
?>
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>
	
	<?php 
	
	if ($Switchpay == yes || $payjoy == yes || $vodacom == yes || $moretyme == yes){
	?>	
	<h5 class="more-payments">More ways to pay!</h5>
	<?php 	
	}
	
	
	 if ($payjoy == yes){ ?>
	
		
	<div class="payment-info" style="">
		<div class="product-info-payment-info" style="">
			<div class="payment-logo col-xs-12" style="">
					<img src="/wp-content/uploads/2021/08/payjoy.png" alt="Payjoy">

				</div>
				<div class="payment-info-text col-xs-12" style="">
					Payjoy, No credit checks, no bank account required.
				</div>
				
				<div class="payment-actions col-xs-12" style="" align="center">
					<button class="gform_button button" style="border: 2px solid #2face2; background-color: #fff; color: #2face2; font-size: 14px; font-weight: 600;">
					<a href="https://the-hub.cellucity.co.za/payjoy/" target="_blank"> See more </a>
					</button>	
				</div>

			</div>
		</div>
		 
	<?php	 
	 } else {
		echo ''; 
	 }
	
	
	if ($Switchpay == yes){ ?>
	
		
	<!--<div class="payment-info" style="">
		<div class="product-info-payment-info" style="">
			<div class="payment-logo col-xs-12" style="">
					<img src="/wp-content/uploads/2021/08/switchpay.png" alt="SwitchPay">

				</div>
				<div class="payment-info-text col-xs-12" style="">
					SwitchPay, your alternative subscription based payment option.
				</div>
				
				<div class="payment-actions col-xs-12" style="" align="center">
					<button class="gform_button button" style="border: 2px solid #2face2; background-color: #fff; color: #2face2; font-size: 14px; font-weight: 600;">
					<a href="https://the-hub.cellucity.co.za/switchpay/" target="_blank"> See more </a>
					</button>	
				</div>

			</div>
		</div>-->
		 
	<?php	 
	 } else {
		echo ''; 
	 }
	
	if ($moretyme == yes){ ?>
	
		
	<div class="payment-info" style="">
		<div class="product-info-payment-info" style="">
			<div class="payment-logo col-xs-12" style="">
					<img src="/wp-content/uploads/2022/03/moretymelogo-02.png" alt="MoreTyme by Tyme Bank">

				</div>
				<div class="payment-info-text col-xs-12" style="">
					MoreTyme, Pay in 3! No Interest, No fees.
				</div>
				
				<div class="payment-actions col-xs-12" style="" align="center">
					<button class="gform_button button" style="border: 2px solid #2face2; background-color: #fff; color: #2face2; font-size: 14px; font-weight: 600;">
					<a href="https://moretyme.cellucity.co.za/" target="_blank"> See more </a>
					</button>	
				</div>

			</div>
		</div>
		 
	<?php	 
	 } else {
		echo ''; 
	 }
	
		if ($float == yes){ ?>
	
		
	<div class="payment-info" style="">
		<div class="product-info-payment-info" style="">
			<div class="payment-logo col-xs-12" style="">
					<img src="/wp-content/uploads/2022/04/Float-Logo.jpg" alt="Float">

				</div>
				<div class="payment-info-text col-xs-12" style="">
					Float, Like a budget facility, but interest-free. Always..
				</div>
				
				<div class="payment-actions col-xs-12" style="" align="center">
					<button class="gform_button button" style="border: 2px solid #2face2; background-color: #fff; color: #2face2; font-size: 14px; font-weight: 600;">
					<a href="https://float.cellucity.co.za/" target="_blank"> See more </a>
					</button>	
				</div>

			</div>
		</div>
		 
	<?php	 
	 } else {
		echo ''; 
	 }
	

	if ($vodacom == yes){ ?>
	
		
	<div class="payment-info" style="">
		<div class="product-info-payment-info" style="">
			<div class="payment-logo col-xs-12" style="">
					<img src="/wp-content/uploads/2021/10/4779-CELL-Image-Bank-vodacom-contracts.png" alt="Payjoy">

				</div>
				<div class="payment-info-text col-xs-12" style="">
					Vodacom, Apply for your contract or upgrade.
				</div>
				
				<div class="payment-actions col-xs-12" style="" align="center">
					<button class="gform_button button" style="border: 2px solid #2face2; background-color: #fff; color: #2face2; font-size: 14px; font-weight: 600;">
					<a href="https://the-hub.cellucity.co.za/contract-application/?devicename=<?php echo do_shortcode('[page_title]'); ?>" target="_blank"> Apply Now </a>
					</button>	
				</div>

			</div>
		</div>
		 
	<?php	 
	 } else {
		echo ''; 
	 }
	
	?>
	
	

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="sku_wrapper" style="padding-top: 10px">
			<label><?php esc_html_e( 'SKU:', 'ciyashop' ); ?></label> 
			<span class="sku">
				<?php
				$sku = $product->get_sku();
				if ( $sku ) {
					echo esc_html( $sku );
				} else {
					echo esc_html__( 'N/A', 'ciyashop' );
				}
				?>
			</span>
		</span>

	<?php endif; ?>

	<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in"><label>' . _n( 'Category', 'Categories', count( $product->get_category_ids() ), 'ciyashop' ) . ':</label> ', '</span>' ); // phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotE ?>

	<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as"><label>' . _n( 'Tag', 'Tags', count( $product->get_tag_ids() ), 'ciyashop' ) . ':</label> ', '</span>' ); // phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotE ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>
