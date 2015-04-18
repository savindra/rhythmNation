<div class="sticky fixed">
		<div class="top-border">
        	<div class="row">
      			<nav class="top-bar fixed" data-topbar role="navigation" data-options="sticky_on: large">
      				
                    <section class="top-bar-section">
                      <ul style="padding-top:10px;">
                          <li><a href="http://facebook.com/rhythmnation"><img src="img/icon/facebook-top-icon.png"/></a></li>
                          <li><a href="http://twitter.com/rhythmnation"><img src="img/icon/top-twitter-icon.png"/></a></li>
                          <li><a href="http://vimeo.com/rhythmnation"><img src="img/icon/top-vimeo-icon.png"></a></li>                      </ul>
                    </section>
                    
          			<section class="top-bar-section">
          				<ul class="right">
            				
                            <li class="name"><a href="myaccount.php">My Account</a></li>
                            
                            <li class="name"><a href="viewcart.php">Checkout</a></li>
                            
                            <?php
								if(isset($_SESSION['login_user'])){
									$text = "Logout";
									$target = "functions/logout.php";
								} else {
									$text = "Login/Register";
									$target = "login-register.php";
								}
							?>
                            
                            <li class="name"><a href="<?php echo $target; ?>"><?php echo $text; ?></a></li>
                            <?php
								$totalQty = 0;
								if(isset($_SESSION['products'])){
									foreach($_SESSION['products'] as $cart_itm){
										$totalQty += $cart_itm['qty'];
									}
								}
							?>
                			<li><a href="viewcart.php" class="alert button">Cart (<?php echo $totalQty; ?>)</a>
                			</li>
            			</ul>
          			</section>
      			</nav>
      		</div>
      </div>
      
      <div class="panel menu-panel">
      	<div class="row">
        	<div class="large-3 columns">
        		<a href="main.php?ref=home"><img class="left" src="img/logo.png" alt="logo" /></a>
            </div>
            <div class="large-9 columns">
            
            	<nav class="top-bar secondary-menu" data-topbar role="navigation">
          			<section class="top-bar-section top-bar-section2">
          				<ul class="right">
            				
                            <li class="name"><a href="main.php?ref=home">Home</a></li>
                            
                            <li class="has-dropdown"><a href="#">About Us</a>
                            <ul class="dropdown">
                    				<li class="has-dropdown"><a href="cv/savindra.php">Our Team</a>
                                    	<ul class="dropdown">
                                        	<li><a href="main.php?ref=oshada">Oshada</a>
                                            <li><a href="main.php?ref=pumudu">Pumudu</a>
                                        	<li><a href="main.php?ref=savindra">Savindra</a>
                                            <li><a href="main.php?ref=yesin">Yesin</a>
                                        </ul>
                                    </li>
                    			</ul>
                            </li>
                            
                            <li class="name"><a href="testimonals.php">Testimonals</a></li>
                            
                			<li class="has-dropdown"><a href="shop.php">Shop</a>
                				<ul class="dropdown">
                    				<li><a href="shop.php?ref=guitars">Guitars</a></li>
                                    <li><a href="shop.php?ref=drumsets">Drum Sets</a></li>
                                    <li><a href="shop.php?ref=keyboards">Keyboards</a></li>
                    			</ul>
                			</li>
                            
                            <li class="has-dropdown"><a href="#">Activity</a>
                				<ul class="dropdown">
                    				<li><a href="?ref=quiz">Take Quiz</a></li>
                                    <li><a href="?ref=poll">Weekly Poll</a></li>
                                    <li><a href="rate-us.php">Rate Us!</a></li>
                    			</ul>
                			</li>
                            
                            <li class="name"><a href="contact.php">Contact Us</a></li>
                            
                            
                            
            			</ul>
          			</section>
      			</nav>
            </div>
        </div>
      
      </div>
</div>
<br />
<br />
<br />
<br />
<br />
<br />
<br />




