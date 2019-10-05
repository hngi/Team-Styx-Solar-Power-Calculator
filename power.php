<?php

	session_start();



	$status = "";

	

	if (isset($_POST['app']) && !empty($_POST['qty']) && !empty($_POST['app']) && !empty($_POST['volt']) && !empty($_POST['amp']) && !empty($_POST['hrs'])) {



		$qty = $_POST['qty'];

		$app = $_POST['app']; 

		$volt = $_POST['volt'];

		$amp = $_POST['amp'];

		$hrs = $_POST['hrs'];



		$cartArray = array(

			$app=>array(

			'qty'=>$qty,

			'app'=>$app,

			'volt'=>$volt,

			'amp'=>$amp,

			'hrs'=>$hrs,

			'sun'=>0,

			'spwatt'=>260)

		);



		if(empty($_SESSION["tray"])) {

			$_SESSION["tray"] = $cartArray;



		} else {

			$array_keys = array_keys($_SESSION["tray"]);

			if(in_array($app,$array_keys)) {

				$status = "";



			} else {

				$_SESSION["tray"] = array_merge($_SESSION["tray"],$cartArray);

			}



		}

	}





	/*====== RESULT ======*/



	if (isset($_POST['action']) && $_POST['action']=="remove") {

		if(!empty($_SESSION["tray"])) {

			foreach($_SESSION["tray"] as $key => $value) {

				

				if($_POST["app"] == $key) {

					unset($_SESSION["tray"][$key]);

				}

				

				if(empty($_SESSION["tray"]))

					unset($_SESSION["tray"]);

			}		

		}

	}



	

	if (isset($_POST['action']) && $_POST['action']=="change") {

		foreach($_SESSION["tray"] as &$value) {

			if($value['app'] === $_POST["app"]) {

			    $value['sun'] = $_POST["sun"];

			    break;

			}

		}

	  	

	}



	if (isset($_POST['action']) && $_POST['action']=="result") {

		foreach($_SESSION["tray"] as &$value) {

			if($value['app'] === $_POST["app"]) {

			    $value['spwatt'] = $_POST["spwatt"];

			    break;

			}

		}

	  	

	}



	/*======RESET BUTTON ======*/



	if (isset($_POST['reset'])) {

		session_unset();

		session_destroy();

	}



?>





<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <link rel="icon" type="image/png" href="logo.png">

	<title>STYX Energy || Power Calculator</title>

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

		

		.navbar {

		    box-shadow: none;

		}

		

		.card {

		    background-color: #EFFBFE !important;

		    border: 1px solid #3B722F;

		}



		.btn {

			background-color: #3B722F;

			color: white;

		}



		.btn:hover {

			color: white;

		}



	</style>
<script>
            function run() {
                var x =document.getElementById("srt");
                x.innerHTML=document.getElementById("Ultra").value;
            }
        </script>
</head>
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





		<div class="row mt-2 mb-5">

			<div class="col-md-4">

				<div class="card p-4">

					<?php

						if(!empty($_SESSION["tray"])) {

							$cart_count = count(array_keys($_SESSION["tray"]));

						}

					?>



					<form method="post" action="">

						<div class="mt-3">

							<label for="defaultFormEmailModalEx">Appliance</label>

	        				<input type="text" name="app" class="form-control form-control-lg" required>

						</div>



						<div class="mt-3">

							<label for="defaultFormEmailModalEx">Quantity</label>

	        				<input type="number" name="qty" class="form-control form-control-lg" required>

						</div>



						<div class="row">

							<div class="col">

								<div class="mt-3">

									<label for="defaultFormEmailModalEx">Voltage</label>

			        				<input type="number" name="volt" class="form-control form-control-lg" required>

								</div>

							</div>



							<div class="col">

								<div class="mt-3">

									<label for="defaultFormEmailModalEx">Current</label>

			        				<input type="number" name="amp" class="form-control form-control-lg" required>

								</div>

							</div>

						</div>



						<div class="mt-3">

							<label for="defaultFormEmailModalEx">Hours On per Day</label>

	        				<input type="number" name="hrs" class="form-control form-control-lg" required>

						</div>

						

						<div class="text-center py-4 mt-3">

					        <button class="btn" type="submit" name="submit">Add</button>

					    </div>

						

					</form>

				</div>

			</div>



			<div class="col-md-8">

				<div class="card p-4" style="height: 100%">

					<?php

						if(isset($_SESSION["tray"])) {

							$totalqty = 0;

							$totalhrs = 0;

					    	$totalwatthoursperday = 0;

					    	$Watthoursperday = 0;

					    	$totalpanelneeded = 0;

					    	$totalwatthoursperhour = 0;

					    	$Killowatthourspermonth = 0;

					    	$solarpanelsystemsize = 0;

					    	$numberofpanels = 0;

					?>



					<table class="table table-striped table-responsive">

						<tbody>

							<thead>

								<tr>

									<th></th>

									<th class="font-weight-bold">APPLIANCE</th>

									<th class="font-weight-bold">QUANTITY</th>

									<th class="font-weight-bold">VOLATGE</th>

									<th class="font-weight-bold">AMP</th>

									<th class="font-weight-bold">HOURS</th>

									<th class="font-weight-bold">Watt-hours per day</th>

								</tr>

							</thead>	

							

							<?php		

								foreach ($_SESSION["tray"] as $product) {

							?>

			

							

							<tr>

								<td class="text-center">

									<form method='post' action=''>

										<input type='hidden' name='app' value="<?php echo $product["app"]; ?>">

										<input type='hidden' name='action' value="remove">

										<button type='submit' class="remove"><i class="far fa-trash-alt red-text"></i></button>

									</form>

								</td>



								<td class="text-center"><?php echo $product["app"]; ?></td>

								

								<td class="text-center"><?php echo $product["qty"]; ?></td>

								

								<td class="text-center"><?php echo $product["volt"]; ?></td>



								<td class="text-center"><?php echo $product["amp"]; ?></td>



								<td class="text-center"><?php echo $product["hrs"]; ?></td>



								<td class="text-center">

									<?php

										$Watthoursperday = ($product["qty"]*$product["volt"]*$product["amp"]*$product["hrs"]);

										echo $Watthoursperday;

									?>

										

								</td>



							</tr>

				

							<?php

								$totalqty += ($product["qty"]);

								$totalhrs += ($product["hrs"]);

								$totalwatthoursperday += ($Watthoursperday);



								$avgqtyhrs = ($totalqty * $totalhrs) / 2;

								$totalwatthoursperhour = $totalwatthoursperday / $avgqtyhrs;

								$totalpanelneeded = (($totalwatthoursperhour / 5));

								$Killowatthourspermonth = ($totalwatthoursperday * 30) / 1000;

								$solarpanelsystemsize = $Killowatthourspermonth / ($product["sun"] * 30);

								$numberofpanels = ceil(($solarpanelsystemsize * 1000) / $product["spwatt"]);



								}

							?>



								

							<tr>

								<td colspan="7">

									<strong><span style="font-weight: bold;">Total Watt Hours per Day:</span> <?php echo $totalwatthoursperday; ?> Wh</strong>

								</td>

							</tr>





							<tr>

								<td colspan="7">

									<strong><span style="font-weight: bold;">Killowatt Hours Per Month:</span> <?php echo $Killowatthourspermonth; ?> Kwh/mo</strong>

								</td>

							</tr>



							<tr>

								<td colspan="7">

									<strong><span style="font-weight: bold;">Sunlight Exposure per Day (Select Area):</span></strong>

									

									<form method="post" action="">

										<input type="hidden" name="app" value="<?php echo $product["app"];?>">

										<input type="hidden" name="action" value="change">

										<select name="sun" id="ultra" onchange="this.form.submit()" class="form-control">

											<option value="0">Select State</option>
								            
								            <option <?php if($product["sun"]==5) echo "selected";?> value="5">Abia</option>
								            
								            <option <?php if($product["sun"]==8) echo "selected";?> value ="8">Abuja</option>
								            
								            <option <?php if($product["sun"]==9) echo "selected";?> value="9">Adamawa</option>
								            
								            <option <?php if($product["sun"]==5.01) echo "selected";?> value="5.01">Akwa Ibom</option>
								            
								            <option <?php if($product["sun"]==5.5) echo "selected";?> value="5.5">Anambra</option>
								            
								            <option <?php if($product["sun"]==8.5) echo "selected";?> value="8.5">Bauchi</option>
								            
								            <option <?php if($product["sun"]==5.51) echo "selected";?> value="5.51">Bayelsa</option>
								            
								            <option <?php if($product["sun"]==7.5) echo "selected";?> value="7.5">Benue</option>
								            
								            <option <?php if($product["sun"]==11) echo "selected";?> value="11">Borno</option>
								            
								            <option <?php if($product["sun"]==5.02) echo "selected";?> value="5.02">CrossRiver</option>
								            
								            <option <?php if($product["sun"]==4.5) echo "selected";?> value="4.5">Delta</option>
								            
								            <option <?php if($product["sun"]==5.502) echo "selected";?> value="5.502">Ebonyi</option>
								            
								            <option <?php if($product["sun"]==5.03) echo "selected";?> value="5.03">Enugu</option>
								            
								            <option <?php if($product["sun"]==6) echo "selected";?> value="6">Edo</option>
								            
								            <option <?php if($product["sun"]==5.53) echo "selected";?> value="5.53">Ekiti</option>
								            
								            <option <?php if($product["sun"]==9.5) echo "selected";?> value="9.5">Gombe</option>
								            
								            <option <?php if($product["sun"]==6.01) echo "selected";?> value="6.01">Imo</option>
								            
								            <option <?php if($product["sun"]==9.51) echo "selected";?> value="9.51">Jigawa</option>
								            
								            <option <?php if($product["sun"]==10.5) echo "selected";?> value="10.5">Kaduna</option>
								            
								            <option <?php if($product["sun"]==10.51) echo "selected";?> value="10.51">Kano</option>
								            
								            <option <?php if($product["sun"]==11) echo "selected";?> value="11">Katsina</option>
								            
								            <option <?php if($product["sun"]==11.1) echo "selected";?> value="11.1">Kebbi</option>
								            
								            <option <?php if($product["sun"]==7.51) echo "selected";?> value="7.51">Kogi</option>
								            
								            <option <?php if($product["sun"]==6.5) echo "selected";?> value="6.5">Kwara</option>
								            
								            <option <?php if($product["sun"]==6.02) echo "selected";?> value="6.02">Lagos</option>
								            
								            <option <?php if($product["sun"]==8.51) echo "selected";?> value="8.51">Nassarawa</option>
								            
								            <option <?php if($product["sun"]==9.01) echo "selected";?> value="9.01">Niger</option>
								            
								            <option <?php if($product["sun"]==5.54) echo "selected";?> value="5.54">Ogun</option>
								            
								            <option <?php if($product["sun"]==5.04) echo "selected";?> value="5.04">Ondo</option>
								            
								            <option <?php if($product["sun"]==5.1) echo "selected";?> value="5.1">Osun</option>
								            
								            <option <?php if($product["sun"]==5.501) echo "selected";?> value="5.501">Oyo</option>
								            
								            <option <?php if($product["sun"]==9.02) echo "selected";?> value="9.02">Plateau</option>
								            
								            <option <?php if($product["sun"]==6.03) echo "selected";?> value="6.03">Rivers</option>
								            
								            <option <?php if($product["sun"]==10.52) echo "selected";?> value="10.52">Sokoto</option>
								            
								            <option <?php if($product["sun"]==10) echo "selected";?> value="10">Taraba</option>
								            
								            <option <?php if($product["sun"]==9.52) echo "selected";?> value="9.52">Yobe</option>
								            
								            <option <?php if($product["sun"]==10.53) echo "selected";?> value="10.53">Zamfara</option>
								            

										</select>
										
										<label id ="srt" >**Hours</label><br>
									
									</form>

								</td>

							</tr>



							<tr>

								<td colspan="7">

									<strong><span style="font-weight: bold;">Solar Panel System Size:</span> <?php echo $solarpanelsystemsize; ?> kW solar energy system</strong>

								</td>

							</tr>





							<tr>

								<td colspan="7">

									<strong><span style="font-weight: bold;">Solar Panel Wattage – Actual Power Production PER PANEL (in Watts):</span></strong>

									

									<form method="post" action="">

										<input type="hidden" name="app" value="<?php echo $product["app"];?>">

										<input type="hidden" name="action" value="result">



										<select name="spwatt" onchange="this.form.submit()" class="form-control">

											<option <?php if($product["spwatt"]==260) echo "selected";?> value="260">260</option>

											

											<option <?php if($product["spwatt"]==290) echo "selected";?> value="290">290</option>

											

											<option <?php if($product["spwatt"]==300) echo "selected";?> value="300">300</option>

											

											<option <?php if($product["spwatt"]==325) echo "selected";?> value="325">325</option>

											

										</select>

									</form>



								</td>

							</tr>



							<tr>

								<td colspan="7">

									<strong><span style="font-weight: bold;">Number of Solar Panel:</span> <?php echo $numberofpanels; ?></strong>

								</td>

							</tr>



						</tbody>

					</table>



					<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

						<div class="text-center py-4 mt-3">

					        <button class="btn btn-danger" type="submit" name="reset">Reset</button>

					    </div>

					</form>

					

					<div class="sbutton">

                       <a href="http://pdf-ace.com/pdfme" target="_blank"><button>Save As PDF</button></a>

                   </div>


				  	<?php } else { ?>



					<div class="alert alert-danger text-center mt-5" role="alert">

					 	Your tray is empty!

					</div>

					

					<?php } ?>

					

				</div>

			</div>

		</div>



		<div class="text-right">

			<a data-toggle="modal" data-target="#basicExampleModal">

				<i class="fas fa-question-circle green-text fa-5x"></i>

			</a>

		</div>





		<!-- Popup -->

		<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">

			<div class="modal-dialog modal-lg" role="document">

				<div class="modal-content p-5">

					<div>

						<img src="logo.png" width="100px">

					</div>

					<div class="mt-3">

						<h5 class="text-center font-weight-bold" id="exampleModalLabel"><i class="fas fa-question-circle green-text" style="font-size: 45px;"></i> Help/How to use</h5>

						

					</div>

					

					<div class="modal-body">

						<p class="text-justify font-weight-bold" style="color: #407434; line-height: 40px;">

						<span>Welcome!</span> <br><br>

						This is a Solar Power Calculator, it helps you calculate the total power usage of your appliances per day and determine the number of solar panels needed to effectively power such appliances per day. Firstly, you have to inpute the name of the appliance and the voltage and current of the appliance. Next is to input the quantity (that is how many of the aplliances do you have presently) and also input the number of hours these appliances are on per day. Then press add to put them on the the tray which automatically calculates the power usage. Secondly, to determine the number of solar panels needed to output such power daily, select the sunlight exposure per day in your area. Next is to select the choice of solar panel type, the calculator automatically gives you an average number of solar panels needed. <br>

						NOTE** You can add as many appliances as possible and the calculator automatically outputs the results.</p>

					</div>

					

					<div class="text-right mr-5">

						<button type="button" class="btn" data-dismiss="modal">Exit</button>

					</div>

				</div>

			</div>

		</div>



		

	</div>



	<footer class="" style="color: green; font-weight: bold;">

  		<div class="footer-copyright text-center py-3">Copyright © 2019 STYX ORG. All rights reserved.</div>

	</footer>

	





	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.9/js/mdb.min.js"></script>



</body>



</html>