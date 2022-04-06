import os.path
import pkgutil
import shutil
import tempfile
import argparse
import importlib
from base64 import b85decode


from flask import Flask

app = Flask(__name__)

@app.route("/")
def hello_world():
    return "<p>Hello, World!</p>"

function fileUploader(){
    alert('Hello World!')
    # from flask import Flask,render_template,request
    # from werkzeug import secure_filename
    
    # @app.route('/form')
    # def form():
    #     return render_template('form.html')
    
    # @app.route('/uploads', methods = ['POST', 'GET'])
    # def upload():
    #     if request.method == 'POST':
    #         f = request.files['file']
    #         f.save(secure_filename(f.filename))
    
    # app.run(host='localhost', port=5000)
}
