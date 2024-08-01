## Sobre o projeto
Project ToDo é um sistema para gerenciar tarefas diárias de pessoas.<br>

## Introdução
O Project Todo é uma aplicação web de gerenciamento de tarefas, onde os usuários podem criar, editar, excluir e visualizar suas tarefas organizadas por categorias e datas.<br>
Tecnologias Utilizadas: Laravel, PHP, MySQL, JavaScript, FullCalendar.<br>

## Instalação
Pré-requisitos: Laravel 11, PHP 8.2, Composer, MySQL.<br>
-Passos de Instalação:<br>
Clone o repositório:<br>
git clone <https://github.com/eliaslorandi/todo><br>
-Instale as dependências do PHP:<br>
composer install<br><br>
Configure o arquivo .env com as informações do banco de dados e outras configurações necessárias.<br><br>
-Execute as migrações do banco de dados:<br>
php artisan migrate<br>
-(Opcional) Execute a factory para dados de teste:<br>
php artisan db:factory<br>
-Inicie o servidor de desenvolvimento:<br>
php artisan serve<br>

## Uso
Crie uma conta no campo indicado na tela de login.<br>
-Gerenciamento de Tarefas:<br>
Primeiro deve ser criada a(s) categoria(s), no campo indicado, após poderá criar a tarefa desejada. Tarefas são categorizadas e vinculadas a datas específicas.<br>
-Uso do FullCalendar:<br>
O Calendário mostra o mês atual com a tarefa em seu respectivo dia.<br>
-Categorias:<br>
Pode-se criar quantas categorias desejar, tarefas podem ter uma só categoria.<br>

## Contato
Autor: Elias Lorandi<br>
Email: lorandi.elias@gmail.com<br>