<?php


/**
 * Base static class for performing query and update operations on the 'admin_user' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseAdminUserPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'propel';

	/** the table name for this class */
	const TABLE_NAME = 'admin_user';

	/** the related Propel class for this table */
	const OM_CLASS = 'AdminUser';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'lib.model.AdminUser';

	/** the related TableMap class for this table */
	const TM_CLASS = 'AdminUserTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 11;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'admin_user.ID';

	/** the column name for the ADMIN_USER_GROUP_ID field */
	const ADMIN_USER_GROUP_ID = 'admin_user.ADMIN_USER_GROUP_ID';

	/** the column name for the USERNAME field */
	const USERNAME = 'admin_user.USERNAME';

	/** the column name for the PASSWORD field */
	const PASSWORD = 'admin_user.PASSWORD';

	/** the column name for the NAME field */
	const NAME = 'admin_user.NAME';

	/** the column name for the EMAIL field */
	const EMAIL = 'admin_user.EMAIL';

	/** the column name for the PHONE_MOBILE field */
	const PHONE_MOBILE = 'admin_user.PHONE_MOBILE';

	/** the column name for the NICKNAME field */
	const NICKNAME = 'admin_user.NICKNAME';

	/** the column name for the IS_ENABLED field */
	const IS_ENABLED = 'admin_user.IS_ENABLED';

	/** the column name for the CREATED_AT field */
	const CREATED_AT = 'admin_user.CREATED_AT';

	/** the column name for the UPDATED_AT field */
	const UPDATED_AT = 'admin_user.UPDATED_AT';

	/**
	 * An identiy map to hold any loaded instances of AdminUser objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array AdminUser[]
	 */
	public static $instances = array();


	// symfony behavior
	
	/**
	 * Indicates whether the current model includes I18N.
	 */
	const IS_I18N = false;

	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'AdminUserGroupId', 'Username', 'Password', 'Name', 'Email', 'PhoneMobile', 'Nickname', 'IsEnabled', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'adminUserGroupId', 'username', 'password', 'name', 'email', 'phoneMobile', 'nickname', 'isEnabled', 'createdAt', 'updatedAt', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::ADMIN_USER_GROUP_ID, self::USERNAME, self::PASSWORD, self::NAME, self::EMAIL, self::PHONE_MOBILE, self::NICKNAME, self::IS_ENABLED, self::CREATED_AT, self::UPDATED_AT, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'ADMIN_USER_GROUP_ID', 'USERNAME', 'PASSWORD', 'NAME', 'EMAIL', 'PHONE_MOBILE', 'NICKNAME', 'IS_ENABLED', 'CREATED_AT', 'UPDATED_AT', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'admin_user_group_id', 'username', 'password', 'name', 'email', 'phone_mobile', 'nickname', 'is_enabled', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'AdminUserGroupId' => 1, 'Username' => 2, 'Password' => 3, 'Name' => 4, 'Email' => 5, 'PhoneMobile' => 6, 'Nickname' => 7, 'IsEnabled' => 8, 'CreatedAt' => 9, 'UpdatedAt' => 10, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'adminUserGroupId' => 1, 'username' => 2, 'password' => 3, 'name' => 4, 'email' => 5, 'phoneMobile' => 6, 'nickname' => 7, 'isEnabled' => 8, 'createdAt' => 9, 'updatedAt' => 10, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::ADMIN_USER_GROUP_ID => 1, self::USERNAME => 2, self::PASSWORD => 3, self::NAME => 4, self::EMAIL => 5, self::PHONE_MOBILE => 6, self::NICKNAME => 7, self::IS_ENABLED => 8, self::CREATED_AT => 9, self::UPDATED_AT => 10, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'ADMIN_USER_GROUP_ID' => 1, 'USERNAME' => 2, 'PASSWORD' => 3, 'NAME' => 4, 'EMAIL' => 5, 'PHONE_MOBILE' => 6, 'NICKNAME' => 7, 'IS_ENABLED' => 8, 'CREATED_AT' => 9, 'UPDATED_AT' => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'admin_user_group_id' => 1, 'username' => 2, 'password' => 3, 'name' => 4, 'email' => 5, 'phone_mobile' => 6, 'nickname' => 7, 'is_enabled' => 8, 'created_at' => 9, 'updated_at' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	/**
	 * Translates a fieldname to another type
	 *
	 * @param      string $name field name
	 * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @param      string $toType   One of the class type constants
	 * @return     string translated name of the field.
	 * @throws     PropelException - if the specified name could not be found in the fieldname mappings.
	 */
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	/**
	 * Returns an array of field names.
	 *
	 * @param      string $type The type of fieldnames to return:
	 *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     array A list of field names
	 */

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	/**
	 * Convenience method which changes table.column to alias.column.
	 *
	 * Using this method you can maintain SQL abstraction while using column aliases.
	 * <code>
	 *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
	 *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
	 * </code>
	 * @param      string $alias The alias for the current table.
	 * @param      string $column The column name for current table. (i.e. AdminUserPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(AdminUserPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param      Criteria $criteria object containing the columns to add.
	 * @param      string   $alias    optional table alias
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria, $alias = null)
	{
		if (null === $alias) {
			$criteria->addSelectColumn(AdminUserPeer::ID);
			$criteria->addSelectColumn(AdminUserPeer::ADMIN_USER_GROUP_ID);
			$criteria->addSelectColumn(AdminUserPeer::USERNAME);
			$criteria->addSelectColumn(AdminUserPeer::PASSWORD);
			$criteria->addSelectColumn(AdminUserPeer::NAME);
			$criteria->addSelectColumn(AdminUserPeer::EMAIL);
			$criteria->addSelectColumn(AdminUserPeer::PHONE_MOBILE);
			$criteria->addSelectColumn(AdminUserPeer::NICKNAME);
			$criteria->addSelectColumn(AdminUserPeer::IS_ENABLED);
			$criteria->addSelectColumn(AdminUserPeer::CREATED_AT);
			$criteria->addSelectColumn(AdminUserPeer::UPDATED_AT);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.ADMIN_USER_GROUP_ID');
			$criteria->addSelectColumn($alias . '.USERNAME');
			$criteria->addSelectColumn($alias . '.PASSWORD');
			$criteria->addSelectColumn($alias . '.NAME');
			$criteria->addSelectColumn($alias . '.EMAIL');
			$criteria->addSelectColumn($alias . '.PHONE_MOBILE');
			$criteria->addSelectColumn($alias . '.NICKNAME');
			$criteria->addSelectColumn($alias . '.IS_ENABLED');
			$criteria->addSelectColumn($alias . '.CREATED_AT');
			$criteria->addSelectColumn($alias . '.UPDATED_AT');
		}
	}

	/**
	 * Returns the number of rows matching criteria.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @return     int Number of matching rows.
	 */
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
		// we may modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(AdminUserPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			AdminUserPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(AdminUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseAdminUserPeer', $criteria, $con);
		}

		// BasePeer returns a PDOStatement
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}
	/**
	 * Method to select one object from the DB.
	 *
	 * @param      Criteria $criteria object used to create the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     AdminUser
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = AdminUserPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	/**
	 * Method to do selects.
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     array Array of selected Objects
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return AdminUserPeer::populateObjects(AdminUserPeer::doSelectStmt($criteria, $con));
	}
	/**
	 * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
	 *
	 * Use this method directly if you want to work with an executed statement durirectly (for example
	 * to perform your own object hydration).
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con The connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     PDOStatement The executed PDOStatement object.
	 * @see        BasePeer::doSelect()
	 */
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(AdminUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			AdminUserPeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);
		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseAdminUserPeer', $criteria, $con);
		}


		// BasePeer returns a PDOStatement
		return BasePeer::doSelect($criteria, $con);
	}
	/**
	 * Adds an object to the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doSelect*()
	 * methods in your stub classes -- you may need to explicitly add objects
	 * to the cache in order to ensure that the same objects are always returned by doSelect*()
	 * and retrieveByPK*() calls.
	 *
	 * @param      AdminUser $value A AdminUser object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(AdminUser $obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getId();
			} // if key === null
			self::$instances[$key] = $obj;
		}
	}

	/**
	 * Removes an object from the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doDelete
	 * methods in your stub classes -- you may need to explicitly remove objects
	 * from the cache in order to prevent returning objects that no longer exist.
	 *
	 * @param      mixed $value A AdminUser object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof AdminUser) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or AdminUser object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
				throw $e;
			}

			unset(self::$instances[$key]);
		}
	} // removeInstanceFromPool()

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
	 * @return     AdminUser Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
	 * @see        getPrimaryKeyHash()
	 */
	public static function getInstanceFromPool($key)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if (isset(self::$instances[$key])) {
				return self::$instances[$key];
			}
		}
		return null; // just to be explicit
	}
	
	/**
	 * Clear the instance pool.
	 *
	 * @return     void
	 */
	public static function clearInstancePool()
	{
		self::$instances = array();
	}
	
	/**
	 * Method to invalidate the instance pool of all tables related to admin_user
	 * by a foreign key with ON DELETE CASCADE
	 */
	public static function clearRelatedInstancePool()
	{
		// Invalidate objects in LogPeer instance pool, 
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		LogPeer::clearInstancePool();
		// Invalidate objects in NewsPeer instance pool, 
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		NewsPeer::clearInstancePool();
	}

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     string A string version of PK or NULL if the components of primary key in result array are all null.
	 */
	public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
	{
		// If the PK cannot be derived from the row, return NULL.
		if ($row[$startcol] === null) {
			return null;
		}
		return (string) $row[$startcol];
	}

	/**
	 * Retrieves the primary key from the DB resultset row 
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, an array of the primary key columns will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     mixed The primary key of the row
	 */
	public static function getPrimaryKeyFromRow($row, $startcol = 0)
	{
		return (int) $row[$startcol];
	}
	
	/**
	 * The returned array will contain objects of the default type or
	 * objects that inherit from the default.
	 *
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
		// set the class once to avoid overhead in the loop
		$cls = AdminUserPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = AdminUserPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = AdminUserPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				AdminUserPeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
	}
	/**
	 * Populates an object of the default type or an object that inherit from the default.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     array (AdminUser object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = AdminUserPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = AdminUserPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + AdminUserPeer::NUM_COLUMNS;
		} else {
			$cls = AdminUserPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			AdminUserPeer::addInstanceToPool($obj, $key);
		}
		return array($obj, $col);
	}

	/**
	 * Returns the number of rows matching criteria, joining the related AdminUserGroup table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAdminUserGroup(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(AdminUserPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			AdminUserPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(AdminUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(AdminUserPeer::ADMIN_USER_GROUP_ID, AdminUserGroupPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseAdminUserPeer', $criteria, $con);
		}

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Selects a collection of AdminUser objects pre-filled with their AdminUserGroup objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of AdminUser objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAdminUserGroup(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		AdminUserPeer::addSelectColumns($criteria);
		$startcol = (AdminUserPeer::NUM_COLUMNS - AdminUserPeer::NUM_LAZY_LOAD_COLUMNS);
		AdminUserGroupPeer::addSelectColumns($criteria);

		$criteria->addJoin(AdminUserPeer::ADMIN_USER_GROUP_ID, AdminUserGroupPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseAdminUserPeer', $criteria, $con);
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = AdminUserPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = AdminUserPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = AdminUserPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				AdminUserPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = AdminUserGroupPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = AdminUserGroupPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = AdminUserGroupPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					AdminUserGroupPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (AdminUser) to $obj2 (AdminUserGroup)
				$obj2->addAdminUser($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining all related tables
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(AdminUserPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			AdminUserPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(AdminUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(AdminUserPeer::ADMIN_USER_GROUP_ID, AdminUserGroupPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseAdminUserPeer', $criteria, $con);
		}

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}

	/**
	 * Selects a collection of AdminUser objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of AdminUser objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		AdminUserPeer::addSelectColumns($criteria);
		$startcol2 = (AdminUserPeer::NUM_COLUMNS - AdminUserPeer::NUM_LAZY_LOAD_COLUMNS);

		AdminUserGroupPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (AdminUserGroupPeer::NUM_COLUMNS - AdminUserGroupPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(AdminUserPeer::ADMIN_USER_GROUP_ID, AdminUserGroupPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseAdminUserPeer', $criteria, $con);
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = AdminUserPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = AdminUserPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = AdminUserPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				AdminUserPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined AdminUserGroup rows

			$key2 = AdminUserGroupPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = AdminUserGroupPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = AdminUserGroupPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					AdminUserGroupPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (AdminUser) to the collection in $obj2 (AdminUserGroup)
				$obj2->addAdminUser($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}

	/**
	 * Returns the TableMap related to this peer.
	 * This method is not needed for general use but a specific application could have a need.
	 * @return     TableMap
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	/**
	 * Add a TableMap instance to the database for this peer class.
	 */
	public static function buildTableMap()
	{
	  $dbMap = Propel::getDatabaseMap(BaseAdminUserPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseAdminUserPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new AdminUserTableMap());
	  }
	}

	/**
	 * The class that the Peer will make instances of.
	 *
	 * If $withPrefix is true, the returned path
	 * uses a dot-path notation which is tranalted into a path
	 * relative to a location on the PHP include_path.
	 * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
	 *
	 * @param      boolean $withPrefix Whether or not to return the path with the class name
	 * @return     string path.to.ClassName
	 */
	public static function getOMClass($withPrefix = true)
	{
		return $withPrefix ? AdminUserPeer::CLASS_DEFAULT : AdminUserPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a AdminUser or Criteria object.
	 *
	 * @param      mixed $values Criteria or AdminUser object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(AdminUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from AdminUser object
		}

		if ($criteria->containsKey(AdminUserPeer::ID) && $criteria->keyContainsValue(AdminUserPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.AdminUserPeer::ID.')');
		}


		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		try {
			// use transaction because $criteria could contain info
			// for more than one table (I guess, conceivably)
			$con->beginTransaction();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollBack();
			throw $e;
		}

		return $pk;
	}

	/**
	 * Method perform an UPDATE on the database, given a AdminUser or Criteria object.
	 *
	 * @param      mixed $values Criteria or AdminUser object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(AdminUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(AdminUserPeer::ID);
			$value = $criteria->remove(AdminUserPeer::ID);
			if ($value) {
				$selectCriteria->add(AdminUserPeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(AdminUserPeer::TABLE_NAME);
			}

		} else { // $values is AdminUser object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the admin_user table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(AdminUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			AdminUserPeer::doOnDeleteSetNull(new Criteria(AdminUserPeer::DATABASE_NAME), $con);
			$affectedRows += BasePeer::doDeleteAll(AdminUserPeer::TABLE_NAME, $con, AdminUserPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			AdminUserPeer::clearInstancePool();
			AdminUserPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a AdminUser or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or AdminUser object or primary key or array of primary keys
	 *              which is used to create the DELETE statement
	 * @param      PropelPDO $con the connection to use
	 * @return     int 	The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *				if supported by native driver or if emulated using Propel.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	 public static function doDelete($values, PropelPDO $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(AdminUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof AdminUser) { // it's a model object
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AdminUserPeer::ID, (array) $values, Criteria::IN);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; // initialize var to track total num of affected rows

		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			
			// cloning the Criteria in case it's modified by doSelect() or doSelectStmt()
			$c = clone $criteria;
			AdminUserPeer::doOnDeleteSetNull($c, $con);
			
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			if ($values instanceof Criteria) {
				AdminUserPeer::clearInstancePool();
			} elseif ($values instanceof AdminUser) { // it's a model object
				AdminUserPeer::removeInstanceFromPool($values);
			} else { // it's a primary key, or an array of pks
				foreach ((array) $values as $singleval) {
					AdminUserPeer::removeInstanceFromPool($singleval);
				}
			}
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			AdminUserPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * This is a method for emulating ON DELETE SET NULL DBs that don't support this
	 * feature (like MySQL or SQLite).
	 *
	 * This method is not very speedy because it must perform a query first to get
	 * the implicated records and then perform the deletes by calling those Peer classes.
	 *
	 * This method should be used within a transaction if possible.
	 *
	 * @param      Criteria $criteria
	 * @param      PropelPDO $con
	 * @return     void
	 */
	protected static function doOnDeleteSetNull(Criteria $criteria, PropelPDO $con)
	{

		// first find the objects that are implicated by the $criteria
		$objects = AdminUserPeer::doSelect($criteria, $con);
		foreach ($objects as $obj) {

			// set fkey col in related Log rows to NULL
			$selectCriteria = new Criteria(AdminUserPeer::DATABASE_NAME);
			$updateValues = new Criteria(AdminUserPeer::DATABASE_NAME);
			$selectCriteria->add(LogPeer::CREATED_BY_ADMIN_USER_ID, $obj->getId());
			$updateValues->add(LogPeer::CREATED_BY_ADMIN_USER_ID, null);

			BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

			// set fkey col in related News rows to NULL
			$selectCriteria = new Criteria(AdminUserPeer::DATABASE_NAME);
			$updateValues = new Criteria(AdminUserPeer::DATABASE_NAME);
			$selectCriteria->add(NewsPeer::CREATED_BY_ADMIN_USER_ID, $obj->getId());
			$updateValues->add(NewsPeer::CREATED_BY_ADMIN_USER_ID, null);

			BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

		}
	}

	/**
	 * Validates all modified columns of given AdminUser object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      AdminUser $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(AdminUser $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AdminUserPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AdminUserPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach ($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		return BasePeer::doValidate(AdminUserPeer::DATABASE_NAME, AdminUserPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     AdminUser
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = AdminUserPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(AdminUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(AdminUserPeer::DATABASE_NAME);
		$criteria->add(AdminUserPeer::ID, $pk);

		$v = AdminUserPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	/**
	 * Retrieve multiple objects by pkey.
	 *
	 * @param      array $pks List of primary keys
	 * @param      PropelPDO $con the connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(AdminUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(AdminUserPeer::DATABASE_NAME);
			$criteria->add(AdminUserPeer::ID, $pks, Criteria::IN);
			$objs = AdminUserPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

	// symfony behavior
	
	/**
	 * Returns an array of arrays that contain columns in each unique index.
	 *
	 * @return array
	 */
	static public function getUniqueColumnNames()
	{
	  return array(array('username'));
	}

	// symfony_behaviors behavior
	
	/**
	 * Returns the name of the hook to call from inside the supplied method.
	 *
	 * @param string $method The calling method
	 *
	 * @return string A hook name for {@link sfMixer}
	 *
	 * @throws LogicException If the method name is not recognized
	 */
	static private function getMixerPreSelectHook($method)
	{
	  if (preg_match('/^do(Select|Count)(Join(All(Except)?)?|Stmt)?/', $method, $match))
	  {
	    return sprintf('BaseAdminUserPeer:%s:%1$s', 'Count' == $match[1] ? 'doCount' : $match[0]);
	  }
	
	  throw new LogicException(sprintf('Unrecognized function "%s"', $method));
	}

} // BaseAdminUserPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseAdminUserPeer::buildTableMap();

