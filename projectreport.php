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
    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
    <title>Document</title>
</head>
<body>
    <h1>Project Report</h1>
    <div class="tbl">
        <h2>List Of Playlists Created by User <?php
        echo "".$_SESSION['username']."";
        ?></h2>
    <table class="table" cellspacing="0" width="100%" style="text-align: center;">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Playlist ID</th>
                <th>Playlist Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $mysqli = new mysqli('localhost', 'root', '', 'dbbaringf2') or die (mysqli_error($mysqli));
                $resultset = $mysqli->query("SELECT * from tblplaylist WHERE tblplaylist.userid = ".$_SESSION['accountid']."") or die ($mysqli->error);
                while($row = $resultset->fetch_assoc()):
                echo "<tr>
                    <td>".$_SESSION['accountid']."</td>
                    <td>".$row['playlistid']."</td>
                    <td>".$row['playlistname']."</td>
                    </tr>";
                endwhile;?>
        </tbody>
    </table>
    <h2>List of Songs in A Complete Playlist</h2>
    <table class="table" cellspacing="0" width="100%" style="text-align: center;">
        <thead>
            <tr>
                <th>Song ID</th>
                <th>Title</th>
                <th>Artist</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $mysqli = new mysqli('localhost', 'root', '', 'dbbaringf2') or die (mysqli_error($mysqli));
            $resultset = $mysqli->query("SELECT tblsongs.songid, tblartist.name, tblsongs.title from tblsongs, tblartist, tblplaylistsongs WHERE tblsongs.songid = tblplaylistsongs.songid      and tblplaylistsongs.playlistid = 53 and tblartist.artistid = tblsongs.artistid") or die ($mysqli->error);
            while($row = $resultset->fetch_assoc()):
                echo "<tr>
                    <td>".$row['songid']."</td>
                    <td>".$row['title']."</td>
                    <td>".$row['name']."</td>
                    </tr>";
            endwhile;?>
        </tbody>
    </table>
    <h2>List of Songs in KPop Genre</h2>
    <table class="table" cellspacing="0" width="100%" style="text-align: center;">
        <thead>
            <tr>
                <th>Song ID</th>
                <th>Song Title</th>
                <th>Artist</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $mysqli = new mysqli('localhost', 'root', '', 'dbbaringf2') or die (mysqli_error($mysqli));
            $resultset = $mysqli->query("SELECT tblsongs.songid, tblartist.name, tblsongs.title from tblsongs, tblartist, tblgenre WHERE tblsongs.genreid = tblgenre.genreid and tblsongs.genreid = 2 and tblsongs.artistid = tblartist.artistid") or die ($mysqli->error);
            while($row = $resultset->fetch_assoc()):
                echo "<tr>
                    <td>".$row['songid']."</td>
                    <td>".$row['title']."</td>
                    <td>".$row['name']."</td>
                    </tr>";
            endwhile;?>
        </tbody>
    </table>
    <h1>Charts</h1>
    <h2>Most Followed Artists</h2>
    <table class="sortable" cellspacing="0" width="100%" style="text-align: center;">
        <thead>
            <tr>
                <th>Artist ID</th>
                <th>Artist Name</th>
                <th>Followers</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $mysqli = new mysqli('localhost', 'root', '', 'dbbaringf2') or die (mysqli_error($mysqli));
            $resultset = $mysqli->query("SELECT * from tblartist") or die ($mysqli->error);
            while($row = $resultset->fetch_assoc()):
                $result = $mysqli->query("SELECT COUNT(*) as count from artistfollowers WHERE artistid = ".$row['artistid']."") or die ($mysqli->error);
                $row1 = $result->fetch_assoc();
                echo "<tr>
                    <td>".$row['artistid']."</td>   
                    <td>".$row['name']."</td>
                    <td>".$row1['count']."</td>
                    </tr>";
            endwhile;?>
        </tbody>
    </table>
    <h2>Most Listened Songs</h2>
    <table class="sortable" cellspacing="0" width="100%" style="text-align: center;">
        <thead>
            <tr>
                <th>Song Name</th>
                <th>Artist Name</th>
                <th>Plays</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $resultset = $mysqli->query("SELECT songid, title, tblartist.name from tblsongs, tblartist WHERE tblsongs.artistid = tblartist.artistid") or die ($mysqli->error);
            $result = $mysqli->query("SELECT songid from tblsongs") or die ($mysqli->error);
                
            while($row = $resultset->fetch_assoc()):
                $row2 = $result->fetch_assoc();
                $result1 = $mysqli->query("SELECT COUNT(*) as count from tbllistenedsongs WHERE songid = ".$row2['songid']."") or die ($mysqli->error);
                $row1 = $result1->fetch_assoc();
                echo "<tr>
                    <td>".$row['title']."</td>   
                    <td>".$row['name']."</td>
                    <td>".$row1['count']."</td>
                    </tr>";
            endwhile;?>
        </tbody>
    </table>
    <h2>Most Liked Songs</h2>
    <table class="sortable" cellspacing="0" width="100%" style="text-align: center;">
        <thead>
            <tr>
                <th>Song Name</th>
                <th>Artist Name</th>
                <th>Likes</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $resultset = $mysqli->query("SELECT songid, title, tblartist.name from tblsongs, tblartist WHERE tblsongs.artistid = tblartist.artistid") or die ($mysqli->error);
            $result = $mysqli->query("SELECT songid from tblsongs") or die ($mysqli->error);
                
            while($row = $resultset->fetch_assoc()):
                $row2 = $result->fetch_assoc();
                $result1 = $mysqli->query("SELECT COUNT(*) as count from tbllikedsongs WHERE songid = ".$row2['songid']."") or die ($mysqli->error);
                $row1 = $result1->fetch_assoc();
                echo "<tr>
                    <td>".$row['title']."</td>   
                    <td>".$row['name']."</td>
                    <td>".$row1['count']."</td>
                    </tr>";
            endwhile;?>
        </tbody>
    </table>
    <h2>Users with most created Playlists</h2>
    <table class="sortable" cellspacing="0" width="100%" style="text-align: center;">
        <thead>
            <tr>
                <th>Username</th>
                <th>Playlist Count</th>
            </tr>
        </thead>
        <tbody>
        <?php
            
            $resultset = $mysqli->query("SELECT * from tbluseraccount") or die ($mysqli->error);
                
            while($row = $resultset->fetch_assoc()):
                $result = $mysqli->query("SELECT COUNT(*) as count from tblplaylist WHERE userid = ".$row['accountid']."") or die ($mysqli->error);
                $row1 = $result->fetch_assoc();
                echo "<tr>
                    <td>".$row['username']."</td>   
                    <td>".$row1['count']."</td>
                    </tr>";
            endwhile;?>
        </tbody>
    </table>
    <h2>Artist with Most Songs</h2>
    <table class="sortable" cellspacing="0" width="100%" style="text-align: center;">
        <thead>
            <tr>
                <th>Artist Name</th>
                <th>Songs Count</th>
            </tr>
        </thead>
        <tbody>
        <?php
            
            $resultset = $mysqli->query("SELECT * from tblartist") or die ($mysqli->error);
                
            while($row = $resultset->fetch_assoc()):
                $result = $mysqli->query("SELECT COUNT(*) as count from tblsongs WHERE artistid = ".$row['artistid']."") or die ($mysqli->error);
                $row1 = $result->fetch_assoc();
                echo "<tr>
                    <td>".$row['name']."</td>   
                    <td>".$row1['count']."</td>
                    </tr>";
            endwhile;?>
        </tbody>
    </table>
    </div>
</body>
</html>