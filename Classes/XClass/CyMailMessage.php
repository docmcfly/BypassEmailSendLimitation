<?php
namespace Cylancer\Bypassemailsendlimitation\XClass;


use Symfony\Component\Mailer\Exception\TransportException;

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
        } catch (TransportException $e) {
            try {
                // The destroying of the transport queue starts the send process...
                $this->mailer->getTransport()->__destruct();
                // after the sending you can try to send your message again.
                parent::send();
            } catch (\Exception $e) {
                $this->sent = false;
            }
        }
        return $this->isSent();
    }
}
