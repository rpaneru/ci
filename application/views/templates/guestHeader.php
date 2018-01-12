<div class="main-w3layouts" id="home">
	<!--top-bar-->
	<div class="top-search-bar">
            <div class="header-top-nav">
                <ul>
                    <li><a href="#" data-toggle="modal" data-target="#myModal1"><i class="fa fa-envelope" aria-hidden="true"></i>NEWSLETTER</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#myModal3"><i class="fa fa-key" aria-hidden="true"></i>LOGIN</a></li>
<!--                <li><a href="#" data-toggle="modal" data-target="#myModal4"><i class="fa fa-lock" aria-hidden="true"></i>REGISTER</a></li>-->
                </ul>
            </div>
	</div>
	<!-- Modal1 -->
		<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" >
					<div class="modal-dialog" role="document">
						<div class="modal-content modal-info">
							<div class="modal-header">
								<button type="button" class="close w3l" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4>Subscribe Now</h4>
							<!--newsletter-->
							<div class="newsletter">
                                                            <form action="#" method="post" name="subscribeForm" id="subscribeForm">
								<input type="email" name="email" size="30" placeholder="Please fill your email" class="validate[required]" />
								<input type="submit" value="Subscribe" />
							  </form>
							</div>
						<!--//newsletter-->
						</div>
					</div>
				</div>
		</div>
			<div class="clearfix"></div>

	<!-- //Modal1 -->

	<!-- Modal3 -->
		<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" >
			<div class="modal-dialog" role="document">
			<!-- Modal content-->
				<div class="modal-content news-w3l">
						<div class="modal-header">
							<button type="button" class="close w3l" data-dismiss="modal">&times;</button>
							<h4>Login Your Account</h4>
							<!--newsletter-->
							<div class="login-main wthree">
                                                            <?php
                                                            $attributes = array('id'=>'loginForm', 'method'=>'post');
                                                            echo form_open('auth/logIn', $attributes);
                                                            
                                                            $data = array(
                                                                'type'  => 'text',
                                                                'name'  => 'emailOrMobile',
                                                                'id'    => 'emailOrMobile',
                                                                'value' => set_value('emailOrMobile'),
                                                                'class' => 'validate[required,maxSize[50]]',
                                                                'placeholder' => 'Email Or Mobile',
                                                                'size' => '50'
                                                            );
                                                            echo form_input($data);
                                                            echo form_error('emailOrMobile'); 
                                                            
                                                            $data = array(
                                                                'type'  => 'password',
                                                                'name'  => 'password',
                                                                'id'    => 'password',
                                                                'value' => set_value('emailOrMobile'),
                                                                'class' => 'validate[required,minSize[8],maxSize[15]]',
                                                                'placeholder' => 'Password',
                                                                'size' => '50'
                                                            );
                                                            echo form_input($data);
                                                            echo form_error('password');                                                            
                                                            
                                                            echo $dataParam["cap"]["image"];
                                                            
                                                            $data = array(
                                                                'type'  => 'text',
                                                                'name'  => 'captcha1',
                                                                'id'    => 'captcha1',
                                                                'value' => set_value('captcha'),
                                                                'class' => 'validate[required,minSize[8],maxSize[8]]',
                                                                'placeholder' => '',
                                                                'size' => '8'
                                                            );
                                                            echo form_input($data);
                                                            echo form_error('captcha1');                                                            
                                                            ?>
								<input type="submit" value="Login">
                                                            </form>
                                                            <a href="#" data-toggle="modal" data-target="#myModalFP">Forgot Password</a>
							</div>
						<!--//newsletter-->
						</div>
					</div>
				</div>
			 </div>
			<div class="clearfix"></div>
	<!-- //Modal3 -->

	<!-- Modal4 -->
		<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" >
			<div class="modal-dialog" role="document">
			<!-- Modal content-->
				<div class="modal-content news-w3l">
						<div class="modal-header">
							<button type="button" class="close w3l" data-dismiss="modal">&times;</button>
							<h4>Register Now</h4>
							<!--newsletter-->
							<div class="login-main wthree">
							<form action="#" method="post">
								<input type="text" placeholder="Name" name="Name">
								<input type="email" placeholder="Email" required="" name="Email">
								<input type="password" placeholder="Password" name="Password1">
								<input type="password" placeholder="Confirm Password" name="Password1">
								<input type="text" placeholder="Phone Number" name="Number">
								<input type="submit" value="Register Now">
							</form>
							</div>
						<!--//newsletter-->
						</div>
					</div>
				</div>
			 </div>
			<div class="clearfix"></div>
	<!-- //Modal4-->
        
        
        
        
        
<!-- Modal5 -->
<div class="modal fade" id="myModalFP" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <!-- Modal content-->
        <div class="modal-content news-w3l">
            <div class="modal-header">
                <button type="button" class="close w3l" data-dismiss="modal">&times;</button>
                <h4>Forgot Password</h4>
                <!--forgot password-->
                <div class="login-main wthree">
                    <form action="<?php echo base_url();?>index.php/auth/forgotPassword" method="post" name="forgotPasswordForm" id="forgotPasswordForm">
                        <input type="text" placeholder="Email Or Mobile" name="emailOrMobile1" class="validate[required]">                    
                        <input type="submit" value="Submit">
                    </form>
                </div>
                <!--//forgot password-->
            </div>
        </div>
    </div>
 </div>
<div class="clearfix"></div>
<!-- //Modal5-->
        
        
        
        
        
<!--				<div class="search">
						<form action="#" method="post">
							<input type="search" placeholder="Search Here..." required="" />
							<input type="submit" value=" ">
						</form>
				</div>-->
					<div class="clearfix"></div>
	<!--//top-bar-->
	<!-- navigation -->
			<div class ="top-nav">
				<nav class="navbar navbar-default">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>

						</div>
						<!-- navbar-header -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
								<li><a href="#" class="hvr-underline-from-center active">Home</a></li>
								<li><a href="#about" class="hvr-underline-from-center scroll">About Us</a></li>
								<li><a href="#services" class="hvr-underline-from-center scroll">Services</a></li>
								<li><a href="#gallery" class="hvr-underline-from-center scroll">Gallery</a></li>
								<li><a href="#team" class="hvr-underline-from-center scroll">Our Team</a></li>
								<li><a href="#events" class="hvr-underline-from-center scroll">Events</a></li>
								<li><a href="#contact" class="hvr-underline-from-center scroll">Contact Us</a></li>
							</ul>
						</div>
						<div class="clearfix"> </div>
				</nav>
			</div>
	<!-- //navigation -->

	<div class="header">
		<!-- Slider -->
			<div class="slider">
				<div class="callbacks_container">
					<ul class="rslides" id="slider">
						<li>

							<div class="slider-info">
								<p>wisdom begins with wonder.</p>
								<h3><a href="index.html"><span>Edu</span> cational</a></h3>
								<h6>wisdom begins with wonder.</h6>
							</div>
						</li>
						<li>

							<div class="slider-info">
								<p>Education is a vaccine for violence.</p>
								<h3><a href="index.html"><span>Edu</span> cational</a></h3>
								<h6>wisdom begins with wonder.</h6>
							</div>
						</li>
						<li>

							<div class="slider-info">
								<p>wisdom begins with wonder.</p>
								<h3><a href="index.html"><span>Edu</span> cational</a></h3>
								<h6>wisdom begins with wonder.</h6>
							</div>
						</li>
						<li>

							<div class="slider-info">
								<p>Learning never exhausts the mind.</p>
								<h3><a href="index.html"><span>Edu</span> cational</a></h3>
								<h6>wisdom begins with wonder.</h6>
							</div>
						</li>

					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		<!-- //Slider -->
	</div>
</div>


<script>
function passwordFormat(field, rules, i, options)
{
    var str = $("#password").val();
    console.log(passwordFormat);
    var patt = new RegExp("^.*(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=])[a-zA-Z0-9@#$%^&+=]*$");
    var res = patt.test(str);
    if(!res)
    {
        return options.allrules.wrongPswdFormat.alertText;
    }    
}               
</script>