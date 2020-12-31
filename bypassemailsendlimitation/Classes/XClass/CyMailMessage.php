<?php
namespace Cylancer\Bypassemailsendlimitation\XClass;


/**
 * Extension Bypass email send limitation
 */
class CyMailMessage extends \TYPO3\CMS\Core\Mail\MailMessage
{

    /**
     * @Override 
     * @return bool whether the message was accepted or not
     */
    public function send(): bool
    {
        try {
            parent::send();
        } catch (\Exception $e) {
            try {
                $this->mailer->getTransport()->__destruct();
                parent::send();
            } catch (\Exception $e) {
                $this->sent = false;
            }
        }
        return $this->isSent();
    }
}
