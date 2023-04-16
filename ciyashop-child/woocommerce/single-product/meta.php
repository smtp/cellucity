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
//global $order;
$Switchpay = get_field('switchpay');
$payjoy = get_field('payjoy'); 
$vodacom = get_field('vodacom'); 
$moretyme = get_field('moretyme'); 
$float = get_field('float');

$mobiPrice = $product->get_price();
//$mobiPrice = $product->get_price_html();
//var_dump($mobiPrice);
$maxTerm = 3;
$mobicredWidgetAmount = ceil($mobiPrice / $maxTerm);

//$product_subtotal = $order->get_subtotal();
//var_dump($product_subtotal);

?>
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>
	
	<?php 
	
	if ($Switchpay == 'yes' || $payjoy == 'yes' || $vodacom == 'yes' || $moretyme == 'yes'){
	?>	
	<h5 class="more-payments">More ways to pay!</h5>
	<?php 	
	}
	
	
	 if ($payjoy == 1){ ?>
	
		
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
	
	
	if ($Switchpay == 'yes'){ ?>
	
		
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
	
	if ($moretyme == 'yes'){ ?>
	
		
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
	
		if ($float == 'yes'){ ?>
	
		
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
	

	if ($vodacom == 'yes'){ ?>
	
		
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
	
	<div class="">


<!--mobicred finnce pricing-->
<!--
<style>
    #mobicredWidgetLogo {
        height: 30px;
        margin-top: 15px;
    }

    .font-size-13 {
        font-size: 13px;
    }

    .font-weight-bold {
        font-weight: bold;
    }

    .mt-20 {
        margin-top: 20px;
    }

    .mb-0 {
    margin-bottom: 0px;
	}

    .mobicredApplyButton {
        font-size: 13px;
        margin-top: 5px;
        display: inline-block;
        color: #13A7A8;
    }

    .mobicredApplyButton:hover {
        color: #0d6868;
        text-decoration: none;
    }

    #mobicredWidgetAmount {
        font-weight: bold;
    }
</style>

    <div style="border: 1px solid #f0f0f0; border-radius: 5px; padding: 10px; margin-bottom: 20px;" class="row">
        <div class="col-xs-12 col-sm-12 col-md-4">
            <a target="_blank" href="https://mobicred.co.za">
                <img id="mobicredWidgetLogo" src="https://mobicred.co.za/images/logo-mobicred-grey.png" alt="Mobicred">
            </a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8">
            <input id="mobicredSalePrice" value="<?php echo $mobiPrice; ?>" type="hidden">
            <p class="font-weight-bold font-size-13 mb-0">Get it on credit with Mobicred.</p>
            <p class="font-size-13 mb-0">Only <span id="mobicredWidgetAmount"></span> per month for 12 months.
            </p>
            <a class="mobicredApplyButton" target="_blank"
                href="https://live.mobicred.co.za/cgi-bin/wspd_cgi.sh/WService=wsb_mcrliv/run.w?run=application&merchantID=&returnUrl=https://cellucity.co.za">Apply
                now</a>
        </div>
    </div>-->

<!--
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>	-->
<!--
<script type="text/javascript">
( function($) {
    $(document).ready(function () {

        var amount = $('#mobicredSalePrice').val();
        var data = amount;
		
        $.ajax({
            method: 'GET',
            url: 'https://api.mobicred.co.za/rates/' + amount + '/?key=0002467a-94e2-417f-a345-e9971be1f145',
            data: data,
            dataType: "json",
            success: function (data) {
                if ($.isEmptyObject(data.error)) {
                    console.log(data);
                    $('#mobicredWidgetAmount').text('R' + data.instalment)
                } else {
                    console.log(data);
                }
            }
        });


    });
});
</script>-->
		<!--<h4 style="font-weight: 600; font-size: 16px; color: #2face2; margin-bottom: 20px ">More ways to pay </h4> -->
<?php
// Model content
		
		
		
            $content1 = '<div><iframe src="https://cellucity.co.za/moretyme-how-it-works/" style="max-width:100%;" width="800" height="850"></iframe></div>';

			$img = 'https://cellucity.co.za/wp-content/uploads/2022/09/moretymelogo-03.png';
	            // Display modal / trigger
            $html = '<div class="float-lightbox" style="line-height: 1.6; border: 1px solid #f0f0f0; padding: 10px;">';

            $html .= '<img src="' . $img . '" alt="MoreTyme" />';
			$html .= 'Pay as little as <span id="" class="float-highlight"> R' . $mobicredWidgetAmount . '</span><span class="float-highlight"> / month for 3 months</span>, MoreTyme, Pay in 3! No Interest, No fees.</span><a href="#" data-featherlight="#floatLightbox1" style="text-decoration:underline !important;">How it works</a>';
            $html .= '<div style="display:none;"><div id="floatLightbox1">' . $content1 . '</div></div>';
            $html .= '<div class="float-clear"></div>';
            $html .= '</div>';
            $html .= '';
			
			//var_dump($floatprice);
			//echo wp_kses_post($html);

			if($floatprice <= '10000' ){
				echo wp_kses_post($html);
			};


			echo do_shortcode( '[payflex_widget]' );
			echo do_shortcode( '[float_widget]' );
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
