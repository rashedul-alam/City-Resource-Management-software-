<?php
    session_start();
    $articleid=$_GET["arid"];
    
    /*
    $conn = mysqli_connect("localhost","root","","db");
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    if($_GET['commentpost']=="")
    {
        mysqli_close($conn);
        header('Location:articles.php');
    }
    else
    {
        $sql = "INSERT INTO `articlerating`(`articleid`, `commentersid`, `comment`, `commentdate`) VALUES (".$articleid.",".$_SESSION['id'].",'".$_GET['commentpost']."','".date('Y-m-d')."');";
        if (mysqli_query($conn, $sql))
        {
            mysqli_close($conn);
            header('Location:articles.php');
        }
        else
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
    */
    $commentersid=$_SESSION['id'];
    $comments=$_GET['commentpost'];
    $date=date('Y-m-d');
    $newdate="";
    $newdate.=$date[8].$date[9]."-";

    if($date[5]=="0" && $date[6]=="1")
    {
        $newdate.="JAN";
    }
    if($date[5]=="0" && $date[6]=="2")
    {
        $newdate.="FEB";
    }
    if($date[5]=="0" && $date[6]=="3")
    {
        $newdate.="MAR";
    }
    if($date[5]=="0" && $date[6]=="4")
    {
        $newdate.="APR";
    }
    if($date[5]=="0" && $date[6]=="5")
    {
        $newdate.="MAY";
    }
    if($date[5]=="0" && $date[6]=="6")
    {
        $newdate.="JUN";
    }
    if($date[5]=="0" && $date[6]=="7")
    {
        $newdate.="JUL";
    }
    if($date[5]=="0" && $date[6]=="8")
    {
        $newdate.="AUG";
    }
    if($date[5]=="0" && $date[6]=="9")
    {
        $newdate.="SEP";
    }
    if($date[5]=="1" && $date[6]=="0")
    {
        $newdate.="OCT";
    }
    if($date[5]=="1" && $date[6]=="1")
    {
        $newdate.="NOV";
    }
    if($date[5]=="1" && $date[6]=="2")
    {
        $newdate.="DEC";
    }
    $newdate.="-".$date[0].$date[1].$date[2].$date[3];
    $db = oci_connect('system', 'system', 'localhost/orcl');
    if($_GET['commentpost']=="")
    {
        oci_close($db);
        header('Location:articles.php');
    }
    $sql = 'INSERT INTO ARTICLERATING(ARTICLEID,COMMENTERSID,COMMENTS,COMMENTDATE) '.
       'VALUES(:articleid, :commentersid, :comments, :commentdate)';

    $compiled = oci_parse($db, $sql);

    oci_bind_by_name($compiled, ':articleid', $articleid);
    oci_bind_by_name($compiled, ':commentersid', $commentersid);
    oci_bind_by_name($compiled, ':comments', $comments);
    oci_bind_by_name($compiled, ':commentdate', $newdate);
    
    if(oci_execute($compiled))
    {
        oci_close($db);
        header('Location:articles.php');
    }
    else
    {
        oci_rollback($db);
        $error=oci_error($sql);
        echo $error['message'];
        oci_close($db);
    }
?>