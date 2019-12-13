<?php
    session_start();

    /*MYSQL starts here*/
    /*$conn = mysqli_connect("localhost","root","","db");
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    if($_GET['articlepost']=="")
    {
        mysqli_close($conn);
        header('Location:articles.php');
    }
    else
    {
        $sql = "INSERT INTO `article`(`userid`, `article`, `tourlocationid`, `posteddate`, `varify`)
         VALUES (".$_SESSION['id'].",'".$_GET['articlepost']."',".$_GET['place'].",'".date('Y-m-d')."','no');";
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
    /*MYSQL ends here*/

    $db = oci_connect('system', 'system', 'localhost/orcl');
    if($_GET['articlepost']=="")
    {
        oci_close($db);
        header('Location:articles.php');
    }
    else
    {
        $userid=$_SESSION['id'];
        $article=$_GET['articlepost'];
        $tourlocationid=$_GET['place'];
        /*$date=date('Y-m-d');
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
        $newdate.="-".$date[0].$date[1].$date[2].$date[3]; */

        $varify='no';

        $sql = "begin
        insertarticle(:userid,:article,:tourlocationid,:varify);
        end;";

        $compiled = oci_parse($db, $sql);

        oci_bind_by_name($compiled, ':userid', $userid);
        oci_bind_by_name($compiled, ':article', $article);
        oci_bind_by_name($compiled, ':tourlocationid', $tourlocationid);
        /*oci_bind_by_name($compiled, ':posteddate', $newdate);*/
        oci_bind_by_name($compiled, ':varify', $varify);

        if (oci_execute($compiled))
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
        oci_close($db);
    }
?>