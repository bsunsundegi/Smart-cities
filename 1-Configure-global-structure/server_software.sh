# Update packages
sudo apt-get update

# Install network tools
sudo apt-get install net-tools -y

# Install and enable Apache
sudo apt-get install apache2 -y
sudo systemctl enable apache2

# Install and enable MySQL
sudo apt-get install mysql-server -y
sudo systemctl enable mysql

# Install PHP
sudo apt-get install php7.4
sudo apt-get install php-mysql
sudo apt-get install php7.4-mysql
sudo service apache2 restart
sudo service mysql restart
