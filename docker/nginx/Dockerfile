FROM nginx:alpine
WORKDIR /usr/share/nginx/
ENV ENV=/root/.profile
COPY ./nginx.conf /etc/nginx/nginx.conf
COPY ./fastcgi_params /etc/nginx/fastcgi_params
COPY ./sites/ /etc/nginx/sites-available
COPY ./conf.d/ /etc/nginx/conf.d
RUN mkdir -p /usr/share/serviceOnlyContainers/public
RUN ln -s /usr/share/serviceOnlyContainers/public /usr/share/nginx/html
CMD ["nginx"]
EXPOSE 80
