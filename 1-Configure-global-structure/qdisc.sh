# Video 1:10 -> HTTP (8080)
# Sensors 1:20 -> MQTT (1883)
# Wifi 1:30 -> HTTPS? (443)
# Default 1:40
interface_server=enx000ec6c091fd

tc qdisc add dev $interface_server root handle 1:0 htb default 40

tc class add dev $interface_server parent 1:0 classid 1:1 htb rate 1000kbit ceil 1000kbit

tc class add dev $interface_server parent 1:1 classid 1:10 htb rate 600kbit ceil 1000kbit prio 1
tc class add dev $interface_server parent 1:1 classid 1:20 htb rate 100kbit ceil 1000kbit prio 3
tc class add dev $interface_server parent 1:1 classid 1:30 htb rate 200kbit ceil 1000kbit prio 2
tc class add dev $interface_server parent 1:1 classid 1:40 htb rate 100kbit ceil 1000kbit prio 3

tc filter add dev $interface_server parent 1:0 protocol ip handle 10 fw flowid 1:10
tc filter add dev $interface_server parent 1:0 protocol ip handle 20 fw flowid 1:20
tc filter add dev $interface_server parent 1:0 protocol ip handle 30 fw flowid 1:30
tc filter add dev $interface_server parent 1:0 protocol ip handle 40 fw flowid 1:40

iptables -t mangle -A FORWARD -p tcp --dport 8080 -o $interface_server -j MARK --set-mark 10
iptables -t mangle -A FORWARD -p tcp --dport 8080 -o $interface_server -j RETURN
iptables -t mangle -A FORWARD -p tcp --dport 1883 -o $interface_server -j MARK --set-mark 20
iptables -t mangle -A FORWARD -p tcp --dport 1883 -o $interface_server -j RETURN
iptables -t mangle -A FORWARD -p tcp --dport 443 -o $interface_server -j MARK --set-mark 30
iptables -t mangle -A FORWARD -p tcp --dport 443 -o $interface_server -j RETURN
iptables -t mangle -A FORWARD -o $interface_server -j MARK --set-mark 40
iptables -t mangle -A FORWARD -o $interface_server -j RETURN

iptables -t mangle -A OUTPUT -p tcp --dport 8080 -o $interface_server -j MARK --set-mark 10
iptables -t mangle -A OUTPUT -p tcp --dport 8080 -o $interface_server -j RETURN
iptables -t mangle -A OUTPUT -p tcp --dport 1883 -o $interface_server -j MARK --set-mark 20
iptables -t mangle -A OUTPUT -p tcp --dport 1883 -o $interface_server -j RETURN
iptables -t mangle -A OUTPUT -p tcp --dport 443 -o $interface_server -j MARK --set-mark 30
iptables -t mangle -A OUTPUT -p tcp --dport 443 -o $interface_server -j RETURN
iptables -t mangle -A OUTPUT -o $interface_server -j MARK --set-mark 40
iptables -t mangle -A OUTPUT -o $interface_server -j RETURN
