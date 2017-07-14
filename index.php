<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Contact Form</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
	<body>
     
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
                         <h2 class="contact-title">Contact US</h2>
					</div>
				</div>
						
				<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
				<div class="row">
					 <div class="col-md-6">
						<p>United Nations University, C3 - 7F, 53-70, Jingumae 5-chome, Shibuya-ku, Tokyo 150-8925</p>
                     </div>
				</div>
					
				<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
				<div class="row">
					<div class="col-md-6">
						<p>+81 (0)3 5467 1212</p>
					</div>
				</div>
			
                <div class="row" style="border: solid 1px #000000;"></div>
					<div class="col-md-12">
						<div class="row">
							<h2 class="contact-title">Get In Touch</h2>
						</div>
					</div>
					
				<form id="contact-form" method="post" action="contact.php" role="form">
					<div class="messages"></div>
						<div class="controls">
							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="form_name">Name *</label>
										<input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your name" required="required" data-error="Name is required.">
									<div class="help-block with-errors"></div>
									</div>
								</div>
							</div>
        
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="form_email">Email *</label>
										<input id="form_email" type="email" name="email" class="form-control" placeholder="example@domain.com " required="required" data-error="Valid email is required.">
									<div class="help-block with-errors"></div>
									</div>		
								</div>
							</div>
			
							<div class="row">	
								<div class="col-md-6">
									<div class="form-group">
										<label for="form_phone">Phone</label>
										<input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Please enter your phone">
									<div class="help-block with-errors"></div>
									</div>
								</div>
							</div>
						</div>
		
		
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="form_subject">Subject *</label>
										<textarea id="form_subject" name="subject" class="form-control" placeholder="Subject " rows="4" required="required" data-error="Enter Subject"></textarea>
									<div class="help-block with-errors"></div>
									</div>
								</div>
							</div>
		
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="form_message">Message *</label>
										<textarea id="form_message"  name="message" class="form-control" placeholder="Message for me " rows="4" required="required" data-error="Please,leave us a message."></textarea>
									<div class="help-block with-errors"></div>
									</div>
								</div>
							</div>	
							
							
							
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Captcha:</label>
										<div class="g-recaptcha" data-sitekey="6LfK7ygUAAAAAAKWvL_ADY0VXo4upAK321VWiKmP"></div>
									</div>
								</div>
							</div>	
		
							<div class="row">
								<div class="col-md-12">
									<input type="submit" class="btn btn-success btn-send" value="Send message">
								</div>
							</div>
        </div>
		
							<div class="row">
								<div class="col-md-12">
									<p class="text-muted"><strong>*</strong> These fields are required. </p>
								</div>
							</div>
		</div>

				</form> 
				
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="contact.js"></script>
	<script src="https://www.google.com/recaptcha/api.js"></script>
	
	</body>
</html>