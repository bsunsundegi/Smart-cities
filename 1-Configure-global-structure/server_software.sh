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
sudo apt-get install php -y
sudo apt-get install php-mysql -y
sudo service apache2 restart
sudo service mysql restart

# Install and configure NiFi
# Download TAR file and extract it
nifi-1.19.1/bin/nifi.sh set-single-user-credentials smartcities tecnuntecnun

# Install and configure Java
sudo apt install default-jre -y
export $JAVA_HOME = /usr/lib/jvm/java-11-openjdk-amd64

# Configure Wireshark
sudo dpkg-reconfigure wireshark-common
# Click yes
sudo adduser $USER wireshark
# Restart virtual machine

# Install OpenSSH
sudo apt-get install openssh-server

# Enable and configure ports in firewall
sudo ufw allow ssh
sudo ufw allow 22
sudo ufw allow 3306
sudo ufw allow 'Apache Full'
