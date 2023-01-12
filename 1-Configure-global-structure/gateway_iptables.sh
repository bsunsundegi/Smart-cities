# Define variables with the name of the interfaces
interface_server=enx000ec6c091fd
interface_webcam=enx000ec6c09233
interface_sensors=enx000ec6c09237
interface_wlan=wlxe894f60b829a
interface_internet=ens33

# Configure IP address of the interfaces
ifconfig $interface_server 192.168.0.1 netmask 255.255.255.0
ifconfig $interface_webcam 192.168.1.1 netmask 255.255.255.0
ifconfig $interface_sensors 192.168.2.1 netmask 255.255.255.0
ifconfig $interface_wlan 192.168.3.1 netmask 255.255.255.0

# Configure route from gateway to server
sudo ip route add 192.168.0.0/24 dev $interface_server

# Enable IP forwarding
echo "1" > /proc/sys/net/ipv4/ip_forward

# Flush iptables
iptables -t nat -F
iptables -t filter -F
iptables -t mangle -F

# Apply NAT to the traffic of the user to Internet
iptables -t nat -A POSTROUTING -o $interface_internet -j MASQUERADE
