import time
import socket
import random
from threading import Thread

def f(lucky, cs,i):
    print ("\nReceived from client with competition number: "+str(i))
    b=cs.recv(1024)
    nr = int(b.decode())
    print("He said it should be: ", nr)
    if (nr == lucky):
        time.sleep(3)
        cs.send('Winner!'.encode())
    else:
        time.sleep(3)
        cs.send('Loser...'.encode())
    cs.close()

print("I'm the SERVER. I have generated a number between 1 and 10. Can you guess it?")
s=socket.socket(socket.AF_INET,socket.SOCK_STREAM)
s.bind(('',12000))
s.listen(5)
lucky = random.randint(1, 10)
i=0
while (1==1):
    i=i+1
    cs,addr=s.accept()
    t=Thread(target=f,args=(lucky, cs,i,))
    t.start()
