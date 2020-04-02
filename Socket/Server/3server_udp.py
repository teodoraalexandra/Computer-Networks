#create
import socket
s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)

#bind
s.bind(("192.168.211.1",9999))

#recv
sentence, addr = s.recvfrom(1024)
reverse = sentence[::-1]

#send
s.sendto(reverse, addr)
