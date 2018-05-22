<pre>
<?php 
$players = array(
	"Ash",
	"Tom",
	"Snake"
);

# include('connection.php');
# dbconnect("DWFC");
# 
# $query = "select * from Players";
# $result = mysqli_query($cxn,$query)
# 	or 
# die("No table");
# while($row = mysqli_fetch_assoc($result))
# {
# 	extract($row);
# 	array_push($players,$nickName);
# }




print_r($players);

shuffle($players);

print_r($players);




?>
</pre>