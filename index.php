<?php
include('datab.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Index</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container" style="margin-top: 20px" align="center">
<form action="" method="POST" name="frm" id="frm" class="form-inline">
  <div class="form-group">
    <select name="city_id" id="city_id" onChange="selectCity(this.value);" class="form-control">
    <option value="">Select City</option>
    <?php
    $sql1 = "select * from cities";
    $sql_row1 = $con->query($sql1);
    while($row = $sql_row1->fetch_assoc()) {
    ?>
    <option value="<?php echo $row["city_id"]; ?>" <?php if( isset($_REQUEST["city_id"]) && $row["city_id"]==$_REQUEST["city_id"]) 
    { echo "Selected"; } ?> ><?php echo $row["city_name"]; ?></option>;
    <?php
    }
    ?>
  </select>
  </div>
  <div class="form-group">
    <input type="text" id="search" class="form-control" name="search">
  </div> 
  <button type="submit" class="btn btn-primary">Search</button>
</form>
</div>
<div class="dropdown" align="center">
  <ul class="result"></ul>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $city_id = $_REQUEST['city_id'];
  $search = $con->real_escape_string($_REQUEST['search']);

  if (!empty($search)) {
    $sql="SELECT doctor_name FROM doclist WHERE city_id='$city_id' AND doctor_name LIKE'".$search."%'";
    $query_run = $con->query($sql);
    echo "<h3 align='center'>Result</h3>";
    echo "<hr>";
    while ($query_row = $query_run->fetch_assoc()) {
      echo "<center>".$query_row['doctor_name']."</center>";
    }
  }
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="js/primary.js"></script>
</body>
</html>

