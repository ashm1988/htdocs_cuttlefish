<pre>
<?php
###################################################################
# works out the session position of an audit log                  #
###################################################################

$user = "/LFMEG1/";
$contract = "/YTU7/";
$type = strtoupper("/EXECUTION/");
$direction = strtoupper("/FROM EXCHANGE/");
$buy = 0;
$buytotal =0;
$sell = 0;
$selltotal = 0;

$line = file('C:\Users\amcfarlane\Documents\temp\ALC-PRD-LIN-030_audit\Audit.20170630_new2.csv'); # open the line as an array split by data
$heading = array_flip(explode(",",$line[0])); #create heading array
echo $line[0]; #print heading on top data

#for each data of the line match the below against what is set at the top of the line
foreach($line as $line){
    $data = explode(",",$line);
    if(preg_match($type,$data[$heading["Action"]])
		&& preg_match($contract,$data[$heading["Trading Code"]])
		&& preg_match($user,$data[$heading["Clearing Account"]])
		&& preg_match($direction,$data[$heading["Message Direction"]]))
	{
		echo $line;
		if($data[$heading["Buy/Sell Indicator"]] == "Buy"){
			$buytotal = $buytotal + $data[$heading["Quantity"]];
			$buy++;
		} else {
			$selltotal = $selltotal + $data[$heading["Quantity"]];
			$sell++;
		}
    }
}

$buyselldiff = $buy - $sell;
$sessionpos = $buytotal - $selltotal;
echo <<<EOD

Buys: $buy
Sells: $sell
Buy/Sell Difference: $buyselldiff

Buy Quantity: $buytotal
Sell Quantity: $selltotal
Session Position: $sessionpos
EOD;

?>
</pre>

<!-- 4.0.9 Audit Heading reference

    [Server ID]
    [Server Transaction Number]
    [Server Process Date]
    [Server Timestamp]
    [Exchange]
    [Adapter Code]
    [Message Direction]
    [Status]
    [Action]
    [Executing Firm ID]
    [Session ID]
    [Order ID]
    [Message Link ID]
    [Client Correlation ID]
    [Client Transaction ID]
    [Exchange Order ID]
    [Exchange Correlation ID]
    [Exchange Transaction ID]
    [Fill Reference]
    [Buy/Sell Indicator]
    [Quantity]
    [Residual Quantity]
    [Cumulative Traded Quantity]
    [Display Quantity]
    [Trading Code]
    [Product]
    [Maturity Date]
    [CFI Code]
    [Put/Call Indicator]
    [Strike Price]
    [Limit Price]
    [Stop Price]
    [Fill Price]
    [Order Type]
    [Time in Force]
    [Order Expiry]
    [Exchange User ID]
    [FR User ID]
    [Client Protocol]
    [Risk Account]
    [Clearing Account]
    [CTI]
    [Origin]
    [Give Up Firm]
    [Give Up Account]
    [Give Up Indicator]
    [Sender Location ID]
    [Manual Order Indicator]
    [Message]

-->