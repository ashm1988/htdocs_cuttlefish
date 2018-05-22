<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Steve Charity Fund Premier League Predictor 2016-2017">
    <meta name="author" content="SGCF">
    <link rel="icon" href="../../favicon.ico">

    <title>Prem Predictor 2016-2017</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="premcss.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


  </head>

  <body>
	<?php 
	include('connection.php');
	dbconnect('predictor');
	
	$query = "select * from teams";
	$result = mysqli_query($cxn,$query)
		or 
	die("No table");
	$teamsH = array();
	$teamsA = array();
	while($row = mysqli_fetch_assoc($result))
	{
		extract($row);
		$teamsH[$croppedName] = '
		<tr>
		<td><img src="'.$badge.'"/></td>
		<td>'.$displayName.'</td>
		<td><input class="form-control input-sm" type="number" id="'.$croppedName.'"></td>
		<td>Vs</td>';
		
		$teamsA[$croppedName] = '
		<td><input class="form-control input-sm" type="number" id="'.$croppedName.'"></td>
		<td>'.$displayName.'</td>	
		<td><img src="'.$badge.'"/></td>
		</tr>';
	}
	function playing($day){
		$datetime = new DateTime($day);
		$datetime->format('l jS F');
		return '<tr><th colspan="7" align="left">'. $datetime->format('l jS F') .'</th></tr>';
	}

	include('games.php');
	


	?>

    <div class="container">
	
		<div class="row row-buffer"> <!-- Heading --> 
			<div class="col-xs-12 center">
				<h1>SGCF Premier League Predictor 2016-2017 Season</h1> 
			</div>
		</div>
		
		<div class="row row-buffer"> <!-- Name & Mail --> 
			<div class="col-sm-4 col-sm-offset-4 col-xs-12">
				<form id="details">
					<div class="form-group">
						<label class="sr-only" for="firstname">First Name</label>
						<div class="input-group">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
							</div>
							<input type="text" class="form-control" id="firstname" name="firstname" required placeholder="First Name">
						</div>
					</div>
					<div class="form-group">
						<label class="sr-only" for="name">Last Name</label>
						<div class="input-group">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
							</div>
							<input type="text" class="form-control" id="lastname" required placeholder="Last Name">
						</div>
					</div>
					<div class="form-group">
						<label class="sr-only" for="name">E-mail</label>
						<div class="input-group">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-envelope"></span>
							</div>
							<input type="email" class="form-control" id="email" placeholder="CC E-mail">
						</div>
					</div>
				</form>
			</div>	
	
		</div>

		<div class="row row-buffer"> <!-- Joker -->
			<div class="col-xs-12 col-md-6 col-md-offset-3 center">
				<p> The Joker card is back. You have two to use at any point in the season to double your weeks score. You only get two so use them wisley!</p>
			</div>
			<div class="col-xs-12 col-md-4 col-md-offset-4 center">
				<div class="radio">
				  <label>
					<input type="radio" name="joker" id="joker" data-joker="yes" value="yes">
					Yes - Play my Joker! 
				  </label>
				</div>
				<div class="radio">
				  <label>
					<input type="radio" name="joker" id="joker" data-joker="no" value="no" Checked>
					No - Don't play my Joker!
				  </label>
				</div>				
			</div> 
		</div>
		
		<div class="row row-buffer"> <!-- Predictions & Widgets --> 
		
			<div class="hidden-xs hidden-sm col-md-3" align="center" > <!-- Games Widget --> 
				<div data-type="timetable" data-id="45132" id="wgt-45132" class="tap-sport-tools" style="width:200px; height:auto;"></div>
				<div id="wgt-ft-45132" style="width:196px;"><p>Football results provided by <a href="http://www.whatsthescore.com/football/england/premier-league/" target="_blank" rel="nofollow"><img src="http://medias.whatsthescore.com/upload/logo-s.png" alt="whatsthescore.com" /></a></p></div><style type="text/css">#wgt-ft-45132  {background:#FFFFFF !important;color:#484848 !important;text-decoration:none !important;padding:4px 2px !important;margin:0 !important;}#wgt-ft-45132 * {font:10px Arial !important;}#wgt-ft-45132 a {color:#484848 !important;}#wgt-ft-45132 img {vertical-align:bottom !important;height:15px !important;}</style><script type="text/javascript" src="http://tools.whatsthescore.com/load.min.js?343"></script>
			</div>
			
			<div class="col-md-6" id="games" align="center">
				<div id="disable" class="table-responsive">
					<table class="table table-hover table-condensed shirt">
						<tbody id="result">
							<?php 
								foreach($games as $game){
									echo $game;
								}
							?>
						</tbody>
					</table>
				</div>
				<button class="btn btn-success btn-sm" type="submit" data-toggle="modal" data-target="#myModal">Send Predictions</button>
			</div>
			
			<div class="hidden-xs hidden-sm col-md-3" align="center" > <!--League Table Widget -->
				<div data-type="standing" data-id="41705" id="wgt-41705" class="tap-sport-tools" style="width:205px; height:auto;"></div>
				<div id="wgt-ft-41705" style="width:201px;"><p>Livescore powered by <a target="_blank" rel="nofollow" href="http://www.whatsthescore.com">WhatstheScore.com</a></p></div><style type="text/css">#wgt-ft-41705  {background:#ffffff !important;color:#484848 !important;text-decoration:none !important;padding:4px 2px !important;margin:0 !important;}#wgt-ft-41705 * {font:10px Arial !important;}#wgt-ft-41705 a {color:#484848 !important;}#wgt-ft-41705 img {vertical-align:bottom !important;height:15px !important;}</style><script type="text/javascript" src="http://tools.whatsthescore.com/load.min.js?717"></script>
			</div>

		</div> <!-- row -->
	</div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<!--script src="prempredapp.js"></script-->
	<script src="test.js"></script>
  </body>
</html>
