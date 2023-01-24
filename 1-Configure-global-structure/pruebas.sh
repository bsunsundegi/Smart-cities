Opción 1:
sudo iptables -A INPUT -p tcp -m tcp --dport 1883 -j ACCEPT

Opción 2:
sudo iptables -A INPUT -p tcp --dport 1883 -m conntrack --ctstate NEW,ESTABLISHED -j ACCEPT
sudo iptables -A OUTPUT -p tcp --sport 1883 -m conntrack --ctstate ESTABLISHED -j ACCEPT

Opción 3:
sudo iptables -A INPUT -m conntrack --ctstate ESTABLISHED,RELATED -j ACCEPT

Opción 4:
sudo iptables -A INPUT -s network_ip/24 -p tcp --dport 1882 -j ACCEPT
