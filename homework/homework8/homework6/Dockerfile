#파이썬 이미지를 사용할 예정 
FROM python:3
 

#현재 디렉토리 의 내용을 추가함 
ADD ./ /
WORKDIR ./

# Add files.
#ADD haproxy.cfg /etc/haproxy/haproxy.cfg
#ADD start.bash /haproxy-start

# Define mountable directories.

# Define working directory.

# Define default command.
#CMD ["bash", "/haproxy-start"]

#필요한 모듈들을 requirements.txt 에 정의한후 안에 내용을 pip install함 
RUN pip install flask pymysql requests flask_restplus Flask-Bcrypt cffi cryptography Werkzeug==0.16.1 flask_jwt_extended redis boto3
#도커 슬랙 연동 확인 테스팅 인위적 변경사항 .. 

#RUN mkdir /etc/haproxy

#ADD ./haproxy.cfg /etc/haproxy/haproxy.cfg
#ADD start.bash /haproxy-start

 #Define mountable directories.
#VOLUME ["/haproxy-override"]

# Define working directory.
#WORKDIR /etc/haproxy

# Define default command.
#CMD ["bash", "/haproxy-start"]
RUN mv /entrypoint.sh /uwsgi-nginx-entrypoint.sh
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh


#COPY ./haproxy.cfg /etc/haproxy/haproxy.cfg

#CMD service rsyslog start && haproxy -f /etc/haproxy/haproxy.cfg && tail -F /var/log/haproxy.log
#CMD ["python","python", "setup.py", "install"]

#포트는 5000번 포트를 사용함 
#EXPOSE 80
#ADD ./ /
#WORKDIR ./
#커맨드 창에서 현재 디렉토리에있는 homework2를 파이썬 명령으로 실행함
CMD [ "python", "./main.py" ]


