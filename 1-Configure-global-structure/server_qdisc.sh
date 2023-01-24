interface_gateway=enx000ec6c09235

tc qdisc add dev $interface_gateway root handle 1:0 htb default 40

tc class add dev $interface_gateway parent 1:0 classid 1:1 htb rate 20000kbit ceil 20000kbit

tc class add dev $interface_gateway parent 1:1 classid 1:10 htb rate 1000kbit ceil 20000kbit prio 1
tc class add dev $interface_gateway parent 1:1 classid 1:20 htb rate 1000kbit ceil 20000kbit prio 2
tc class add dev $interface_gateway parent 1:1 classid 1:30 htb rate 16000kbit ceil 20000kbit prio 3
tc class add dev $interface_gateway parent 1:1 classid 1:40 htb rate 2000kbit ceil 20000kbit prio 3

tc filter add dev $interface_gateway parent 1:0 protocol ip handle 10 fw flowid 1:10
tc filter add dev $interface_gateway parent 1:0 protocol ip handle 20 fw flowid 1:20
tc filter add dev $interface_gateway parent 1:0 protocol ip handle 30 fw flowid 1:30
tc filter add dev $interface_gateway parent 1:0 protocol ip handle 40 fw flowid 1:40

iptables -t mangle -A FORWARD -p tcp --dport 2500 -o $interface_gateway -j MARK --set-mark 10
iptables -t mangle -A FORWARD -p tcp --dport 2500 -o $interface_gateway -j RETURN
iptables -t mangle -A FORWARD -p tcp --dport 1883 -o $interface_gateway -j MARK --set-mark 20
iptables -t mangle -A FORWARD -p tcp --dport 1883 -o $interface_gateway -j RETURN
iptables -t mangle -A FORWARD -p tcp --dport 443 -o $interface_gateway -j MARK --set-mark 30
iptables -t mangle -A FORWARD -p tcp --dport 443 -o $interface_gateway -j RETURN
iptables -t mangle -A FORWARD -o $interface_gateway -j MARK --set-mark 40
iptables -t mangle -A FORWARD -o $interface_gateway -j RETURN

iptables -t mangle -A OUTPUT -p tcp --dport 2500 -o $interface_gateway -j MARK --set-mark 10
iptables -t mangle -A OUTPUT -p tcp --dport 2500 -o $interface_gateway -j RETURN
iptables -t mangle -A OUTPUT -p tcp --dport 1883 -o $interface_gateway -j MARK --set-mark 20
iptables -t mangle -A OUTPUT -p tcp --dport 1883 -o $interface_gateway -j RETURN
iptables -t mangle -A OUTPUT -p tcp --dport 443 -o $interface_gateway -j MARK --set-mark 30
iptables -t mangle -A OUTPUT -p tcp --dport 443 -o $interface_gateway -j RETURN
iptables -t mangle -A OUTPUT -o $interface_gateway -j MARK --set-mark 40
iptables -t mangle -A OUTPUT -o $interface_gateway -j RETURN
