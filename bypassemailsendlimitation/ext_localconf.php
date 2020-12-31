<?php
defined('TYPO3_MODE') || die('Access denied.');


$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][TYPO3\CMS\Core\Mail\MailMessage::class] = [
    'className' =>  Cylancer\Bypassemailsendlimitation\XClass\CyMailMessage::class
];



