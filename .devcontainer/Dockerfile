# [Choice] PHP version (use -bullseye variants on local arm64/Apple Silicon): 8, 8.1, 8.0, 7, 7.4, 7.3, 8-bullseye, 8.1-bullseye, 8.0-bullseye, 7-bullseye, 7.4-bullseye, 7.3-bullseye, 8-buster, 8.1-buster, 8.0-buster, 7-buster, 7.4-buster
ARG VARIANT=8.0
FROM mcr.microsoft.com/vscode/devcontainers/php:0-${VARIANT}

# Install MariaDB client
RUN apt-get update && export DEBIAN_FRONTEND=noninteractive \
    && apt-get install -y mariadb-client \ 
    && apt-get install -y libicu-dev \
    && apt-get clean -y && rm -rf /var/lib/apt/lists/*

# Configure php extensions
RUN docker-php-ext-configure intl

# Install php extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql intl

# [Choice] Node.js version: none, lts/*, 16, 14, 12, 10
ARG NODE_VERSION="none"
RUN if [ "${NODE_VERSION}" != "none" ]; then su vscode -c "umask 0002 && . /usr/local/share/nvm/nvm.sh && nvm install ${NODE_VERSION} 2>&1"; fi

RUN a2enmod rewrite

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

RUN echo "DocumentRoot /workspace/public/" >> /etc/apache2/apache2.conf

RUN echo "<Directory /workspace/public/>" >> /etc/apache2/apache2.conf \
    && echo "Options Indexes FollowSymLinks" >> /etc/apache2/apache2.conf \
    && echo "AllowOverride All" >> /etc/apache2/apache2.conf \
    && echo "Require all granted" >> /etc/apache2/apache2.conf \
    && echo "</Directory>" >> /etc/apache2/apache2.conf

# [Optional] Uncomment this section to install additional OS packages.
# RUN apt-get update && export DEBIAN_FRONTEND=noninteractive \
#     && apt-get -y install --no-install-recommends <your-package-list-here>

# [Optional] Uncomment this line to install global node packages.
# RUN su vscode -c "source /usr/local/share/nvm/nvm.sh && npm install -g <your-package-here>" 2>&1
