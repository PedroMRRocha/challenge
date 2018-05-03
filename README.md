# Coding challenge

1. Instalar Git, Docker e Docker Compose
1. Fazer fork do repo do [challenge](https://github.com/HugoMestre1/challenge)
1. Depois clonar o fork para o teu computador
1. Entrar na directoria do projecto e correr:
    ```bash
    git submodule init
    git submodule update
    ```
1. Entrar na directoria docker-symfony correr:
    ```bash
    docker-compose build
    docker-compose up -d
    ```
1. Para aceder ao container em que vamos correr os nossos comandos correr na directoria docker-symfony:
    ```bash
    docker-compose exec php bash
    ```

Depois de instalado o docker, o projecto sincronizado e entrar no container basta inicializar as dependências do projecto:
```bash
# No fim vai pedir algumas variáveis, basta dar enter que à partida funciona
composer install
```

Problemas com permissões de pastas? Dentro do container correr:
```bash
chmod -R 777 app/cache app/logs
```

Tens aqui um projecto esqueleto de symfony com um docker para trabalhar.

Objectivos:
1. Ter um formulário que aceita um URL
    -   A submissão do formulário deve originar um parse a todo o conteúdo retornado do URL em causa.
1. O resultado deve ser exibido num gráfico que liste as 10 palavras mais comuns bem com uma lista de todas as palavras ocorridas e quantidade de ocorrências.
1. Todos os resultados destas submissões devem ser guardados em base de dados
1. Deve haver uma lista com estas submissões para que possam ser posteriormente consultadas
1. Deve existir uma lista com o top 10 de letras mais recorrentes (globalmente) nas submissões
