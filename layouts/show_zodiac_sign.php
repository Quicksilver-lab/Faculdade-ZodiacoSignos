<?php include('layouts/header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zodiac Sign Result</title>
    <!-- Link to External CSS -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="container mt-5">
    <h1 data-lang="en" style="display: block;">Zodiac Sign Result</h1>
    <h1 data-lang="pt" style="display: none;">Resultado da Consulta</h1>

    <?php
        $data_nascimento = $_POST['data_nascimento'];
        $data_nascimento = date("d/m", strtotime($data_nascimento)); // Convert date to dd/mm format

        // Load the XML file with zodiac sign data
        $signos = simplexml_load_file("signos.xml");
        $signoEncontrado = null;

        // Search for the correct zodiac sign
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
            echo "<h2 data-lang='en' style='display: block;'>Your zodiac sign is: " . $signoEncontrado->signoNome . "</h2>";
            echo "<h2 data-lang='pt' style='display: none;'>Seu signo é: " . $signoEncontrado->signoNome . "</h2>";
            echo "<p>" . $signoEncontrado->descricao . "</p>";
        } else {
            echo "<p data-lang='en' style='display: block;'>Unable to determine your zodiac sign.</p>";
            echo "<p data-lang='pt' style='display: none;'>Não foi possível determinar o signo.</p>";
        }
    ?>

    <a href="index.php" class="btn btn-secondary mt-4" data-lang="en" style="display: block;">Go Back</a>
    <a href="index.php" class="btn btn-secondary mt-4" data-lang="pt" style="display: none;">Voltar</a>
</div>

<script>
    // Language switcher (if you have language switching in other parts of the site)
    function switchLanguage(language) {
        const elements = document.querySelectorAll('[data-lang]');
        elements.forEach(el => {
            el.style.display = el.getAttribute('data-lang') === language ? 'block' : 'none';
        });
    }
</script>

<?php include('layouts/footer.php'); ?>
</body>
</html>
