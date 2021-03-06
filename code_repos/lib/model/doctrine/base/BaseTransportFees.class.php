<?php

/**
 * BaseTransportFees
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $route_name
 * @property integer $amount
 * @property integer $year
 * 
 * @method string        getRouteName()  Returns the current record's "route_name" value
 * @method integer       getAmount()     Returns the current record's "amount" value
 * @method integer       getYear()       Returns the current record's "year" value
 * @method TransportFees setRouteName()  Sets the current record's "route_name" value
 * @method TransportFees setAmount()     Sets the current record's "amount" value
 * @method TransportFees setYear()       Sets the current record's "year" value
 * 
 * @package    KVCET
 * @subpackage model
 * @author     Natu
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTransportFees extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('transport_fees');
        $this->hasColumn('route_name', 'string', 256, array(
             'type' => 'string',
             'length' => 256,
             ));
        $this->hasColumn('amount', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('year', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $softdelete0 = new Doctrine_Template_SoftDelete(array(
             ));
        $this->actAs($timestampable0);
        $this->actAs($softdelete0);
    }
}