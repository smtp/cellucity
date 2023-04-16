<?php
/**
 * The template for displaying the Brands. This page will have all the brands logos. NOT single page
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Black Friday
 *
 * @package storefront
 */

get_header();

?>
<style>

	
/*	.img-box {
  position: relative;
  width: 50%;
}

.img-box img {
  display: block;
  width: 100%;
  height: auto;
}

.img-box:hover > .overlay {
  opacity: 1;
  cursor: pointer;  
}

.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  transition: .5s ease;
  background-color: white;
}

.text {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}
	*/
	/*-----------------*/
/***** Kira *****/
/*-----------------*/
/*
figure.effect-kira {
	background: #fff;
	text-align: left;
}

figure.effect-kira img {
	-webkit-transition: opacity 0.35s;
	transition: opacity 0.35s;
}

figure.effect-kira figcaption {
	z-index: 1;
}

figure.effect-kira p {
	padding: 2.25em 0.5em;
	font-weight: 600;	
	font-size: 100%;
	line-height: 1.5;
	opacity: 0;
	-webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
	transition: opacity 0.35s, transform 0.35s;
	-webkit-transform: translate3d(0,-10px,0);
	transform: translate3d(0,-10px,0);
}

figure.effect-kira p a {
	margin: 0 0.5em;
	color: #101010;
}

figure.effect-kira p a:hover,
figure.effect-kira p a:focus {
	opacity: 0.6;
}

figure.effect-kira figcaption::before {
	position: absolute;
	top: 0;
	right: 2em;
	left: 2em;
	z-index: -1;
	height: 3.5em;
	background: #fff;
	content: '';
	-webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
	transition: opacity 0.35s, transform 0.35s;
	-webkit-transform: translate3d(0,4em,0) scale3d(1,0.023,1) ;
	transform: translate3d(0,4em,0) scale3d(1,0.023,1);
	-webkit-transform-origin: 50% 0;
	transform-origin: 50% 0;
}

figure.effect-kira:hover img {
	opacity: 0.5;
}

figure.effect-kira:hover p {
	opacity: 1;
	-webkit-transform: translate3d(0,0,0);
	transform: translate3d(0,0,0);
}

figure.effect-kira:hover figcaption::before {
	opacity: 0.7;
	-webkit-transform: translate3d(0,5em,0) scale3d(1,1,1) ;
	transform: translate3d(0,5em,0) scale3d(1,1,1);
}*/
/* Make the container relative */
.swap-on-hover {
  position: relative;	
	margin:  0 auto;
	
}

/* Select the image and make it absolute to the container */
.swap-on-hover img {
  position: absolute;
  top:0;
  left:0;
	overflow: hidden;
	/* Sets the width and height for the images*/
	
}

/* 
	We set z-index to be higher than the back image, so it's alwyas on the front.

We give it an opacity leaner to .25s, that way when we hover we will get a nice fading effect. 
*/
.swap-on-hover .swap-on-hover__front-image {
  z-index: 9999;
  transition: opacity .5s linear;
  cursor: pointer;
}

/* When we hover the figure element, the block with .swap-on-hover, we want to use > so the front-image is going to have opacity of 0, which means it will be hidden, to the back image will show */
.swap-on-hover:hover > .swap-on-hover__front-image{
  opacity: 0;
}
	@media only screen and (min-width: 768px) {
	.BFBlock {
			min-height: 450px;
		}
	}
	@media only screen and (max-width: 767px) {
		.BFBlock {
			/*width: 200px !important; */
		}
		.productBF a img {
		margin: 0 auto;
		/*width: 200px !important; 
		height: 250px;*/
		}
		
	}
	
</style>
<?php global $product;  ?>
<div id="page" class="hfeed site">
	<div class="productlist">
		<div class="" style="text-align: center !important;">
		<?php the_content(); ?>
		<br />
		</div>
	</div>
	
	<div class="row insta" style="clear: both;">
		
		<?php $product25anov = wc_get_product( '7040' ); ?>	
		
		<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 BFBlock productBF productBlock " style="text-align: center; ">
			 
			<a class="" href="<?php echo $product25anov->get_permalink() ?>" style="text-align: center; margin: 0 auto;">
				<?php echo $product25anov->get_image(); ?>
				<h4 class="woocommerce-loop-product__title" style="min-height: 30px !important;"> 
					<?php echo $product25anov->get_name(); ?> </h4>
				<span style="" class="price" >
					<?php echo $product25anov->get_price_html(); ?>
				</span>
			</a>
			<br><br>
			<a class="buttonBF" href="<?php echo $product25anov->get_permalink() ?>" style="text-align: center; background: #da00a1 !important; color: #fff !important; border-radius: 5px; padding: 0.4em 1em; font-weight: 600;">
				View Deal
			</a>
			<br><br>
			</div>
		
		
		<?php $product25nov = wc_get_product( '13799' ); ?>	
		
		<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 BFBlock productBF productBlock " style="text-align: center; ">
			 
			<a class="" href="<?php echo $product25nov->get_permalink() ?>" style="text-align: center; margin: 0 auto;">
				<?php echo $product25nov->get_image(); ?>
				<h4 class="woocommerce-loop-product__title" style="min-height: 30px !important;"> 
					<?php echo $product25nov->get_name(); ?> </h4>
				<span style="" class="price" >
					<?php echo $product25nov->get_price_html(); ?>
				</span>
			</a>
			<br><br>
			<a class="buttonBF" href="<?php echo $product25nov->get_permalink() ?>" style="text-align: center; background: #da00a1 !important; color: #fff !important; border-radius: 5px; padding: 0.4em 1em; font-weight: 600;">
				View Deal
			</a>
			<br><br>
			</div>
		
		
		<?php $product24nov = wc_get_product( '11775' ); ?>	
		
		<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 BFBlock productBF productBlock " style="text-align: center; ">
			 
			<a class="" href="<?php echo $product24nov->get_permalink() ?>" style="text-align: center; margin: 0 auto;">
				<?php echo $product24nov->get_image(); ?>
				<h4 class="woocommerce-loop-product__title" style="min-height: 30px !important;"> 
					<?php echo $product24nov->get_name(); ?> </h4>
				<span style="" class="price" >
					<?php echo $product24nov->get_price_html(); ?>
				</span>
			</a>
			<br><br>
			<a class="buttonBF" href="<?php echo $product24nov->get_permalink() ?>" style="text-align: center; background: #da00a1 !important; color: #fff !important; border-radius: 5px; padding: 0.4em 1em; font-weight: 600;">
				View Deal
			</a>
			<br><br>
			</div>	
		
		<?php $product23nov = wc_get_product( '12634' ); ?>	
		
		<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 BFBlock productBF productBlock " style="text-align: center; ">
			 
			<a class="" href="<?php echo $product23nov->get_permalink() ?>" style="text-align: center; margin: 0 auto;">
				<?php echo $product23nov->get_image(); ?>
				<h4 class="woocommerce-loop-product__title" style="min-height: 30px !important;"> 
					<?php echo $product23nov->get_name(); ?> </h4>
				<span style="" class="price" >
					<?php echo $product23nov->get_price_html(); ?>
				</span>
			</a>
			<br><br>
			<a class="buttonBF" href="<?php echo $product23nov->get_permalink() ?>" style="text-align: center; background: #da00a1 !important; color: #fff !important; border-radius: 5px; padding: 0.4em 1em; font-weight: 600;">
				View Deal
			</a>
			<br><br>
			</div>	
		
		<?php $product22nov = wc_get_product( '13715' ); ?>	
		
		<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 BFBlock productBF productBlock " style="text-align: center; ">
			 
			<a class="" href="<?php echo $product22nov->get_permalink() ?>" style="text-align: center; margin: 0 auto;">
				<?php echo $product22nov->get_image(); ?>
				<h4 class="woocommerce-loop-product__title" style="min-height: 30px !important;"> 
					<?php echo $product22nov->get_name(); ?> </h4>
				<span style="" class="price" >
					<?php echo $product22nov->get_price_html(); ?>
				</span>
			</a>
			<br><br>
			<a class="buttonBF" href="<?php echo $product22nov->get_permalink() ?>" style="text-align: center; background: #da00a1 !important; color: #fff !important; border-radius: 5px; padding: 0.4em 1em; font-weight: 600;">
				View Deal
			</a>
			<br><br>
			</div>	
		
		<?php $product21nov = wc_get_product( '12855' ); ?>	
		
		<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 BFBlock productBF productBlock " style="text-align: center; ">
			 
			<a class="" href="<?php echo $product21nov->get_permalink() ?>" style="text-align: center; margin: 0 auto;">
				<?php echo $product21nov->get_image(); ?>
				<h4 class="woocommerce-loop-product__title" style="min-height: 30px !important;"> 
					<?php echo $product21nov->get_name(); ?> </h4>
				<span style="" class="price" >
					<?php echo $product21nov->get_price_html(); ?>
				</span>
			</a>
			<br><br>
			<a class="buttonBF" href="<?php echo $product21nov->get_permalink() ?>" style="text-align: center; background: #da00a1 !important; color: #fff !important; border-radius: 5px; padding: 0.4em 1em; font-weight: 600;">
				View Deal
			</a>
			<br><br>
			</div>		
		
		<?php $product20nov = wc_get_product( '13701' ); ?>	
		
		<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 BFBlock productBF productBlock " style="text-align: center; ">
			 
			<a class="" href="<?php echo $product20nov->get_permalink() ?>" style="text-align: center; margin: 0 auto;">
				<?php echo $product20nov->get_image(); ?>
				<h4 class="woocommerce-loop-product__title" style="min-height: 30px !important;"> 
					<?php echo $product20nov->get_name(); ?> </h4>
				<span style="" class="price" >
					<?php echo $product20nov->get_price_html(); ?>
				</span>
			</a>
			<br><br>
			<a class="buttonBF" href="<?php echo $product20nov->get_permalink() ?>" style="text-align: center; background: #da00a1 !important; color: #fff !important; border-radius: 5px; padding: 0.4em 1em; font-weight: 600;">
				View Deal
			</a>
			<br><br>
			</div>
		
		<?php $product19nov = wc_get_product( '12901' ); ?>	
		
		<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 BFBlock productBF productBlock " style="text-align: center; ">
			 
			<a class="" href="<?php echo $product19nov->get_permalink() ?>" style="text-align: center; margin: 0 auto;">
				<?php echo $product19nov->get_image(); ?>
				<h4 class="woocommerce-loop-product__title" style="min-height: 30px !important;"> 
					<?php echo $product19nov->get_name(); ?> </h4>
				<span style="" class="price" >
					<?php echo $product19nov->get_price_html(); ?>
				</span>
			</a>
			<br><br>
			<a class="buttonBF" href="<?php echo $product19nov->get_permalink() ?>" style="text-align: center; background: #da00a1 !important; color: #fff !important; border-radius: 5px; padding: 0.4em 1em; font-weight: 600;">
				View Deal
			</a>
			<br><br>
			</div>
		
		<?php $product18nov = wc_get_product( '13725' ); ?>	
		
		<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 BFBlock productBF productBlock " style="text-align: center; ">
			 
			<a class="" href="<?php echo $product18nov->get_permalink() ?>" style="text-align: center; margin: 0 auto;">
				<?php echo $product18nov->get_image(); ?>
				<h4 class="woocommerce-loop-product__title" style="min-height: 30px !important;"> 
					<?php echo $product18nov->get_name(); ?> </h4>
				<span style="" class="price" >
					<?php echo $product18nov->get_price_html(); ?>
				</span>
			</a>
			<br><br>
			<a class="buttonBF" href="<?php echo $product18nov->get_permalink() ?>" style="text-align: center; background: #da00a1 !important; color: #fff !important; border-radius: 5px; padding: 0.4em 1em; font-weight: 600;">
				View Deal
			</a>
			<br><br>
			</div>
		
		<?php $product17nov = wc_get_product( '9814' ); ?>	
		
		<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 BFBlock productBF productBlock " style="text-align: center; ">
			 
			<a class="" href="<?php echo $product17nov->get_permalink() ?>" style="text-align: center; margin: 0 auto;">
				<?php echo $product17nov->get_image(); ?>
				<h4 class="woocommerce-loop-product__title" style="min-height: 30px !important;"> 
					<?php echo $product17nov->get_name(); ?> </h4>
				<span style="" class="price" >
					<?php echo $product17nov->get_price_html(); ?>
				</span>
			</a>
			<br><br>
			<a class="buttonBF" href="<?php echo $product17nov->get_permalink() ?>" style="text-align: center; background: #da00a1 !important; color: #fff !important; border-radius: 5px; padding: 0.4em 1em; font-weight: 600;">
				View Deal
			</a>
			<br><br>
			</div>
		
		<?php $product16nov = wc_get_product( '12630' ); ?>	
		
		<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 BFBlock productBF productBlock " style="text-align: center; ">
			 
			<a class="" href="<?php echo $product16nov->get_permalink() ?>" style="text-align: center; margin: 0 auto;">
				<?php echo $product16nov->get_image(); ?>
				<h4 class="woocommerce-loop-product__title" style="min-height: 30px !important;"> 
					<?php echo $product16nov->get_name(); ?> </h4>
				<span style="" class="price" >
					<?php echo $product16nov->get_price_html(); ?>
				</span>
			</a>
			<br><br>
			<a class="buttonBF" href="<?php echo $product16nov->get_permalink() ?>" style="text-align: center; background: #da00a1 !important; color: #fff !important; border-radius: 5px; padding: 0.4em 1em; font-weight: 600;">
				View Deal
			</a>
			<br><br>
			</div>
		
		<?php $product15nov = wc_get_product( '13914' ); ?>	
		
		<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 BFBlock productBF productBlock " style="text-align: center; ">
			 
			<a class="" href="<?php echo $product15nov->get_permalink() ?>" style="text-align: center; margin: 0 auto;">
				<?php echo $product15nov->get_image(); ?>
				<h4 class="woocommerce-loop-product__title" style="min-height: 30px !important;"> 
					<?php echo $product15nov->get_name(); ?> </h4>
				<span style="" class="price" >
					<?php echo $product15nov->get_price_html(); ?>
				</span>
			</a>
			<br><br>
			<a class="buttonBF" href="<?php echo $product15nov->get_permalink() ?>" style="text-align: center; background: #da00a1 !important; color: #fff !important; border-radius: 5px; padding: 0.4em 1em; font-weight: 600;">
				View Deal
			</a>
			<br><br>
			</div>

		<!--		
		<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 BFBlock productBF productBlock " style="text-align: center; clear: both; ">	
			<figure class="swap-on-hover" style="clear: both;">
 				<img  class="swap-on-hover__front-image" src="https://cellucity.co.za/wp-content/uploads/2021/11/4814-CELL-Web-Assets-BF-Dates-25Nov.jpeg"/>
				<img class="swap-on-hover__back-image" style="position: inherit; margin-bottom: 1.5em;" src="https://cellucity.co.za/wp-content/uploads/2021/11/4814-CELL-Web-Assets-BF-Product-25Nov.jpeg"/>
			</figure>
		</div> 
			
		
		<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 BFBlock productBF productBlock " style="text-align: center; ">
			 
			<a class="" href="#" style="text-align: center; margin: 0 auto;">
				<img  class="" src="https://cellucity.co.za/wp-content/uploads/2021/11/4814-CELL-Web-Assets-BF-Lock-1.jpg"/> 
				
				
			</a>
			<br><br>
			</div> 
		<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 BFBlock productBF productBlock " style="text-align: center; ">
			 
			<a class="" href="#" style="text-align: center; margin: 0 auto;">
				<img  class="" src="https://cellucity.co.za/wp-content/uploads/2021/11/4814-CELL-Web-Assets-BF-Lock-1.jpg"/> 
				
				
			</a>
			<br><br>
			</div> 
		<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 BFBlock productBF productBlock " style="text-align: center; ">
			 
			<a class="" href="#" style="text-align: center; margin: 0 auto;">
				<img  class="" src="https://cellucity.co.za/wp-content/uploads/2021/11/4814-CELL-Web-Assets-BF-Lock-1.jpg"/> 
				
				
			</a>
			<br><br>
			</div> 
		<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 BFBlock productBF productBlock " style="text-align: center; ">
			 
			<a class="" href="#" style="text-align: center; margin: 0 auto;">
				<img  class="" src="https://cellucity.co.za/wp-content/uploads/2021/11/4814-CELL-Web-Assets-BF-Lock-1.jpg"/> 
				
				
			</a>
			<br><br>
			</div> 
		<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 BFBlock productBF productBlock " style="text-align: center; ">
			 
			<a class="" href="#" style="text-align: center; margin: 0 auto;">
				<img  class="" src="https://cellucity.co.za/wp-content/uploads/2021/11/4814-CELL-Web-Assets-BF-Lock-1.jpg"/> 
				
				
			</a>
			<br><br>
			</div> -->
		<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 BFBlock productBF productBlock " style="text-align: center; ">
			 
			<a class="" href="#" style="text-align: center; margin: 0 auto;">
				<img  class="" src="https://cellucity.co.za/wp-content/uploads/2021/11/4814-CELL-Web-Assets-BF-Dates-26Nov.jpeg"/> 
				
				
			</a>
			<br><br>
			</div> 
			
		
			
			
		</div> 
	
</div>
<div style="clear: both !important;"></div>
<!--
<script type="text/javascript">
function CreateBookmarkLink(){
    var title = document.title;
    var url = window.location.href;
 
    if(window.sidebar && window.sidebar.addPanel){
        /* Mozilla Firefox Bookmark - works with opening in a side panel only � */
        window.sidebar.addPanel(title, url, "");
    }else if(window.opera && window.print) {
        /* Opera Hotlist */
        alert("Press Control + D to bookmark");
        return true;
    }else if(window.external){
        /* IE Favorite */
        try{
            window.external.AddFavorite(url, title);
        }catch(e){
                        alert("Press Control + D to bookmark");
                }            
    }else{
        /* Other */
        alert("Press Control + D to bookmark");
    }
}
</script>
 
<button class="button" href="javascript:CreateBookmarkLink();">Add to Favorites/Bookmark <br /> </button> -->
<?php

get_footer();
