<?php

    include 'db.php';

    $id = $_GET['id'];

    $sql = "SELECT * FROM usuario WHERE id='$id'";
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc();

    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];

        $sql = "UPDATE usuario SET nome='$name', email='$email' WHERE id='$id'";

        if($conn -> query($sql) === true){
            echo "Registro atualizado com sucesso!
                <a href='read.php'>Ver registros.</a>
";
        }else{
            echo"Erro " . $sql . "<br>" . $conn->error;
        }
        $conn -> close();
    }


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Registros</title>
</head>
<body>
    
    <form method="POST" action="update.php?id=<?php echo $row['id'];?>">
        <label for="name">Nome:</label>
        <input type="text" name="name" required value="<?php echo $row['nome'];?>">
        <br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required placeholder="<?php echo $row['email'];?>">
        <br><br>
        <input type="submit" value="Atualiazar">

        <a href="read.php"> Ver registros.</a>
    </form>

</body>
</html>