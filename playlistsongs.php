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
    </div>

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
            $resultset = $mysqli->query("SELECT tblsongs.songid, tblartist.name, tblsongs.title from tblsongs, tblartist, tblplaylistsongs WHERE tblsongs.songid = tblplaylistsongs.songid and tblplaylistsongs.playlistid = '".$playlistid."' and tblartist.artistid = tblsongs.artistid") or die ($mysqli->error);
        ?>
        <div class="playlist">
            <h2>Songs<h2>
            
            <div class="card">
                    <?php
                        while($row = $resultset->fetch_assoc()):
                    ?>
                    <?php
                    echo "<div class='item'>
                            <img src='images/song".$row['songid'].".jpg'>
                            <a href='musicpage.php?id=".$row['songid']."'>
                            <div class='btnPlay' onclick='location.href=''''>
                                <span><i class='fa-solid fa-play'></i></span>
                            </div>
                            </a>
                            <h4>".$row['title']."</h4>  
                            <p>".$row['name']."</p>
                        </div>";
                        ?>
                    <?php endwhile;?>
            </div>
        </div>
        
</body>
</html>