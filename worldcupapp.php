<?php
// include('connection.php');
// ehostdb();

// $query = "select * from teams";
// $result = mysqli_query($cxn,$query)
// 	or 
// die("No table");
// $teamsH = array();
// $teamsA = array();
// while($row = mysqli_fetch_assoc($result))
// {
// 	extract($row);
// 	$teamsH[$croppedName] = '
// 	<tr>
// 	<td>'.$displayName.'</td>
// 	<td>'.$_GET[$croppedName].'</td>
// 	<td>Vs</td>';
	
// 	$teamsA[$croppedName] = '
// 	<td>'.$_GET[$croppedName].'</td>
// 	<td>'.$displayName.'</td>	
// 	</tr>';
	
// 	$teamsH2[$croppedName] = '<tr><td>'.$displayName.'</td><td>'.$_GET[$croppedName].'</td><td>Vs</td>';
	
// 	$teamsA2[$croppedName] = '
// 	<td>'.$_GET[$croppedName].'</td>
// 	<td>'.$displayName.'</td>	
// 	</tr>';	

// }

// function playing($day){
// 	$datetime = new DateTime($day);
// 	$datetime->format('l jS F');
// 	return '<tr><th colspan="7" align="left">'. $datetime->format('l jS F') .'</th></tr>';
// }

//Persons name
$firstname = $_GET['firstname'];
$lastname = $_GET['lastname'];
//Joker
$joker = "Joker played: " . $_GET['joker'];
//Team Variables
//echo $firstname . $lastname . $ccemail . $joker;


$body .= '<table class="table table-hover table-condensed">'
$body .= '<tbody>'
$body .= '<tr><th colspan="2">Goals</th></tr>'
$body .= '<tr><td>The name of the first goalscorer</td><td>'.$_GET["first_scorer"].'</td></tr>';
$body .= '<tr><td>The name of the top goalscorer</td><td>'.$_GET["top_scorer"].'</td></td></tr>';
$body .= '<tr><td>Team that concedes the fewest goals</td><td>'.$_GET["conced_fewest_goals"].'</td></tr>';
$body .= '<tr><td>Team that concedes the most goals</td><td>'.$_GET["conced_most_goals"].'</td></tr>';
$body .= '<tr><td>The country who scores the most goals during the tournament (excluding penalty shoot-outs)</td><td>'.$_GET["score_most_goals"].'</td></tr>';
$body .= '<tr><td>The nationality of the player who scorers goal of the tournament as decided by FIFA</td><td>'.$_GET["player_most_goals"].'</td></tr>';
$body .= '<tr><td>England’s first goalscorer (you can select ‘none’)</td><td>'.$_GET["eng_scorer"].'</td></tr>';
$body .= '<tr><td>Total number of goals during the tournament (excluding penalty shoot-outs)</td><td>'.$_GET["total_owngoals"].'</td></tr>';
$body .= '<tr><td>The country that scores the first hat-trick</td><td>'.$_GET["country_hat_trick"].'</td></tr>';
$body .= '<tr><td>The total number of own goals scored in the tournament</td><td>'.$_GET["total_owngoals"].'</td></tr>';
$body .= '<tr><td>The total number of hat-tricks in the tournament</td><td>'.$_GET["total_hatticks"].'</td></tr>';
$body .= '<tr><th colspan="2">Final Standings</th></tr>';
$body .= '<tr><td>The country who wins</td><td>'.$_GET["winner"].'</td></tr>';
$body .= '<tr><td>The name of the player of tournament as decided by FIFA</td><td>'.$_GET["tourn_player"].'</td></tr>';
$body .= '<tr><td>Number of English players in team of the tournament</td><td>'.$_GET["eng_player"].'</td></tr>';
$body .= '<tr><th colspan="2">Discipline</th></tr>';
$body .= '<tr><td>The country that receives the first red card of the tournament </td><td>'.$_GET["country_red_card"].'</td></tr>';
$body .= '<tr><td>The total number of yellow cards during the tournament</td><td>'.$_GET["red_cards"].'</td></tr>';
$body .= '<tr><td>The total number of red cards in the tournament</td><td>'.$_GET["yellow_cards"].'</td></tr>';
$body .= '<tr><td>The total number of penalties awarded in the tournament</td><td>'.$_GET["total_pens"].'</td></tr>';
$body .= '<tr><th colspan="2">Matches</th></tr>';
$body .= '<tr><td>Most goals in one match</td><td>'.$_GET["goals_one_match"].'</td></tr>';
$body .= '<tr><td>Most goals by one team in a match</td><td>'.$_GET["goals_one_team"].'</td></tr>';
$body .= '<tr><td>The total Number of penalty shootouts during the tournament</td><td>'.$_GET["pen_shootouts"].'</td></tr>';
$body .= '</tbody>'
$body .= '</table>'


echo $body;

//CC to
$ccemail = $_GET['ccemail'];
//Subject
$emailSubject = $firstname .' '. $lastname .' '. ' Final Week Predictions 2018';
//send to
$webMaster = "stevecharityfund@hotmail.co.uk";
// headers
$header = "Content-type: text/html; charset=iso-8859-1 \r\n";
$header .= "Cc: $ccemail \r\n";
$header .= "Bcc: ashisgreat15@hotmail.com \r\n";
$header .= "Bcc: Macgregorw2@hotmail.com \r\n";
$header .= "From: stevecharityfund@hotmail.co.uk \r\n";


//send mail
$sucess = mail($webMaster,$emailSubject,$body,$header);


?>
