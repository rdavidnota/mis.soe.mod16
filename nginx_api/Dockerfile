FROM nginx:alpine AS base

RUN apk update
RUN apk add procps
RUN apk add bash
RUN apk add nano

FROM base as final

COPY ./default.conf /etc/nginx/conf.d/default.conf
COPY ./nginx.conf /etc/nginx/nginx.conf

WORKDIR /var/www
EXPOSE 80
CMD ["nginx", "-g daemon off;"]