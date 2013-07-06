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
4º Abra o GitBash e vá até a pasta htdocs no xampp:
obs.: Onde está esse "<diretório_do_xampp>" sempre informe o diretório onde você instalou o seu xampp.

cd <diretório_do_xampp>/xampp/htdocs/

5º Prossiga com o(s) seguinte(s) comando(s) para clonar o projeto:

git clone https://github.com/cemantika/wikibus.html5.git

--após informar o comando de clonar ele solicitará o usuário e senha do github, informe.
--O projeto foi clonado para o diretório "<diretório_do_xampp>/xampp/htdocs/wikibus".

6º Abra o brownser e na barra de endereços digite:

localhost/phpmyadmin

--Lá você vai importar o banco "wikibus.sql" que está localizado na pasta "documentation" no diretório principal do projeto

---Agora você pode ver o app wikibus e os dados dele persistentes em seu browser, digitando na barra de endereços:

localhost/wikibus

---e clicando em app.html

===Preparando a IDE
7º Abra a IDE e importe o projeto que está no diretório "<diretório_do_xampp>/xampp/htdocs/wikibus".

-- A partir de agora você tem o projeto pronto para edição 

===Upando contribuições do código (branchs)
8º Através do GitBash ainda aberto crie um novo Branch para edição do código com o(s) seguinte(s) comando(ºs):

cd wikibus				
--para entrar na pasta do projeto.

git checkout -b "nome_do_branch"	
--cria um novo branch

---agora faça suas alterações no código através da sua IDE.

9º Para upar o seu branch abra o GitBash, vá até o diretório do projeto, se já não estiver nele (para conferir digite "ls" e dê enter para saber para qual pasta o GitBash está apontando), e informe os seguintes comandos para dar commit e upar a colaboração:

cd <diretório_do_xampp>/xampp/htdocs/wikibus
--apenas se você já não estiver no diretório do projeto.

git checkout nome_do_branch
--vai para o branch que foram feitas as alterações, não é necessário se você já estiver nesse branch.

git add .
--adiciona as novas alterações no branch.

git commit -m "nome_do_commit"
--cria um pacote das alterações para que sejam enviadas ao repositório do github.

git push -u origin nome_do_branch
--envia o código ao github.

---ele vai solicitar o seu usuário e senha do github, informe.

---Com isso a sua contribuição foi enviada ao servidor para análise e posterior inclusão ao código master.

10º Após upar alguma coisa, é de extrema importância se atualizar o código local do projeto antes de iniciar com qualquer branch novo, para atualizar o código deve-se fazer o seguinte:

git checkout master
--para mudar para o branch master, se quiser voltar ao outro branch só é usar o mesmo código modificando o nome do branch pelo de seu interesse.

git pull
--ele vai solicitar o seu usuário e senha do github, informe.

---Após isso dê um F5 no seu projeto na IDE.

11º Para novas contribuições repita sempre a partir do 8º passo, lembre-se: cada nova alteração é um novo branch, não recicle branchs já utilizados, eles não são atualizados junto com o resto do projeto ao dar o comando "git pull".

obs.: O sistema de login ainda não terminou de ser implementado, porém o banco tem um usuário com nome, email e senha iguais a 'admin' para testes.



Mário Augusto Mota Martins
h2mario@gmail.com