from flask import Flask
from flask_mail import Mail, Message

app = Flask(__name__)
mail= Mail(app)

app.config['MAIL_SERVER']='smtp.gmail.com'
app.config['MAIL_PORT'] = 465
app.config['MAIL_USERNAME'] = 'carlaheywood24@gmail.com'
app.config['MAIL_PASSWORD'] = 'gujeereallpmdqev'
app.config['MAIL_USE_TLS'] = False
app.config['MAIL_USE_SSL'] = True
mail = Mail(app)

@app.route("/")
def index():
   msg = Message('BulkEmailer', sender = 'carlaheywood@gmail.com', recipients = ['carlaheywood24@gmail.com','carla.heywood@gefinance.com'])
   msg.body = "Hello message sent from BulkEmailer!"
   mail.send(msg)
   return "Sent"

if __name__ == '__main__':
   app.run(debug = True)

app.run(debug=True)