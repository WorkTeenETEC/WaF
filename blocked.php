<?php
require_once 'config.php';

function registrarAtaque($descricao, $valor) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $data = date("Y-m-d H:i:s");
    
    // Limita o tamanho do valor mostrado no log
    $valor_seguro = substr($valor, 0, 20);
    if (strlen($valor) > 20) {
        $valor_seguro .= '********';
    }
    
    $log = "[$data] IP: $ip | Descrição: $descricao | Valor detectado: $valor_seguro\n";
    file_put_contents(__DIR__ . "/logs/ataques.log", $log, FILE_APPEND);
}

function validateRequest() {
    global $regras_waf;
    $isBlocked = false;
    
    if (!empty($_GET)) {
        foreach ($_GET as $key => $value) {
            foreach ($regras_waf as $regex => $descricao) {
                if (preg_match($regex, $value)) {
                    registrarAtaque($descricao, $value);
                    $isBlocked = true;
                    break 2;
                }
            }
        }
    }
    
    if (!empty($_POST)) {
        foreach ($_POST as $key => $value) {
            foreach ($regras_waf as $regex => $descricao) {
                if (preg_match($regex, $value)) {
                    registrarAtaque($descricao, $value);
                    $isBlocked = true;
                    break 2;
                }
            }
        }
    }
    
    if (!empty($_COOKIE)) {
        foreach ($_COOKIE as $key => $value) {
            foreach ($regras_waf as $regex => $descricao) {
                if (preg_match($regex, $value)) {
                    registrarAtaque($descricao, $value);
                    $isBlocked = true;
                    break 2;
                }
            }
        }
    }
    
    return $isBlocked;
}

if (validateRequest()) {
    ?>
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Acesso Bloqueado - WAF</title>
        <link rel="stylesheet" href="admin/styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    </head>
    <body class="blocked">
        <div class="blocked-container">
            <div class="blocked-icon">
                <i class="fas fa-shield-alt"></i>
            </div>
            <h1>Acesso Bloqueado</h1>
            <p>Seu acesso foi bloqueado pelo Web Application Firewall (WAF) por motivos de segurança.</p>
            <p>Se você acredita que isso é um erro, entre em contato com o administrador do sistema.</p>
            
            <div class="contact-info">
                <p>ID do Bloqueio: <?php echo isset($_GET['id']) ? htmlspecialchars($_GET['id']) : 'N/A'; ?></p>
                <p>Data/Hora: <?php echo date('d/m/Y H:i:s'); ?></p>
            </div>
        </div>
    </body>
    </html>
    <?php
    exit();
}
?> 