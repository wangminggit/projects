<?php



/**
 * This class defines the structure of the 'admin_item_admin_user_group_access' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class AdminItemAdminUserGroupAccessTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.AdminItemAdminUserGroupAccessTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('admin_item_admin_user_group_access');
		$this->setPhpName('AdminItemAdminUserGroupAccess');
		$this->setClassname('AdminItemAdminUserGroupAccess');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('ADMIN_ITEM_ID', 'AdminItemId', 'INTEGER' , 'admin_item', 'ID', true, 11, null);
		$this->addForeignPrimaryKey('ADMIN_USER_GROUP_ID', 'AdminUserGroupId', 'INTEGER' , 'admin_user_group', 'ID', true, 11, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'INTEGER', false, 11, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('AdminItem', 'AdminItem', RelationMap::MANY_TO_ONE, array('admin_item_id' => 'id', ), 'CASCADE', 'CASCADE');
    $this->addRelation('AdminUserGroup', 'AdminUserGroup', RelationMap::MANY_TO_ONE, array('admin_user_group_id' => 'id', ), 'CASCADE', 'CASCADE');
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
			'symfony_timestampable' => array('create_column' => 'created_at', ),
		);
	} // getBehaviors()

} // AdminItemAdminUserGroupAccessTableMap
