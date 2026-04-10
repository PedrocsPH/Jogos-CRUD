<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "jogos";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$msg = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = $_POST["jogos"] ?? "";
    $genero = $_POST["genero"] ?? "";
    $plataforma = $_POST["plataforma"] ?? "";

    if ($jogos && $genero && $plataforma) {

        // INSERIR NO BANCO
        $sql = "INSERT INTO jogos (nome, genero, plataforma) 
                VALUES ('$jogos', '$genero', '$plataforma')";

        if ($conn->query($sql) === TRUE) {

            // REDIRECIONA PARA A INTERFACE
            header("Location: banco.php");
            exit();

        } else {
            $msg = "Erro ao cadastrar.";
        }

    } else {
        $msg = "Preencha todos os campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cadastro</title>

<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');

* { box-sizing: border-box; }

body, html {
  margin: 0;
  height: 100%;
  font-family: 'Inter', sans-serif;
  color: white;
  overflow: hidden;
  margin-top: 30px;
}

.background {
  position: fixed;
  top: 0; left: 0; right: 0; bottom: 0;
  background: url('a21501a831dce1ffa0ab2b578c108f06.jpg') center center/cover no-repeat;
  filter: brightness(0.6);
  z-index: -1;
}

nav {
  position: fixed;
  top: 20px;
  left: 50%;
  transform: translateX(-50%);
  width: 90%;
  max-width: 900px;
  display: flex;
  justify-content: space-around;
  font-weight: 600;
  font-size: 14px;
  z-index: 10;
}

nav a {
  color: white;
  text-decoration: none;
}

nav a:hover {
  color: #aad4ff;
}

.form-container {
  width: 350px;
  margin: auto;
  margin-top: 100px;
  background: rgba(255 255 255 / 0.1);
  border-radius: 15px;
  backdrop-filter: blur(10px);
  padding: 30px;
  text-align: center;
}

input {
  width: 100%;
  padding: 12px;
  margin-bottom: 10px;
}

button {
  width: 100%;
  padding: 12px;
  background: #4a90e2;
  color: white;
  border: none;
  cursor: pointer;
}

button:hover {
  background: #357abd;
}

.message {
  margin-top: 10px;
}
</style>

</head>
<body>

<div class="background"></div>

<nav>
  <a href="#">Home</a>
  <a href="banco.php">Interface</a>
  <a href="#">Outros</a>
</nav>

<main class="form-container">

<h2>Cadastro de Jogo</h2>

<form method="POST">

  <input type="text" name="nome" placeholder="Nome do jogo" required>
  <input type="text" name="genero" placeholder="Gênero" required>
  <input type="text" name="plataforma" placeholder="Plataforma" required>

  <button type="submit">Cadastrar</button>

</form>

<div class="message">
  <?php echo $msg; ?>
</div>

</main>

</body>
</html>