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

# Enable IP forwarding
echo "1" > /proc/sys/net/ipv4/ip_forward

# Flush iptables
iptables -t nat -F
iptables -t filter -F
iptables -t mangle -F

# By default
iptables -P FORWARD ACCEPT
iptables -P INPUT ACCEPT
iptables -P OUTPUT ACCEPT


# Apply NAT to the traffic of the user to Internet
iptables -t nat -A POSTROUTING -o $interface_internet -j MASQUERADE

# Qdisc
./gateway_qdisc.sh

# Iptables configuration

# Wifi to video DENY
iptables -t filter -A FORWARD -i $interface_wlan -o $interface_webcam -p tcp --dport 2500 -j ACCEPT
iptables -t filter -A FORWARD -i $interface_webcam -o $interface_wlan -p tcp --sport 2500 -j ACCEPT
iptables -t filter -A FORWARD -i $interface_wlan -o $interface_webcam -j DROP
iptables -t filter -A FORWARD -i $interface_webcam -o $interface_wlan -j DROP

# Users to internet (funciona)
iptables -t filter -A FORWARD -i $interface_wlan -o $interface_internet -j ACCEPT
iptables -t filter -A FORWARD -i $interface_internet -o $interface_wlan -j ACCEPT

# Users to PC_Server
#iptables -t filter -A INPUT -i $interface_wlan -p tcp --dport 80 -j ACCEPT
#iptables -t filter -A OUTPUT -o $interface_wlan -p tcp --dport 80 -j ACCEPT
#iptables -t filter -A FORWARD -i $interface_wlan -o $interface_server -p tcp --dport 80 -j ACCEPT
#iptables -t filter -A FORWARD -i $interface_server -o $interface_wlan -p tcp --dport 80 -j ACCEPT

# Control LOG
iptables -t filter -A INPUT -i $interface_sensors -p tcp --dport 1883 -j LOG --log-prefix "filter INPUT MQTT:"
iptables -t filter -A OUTPUT -p tcp --tcp-flags SYN,RST,ACK,FIN ACK -j LOG --log-prefix "filter OUTPUT MQTT ACK:"

# Sensors to GT (MQTT)
iptables -t filter -A INPUT -i $interface_sensors -p tcp --dport 1883 -j ACCEPT
iptables -t filter -A OUTPUT -o $interface_sensors -p tcp --sport 1883 -j ACCEPT


# Deny others
#iptables -t filter -A FORWARD -j DROP
#iptables -t filter -A INPUT -j DROP
#iptables -t filter -A OUTPUT -j DROP
