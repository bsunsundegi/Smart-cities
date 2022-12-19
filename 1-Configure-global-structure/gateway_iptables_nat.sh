# Configure IPs of the USB adapters
ifconfig enx000ec6c091fd 192.168.0.1 netmask 255.255.255.0
ifconfig enx000ec6c09233 192.168.1.1 netmask 255.255.255.0
ifconfig enx000ec6c09237 192.168.2.1 netmask 255.255.255.0
ifconfig wlan0 192.168.3.1 netmask 255.255.255.0

# Enable IP forwarding
echo "1" > /proc/sys/net/ipv4/ip_forward

# Redirect all traffic to PC server
iptables -t nat -A POSTROUTING -o enx000ec6c091fd -j MASQUERADE
