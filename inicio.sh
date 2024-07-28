#!/bin/bash

# Atualizar os pacotes do sistema
sudo apt update && sudo apt upgrade -y

# Instalar o Apache
sudo apt install apache2 -y

# Iniciar e habilitar o Apache
sudo systemctl start apache2
sudo systemctl enable apache2

# Instalar o PHP e extensões necessárias
sudo apt install php libapache2-mod-php php-mysql -y

# Reiniciar o Apache
sudo systemctl restart apache2

# Solicitar informações do usuário para o MySQL
read -p "Digite o endereço do servidor MySQL (ex: localhost): " mysql_host
read -p "Digite o nome de usuário do MySQL: " mysql_user
read -sp "Digite a senha do usuário MySQL: " mysql_password
echo
read -p "Digite o nome do banco de dados que deseja criar: " database_name
read -p "Digite o nome do novo usuário MySQL: " new_mysql_user
read -sp "Digite a senha do novo usuário MySQL: " new_mysql_password
echo

# Criar banco de dados e usuário MySQL
mysql -h "$mysql_host" -u "$mysql_user" -p"$mysql_password" <<EOF
CREATE DATABASE IF NOT EXISTS $database_name;
CREATE USER IF NOT EXISTS '$new_mysql_user'@'%' IDENTIFIED BY '$new_mysql_password';
GRANT ALL PRIVILEGES ON $database_name.* TO '$new_mysql_user'@'%';
FLUSH PRIVILEGES;
EOF

# Solicitar caminho do projeto CRUD
read -p "Digite o caminho completo do diretório do seu projeto CRUD: " project_path

# Copiar arquivos do projeto CRUD para o diretório raiz do Apache
sudo cp -r "$project_path"/* /var/www/html/

# Configurar permissões do diretório raiz do Apache
sudo chown -R www-data:www-data /var/www/html/
sudo chmod -R 755 /var/www/html/

# Instruções finais
echo "Configuração do ambiente LAMP concluída!"
echo "Você pode verificar o PHP funcionando acessando http://localhost/info.php"
echo "Seu projeto CRUD foi copiado para /var/www/html/"