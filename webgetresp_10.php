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
$dbhost = 'ep-steep-fire-27286281-pooler.us-east-2.aws.neon.tech';
$dbname = 'neondb';
$dbuser = 'ek8800';
$dbpass = 'zeli9DpK3MLU';

//$conn = new PDO("pgsql:host=$dbhost;dbname=$dbname options=endpoint=ep-steep-fire-27286281", $dbuser, $dbpass );

$conn = pg_connect("host=$dbhost user=$dbuser password=$dbpass dbname=$dbname options=endpoint=ep-steep-fire-27286281");

if ($conn) {
    echo 'Connection attempt succeeded.';
} else {
    echo 'Connection attempt failed.';
}


$query = $sqlreq; //"SELECT * FROM dummy1";
if ($cmdpost == "1") {
    $result = pg_query($conn, $query) or die(pg_error($conn));
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
    $result = pg_query($conn, $query) or die(pg_error($conn));
    if ($result) {
        print "~~ " . pg_affected_rows($result) . " ~~";
    }
}

if ($cmdpost == "3") {
    $sqllist = explode("~", $query);
    $i = 0;
    foreach ($sqllist as $v) {
        //print $v."<br>";
        $result = pg_query($conn, $v) or die(pg_error($conn));
        if ($result == false)
            die(mysql_error());
        $i++;
    }
    print "~~ " . $i . " ~~";
}
?>
