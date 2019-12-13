<?php
    $articleid=$_GET['arid'];
    $varify='yes';
    $db = oci_connect('system', 'system', 'localhost/orcl');
    $sql='UPDATE ARTICLE set VARIFY=:varify where articleid=:articleid';
    $compiled = oci_parse($db, $sql);
    oci_bind_by_name($compiled, ':articleid', $articleid);
    oci_bind_by_name($compiled, ':varify', $varify);
    oci_close($db);

    if(oci_execute($compiled))
    {
        header('Location:varifyarticle.php');
    }
    else
    {
        echo 'error in increment people count';
    }
?>