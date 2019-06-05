<?php require "city.php"?>
<!doctype HTML>
<head></head>
<body>
<?php

$db=mysqli_connect('localhost','root','','Bookmyshow') or die("Could not connect to database");

if(isset($_POST['theatre'])){
    $theatre=$_POST['theatre'];
    $query="select movies from movielist,theatrelist where theatrelist.tl=movielist.tl and theatre='$theatre'";
    $result = mysqli_query($db,$query);
    include ("basic.html");
    
    if (mysqli_fetch_fields($result)>0) {
        // output data of each row
        $_SESSION['theatre']="$theatre";
        echo "<div class='col-lg-2'><br/>";
        echo "<h3>Offers for <br>".ucwords($theatre)." ".ucwords($_SESSION['city'])."</h3><br/>";
        echo "<ul class='list-group'><li class='list-group-item'><a href=''><b>20% off with HDFC</b></a></li>";
        echo "<li class='list-group-item'><a href='#card1'><b>Movie Pass</b></a></li>";
        echo "<li class='list-group-item'><a href='#card1'><b>Enjoy 50% discount on Food & Beveragres at $theatre</b></a></li>";
        echo "<li class='list-group-item'><a href='#card1'><b>10% off on BOI debit cards</b></a></li></ul></div>";
        echo "<div class='container'>";
        echo "<div class='col-md-6 col-md-offset-1'>";
        echo "<form class='navbar-form' action='show.php' method='POST'>";
        echo "<div class='form-group'>";
        echo "<input type='text' class='form-control' name='movie' size='50%' placeholder='Enter Movie name'>&nbsp;&nbsp;";
        echo "<button type='submit' class='btn btn-default'>Submit</button>";
        echo "</form>";
        echo "</div>";
        echo "</div><br><br><br>";
        echo "<h2 align='center'>".ucwords($theatre)."</h2>";
        echo "<hr width='18%' align='center'>";
        echo "<div class='col-md-8 col-md-offset-1'>";
        echo "<h3><u>Currently Showing </u> :</h3><br/>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<ul class='list-group'>";
            echo "<li class='list-group-item'><a href='theatre.php'><b>" .$row['movies']."</b></a></li>";
            echo "</ul>";
        }
        echo "</div>";
        echo "</div>";
    } else {
        echo "0 results";
        
    }
}
?>
</body>
</html>