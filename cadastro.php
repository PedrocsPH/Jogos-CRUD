<?php
ob_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "jogos";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$msg = "";
$editando = false;
$dados = null;

/* Carrega as informações para edição */

if(isset($_GET['editar'])){
    $id = $_GET['editar'];
    $result = $conn->query("SELECT * FROM jogos WHERE JogosID=$id");
    $dados = $result->fetch_assoc();
    $editando = true;
}

/* Salva a informação (INSERT OU UPDATE) */
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = $_POST["id"] ?? "";
    $empresa = $_POST["empresa"] ?? "";
    $desenvolvedores = $_POST["desenvolvedores"] ?? "";
    $precos = $_POST["precos"] ?? "";
    $distribuicao = $_POST["distribuicao"] ?? "";
    $lancamento = $_POST["lancamento"] ?? "";
    $genero = $_POST["genero"] ?? "";

    if ($empresa && $desenvolvedores && $precos && $distribuicao && $lancamento && $genero) {

        if($id){ 
            $sql = "UPDATE jogos SET
                Empresa='$empresa',
                Desenvolvedores='$desenvolvedores',
                precos='$precos',
                distribuicao='$distribuicao',
                lancamento='$lancamento',
                Genero_GeneroID='$genero'
                WHERE JogosID=$id";
        } else {
            $sql = "INSERT INTO jogos 
            (Empresa, Desenvolvedores, precos, distribuicao, lancamento, Genero_GeneroID) 
            VALUES 
            ('$empresa', '$desenvolvedores', '$precos', '$distribuicao', '$lancamento', '$genero')";
        }

        if ($conn->query($sql) === TRUE) {
            header("Location: banco.php");
            exit();
        } else {
            $msg = "Erro: " . $conn->error;
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

<h2><?= $editando ? "Editar Jogo" : "Cadastro de Jogo" ?></h2>

<form method="POST">

  <input type="hidden" name="id" value="<?= $dados['JogosID'] ?? '' ?>">

  <input type="text" name="empresa" placeholder="Empresa" value="<?= $dados['Empresa'] ?? '' ?>" required>
  <input type="text" name="desenvolvedores" placeholder="Desenvolvedores" value="<?= $dados['Desenvolvedores'] ?? '' ?>" required>
  <input type="text" name="precos" placeholder="Preço" value="<?= $dados['precos'] ?? '' ?>" required>
  <input type="text" name="distribuicao" placeholder="Distribuição" value="<?= $dados['distribuicao'] ?? '' ?>" required>
  <input type="text" name="lancamento" placeholder="Lançamento" value="<?= $dados['lancamento'] ?? '' ?>" required>
  <input type="number" name="genero" placeholder="ID do Gênero" value="<?= $dados['Genero_GeneroID'] ?? '' ?>" required>

  <button type="submit"><?= $editando ? "Atualizar" : "Cadastrar" ?></button>

</form>

<div class="message">
  <?= $msg; ?>
</div>

</main>

</body>
</html>

<?php ob_end_flush(); ?>