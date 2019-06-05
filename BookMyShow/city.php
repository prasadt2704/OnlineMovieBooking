<?php require "val.php"?>
<!doctype HTML>
<head></head>
<body>
    <?php
$db=mysqli_connect('localhost','root','','Bookmyshow') or die("Could not connect to database");

if(isset($_POST['city'])){
    $city=$_POST['city'];
    $_SESSION["city"]="$city";
    $query="select theatre from theatrelist,citylist where theatrelist.cl=citylist.cl and citylist.city='$city'";
    $result = mysqli_query($db,$query);
    include ("basic.html");
    if (mysqli_fetch_fields($result)>0) {
        // output data of each row
        echo "<div class='container'>";
        echo "<div class='col-md-6 col-md-offset-1'>";
        echo "<form class='navbar-form' action='theatre.php' method='POST'>";
        echo "<div class='form-group'>";
        echo "<input type='text' class='form-control' name='theatre' size='50%' placeholder='Enter theatre name'  autofocus>&nbsp;&nbsp;";
        echo "<button type='submit' class='btn btn-default'>Submit</button>";
        echo "</form>";
        echo "</div>";
        echo "</div><br><br><br>";
        echo "<h2 align='center'>".ucfirst($city)."</h2>";
        echo "<hr width='18%' align='center'>";
        echo "<div class='col-md-8 col-md-offset-1'>";
        echo "<form action='theatre.php'>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<ul class='list-group'>";
            echo "<li class='list-group-item'><b>" .$row["theatre"]."</b></a></li>";
            echo "</ul>";
        }
        echo "</form>";
        echo "</div>";
        echo "</div>";
    } else {
        echo "0 results";

    }

}
?>
</body>
</html>