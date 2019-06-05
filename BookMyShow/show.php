<?php require "theatre.php"?>
<!doctype html>
<head></head>
<body>
<?php

$db=mysqli_connect('localhost','root','','Bookmyshow') or die("Could not connect to database");

    $movie=$_POST['movie'];
    $query="SELECT movies,start,am from timelist,movielist,theatrelist where  theatrelist.tl=movielist.tl and movielist.ml=timelist.ml and movielist.movies='$movie'";
    $result = mysqli_query($db,$query);
    include ("basic.html");
    
    if (mysqli_fetch_fields($result)>0) {
        // output data of each row
        echo "<div class='col-lg-2'><br/>";
        echo "<h3>Trending in ".ucfirst($_SESSION['city'])."</h3><br/>";
        echo "<ul class='list-group'><li class='list-group-item'><a href=''><b>Avenger Endgame</b></a></li>";
        echo "<li class='list-group-item'><a href='#card1'><b>Kalank</b></a></li>";
        echo "<li class='list-group-item'><a href='#card1'><b>Captain Marvel</b></a></li>";
        echo "<li class='list-group-item'><a href='#card1'><b>Shazam</b></a></li></ul></div>";
        echo "<div class='container'>";
        echo "<div class='col-md-6 col-md-offset-1'>";
        echo "<form class='navbar-form' action='show.php' method='POST'>";
        echo "<div class='form-group'>";
        echo "<input type='text' class='form-control' name='time' size='50%' placeholder='Select Time' autofocus>&nbsp;&nbsp;";
        echo "<button type='submit' class='btn btn-default'>Submit</button>";
        echo "</form>";
        echo "</div>";
        echo "</div><br><br><br>";
        echo "<h2 align='center'>".ucwords($movie)."</h2>";
        echo "<hr width='18%' align='center'>";
        echo "<div class='col-md-3 col-md-offset-1'>";
        echo "<div class='row'>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<ul class='list-group'>";
            echo "<li class='list-group-item'><a href=''><b>" .$row['start']."&nbsp;&nbsp;".$row['am']."</b></a></li>";
            echo "</ul>";
        }
        echo "</div>";
        echo "</div>";
        echo "</div>";
    } else {
        echo "0 results";
        
    }

?>
</body>
</html>