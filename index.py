from datetime import datetime
from sanic import Sanic
from flask import Flask, render_template, request, render_template_string
from flask_mail import Mail, Message
import pandas as pd
import csv
import os

app = Flask(__name__)
# app = Sanic()

# Flask-Mail configuration
app.config['MAIL_SERVER'] = 'smtp.gmail.com'
app.config['MAIL_PORT'] = 465
app.config['MAIL_USERNAME'] = 'carlaheywood24@gmail.com'
app.config['MAIL_PASSWORD'] = os.getenv('EMAIL_SECRET')
app.config['MAIL_USE_TLS'] = False
app.config['MAIL_USE_SSL'] = True
app.config['MAIL_DEFAULT_SENDER'] = ('BulkEmailer.py', 'BulkEmailer.py@noreply.com')

mail = Mail(app)

# Variables for templates
today = datetime.now()
day_name = today.strftime("%A")
current_year = today.year

@app.route('/', methods=['GET', 'POST'])
def index():
    return render_template('index.html', current_year=current_year)

@app.route('/sendBulkEmail', methods=['POST'])
def sendBulkEmail():
    if request.method == 'POST':
        csv_file = request.files.get('csv')
        html_file = request.files.get('html')
        confirmation_email = request.form.get('confirmation_email')
        sent=0

        if csv_file:
            df = pd.read_csv(csv_file)
            emails = df['Email'].tolist()
            sent=len(emails)

            if html_file:
                html_content = html_file.read().decode('utf-8')
            else:
                html_content = "Hello World! default message from BulkEmailer.py"

            for email in emails:
                msg = Message('Hello, Happy ' + day_name + '! from BulkEmailer.py', recipients=[email])
                msg.html = render_template_string(html_content, day_name=day_name, current_year=current_year)
                mail.send(msg)

            # Send confirmation email
            msg = Message("BulkEmailer.py Confirmation // " + str(sent) + " Email(s)", recipients=[confirmation_email])
            msg.body = "BulkEmailer.py Complete.\n\n" + str(sent) + " Emails Sent successfully.\n\n"
            if csv_file:
                msg.attach(csv_file.filename, 'text/csv', csv_file.read())
            if html_file:
                msg.attach(html_file.filename, 'text/html', html_file.read())
            mail.send(msg)

    return render_template('success.html')

@app.route('/send_single_email', methods=['POST'])
def send_single_email():
    email = request.form.get('email')

    msg = Message('Hi there, it\'s Carla!', sender = ('Carla Heywood', 'carlaheywood24@gmail.com'), recipients = [email])
    msg.body = 'Hello, Happy ' + day_name + '! \n\nThank you for checking out my project. \nThis message was sent in ' + current_year + ' from BulkEmailer.py using Flask Mail. \n\nMake it a great day!\ncarlaheywood24@gmail.com"'
    mail.send(msg)

    return render_template('success.html')

# if __name__ == '__main__':
#     app.run(debug=False)
