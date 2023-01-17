# Define variables with the name of the interfaces
interface_server=enx000ec6c091fd
interface_webcam=enx000ec6c09233
interface_sensors=enx000ec6c09237
interface_wlan=wlxe894f60b829a
interface_host=ens33

# Configure IP address of the interfaces
ifconfig $interface_server 192.168.0.1 netmask 255.255.255.0
ifconfig $interface_webcam 192.168.1.1 netmask 255.255.255.0
ifconfig $interface_sensors 192.168.2.1 netmask 255.255.255.0
ifconfig $interface_wlan 192.168.3.1 netmask 255.255.255.0

# Enable IP forwarding
echo "1" > /proc/sys/net/ipv4/ip_forward

# Flush iptables
iptables -t nat -F
iptables -t filter -F
iptables -t mangle -F

# Apply NAT to the traffic of the user to Internet
iptables -t nat -A POSTROUTING -o $interface_host -j MASQUERADE

# Iptables configuration

# Users to PC_Server
iptables -t filter -A INPUT -i $interface_wlan -p http -j ACCEPT
iptables -t filter -A OUTPUT -o $interface_wlan -p http -j ACCEPT
iptables -t filter -A FORWARD -i $interface_wlan -o $interface_server -p http -j ACCEPT
iptables -t filter -A FORWARD -i $interface_server -o $interface_wlan -p http -j ACCEPT

# Users to internet
iptables -t filter -A FORWARD -i $interface_wlan -o $interface_host -j ACCEPT
iptables -t filter -A FORWARD -i $interface_host -o $interface_wlan -j ACCEPT

# Sensors to GT (MQTT)
iptables -t filter -A INPUT -i $interface_sensors -j ACCEPT
#iptables -t filter -A OUTPUT -o $interface_sensors --tcp-flags ACK -j ACCEPT		# Check if that works well
#iptables -t filter -A OUTPUT -o $interface_sensors -j DROP

# Video to Server
iptables -f filter -A FORWARD -i $interface_server -o $interface_webcam -p http -j ACCEPT
iptables -f filter -A FORWARD -i $interface_webcam -o $interface_server -p http -j ACCEPT

# Deny others
iptables -f filter -A FORWARD -j DROP
iptables -f filter -A INPUT -j DROP