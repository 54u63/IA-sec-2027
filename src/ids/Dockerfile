FROM python:3

WORKDIR /app

COPY ./code/requirements.txt ./

RUN pip install --no-cache-dir -r ./requirements.txt

CMD [ "python", "/app/code/main.py" ]

