<?php
    include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <div><?php
            echo "<h1>".$playlistname."</h2>"; 
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
    <table id="tblStudentRecords" class="table" cellspacing="0" width="100%" style="text-align: center;">
            <thead>
                <tr>
                    <th>Song ID</th>
                    <th>Song Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody><?php
                        while($row = $resultset->fetch_assoc()):
                    ?>
                    <tr>
                        <td><?php echo $row['songid'] ?></td>
                        <td><?php echo $row['songname'] ?></td>
                        <td>
                            <?php 
                             echo "<a href='deleteplaylists.php?id=".$row['songid']."'>DELETE</a>"; ?>
                        </td>
                    </tr>
                    <?php endwhile;?>
                </tbody>
        </table>
</body>
</html>