FROM php:8.1-apache

# 必要なモジュールをインストール
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libpq-dev unzip \ 
    # PostgreSQL ドライバ用ライブラリを追加
    && docker-php-ext-install zip \
    && docker-php-ext-install pdo_pgsql  # pdo_pgsql をインストール

# Apacheの設定ファイルをコピー
COPY conf/httpd.conf /etc/apache2/sites-available/000-default.conf

# 必要に応じてsites-enabledにシンボリックリンクを作成
RUN a2ensite 000-default.conf

# mod_rewriteを有効化
RUN a2enmod rewrite

# 必要に応じてDocumentRootの権限を設定
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

EXPOSE 80

CMD ["apache2-foreground"]