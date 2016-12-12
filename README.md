# Magento Module Experius Email Catcher

Email Catcher / Logger Module for Magento 1. 

This module logs all email traffic from Magento, this includes mail with or without template. The module does not stop the email from being sent, it is only logged.
Email that is sent when SMTP is disabled ("system/smtp/disable" is true) can also be logged, this is configurable.

Available configuration (System > Configuration > Experius > Email catcher):
-	Enabled (Yes/No)
-	Ignore mail disabled setting (Yes/No)

"Caught" mail can be viewed at:
System > Tools > Email Catcher

This includes the option to view the formatted email body.
