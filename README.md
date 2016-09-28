# Raspberry-Pi-3-WiFi-Setup

WiFi connection setup by accessing to main page of Raspberry Pi 3 in softAP mode.

<b>Useful links:</b>

Setup serial console:
 - http://www.briandorey.com/post/Raspberry-Pi-3-UART-Boot-Overlay-Part-Two (looks for steps after 18 March 2016)

Setup WiFi Access Point:
 - https://frillip.com/using-your-raspberry-pi-3-as-a-wifi-access-point-with-hostapd/
 - https://www.raspberrypi.org/forums/viewtopic.php?f=36&t=138730

Setup Apache2 Web server:
 - https://www.raspberrypi.org/documentation/remote-access/web-server/apache.md
 - http://www.instructables.com/id/Turning-your-Raspberry-Pi-into-a-personal-web-serv/step5/Installing-Apache/

<b>Important step:</b>

Linux has strict permission for users to access files.

  - edit /etc/sudoers
  - add www-data ALL=NOPASSWD : ALL

to grant permission for web server to execute script files when user visits the page.
