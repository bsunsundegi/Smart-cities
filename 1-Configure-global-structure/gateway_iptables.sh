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
route del -net 10.0.2.0 netmask 255.255.255.0 gw 0.0.0.0 dev enp0s3

# Flush iptables
iptables -t nat -F
iptables -t filter -F
iptables -t mangle -F

# Apply NAT to the traffic of the user to Internet
iptables -t nat -A POSTROUTING -o $interface_internet -j MASQUERADE
