<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "jogos";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if(isset($_GET['excluir'])){
    $id = $_GET['excluir'];
    $conn->query("DELETE FROM jogos WHERE JogosID=$id");
    header("Location: banco.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Interface do Banco</title>

<style>
* {
    font-family: Arial;
}

body{
   background: linear-gradient(0deg, rgba(5,5,66,1) 0%, rgba(12,61,145,1) 100%);
   color: white;
}

.caixa1{
    background-color: rgb(39,39,39);
    height: 65px;
    width: 90%;
    border-radius: 15px;
    margin: 20px auto;
    border: 2px solid white;
}

.caixa2{
    background-color: rgb(39,39,39);
    width: 90%;
    margin: 20px auto;
    padding: 20px;
    border: 2px solid white;
    border-radius: 12px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

td, th {
    border: 1px solid #555;
    padding: 10px;
    text-align: center;
}

button {
  border: 1px solid #fff;
  border-radius: 8px;
  background-color: #060034;
  color: white;
  padding: 6px 12px;
  cursor: pointer;
}

button:hover {
  background-color: #0c3d91;
}
</style>

<script>
function confirmarExclusao(id){
    if(confirm("Tem certeza que deseja excluir este jogo?")){
        window.location.href = "?excluir=" + id;
    }
}

function editarJogo(id){
    
    window.location.href = "cadastro.php?editar=" + id;
}
</script>

</head>
<body>

<div class="caixa1">
<h2 style="margin-left:20px;">Sistema de Jogos</h2>
</div>

<div class="caixa2">

<h3>Lista de Jogos</h3>

<table>
<tr>
<th>ID</th>
<th>Empresa</th>
<th>Desenvolvedores</th>
<th>Preço</th>
<th>Distribuição</th>
<th>Lançamento</th>
<th>Gênero</th>
<th>Ações</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM jogos");

while($row = $result->fetch_assoc()){
    echo "<tr>
<td>{$row['JogosID']}</td>
<td>{$row['Empresa']}</td>
<td>{$row['Desenvolvedores']}</td>
<td>{$row['precos']}</td>
<td>{$row['distribuicao']}</td>
<td>" . ($row['lancamento'] ?? '-') . "</td>
<td>{$row['Genero_GeneroID']}</td>
<td>
<button onclick='editarJogo({$row['JogosID']})'>Editar</button>
<button onclick='confirmarExclusao({$row['JogosID']})'>Excluir</button>
</td>
</tr>";
}
?>

</table>

</div>

</body>
</html>