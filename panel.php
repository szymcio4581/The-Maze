<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Maze - Panel Administratora</title>
    <link rel="stylesheet" href="assets/css/adminGui.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="main">
    <div class="menu" id="menu">
        <div class="burgir">
            <label for="burger" class="burger">
                <input id="burger" type="checkbox" onchange="menuShow()">
                <span></span>
                <span></span>
                <span></span>
            </label>
        </div>
        <div id="menuContent">
            <div class="menuPfp">
                <?php session_start();
                if(!isset($_SESSION['logged']))
                {
                    header('Location: login.php');
                    exit();
                }
                echo("<img id='pfp' src='assets/images/avatar/".$_SESSION["avatar"]."' alt='tfoja tfasz'>");
                echo("<h2>".$_SESSION["login"]."</h2>")
                ?>
            </div>
            <div class="wypelniacze">
                <div class="wypelniaczeItem">
                    <div class="wypelniaczeText">
                        <p>13:13</p>
                    </div>
                    <img class="wypelniaczeIcon" src="assets/images/clock.png" alt="zegar">
                </div>
                <div class="wypelniaczeItem">
                    <div class="wypelniaczeText">
                        <p>11-02-2023</p>
                    </div>
                    <img class="wypelniaczeIcon" src="assets/images/calendar.png" alt="zegar">
                </div>
            </div>
        </div>
        <div class="logout">
            <button class="logoutButton" onclick="window.location.href = 'logout.php';">
                <img class="logoutIcon" src="assets/images/log-out.png" alt=".">
                <span>Wyloguj się</span>
            </button>
        </div>
    </div>
    <div class="content">
        <div class="blur">
            <div class="contentLeft">
                <div>

                </div>
            </div>
            <div class="contentRight">
                <div class="table">
                    <div class="scoreboard">
                        <table>
                            <?php
                            $connect = @new mysqli("localhost", "root", "", "themaze");
                            $sql = "SELECT * FROM `score`";
                            $result = mysqli_query($connect, $sql);
                            if(!$connect){
                                echo("Problem połączenia z bazą");
                                exit();
                            }
                            if(!$result){
                                echo("Problem z zapytaniem do bazy");
                                exit();
                            }

                            while($row = mysqli_fetch_assoc($result)){
                                echo("<tr>
                                <td>".$row["name"]."</td>
                                <td>".$row["time"]." Czas</td>
                                <td>
                                    <form action='panel.php' method='post'>
                                        <input type='hidden' name='hidden' value=".$row["id"].">
                                        <input class='delete' type='submit' value='Delete'>
                                    </form>
                                </td></tr>
                                ");
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="loader" class="loader">
    <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
</div>
</body>
<script src="assets/js/adminLeft.js"></script>
<script src="assets/js/loader.js"></script>
</html>