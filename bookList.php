<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php
                                //Conencting to MySQL Database from here.
$username = "mirhawk";
$password = "apache";
$hostname = "127.0.0.1"; 
$dbname = "examples";

                                //Connection to the MySQL.

$dbhandle = mysqli_connect($hostname, $username, $password)     
 or die("Unable to connect to MySQL");                      //Creating a handle to MySQL.

                                //Select a database to work with.
$selected = mysqli_select_db($dbhandle,$dbname) 
  or die("Could not select examples");
                                //Done Connecting to MySQL Database.


                               //Obtaining values from database and displaying them using automated table for items available.
$result = mysqli_query($dbhandle,"SELECT * FROM Persons");
              
                                //Code for automated table for items
$place="center";

echo "
        <div style='text-align:center'>
        <div position: absolute; top: 50%;>

        <table border='0' align='$place'>
        <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        </tr>";

while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['FirstName'] . "</td>";
        echo "<td>" . $row['LastName'] . "</td>";
        echo "</tr>";
}

echo "</table> </div>";
                            //Code for automated table for items ends here.

                            //Obtaining values from database and displaying them using automated table for categories.
$cat_result = mysqli_query($dbhandle,"SELECT * FROM cat");
              
                            //Code for automated table for Category

echo "
        <div style='text-align:center'>
        <div position: absolute; top: 50%;>

        <table border='0' align='left'>
        <tr>
        <th></th>
        <th>Categories</th>
        </tr>";

while($row = mysqli_fetch_array($cat_result)) {
  echo "<tr>";
  echo "<td> <input type='radio' name='category'> </td>";
  echo "<td>" . $row['cattype'] . "</td>";
  echo "</tr>";
}

echo "</table> </div>";
                            //Code for automated table for category ends here.


mysqli_close($dbhandle);    //Closing the handle for database.
?>
    </body>
</html>