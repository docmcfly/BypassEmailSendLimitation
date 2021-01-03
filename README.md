# Bypass email send limitation
With this extension you can bypass the send limit if the hoster allows only a certain number of mail per SMTP session.


## Background
### english
My web host has introduced a limit for sending emails. From now on you can only send 20 mails per SMTP session. 

The Symfony framework used in Typo3 throws a TransportException when the mail server reports: `451 mails per session limit exceeded.` 

What e.g. Powermail does not catch and believes everything would be ok. 

This extension overwrites the class TYPO3\CMS\Core\MailMailMessage via the XClass mechanism. After that the mail queue is closed in case of an exception. This triggers a sending of the existing emails. After that the mail will be tried again. If there is another exception for the same email, the send method is terminated with a false. 

### deutsch
Mein Webhoster hat eine Limitierung für das Versenden von E-Mails eingeführt. Ab sofort kann man nur 20 Mails pro SMTP-Session versenden. 

Das im Typo3 verwendete Symfony-Framework wirft eine TransportException, wenn der Mailserver meldet: `451 mails per session limit exceeded.`

Was bspw. Powermail nicht abfängt und glaubt alles wäre in Ordnung. 

Diese Erweiterung überschreibt über den XClass-Mechanismus die Klasse TYPO3\CMS\Core\Mail\MailMessage. Danach wird bei einer Exception die Mail-Queue geschlossen. Dieses löst ein Versenden der bestehenden E-Mails aus. Danach wird noch einmal versucht die Mail zu versenden. Bei einer nochmaligen Exception bei der gleichen E-Mail wird der sende-Methode mit einem false beendet. 
