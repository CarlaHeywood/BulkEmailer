# BulkEmailer.py

BulkEmailer.py is a simplified email blaster. Enter your Gmail, upload the email template you would like to send out, then upload your CSV email list. Sending hunrededs of emails without ending up in the junk folder made quick and easy.

<a href="http://3.84.164.56:5001/">Demo Link</a>

<img src="https://raw.githubusercontent.com/CarlaHeywood/BulkEmailer/main/static/Screenshot.png" width="100%">

## Set up

Confirgure Flask-Mail:
Create an app specific password to login - use the option Other(Custom Name).
Paste in this password with your username in the code.
https://myaccount.google.com/apppasswords

## Running

```bash
pip install -r requirements.txt
virtualenv venv
source venv/bin/activate
python bulkemailer.py
```

Confirm results in browser using http://127.0.0.1:5000/

## Contributing

A coworker of mine, Justin, inspired me to get this project going. He had the idea to send out emails to our clients using the BCC feature on Gmail. I tried this for some emails and found that this method is ineffective. Mostly showing up in the junk folder or getting blocked due to hidden recipents. There are similar paid services for this like MailChimp and Constant Contact, but I knew I could devlop something simple and tailored to our needs. Here is the extremely simple email blaster, BulkEmailer.py - Developed by Carla Heywood.

## License

[MIT](https://choosealicense.com/licenses/mit/)
