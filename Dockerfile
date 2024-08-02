# Use a imagem oficial do PHP com Apache
FROM php:7.4-apache

# Instale extensões do PHP. Adicione mais conforme necessário
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Defina o ServerName globalmente no Apache
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Copie os arquivos do projeto para a pasta pública do Apache
COPY . /var/www/html/

# Exponha a porta 80 para acessar o servidor Apache
EXPOSE 80