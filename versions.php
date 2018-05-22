<!DOCTYPE html>
<html lang="en">
  <head>
	<?php #variables
	$distro ="bootstrap-3.3.6";
	?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!--link rel="icon" href="../bootstrap-3.3.6/docs/favicon.ico"-->

    <title>Tigerlilly Prod Versions</title>
    <!-- Bootstrap core CSS -->
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo $distro ?>/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo $distro ?>/docs/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	<?php include('connection.php');?>
  </head>

  <body>
	
	<?php include('nav.html');?>


	<div class="container">
			<?php

			############################################################
			# Find the latest table created
			#versions();
			dbconnect('versions');
			#$query = "select * from INFORMATION_SCHEMA.TABLES where TABLE_SCHEMA = 'versions' order by create_time;";
			#$result = mysqli_query($cxn,$query)
			#	or 
			#die("No table");

			# Read all tables into an array called $tables (Array not in use)
			# Read the latest table in to a var called $latest
			#while($row = mysqli_fetch_assoc($result))
			#{
			#	extract($row);
			#	$latest = $TABLE_NAME;
			#}
			$latest = 'current';
			############################################################
			############################################################
			# query the latest table and output in to html table 
			?>
			
	  <div class="col-xs-4">
	    <form class="form-group"  action="versions.php" method="post" id="orderby">
	      <select class="form-control" name="orderby" form="orderby">
			<option name="orderby" value="server">Hostname</option>
			<option value="product">Product Type</option>
			<option value="core">Core Version</option>
			<option value="otl">OTL Version</option>
	      </select>
	  </div>
	  <div class="col-xs-4">
	    <div class="form-group">
	      <button class="btn btn-default" type="submit">GO!</button>
	    </div>
	      </form>
	  </div>
	</div>	
	
	<div class="container-fluid">
		<div class="col-xs-12">
			<?php

			if(isset($_POST['orderby'])){
				SWITCH ($_POST['orderby']) {
					case "server":
						$orderby = "order by server";
						break;
					case "product":
						$orderby = "order by product, server";
						break;
					case "core":
						$orderby = "order by core, server";
						break;
					case "otl":
						$orderby = "order by otl, server";
						break;
				}
				setcookie("ordering", $orderby, time() + 259200);
			} elseif(isset($_COOKIE['ordering'])){
				$orderby = $_COOKIE['ordering'];
			} else {
				$orderby = NULL;
			}


			if(isset($_POST['filter'])){
				$filter = $_POST['filter'];
			} else {
				$filter = NULL; 
			}


			$query = "select * from `$latest` $orderby";
			$result = mysqli_query($cxn,$query)
				or 
			die("Table not found");


			$lables = array(
			'server' => 'Hostname',
			'product' => 'Product',
			# 'server_id' => 'Server ID',
			# 'exch_adapter' => 'Adapter Name',
			'core' => 'Core Version',
			'otl' => 'OTL Version',
			'instance' => 'Process',
			'licence' => 'Licence Expiry',
			'adapter' => 'Adapter Logging',
			'frapi' => 'Frapi Logging',
			'fix50' => 'Fix 5 Logging',
			'fix50sp1' => 'Fix 5 SP1 Logging',
			);

			echo "Table name: $latest<br />\n";
			echo '<div class="table-responsive">';
			echo "<table class='table table-condensed table-hover'>\n";

			echo "<thread><tr><th>$lables[server]</th><th>$lables[product]</th><th>$lables[core]</th><th>$lables[otl]</th><th>$lables[instance]</th><th>$lables[licence]</th><th>$lables[adapter]</th><th>$lables[frapi]</th><th>$lables[fix50]</th><th>$lables[fix50sp1]</th></tr></thread>\n";
			echo "<tbody>";
			$fp = 0;
			$ft = 0;
			while($row = mysqli_fetch_assoc($result))
			{
				extract($row);
				IF ($product == "FrontTrade") {
					$bgcolor = "class='success'";
					$ft ++; 
				} ELSE {
					$bgcolor = "class='danger'";
					$fp ++; 
				}

				if(isset($_POST['filter'])){
					if(preg_match("/{$_POST['filter']}/i",$process_name)){
					echo "<tr $bgcolor><td>$server</td>\t<td>$product</td>\t<td>$core</td>\t<td>$otl</td>\t<td>$instance</td>\t<td>$licence</td>\t<td>$adapter</td>\t<td>$frapi</td>\t<td>$fix50</td>\t\t<td>$fix50sp1</td>\t</tr>\n";
					}   
				}else{
					echo "<tr $bgcolor><td>$server</td>\t<td>$product</td>\t<td>$core</td>\t<td>$otl</td>\t<td>$instance</td>\t<td>$licence</td>\t<td>$adapter</td>\t<td>$frapi</td>\t<td>$fix50</td>\t\t<td>$fix50sp1</td>\t</tr>\n";
				}
			}
			mysqli_close($cxn);
			############################################################


			echo "</tbody>";
			echo "</table>";
			echo "</div>";
			echo "</div>";

			 
			echo "<br/>$fp FrontPrices"; 
			echo "<br/>$ft FrontTrades"; 
			?>
						
						
			
		</div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo $distro ?>/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo $distro ?>/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
