# Define variables with the name of the interfaces
interface_gateway=enx000ec6c09235

# Configure IP address of the interfaces
ifconfig $interface_gateway 192.168.0.2 netmask 255.255.255.0

route add default gw 192.168.0.1 $interface_gateway
