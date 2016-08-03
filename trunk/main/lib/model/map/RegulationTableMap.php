<?php



/**
 * This class defines the structure of the 'regulation' table.
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
class RegulationTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.RegulationTableMap';

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
		$this->setName('regulation');
		$this->setPhpName('Regulation');
		$this->setClassname('Regulation');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11, null);
		$this->addForeignKey('REGULATION_CATEGORY_ID', 'RegulationCategoryId', 'INTEGER', 'regulation_category', 'ID', false, 11, null);
		$this->addForeignKey('CREATED_BY_ADMIN_USER_ID', 'CreatedByAdminUserId', 'INTEGER', 'admin_user', 'ID', false, 11, null);
		$this->addColumn('TITLE', 'Title', 'VARCHAR', true, 255, null);
		$this->addColumn('RELEASE_DATE', 'ReleaseDate', 'DATE', false, null, null);
		$this->addColumn('IMAGE', 'Image', 'VARCHAR', false, 255, null);
		$this->addColumn('SUMMARY', 'Summary', 'LONGVARCHAR', false, null, null);
		$this->addColumn('BODY', 'Body', 'LONGVARCHAR', false, null, null);
		$this->addColumn('IS_ENABLE', 'IsEnable', 'INTEGER', false, 11, 1);
		$this->addColumn('POSITION', 'Position', 'INTEGER', false, 11, null);
		$this->addColumn('PAGE_VIEW', 'PageView', 'INTEGER', false, 11, 0);
		$this->addColumn('SEO_KEYWORDS', 'SeoKeywords', 'LONGVARCHAR', false, null, null);
		$this->addColumn('SEO_DESCRIPTION', 'SeoDescription', 'LONGVARCHAR', false, null, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'INTEGER', false, 11, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'INTEGER', false, 11, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('RegulationCategory', 'RegulationCategory', RelationMap::MANY_TO_ONE, array('regulation_category_id' => 'id', ), 'RESTRICT', 'CASCADE');
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
			'symfony_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
		);
	} // getBehaviors()

} // RegulationTableMap
