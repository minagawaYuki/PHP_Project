<?php
    include 'connect.php';
?>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboardstyle.css">
    <title>Document</title>
</head>
<body>
    <div class="landing-page">
        <div class="navbar">
            <h1>Logo</h1>
            <nav>
                <div class="user-profile">
                    <?php
                        echo "<p>".$_SESSION['username']."<p>"
                    ?>
                </div>
            </nav>
        </div>
    </div>
    <div class="content">
        <h1>This is the landing page.</h1>
        <p>Spotify is a digital music, podcast, and video service that gives you
        access to millions of songs and other content from creators all over the world.
        Basic functions such as playing music are totally free, but you can also choose to upgrade to Spotify Premium.
        </p>
    </div>

    <div class="user-playlist">
        
        <div class="create-playlist">
            <p>Create Playlist:</p>
            <form method="post">
                <input type="text" placeholder="Playlist name" name="txtplaylist">
                <button type="submit" name="btnCreate">Create</button>
                <?php	
                if(isset($_POST['btnCreate'])){		
                    //retrieve data from form and save the value to a variable
                    //for tbluserprofile
                    $playlistname=$_POST['txtplaylist'];	
                    $songname=$_POST['txtplaylist'];
                    
                    
                    
                    //save data to tbluserprofile			
                    $sql1 ="Insert into tblplaylist(userid, playlistname, songs) values('".$_SESSION['accountid']."','".$playlistname."','".$songname."')";
                    mysqli_query($connection,$sql1);
                    
                }    

            ?>
            </form>
        </div>
        <table id="tblStudentRecords" class="table" cellspacing="0" width="100%">
            
        </table>
    </div>

    <div class="registered-users-table" style="margin-top: 105px;">
        <div class="registered-users"><h1 style="text-align: center;">Your Playlists</h1></div>
        <?php
            $mysqli = new mysqli('localhost', 'root', '', 'dbbaringf2') or die (mysqli_error($mysqli));
            $resultset = $mysqli->query("SELECT * from tblplaylist WHERE userid = ".$_SESSION['accountid']."") or die ($mysqli->error);
        ?>
        <table id="tblStudentRecords" class="table" cellspacing="0" width="100%" style="text-align: center;">
            <thead>
                <tr>
                    <th>Playlist ID</th>
                    <th>Playlist Name</th>
                    <th>Playlist Songs</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody><?php
                        while($row = $resultset->fetch_assoc()):
                    ?>
                    <tr>
                        <td><?php echo $row['playlistid'] ?></td>
                        <td><?php echo $row['playlistname'] ?></td>
                        <td><?php echo $row['songs'] ?></td>
                        <td>
                            <?php echo "<a href='playlistsongs.php?id=".$row['playlistid']."' style='padding-right: 5px;'>VIEW</a>";
                            echo "<a href='editplaylist.php?id=".$row['playlistid']."'>EDIT</a>";
                             echo "<a href='deleteplaylists.php?id=".$row['playlistid']."'>DELETE</a>" ?>
                        </td>
                    </tr>
                    <?php endwhile;?>
                </tbody>
        </table>
    </div>
    
    <div class="registered-users-table" style="margin-top: 105px;">
        <div class="registered-users"><h1 style="text-align: center;">List of Users Registered</h1></div>
        <?php
            $mysqli = new mysqli('localhost', 'root', '', 'dbbaringf2') or die (mysqli_error($mysqli));
            $resultset = $mysqli->query("SELECT * from tbluserprofile") or die ($mysqli->error);   
        ?>
        <table id="tblStudentRecords" class="table" cellspacing="0" width="100%" style="text-align: center;">
            <thead>
                <tr>
                    <th>Seq Number</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody><?php
                        while($row = $resultset->fetch_assoc()):
                    ?>
                    <tr>
                        <td><?php echo $row['userid'] ?></td>
                        <td><?php echo $row['firstname'] ?></td>
                        <td><?php echo $row['lastname'] ?></td>
                        <td><?php echo $row['gender'] ?></td>
                        <td>
                            <?php echo "<a href=''>VIEW</a>";
                                echo "<a href='delete.php?id=".$row['userid']."'>DELETE</a>" ?>
                        </td>
                    </tr>
                    <?php endwhile;?>
                </tbody>
        </table>
    </div>
    
</body>
</html>