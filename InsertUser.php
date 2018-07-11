<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="post">
            User name <input type="text" name="name" size="10"/>
            <br>
            Password <input type="password" name="password"/>
            <input type="submit" value="Create"/>
        </form>
        <?php
        require_once 'mysql_login.php';
        if (isset($_POST["name"])) {
            $name = $_POST["name"];
            $password = $_POST["password"];
            $salt1 = "qm&h*";
            $salt2 = "pg!@";
            $token = hash('ripemd128', "$salt1$password$salt2");
            $sql = "Insert into Users(username,password)"
                    . " values(?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $name, $token);
           
            $stmt->execute();
        }
        ?>
    </body>
</html>


