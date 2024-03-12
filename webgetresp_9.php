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


$conn = pg_connect("host=ec2-52-3-200-138.compute-1.amazonaws.com user=hmuvylqmwrtvkv password=62dce52c46e0ba66aab4517cfa4a134cbf25d4eadf124d924c31018aafa8a4e9 dbname=d96i9ms24solrt");
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
        print "~~ " . mysqli_affected_rows($conn) . " ~~";
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
