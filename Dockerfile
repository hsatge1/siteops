FROM php:7.4-apache

# Copier les fichiers et dossiers dans le conteneur
COPY . /var/www/html/

# Donner les permission au serveur web pour accéder aux répertoires et fichiers appropriés
RUN chown -R www-data:www-data /var/www/html

# Exposer le port 8080
EXPOSE 8080


# Si vous avez besoin d'autres commandes pour configurer votre PHP ou Apache, ajoutez-les ici
