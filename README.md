# Service-only Containers
Experimenting with using containers only for services, not for using as VMs.

With this container set I am able to set up a PHPStorm project for this codebase,
use the PHP interpreter from within the PHP-FPM container,
and deploy it to the PHP container via the SFTP container.

## Notes
### SFTP operations
#### Permissions
Due to limitations of how Docker must mount volumes as root, and how SFTP requires non-root users to have RW access,
one needs to go into the `sftp` container and chmod the `/home/sftpUser/upload` directory to `777` (yes) before one
can upload to it. EG:

```shell
docker exec --interactive --tty serviceonlycontainers_sftp_1 /bin/bash
chmod -R 777 /home/sftpUser/upload/
```
#### SSH private keys
The SFTP service requires two private keys to be installed (check `docker/sftp/Dockerfile`). These ought not be 
distributed publically, so are not in this repo. Generate your own key pairs, and stick the private ones in here:

```shell
adam@DESKTOP-QV1A45U:/mnt/c/src/serviceOnlyContainers$ ll docker/sftp/.ssh
total 4
drwxrwxrwx 1 adam adam  512 Mar 20 11:08 ./
drwxrwxrwx 1 adam adam  512 Mar 20 11:07 ../
-rwxrwxrwx 1 adam adam   14 Mar 20 11:06 .gitignore*
-rwxrwxrwx 1 adam adam  411 Mar 19 13:29 ssh_host_ed25519_key*
-rwxrwxrwx 1 adam adam 3389 Mar 19 13:28 ssh_host_rsa_key*
adam@DESKTOP-QV1A45U:/mnt/c/src/serviceOnlyContainers$
```

See instructions @ [`atmoz/sftp`](https://github.com/atmoz/sftp#providing-your-own-ssh-host-key-recommended), 
but to generate the keys use:
```shell
ssh-keygen -t ed25519 -f ssh_host_ed25519_key < /dev/null
ssh-keygen -t rsa -b 4096 -f ssh_host_rsa_key < /dev/null
```
