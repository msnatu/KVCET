<?php

/**
 * otherUser actions.
 *
 * @package    KVCET
 * @subpackage otherUser
 * @author     Natu
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class otherUserActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->setTemplate('director'); // THIS WILL BE REPLACED WITH THE MORE ACCURATE TEMPLATE ONCE TEMPLATE IS COMPLETE
//        $this->forward('default', 'module');
    }

}
