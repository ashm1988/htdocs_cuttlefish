<pre>
<?php
session_start();
echo "Welcome home " . $_SESSION['login_user'];


echo "<br/>Click here to clean <a href = 'logout.php' tite = 'Logout'>Session.";



?>
</pre>