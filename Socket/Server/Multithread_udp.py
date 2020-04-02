import time
import socket
import random
import string
from threading import Thread

def randomString(stringLength = 5):
    letters = string.ascii_lowercase
    return ''.join(random.choice(letters) for i in range(stringLength))

def f(s, password, b, addr):
    print ("\nReceived from client from address %s" %(addr,))
    client_password = b.decode()
    print("He entered the following password: ", client_password)
    if (client_password == password):
        time.sleep(3)
        s.sendto('Winner!'.encode(), addr)
    else:
        time.sleep(3)
        s.sendto('Loser...'.encode(), addr)

print("I'm the SERVER. I have generated a password. Can you guess it?")
s = socket.socket(socket.AF_INET,socket.SOCK_DGRAM)
s.bind(("192.168.211.1",9999))
password = randomString(5)
print("DEBUG: password is: ", password)

i  = 0
while (1==1):
    i = i + 1
    b, addr = s.recvfrom(1024)
    t=Thread(target=f,args=(s, password, b, addr,))
    t.start()
