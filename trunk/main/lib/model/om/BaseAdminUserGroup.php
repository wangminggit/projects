<?php


/**
 * Base class that represents a row from the 'admin_user_group' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseAdminUserGroup extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'AdminUserGroupPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        AdminUserGroupPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the name field.
	 * @var        string
	 */
	protected $name;

	/**
	 * The value for the is_super_admin field.
	 * @var        int
	 */
	protected $is_super_admin;

	/**
	 * The value for the is_fixed field.
	 * @var        int
	 */
	protected $is_fixed;

	/**
	 * The value for the created_at field.
	 * @var        int
	 */
	protected $created_at;

	/**
	 * The value for the updated_at field.
	 * @var        int
	 */
	protected $updated_at;

	/**
	 * @var        array AdminItemAdminUserGroupAccess[] Collection to store aggregation of AdminItemAdminUserGroupAccess objects.
	 */
	protected $collAdminItemAdminUserGroupAccesss;

	/**
	 * @var        array AdminUser[] Collection to store aggregation of AdminUser objects.
	 */
	protected $collAdminUsers;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [name] column value.
	 * 
	 * @return     string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get the [is_super_admin] column value.
	 * 
	 * @return     int
	 */
	public function getIsSuperAdmin()
	{
		return $this->is_super_admin;
	}

	/**
	 * Get the [is_fixed] column value.
	 * 
	 * @return     int
	 */
	public function getIsFixed()
	{
		return $this->is_fixed;
	}

	/**
	 * Get the [created_at] column value.
	 * 
	 * @return     int
	 */
	public function getCreatedAt()
	{
		return $this->created_at;
	}

	/**
	 * Get the [updated_at] column value.
	 * 
	 * @return     int
	 */
	public function getUpdatedAt()
	{
		return $this->updated_at;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     AdminUserGroup The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AdminUserGroupPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [name] column.
	 * 
	 * @param      string $v new value
	 * @return     AdminUserGroup The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = AdminUserGroupPeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [is_super_admin] column.
	 * 
	 * @param      int $v new value
	 * @return     AdminUserGroup The current object (for fluent API support)
	 */
	public function setIsSuperAdmin($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->is_super_admin !== $v) {
			$this->is_super_admin = $v;
			$this->modifiedColumns[] = AdminUserGroupPeer::IS_SUPER_ADMIN;
		}

		return $this;
	} // setIsSuperAdmin()

	/**
	 * Set the value of [is_fixed] column.
	 * 
	 * @param      int $v new value
	 * @return     AdminUserGroup The current object (for fluent API support)
	 */
	public function setIsFixed($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->is_fixed !== $v) {
			$this->is_fixed = $v;
			$this->modifiedColumns[] = AdminUserGroupPeer::IS_FIXED;
		}

		return $this;
	} // setIsFixed()

	/**
	 * Set the value of [created_at] column.
	 * 
	 * @param      int $v new value
	 * @return     AdminUserGroup The current object (for fluent API support)
	 */
	public function setCreatedAt($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->created_at !== $v) {
			$this->created_at = $v;
			$this->modifiedColumns[] = AdminUserGroupPeer::CREATED_AT;
		}

		return $this;
	} // setCreatedAt()

	/**
	 * Set the value of [updated_at] column.
	 * 
	 * @param      int $v new value
	 * @return     AdminUserGroup The current object (for fluent API support)
	 */
	public function setUpdatedAt($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->updated_at !== $v) {
			$this->updated_at = $v;
			$this->modifiedColumns[] = AdminUserGroupPeer::UPDATED_AT;
		}

		return $this;
	} // setUpdatedAt()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->is_super_admin = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->is_fixed = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->created_at = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->updated_at = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 6; // 6 = AdminUserGroupPeer::NUM_COLUMNS - AdminUserGroupPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating AdminUserGroup object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AdminUserGroupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = AdminUserGroupPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collAdminItemAdminUserGroupAccesss = null;

			$this->collAdminUsers = null;

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AdminUserGroupPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseAdminUserGroup:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			    return;
			  }
			}

			if ($ret) {
				AdminUserGroupQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseAdminUserGroup:delete:post') as $callable)
				{
				  call_user_func($callable, $this, $con);
				}

				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AdminUserGroupPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseAdminUserGroup:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			  	$con->commit();
			    return $affectedRows;
			  }
			}

			// symfony_timestampable behavior
			if ($this->isModified() && !$this->isColumnModified(AdminUserGroupPeer::UPDATED_AT))
			{
			  $this->setUpdatedAt(time());
			}

			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
				// symfony_timestampable behavior
				if (!$this->isColumnModified(AdminUserGroupPeer::CREATED_AT))
				{
				  $this->setCreatedAt(time());
				}

			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseAdminUserGroup:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				AdminUserGroupPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			if ($this->isNew() ) {
				$this->modifiedColumns[] = AdminUserGroupPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(AdminUserGroupPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.AdminUserGroupPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows = 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows = AdminUserGroupPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collAdminItemAdminUserGroupAccesss !== null) {
				foreach ($this->collAdminItemAdminUserGroupAccesss as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAdminUsers !== null) {
				foreach ($this->collAdminUsers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = AdminUserGroupPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAdminItemAdminUserGroupAccesss !== null) {
					foreach ($this->collAdminItemAdminUserGroupAccesss as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAdminUsers !== null) {
					foreach ($this->collAdminUsers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AdminUserGroupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getName();
				break;
			case 2:
				return $this->getIsSuperAdmin();
				break;
			case 3:
				return $this->getIsFixed();
				break;
			case 4:
				return $this->getCreatedAt();
				break;
			case 5:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = AdminUserGroupPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getIsSuperAdmin(),
			$keys[3] => $this->getIsFixed(),
			$keys[4] => $this->getCreatedAt(),
			$keys[5] => $this->getUpdatedAt(),
		);
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AdminUserGroupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setName($value);
				break;
			case 2:
				$this->setIsSuperAdmin($value);
				break;
			case 3:
				$this->setIsFixed($value);
				break;
			case 4:
				$this->setCreatedAt($value);
				break;
			case 5:
				$this->setUpdatedAt($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AdminUserGroupPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIsSuperAdmin($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIsFixed($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedAt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUpdatedAt($arr[$keys[5]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(AdminUserGroupPeer::DATABASE_NAME);

		if ($this->isColumnModified(AdminUserGroupPeer::ID)) $criteria->add(AdminUserGroupPeer::ID, $this->id);
		if ($this->isColumnModified(AdminUserGroupPeer::NAME)) $criteria->add(AdminUserGroupPeer::NAME, $this->name);
		if ($this->isColumnModified(AdminUserGroupPeer::IS_SUPER_ADMIN)) $criteria->add(AdminUserGroupPeer::IS_SUPER_ADMIN, $this->is_super_admin);
		if ($this->isColumnModified(AdminUserGroupPeer::IS_FIXED)) $criteria->add(AdminUserGroupPeer::IS_FIXED, $this->is_fixed);
		if ($this->isColumnModified(AdminUserGroupPeer::CREATED_AT)) $criteria->add(AdminUserGroupPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(AdminUserGroupPeer::UPDATED_AT)) $criteria->add(AdminUserGroupPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AdminUserGroupPeer::DATABASE_NAME);
		$criteria->add(AdminUserGroupPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getId();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of AdminUserGroup (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setName($this->name);
		$copyObj->setIsSuperAdmin($this->is_super_admin);
		$copyObj->setIsFixed($this->is_fixed);
		$copyObj->setCreatedAt($this->created_at);
		$copyObj->setUpdatedAt($this->updated_at);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getAdminItemAdminUserGroupAccesss() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAdminItemAdminUserGroupAccess($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getAdminUsers() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAdminUser($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);
		$copyObj->setId(NULL); // this is a auto-increment column, so set to default value
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     AdminUserGroup Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     AdminUserGroupPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new AdminUserGroupPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears out the collAdminItemAdminUserGroupAccesss collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAdminItemAdminUserGroupAccesss()
	 */
	public function clearAdminItemAdminUserGroupAccesss()
	{
		$this->collAdminItemAdminUserGroupAccesss = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAdminItemAdminUserGroupAccesss collection.
	 *
	 * By default this just sets the collAdminItemAdminUserGroupAccesss collection to an empty array (like clearcollAdminItemAdminUserGroupAccesss());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initAdminItemAdminUserGroupAccesss()
	{
		$this->collAdminItemAdminUserGroupAccesss = new PropelObjectCollection();
		$this->collAdminItemAdminUserGroupAccesss->setModel('AdminItemAdminUserGroupAccess');
	}

	/**
	 * Gets an array of AdminItemAdminUserGroupAccess objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this AdminUserGroup is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array AdminItemAdminUserGroupAccess[] List of AdminItemAdminUserGroupAccess objects
	 * @throws     PropelException
	 */
	public function getAdminItemAdminUserGroupAccesss($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAdminItemAdminUserGroupAccesss || null !== $criteria) {
			if ($this->isNew() && null === $this->collAdminItemAdminUserGroupAccesss) {
				// return empty collection
				$this->initAdminItemAdminUserGroupAccesss();
			} else {
				$collAdminItemAdminUserGroupAccesss = AdminItemAdminUserGroupAccessQuery::create(null, $criteria)
					->filterByAdminUserGroup($this)
					->find($con);
				if (null !== $criteria) {
					return $collAdminItemAdminUserGroupAccesss;
				}
				$this->collAdminItemAdminUserGroupAccesss = $collAdminItemAdminUserGroupAccesss;
			}
		}
		return $this->collAdminItemAdminUserGroupAccesss;
	}

	/**
	 * Returns the number of related AdminItemAdminUserGroupAccess objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related AdminItemAdminUserGroupAccess objects.
	 * @throws     PropelException
	 */
	public function countAdminItemAdminUserGroupAccesss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAdminItemAdminUserGroupAccesss || null !== $criteria) {
			if ($this->isNew() && null === $this->collAdminItemAdminUserGroupAccesss) {
				return 0;
			} else {
				$query = AdminItemAdminUserGroupAccessQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAdminUserGroup($this)
					->count($con);
			}
		} else {
			return count($this->collAdminItemAdminUserGroupAccesss);
		}
	}

	/**
	 * Method called to associate a AdminItemAdminUserGroupAccess object to this object
	 * through the AdminItemAdminUserGroupAccess foreign key attribute.
	 *
	 * @param      AdminItemAdminUserGroupAccess $l AdminItemAdminUserGroupAccess
	 * @return     void
	 * @throws     PropelException
	 */
	public function addAdminItemAdminUserGroupAccess(AdminItemAdminUserGroupAccess $l)
	{
		if ($this->collAdminItemAdminUserGroupAccesss === null) {
			$this->initAdminItemAdminUserGroupAccesss();
		}
		if (!$this->collAdminItemAdminUserGroupAccesss->contains($l)) { // only add it if the **same** object is not already associated
			$this->collAdminItemAdminUserGroupAccesss[]= $l;
			$l->setAdminUserGroup($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AdminUserGroup is new, it will return
	 * an empty collection; or if this AdminUserGroup has previously
	 * been saved, it will retrieve related AdminItemAdminUserGroupAccesss from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AdminUserGroup.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array AdminItemAdminUserGroupAccess[] List of AdminItemAdminUserGroupAccess objects
	 */
	public function getAdminItemAdminUserGroupAccesssJoinAdminItem($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = AdminItemAdminUserGroupAccessQuery::create(null, $criteria);
		$query->joinWith('AdminItem', $join_behavior);

		return $this->getAdminItemAdminUserGroupAccesss($query, $con);
	}

	/**
	 * Clears out the collAdminUsers collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAdminUsers()
	 */
	public function clearAdminUsers()
	{
		$this->collAdminUsers = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAdminUsers collection.
	 *
	 * By default this just sets the collAdminUsers collection to an empty array (like clearcollAdminUsers());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initAdminUsers()
	{
		$this->collAdminUsers = new PropelObjectCollection();
		$this->collAdminUsers->setModel('AdminUser');
	}

	/**
	 * Gets an array of AdminUser objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this AdminUserGroup is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array AdminUser[] List of AdminUser objects
	 * @throws     PropelException
	 */
	public function getAdminUsers($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAdminUsers || null !== $criteria) {
			if ($this->isNew() && null === $this->collAdminUsers) {
				// return empty collection
				$this->initAdminUsers();
			} else {
				$collAdminUsers = AdminUserQuery::create(null, $criteria)
					->filterByAdminUserGroup($this)
					->find($con);
				if (null !== $criteria) {
					return $collAdminUsers;
				}
				$this->collAdminUsers = $collAdminUsers;
			}
		}
		return $this->collAdminUsers;
	}

	/**
	 * Returns the number of related AdminUser objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related AdminUser objects.
	 * @throws     PropelException
	 */
	public function countAdminUsers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAdminUsers || null !== $criteria) {
			if ($this->isNew() && null === $this->collAdminUsers) {
				return 0;
			} else {
				$query = AdminUserQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAdminUserGroup($this)
					->count($con);
			}
		} else {
			return count($this->collAdminUsers);
		}
	}

	/**
	 * Method called to associate a AdminUser object to this object
	 * through the AdminUser foreign key attribute.
	 *
	 * @param      AdminUser $l AdminUser
	 * @return     void
	 * @throws     PropelException
	 */
	public function addAdminUser(AdminUser $l)
	{
		if ($this->collAdminUsers === null) {
			$this->initAdminUsers();
		}
		if (!$this->collAdminUsers->contains($l)) { // only add it if the **same** object is not already associated
			$this->collAdminUsers[]= $l;
			$l->setAdminUserGroup($this);
		}
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->name = null;
		$this->is_super_admin = null;
		$this->is_fixed = null;
		$this->created_at = null;
		$this->updated_at = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collAdminItemAdminUserGroupAccesss) {
				foreach ((array) $this->collAdminItemAdminUserGroupAccesss as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collAdminUsers) {
				foreach ((array) $this->collAdminUsers as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collAdminItemAdminUserGroupAccesss = null;
		$this->collAdminUsers = null;
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseAdminUserGroup:' . $name))
		{
		  array_unshift($params, $this);
		  return call_user_func_array($callable, $params);
		}

		if (preg_match('/get(\w+)/', $name, $matches)) {
			$virtualColumn = $matches[1];
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
			// no lcfirst in php<5.3...
			$virtualColumn[0] = strtolower($virtualColumn[0]);
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
		}
		return parent::__call($name, $params);
	}

} // BaseAdminUserGroup
