<?php

    $c = oci_connect('system', 'system', 'localhost/orcl');
    $statement = "select * from TOURLOCATIONBYAREA";
    $s = oci_parse($c, $statement);
    oci_execute($s);
    while (($row = oci_fetch_assoc($s)) != false) 
    {
        $a[]=$row['NAME'];
    }
    oci_close($c);

    /*Mysql starts here*/
    /*$conn = mysqli_connect("localhost","root","","db");
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM tourlocationbyarea";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            if($row['email']==$_POST['em'] && $row['password']==$_POST['pw'])
            {
                $a[]=$row['name'];
            }
        }
    }
    mysqli_close($conn); */
    
    /*mysql ends here*/

    $q=$_REQUEST["q"];
    $hint="";

    if ($q !== "")
    {
        $q = strtolower($q);
        $len=strlen($q);
        foreach($a as $name)
        {
            if (stristr($q, substr($name, 0, $len)))
            {
                $datalist[]=$name;
            }
        }
    }
    for($i=0;$i<count($datalist);$i++)
    {
        echo "<option value=".$datalist[$i].">";
    }
?>