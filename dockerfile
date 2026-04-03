FROM php:8.2-apache

# 1. Instala extensões necessárias para seu E-commerce (PDO para o Postgres/MySQL)
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pdo_mysql

# 2. Habilita o Mod_Rewrite para o seu .htaccess funcionar
RUN a2enmod rewrite

# 3. Permite que o Apache use o .htaccess (AllowOverride All)
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# 4. Define o diretório de trabalho
WORKDIR /var/www/html

# Copia os arquivos (no dev, usaremos volumes, mas isso é bom para o build)
COPY . .

EXPOSE 80