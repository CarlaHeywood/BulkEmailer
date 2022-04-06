# BulkEmailer

BulkEmailer is a simplified email blaster. Log in with your Gmail account, choose the email template you would like to send out, then upload your email list. Sending hunrededs of emails without ending up in the junk folder made quick and easy. 

## Running

Running a simple local HTTP server. 

```bash
python3 -m http.server
```
Access index.html in browser using http://127.0.0.1:8000/

```bash
pip install -r requirements.txt
python emailer.py
```
Confirm results in browser using http://127.0.0.1:5000/

## Contributing
 A worker of mine, Justin, inspired me to get this project going. He had the idea to send out emails to our clients using the BCC feature on Gmail. I tried this for some emails and found that this method is ineffective. Mostly showing up in the junk folder or getting blocked due to hidden recipents. There are similar paid services for this like MailChimp and Constant Contact, but I knew I could devlop something simple and tailored to our needs. Here is the extremely simple email blaster, BulkEmailer - Developed by Carla Heywood. 

 Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

 Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)