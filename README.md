# RESTful APIs com laravel e autenticação jwt

### Instalação

Execute o comando `cp .env.example .env`

Altere os dados para conexão com o banco de dados.

Execute o comando `php artisan key:generate` para atualizar APP_KEY no arquivo `.env`

Execute o comando `composer install` para que seja instalado as dependências do arquivo `composer.json`

Execute o comando `php artisan jwt:secret` JWT_SECRET será adicionado no arquivo `.env`

### Iniciar API

No diretório `do projeto` digite `php artisan serve` api estará disponível no endereço `http://localhost:8000`

