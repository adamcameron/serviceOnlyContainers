FROM atmoz/sftp
COPY ./root_home/.bashrc /root/.bashrc
COPY ./root_home/.vimrc /root/.vimrc
COPY ./.ssh/ssh_host_ed25519_key /etc/ssh/ssh_host_ed25519_key
COPY ./.ssh/ssh_host_rsa_key /etc/ssh/ssh_host_rsa_key
RUN chmod 600 /etc/ssh/ssh_host_ed25519_key
RUN chmod 600 /etc/ssh/ssh_host_rsa_key
RUN mkdir -p /home/sftpUser/upload && chmod -R 777 /home/sftpUser/upload
COPY ./sftp.d/fix_owner /etc/sftp.d/fix_owner
RUN chmod +x /etc/sftp.d/fix_owner

EXPOSE 22
