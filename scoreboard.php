<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Maze - Tabela Wyników</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/scoreboard.css">
</head>
<body>
<div class="navbar">
    <div class="navLeft">
        <h1><span style="color: #aaec43; text-shadow: 0 0 5px black;">T</span>he <span style="color: #aaec43;text-shadow: 0 0 5px black;">M</span>aze</h1>
    </div>
    <div class="navRight">
        <div class="navButton">
            <p onclick="window.location.href = 'index.html';" class="navButtonButton">Strona Główna</p>
        </div>
        <div class="navButton">
            <p onclick="window.location.href = 'index.html#team';" class="navButtonButton">Dev Team</p>
        </div>
        <div class="navButton">
            <p onclick="window.location.href = 'scoreboard.php';" class="navButtonButton">Tabela wyników</p>
        </div>
        <div class="navButton">
            <p onclick="window.location.href = 'login.php';" class="navButtonButton">Logowanie</p>
        </div>
    </div>
</div>
<div class="content">
    <div class="contentBox">
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
                    </tr>");
                }
                ?>
            </table>
        </div>
    </div>
</div>
<div class="footer">
    <div class="footerLeft">
        <p>Dominik Chudyka - Fullstack Dev</p>
        <p>Jakub Cichocki - Backend Dev</p>
    </div>
    <div class="footerLogo">
        <h1 style="margin: 0;"><span style="color: #aaec43; text-shadow: 0 0 5px black;">T</span>he <span style="color: #aaec43;text-shadow: 0 0 5px black;">M</span>aze</h1>
    </div>
    <div class="footerRight">
        <p>Patryk Wawrzynek - Game Dev</p>
        <p>Łukasz Szymura - Frontend Dev</p>
    </div>
</div>
<div id="loader" class="loader">
    <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
</div>
</body>
<script src="assets/js/loader.js"></script>
</html>