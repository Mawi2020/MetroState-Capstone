<?php
//Including Database configuration file.
include "db.php";

//Getting value of "searchOne" variable from "script.js".
if (isset($_POST['searchOne'])) {
//searchOne box value assigning to $name variable.
   $name = $_POST['searchOne'];
//searchOne query.
   $Query = "SELECT name FROM player WHERE name LIKE '%$name%' LIMIT 10";
//Query execution
   $ExecQuery = MySQLi_query($con, $Query);
//Creating unordered list to display result.
   echo '
<ul style="list-style-type:none;">
   ';
   //Fetching result from database.
   while ($Result = MySQLi_fetch_array($ExecQuery)) {
       ?>
   <!-- Creating unordered list items.
        Calling javascript function named as "fill" found in "script.js" file.
        By passing fetched result as parameter. -->
   <li onclick='fill("<?php echo $Result['name']; ?>")'>
   <a>
   <!-- Assigning searchOneed result in "searchOne box" in "searchOne.php" file. -->
       <?php echo $Result['name']; ?>
   </li></a>
   <!-- Below php code is just for closing parenthesis. Don't be confused. -->
   <?php
}}

?>
</ul>
