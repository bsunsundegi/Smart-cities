# Define variables with the name of the interfaces
interface_gateway=enx000ec6c09235
interface_host=ens33

# Configure IP address of the interfaces
ifconfig $interface_gateway 192.168.0.2 netmask 255.255.255.0

# Delete interface ens33 as default gateway
route del default gw 192.168.150.2 $interface_host

# Set interface to PCGateway as default gateway
route add default gw 192.168.0.1 $interface_gateway
