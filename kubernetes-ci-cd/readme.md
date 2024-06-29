- [Pelado Nerd - Kubernetes CI/CD](https://youtu.be/IdOO3R_1F08)
- [Repo hola docker](https://github.com/pablokbs/hola-docker/blob/master/index.html)
- [Imagen hola docker](https://hub.docker.com/r/pablokbs/hola-docker/tags)

### digital-ocean
- config ssh:
  - https://cloud.digitalocean.com/account/security?i=ffc36b
  - https://docs.digitalocean.com/products/droplets/how-to/connect-with-ssh/openssh/
  - comprobar si la instancia acepta ssh
  ```
  grep PubkeyAuthentication /etc/ssh/sshd_config
  ssh-keygen -t ed25519 -b 4096 -C "root@139.59.123.45" -f my-digocean
  
  chmod 700 ~/.ssh; chmod 600 ~/.ssh/authorized_keys
  ```
  - comandos de instancia
  ```
  reboot
  reboot -f
  ```