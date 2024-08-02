# 1º Passo - Criar rede para os containers do projeto ####
docker network create -d bridge pw2_2024_network

# 2º Passo - Build do Dockerfile do projeto (Criar o container)
docker build -t pw2_2024_estoque .

# 3º Passo - Executar o container criado
docker run -d --name pw2_2024_estoque -p 80:80 -v .:/var/www/html/ --network pw2_2024_network -it pw2_2024_estoque

# 4º Passo - Executar o container do banco de dados
docker run -d --name pw2_2024_mysql -e MYSQL_ROOT_PASSWORD=1234 -e MYSQL_DATABASE=estoque_bd -e MYSQL_USER=root -e MYSQL_PASSWORD=1234 -p 3306:3306 --network pw2_2024_network -v mysql_data:/var/lib/mysql mysql:latest

### Pronto, seu projeto está rodando no apache via Docker

#Comando para mostrar os containers em execução
docker ps

#Comando para parar um container
docker stop nome_container