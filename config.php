<?php
$regras_waf = [
    // XSS
    '/<script\b[^>]*>(.*?)<\/script>/is' => 'Possível XSS - Script tag',
    '/\balert\s*\(/i' => 'Possível XSS - Alert Function',
    '/<iframe\b[^>]*>/i' => 'Possível XSS - Iframe Injection',
    '/on\w+\s*=\s*["\']?[^"\'>]+["\']?/i' => 'Possível XSS - Event Handler',
    '/javascript:/i' => 'Possível XSS - URI JavaScript',

    // SQL Injection
    '/(UNION\s+SELECT|SELECT\s+\*|INSERT\s+INTO|UPDATE\s+\w+)/i' => 'Possível SQL Injection - SQL Commands',
    '/(\bOR\b|\bAND\b)\s+[\'"]?\d+[\'"]?\s*=\s*[\'"]?\d+[\'"]?/i' => 'SQL Injection - Comparação lógica',
    '/\bDROP\s+TABLE\b/i' => 'SQL Injection - Tentativa de DROP',
    '/\bSLEEP\s*\(\s*\d+\s*\)/i' => 'SQL Injection - SQL Time Delay',

    // Execução de Código
    '/base64_decode\s*\(/i' => 'Possível execução de código - base64',
    '/eval\s*\(/i' => 'Possível execução de código - eval',
    '/system\s*\(/i' => 'Possível execução de código - system',
    '/shell_exec\s*\(/i' => 'Possível execução de código - shell_exec',

    // Directory Traversal
    '/\.\.\/+/i' => 'Tentativa de Directory Traversal',

    // Outros
    '/<\?php/i' => 'Tentativa de injeção de código PHP',
];
?>
