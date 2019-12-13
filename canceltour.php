<?php
    session_start();
    $tourid=$_REQUEST['q'];
    $travellerid=$_SESSION['id'];
    $db = oci_connect('system', 'system', 'localhost/orcl');
    $sql = "DELETE from TOURJOIN where TOURID=:tourid and  TRAVELLERID=:travellerid";

    $compiled = oci_parse($db, $sql);

    oci_bind_by_name($compiled, ':tourid', $tourid);
    oci_bind_by_name($compiled, ':travellerid', $travellerid);

    if (oci_execute($compiled))
    {
        oci_close($db);

        $dbms = oci_connect('system', 'system', 'localhost/orcl');
        $query='UPDATE TOURHOSTID set PEOPLECOUNT=PEOPLECOUNT-1 where TOURID=:tourid';
        $compile = oci_parse($dbms, $query);
        oci_bind_by_name($compile, ':tourid', $tourid);

        if(oci_execute($compile))
        {
            oci_close($dbms);
            header('Location:myjoinedtour.php');
        }
        else
        {
            echo 'error in increment people count';
        }
        oci_close($dbms);
        /*header('Location:myjoinedtour.php');*/
    }
    else
    {
        oci_rollback($db);
        $error=oci_error($sql);
        echo $error['message'];
        oci_close($db);
    }
    oci_close($db);
?>