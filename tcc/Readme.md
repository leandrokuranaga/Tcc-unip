# __Para testar a aplicação é necessário atender a alguns requisitos__

***
* [Instalar o Visual Studio Code](https://code.visualstudio.com/download)
* [Instalar o Node.js](https://nodejs.org/en/download/)
* [Instalar o Android Studio](https://developer.android.com/studio/install?hl=pt-br)
* [Instalar o Java](https://www.oracle.com/technetwork/java/javase/downloads/jdk8-downloads-2133151.html)
* [Instalar o Git](https://git-scm.com/downloads)
***
## __Comandos úteis__
Para verificar a versão do java


* ___Java -version___


Para verificar a versão do Node


* ___Node -v___

Para verificar a versão do node package


* ___Npm -v___
***
## **Adicionar as variáveis de ambiente**

1. Pressione a tecla Windows+E vá até ao lado esquerdo e clique com o botão direito em Este Computador.
2. Clique em Configurações Avançadas do Sistema no lado esquerdo.
3. Clique em Variáveis de Ambiente.
***
## **Java**

 Para adicionar a variável JAVA ao path copie o path do jdk 8 (Geralmente fica em C:/Arquivos de Programas/Java/”Entrar na versão do seu Java e copiar”) vá até as variáveis de sistema e clique em novo.


Coloque o nome da variável de “JAVA_HOME” e cole o path abaixo.
***
## **Android**
Para achar o path do sdk basta abrir o android studio vá até configurações, SDK MANAGER e estará localizado no topo escrito Android SDK Location.


Vá até as variáveis de usuário, crie uma nova variável com nome Android_Home e cole o path.


 Vá até o path nas variáveis de usuário e crie 4 novas variáveis da seguinte forma.
* %Android_Home%\emulator
* %Android_Home%\tools
* %Android_Home%\tools\bin
* %Android_Home%\platform-tools


**Para verificar se está funcionando execute o comando no CMD:**


***Adb  --version***	Variável no sistema do %Android_Home%

 ***Emulator -version*** Variável do sistema %Android_Home%\emulator

 Logo após isso usa-se o comando no CMD:

***Sdkmanager --licenses*** 			Para aceitar as licenças (Use o Y para yes)
***
## 	**PARA EMULADOR COM CLI (USE SEMPRE O CMD)**

***Emulator -list-avds***				Para ver disponibilidade de emuladores.


 ***Emulator -no-snapshot -avd “Versão do dispositivo”***  Irá disparar uma tela com um emulador android.


 ***Npm i –g react-native-cli*** 		Irá instalar globalmente o react native. 


 ***Mkdir 	“Nome da pasta”***						Para fazer pasta.


 ***React-native init “nome do projeto”*** 		Este comando deve ser executado na pasta com o cd pelo terminal.


 Entre no seu projeto com cd e execute o comando:


 ***React-native run-android***			Este comando faz com que o emulador funcione em dispositivos android.


 Utilize o comando ***code .*** 			Para abrir o visual studio code para poder codar o projeto.
 A aplicação em que você precisa codar é a App.js.
***
## 	**PARA EMULADOR COM SEU DISPOSITIVO FÍSICO**

 Baixe o app [EXPO para android.](https://play.google.com/store/apps/details?id=host.exp.exponent&hl=pt_BR)


 ***npm i –g create-react-native-app*** 		Instalar pacote node para emular dispositivo.


 ***create-react-native-app*** “Nome da aplicação” Ele irá fazer uma pasta com todos os recursos necessários para sua aplicação funcionar.


 Entre na pasta com o comando ***cd.***


Utilize o comando ***code .*** 			Para abrir o visual studio code para poder codar o projeto.


 Utilize o comando ***npm start*** para abrir uma janela com QR code e desbloqueie o mesmo com seu celular.


 A aplicação em que você precisa codar é a App.js.
***
## 	**PARA EMULADOR COM SEU DISPOSITIVO FÍSICO SEM BAIXAR O EXPO**
***npm i –g create-react-native-app*** 		Instalar pacote node para emular dispositivo.


 ***create-react-native-app*** “Nome da aplicação” Ele irá fazer uma pasta com todos os recursos necessários para sua aplicação funcionar.


 Entre na pasta com o comando ***cd.***


 Utilize o comando ***code .*** Para abrir o visual studio code na pasta do projeto.


 Plugue seu dispositivo móvel com cabo no computador.


 Utilize o comando ***react-native run-android*** Para o Node iniciar e começar a instalação da aplicação em seu dispositivo.


 A aplicação em que você precisa codar é a App.js.
***
## **Para Utilizar o projeto**
* Utilizar o comando ***git clone "projeto.git"*** 


* Entre na pasta com o comando ***cd .***


* Utilize o comando ***code .*** Para abrir o visual studio code na pasta do projeto.


* Instale as dependências através do comando ***Npm install***


* Rode a aplicação com o comando ***npm run android***
***
## **Eventuais erros no development server**

* Exclua a pasta node_modules.


* Use o comando ___npm install___


* Rode sua aplicação com ***npm run android***
