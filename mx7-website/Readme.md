# __Site em desenvolvimento com PHP__

## __Requisitos__
***
 + [Instalar o Xampp](https://www.apachefriends.org/pt_br/index.html)
 + [Instalar o Git](https://git-scm.com/downloads)
 + [Instalar o VS Code](https://code.visualstudio.com/download)
 + [Instalar o PostgreSQL](https://www.postgresql.org/download/)
(Necessário ter as tabelas e colunas criadas da aplicação do tcc).
***
## __Para utilizar o website__
***
 Após instalação do Xampp, é necessário abrir o arquivo ___php.ini___ e adicionar as seguintes linhas

+ ___extension=php_pdo_pgsql.dll___
+ ___extension=php_pgsql.dll___

Além de descomentar as seguintes linhas

* ___extension=pdo_pgsql___
* ___extension=pgsql___

Após adicionar e descomentar as linhas, salve o arquivo ___php.ini___ e se necessário, reinicie sua máquina.

Vá até o caminho ___"C:\xampp\htdocs"___ e coloque nosso projeto do site dentro dessa pasta ___htdocs___ para poder testar o site em php.

> Se preferível você pode abrir o ___Git Bash___ na pasta ___htdocs___ e usar ___git clone https://kuranaga@bitbucket.org/xrundevelopment/mx7-website.git___

Abra o ___Xampp___ e inicie o serviço ___Apache.___

Abra seu navegador e digite ___localhost/"pasta"/"arquivo.php"___

***
## __Certificado SSL__

Entre com o CMD na pasta __xampp/apache__ e utilize o comando ___makecert.___

Digite sua senha para o certificado e confirme.

Complete as informações de ___Nome do país: BR, Organização: MX7, Common name: "localhost", e confirmar senha novamente___

> São as informações obrigatórias

Logo após isso, entre na pasta ___xampp/apache/conf/ssl.crt___ e clique 2x para instalar o certificado

Para instalar, só selecionar ___usuário atual, colocar todos os certificados no repositório a seguir(e escolha Autorização de certificação raiz confiáveis), após isso conclua a instalação.___

***
> Sinta-se à vontade para ajudar no site :smile: