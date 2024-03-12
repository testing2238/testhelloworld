<?php

$cmdpost = 0;
$sqlreq = $_POST['sqlreq'];
if (!empty($_POST['cmdpost'])) {
    $cmdpost = $_POST['cmdpost'];
    print "cmdpost: " . $cmdpost . "<br>";
    print "sqlreq: " . $sqlreq . "<br>";
}

if (!empty($_GET['cmd'])) {
    $cmdpost = $_GET['cmd'];
    print "cmdreq: " . $_GET['cmd'] . "<br>";
}


$conn = pg_connect("host=trumpet.db.elephantsql.com user=ficomnpy password=Z0yD8v3JHSy97bIM6FT9qRWQWMk0BXt7 dbname=ficomnpy");
if ($conn) {
    echo 'Connection attempt succeeded.';
} else {
    echo 'Connection attempt failed.';
}


$query = $sqlreq; //"SELECT * FROM dummy1";
if ($cmdpost == "1") {
    $result = pg_query($conn, $query) or die('Could not execute query because: ' . pg_last_error());
    if ($result == "") {
        print "SELECT failed: " . $query . "<p>\n";
    } else {
        // SELECT succeeded
        $numrows = pg_num_rows($result);
        $numcols = pg_num_fields($result);
        //print "Number of rows: ".$numrows."<br>";
        //print "Number of columns: ".$numcols."<p>\n";

        $respond = "";
        while ($row = pg_fetch_array($result)) {
            print "<tr>";
            for ($i = 0; $i < $numcols; $i++) {
                $respond .= $row[$i] . "~";
            }
        } //while
        print "~~ " . $respond . " ~~";
    } //else
}
if ($cmdpost == "2") {
    $result = pg_query($conn, $query) or die('Could not execute query because: ' . pg_last_error());
    if ($result) {
        print "~~ " . pg_affected_rows($result) . " ~~";
    }
    echo pg_result_error($result);
    die('Could not execute: ' . pg_result_error($result));
}

if ($cmdpost == "3") {
    $sqllist = explode("~", $query);
    $i = 0;
    foreach ($sqllist as $v) {
        //print $v."<br>";
        $result = pg_query($conn, $v) or die('Could not execute: ' . pg_last_error());
        if ($result == false) {
            echo pg_result_error($result);
            die('Could not execute: ' . pg_result_error($result));
        }

        $i++;
    }
    echo 'number row adde: ' . $i;
    print "~~ " . $i . " ~~";
}
?>
