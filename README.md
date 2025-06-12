# WaF
Um Firewall para Aplicações Web's
usar o Include do blocked em forms que deseja proteger

/Waf/
│
├── blocked.php          ← Arquivo que intercepta as requisições/Bloqueia
├── config.php           ← Regras de bloqueio e configuração
├── logs/                ← Pasta onde logs serão salvos
└── index.php            ← Aplicação simulada (ex: um formulário de login)
