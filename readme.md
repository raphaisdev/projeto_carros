
# Proposta

Projeto criado para demonstrar o funcionamento de um site de carros usando a arquitetura **MVC** utilizando o **[Laravel Framework](https://laravel.com/)**.

## Requisitos

 - [PHP](http://www.php.net/) >= 7.1.3
 - [OpenSSL PHP Extension](http://php.net/manual/pt_BR/book.openssl.php)
 - [PDO PHP Extension](http://php.net/manual/pt_BR/pdo.installation.php)
 - [Mbstring PHP Extension](http://php.net/manual/pt_BR/mbstring.installation.php)
 - [Tokenizer PHP Extension](http://php.net/manual/pt_BR/book.tokenizer.php)
 - [XML PHP Extension](https://secure.php.net/manual/pt_BR/xml.installation.php)
 - [Ctype PHP Extension](https://secure.php.net/manual/pt_BR/book.ctype.php)
 - [JSON PHP Extension](http://php.net/manual/pt_BR/json.installation.php)
 - [SQLite PHP Extension](https://secure.php.net/manual/pt_BR/book.sqlite.php)
 - [SQLite](https://www.sqlite.org)
 - [Composer](https://getcomposer.org/) instalado de forma global

## Instalação

 1. Acessar a pasta do projeto e rodar o comando

    ```bash
    $ composer install
    ```

 2. Criar um arquivo de dados para o SQLite

 3. Alterar o caminho do arquivo de dados do SQLite no arquivo **.env.example**.
Usar o path completo. Ex.:

```env
DB_DATABASE=/home/user/projects/tryout/database/database.sqlite)
```

 5. Renomear o arquivo **.env.example** para **.env**

 6. Executar o comando para criar a tabela no SQLite:

```bash
$ php artisan migrate --seed
```

 6. Executar o comando de atalho para o servidor nativo do PHP

```bash
php artisan serve
```

A aplicação ficará disponível em:

```bash
http://localhost:8000
```
