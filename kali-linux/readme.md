## Kali linux

### comandos nmap
```sh
# obtenemos la ip de la red: 192.17.0.34
ifconfig
# escaneamos todos los hosts en la red y que so tienen
nmap -O 192.17.0.0/24
# obtener puertos abiertos y servicios en la maquina
nmap -p- -sVC -sC --open -sS -vvv -n -Pn 192.17.0.23
```