<?php

    include 'db.php';
    $id = $_GET['id'];

    $sql = "DELETE FROM usuario WHERE id=$id";

    if($conn -> query($sql) === true){
        echo "Registro excluido com sucesso!
            <a href='read.php'>Ver registros.</a>
";
    }else{
        echo"Erro " . $sql . "<br>" . $conn->error;
    }
    $conn -> close();

    header("Location: read.php");
?>