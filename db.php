<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "blog";

// Conexão com o MySQL
$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Verifica se o banco de dados já existe
$db_selected = mysqli_select_db($conn, $database);

if (!$db_selected) {
    // Se o banco não existir, cria e importa o SQL
    $sql_file = file_get_contents(__DIR__ . '/database/blog.sql');
    $queries = explode(';', $sql_file);

    foreach ($queries as $query) {
        if (!empty(trim($query))) {
            mysqli_query($conn, $query);
        }
    }

    echo "Banco de dados criado e populado com sucesso!";
} else {
    mysqli_select_db($conn, $database);
}
?>
