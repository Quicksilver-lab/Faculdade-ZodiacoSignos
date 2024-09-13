<?php include('layouts/header.php'); ?>

<div class="container mt-5">
  <h1>Resultado da Consulta</h1>
  <?php
    $data_nascimento = $_POST['data_nascimento'];
    $data_nascimento = date("d/m", strtotime($data_nascimento)); // Converte a data para o formato dd/mm

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
      echo "<p>" . $signoEncontrado->descricao . "</p>";
    } else {
      echo "<p>Não foi possível determinar o signo.</p>";
    }
  ?>
  <a href="index.php" class="btn btn-secondary mt-4">Voltar</a>
</div>

<?php include('layouts/footer.php'); ?>
