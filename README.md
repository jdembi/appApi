<p align="center"><a href="https://refera.com.br/" target="_blank"><img src="https://refera.com.br/wp-content/uploads/2022/06/logo-1.png" width="400" alt="Laravel Logo"></a></p>


## Forneça instruções claras sobre como executar o aplicativo no modo de desenvolvimento
Eu estou usando o **PHP** a frameworks é **Laravel** para o meu projecto, para colocar o aplicativo em modo de desenvolvimento os passos são os seguintes:

1- Saber o sistema operativo que o desenvolvidor está a usar, para poder escolher um servidor web que ele vai ter que utilizar, eu estou usando o Apache e a liguagem de programação é php como já enfatizei em cima. ligar o servidor web.

2-Instalar o Laravel se não tiver o laravel instalado usando o comando: composer install para instalar dependencias do laravel.

3-Importar a base de dados criada por mim e exportada encontrada na Pasta database **'refera_bd.sql'** no mysql porque estou a usar mysql para base de dados.

4- Gerar o .env onde fica todas as configurações para teres acesso a conexão da base de dados usando os comando no terminal ou na linha de comando na raiz do projecto 
**-copy .env.example .env**
**-php artisan key:generate**

5-Depois desses passos podes usar o comando 
**-php artisan serve**
 e o projecto será rodado

 Para testar a API em função dos Endpoinds criados, depois do projecto tiver a rodas podes usar o **POSTMAN** OU um similar para testar ela a rota para API É

 {url do projecto após estar em estado de execução}/api/ENDPOINT

 exemplo 

 http://127.0.0.1:8000/api/listar_category

 http://127.0.0.1:8000/api/listar_order

 ### Forneça instruções claras sobre como o aplicativo seria executado em um ambiente de produção

 Para colocar um aplicativo em produção é necessario ter atenção algumas coisas,primeiramente temos que ter um dominio pra podermos acessar o aplicativo externamente, depois temos que seguir alguns passos que descrevi na primeira pergunta, temos que ter um servidor web, um servidor de base de dados e a linguagem de progamação instalada no servidor depois disso partiremos para os passos de coloção do aplicativo em produção se tratando de ser feito com o framework laravel existem passos a seguir que são:
 
 1-abrir o ficheiro .env na raiz do projecto onde tiver 
 APP_ENV=local ficar  APP_ENV=production 
 
 isso indicará que o aplicativo está se colocado em produção.

APP_DEBUG=true passar para APP_DEBUG=false

2-composer install --optimize-autoload --no-dev usar esse comando para baixar algumas dependencias actualizadas.

**php composer install**
$ php composer dumpautoload -o
$ php artisan config:cache
$ php artisan route:cache
Apois isso aplicação estára em condições de ir para o directorio da pasta compartilhada do directorio de hopedagem compartilhada para ter acesso externo.




### Descreva como você implementaria uma camada de autenticação para o aplicativo da Web (não é necessário implementar)

Eu criaria uma página de Login em principio, teria que ter uma outra tabela para usuarios , para que todos antes de terem acesso a pagina principal deveriam primeiro ser autenticados, e implementaria autentiação nas rotas apartir do momento que o usuario faz um login no sistema é lhe dado um token de acesso que lhe permitirá ele poder fazer uso dos serviços.


## API RESTful permitindo operações CRUD e list nos pedidos
Para o crud dos pedidos eu criei 4 EndPoints que podem ser localizado na Pasta 

**routes** arquivo **api** 

EndPoint para Listar os Pedidos
**listar_order**

EndPoint para Criar um Novo Pedido
**store_Order**

EndPoint para Actualizar Pedido
**update_order**

EndPoint para Eliminar Pedido
**delete_Order**

Para o crud das categorias eu criei 4 EndPoints que podem ser localizado na Pasta **routes** arquivo **api** 

EndPoint para Listar as Categorias
**listar_category**

EndPoint para Criar uma Nova Categoria
**store_category**

EndPoint para Actualizar Categoria
**update_category**

EndPoint para Eliminar Categoria
**delete_category**

## Banco de dados para armazenar dados dos seguintes recursos
Sobre essa questão eu criei 2 tabelas em função do que foi Solicitado 
Primeiro crei a tabela **Categoria** que tem o seguintes campos

-id é a chave primaria da tabela

-Categoria é o campo onde será armazenado as categorias

Depois criei a tabela **Orden** ou **Pedido** que tem os seguintes campos

-id é a chave primária da tabela

-categoria que é chave estrageira, tivemos aqui uma relação muitos para 1 onde podemos ter 1 categoria para vários pedidos.

-Nome de contacto,

-Numero do contacto,

-Compania 

-Deadline

-Descricao do Pedido

-agencia

aqui tenho a descrição das duas tabelas usadas no projecto.


### Descreva como você estruturaria o banco de dados para contabilizar
Para essa questão eu iria primeiro normalizar as tabelas pelo menos até a 3forma normal e construir um banco de dados simples e legivel
primeiro começaria separar as 3 entidades entender como elas se relacionam para poder criar o fluxo de dados, porque ela podem estar interligado por intermédio de chaves .


**Descreva o que precisa ser alterado na API que você implementou**
O que não implementei foi a autenticação nas rotas porque foi opcional, é muito importante termos as rotas autenicadas por causa da segurança da nossa API e nossa infra-estrutura.

### Uma página da web, seguindo o protótipo de baixa fidelidade apresentado nos Recursos
Foi elaborada uma pagina web em função dos recursos apresentado.


## Modal para inserir dados para criar um novo pedido
Modal foi criado para inserir novos pedidos


## Modal para ler apenas os detalhes do pedido
Modal foi criado para ver detalhes dos pedidos

