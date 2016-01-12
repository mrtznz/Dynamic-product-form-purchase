<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Adbullion Quiz">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Adbullion Quiz</title>
        <link rel="stylesheet" href="css/html5reset.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <!-- Success alert -->
    <div class="success-alert">Your order has been submitted. Order id:
    <div id="order-id"></div>
    </div>
    
    <section>
    	<header>
    		<img src="img/logo.png">
            <div class="validation-alert"></div>
    	</header>
    	<article>
    		<form>
				<p><label for="fullname">Full name*</label></p>
				<input id="name" name="fullname" placeholder="First and last name" required tabindex="1" type="text" autofocus>
				<p><label for="Email">E-mail*</label></p>
				<input id="email" name="email" placeholder="example@domain.com" required tabindex="2" type="email">
				<p><label for="comment">Phone*</label></p>
				<input id="phone" name="Phone" placeholder="Phone" required tabindex="3" type="number" maxlength="20">
				<p><label for="Address">Address*</label></p>
				<input id="address" name="Address" placeholder="Address" required tabindex="4" type="text">
				<p><label for="City">City*</label></p>
				<input id="city" name="City" placeholder="City" required tabindex="5" type="text">
				<p><label for="State">State*</label></p>
				<input id="state" name="State" placeholder="State" required tabindex="6" type="text">
				<p><label for="Country">Country*</label></p>
                <select id="country" name='Country' tabindex='7'></select> 
    		</form>
    		<div class="products-img">
    			<div class="product">
    			<input id="radio1" type="radio" name="product" tabindex="8" checked="checked" value="radio1">
    			<img id="img1" src="img/product-1.png" alt="product-50">
                <div class="price-50 checked"><div class="loaderImage"></div></div>
    			</div>
    			<div class="product">
    			<input id="radio2" type="radio" tabindex="9" name="product" value="radio2">
    			<img id="img2" src="img/product-2.png" alt="product-135">
    			<div class="price-135"><div class="loaderImage"></div></div>
    			</div>
    			<div class="product">
    			<input id="radio3" type="radio" tabindex="10" name="product" value="radio3">
    			<img id="img3" src="img/product-3.png" alt="product-240"> 
    			<div class="price-240"><div class="loaderImage"></div></div>    			
                </div>  			
    		</div>
    	</article>
    </section>
    <footer>
    	<div class="terms">
    	<p class="terms-title"><input id="terms-checkbox" type="checkbox" required tabindex="11" >Terms & Conditions</p>
		<p class="terms-paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
    	<div class="price-info">
    		Your Order
    		<hr>
    		<dl>
			  <dt>Product</dt>
			  <dd>$<span class="order-price"><div class="loadersmImage"></div></span></dd>
			  <dt>Shipping</dt>
			  <dd>$<span class="order-shipping"><div class="loadersmImage"></div></span></dd>
			  <span><hr></span>
			  <dt><strong>Total</strong></dt>
			  <dd>$<span class="total-price"><div class="loadersmImage"></div></span></dd>
			</dl>
    	</div>
    	<div class="submit"><input name="Submit" id="submit" tabindex="12" value="SUBMIT" type="submit"></div>
    </footer>

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="js/main.js"></script>
    </body>
</html>
