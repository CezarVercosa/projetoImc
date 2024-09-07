# Projeto - Desenvolvido por Cezar Verçosa

## Requisitos
- MySQL rodando na porta 3306
- PHP e Composer instalados
- Node.js e NPM instalados

## Explicações
- composer install: Instala as dependências PHP.
- npm install: Instala as dependências JavaScript.
- php artisan migrate: Cria as tabelas no banco de dados.
- php artisan serve: Inicia o servidor embutido do PHP para disponibilizar o projeto em localhost.
- npm run dev: Compila os assets JavaScript e CSS para desenvolvimento.

## Observações
- O arquivo .env está incluído no repositório para facilitar a configuração local. Você pode ajustar as variáveis de ambiente, como configurações de banco de dados e chaves de API, conforme necessário.

## Passos para rodar o projeto:

1. Clone o repositório
2. Execute os seguintes comandos:

```bash
composer install
npm install
php artisan migrate
php artisan serve
npm run dev


