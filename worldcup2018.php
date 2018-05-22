<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>SGCF World Cup Predictor 2018</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<link rel="stylesheet" href="premcss.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <pre>
    <?php
    $countrys = array(
      "Russia",
      "Brazil",
      "Iran",
      "Japan",
      "Mexico",
      "Belgium",
      "South Korea",
      "Saudi Arabia",
      "Germany",
      "England",
      "Spain",
      "Nigeria",
      "Costa Rica",
      "Poland",
      "Egypt",
      "Iceland",
      "Serbia",
      "Portugal",
      "France",
      "Uruguay",
      "Argentina",
      "Colombia",
      "Panama",
      "Senegal",
      "Morocco",
      "Tunisia",
      "Switzerland",
      "Croatia",
      "Sweden",
      "Denmark",
      "Australia",
      "Peru",
    );
    sort($countrys);

    function country_options($countrys){
      echo '<select class="form-control" name="country_select" form="country_select">';
      foreach($countrys as $country){
        echo '<option value="'.$country.'">'.$country.'</option>';
      };
      echo '</select>';
    }
    // country_options($countrys);


    $goals = array(
      "<tr><th>Goals</th></td>",
      "<tr><td>The name of the first goalscorer</td><td>".country_options($countrys)."</td></tr>",
      "<tr><td>The name of the top goalscorer</td></tr>",
      "<tr><td>Team that concedes the fewest goals</td></tr>",
      "<tr><td>Team that concedes the most goals</td></tr>",
      "<tr><td>The country who scores the most goals during the tournament (excluding penalty shoot-outs)</td></tr>",
      "<tr><td>The nationality of the player who scorers goal of the tournament as decided by FIFA</td></tr>",
      "<tr><td>England’s first goalscorer (you can select ‘none’)</td></tr>",
      "<tr><td>Total number of goals during the tournament (excluding penalty shoot-outs)</td></tr>",
      "<tr><td>The country that scores the first hat-trick</td></tr>",
      "<tr><td>The total number of own goals scored in the tournament</td></tr>",
      "<tr><td>The total number of hat-tricks in the tournament</td></tr>",
      "<tr><th>Final Standings</th></td>",
      "<tr><td>The country who wins</td></td>",
      "<tr><td>The name of the player of tournament as decided by FIFA</td></tr>",
      "<tr><td>Number of English players in team of the tournament</td></tr>",
      "<tr><th>Discipline</th></td>",
      "<tr><td>The country that receives the first red card of the tournament </td></tr>",
      "<tr><td>The total number of yellow cards during the tournament</td></tr>",
      "<tr><td>The total number of red cards in the tournament</td></tr>",
      "<tr><td>The total number of penalties awarded in the tournament</td></tr>",
      "<tr><th>Matches</th></td>",
      "<tr><td>Most goals in one match</td></tr>",
      "<tr><td>Most goals by one team in a match</td></tr>",
      "<tr><td>The total Number of penalty shootouts during the tournament</td></tr>",
    );
    ?>
    </pre>
    <div class="container">
      
      <div class="row row-buffer"> <!-- Heading --> 
        <div class="col-xs-12 center">
          <h1>SGCF World Cup Predictor 2018</h1> 
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
      
      <div class="row row-buffer"> <!-- Predictions & Widgets --> 
      
        <!-- <div class="col-xs-2" align="center" > Games Widget 
        </div> -->
        
        <div class="col-xs-offset-2 col-xs-10" id="games" align="center">
          <div id="disable" class="table-responsive">
            <table class="table table-hover table-condensed shirt">
              <tbody id="result">
                <?php
                  foreach($goals as $question){
                    echo $question;
                  }
                ?>
              </tbody>
            </table>								
          </div>
          <button class="btn btn-success btn-sm" type="submit" data-toggle="modal" data-target="#myModal">Send Predictions</button>
        </div>
        
        <!-- <div class="col-xs-2" align="center" > 
        </div> -->

      </div> <!-- row -->
    </div><!-- /.container -->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <script src="prempredapp.js"></script>
  </body>
</html>
