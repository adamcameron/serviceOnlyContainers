FROM nginx:alpine
WORKDIR /usr/share/nginx/
ENV ENV=/root/.profile
COPY ./root_home/.profile /root/.profile
COPY ./root_home/.vimrc /root/.vimrc
COPY ./nginx.conf /etc/nginx/nginx.conf
COPY ./fastcgi_params /etc/nginx/fastcgi_params
COPY ./sites/ /etc/nginx/sites-available
COPY ./conf.d/ /etc/nginx/conf.d
CMD ["nginx"]
EXPOSE 80
