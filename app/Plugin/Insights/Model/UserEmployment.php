<?php
/**
 * Book or Rent
 *
 * PHP version 5
 *
 * @category   PHP
 * @package    BookorRent
 * @subpackage Core
 * @author     Agriya <info@agriya.com>
 * @copyright  2018 Agriya Infoway Private Ltd
 * @license    http://www.agriya.com/ Agriya Infoway Licence
 * @link       http://www.agriya.com
 */
class UserEmployment extends AppModel
{
    public $name = 'UserEmployment';
	public $displayField = 'employment';
	public $actsAs = array(
		'I18n' => array(
            'fields' => array(
                'employment'
            ) ,
            'display' => array(
                'employment'
            ) ,
        )
    );	
    //$validate set in __construct for multi-language support
    //The Associations below have been created with all possible keys, those that are not needed can be removed
    public $hasMany = array(
        'UserProfile' => array(
            'className' => 'UserProfile',
            'foreignKey' => 'user_employment_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );
    function __construct($id = false, $table = null, $ds = null)
    {
        parent::__construct($id, $table, $ds);
		$this->_permanentCacheAssociations = array(
			'UserProfile',
		);
        $this->validate = array(
            'employment' => array(
                'rule' => 'notempty',
                'allowEmpty' => false,
                'message' => __l('Required')
            ),
 			'employment_es' => array(
                'rule' => 'notempty',
                'allowEmpty' => false,
                'message' => __l('Required')
             )
        );
        $this->moreActions = array(
			ConstMoreAction::Active => __l('Enable') ,
            ConstMoreAction::Inactive => __l('Disable') ,
            ConstMoreAction::Delete => __l('Delete') ,
        );
    }
}
?>