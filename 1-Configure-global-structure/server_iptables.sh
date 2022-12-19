#!/bin/bash

interface_server=enx000ec6c09235

# Configure interface
ifconfig $interface_server 192.168.0.2 netmask 255.255.255.0
route add default gw 192.168.0.1 $interface_server