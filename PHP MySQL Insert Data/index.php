<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = 'localhost';
    $dbname = 'datadell';
    $username = 'root';
    $password = '';
    
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $username = $_POST["username"];
        $email = $_POST["email"];
        $age = $_POST["age"];
        $tel = $_POST["tél"];
        $stmt = $pdo->prepare("INSERT INTO user (username, email, age, tél) VALUES (:username, :email, :age, :tel)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':tel', $tel);

        $stmt->execute();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $pdo = null;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>new test</title>
</head>
<body>
  <h1>PHP MySQL Insert Data</h1>
    <form method="POST">
        <input type="text" name="username" placeholder="username">
        <input type="text" name="email" placeholder="email">
        <input type="text" name="age" placeholder="age">
        <input type="text" name="tél" placeholder="tél">
        <button type="submit" class="sub">Insert</button>
    </form>
<style>
  body {
  position: relative;
  background-color: white;
  background-repeat: no-repeat;
  height: 100vh;
  background-color:#F1F1F1;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}

form {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 6px;
 
}

.sub{
 border-radius: 10px;
  height: 50px;
  width: 120px;
  background-color:#B4D5A6;
}

input {
  background-color: ;
  border-radius: 10px;
  height: 30px;
  width: 230px;
  text-align:center;
  }
</style>
   </body>

</html>
