FROM php:7.2.0RC4-zts
MAINTAINER Takuya Sawada <takuya@tuntunkun.com>

ARG PTHREADS_GIT="https://github.com/krakjoe/pthreads"
ARG PTHREADS_REV="6c6b15138c923b69cfa46ee05fc2dd45da587287"

ARG PMMP_GIT="https://github.com/pmmp/PocketMine-MP"

RUN apt-get -y update && apt-get -y upgrade && \
	apt-get -y install git libyaml-dev zlib1g-dev

RUN git clone "${PTHREADS_GIT}" /usr/local/src/pthreads && \
	cd /usr/local/src/pthreads && \
	git checkout "${PTHREADS_REV}" && \
	phpize && \
	./configure && \
	make && \
	make install

RUN docker-php-ext-enable pthreads
RUN docker-php-ext-install bcmath sockets zip

RUN pecl install yaml
RUN docker-php-ext-enable yaml

RUN useradd -r -d /opt/pmmp pmmp
RUN install -d -o pmmp -g pmmp /opt/pmmp
USER pmmp:pmmp

RUN git clone "${PMMP_GIT}" /opt/pmmp/PocketMine-MP && \
	cd /opt/pmmp/PocketMine-MP && \
	git submodule init && \
	git submodule update && \
	curl -sS https://getcomposer.org/installer | php && \
	php composer.phar install && \
	mkdir plugins

WORKDIR /opt/pmmp/PocketMine-MP

EXPOSE 19132
EXPOSE 25565

ENTRYPOINT ["./start.sh"]
CMD ["--no-wizard"]
