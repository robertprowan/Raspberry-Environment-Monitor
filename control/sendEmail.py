# usage: python sendEmail.py [subject] [message]

import sys
import os
import smtplib

emailSubject = sys.argv[1]
emailMessage = sys.argv[2]

from ConfigParser import SafeConfigParser
parser = SafeConfigParser()
parser.read('../app.ini')
smtpServer = parser.get('global', 'smtpServer')
smtpUser = parser.get('global', 'smtpUser')
smtpPassword = parser.get('global', 'smtpPassword')
smtpTo = parser.get('global', 'smtpTo')
smtpFrom = parser.get('global', 'smtpFrom')

message = "From: " + smtpFrom + "\nTo: " + smtpTo
message += """ 
MIME-Version: 1.0
content-type: text/html
Subject: """
message += emailSubject
message += "\n\n"
message += emailMessage

try:
	smtpObj = smtplib.SMTP(smtpServer,587)
	smtpObj.ehlo()
	smtpObj.starttls()
	smtpObj.ehlo()
	smtpObj.login(smtpUser, smtpPassword)
	smtpObj.sendmail(smtpFrom, smtpTo, message)
	print "Sent"
except:
	print "Failed"
