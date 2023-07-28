FROM python:3

WORKDIR /var/www/BulkEmailer

COPY requirements.txt ./
RUN pip install --no-cache-dir -r requirements.txt

COPY . .

CMD [ "python", "./bulkemailer.py" ]