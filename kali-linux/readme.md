## Kali linux

- [El Pingüino - Kali Linux](https://www.youtube.com/watch?v=5gUdLWph2s4)
- [Repo original](https://github.com/Maalfer/Dockerfile_Hacking/blob/main/Dockerfile)

### comandos nmap
```sh
# obtenemos la ip de la red: 192.17.0.34
ifconfig
# escaneamos todos los hosts en la red y que so tienen
nmap -O 192.17.0.0/24
# obtener puertos abiertos y servicios en la maquina
nmap -p- -sVC -sC --open -sS -vvv -n -Pn 192.17.0.23
```

### errores
- [https://hub.docker.com/r/kalilinux/kali-rolling](https://hub.docker.com/r/kalilinux/kali-rolling)
- apt -y install kali-linux-large da error: `Errors were encountered while processing: 1597.9  console-setup`
