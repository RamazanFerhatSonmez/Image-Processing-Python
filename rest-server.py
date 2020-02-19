# -*- coding: utf-8 -*-
"""
Created on Tue Feb 18 10:01:52 2020

@author: Ferhat
"""

from flask import Flask, jsonify, json, Response,make_response,request
from flask_cors import CORS
# =============================================================================
# from flask_cors import  cross_origin
# =============================================================================
import numpy as np
import cv2 
#from flask.ext.httpauth import HTTPBasicAuth
# =============================================================================
# from luminoso_api import LuminosoClient
# from luminoso_api.errors import LuminosoError, LuminosoClientError
# from luminoso_api.json_stream import open_json_or_csv_somehow
# from werkzeug.datastructures import ImmutableMultiDict
# =============================================================================
import logging
import random
app = Flask(__name__, static_url_path = "")
CORS(app)
file_handler = logging.FileHandler('app.log')
app.logger.addHandler(file_handler)
app.logger.setLevel(logging.INFO)

logger = logging.getLogger(__name__)
logging.basicConfig(level=logging.INFO)
def return_img(new_img,name):
    random_value = random.randrange(1000) 
    path1 ='newImage'+str(random_value)+'.png'
    path2 = 'C:/xampp/htdocs/python/'+path1
    cv2.imwrite(path2,new_img)
    data = {
        'imgNew'  : path1,
        'desc'    : name
    }
    return data

def convol(img):
    kernel = np.ones((5,5),np.float32)/25
    dst = cv2.filter2D(img,-1,kernel)
    return return_img(dst,"Convolution")
    
def averaging(img):
    blur = cv2.blur(img,(5,5))
    return return_img(blur,"Averaging") 

def gaus_filter(img):
    blur = cv2.GaussianBlur(img,(5,5),0)
    return return_img(blur,"Gaussian Filtering")         
            
def   median(img):
    median = cv2.medianBlur(img,5)
    return return_img(median,"Median Filtering")              

def bilateral(img):
    blur = cv2.bilateralFilter(img,9,75,75)
    return return_img(blur,"Bilateral Filtering")         

def binary(img):
    ret,thresh_binary = cv2.threshold(img,127,255,cv2.THRESH_BINARY)
    return return_img(thresh_binary,"THRESH_BINARY ")                     

def binary_inv(img):
    ret,thresh_binary_inv= cv2.threshold(img,127,255,cv2.THRESH_BINARY_INV)
    return return_img(thresh_binary_inv,"THRESH Binary Inv")
                            
def tozero(img):
    ret,thresh_tozero = cv2.threshold(img,127,255,cv2.THRESH_TOZERO)
    return return_img(thresh_tozero,"THRESH Tozero")                             

def trunc(img):
    ret,thresh_trunc = cv2.threshold(img,127,255,cv2.THRESH_TRUNC)
    return return_img(thresh_trunc,"THRESH Trunc")                                 

def trunc_inv(img):
   ret,thresh_trunc_inv = cv2.threshold(img,127,255,cv2.THRESH_TOZERO_INV)
   return return_img(thresh_trunc_inv,"THRESH Tozero Inv")   
@app.errorhandler(400)
def not_found(error):
    app.logger.error('Bad Request - 400')
    return make_response(jsonify( { 'error': 'Bad request' } ), 400)

@app.route('/image_process', methods = ['GET','POST'])
def get_test():
    img_Path = request.args.get('img_path') 
    img_type = request.args.get('img_type')
    image = cv2.imread(img_Path,0)
    if img_type == "convol":
        data = convol(image)
    elif img_type == "averaging":
        data = averaging(image)
    elif img_type == "gaus_filter":
        data = gaus_filter(image)
    elif img_type == "median":
        data = median(image)
    elif img_type == "bilateral":
        data = bilateral(image)
    elif img_type == "binary":
        data = binary(image)
    elif img_type == "binary_inv":
        data = binary_inv(image)
    elif img_type == "trunc":
        data = trunc(image)
    elif img_type == "tozero":
        data = tozero(image)
    elif img_type == "trunc_inv":
        data = trunc_inv(image)  
    else:
        data = return_img(image,"No Image")
    js = json.dumps(data)    
    resp = Response(js, status=200, mimetype='application/json')
    resp.headers['Link'] = 'https://localhost/python/'
    return resp    
    
#    return "ECHO: GET\n"
if __name__ == "__main__":
 app.run(debug=True)    
