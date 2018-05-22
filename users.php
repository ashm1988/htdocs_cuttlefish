<html>
<body>
<?php

$type = "FT";
$exch = "Eris";

$users = array(
'FMET_ER_T1',
'FMET_ER_T2',
'FMET_ER_T3',
'FMET_ER_T4',
'FMET_ER_T5'
);


IF ($type == "FP"){
		
	foreach($users as $username)
	{
		$orbook = substr($username,0,strlen($username)-2)."RP";
		$pass = md5($username."$".$username);
		echo "&lt;User name=\"$username\"&gt;<br />
			&lt;FullName value=\"FME $exch Trader\"/&gt;<br />
			&lt;Passphrase value=\"$pass\"/&gt;<br />

			&lt;Roles&gt;<br />

			  &lt;Role&gt;<br />

				&lt;AccessPaths&gt;<br />

				  &lt;AccessPath&gt;<br />
					&lt;Protocol value=\"FRAPI\"/&gt;<br />
				  &lt;/AccessPath&gt;<br />
				&lt;/AccessPaths&gt;<br />

				&lt;Orderbooks&gt;<br />

				  &lt;Orderbook name=\"$orbook\"&gt;<br />
					&lt;AccessRight value=\"ReadWrite\"/&gt;<br />
				  &lt;/Orderbook&gt;<br />
				&lt;/Orderbooks&gt;<br />
				&lt;Type value=\"Trading\"/&gt;<br />
			  &lt;/Role&gt;<br />
			&lt;/Roles&gt;<br />
		  &lt;/User&gt;<br />
		  ";
	}
} ELSE {
	foreach ($users as $username)
	{
		$pass = md5($username."$".$username);
		echo "&lt;User name=\"$username\"&gt;<br />
        &lt;FullName value=\"$username Satellite User\"/&gt;<br />
        &lt;Passphrase value=\"$pass\"/&gt;<br />
        &lt;Roles&gt;<br />

          &lt;Role&gt;<br />

            &lt;AccessPaths&gt;<br />

              &lt;AccessPath&gt;<br />
                &lt;Protocol value=\"FRAPI\"/&gt;<br />
              &lt;/AccessPath&gt;<br />
            &lt;/AccessPaths&gt;<br />
            &lt;AccessRight value=\"ReadWrite\"/&gt;<br />
            &lt;Type value=\"MarketData\"/&gt;<br />
          &lt;/Role&gt;<br />
        &lt;/Roles&gt;<br />
      &lt;/User&gt;<br />
	  <br />
		  ";

		        
		  
	}
}


?>

</body>
</html>