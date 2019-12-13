<?php
    session_start();
    $tourid=$_REQUEST['q'];
    $db = oci_connect('system', 'system', 'localhost/orcl');
    $sql = "begin TOURDELETE(:tourid); end;";

    $compiled = oci_parse($db, $sql);

    oci_bind_by_name($compiled, ':tourid', $tourid);

    if (oci_execute($compiled))
    {
        oci_close($db);
        if($_SESSION['type']=='admin')
        {
            header('Location:showhostedtouradmin.php');
        }
        else if($_SESSION['type']=='host')
        {
            header('Location:myhostedtour.php');
        }
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