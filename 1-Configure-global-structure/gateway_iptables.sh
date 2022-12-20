# Configure IPs of the USB adapters
ifconfig enx000ec6c091fd 192.168.0.1 netmask 255.255.255.0
ifconfig enx000ec6c09233 192.168.1.1 netmask 255.255.255.0
ifconfig enx000ec6c09237 192.168.2.1 netmask 255.255.255.0
ifconfig wlan 192.168.3.1 netmask 255.255.255.0
ifconfig enp0s3 192.168.4.1 netmask 255.255.255.0

# Enable IP forwarding
echo "1" > /proc/sys/net/ipv4/ip_forward

# Flush iptables
iptables -t nat -F
iptables -t filter -F
iptables -t mangle -F

# Configure the enp0s3 interface as default gateway
route add default gw 192.168.4.1 enp0s3

# The route to the server is not configured because it is automaticaly added when configuring the interface

# Apply NAT to the traffic of the user to Internet
iptables -t nat -A POSTROUTING -i wlan -o enp0s3 -j MASQUERADE
