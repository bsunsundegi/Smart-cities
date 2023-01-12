# Update packages
sudo apt-get update

# Install and enable Mosquitto
sudo apt-get install mosquitto -y
sudo systemctl enable mosquitto

# Install hostapd and dnsmasq
sudo apt-get install hostapd
sudo apt-get install dnsmasq
