import RPi.GPIO as GPIO
import REMemail
import time


GPIO.setmode(GPIO.BCM)
GPIO.setup(17,GPIO.OUT)
GPIO.setup(18,GPIO.IN) 

GPIO.output(17,False)
print(GPIO.input(18))

moisture = False
spamstop = False
startimer = time.time()
while True:
	if(GPIO.input(18) == 1):
		moisture = True
		startimer = time.time()
		GPIO.output(17,True)
		file = open("status", "w")
		file.write("Wet")
		file.close()
		if(moisture == False):
			file = open("../log/rem.log", "a")
			file.write(time.ctime() + " Moisture detected\n")
			file.close()
		if(spamstop == False):
			REMemail.send("Water leak detected","Emergency! Water leak detected in your home!")
			file = open("../log/rem.log", "a")
			file.write(time.ctime() + " Email sent\n")
			file.close()
			spamstop = True
	if(GPIO.input(18) == 0):
		GPIO.output(17,False)
		file = open("status", "w")
		file.write("Dry")
		file.close()
		if(moisture):
			file = open("../log/rem.log", "a")
			file.write(time.ctime() + " Moisture no longer detected\n")
			file.close()
			moisture = False
	if(spamstop):
		elapsed = time.time() - startimer
		if(elapsed > 60):
			spamstop = False
	time.sleep(1)
