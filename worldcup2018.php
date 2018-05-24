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
  <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<link rel="stylesheet" href="worldcup.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <?php
    $countrys = array(
      " ",
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

    function country_options($countrys, $name){
      echo '<select class="form-control" id="'.$name.'" form="country_select">';
      foreach($countrys as $country){
        echo '<option value="'.$country.'">'.$country.'</option>';
      };
      echo '</select>';
    }

    ?>

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
              <span class="error">First name is required</span>
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
            <div id='submit'>
              <button class="btn btn-success btn-sm center" type="submit"  data-toggle="modal" data-target="#myModal">Send Predictions</button>
            </div>
          </form>
        </div>	

      </div>
      
      <div class="row row-buffer"> <!-- Predictions --> 
      
        <div class="" id="games">
          <div id="disable" class="table-responsive">
            <table class="table table-hover table-condensed">
              <tbody id="result">
                <tr><th colspan='2'>Goals</th></tr>
                <tr><td>The name of the first goalscorer</td><td><input class="form-control input-sm" type="text" id="first_scorer"></td></tr>
                <tr><td>The name of the top goalscorer</td><td><input class="form-control input-sm" type="text" id="top_scorer"></td></tr>
                <tr><td>Team that concedes the fewest goals</td><td><?php country_options($countrys, "conced_fewest_goals"); ?></td></tr>
                <tr><td>Team that concedes the most goals</td><td><?php country_options($countrys, "conced_most_goals"); ?></td></tr>
                <tr><td>The country who scores the most goals during the tournament (excluding penalty shoot-outs)</td><td><?php country_options($countrys, "score_most_goals"); ?></td></tr>
                <tr><td>The nationality of the player who scorers goal of the tournament as decided by FIFA</td><td><?php country_options($countrys, "player_most_goals"); ?></td></tr>
                <tr><td>England’s first goalscorer (you can select ‘none’)</td><td><input class="form-control input-sm" type="text" id="eng_scorer"></td></tr>
                <tr><td>Total number of goals during the tournament (excluding penalty shoot-outs)</td><td><input class="form-control input-sm" type="number" id="total_goals"></td></tr>
                <tr><td>The country that scores the first hat-trick</td><td><?php country_options($countrys, "country_hat_trick"); ?></td></tr>
                <tr><td>The total number of own goals scored in the tournament</td><td><input class="form-control input-sm" type="number" id="total_owngoals"></td></tr>
                <tr><td>The total number of hat-tricks in the tournament</td><td><input class="form-control input-sm" type="number" id="total_hatticks"></td></tr>
                <tr><th colspan='2'>Final Standings</th></tr>
                <tr><td>The country who wins</td><td><?php country_options($countrys, "winner"); ?></td></tr>
                <tr><td>The name of the player of tournament as decided by FIFA</td><td><input class="form-control input-sm" type="text" id="tourn_player"></td></tr>
                <tr><td>Number of English players in team of the tournament</td><td><input class="form-control input-sm" type="number" id="eng_player"></td></tr>
                <tr><th colspan='2'>Discipline</th></tr>
                <tr><td>The country that receives the first red card of the tournament </td><td><?php country_options($countrys, "country_red_card"); ?></td></tr>
                <tr><td>The total number of yellow cards during the tournament</td><td><input class="form-control input-sm" type="number" id="yellow_cards"></td></tr>
                <tr><td>The total number of red cards in the tournament</td><td><input class="form-control input-sm" type="number" id="red_cards"></td></tr>
                <tr><td>The total number of penalties awarded in the tournament</td><td><input class="form-control input-sm" type="number" id="total_pens"></td></tr>
                <tr><th colspan='2'>Matches</th></tr>
                <tr><td>Most goals in one match</td><td><input class="form-control input-sm" type="number" id="goals_one_match"></td></tr>
                <tr><td>Most goals by one team in a match</td><td><input class="form-control input-sm" type="number" id="goals_one_team"></td></tr>
                <tr><td>The total Number of penalty shootouts during the tournament</td><td><input class="form-control input-sm" type="number" id="pen_shootouts"></td></tr>
              </tbody>

            </table>								
          </div>
          <div id='submit'>
            <button class="btn btn-success btn-sm center" type="submit"  data-toggle="modal" data-target="#myModal">Send Predictions</button>
          </div>
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
    <script src="worldcup.js"></script>

  </body>
</html>
