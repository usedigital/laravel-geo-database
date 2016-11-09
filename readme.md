## Cidades API
Deseja ter em seus domínios um serviço para consulta de cidades e estados?

Cidades API é um projeto que disponibiliza um micro serviço para acesso a lista de cidades brasileiras.
Cidades API é construido com o Lumen, um micro framework desenvolvido pelos colaboradores do popular framework PHP Laravel.
Veja detalhes do benchmark:

![] (https://s19.postimg.org/aglg3k077/benchmark.png)

## Requisitos
Requisitos do lumen: 
 - PHP >= 5.6.4
 - OpenSSL PHP Extension
 - PDO PHP Extension
 - Mbstring PHP Extension
Controle de versão e gerenciador de dependências
 - Git 
 - Composer
Banco de dados: 
 - Mysql (Padrão)

## Instalação
Download:
- Clone o projeto: https://github.com/guedesit/cidades.git
- Entre no diretório do projeto cd nome_do_projeto
- Instale as dependências: composer install

Banco de dados [Mysql]:
- Caso esteja usando o Mysql, crie um banco de dados para a aplicação. 
- Renomeie o arquivo .env.example para .env
- Defina o seu APP_KEY
- Preencha as suas configurações para o banco de dados.

Migrations: 
As migrações nos ajudam a criar e manter nossas estruturas de banco de dados. Para criar as tabelas necessárias ao projeto
execute o comando: "php artisan migrate" dentro do diretório raiz do projeto para criação das tabelas.
Após os comandos, 4 novas tabelas existirão no banco de dados, são elas: 
- migrations - contendo informações sobre as migrations do projeto.
- paises - contendo detalhes dos paises.
- estados - contendo detalhes dos estados. E,
- cidades - contendo detalhes sobre as cidades. 

Com a estrutura do banco de dado já montada é necessário popular as tabelas paises, estados e cidades com os dados.
Estes dados estão armazenados em três arquivos distintos: PaisesTableSeeder.php, EstadosTableSeeder.php e CidadesTableSeeder.php. Para inserir os dados no banco de dados
apenas execute o comando "php artisan db:seed". 

Executar projeto: 

A partir do diretório raiz do projeto, entre na pasta public/ e execute o servidor embutido do PHP:
 - php -S localhost:8000

Após executar o comando acesse o endereço localhost:8000 que exibirá uma página com detalhe das rotas/endpoints disponíveis.


## Migrations
Estão disponíveis três arquivos de migração para a criação da estrutura de tabelas necessárias à aplicação no diretório database/migrations:
- 

## Models
Na aplicação estão disponíveis três modelos no diretório app, são eles:
- Pais.
- Estado.
- Cidade.

Observações: Caso seja necessário modificar o nome da tabela do banco de dados que foi anteriormente criada pelos arquivos de migração, basta definir um valor para a propriedade $table do modelo correspondente.

## Seeders
Existem três arquivos para popular o banco de dados no diretório database/seeds:
 - PaisesTableSeeder.php
 - EstadosTableSeeder.php
 - CidadesTableSeeder.php

## Rotas(EndPoints)

## Licença

Este projeto é licenciado através da [BSD 3-Clause license](http://opensource.org/licenses/BSD-3-Clause).