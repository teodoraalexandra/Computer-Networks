import socket

s=socket.socket(socket.AF_INET,socket.SOCK_STREAM)
s.bind(("192.168.211.1",9999))
s.listen(5)
cs,addr=s.accept()

arrSize=cs.recv(4)
int_size = int(arrSize)
sum = 0

while (int_size > 0):
    number = cs.recv(4)
    sum += int(number)
    int_size -= 1

cs.send(str(sum).encode()) 
cs.close()
