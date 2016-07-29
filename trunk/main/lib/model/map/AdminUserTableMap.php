<?php



/**
 * This class defines the structure of the 'admin_user' table.
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
class AdminUserTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.AdminUserTableMap';

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
		$this->setName('admin_user');
		$this->setPhpName('AdminUser');
		$this->setClassname('AdminUser');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11, null);
		$this->addForeignKey('ADMIN_USER_GROUP_ID', 'AdminUserGroupId', 'INTEGER', 'admin_user_group', 'ID', false, 11, null);
		$this->addColumn('USERNAME', 'Username', 'VARCHAR', true, 255, null);
		$this->addColumn('PASSWORD', 'Password', 'VARCHAR', true, 255, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', false, 255, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', false, 255, null);
		$this->addColumn('PHONE_MOBILE', 'PhoneMobile', 'VARCHAR', false, 255, null);
		$this->addColumn('NICKNAME', 'Nickname', 'VARCHAR', false, 255, null);
		$this->addColumn('IS_ENABLED', 'IsEnabled', 'TINYINT', false, 4, 1);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'INTEGER', false, 11, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'INTEGER', false, 11, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('AdminUserGroup', 'AdminUserGroup', RelationMap::MANY_TO_ONE, array('admin_user_group_id' => 'id', ), 'RESTRICT', 'CASCADE');
    $this->addRelation('Log', 'Log', RelationMap::ONE_TO_MANY, array('id' => 'created_by_admin_user_id', ), 'SET NULL', 'CASCADE');
    $this->addRelation('News', 'News', RelationMap::ONE_TO_MANY, array('id' => 'created_by_admin_user_id', ), 'SET NULL', 'CASCADE');
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

} // AdminUserTableMap
