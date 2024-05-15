FROM php:7.4-apache

# Définir le répertoire src comme répertoire racine pour apache
ENV APACHE_DOCUMENT_ROOT /var/www/html/src

# Copier les fichiers et dossiers dans le conteneur
COPY . /var/www/html

# Mettre à jour la configuration du serveur web pour servir le site à partir du nouveau répertoire racine
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Donner les permissions au serveur web pour accéder aux répertoires et fichiers appropriés
RUN chown -R www-data:www-data /var/www/html

# Exposer le port 8080
EXPOSE 8080
