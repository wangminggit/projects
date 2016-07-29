<?php



/**
 * This class defines the structure of the 'admin_user_group' table.
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
class AdminUserGroupTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.AdminUserGroupTableMap';

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
		$this->setName('admin_user_group');
		$this->setPhpName('AdminUserGroup');
		$this->setClassname('AdminUserGroup');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 255, null);
		$this->addColumn('IS_SUPER_ADMIN', 'IsSuperAdmin', 'TINYINT', false, 4, null);
		$this->addColumn('IS_FIXED', 'IsFixed', 'TINYINT', false, 4, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'INTEGER', false, 11, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'INTEGER', false, 11, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('AdminItemAdminUserGroupAccess', 'AdminItemAdminUserGroupAccess', RelationMap::ONE_TO_MANY, array('id' => 'admin_user_group_id', ), 'CASCADE', 'CASCADE');
    $this->addRelation('AdminUser', 'AdminUser', RelationMap::ONE_TO_MANY, array('id' => 'admin_user_group_id', ), 'RESTRICT', 'CASCADE');
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
			'symfony_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
		);
	} // getBehaviors()

} // AdminUserGroupTableMap
