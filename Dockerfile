FROM wordpress:latest

# 必要なツール郡をインストール
RUN apt-get update
RUN apt-get -y install wget unzip

# WP プラグイン (zip) ダウンロード
WORKDIR /tmp/wp-plugins
RUN wget https://downloads.wordpress.org/plugin/contact-form-7.5.1.7.zip
RUN wget https://downloads.wordpress.org/plugin/contact-form-7-extras.0.7.2.zip
RUN wget https://downloads.wordpress.org/plugin/duplicate-post.3.2.4.zip
RUN wget https://downloads.wordpress.org/plugin/pixabay-images.zip
RUN wget https://downloads.wordpress.org/plugin/wp-mail-smtp.1.9.0.zip
RUN wget https://downloads.wordpress.org/plugin/wp-multibyte-patch.2.8.4.zip
RUN wget https://downloads.wordpress.org/plugin/all-in-one-wp-migration.7.20.zip
RUN wget https://import.wp-migration.com/all-in-one-wp-migration-file-extension.zip

# Zip ファイルを解凍してインストール
RUN unzip './*.zip' -d /usr/src/wordpress/wp-content/plugins

# Xeory Base ダウンロード
# from google drive
WORKDIR /tmp/wp-themes
RUN wget 'https://docs.google.com/uc?export=download&id=1udSb8plmDkEbVnoZ3buiOmcON8i9DB6Y' -O xeory_base.zip

# Zip ファイルを解凍してインストール
RUN unzip './*.zip' -d /usr/src/wordpress/wp-content/themes

# 不要になった一時ファイルを削除
RUN apt-get clean
RUN rm -rf /tmp/*

# サーバが読めるように wp-content 以下の所有者を変更
# RUN chown -R www-data:www-data /usr/src/wordpress/wp-content

WORKDIR /var/www/html