<?php

/**
 * dashboard actions.
 *
 * @package    KVCET
 * @subpackage dashboard
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dashboardActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        if ($this->getUser()->getGuardUser()->hasGroup('DOP')) {
            $this->setTemplate('dop');
        } else if ($this->getUser()->getGuardUser()->hasGroup('Director')) {
            $this->setTemplate('director');
        } else {
            $this->setTemplate('otherUser');
            /**
             * 
             * Uday Shankar Singh --- COMMENTED TEMPORARY
             * SINGLE USER LOGIN ARE ALREADY CHECKED ABOVE BUT TO MAKE SURE OF THAT
             * I AM CHECKING THAT THE USER IS FROM MULTIPLE USER LOGIN AND IF HE IS THEN
             * THEN
             * IF HE IS IN ANY ONE OF THE ARRAY DEFINED USERS -> REDIRECT THE USER TO 'otherUser' MODULE 
             * ELSE 
             * I AM SENDING THE USER TO 404 PAGE AS THIS IS NEW GROUP USER THAT HAS 
             * NOT BEEN DFINED IN THE ARRAY YET
             */
//            $userGroup = $this->getUser()->getGuardUser()->getGroups()->toArray();
//            if (!in_array($userGroup, array('Student', 'Parent'))) {
//                $this->forward('otherUser', 'index');
//            }
//            else
//                $this->forward404();
        }
    }

    /**
     * @author Uday Shankar Singh <udayshankar1306@gmail.com>
     * 
     * ...TO DO... 
     * ADD THE USER CREATION CODE BELOW SO THAT USER GROUP THAT IS HARD CODE 
     * IN THE 'otherUser' FIXTURE CAN BE REMOVED
     * 
     */
}
