Minha Primeira Aplicação/Sistema PHP - Git
==============================

## User Story #1
Inicialize o `GIT` na raiz do exercício para ter o controle das modificações feitas.

## User Story #2
Depois de inicializado, crie uma branch a partir da branch principal (`master`) chamado `develop`. Lembrando que o desenvolvimento deverá ser feito na branch `develop`.

Sempre que possível, faça merge de `develop` para dentro da branch principal `master`.

*Veja os vários exemplos/exercícios de GIT que fizemos*

https://training.github.com/downloads/pt_PT/github-git-cheat-sheet.pdf

## User Story #3
Lembre-se que antes de fazer `commit`, é preciso adicionar o nosso ficheiro em `staging area`
1. git add .....
1. git commit -m "Message..."

## User Story #4
Veja abaixo uma pequena documentação com os principais comandos do `GIT`.

**Nota:** Todos os comandos abaixo poderão ser feitos/executados através do ambiente gráfico do **VSCode**.

--------------------------

Principais Comandos do Git
--------------------------

*   `git config -–list` » Lista as configurações do Git, se estiver dentro do repositório, lista mais itens
*   `git config -–global user.name "Meu Nome"` » Define o nome de utilizador para o Git
*   `git config -–global user.email "email@dominio.com"` » Define o e-mail de utilizador para o Git
*   `git config -–global core.editor vim` » Define o editor de texto padrão para abrir automaticamente os ficheiros  informados pelo Git
*   `git init` » Inicializa um repositório Git
*   `git status` » Vê o estado atual de staging area
*   `git add exemplo.txt` » Adiciona o ficheiro exemplo.txt ao staging area

> Opções do parâmetro **add**

    git-add # mesmo comando que 'git add'
    
    # O comando git-add não irá adicionar ficheiros ignorados por padrão a menos que seja utilizado o parâmetro '-f'
    
    git add -A # Adiciona todos ficheiros que foram modificados, mesmo que: --all, --no-ignore-removal
    
    git add *.txt # Adiciona todos os ficheiros '.txt' que foram modificados
    
    man git-add # manual completo sobre git-add

*   `git commit -m "Minhas mudanças efetuadas"` » Armazena as mudanças efetuadas e descreve o que foi alterado
*   `git log` » Mostra todas as mudanças que já foram efetuadas: commit, autor e data
*   `git push -u origin master` » Envia todos os ficheiros modificados e “commitados” para o repositório no github
    *   `-u` - faz com que o Git armazene esse comando e da próxima vez basta utilizarmos `git push`
    *   `origin`\- diz que o repositório no github possui o mesmo nome do projeto/diretório que você está enviando
    *   `master` - é o nome da _branch_ (**indicador**)
*   `git pull origin master` » Verifica as mudanças efetuadas por outros colaboradores do projeto
*   `git diff HEAD` » Verifica as partes dos ficheiros alterados no último commit, **veja mais opções em** `man git-diff`
*   `git reset ficheiro.txt` » Remove um ficheiro de staging area
*   `git checkout – ficheiro.txt` » Desfaz a última alteração feita num ficheiro
*   `git rm "*.txt"` » Remove 1 ou mais ficheiros de staging area
*   `git clone https://github.com/user/project.git` » Copia um projeto `GIT` remoto para o PC
*   `info git` » Obtém a Documentação do git
*   `man git` » Obtém o Manual do git
