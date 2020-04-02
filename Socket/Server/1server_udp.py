import socket
s=socket.socket(socket.AF_INET,socket.SOCK_DGRAM)  
s.bind(("192.168.211.1",9999))

sum=0
size,addr=s.recvfrom(10)
int_size=int(size)
while (int_size > 0):
    number = s.recv(10)
    sum += int(number)
    int_size -= 1

s.sendto(str(sum).encode(), addr) 
