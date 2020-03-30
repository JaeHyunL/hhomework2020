#파이썬 이미지를 사용할 예정 
FROM python:3
#현재 디렉토리 의 내용을 추가함 
ADD ./ /
WORKDIR /

#필요한 모듈들을 requirements.txt 에 정의한후 안에 내용을 pip install함 
RUN pip install -r requirements.txt
RUN apt-get update
#도커 슬랙 연동 확인 테스팅 인위적 변경사항 .. 
#포트는 5000번 포트를 사용함 
EXPOSE 5000

#커맨드 창에서 현재 디렉토리에있는 homework2를 파이썬 명령으로 실행함
CMD [ "python", "./homework2.py" ]


