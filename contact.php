<?php
	// Connect to the database
    $db = mysqli_connect('localhost', 'afroblog_admin', '6g+1FsQh7B1n[O', 'afroblog_solarcalc');
	
	require_once "Mail.php"; // PEAR Mail package
    require_once ('Mail/mime.php'); // PEAR Mail_Mime packge

	if(isset($_POST['submit'])) {

		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = mysqli_real_escape_string($db, $_POST['message']);
	    
	    $query = mysqli_query($db, "INSERT INTO contact (name, email, message) 
          VALUES('$name', '$email', '$message')");

	    if($query) {
            echo "<script>alert('Your message has been sent.');</script>";
			echo "<script>window.location.href='contact.php'</script>";
					
			
			/*======== EMAIL FUNCTION ========*/  	
		    	
		    	$from = "teamstyx@afroblogit.com"; //enter your email address
                $to = "$email"; //enter the email address of the contact your sending to
                $subject = "STYX Energy"; // subject of your email
                
                $headers = array ('From' => $from,'To' => $to, 'Subject' => $subject);
                
                $text = ''; // text versions of email.
                $html = "<html><body>Hi $name,<br><br>Your message has been received, someone from our team will be in contact with you shortly to be of assistance. <br><br><small>Your number 1 Solar Power Calculator</small><br><br>Love,<br>The STYX Team</body></html>"; // html versions of email.
                
                $crlf = "\n";
                
                $mime = new Mail_mime($crlf);
                $mime->setTXTBody($text);
                $mime->setHTMLBody($html);
                
                //do not ever try to call these lines in reverse order
                $body = $mime->get();
                $headers = $mime->headers($headers);
                
                
                $host = "localhost"; // all scripts must use localhost
                $username = "teamstyx@afroblogit.com"; //  your email address (same as webmail username)
                $password = "6g+1FsQh7B1n[O"; // your password (same as webmail password)
                
                $smtp = Mail::factory('smtp', array ('host' => $host, 'auth' => true,
                'username' => $username,'password' => $password));
                
                $mail = $smtp->send($to, $headers, $body);
                
                /*======== EMAIL FUNCTION ========*/
                
    
        } else {
            echo "<script>alert('Something went wrong, please try again.');</script>";
			echo "<script>window.location.href='contact.php'</script>"; 
    
        }
        
	}
	
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="logo.png">
	<title>STYX Energy || Contact</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<!-- Bootstrap core CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.9/css/mdb.min.css" rel="stylesheet">

	<style type="text/css">
		body {
			background-image: url('background.png');
			background-size: cover;
			background-repeat: no-repeat;
		}

		.remove {
			border: none;
			background-color: transparent;
		}

		.nav-link {
			font-weight: bold;
			color: green !important;
		}

		.intro h1 {
			color: #3B722F;
			font-size:50px;
			margin-top:60px;
			text-shadow: 2px 2px #FFD635;
			margin-left: 30px;
			padding-top: 30px;
		}

		.intro h2 {
			color:#FFD635;
			margin-left: 35px;
			font-size: 25px;
		    text-shadow: 1px 1px #3B722F;
		    margin-top:10px;
		    margin-left: 8%;
		}

		.btn {
			background-color: rgb(15, 129, 19) !important;
			border-radius: 5px;
		}
		
		.navbar {
		    box-shadow: none;
		}

		.card {
		    background-color: #EFFBFE !important;
		    border: 1px solid #3B722F;
		}

	</style>

</head>
<body>

	<div class="container">

		<nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="index.php"><img src="logo.png" width="80"></a>
        
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="basicExampleNav">
        
                <ul class="navbar-nav mr-5">
                    <li class="nav-item ml-5">
        				<a class="nav-link" href="index.php">HOME</a>
        			</li>
        			
        			<li class="nav-item ml-5">
        				<a class="nav-link" href="power.php">POWER CALCULATOR</a>
        			</li>
        			
        			<li class="nav-item ml-5">
        				<a class="nav-link" href="about.html">ABOUT</a>
        			</li>
        			
        			<li class="nav-item ml-5">
        				<a class="nav-link" href="faq.html">FAQ</a>
        			</li>
        			
        			<li class="nav-item ml-5">
        				<a class="nav-link" href="contact.php">CONTACT</a>
        			</li>
        
                </ul>
        
            </div>
        </nav>
        

		<section class="card mb-4 p-5">

		    <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
    		<p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within a matter of hours to help you.</p>

    		<div class="row">
        		<div class="col-md-9 mb-5">
            		<form action="" method="post">
                		<div class="row">
		                    <div class="col-md-8">
		                    	<div class="mb-4">
		                    		<label for="name" class="">Name</label>
	                            	<input type="text" name="name" class="form-control" required> 
		                    	</div>
	                        	  
		                    	<div class="mb-4">
		                    		<label for="name" class="">Email Address</label>
	                            	<input type="text" name="email" class="form-control" required>
		                    	</div>

		                    	<div class="mb-4">
		                    		<label for="name" class="">Message</label>
		                    		<textarea type="text" name="message" class="form-control" rows="8" required></textarea>
		                    	</div>

		                    </div>

		                </div>

		                <div class="text-center text-md-left">
			                <button type="submit" name="submit" class="btn btn-success mt-3">Send<i class="fas fa-paper-plane pl-2"></i></button>
			            </div>

		            </form>

                </div>

            </form>

            
            <div class="status"></div>
        </div>

    </div>

</section>

		<footer class="text-center" style="color: green; font-weight: bold;">
	  		<div class="footer-copyright text-center py-3">Copyright © 2019 STYX ORG. All rights reserved.</div>
		</footer>

	
	</div>
	

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.9/js/mdb.min.js"></script>

</body>

</html>