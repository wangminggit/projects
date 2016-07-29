<?php



/**
 * This class defines the structure of the 'log' table.
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
class LogTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.LogTableMap';

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
		$this->setName('log');
		$this->setPhpName('Log');
		$this->setClassname('Log');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11, null);
		$this->addForeignKey('LOG_EVENT_ID', 'LogEventId', 'INTEGER', 'log_event', 'ID', false, 11, null);
		$this->addForeignKey('APP_ID', 'AppId', 'INTEGER', 'app', 'ID', false, 11, null);
		$this->addColumn('DESCRIPTION', 'Description', 'VARCHAR', false, 500, null);
		$this->addColumn('PARAMETERS', 'Parameters', 'LONGVARCHAR', false, null, null);
		$this->addColumn('IP', 'Ip', 'VARCHAR', false, 255, null);
		$this->addColumn('OBJECT_ID', 'ObjectId', 'INTEGER', false, 11, null);
		$this->addForeignKey('CREATED_BY_ADMIN_USER_ID', 'CreatedByAdminUserId', 'INTEGER', 'admin_user', 'ID', false, 11, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'INTEGER', false, 11, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('LogEvent', 'LogEvent', RelationMap::MANY_TO_ONE, array('log_event_id' => 'id', ), 'SET NULL', 'CASCADE');
    $this->addRelation('App', 'App', RelationMap::MANY_TO_ONE, array('app_id' => 'id', ), 'SET NULL', 'CASCADE');
    $this->addRelation('AdminUser', 'AdminUser', RelationMap::MANY_TO_ONE, array('created_by_admin_user_id' => 'id', ), 'SET NULL', 'CASCADE');
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

} // LogTableMap
