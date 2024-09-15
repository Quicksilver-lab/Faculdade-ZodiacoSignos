<?php include('layouts/header.php'); ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Descubra Seu Signo</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <div class="container mt-5">
    <h1>Descubra Seu Signo</h1>
    <form id="signo-form" method="POST" action="show_zodiac_sign.php" class="mt-4">
      <div class="mb-3">
        <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
        <input type="date" id="data_nascimento" name="data_nascimento" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="language" class="form-label">Escolha o Idioma:</label>
        <select id="language" name="language" class="select-control">
          <option value="pt">Português</option>
          <option value="en">English</option>
        </select>
      </div>
      <button type="submit" class="btn">Consultar Signo</button>
    </form>
  </div>
</body>
</html>
