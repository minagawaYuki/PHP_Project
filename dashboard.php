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
    <link rel="stylesheet" href="indexstyles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-nav">
            <div class="logo">
                <a href=""></a>
            </div>
            <ul>
                <li><a href="">
                    <span><i class="fa-solid fa-house"></i></span>
                <span>Home</span>
            </a></li>
            <li><a href="">
                <span><i class="fa-solid fa-magnifying-glass"></i></span>
            <span>Search</span>
        </a></li>
            </ul>
        </div>
        <div class="sidebar-nav2">
            <div class="logo">
                <a href=""></a>
            </div>
            <ul>
                <li><a href="">
                    <span><i class="fa-solid fa-book"></i></span>
                <span>Your Library</span>
            </a></li>
            <li>
                <div class="sidebar-scroll">
                    <div class="create-playlist">
                        <h4>Create your first playlist</h4>
                        <p>It's easy, we'll help you</p>
                        <button>Create Playlist</button>    
                    </div>
                </div>
            </li>
            </ul>
        </div>
    </div>
    <div class="main-section">
        <div class="top-nav">
            <div class="username">
            <?php
                        echo "<span>".$_SESSION['username']."<span>";
                    ?>
            </div>
        </div>
        <div class="song-section">
            <h1>Songs<h1>
            <?php
            $mysqli = new mysqli('localhost', 'root', '', 'dbbaringf2') or die (mysqli_error($mysqli));
            $resultset = $mysqli->query("SELECT songname from tblsongs") or die ($mysqli->error);
            ?>
            <div class="song-list">
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
        
        <div class="playlist-section">
            <h1>Your Playlists<h1>
            <?php
            $mysqli = new mysqli('localhost', 'root', '', 'dbbaringf2') or die (mysqli_error($mysqli));
            $resultset = $mysqli->query("SELECT * from tblplaylist WHERE userid = ".$_SESSION['accountid']."") or die ($mysqli->error);
            ?>
            <div class="playlist-list">
                <ol>
                    <?php
                        while($row = $resultset->fetch_assoc()):
                    ?>
                    <li>
                        <?php echo "<a href='playlistsongs.php?id=".$row['playlistid']."' style='padding-right: 5px;'>".$row['playlistname']."</a>" ?>
                    </li>
                    <?php endwhile;?>
                </ol>
            </div>
        </div>
    </div>
    
</body>
</html>