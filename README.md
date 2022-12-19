# Smart cities

## Description
This is the GitHub repository for the final practice of Smart cities. The authors of the practice are [@bsunsundegi](https://github.com/bsunsundegi), [@jmuguruza](https://github.com/jmuguruza), [@acamher](https://github.com/acamher) and [@carlostoca1](https://github.com/carlostoca1).

**Project Status:** `in progress`

## Content index
During the implementation the following steps will be covered:

- [Configure global structure](#configure-global-structure)
  - [Initiate PC server and gateway](#initiate-pc-server-and-gateway)
  - [Configure basic routing in PC gateway](#configure-basic-routing-in-pc-gateway)
  - [Configure basic routing in PC server](#configure-basic-routing-in-pc-server)
- [WiFi access point](#sensor-system)
  - [Deploy access point](#deploy-access-point)
  - [Configure routing in PC gateway](#configure-routing-in-pc-gateway)
  - [Configure routing in PC server](#configure-routing-in-pc-server)
  - [Test system and troubleshooting](#test-system-and-troubleshooting)
- [Webpage](#webpage)
  - [Configure apache server](#configure-apache-server)
  - [Design simple webpage](#design-simple-webpage)
- [Video surveillance](#video-surveillance)
  - [Configure RaspberryPi](#configure-raspberrypi)
  - [Install camera](#install-camera)
  - [Configure routing in PC gateway](#configure-routing-in-pc-gateway)
  - [Configure streaming reception in PC gateway](#configure-streaming-reception-in-pc-gateway)
  - [Configure streaming reception in PC server](#configure-streaming-reception-in-pc-server)
  - [Improve webpage](#improve-webpage)
  - [Test system and troubleshooting](#test-system-and-troubleshooting)
  - [Security improvement](#security-improvement)
- [Sensor system](#sensor-system)
  - [Configure RaspberryPi](#configure-raspberrypi)
  - [Install sensors software](#install-sensors-software)
  - [Configure apache MiNiFi](#configure-apache-minifi)
  - [Configure routing in PC gateway](#configure-routing-in-pc-gateway)
  - [Configure database](#configure-database)
  - [Improve webpage](#improve-webpage)
  - [Test system and troubleshooting](#test-system-and-troubleshooting)
  - [Security improvement](#security-improvement)

## Configure global structure
<details>
<summary>Open to see details</summary>
  
### Initiate PC server and gateway
The operating system chosen for both the PC server and the PC gateway is Ubuntu 22.04. Each one of these PCs are executed in different virtual machines.
For the case of the PC server, Apache Web Server is installed to host the webpage that later will be used.

The following guide was used to install the Apache Web Server: [Installing Apache Web Server](https://www.digitalocean.com/community/tutorials/how-to-install-the-apache-web-server-on-ubuntu-22-04)

In the next picture it can bee seen that the web server has been well deployed
![apache_desplegado](https://user-images.githubusercontent.com/73036899/208314731-f36bb996-685d-488f-9bd8-0089475fd43a.jpg)

File: `gateway_iptables_nat.sh`

Directory: `~/1-Configure-global-structure`

### Configure basic routing in PC gateway
### Configure basic routing in PC server
  
</details>
  
## WiFi access point
<details>
<summary>Open to see details</summary>
  
### Deploy access point
### Configure routing in PC gateway
### Configure routing in PC server
### Test system and troubleshooting

</details>

## Webpage
[Webpage link](https://www.smartcities.fun)
<details>
<summary>Open to see details</summary>
  
### Configure apache server
### Design simple webpage

</details>

## Video surveillance
<details>
<summary>Open to see details</summary>
  
### Configure RaspberryPi
### Install camera
### Configure routing in PC gateway
### Configure streaming reception in PC gateway
### Configure streaming reception in PC server
### Improve webpage
### Test system and troubleshooting
### Security improvement

</details>

## Sensor system
<details>
<summary>Open to see details</summary>
  
### Configure RaspberryPi
### Install sensors software 
### Configure apache MiNiFi
### Configure routing in PC gateway
### Configure database
### Improve webpage
### Test system and troubleshooting
### Security improvement
  
</details>
