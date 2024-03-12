<!DOCTYPE html> 
<html> 
    <head> 
    </head> 

    <body > 

        <?php
        $cmdpost = "0";
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
        
        echo "cmdpost: " . $cmdpost . "<br>";
        echo "sqlreq: " . $sqlreq . "<br>";
        
        $dbhost = 'sql204.iceiy.com';
        $dbname = 'icei_35556252_sampledb';
        $dbuser = 'icei_35556252';
        $dbpass = '1rpCluwHd9Za';

        $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
        $db = mysqli_select_db($conn, $dbname) or die(mysql_error());

        $query = "SELECT * FROM eddy";

        if ($cmdpost == "1") {
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if ($result == "") {
                print "SELECT failed: " . $query . "<p>\n";
            } else {
                // SELECT succeeded
                $numrows = mysqli_num_rows($result);
                $numcols = mysqli_num_fields($result);
                //print "Number of rows: ".$numrows."<br>";
                //print "Number of columns: ".$numcols."<p>\n";

                $respond = "";
                while ($row = mysqli_fetch_array($result)) {
                    print "<tr>";
                    for ($i = 0; $i < $numcols; $i++) {
                        $respond .= $row[$i] . "~";
                    }
                } //while
                print "~~ " . $respond . " ~~";
            } //else
        }
        if ($cmdpost == "2") {
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if ($result) {
                print "~~ " . mysqli_affected_rows($conn) . " ~~";
            }
        }

        if ($cmdpost == "3") {
            $sqllist = explode("~", $query);
            $i = 0;
            foreach ($sqllist as $v) {
                //print $v."<br>";
                $result = mysqli_query($conn, $v) or die(mysqli_error($conn));
                if ($result == false)
                    die(mysql_error());
                $i++;
            }
            print "~~ " . $i . " ~~";
        }

        if ($cmdpost == "4") {
            echo phpinfo();
        }
        ?>    

        <form name="form1" method="post" >

            cmdpost: <input type="text" name="cmdpost" id="cmdpost"><br>
            sqlreq: <input type="text" name="sqlreq" id="sqlreq"><br>
            <br>    
            <input type="submit" name="Submit" value="Submit" /></form>
    </body> 

</html>         

