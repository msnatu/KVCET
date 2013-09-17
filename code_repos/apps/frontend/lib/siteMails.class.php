<?php

/**
 * CONTAINS ALL THE MAIL FUNCITONALITY OF KVCET
 *
 * @author Uday Shankar Singh <udayshankar1306@gmail.com>
 * 
 */
class siteMails {

    private $UserName;
    private $UserMail;
    private $UserDept;
    private $UserGroup;
    private $PassWord;
    private $UserFullName;

    public function __construct($newuserName, $newUserMail, $userDept, $userGroup, $passWord, $userFullName) {
        $this->getSfMailObject($newuserName, $newUserMail, $userDept, $userGroup, $passWord, $userFullName);
    }

    public function getSfMailObject($newuserName, $newUserMail, $userDept, $userGroup, $passWord, $userFullName) {
        $this->UserName = $newuserName;
        $this->UserMail = $newUserMail;
        $this->UserDept = $userDept;
        $this->UserGroup = $userGroup;
        $this->PassWord = $passWord;
        $this->UserFullName = $userFullName;

        $transport = Swift_SmtpTransport::newInstance();

        $mailer = Swift_Mailer::newInstance($transport);

        $mailBody = $this->mailHtml();

        $message = Swift_Message::newInstance('New User Created')
                ->setFrom(array('noreply.kvcet@gmail.com' => 'KVCET'))
                ->setTo(array($this->UserMail => $this->UserName))
                ->setBody($mailBody, 'text/html');

        $mailer->send($message);
    }

    public function mailHtml() {
        $html = "<div style='font-size: 15px;'>
        <p>Welcome " . $this->UserFullName . "!</p>
        <p>You are now a " . $this->UserGroup . " of " . $this->UserDept . " Department.</p>
        <p>Your credentials for KVCET online are as follows:</p>
        <p>Username: " . $this->UserMail . "</p>
        <p>Password: " . $this->PassWord . "</p>
        <p>Wish you a great future with us.</p>
        </div>
        <div style='background-color: #031E34;
             color: #FFFFFF;
             font-size: 16px;
             padding: 30px 0;
             text-align: center;'>
            © 2013 All rights reserved, KVCET
        </div>
        <div style ='background-color: #335166;height: 10px'></div>";

        return $html;
    }

}