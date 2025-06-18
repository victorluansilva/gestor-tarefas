# Gestor de tarefas

Aplicação para criar e gerir tarefas feita em PHP simples.

## Requisitos

Necessário XAMP instalado com os serviços do Apache e MySQL

## Instruções básicas

Crie um arquivo `.env` para passar os dados de acesso do banco

```javascript
APP_NAME="Gestor de Tarefas"
# Configurações do Banco de Dados
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=gestor_tarefas
DB_USERNAME=root
DB_PASSWORD=''
```

### config.inc.php

```javascript
/* Authentication type and info */
$cfg['Servers'][$i]['auth_type'] = 'cookie';
$cfg['Servers'][$i]['user'] = 'root';
$cfg['Servers'][$i]['extension'] = 'mysqli';
$cfg['Lang'] = '';
/* Bind to the localhost ipv4 address and tcp */
$cfg['Servers'][$i]['host'] = '127.0.0.1';
$cfg['Servers'][$i]['connect_type'] = 'tcp';
$cfg['Servers'][$i]['port'] = '3306';
```
