<pre>
<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);

echo 'You have cleaned session';
header('Refresh: 10; URL = login.php');


?>

</pre>