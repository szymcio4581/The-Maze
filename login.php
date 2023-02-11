<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Maze - Logowanie</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/home.css">
</head>
<body>
<div class="background">
    <div class="logyn" id="logyn">
        <div class="actualLogyn">
            <div class="login-box">
                <p class="logynText">Logowanie</p>
                <form method="post" action="login.php">
                    <div class="user-box">
                        <input required="" name="username" type="text">
                        <label>Nazwa Użytkownika</label>
                    </div>
                    <div class="user-box">
                        <input required="" name="password" type="password">
                        <label>Hasło</label>
                    </div>
                    <div class="logynClose">
                        <img alt="zamknij" onclick="window.location.href='index.html'" id="closeIco" src="assets/images/close.png">
                    </div>
                    <input type="submit" class="logynButton" value="Zaloguj się" name="submit">
                    <div class="logynResult">
                        <p><?php session_start();
                            if(isset($_SESSION['logged']))
                            {
                                header('Location: panel.php');
                                exit();
                            }
                            if(isset($_POST["submit"])){
                                $user = $_POST["username"];
                                $password = $_POST["password"];
                                $connect = @new mysqli("localhost", "root", "", "themaze");
                                $sql = "SELECT * FROM users WHERE login = '$user' AND password = '$password'";
                                $result = mysqli_query($connect, $sql);
                                if(!$connect){
                                    echo("Problem połączenia z bazą");
                                    exit();
                                }
                                if(!$result){
                                    echo("Problem z zapytaniem do bazy");
                                    exit();
                                }
                                if(!empty($user) && !empty($password)){
                                    if(mysqli_num_rows($result)>0){
                                        $row = mysqli_fetch_assoc($result);
                                        $_SESSION["id"] = $row["id"];
                                        $_SESSION["login"] = $user;
                                        $_SESSION["logged"] = true;
                                        $_SESSION["avatar"] = $row["avatar"];
                                        echo("siema");
                                        header('Location: panel.php');
                                    }else{
                                        echo("Nieprawidłowy login bądź hasło!");
                                    }
                                }else{
                                    echo("Wypełnij wszystkie pola!");
                                }
                                mysqli_close($connect);
                            }
                            ?>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="loader" class="loader">
    <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
</div>
</body>
<script src="assets/js/loader.js"></script>
</html>