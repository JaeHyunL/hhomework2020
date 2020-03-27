# Use an official Python runtime as a parent image

FROM python:3

ADD homework2.py /
LABEL "purpose"="practice"
RUN pip install pystrich

CMD [ "python", "./homework2.py" ]
