<?php

/* بدء الاتصال */
$con = mysqli_connect('127.0.0.1', 'root', '');

if (!$con) {
    echo 'not connect';
}

if (!mysqli_select_db($con, 'iot')) {
    echo 'Database not selected';
}
/* end connect */

/* القراءة من قاعدة البيانات */
$sqlView = "SELECT direction FROM directionstable";
$result = mysqli_query($con, $sqlView);
if (!$result) {
    die("Error in query");
}
/*  عرض البيانات التي تم جلبها من قاعدة البيانات */
$row = mysqli_fetch_assoc($result);
echo '<li>' . $row['direction'];
if (!mysqli_query($con, $sqlView)) {
}
