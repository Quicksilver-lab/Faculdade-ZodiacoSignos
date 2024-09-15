<?php include('layouts/header.php'); ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultado da Consulta</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <div class="container mt-5">
    <h1>Resultado da Consulta</h1>
    <?php
      $data_nascimento = $_POST['data_nascimento'];
      $language = $_POST['language'];
      $data_nascimento = date("d/m", strtotime($data_nascimento));

      $signos = simplexml_load_file("signos.xml");

      $signoEncontrado = null;

      foreach ($signos->signo as $signo) {
        $dataInicio = DateTime::createFromFormat('d/m', $signo->dataInicio);
        $dataFim = DateTime::createFromFormat('d/m', $signo->dataFim);
        $dataNascimento = DateTime::createFromFormat('d/m', $data_nascimento);

        if (($dataNascimento >= $dataInicio) && ($dataNascimento <= $dataFim)) {
          $signoEncontrado = $signo;
          break;
        }
      }

      if ($signoEncontrado) {
        echo "<h2>Seu signo é: " . $signoEncontrado->signoNome . "</h2>";
        echo "<p>" . $signoEncontrado->descricao[$language] . "</p>";
      } else {
        echo "<p>Não foi possível determinar o signo.</p>";
      }
    ?>
    <a href="index.php" class="btn btn-secondary mt-4">Voltar</a>
  </div>
</body>
</html>
