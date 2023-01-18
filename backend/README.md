# **BACKEND DA APLICAÇÃO**

***

## **Para acessar o BACKEND da aplicação é necessário realizar algumas coisas**

* [Instalar o Postgresql.](https://www.postgresql.org/download/)
* No arquivo Knexfile.js é necessário colocar o **usuário, senha e tabela(Necessário criar tabela também) do postgresql.**
* [Editar o arquivo common.js colocando seu IP na aplicação React-Native na pasta App](https://bitbucket.org/xrundevelopment/tcc/src/master/). 
* Utilizar o comando ***npm install*** no CMD para instalar as dependências.
* Utilizar o comando ***Knex migrate:latest*** no CMD para ajustar o middleware.
* Utilizar o comando ***npm start*** para rodar o BACKEND.
***
## **Caso ocorra erro com seu nodemon é recomendado utilizar os seguintes comandos**

* ***npm install -g nodemon***
* ***npm install --save-dev nodemon***
* ***npm config get prefix***
* ___set PATH=%PATH%;C:\Users\"Aqui seu usuario"\AppData\Roaming\npm;___
  
***
## **Na parte de banco de dados temos os seguintes comandos úteis**
Para acessar o postgresql via CMD


* ___psql -U postgres___
 
 Para acessar a tabela


* ___\c "Nome da tabela"___


Para verificar os registros dos usuários


*  ___select * from users;___
  
***
## **Para descobrir seu IP**

 Abra o CMD e utilize o comando ***ipconfig***


Na parte de ***Rede Ethernet*** ou ***Adaptador de Rede Sem Fio*** seu **IP** estará em ___IPV4: 192.168.**___
***
## ***Caso o comando psql não funcione***

Precisará adicionar a variável de ambiente

1. Pressione a tecla Windows+E vá até ao lado esquerdo e clique com o botão direito em Este Computador.
2. Clique em Configurações Avançadas do Sistema no lado esquerdo.
3. Clique em Variáveis de Ambiente.
4. Vá até Path e edite.
5. Adicione ao path como de exemplo:***"C:\Program Files\PostgreSQL\9.0\bin"***
6. Reinicie o Windows, caso não reconheça o comando ***(Se estiver com o cmd antigo antes do tutorial ele não irá funcionar é necessário abrir um novo cmd após tutorial)***.