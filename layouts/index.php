<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discover Your Zodiac Sign</title>
    <!-- Link to External CSS -->
    <link rel="stylesheet" href="styles.css">
    <script>
        function switchLanguage(language) {
            const elements = document.querySelectorAll('[data-lang]');
            elements.forEach(el => {
                el.style.display = el.getAttribute('data-lang') === language ? 'block' : 'none';
            });
        }
    </script>
</head>
<body>
<div class="container mt-5">
    <h1 data-lang="en" style="display: block;">Discover Your Zodiac Sign</h1>
    <h1 data-lang="pt" style="display: none;">Descubra Seu Signo</h1>

    <div class="language-switch">
        <a href="javascript:void(0);" onclick="switchLanguage('en')" class="active" id="lang-en">English</a>
        <a href="javascript:void(0);" onclick="switchLanguage('pt')" id="lang-pt">Português</a>
    </div>

    <form id="signo-form" method="POST" action="show_zodiac_sign.php" class="mt-4">
        <div class="mb-3">
            <label for="data_nascimento" data-lang="en" style="display: block;">Date of Birth:</label>
            <label for="data_nascimento" data-lang="pt" style="display: none;">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary" data-lang="en" style="display: block;">Check Zodiac Sign</button>
        <button type="submit" class="btn btn-primary" data-lang="pt" style="display: none;">Consultar Signo</button>
    </form>
</div>

<footer>
    <p data-lang="en" style="display: block;">Crafted with 💻 & ⚡ by <a href="https://github.com/Quicksilver-lab" target="_blank">QuickSilver</a> and <a href="https://github.com/EveeSilvaa" target="_blank">Evellyn Silva</a></p>
    <p data-lang="pt" style="display: none;">Criado com 💻 & ⚡ por <a href="https://github.com/Quicksilver-lab" target="_blank">QuickSilver</a> and <a href="https://github.com/EveeSilvaa" target="_blank">Evellyn Silva</a></p>
</footer>

<script>
    // Language switcher function
    document.querySelectorAll('.language-switch a').forEach(item => {
        item.addEventListener('click', function() {
            document.querySelectorAll('.language-switch a').forEach(link => link.classList.remove('active'));
            this.classList.add('active');
        });
    });
</script>

<?php include('footer.php'); ?>
</body>
</html>
