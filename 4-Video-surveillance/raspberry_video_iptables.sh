# Define variable with the name of the gateway interface
interface_gateway=eth0

# Configure IP address of the interfaces
ifconfig $interface_gateway 192.168.1.2 netmask 255.255.255.0
