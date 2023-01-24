# Smart cities

## Description
This is the GitHub repository for the final practice of Smart cities. The authors of the practice are [@bsunsundegi](https://github.com/bsunsundegi), [@jmuguruza](https://github.com/jmuguruza), [@acamher](https://github.com/acamher) and [@carlostoca1](https://github.com/carlostoca1).

**Project Status:** `in progress`

The Smart City network will be like the one shown below:
![network_scheme](https://github.com/bsunsundegi/Smart-cities/blob/main/img/Network.png)

## Content index
During the implementation the following steps will be covered:

- [Configure global structure](#configure-global-structure)
  - [Initiate PC server and gateway](#initiate-pc-server-and-gateway)
  - [Configure basic routing in PC gateway](#configure-basic-routing-in-pc-gateway)
  - [Configure basic routing in PC server](#configure-basic-routing-in-pc-server)
- [WiFi access point](#sensor-system)
  - [Configure dnsmasq](#configure-dnsmasq)
  - [Configure hostapd](#configure-hostapd)
  - [WiFi service start](#wifi-service-start)
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
- [Suggestion box](#suggestion-box)

## Configure global structure
<details>
<summary>Open to see details</summary>
  
### Initiate PC server and gateway
The operating system chosen for both the PC server and the PC gateway is Ubuntu 22.04. Each one of these PCs are executed in different virtual machines.
For the case of the PC server, Apache Web Server is installed to host the webpage that later will be used.

### Configure basic routing in PC gateway

File: `gateway_iptables.sh`

Directory: `~/1-Configure-global-structure`

### Configure basic routing in PC server

File: `server_iptables.sh`
    
Directory: `~/1-Configure-global-structure`
  
1. Execute `gateway_iptables.sh` in PC gateway and `server_iptables.sh` in PC server and verify that both computers ping each other.
  
</details>
  
## WiFi access point
<details>
<summary>Open to see details</summary>
  
### Configure dnsmasq

The first step of the WiFi access point will be configuring a DNS and DHCP server; for that purpose dnsmasq will be used. In the configuration file the interface is set to `wlan`, binding interface is enabled and a DHCP range is defined according to the general network scheme. Then, go to`~/2-WiFi-access-point` and execute the file `dnsmasq.conf`.
  
### Configure hostapd
  
Second, the access point needs to be implemented. Parameters like channel, password, interface are defined in the configuration file. Now again, go to `~/2-WiFi-access-point` and execute the file `hostapd.conf`.
  
### WiFi service start

Finally, when both the DNS/DHCP and the access point have been configured, they need to be started. Optionally, use from the same directory the script `wifi.sh`, that will do this task automatically when executed.

</details>

## Webpage
[Webpage link](https://www.smartcities.fun)
<details>
<summary>Open to see details</summary>
  
### Configure apache server

The following guide was used to install the Apache Web Server: [Installing Apache Web Server](https://www.digitalocean.com/community/tutorials/how-to-install-the-apache-web-server-on-ubuntu-22-04)

In the next picture it can bee seen that the web server has been well deployed
![apache_desplegado](https://user-images.githubusercontent.com/73036899/208314731-f36bb996-685d-488f-9bd8-0089475fd43a.jpg)

### Design simple webpage
If the admin wants to see data such as video surveillance, sensor data or the suggestions submitted by the users in the suggestion box, the webpage deployed for that would look like the following one:

![server_webpage](https://user-images.githubusercontent.com/73036899/209978766-0ec14590-6ca6-43f5-8864-235af8aa5e55.jpg)

This page has three buttons. Each button corresponds to each one of the 3 possible types of data. If the admin would like to return back to the main page, it would be possible through the button that appears on screen when whichever button is pressed.
</details>

## Video surveillance
<details>
<summary>Open to see details</summary>
  
### Configure RaspberryPi
At first, the RaspberryPi only has the Raspbian image and the operating system generated by the image. Just by connecting it through HDMI will not work. So in order for this to work, we have to do the following steps.

1. Unplug the RaspberryPi and extract the SD Card.

2. If your computer does not have a MicroSD Card Slot, plug the MicroSD Card to the PC through a MicroSD to USB device.

3. Find the file named 'config.txt' and open it. To be able to send images through HDMI some parameters of this file will have to be modified.
![configtxt](https://user-images.githubusercontent.com/73036899/209112138-1d22a620-88e8-4885-ae45-ba7c84ab4c03.jpg)

This files are commented with a '#' so just removing the '#' will be enough. The parameters that have to be uncommented are:
  - `hdmi_safe = 1`
  - `hdmi_force_hotplug = 1`
  - `hdmi_drive = 2`
  
  
![hdmi](https://user-images.githubusercontent.com/73036899/209112929-2fbd5c7a-7e76-47b4-9afe-c42dfb6fbdaf.jpg)

Once this parameters are uncommented, the RaspberryPi HDMI will work.

4. Remove the MicroSD Card from the PC and plug it back to the RaspberryPi.  

5. Switch on the RaspberryPi and connect it to any monitor through HDMI.

The RaspberryPi Boot Image should appear on the screen.
![raspi image](https://user-images.githubusercontent.com/73036899/209113233-feecea97-2b17-48fb-a2f4-c921b6c6b6e6.jpg)

Now, the next step will be to configure Raspbian, the operating system of the RaspberryPi. This configuration is easy, choose the language and region you are the most comfortable with and connect it to a Wi-Fi network if possible, this way the Raspberry can update the software to the latest release.

After this is done, the Raspberry will be configured and ready to use. If everything has been done well, the Desktop should be seen.
![captura_desktop](https://user-images.githubusercontent.com/73036899/209117910-1fd5273c-c10f-45d1-92e7-8998244c6cd1.png)

### Install camera
First of all, to make this task easier, unplug the RaspberryPi and go to the config.txt file. Find the parameter camera_auto_detect=1 and uncomment it. This will make the RaspberryPi autodetect the camera without needing additional software or hardware.
![camera](https://user-images.githubusercontent.com/73036899/209114886-27a17085-ee40-46cc-9a0d-370d8bc7ed26.jpg)
  
To test if the camera works, we install a simple camera software called guvcview.
  
For this, open a terminal and execute the following command:
 
  `sudo apt-get update`
  
  `sudo apt-get upgrade`
  
  `sudo apt-get install guvcview`
  
  `sudo usermod -G video pi`
  
  `sudo modprobe uvcvideo`
  
  `reboot`
  
After rebooting the device, a new program should appear in the "sound and video" tab in the main menu called "guvcview".
  
![guvcview](https://user-images.githubusercontent.com/73036899/209123215-1f7f652f-4b16-4c4f-a97e-1c8cff6201fa.png)
  
Open it and the camera should appear automatically
  
![software_camara](https://user-images.githubusercontent.com/73036899/209123307-0df4950a-74ac-4a2f-baf3-dbe4a53c798e.png)

To change the IP address of the raspberry, the configuration file `/etc/dhcpcd.conf` has to be modified so anytime the device is switched on it is configured by default and there is no need to execute any additional lines everytime.

Now, to get the video from the webcam, mjpg streamer must be installed. For this, open a terminal and enter the following commands:

`sudo apt update`

`sudo apt install snapd`

`sudo reboot`

`sudo snap install core`

`sudo snap install mjpg-streamer`

This will install a program that detects USB webcams and also serves as a streaming server.

To start streaming video, a terminal must be opened in the Raspberry to enter the following command:

`mjpg_streamer`

To modify the parameters of the video such as the frame rate, the resolution and the port through which the video will exit the Raspberry, execute the following file that has to be in the folder installed by the `sudo snap install mjpg-streamer` command:

`./start.sh`

The file `start.sh` is in the folder 4-Video-surveillance.

To view the video, the html file that corresponds to the video surveillance must be modified. The line that should be added is the following one:

`<img src="http://192.168.1.2:2500/?action=stream" width="1280" height="768" />`

You should be able to see the video in real time.

### Configure routing in PC gateway
### Configure streaming reception in PC gateway
### Configure streaming reception in PC server
### Improve webpage
### Test system and troubleshooting
When connecting the Raspberry Pi to a PC monitor, it did not work using display port nor VGA, just using a HDMI-HDMI connection between them. In addition, in the 'config.txt' file the screen resolution needs to be changed, accordingly to monitor's resolution, in the parameter hdmi_mode; in our case a resolution of 640x480 was used.
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

## Suggestion box
<details>
<summary>Open to see details</summary>
</details>
