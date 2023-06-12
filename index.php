
<!DOCTYPE html>
<html>
<head>
    <? include("assets/include/favicon.php")?>
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"> 
    <title>Bisca</title>  
</head>
<body>
    <div class="card">
        <div class="card-content">
            <img src="https://cdn.discordapp.com/attachments/776139250138873898/1117532786237120563/cover.png" alt="Logo du MHSC" class="card-image">
            <div class="card-text">
                <form  method="post">
                    <input class ="loginbutton"type="text" placeholder="Enter Username or Mail" name="login_username" required><br/>
                    <input class ="loginbutton"type="password" placeholder="Enter password" name="login_password" required><br/>
                    <button name="button" class ="button" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
    <?
        $serveur = "//";
        $login = "//";
        $pass = "//";
        $login_username = $_POST['login_username'];
        $login_password = $_POST['login_password'];
        $date = date("Y-m-d H:i:s");
        try{
            $connection = new PDO("mysql:host=$serveur;dbname=sportmarludev",$login, $pass);
            $connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $ip = $_SERVER['REMOTE_ADDR'];
            $stmt = $connection->prepare("SELECT * FROM // WHERE //=?");
            $stmt->execute([$ip]); 
            $user = $stmt->fetch();
            if ($user) {
                echo 'ip already used';
            }else{
                $codesql = "INSERT INTO user(ip, date) VALUES ('$ip', '$date')";
                $connection -> exec($codesql);
            } 
        }
        catch(PDOException $e){
            echo $e->getMessage();
        };
        if($login_username == "facingmetro" and $login_password == "202017"){  
            echo '<a href="//" download="//" target="_blank" class="button">télécharger</a>';
        };
    ?>
</body>
</html>
