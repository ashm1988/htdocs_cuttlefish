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
	dbconnect("DWFC");
	
	$query = "select * from Players";
	$result = mysqli_query($cxn,$query)
		or 
	die("No table");
	$players = "";
	while($row = mysqli_fetch_assoc($result))
	{
		extract($row);
		$players .= "
		<tr>
		<td>
			<div class='checkbox'>
				<label>
					<input type='checkbox' value='$nickName'>
					$nickName
				</label>
			</div>				
		</tr>";
	}
	
	?>
	
	<div class="container">
	
		<div class="col-md-6 col-md-offset-3 col-xs-12" id="players" align="center">
			<form>
				<table class="table table-hover table-condensed table-responsive">
					<thead>
						<tr>
						<th>Player</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							echo $players;
						?>
					</tbody>
				</table>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>	
	</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
</html>
