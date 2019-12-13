<?php
    session_start();
    
    $hostid=$_SESSION['id'];
    $placeid=$_GET['place'];
    $placeidtwo=$_GET['placetwo'];
    $budget=$_GET['budget'];
    $gender=$_GET['gender'];
    $team=$_GET['team'];
    $maxage=$_GET['maxage'];
    $minage=$_GET['minage'];
    $maxpeople=$_GET['maxpeople'];
    $minpeople=$_GET['minpeople'];
    $peoplecount=0;
    $startdate=$_GET['startdate'];
    $enddate=$_GET['enddate'];
    $tourplan=$_GET['tourplan'];

    $startdate=toOracleDateFormat($startdate);
    $enddate=toOracleDateFormat($enddate);

    
    
    /*$date=date('Y-m-d');
    $newdate=toOracleDateFormat($date);*/

    function toOracleDateFormat($date)
    {
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
        return $newdate;
    }
    if($_GET['placetwo']!='null')
    {
        $db = oci_connect('system', 'system', 'localhost/orcl');
        
        /*$sql="INSERT INTO TOURHOSTID(TOURID,HOSTID,BUDGET,GENDER,TEAM,MAXAGE,MINAGE,MAXPEOPLE,MINPEOPLE,PEOPLECOUNT,STARTDATE,ENDDATE,POSTEDDATE,TOURPLAN) ".
        "VALUES (seq_tourid.nextval,:hostid,:budget,:gender,:team,:maxage,:minage,:maxpeople,:minpeople,:peoplecount,:startdate,:enddate,:posteddate,:tourplan)";*/
        $sql="begin inserttourhost(:hostid,:budget,:gender,:team,:maxage,:minage,:maxpeople,:minpeople,:peoplecount,:startdate,:enddate,:tourplan,:place,:placetwo); end;";

        $compiled = oci_parse($db, $sql);
        
        oci_bind_by_name($compiled, ':hostid', $hostid);
        oci_bind_by_name($compiled, ':budget', $budget);
        oci_bind_by_name($compiled, ':gender', $gender);
        oci_bind_by_name($compiled, ':team', $team);
        oci_bind_by_name($compiled, ':maxage', $maxage);
        oci_bind_by_name($compiled, ':minage', $minage);
        oci_bind_by_name($compiled, ':maxpeople', $maxpeople);
        oci_bind_by_name($compiled, ':minpeople', $minpeople);
        oci_bind_by_name($compiled, ':peoplecount', $peoplecount);
        oci_bind_by_name($compiled, ':startdate', $startdate);
        oci_bind_by_name($compiled, ':enddate', $enddate);
        /*oci_bind_by_name($compiled, ':posteddate', $newdate);*/
        oci_bind_by_name($compiled, ':tourplan', $tourplan);
        oci_bind_by_name($compiled, ':place', $placeid);
        oci_bind_by_name($compiled, ':placetwo', $placeidtwo);

        if(oci_execute($compiled))
        {
            oci_close($db);
            header('Location:index.php');
        }
        else
        {
            oci_rollback($db);
            $error=oci_error($sql);
            echo $error['message'];
            oci_close($db);
        }
    } 
    else
    {
        $db = oci_connect('system', 'system', 'localhost/orcl');
        
        /*$sql="INSERT INTO TOURHOSTID(TOURID,HOSTID,BUDGET,GENDER,TEAM,MAXAGE,MINAGE,MAXPEOPLE,MINPEOPLE,PEOPLECOUNT,STARTDATE,ENDDATE,POSTEDDATE,TOURPLAN) ".
        "VALUES (seq_tourid.nextval,:hostid,:budget,:gender,:team,:maxage,:minage,:maxpeople,:minpeople,:peoplecount,:startdate,:enddate,:posteddate,:tourplan)";*/
        $sql="begin inserttourhostone(:hostid,:budget,:gender,:team,:maxage,:minage,:maxpeople,:minpeople,:peoplecount,:startdate,:enddate,:tourplan,:place); end;";

        $compiled = oci_parse($db, $sql);
        
        oci_bind_by_name($compiled, ':hostid', $hostid);
        oci_bind_by_name($compiled, ':budget', $budget);
        oci_bind_by_name($compiled, ':gender', $gender);
        oci_bind_by_name($compiled, ':team', $team);
        oci_bind_by_name($compiled, ':maxage', $maxage);
        oci_bind_by_name($compiled, ':minage', $minage);
        oci_bind_by_name($compiled, ':maxpeople', $maxpeople);
        oci_bind_by_name($compiled, ':minpeople', $minpeople);
        oci_bind_by_name($compiled, ':peoplecount', $peoplecount);
        oci_bind_by_name($compiled, ':startdate', $startdate);
        oci_bind_by_name($compiled, ':enddate', $enddate);
        /*oci_bind_by_name($compiled, ':posteddate', $newdate);*/
        oci_bind_by_name($compiled, ':tourplan', $tourplan);
        oci_bind_by_name($compiled, ':place', $placeid);

        if(oci_execute($compiled))
        {
            oci_close($db);
            header('Location:index.php');
        }
        else
        {
            oci_rollback($db);
            $error=oci_error($sql);
            echo $error['message'];
            oci_close($db);
        }
    }     
    /*echo $hostid." ".
    $placeid." ".
    $budget." ".
    $gender." ".
    $team." ".
    $maxage." ".
    $minage." ".
    $maxpeople." ".
    $minpeople." ".
    $peoplecount." ".
    $startdate." ".
    $enddate." ".
    $newdate;*/
?>