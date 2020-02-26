# -*- coding: utf-8 -*-
"""
Created on Fri Feb 21 11:32:53 2020

@author: Ferhat
"""
import numpy as np
import cv2
from matplotlib import pyplot as plt
from skimage.feature import peak_local_max
from skimage.morphology import watershed
from scipy import ndimage
import argparse
import imutils
# =============================================================================
# 
# =============================================================================
img = cv2.imread('C:/Users/Ferhat/Desktop/img3.jpg')
shifted = cv2.pyrMeanShiftFiltering(img, 1, 51)
# =============================================================================
# shifted = cv2.pyrMeanShiftFiltering(img, 21, 51) 122
#shifted = cv2.pyrMeanShiftFiltering(img, 9, 51)  
# =============================================================================
gray = cv2.cvtColor(shifted, cv2.COLOR_BGR2GRAY)
thresh = cv2.threshold(gray, 0, 255,
	cv2.THRESH_BINARY | cv2.THRESH_OTSU)[1]
D = ndimage.distance_transform_edt(thresh)
localMax = peak_local_max(D, indices=False, min_distance=3,
	labels=thresh)
markers = ndimage.label(localMax, structure=np.ones((3, 3)))[0]
labels = watershed(-D, markers, mask=thresh)
print("[INFO] {} unique segments found".format(len(np.unique(labels)) - 1))
for label in np.unique(labels):
	if label == 0:
		continue
	mask = np.zeros(gray.shape, dtype="uint8")
	mask[labels == label] = 255

	cnts = cv2.findContours(mask.copy(), cv2.RETR_EXTERNAL,
		cv2.CHAIN_APPROX_SIMPLE)
	cnts = imutils.grab_contours(cnts)
	c = max(cnts, key=cv2.contourArea)

	((x, y), _) = cv2.minEnclosingCircle(c)
# =============================================================================
# 	cv2.putText(img, "#{}".format(label), (int(x) - 10, int(y)),
# 		cv2.FONT_HERSHEY_SIMPLEX, 0.6, (0, 0, 255), 2)
# =============================================================================
	cv2.drawContours(img, [c], -1, (0, 255, 0), 1)
cv2.imwrite('C:/Users/Ferhat/Desktop/watershed4.jpg',img)
cv2.imwrite('C:/Users/Ferhat/Desktop/watershed_thresh2.jpg',thresh)