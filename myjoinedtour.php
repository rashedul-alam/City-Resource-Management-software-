<?php
    session_start();
    if(!isset($_SESSION['type']) || strtolower($_SESSION['type'])!='traveler')
    {
        echo "Invalid request";
        die();
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>My Joined Tour</title>
    </head>
    <body>
        <?php
            $travellerid=$_SESSION['id'];
            $c = oci_connect('system', 'system', 'localhost/orcl');
            $statement = "SELECT ACCOUNT.ID,ACCOUNT.NAME,ACCOUNT.ADDRESS,ACCOUNT.PHONENO,TOURHOSTID.* from TOURJOIN,TOURHOSTID,ACCOUNT where TOURJOIN.TRAVELLERID=:travellerid and TOURJOIN.TOURID=TOURHOSTID.TOURID and TOURHOSTID.HOSTID=ACCOUNT.ID ORDER BY POSTEDDATE DESC";
            $s = oci_parse($c, $statement);
            oci_bind_by_name($s, ':travellerid', $travellerid);
            oci_execute($s);
            while (($row = oci_fetch_assoc($s)) != false) 
            {
                $hostid=$row['ID'];
                $hostname=$row['NAME'];
                $hostaddress=$row['ADDRESS'];
                $hostphoneno=$row['PHONENO'];
                $tourid=$row['TOURID'];
                $budget=$row['BUDGET'];
                $gender=$row['GENDER'];
                $maxage=$row['MAXAGE'];
                $minage=$row['MINAGE'];
                $maxpeople=$row['MAXPEOPLE'];
                $minpeople=$row['MINPEOPLE'];
                $peoplecount=$row['PEOPLECOUNT'];
                $startdate=$row['STARTDATE'];
                $enddate=$row['ENDDATE'];
                $posteddate=$row['POSTEDDATE'];
                $tourplan=$row['TOURPLAN'];
                echo '<table class="mytour">';
                echo '<tr>';
                echo  '<td> Tour id : </td><td>'.$tourid."</td>";
                echo '</tr>';
                echo '<tr>';
                echo  '<td> Host name : </td><td>'.$hostname."</td>";
                echo '</tr>';
                echo '<tr>';
                echo  '<td> Host address : </td><td>'.$hostaddress."</td>";
                echo '</tr>';
                echo '<tr>';
                echo  '<td> Host Phone no : </td><td>'.$hostphoneno."</td>";
                echo '</tr>';
                echo '<tr>';
                echo  '<td> Budget : </td><td>'.$budget."</td>";
                echo '</tr>';
                echo '<tr>';
                echo  '<td> Gender : </td><td>'.$gender."</td>";
                echo '</tr>';
                echo '<tr>';
                echo  '<td> Max age : </td><td>'.$maxage."</td>";
                echo '</tr>';
                echo '<tr>';
                echo  '<td> Min age : </td><td>'.$minage."</td>";
                echo '</tr>';
                echo '<tr>';
                echo  '<td> Max people : </td><td>'.$maxpeople."</td>";
                echo '</tr>';
                echo '<tr>';
                echo  '<td> Min people : </td><td>'.$minpeople."</td>";
                echo '</tr>';
                echo '<tr>';
                echo  '<td> People Count : </td><td>'.$peoplecount."</td>";
                echo '</tr>';
                echo '<tr>';
                echo  '<td>  Start date : </td><td>'.$startdate."</td>";
                echo '</tr>';
                echo '<tr>';
                echo  '<td>  End date : </td><td>'.$enddate."</td>";
                echo '</tr>';
                echo '<tr>';
                echo  '<td>  Posted date : </td><td>'.$posteddate."</td>";
                echo '</tr>';
                echo '<tr>';
                echo  '<td>  Tour plan : </td><td>'.$tourplan."</td>";
                echo '</tr>';

                echo '<tr><td>Place Names : </td><td>';
                /*Fetch place names*/
                $commaflag=0;
                $conn=oci_connect('system', 'system', 'localhost/orcl');
                $sql="SELECT NAME from TOURHOSTPLACE,TOURLOCATIONBYAREA where TOURHOSTPLACE.PLACEID=TOURLOCATIONBYAREA.ID and TOURHOSTPLACE.TOURID=:tourid";
                $compiled = oci_parse($conn, $sql);
                oci_define_by_name($compiled, 'NAME', $placename);
                oci_bind_by_name($compiled, ':tourid', $tourid);
                oci_execute($compiled);
                while (($arr = oci_fetch_assoc($compiled)) != false)
                {
                    if($commaflag!=0)
                    {
                        echo ",";
                    }
                    echo $placename;
                    $commaflag++;
                }
                oci_close($conn);
                echo '<td></tr>';

                if(date('Y-m-d')<dateToPhpFormat($startdate))
                {
                    echo '<td colspan=2><button type="button'.$tourid.'" id="join" onclick=location.href="canceltour.php?q="+'.$tourid.';>Cancel tour</button></td>';
                }

                echo '</table><br><hr>';
            }
            oci_close($c);


            function dateToPhpFormat($date)
            {
                $newdate='';
                $newdate=$newdate.'20'.$date[7].$date[8];
                $newdate=$newdate.'-';
                if($date[3]=='J' && $date[4]=='A' && $date[5]=='N')
                {
                    $newdate=$newdate.'01-';
                }
                if($date[3]=='F' && $date[4]=='E' && $date[5]=='B')
                {
                    $newdate=$newdate.'02-';
                }
                if($date[3]=='M' && $date[4]=='A' && $date[5]=='R')
                {
                    $newdate=$newdate.'03-';
                }
                if($date[3]=='A' && $date[4]=='P' && $date[5]=='R')
                {
                    $newdate=$newdate.'04-';
                }
                if($date[3]=='M' && $date[4]=='A' && $date[5]=='Y')
                {
                    $newdate=$newdate.'05-';
                }
                if($date[3]=='J' && $date[4]=='U' && $date[5]=='N')
                {
                    $newdate=$newdate.'06-';
                }
                if($date[3]=='J' && $date[4]=='U' && $date[5]=='L')
                {
                    $newdate=$newdate.'07-';
                }
                if($date[3]=='A' && $date[4]=='U' && $date[5]=='G')
                {
                    $newdate=$newdate.'08-';
                }
                if($date[3]=='S' && $date[4]=='E' && $date[5]=='P')
                {
                    $newdate=$newdate.'09-';
                }
                if($date[3]=='O' && $date[4]=='C' && $date[5]=='T')
                {
                    $newdate=$newdate.'10-';
                }
                if($date[3]=='N' && $date[4]=='O' && $date[5]=='V')
                {
                    $newdate=$newdate.'11-';
                }
                if($date[3]=='D' && $date[4]=='E' && $date[5]=='C')
                {
                    $newdate=$newdate.'12-';
                }
                $newdate=$newdate.$date[0].$date[1];
                return($newdate);
            }
        ?>    
    </body>
</html>