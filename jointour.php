<?php
    session_start();
    $tourid=$_REQUEST['q'];
    $travellerid=$_SESSION['id'];
    $c = oci_connect('system', 'system', 'localhost/orcl');
    $statement = "SELECT * from TOURJOIN";
    $s = oci_parse($c, $statement);
    oci_execute($s);

    $flagInsert=TRUE;
    while (($row = oci_fetch_assoc($s)) != false)
    {
        if($row['TOURID']==$tourid && $row['TRAVELLERID']==$travellerid)
        {
            $flagInsert=FALSE;
            header('Location:seehostedtour.php');
        }
    }
    oci_close($c);


    if($flagInsert==TRUE)
    {
        $db = oci_connect('system', 'system', 'localhost/orcl');
        $sql='INSERT INTO TOURJOIN(TOURID,TRAVELLERID) '.
        'VALUES (:tourid,:travellerid)';
    
        $compiled = oci_parse($db, $sql);
        
        oci_bind_by_name($compiled, ':tourid', $tourid);
        oci_bind_by_name($compiled, ':travellerid', $travellerid);
    
        if(oci_execute($compiled))
        {
            oci_close($db);

            $db = oci_connect('system', 'system', 'localhost/orcl');
            $sql='UPDATE TOURHOSTID set PEOPLECOUNT=PEOPLECOUNT+1 where TOURID=:tourid';
            $compiled = oci_parse($db, $sql);
            oci_bind_by_name($compiled, ':tourid', $tourid);
            oci_close($db);

            if(oci_execute($compiled))
            {
                header('Location:seehostedtour.php');
            }
            else
            {
                echo 'error in increment people count';
            }
        }
        else
        {
            oci_rollback($db);
            $error=oci_error($sql);
            echo $error['message'];
            oci_close($db);
        }
    }
?>