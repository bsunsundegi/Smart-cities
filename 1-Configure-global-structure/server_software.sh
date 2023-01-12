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
sudo apt-get install php7.4 -y
sudo apt-get install php-mysql -y
sudo apt-get install php7.4-mysql -y
sudo service apache2 restart
sudo service mysql restart

# Install nifi
echo 'After that check if Nifi is installed'

# Install and configure Java
sudo apt install default-jre -y
export $JAVA_HOME = /usr/lib/jvm/java-11-openjdk-amd64
