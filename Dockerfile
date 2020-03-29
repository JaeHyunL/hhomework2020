# Use an official Python runtime as a parent image

FROM python:3

ADD ./ /
LABEL "purpose"="practice"
RUN apt-get update
RUN apt-get install -y nginx

RUN pip install -r requirements.txt

EXPOSE 5000

CMD [ "python", "./homework2.py" ]
