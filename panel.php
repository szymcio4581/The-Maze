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
                        <p id="time" ></p>
                    </div>
                    <img class="wypelniaczeIcon" src="assets/images/clock.png" alt="zegar">
                </div>
                <div class="wypelniaczeItem">
                    <div class="wypelniaczeText">
                        <p id="date" ></p>
                    </div>
                    <img class="wypelniaczeIcon" src="assets/images/calendar.png" alt="zegar">
                </div>
            </div>
        </div>
        <div class="logout">
            <button class="logoutButton" id="okok" onclick="window.location.href = 'logout.php';">
                <img class="logoutIcon" src="assets/images/log-out.png" alt=".">
                <span>Wyloguj się</span>
            </button>
        </div>
    </div>
    <div class="content">
        <div class="blur">
            <div class="contentLeft">
                <div class="realContent">
                    <div class="leftTop">
                        <div class="adminDel">
                            <div class="adminDelHeader">
                                <h3 style="margin: 0">Usuwanie Administratora</h3>
                            </div>
                            <form class="adminDelForm" method="post" action="panel.php">
                                <select class="adminDelSelect" name="user" id="select" required>
                                <?php
                                    $connect = @new mysqli("localhost", "root", "", "themaze");
                                    $sql = "SELECT * FROM `users`";
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
                                        echo("<option value=".$row["id"].">".$row["login"]."</option>");
                                    }
                                ?>
                                </select>
                                <input class="delete" type="submit" name="submit-del-adm" value="Usuń">
                            </form>
                        </div>
                        <div class="recordsClear">
                            <div class="recordsClearHeader">
                                <h3 style="margin: 0">Usuń Wszystkie Rekordy</h3>
                            </div>
                            <div class="recordsClearForm">
                                <form action="panel.php" method="post">
                                    <input class="delete" type="submit" name="submit-del-all" value="Usuń">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="holder">
                        <div class="adminAdd">
                            <div class="adminAddHeader">
                                <h3 style="margin: 0">Dodawanie Administratora</h3>
                            </div>
                            <div class="adminAddContent">
                                <form class="adminAddForm" action="panel.php" method="post" enctype="multipart/form-data">
                                    <div class="adminAddInputs">
                                        <div class="pos">
                                            <label for="username">Nazwa użytkownika</label>
                                            <input class="addInput" type="text" name="username" id="username">
                                        </div>
                                        <div class="pos">
                                            <label for="password">Hasło</label>
                                            <input class="addInput" type="text" name="password" id="password">
                                        </div>
                                        <div class="pos">
                                            <label for="password">Zdjęcie profilowe</label>
                                            <input class="addInput" type="file" name="file" id="file">
                                        </div>
                                    </div>
                                    <div class="adminAddButton">
                                        <input class="add" type="submit" name="submit-add-adm" value="Add">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="holder">
                            <div class="addResult">
                                <div class="addResultHeaderHolder">
                                    <h3 class="addResultHeader">Dodawanie wyniku</h3>
                                </div>
                                <form action="panel.php" method="post" style="width: 100%; height: auto;">
                                    <div class="addResultContent">
                                        <div class="pos">
                                            <label for="username">Nazwa użytkownika</label>
                                            <input class="addInput" type="text" name="username" id="username">
                                        </div>
                                        <div class="pos">
                                            <label for="score">Wynik</label>
                                            <input class="addInput" type="text" name="score" id="score">
                                        </div>
                                        <div class="pos okok">
                                            <input class="add" type="submit" name="submit-add-score" value="Dodaj">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="holder">
                            <div class="addResult">
                                <div class="addResultHeaderHolder">
                                    <h3 class="addResultHeader">Zmiana hasła</h3>
                                </div>
                                <form action="panel.php" method="post" style="width: 100%; height: auto;">
                                    <div class="addResultContent">
                                        <div class="pos">
                                            <label for="username">Nazwa użytkownika</label>
                                            <select class="adminDelSelect resetPasswordSelect" name="user-admins" id="select" required>
                                            <?php
                                                $connect = @new mysqli("localhost", "root", "", "themaze");
                                                $sql = "SELECT * FROM `users`";
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
                                                    echo("<option value=".$row["id"].">".$row["login"]."</option>");
                                                }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="pos">
                                            <label for="score">Nowe hasło</label>
                                            <input class="addInput" type="text" name="password-change" id="password">
                                        </div>
                                        <div class="pos okok">
                                            <input class="add" type="submit" name="submit-change-pass" value="Zmień">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <div class="resultContent">
                    <div class="result">
                        <h2>
                            <?php
                            $connect = @new mysqli("localhost", "root", "", "themaze");
                            if(!$connect){
                                echo("Problem połączenia z bazą");
                                exit();
                            }
                            if(isset($_POST["submit-del-adm"])){
                                $adm = $_POST["user"];
                                $sql = "DELETE FROM `users` WHERE id = '$adm'";
                                if($_SESSION["id"] != $adm){
                                    $result = mysqli_query($connect, $sql);
                                    if(!$result){
                                        echo("Problem z zapytaniem do bazy");
                                        exit();
                                    }else{
                                        echo("Usunięto administratora!");
                                    }
                                } else{
                                    echo("Nie możesz usunąć samego siebie!");
                                }
                            }else if(isset($_POST["submit-del-all"])){
                                echo("Czy napewno? 
                                <form action='panel.php' method='post'>
                                <input class='delete' type='submit' name='submit-confirm' value='Yes'>
                                <input class='delete' type='submit' name='submit-cancel' value='No'>
                                </form>");
                            }else if (isset($_POST["submit-confirm"])){
                                $sql2 = "DELETE FROM `score`";
                                $result2 = mysqli_query($connect, $sql2);
                                if(!$result2){
                                    echo("Problem z zapytaniem do bazy");
                                    exit();
                                }else{
                                    echo("Usunięto wszystkie rekordy z bazy!");
                                }
                            } else if (isset($_POST["submit-cancel"])) {
                                echo("Anulowano");
                            }else if (isset($_POST["submit-add-adm"])) {
                                $user = $_POST["username"];
                                $password = $_POST["password"];
                                $file = $_FILES['file']["name"];
                                $sql3 = ("SELECT * FROM users WHERE login='$user'");
                                $sql4 = ("INSERT INTO users(id, login, password, avatar) VALUES ('','$user','$password','$file')");
                                $result3 = mysqli_query($connect, $sql3);
                                if(!empty($user) && !empty($password) && !empty($file)){
                                    if(mysqli_num_rows($result4)==0){
                                        mysqli_query($connect, $sql4);
                                        echo("Zajerestrowałeś sie!");
                                        $filename = 'assets/images/avatar/'.$_FILES['file']["name"];
                                        $new_file = fopen($filename, 'w');
                                        fwrite($new_file, file_get_contents($_FILES['file']['tmp_name']));
                                    }else{
                                        echo("Taki login juz istnieje!");
                                    }
                                }else{
                                    echo("Wypełnij wszystkie pola!");
                                }
                            }else if(isset($_POST["submit-add-score"])){
                                $gamer = $_POST["username"];
                                $score = $_POST["score"];
                                $sql5 = "INSERT INTO `score`(`id`, `name`, `time`) VALUES ('','$gamer','$score')";
                                $result4 = mysqli_query($connect, $sql5);
                                if(!$result4){
                                    echo("Problem z zapytaniem do bazy");
                                    exit();
                                }else{
                                    echo("Dodany wynik do bazy!");
                                }

                            }else if(isset($_POST["submit-change-pass"])){
                                $admin = $_POST["user-admins"];
                                $pass = $_POST["password-change"];
                                if(!empty($pass)){
                                    echo("Czy napewno chcesz zmienić hasło na: '$pass'? 
                                    <form action='panel.php' method='post'>
                                    <input type='hidden' name='confirm-id' value='$admin'>
                                    <input type='hidden' name='confirm-pass' value='$pass'>
                                    <input class='delete' type='submit' name='submit-confirm-change' value='Yes'>
                                    <input class='delete' type='submit' name='submit-cancel' value='No'>
                                    </form>");
                                }else{
                                    echo("Prowadz nowe hasło!");
                                }
                            }else if(isset($_POST["submit-confirm-change"])){
                                $id1 = $_POST["confirm-id"];
                                $pass1 = $_POST["confirm-pass"];
                                $sql6 = "UPDATE `users` SET `password`='$pass1' WHERE id = '$id1'";
                                $result5 = mysqli_query($connect, $sql6);
                                if(!$result5){
                                    echo("Problem z zapytaniem do bazy");
                                    exit();
                                }else{
                                    echo("Zmieniono hasło!");
                                }
                            }else if(isset($_POST["submit-del-time"])){
                                $delid = $_POST["hidden-id"];
                                $sql7 = "DELETE FROM `score` WHERE id = '$delid'";
                                $result6 = mysqli_query($connect, $sql7);
                                if(!$result6){
                                    echo("Problem z zapytaniem do bazy");
                                    exit();
                                }else{
                                    echo("Usunięto użytkownika o id: '$delid'!");
                                }
                            }
                            ?>
                        </h2>
                    </div>
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
                                        <input type='hidden' name='hidden-id' value=".$row["id"].">
                                        <input class='delete' type='submit' name='submit-del-time' value='Usuń'>
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
<script src="assets/js/timer.js"></script>
</html>