### Sobre esse repositório

Olá! Tudo bem? Bom esse repositório tem o intuito de apresentar um CRUD utilizando PHP, VueJs e MySQL.
Aqui utilizamos dois frameworks, o **Laravel** (*back-end*) e o **Quasar** (*front-end*)

### Dependências
Para fazer os testes, você precisa ter instalado em sua máquina:
 - [PHP] (>= 7.3)
 - [Composer]
 - [node.js]
 - [Quasar]
 - [MySQL]

O [Quasar] pode ser instalado da seguinte forma:
```sh
npm install -g @quasar/cli
quasar
```

### Debugando a aplicação
> Observação: Nessa aplicação é preciso contar com dois terminais, para que em um você consiga deixar o servidor do *back-end* ativo


```sh
git clone https://github.com/jooaos/crud_php_vue_js.git
cd crud_php_vue_js
```
> Para o back-end

```sh
cd crud_laravel
composer install
cp .env.example .env
php artisan key:generate
```
Crie em seu localhost um banco de dados MySql com o padrão **utf8_general_ci**
Com o banco de dados criado, edite as linhas 12, 13 e 14 do arquivo **.env** com os dados do banco criado, e em seguida faça:

```sh
php artisan migrate:refresh --seed
php artisan serve 
```

> Para o front-end (outro terminal)

```sh
cd crud_vue_js
npm install
quasar dev
```
Ao final do **quasar dev** será gerado um link para uma porta em localhost, é só você acessar que verá a aplicação rodando.

##### The end

[//]: #
   [node.js]: <http://nodejs.org>
   [Composer]: <https://getcomposer.org/>
   [Quasar]: <https://quasar.dev/>
   [PHP]: <https://www.php.net/>
   [MySQL]: <https://www.mysql.com/downloads/>
