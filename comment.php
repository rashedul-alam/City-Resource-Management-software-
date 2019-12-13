<?php
    $q=$_REQUEST["q"];

    /*MYSQL starts here*/
    /*$conn = mysqli_connect("localhost","root","","db");
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql =  "SELECT * FROM `articlerating`,`account` WHERE commentersid=id";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            if($row['articleid']==$q)
            {
                $comment=$row['comment'];
                $commentdate=$row['commentdate'];
                $commentersid=$row['commentersid'];
                echo "<hr>".$row['name']." : ";
                echo $comment."<br>";
                echo "commented on : ".$commentdate."<br>";
            }
        }
    }
    mysqli_close($conn); 
    */
    /*MYSQL ends here*/

    $db = oci_connect('system', 'system', 'localhost/orcl');
    if(!$db)
    {
        echo "can't connect to database";
    }
    $sql = "SELECT * FROM ARTICLERATING,ACCOUNT WHERE commentersid=id";
    $result = oci_parse($db, $sql);
    oci_execute($result);
    while (($row = oci_fetch_assoc($result)) != false) 
    {
        if($row['ARTICLEID']==$q)
        {
            $comments=$row['COMMENTS'];
            $commentdate=$row['COMMENTDATE'];
            $commentersid=$row['COMMENTERSID'];
            echo "<hr>".$row['NAME']." : ";
            echo $comments."<br>";
            echo "commented on : ".$commentdate."<br>";
        }
    }
    oci_close($db);
?>