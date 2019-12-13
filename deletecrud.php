<?php
    $userid=$_GET['id'];
    $db = oci_connect('system', 'system', 'localhost/orcl');
    $sql = "delete from ACCOUNT where id=:userid";

    $compiled = oci_parse($db, $sql);

    oci_bind_by_name($compiled, ':userid', $userid);

    if (oci_execute($compiled))
    {
        oci_close($db);
        header('Location:deleteaccount.php');
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