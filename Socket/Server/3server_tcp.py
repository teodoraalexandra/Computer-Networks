#create
import socket
s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

#bind
s.bind(("192.168.211.1",9999))

#listen
s.listen(5)

#accept
cs, addr = s.accept()

#recv
sentence = cs.recv(1024)
reverse = sentence[::-1]

#send
cs.send(reverse)
cs.close()
