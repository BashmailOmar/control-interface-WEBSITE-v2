<?php
$con = mysqli_connect('127.0.0.1', 'root', '');

if (!$con) {
    echo 'not connect';
}

if (!mysqli_select_db($con, 'iot')) {
    echo 'Database not selected';
}
/* end connect */

/* start read from database */
$sqlView = "SELECT direction FROM directionstable";
$result = mysqli_query($con, $sqlView);
if (!$result) {
    die("Error in query");
}
/*  end read  */
$row = mysqli_fetch_assoc($result);
echo '<li>' . $row['direction'];
if (!mysqli_query($con, $sqlView)) {
}
