<?php

/**
 * userManagement actions.
 *
 * @package    KVCET
 * @subpackage userManagement
 * @author     Uday Shankar Singh
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userManagementActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
//    $this->forward('default', 'module');
    }

    //=============================FOR CREATING NEW USER========================
    public function executeNew(sfWebRequest $request) {

        if ($request->isMethod('POST')) {

//            $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
//                    ->setUsername('udayshankar1306@gmail.com')
//                    ->setPassword('Ud@gmail2010');

//            $mailer = Swift_Mailer::newInstance($transport);

            //Create a message
//            $message = Swift_Message::newInstance('Wonderful Subject')
//                    ->setFrom(array('udayshankar1306@gmail.com' => 'Uday Shankar Singh'))
//                    ->setTo(array('usingh@ubicsindia.com', 'usingh@ubicsindia.com' => 'Uday Singh'))
//                    ->setBody('Here is the message itself');

            //Send the message
//            $result = $mailer->send($message);
            $params = $request->getPostParameters();
            
            $assignedDept = DepartmentTable::getInstance()->find($params['user_dept'])->getName();
            $assignedGroup = sfGuardGroupTable::getInstance()->find($params['user_group'])->getDescription();
            
            $siteMail = new siteMails($params['user_name'],$params['user_mail'], $assignedDept, $assignedGroup);
//            $result = $siteMail->getSfMailObject($params);
            print_r("Check Mail for password");
            die;


//            $this->getMailer()->composeAndSend('udayshankar1306@gmail.com', 'usingh@ubicsindia.com', 'Subject', 'Body');
//            print_r('Mail Sent Successfully');
//            die;
        } else {
            $this->collgDept = DepartmentTable::getInstance()->getDepartments();
            $groupTemp = sfGuardGroupTable::getInstance()->getGroups();
            $this->collgGroup = ManageUserTable::getInstance()->getRefinedGroups($groupTemp);
        }
    }

    public function executeEdit() {
        print_r("edit");
        die;
    }

    public function executeList() {
        print_r("list");
        die;
    }

}
