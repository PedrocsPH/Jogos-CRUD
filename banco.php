<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface do Banco</title>
</head>
<body>
    
<style>

* {
    font-family: Arial, Helvetica, sans-serif;
}

body{
    height: 607.5px;
   background: #050542;
background: linear-gradient(0deg, rgba(5, 5, 66, 1) 0%, rgba(12, 61, 145, 1) 100%);
}

.caixa1{
    background-color: rgb(39, 39, 39);
    height: 65px;
    width: 1150px;
    border-radius: 15px 15px 15px;
    box-shadow: 5px 10px 18px rgb(0, 0, 0);
    margin-left: 45px;
    margin-top: 50px;
    transition: 1s;
    border: 2px solid white;
}

.caixa1:hover{
    transform: scale(1.01);
    transition: 1s ease-in-out;
}

.caixa2{
    background-color: rgb(39, 39, 39);
    height: 430px;
    width: 1150px;
    box-shadow: 5px 10px 18px rgb(0, 0, 0);
    margin-left: 45px;
    margin-top: 55px;
    transition: 1s;
    border: 2px solid white;
    border-radius: 12px 12px 12px;
}

.caixa2:hover{
    transform: scale(1.01);
    transition: 1s ease-in-out;
}

.home{
  font-size: 25px;
  color: rgb(255, 255, 255);
  height: 35px;
  width: 75px;
  margin-left: 20px;
  overflow: hidden;
  position: absolute;
  z-index: 1;
}

.barrinha{
  width: 3px;
  height: 35px;
  background-color: white;
  position: absolute;
  z-index: 1;
  margin-left: 100px;
  margin-top: 12px;
}

.jogos{
  font-size: 23px;
  color: rgb(255, 255, 255);
  height: 35px;
  width: 75px;
  margin-left: 115px;
  overflow: hidden;
  margin-top: 18px;
  position: absolute;
  z-index: 1;
  font-weight: 200;
}

.link{
  font-size: 23px;
  color: rgb(255, 255, 255);
  height: 35px;
  width: 75px;
  margin-left: 190px;
  overflow: hidden;
  position: absolute;
  z-index: 1;
  margin-top: 18.5px;
  font-weight: 200;
}

td {
  height: 80px;
}

   table {
      border-collapse:collapse;
      width: 96%;
      margin: 20px auto;
    }

    tr {
      border: 2px solid #565656;
      padding: 20px;
      text-align: center;
      height: 30px;
    } 

    td {
        border: 2px solid #565656;
      padding: 20px;
      text-align: center;
      height: 20px;
    }

    th {
      background-color: #ddd;
    }

    .editar{
        background-color: #fbc12eff;
        border-radius: 8px 8px 8px;
        width: 75px;
        height: 33px;
        font-size: 15px;
        font-weight: 700;
        box-shadow: 2px 3px 0px white;
    }

  .excluir{
        background-color: #fb352eff;
        border-radius: 8px 8px 8px;
        width: 75px;
        height: 33px;
        font-size: 15px;
        font-weight: 700;
        box-shadow: 2px 3px 0px white;
        margin-left: 20px;
    }

</style>

<div class="background">
     
<div class="caixa1">
<h1 class="home">Home</h1>

<div class="barrinha"></div>

<h2 class="jogos">Jogos</h2>

<h3 class="link">Link</h3>
</div>

<div class="caixa2">

     <table>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Gênero</th>
      <th>Funcionalidades</th>
    </tr>
    <tr>
      <td>Linha 1</td>
      <td></td>
      <td></td>
      <td> <button class="editar">Editar</button> <button class="excluir">Excluir</button> </td>
    </tr>
   
  </table>

</div>

</div>

<js>

</js>

</body>
</html>