<?php
    include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexstyles.css">
    <title>Document</title>
</head>
<?php
    $playlistid = $_GET['id'];
   
    
    // sql to delete a record
    $sql = "SELECT playlistname FROM tblplaylist WHERE playlistid = '".$playlistid."'";
    
    $result = mysqli_query($connection,$sql);
    $row = mysqli_fetch_array($result);
    $playlistname = $row[0];

?>
<body>
    <div class="playlist-title"><?php
            echo "<h1>".$playlistname."</h1>";
        ?>
        </div>
    <h2>Add Song: </h1>
    <form method="post">
        <input type="text" placeholder="Song name" name="txtsongid">
        <button type="submit" name="btnAdd">Add</button>
    </form>

    <?php
        $id = $_GET['id'];
                if(isset($_POST['btnAdd'])){		
                    //retrieve data from form and save the value to a variable
                    //for tbluserprofile
                    $songid=$_POST['txtsongid'];
                    
                    
                    
                    
                    $sql1 ="Insert into tblplaylistsongs(playlistid, songid) values('".$playlistid."','".$songid."')";
                    //save data to tbluserprofile			
                    
                    mysqli_query($connection,$sql1);
                    
                }    

            ?>
            <?php
            $mysqli = new mysqli('localhost', 'root', '', 'dbbaringf2') or die (mysqli_error($mysqli));
            $resultset = $mysqli->query("SELECT tblsongs.songid, tblsongs.songname from tblsongs, tblplaylistsongs WHERE tblsongs.songid = tblplaylistsongs.songid and tblplaylistsongs.playlistid = '".$playlistid."'") or die ($mysqli->error);
        ?>
        <div class="playlist-section">
            <h1>Your Songs<h1>
            <div class="playlist-list">
                <ol>
                    <?php
                        while($row = $resultset->fetch_assoc()):
                    ?>
                    <li>
                        <?php echo $row['songname'] ?>
                    </li>
                    <?php endwhile;?>
                </ol>
            </div>
        </div>
        
</body>
</html>