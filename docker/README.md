## Requisitos

-   **Docker** <https://docs.docker.com/get-docker/>
-   Portas livres ( 83, 8083, 3383 )

## Como usar essa configuração Docker para rodar o projeto?

-   Tenha o **Docker** instalado na sua máquina
-   Rode o script `sh configure-docker.sh` da past ./docker

## O que o script irá executar?

-   `docker-compose build`
-   `docker-compose -p perfectpay up -d`
-   `docker exec -t perfectpay_php composer install`
-   `docker exec -t perfectpay_php php artisan migrate`

o script tentará abrir o projeto no chrome com o comando:

-   **no MacOS**
-   `open -a "Google Chrome" http://localhost:83`
-   **no Linux**
-   `google-chrome http://localhost:83`

Agora basta que você acesse em sua máquina o seguinte endereço para navegar no projeto:
**<http://localhost:83>**

# Solução de problemas

Caso tenha algum problema para executar o projeto, verifique se alguma das portas já estão sendo utilizadas pelo seu computador.

### São as seguintes portas expostas:

-   83 para apache/php
-   3383 para o mysql
-   8083 para o phpmyadmin
