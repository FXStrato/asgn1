<!-- 
    This php file displays the data for the player. It comes as a GET from 
    index, and calls on the database through pyr.php, returning data. 
    -->
<?php
require('pyr.php');
function button(){
?>
<form action="index.php">
    <input type="submit" class="btn" value="Return To Search">
</form>
<?php
}

function displayPlayer()
{
    if (isset($_GET['txtSearch']) && $_GET['txtSearch'] != '') {
        try {
        	$class = new Player($_GET['txtSearch']);
            if (count($class->getPlayer()) === 1) {
                $result = $class->getPlayer();
                $row = $result[0];
                $image = str_replace(" ", "_", $row['name']);
                $image = str_replace(".", "", $image);
                $image = str_replace("'", "", $image);
?>
<h1 class="head"> <?php
                print $row['name'];
?> </h1>
<div>
	<div class="clone"><img src="http://i.cdn.turner.com/nba/nba/.element/img/2.0
	/sect/statscube/players/large/<?php print $image?>.png"
	onerror= "this.src='anonymous.jpg'" alt="Picture of <?php $row['name']?>"></div>
    <table class="clone" style="margin-top: -30px">
        <tr>
            <td>GP</td>
            <td>FGP</td>
            <td>TPP</td>
            <td>FTP</td>
            <td>PPG</td>
        </tr>
        <tr>
            <td><?php
                print $row['GP'];
?></td>
            <td><?php
                print $row['FGP'];
?></td>
            <td><?php
                print $row['TPP'];
?></td>
            <td><?php
                print $row['FTP'];
?></td>
            <td><?php
                print $row['PPG'];
?></td>
        </tr>
    </table>
    -1: Not Available.
</div>
<?php
button();
            } else if (count($class->getPlayer()) > 1) {
?>
 	<h1> Did you mean to find: </h1>
 	<div id="search-suggest" class="clone">
<?php
                for ($i = 0; $i < count($class->getPlayer()); $i++) {
                	$result = $class->getPlayer();
                    $row  = $result[$i];
                    $link = "player.php?txtSearch=" . $row['name'];
                    $link = str_replace(" ", "+", $link);
	                $image = str_replace(" ", "_", $row['name']);
	                $image = str_replace(".", "", $image);
	                $image = str_replace("'", "", $image);
?>
 			<div class="other" style="font-size: 19px"><a href="
 			<?php
                    print $link;
?>"><img src="http://i.cdn.turner.com/nba/nba/.element/img/2.0
	/sect/statscube/players/large/<?php print $image?>.png"
	onerror= "this.src='anonymous.jpg'" alt="Picture of <?php $row['name']?>"></br><?php
                    print $row['name'];
?></a></div>
 <?php
                }
        echo "</div>";
        button();
            } else {
?>
<div class="clone"> Player "<?php
                print $_GET['txtSearch'];
?>" Not Found. Please Search Again. </div>
<?php
button();
            }
        }
        catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    } else {
        print "Please Try Again.";
        button();
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>NBA Searcher</title>
        <link rel="stylesheet" type="text/css" href="player.css">
        <link href='http://fonts.googleapis.com/css?family=Khand' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
    </head>
    <body>
        <?php
displayPlayer();
?>
    </body>
</html>