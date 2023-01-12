# Start DHCP/DNS server
service dnsmasq restart
# Run access point
hostapd /etc/hostapd.conf
