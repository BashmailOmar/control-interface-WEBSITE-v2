<?php
/* الاوامر التي تنفذ عند ضغط زر (START). */
if (isset($_POST['START'])) {

    /* بدء الاتصال */
    $con = mysqli_connect('127.0.0.1', 'root', '');

    if (!$con) {
        echo 'not connect';
    }

    if (!mysqli_select_db($con, 'iot')) {
        echo 'Database not selected';
    }


    // جلب البيانات من قاعدة البيانات
    $sqlStatus = "SELECT stat FROM robotstatus";
    $result = mysqli_query($con, $sqlStatus);
    if (!$result) {
        die("Error in query");
    }
    //مقارنة البيانات التي جلبناها وتغييرها
    $r = mysqli_fetch_assoc($result);
    if ($r['stat'] == 0) {
        $sqlS = "UPDATE robotstatus SET stat = 1";
    } else if ($r['stat'] == 1) {
        $sqlS = "UPDATE robotstatus SET stat = 0";
    }

    if (!mysqli_query($con, $sqlS)) {
    }
}



/* الاوامر التي تنفذ عند ضغط زر (SAVE). */
if (isset($_POST['SAVE'])) {

    $con = mysqli_connect('127.0.0.1', 'root', '');

    if (!$con) {
        echo 'not connect';
    }

    if (!mysqli_select_db($con, 'iot')) {
        echo 'Database not selected';
    }
    //تخزين زوايا المحركات في متغيرات ليسهل التعامل معاها
    $sliderA = $_POST['inputA'];
    $sliderB = $_POST['inputB'];
    $sliderC = $_POST['inputC'];
    $sliderD = $_POST['inputD'];
    $sliderE = $_POST['inputE'];
    $sliderF = $_POST['inputF'];

    //تحديث زوايا المحركات
    $sqlA = "UPDATE engine SET engineValue = '$sliderA' WHERE id = 1";
    $sqlB = "UPDATE engine SET engineValue = '$sliderB' WHERE id = 2";
    $sqlC = "UPDATE engine SET engineValue = '$sliderC' WHERE id = 3";
    $sqlD = "UPDATE engine SET engineValue = '$sliderD' WHERE id = 4";
    $sqlE = "UPDATE engine SET engineValue = '$sliderE' WHERE id = 5";
    $sqlF = "UPDATE engine SET engineValue = '$sliderF' WHERE id = 6";

    if (!mysqli_query($con, $sqlA) || !mysqli_query($con, $sqlB) || !mysqli_query($con, $sqlC) || !mysqli_query($con, $sqlD) || !mysqli_query($con, $sqlE) || !mysqli_query($con, $sqlF)) {
    }
}

if (isset($_POST['Forward']) || isset($_POST['Left']) || isset($_POST['STOP']) || isset($_POST['Right']) || isset($_POST['Back'])) {
    /* start connect */
    $con = mysqli_connect('127.0.0.1', 'root', '');

    if (!$con) {
        echo 'not connect';
    }

    if (!mysqli_select_db($con, 'iot')) {
        echo 'Database not selected';
    }
    /* end connect */

    /* start insert value */
    if (isset($_POST['Forward'])) {
        $sqlS = "UPDATE directionstable SET direction = 'FORWARD'";
    } else if (isset($_POST['Left'])) {
        $sqlS = "UPDATE directionstable SET direction = 'LEFT'";
    } else if (isset($_POST['STOP'])) {
        $sqlS = "UPDATE directionstable SET direction = 'STOP'";
    } else if (isset($_POST['Right'])) {
        $sqlS = "UPDATE directionstable SET direction = 'RIGHT'";
    } else if (isset($_POST['Back'])) {
        $sqlS = "UPDATE directionstable SET direction = 'BACK'";
    }
    if (!mysqli_query($con, $sqlS)) {
    }
    /* end insert value */
}
