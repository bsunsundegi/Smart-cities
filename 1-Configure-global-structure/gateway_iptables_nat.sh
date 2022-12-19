ifconfig enx000ec6c09237 192.168.0.1 netmask 255.255.255.0

echo "1" > /proc/sys/net/ipv4/ip_forward

iptables -t nat -A POSTROUTING -o enp0s3 -j MASQUERADE
