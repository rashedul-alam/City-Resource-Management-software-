<?php
    session_start();
    if(!isset($_SESSION['type']) || strtolower($_SESSION['type'])!='admin')
    {
        echo "Invalid request";
        die();
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Show hosted tour</title>
    </head>
    <body>
        <?php
            $c = oci_connect('system', 'system', 'localhost/orcl');
            $statement = "SELECT ACCOUNT.ID,ACCOUNT.NAME,ACCOUNT.ADDRESS,ACCOUNT.PHONENO,TOURHOSTID.* from TOURHOSTID,ACCOUNT where TOURHOSTID.HOSTID=ACCOUNT.ID order by TOURHOSTID.POSTEDDATE desc";
            $s = oci_parse($c, $statement);
            oci_execute($s);
            while (($row = oci_fetch_assoc($s)) != false) 
            {
                echo '<table>';
                echo '<div class="feedhost">';
                $tourid=$row['TOURID'];
                $userid=$row['ID'];
                $address=$row['ADDRESS'];
                $budget=$row['BUDGET'];
                $username=$row['NAME'];
                $gender=$row['GENDER'];
                $maxage=$row['MAXAGE'];
                $minage=$row['MINAGE'];
                $maxpeople=$row['MAXPEOPLE'];
                $minpeople=$row['MINPEOPLE'];
                $peoplecount=$row['PEOPLECOUNT'];
                $startdate=$row['STARTDATE'];
                $enddate=$row['ENDDATE'];
                $posteddate=$row['POSTEDDATE'];
                $phoneno=$row['PHONENO'];
                $tourplan=$row['TOURPLAN'];
                
                echo '<tr>';
                echo  '<td> Host Name : </td><td>'.$username."</td>";
                echo '</tr>';
                echo '<tr>';
                echo '<td>Host phone no : </td><td>'.$phoneno."</td>";
                echo '</tr>';
                echo '<tr>';
                echo '<td>Address : </td><td>'.$address."</td>";
                echo '</tr>';
                echo '<tr>';
                echo '<td>Gender requirement : </td><td>'.$gender."</td>";
                echo '</tr>';
                echo '<tr>';
                echo '<td>Tour budget : </td><td>'.$budget."</td>";
                echo '</tr>';
                echo '<tr>';
                echo '<td>Maximum age requirement : </td><td>'.$maxage."</td>";
                echo '</tr>';
                echo '<tr>';
                echo '<td>Minimum age requirement : </td><td>'.$minage."</td>";
                echo '</tr>';
                echo '<tr>';
                echo '<td>Maximum people joined : </td><td>'.$maxpeople."</td>";
                echo '</tr>';
                echo '<tr>';
                echo '<td>Minimum people joined : </td><td>'.$minpeople."</td>";
                echo '</tr>';
                echo '<tr>';
                echo '<td>Number of people joined : </td><td>'.$peoplecount."</td>";
                echo '</tr>';
                echo '<tr>';
                echo '<td>Tour start date : </td><td>'.$startdate."</td>";
                echo '</tr>';
                echo '<tr>';
                echo '<td>Tour end date : </td><td>'.$enddate."</td>";
                echo '</tr>';
                echo '<tr>';
                echo '<td>Posted date : </td><td>'.$posteddate."</td>";
                echo '</tr>';
                echo '<tr>';
                echo '<td>Tour Plan : </td><td>'.$tourplan."</td>";
                echo '</tr>';                

                /*Fetch place names by placeid*/
                echo '<tr><td>Place Names : </td><td>';

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
                echo '<tr><td colspan="2"><button type="button'.$tourid.'" id="join" onclick=location.href="deletetourvarification.php?q="+'.$tourid.';>DELETE THIS HOSTED TOUR</button></td></tr>';
                echo '</table>';
                echo '<hr>';

            }
            oci_close($c);
        ?>
    <!--<script>
        function joinTour(str)
        {
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function()
            {
                if (this.readyState == 4 && this.status == 200)
                {
                    document.getElementById("join".$str.).disabled = true;
                }
            };
            xhttp.open("GET", "jointour.php?q="+str, true);
            xhttp.send();
        }
    </script>-->
    </body>
</html>