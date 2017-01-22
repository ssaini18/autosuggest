<?php
require 'datab.php';

$city_id = $_REQUEST['city_id'];
$search = $con->real_escape_string($_REQUEST['search']);

if (!empty($search)) {
	$sql="SELECT doctor_name FROM doclist WHERE city_id='$city_id' AND doctor_name LIKE'".$search."%'";
    $query_run = $con->query($sql);
    while ($query_row = $query_run->fetch_assoc()) {
	    echo "<li>".$query_row['doctor_name']."</li>";
    }
}

?>

