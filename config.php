<?php
$regras_waf = [
    '/<script.*?>.*?<\/script>/i' => 'Possível XSS',
    '/(UNION\s+SELECT|SELECT\s+\*|INSERT\s+INTO|UPDATE\s+\w+)/i' => 'Possível SQL Injection',
    '/(\bOR\b|\bAND\b)\s+\d+=\d+/i' => 'Tentativa lógica em SQL',
    '/\balert\s*\(/i' => 'Tentativa de XSS',
    '/base64_decode\s*\(/i' => 'Execução de código',
    '/\.\.\//i' => 'Tentativa de acesso a diretórios acima',
    '/<iframe.*?>/i' => 'Possível clickjacking',
];
?>
