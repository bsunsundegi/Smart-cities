# Define variables with the name of the interfaces
interface_server=enx000ec6c091fd
interface_wlan=wlxe894f60b829a
interface_internet=enp0s3

# Configure IP address of the interfaces
ifconfig $interface_server 192.168.0.1 netmask 255.255.255.0
ifconfig enx000ec6c09233 192.168.1.1 netmask 255.255.255.0
ifconfig enx000ec6c09237 192.168.2.1 netmask 255.255.255.0
ifconfig $interface_wlan 192.168.3.1 netmask 255.255.255.0
ifconfig $interface_internet 192.168.4.1 netmask 255.255.255.0

# Enable IP forwarding
echo "1" > /proc/sys/net/ipv4/ip_forward

# Delete default routes
ip route flush all

# Configure routes
route add default gw 192.168.4.1 $interface_internet
ip route add 192.168.0.2 dev $interface_server

# Flush iptables
iptables -t nat -F
iptables -t filter -F
iptables -t mangle -F

# Apply NAT to the traffic of the user to Internet
iptables -t nat -A POSTROUTING -o $interface_internet -j MASQUERADE
