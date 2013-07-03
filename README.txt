Tutorial para desenvolvedor do Wikibus (03/07/2013)

->Descrição do Projeto: O Projeto atual do Wikibus está escrito em Sencha (sistema que fornece ferramentas de desenvolvimento de aplicativos baseados em HTML5 e serviços para a construção de aplicativos universais que funcionam em qualquer dispositivo) que se fundamenta em Javascript com todas as suas requisições feitas por ajax.

->Ambientes de Desenvolvimento: O projeto está preparado para duas IDE's, o "Arquitect" (que é o ambiente padrão Sencha) e o Eclipse.

->Suporte do Banco: Em "conectar.php" na pasta "php", pode-se ver a conexão com o banco, existem duas versões de conexão com o banco nesse file, uma com conexão a um banco MYSQL, que foi adicionado para importação com o nome de "wikibus.sql" na pasta "documentation" no diretório principal do projeto, e a outra conexão está comentada no código, ela supostamente deve conectar com o banco do POSTGRES, lá existe o endereço de ip, nome de usuário e senha porém o banco do servidor ainda não está pronto para suportar o wikibus e essa conexão necessita de uma re-análise. Para trabalhar com o banco MYSQL é recomendado o download e instalação do XAMPP para preparar o ambiente de testes do wikibus.

->Github: O projeto está no github, no repositório de Jailson Brito, para clone e
contribuição é necessário que se faça uma conta e se solicite permissão para sua 
conta.

->Passos para preparar o ambiente:

===Ambiente
1º Baixe e instale uma das duas IDE's descritas acima;
2º Baixe e instale o Git;
3º Baixe e instale o XAMPP;
4º Faça uma conta no github;

===Clonando o Projeto e criando o Banco
4º Abra o GitBash e prossiga com o(s) seguinte(s) comando(s) para clonar o projeto:

git clone https://github.com/cemantika/wikibus.html5.git

--após clonar talvez ele venha a solicitar o usuário e senha do github, informe.

5º Através do GitBash ainda aberto crie um novo Branch para edição do código com o(s) seguinte(s) comando(ºs):

cd wikibus
git checkout -b "nome_do_branch"

6º O projeto foi clonado para o diretório principal do usuário atual do SO (Sistema Operacional) (no caso do windows, C:/users/nome_do_usuario/), vá até lá, copie a pasta do projeto e cole na pasta htdocs que está localizada no diretório onde foi instalado o XAMPP.

7º Abra o brownser e na barra de endereços digite:

localhost/phpmyadmin

--Lá você vai importar o banco "wikibus.sql" que está localizado na pasta "documentation" no diretório principal do projeto

---Agora você pode ver o app wikibus e os dados dele persistentes em seu browser, digitando na barra de endereços:

localhost/wikibus

---e clicando em app.html

===Preparando a IDE
8º Abra a IDE e importe o projeto que está no diretório "..xampp/htdocs"

-- A partir de agora você tem o projeto pronto para edição 

===Upando contribuições do código (branchs)
9º Para upar o seu branch copie o projeto que está no "..xampp/htdocs" e cole em cima do projeto que está no diretório principal do usuário atual do SO. Após isso abra o GitBash e informe os seguintes comandos:

cd wikibus
git checkout nome_do_branch
git add .
git commit -m "nome_do_commit"
git push -u origin nome_do_branch

---ele vai solicitar o seu usuário e senha do github, informe.

---Com isso a sua contribuição foi enviada ao servidor para análise e posterior inclusão ao código master.

10º Após upar alguma coisa, é de extrema importância se atualizar o código local do projeto antes de iniciar com qualquer branch novo, para atualizar o código deve-se fazer o seguinte:

git checkout master
git pull

---ele vai solicitar o seu usuário e senha do github, informe.
---Copie o projeto localizado no diretório do usuário atual do SO e cole na pasta "..xampp/htdocs/" novamente, para que possa sempre trabalhar com um código atualizado.

11º Para novas contribuições repita sempre a partir do 9º passo.

obs.: O sistema de login ainda não terminou de ser implementado, porém o banco tem um usuário com nome, email e senha iguais a 'admin' para testes.



Mário Augusto Mota Martins
h2mario@gmail.com