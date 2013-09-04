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

        $tempData = $this->getDeptAndGroup();
        $this->collgDept = $tempData['collgDept'];
        $this->collgGroup = $tempData['collgGroup'];

        if ($request->isMethod('POST')) {

            $passGeneratedObj = new clsCommon();
            $passGenerated = $passGeneratedObj->getPasswordString();

            $params = $request->getPostParameters();

            //==================CHECKING USER EMAIL FOR EXSISTANCE==============
            $userExsistance = sfGuardUserTable::getInstance()->checkUserExsistance($params);
            if ($userExsistance == 1) {
                $this->getUser()->setFlash('errorMsg', 'Username already exsists. Kindly choose another username', true);
                $this->redirect("@create_user");
            } else {
                //=======================SAVING USER RECORD=========================
                $status = sfGuardUserTable::getInstance()->saveUserData($params, $passGenerated);
                $this->forward404If($status == FALSE); // FORWARDING IF USER NOT SAVED IN sfGuardUser
                //======================GETTING THE DEPT AND GROUP NAME=============
                $assignedDept = DepartmentTable::getInstance()->find($params['user_dept'])->getName();
                $assignedGroup = sfGuardGroupTable::getInstance()->find($params['user_group'])->getDescription();
                $userFullName = $params['first_name'] . " " . $params['last_name'];
                //==================================================================
                //=====CALLING THE CONSTRUCTOR OF THE MAIL CLASS AND FIRING MAIL====
                new siteMails($params['user_name'], $params['user_mail'], $assignedDept, $assignedGroup, $passGenerated, $userFullName);

                //==========SETTING THE FLASH MESSAGE FOR INFORMING THE USER========
                $this->getUser()->setFlash("successMsg", "User Created Successfully and a mail along with user creadentials has been sent to " . $params['user_mail'], true);
                $this->redirect('@create_user'); // THIS REDIRECT IS NECESSARY ELSE IF USER PRESS F5 POST WILL HAPPEN AGAIN SO TO MAKE SURE IT'S NOT POST I AM REDIRECTING THE USER AGAIN TO SAME PAGE
            }
        }
    }

    public function executeList(sfWebRequest $request) {

        $pagination = new zebra_pagination();
        $pagination->navigation_position(isset($_GET['navigation_position']) && in_array($_GET['navigation_position'], array('left', 'right')) ? $_GET['navigation_position'] : 'outside');
        
        $records_per_page = 3;
        $this->offset = ($pagination->get_page() - 1) * $records_per_page;
        
        $userListTemp = sfGuardUserTable::getInstance()->getAllUsers($this->offset, $records_per_page);
        $this->userList = $userListTemp['userList'];
        $totalRecords = $userListTemp['totalRecords'];

        $pagination->records($totalRecords);
        $pagination->records_per_page($records_per_page);
        $this->pagination = $pagination;
    }

    public function executeDelete(sfWebRequest $request) {
        $id = $request->getParameter('id');
        sfGuardUserTable::getInstance()->deleteUser($id);

        $this->getUser()->setFlash('successMsg', 'Record Deleted Successfully.');
        $this->redirect('@view_user');
    }

    /**
     *  THIS FUNCTION WILL BE CALLED FROM ALL THE FUNCTION OF THIS CLASS
     *  SO CREATED SEPERATLY TO AVOID CODE REPLICATION
     * @return Array - Dept and Group Options and Values Array for form Creation
     */
    public function getDeptAndGroup() {
        $dataArr = Array();
        $dataArr['collgDept'] = DepartmentTable::getInstance()->getDepartments();
        $groupTemp = sfGuardGroupTable::getInstance()->getGroups();
        $dataArr['collgGroup'] = sfGuardUserTable::getInstance()->getRefinedGroups($groupTemp);

        return $dataArr;
    }

}
