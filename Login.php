<!DOCTYPE html>

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
            <input type="submit" value="Login"/>
        </form>
        <?php
        require_once 'mysql_login.php';
        if (isset($_POST["name"])) {
            $name = $_POST["name"];
            $password = $_POST["password"];
            $salt1 = "qm&h*";
            $salt2 = "pg!@";
            $token = hash('ripemd128', "$salt1$password$salt2");
            $sql = "select * from users where username=? and password=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $name, $token);
           
            $stmt->execute();
            $stmt->store_result();

            /* Get the number of rows */
            $num_of_rows = $stmt->num_rows;
            //$result = $conn->query($sql);
            if ($num_of_rows > 0) {
                echo 'Login succeed!';
            }  else {
                echo 'Login failed!';
            }
        }
        ?>
    </body>
</html>
