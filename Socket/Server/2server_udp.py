import socket

#create
s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)

#bind
s.bind(("192.168.211.1", 9999))

#receive
string, addr = s.recvfrom(1024)
decodat = string.decode()
nr = decodat.count(' ')

#send
s.sendto(str(nr).encode(), addr)
