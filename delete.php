<html>
<head>
    
<style>
header {
    background-color:grey;
    color:black;
    text-align:center;
    padding:5px;	 
}

     
footer {
    background-color:grey;
    color:white;
    clear:both;
    padding:20px;
    margin-top: bottom;
}
</style>
</head>
    
<body>

    <header>
    <h1>Online Hotel Reservation Management System - Administrator Portal</h1>
    </header>

     <footer>
        </footer>    
</body>
</html>

<?php
require_once("db_con.php");
mysql_select_db("ohrms",$con);
$result = mysql_query("SELECT * FROM hotel");
echo "<table border='0'>
<tr>
<th>User Name </th>
<th>Password </th>
<th>Address</th>
<th>Telephone</th>
<th>email</th>
";
while($row = mysql_fetch_array($result))
{
	echo"<tr>";
	echo"<td>" . $row['username'] . "</td>";
	echo"<td>" . $row['passwd'] . "</td>";
	echo"<td>" . $row['address'] . "</td>";
	echo"<td>" . $row['telephone_number'] . "</td>";
	echo"<td>" . $row['email'] . "</td>";
	echo"<td><a href = \"delete_data.php?username=".$row['username'] . "\">Delete</a></td>";
	echo "</tr>";
	}

echo "</table>"

?>
