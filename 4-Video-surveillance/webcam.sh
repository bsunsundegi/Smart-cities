# Define variable with the name of the gateway interface
interface_gateway=eth0

# Configure IP address of the interfaces
ifconfig $interface_gateway 192.168.1.2 netmask 255.255.255.0

# Configure route from gateway to Raspberry
sudo ip route add 192.168.1.0/24 dev enp0s8
