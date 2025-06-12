<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<!-- ADICIONAR WAF EM TODAS AS PAGINAS QUE DESEJA PROTEGER -->
<?php 
require_once '../blocked.php'; 
?>
    <div class="container">
        <h1>Painel Administrativo</h1>
        <a href="../logs/ataques.log">Ver logs de ataques</a>
    </div>
</body>
</html>