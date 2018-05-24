// send data to worldcupapp.php on button click
$(document).ready(function(){
	//  Name can't be blank
	$('#firstname').on('input',function(){
		var input = $(this);
		var is_name = input.val();
		if (is_name){input.removeClass("invalid").addClass("valid");}
		else {input.removeClass("valid").addClass("invalid");}
	});
	//  Name can't be blank
	$('#lastname').on('input',function(){
		var input = $(this);
		var is_name = input.val();
		if (is_name){input.removeClass("invalid").addClass("valid");}
		else {input.removeClass("valid").addClass("invalid");}
	});
	// Must be an email address
	$('#email').on('input', function(){
		var input = $(this);
		var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
		var is_email = re.test(input.val());
		if (is_email){input.removeClass("invalid").addClass("valid");}
		else {input.removeClass("valid").addClass("invalid");}
	});
	// After Form Submitted Validation
	$('#submit button').click(function(event){
		var form_data = $('#details').serialzeArray();
		var error_free = true;
		for (var input in form_data){
			var element = $('#details_'+form_data[input]['name']);
			var valid = element.hasClass("valid");
			var error_element = $('span', element.parent());
			if (!valid){error_element.removeClass("error").addClass("error_show"); error_free = false;}
			else {error_element.removeClass("error_show").addClass("error");}
		}
		if (!error_free){
			// event.preventDefault();
		}
		else{
			alert('No errors');


			event.preventDefault();
			$('#firstname').prop('disabled',true);
			$('#lastname').prop('disabled',true);
			$('#email').prop('disabled',true);
			$('#first_scorer').prop('disabled',true);
			$('#top_scorer').prop('disabled',true);
			$('#conced_fewest_goals').prop('disabled',true);
			$('#conced_most_goals').prop('disabled',true);
			$('#score_most_goals').prop('disabled',true);
			$('#player_most_goals').prop('disabled',true);
			$('#eng_scorer').prop('disabled',true);
			$('#total_goals').prop('disabled',true);
			$('#country_hat_trick').prop('disabled',true);
			$('#total_owngoals').prop('disabled',true);
			$('#total_hatticks').prop('disabled',true);
			$('#winner').prop('disabled',true);
			$('#tourn_player').prop('disabled',true);
			$('#eng_player').prop('disabled',true);
			$('#country_red_card').prop('disabled',true);
			$('#red_cards').prop('disabled',true);
			$('#yellow_cards').prop('disabled',true);
			$('#total_pens').prop('disabled',true);
			$('#goals_one_match').prop('disabled',true);
			$('#goals_one_team').prop('disabled',true);
			$('#pen_shootouts').prop('disabled',true);
			
			var $fname = $('#firstname').val();
			var $lname = $('#lastname').val();
			var $email = $('#email').val();
			var $first_scorer = $('#first_scorer').val();
			var $top_scorer = $('#top_scorer').val();
			var $conced_fewest_goals = $('#conced_fewest_goals').val();
			var $conced_most_goals = $('#conced_most_goals').val();
			var $score_most_goals = $('#score_most_goals').val();
			var $player_most_goals = $('#player_most_goals').val();
			var $eng_scorer = $('#eng_scorer').val();
			var $total_goals = $('#total_goals').val();
			var $country_hat_trick = $('#country_hat_trick').val();
			var $total_owngoals = $('#total_owngoals').val();
			var $total_hatticks = $('#total_hatticks').val();
			var $winner = $('#winner').val();
			var $tourn_player = $('#tourn_player').val();
			var $eng_player = $('#eng_player').val();
			var $country_red_card = $('#country_red_card').val();
			var $red_cards = $('#red_cards').val();
			var $yellow_cards = $('#yellow_cards').val();
			var $total_pens = $('#total_pens').val();
			var $goals_one_match = $('#goals_one_match').val();
			var $goals_one_team = $('#goals_one_team').val();
			var $pen_shootouts = $('#pen_shootouts').val();
			
			$.ajax({
				type: 'GET',
				url: 'worldcupapp.php',
				data: {
					firstname: $fname,
					lastname: $lname,
					ccemail: $email,
					first_scorer: $first_scorer,
					top_scorer: $top_scorer,
					conced_fewest_goals: $conced_fewest_goals,
					conced_most_goals: $conced_most_goals,
					score_most_goals: $score_most_goals,
					player_most_goals: $player_most_goals,
					eng_scorer: $eng_scorer,
					total_goals: $total_goals,
					country_hat_trick: $country_hat_trick,
					total_owngoals: $total_owngoals,
					total_hatticks: $total_hatticks,
					winner: $winner,
					tourn_player: $tourn_player,
					eng_player: $eng_player,
					country_red_card: $country_red_card,
					red_cards: $red_cards,
					yellow_cards: $yellow_cards,
					total_pens: $total_pens,
					goals_one_match: $goals_one_match,
					goals_one_team: $goals_one_team,
					pen_shootouts: $pen_shootouts,
	
				},
				success: function(msg){
					$('#result').html(msg);
					$('#games button').hide();
				}
			})
		}
	});
});