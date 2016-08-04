<?php


/**
 * Base class that represents a row from the 'admin_user' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseAdminUser extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'AdminUserPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        AdminUserPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the admin_user_group_id field.
	 * @var        int
	 */
	protected $admin_user_group_id;

	/**
	 * The value for the username field.
	 * @var        string
	 */
	protected $username;

	/**
	 * The value for the password field.
	 * @var        string
	 */
	protected $password;

	/**
	 * The value for the name field.
	 * @var        string
	 */
	protected $name;

	/**
	 * The value for the email field.
	 * @var        string
	 */
	protected $email;

	/**
	 * The value for the phone_mobile field.
	 * @var        string
	 */
	protected $phone_mobile;

	/**
	 * The value for the nickname field.
	 * @var        string
	 */
	protected $nickname;

	/**
	 * The value for the is_enabled field.
	 * Note: this column has a database default value of: 1
	 * @var        int
	 */
	protected $is_enabled;

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
	 * @var        AdminUserGroup
	 */
	protected $aAdminUserGroup;

	/**
	 * @var        array Information[] Collection to store aggregation of Information objects.
	 */
	protected $collInformations;

	/**
	 * @var        array Log[] Collection to store aggregation of Log objects.
	 */
	protected $collLogs;

	/**
	 * @var        array Regulation[] Collection to store aggregation of Regulation objects.
	 */
	protected $collRegulations;

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
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->is_enabled = 1;
	}

	/**
	 * Initializes internal state of BaseAdminUser object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

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
	 * Get the [admin_user_group_id] column value.
	 * 
	 * @return     int
	 */
	public function getAdminUserGroupId()
	{
		return $this->admin_user_group_id;
	}

	/**
	 * Get the [username] column value.
	 * 
	 * @return     string
	 */
	public function getUsername()
	{
		return $this->username;
	}

	/**
	 * Get the [password] column value.
	 * 
	 * @return     string
	 */
	public function getPassword()
	{
		return $this->password;
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
	 * Get the [email] column value.
	 * 
	 * @return     string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Get the [phone_mobile] column value.
	 * 
	 * @return     string
	 */
	public function getPhoneMobile()
	{
		return $this->phone_mobile;
	}

	/**
	 * Get the [nickname] column value.
	 * 
	 * @return     string
	 */
	public function getNickname()
	{
		return $this->nickname;
	}

	/**
	 * Get the [is_enabled] column value.
	 * 
	 * @return     int
	 */
	public function getIsEnabled()
	{
		return $this->is_enabled;
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
	 * @return     AdminUser The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AdminUserPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [admin_user_group_id] column.
	 * 
	 * @param      int $v new value
	 * @return     AdminUser The current object (for fluent API support)
	 */
	public function setAdminUserGroupId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->admin_user_group_id !== $v) {
			$this->admin_user_group_id = $v;
			$this->modifiedColumns[] = AdminUserPeer::ADMIN_USER_GROUP_ID;
		}

		if ($this->aAdminUserGroup !== null && $this->aAdminUserGroup->getId() !== $v) {
			$this->aAdminUserGroup = null;
		}

		return $this;
	} // setAdminUserGroupId()

	/**
	 * Set the value of [username] column.
	 * 
	 * @param      string $v new value
	 * @return     AdminUser The current object (for fluent API support)
	 */
	public function setUsername($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->username !== $v) {
			$this->username = $v;
			$this->modifiedColumns[] = AdminUserPeer::USERNAME;
		}

		return $this;
	} // setUsername()

	/**
	 * Set the value of [password] column.
	 * 
	 * @param      string $v new value
	 * @return     AdminUser The current object (for fluent API support)
	 */
	public function setPassword($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->password !== $v) {
			$this->password = $v;
			$this->modifiedColumns[] = AdminUserPeer::PASSWORD;
		}

		return $this;
	} // setPassword()

	/**
	 * Set the value of [name] column.
	 * 
	 * @param      string $v new value
	 * @return     AdminUser The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = AdminUserPeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [email] column.
	 * 
	 * @param      string $v new value
	 * @return     AdminUser The current object (for fluent API support)
	 */
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = AdminUserPeer::EMAIL;
		}

		return $this;
	} // setEmail()

	/**
	 * Set the value of [phone_mobile] column.
	 * 
	 * @param      string $v new value
	 * @return     AdminUser The current object (for fluent API support)
	 */
	public function setPhoneMobile($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->phone_mobile !== $v) {
			$this->phone_mobile = $v;
			$this->modifiedColumns[] = AdminUserPeer::PHONE_MOBILE;
		}

		return $this;
	} // setPhoneMobile()

	/**
	 * Set the value of [nickname] column.
	 * 
	 * @param      string $v new value
	 * @return     AdminUser The current object (for fluent API support)
	 */
	public function setNickname($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nickname !== $v) {
			$this->nickname = $v;
			$this->modifiedColumns[] = AdminUserPeer::NICKNAME;
		}

		return $this;
	} // setNickname()

	/**
	 * Set the value of [is_enabled] column.
	 * 
	 * @param      int $v new value
	 * @return     AdminUser The current object (for fluent API support)
	 */
	public function setIsEnabled($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->is_enabled !== $v || $this->isNew()) {
			$this->is_enabled = $v;
			$this->modifiedColumns[] = AdminUserPeer::IS_ENABLED;
		}

		return $this;
	} // setIsEnabled()

	/**
	 * Set the value of [created_at] column.
	 * 
	 * @param      int $v new value
	 * @return     AdminUser The current object (for fluent API support)
	 */
	public function setCreatedAt($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->created_at !== $v) {
			$this->created_at = $v;
			$this->modifiedColumns[] = AdminUserPeer::CREATED_AT;
		}

		return $this;
	} // setCreatedAt()

	/**
	 * Set the value of [updated_at] column.
	 * 
	 * @param      int $v new value
	 * @return     AdminUser The current object (for fluent API support)
	 */
	public function setUpdatedAt($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->updated_at !== $v) {
			$this->updated_at = $v;
			$this->modifiedColumns[] = AdminUserPeer::UPDATED_AT;
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
			if ($this->is_enabled !== 1) {
				return false;
			}

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
			$this->admin_user_group_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->username = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->password = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->name = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->email = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->phone_mobile = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->nickname = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->is_enabled = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->created_at = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->updated_at = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 11; // 11 = AdminUserPeer::NUM_COLUMNS - AdminUserPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating AdminUser object", $e);
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

		if ($this->aAdminUserGroup !== null && $this->admin_user_group_id !== $this->aAdminUserGroup->getId()) {
			$this->aAdminUserGroup = null;
		}
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
			$con = Propel::getConnection(AdminUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = AdminUserPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aAdminUserGroup = null;
			$this->collInformations = null;

			$this->collLogs = null;

			$this->collRegulations = null;

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
			$con = Propel::getConnection(AdminUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseAdminUser:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			    return;
			  }
			}

			if ($ret) {
				AdminUserQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseAdminUser:delete:post') as $callable)
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
			$con = Propel::getConnection(AdminUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseAdminUser:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			  	$con->commit();
			    return $affectedRows;
			  }
			}

			// symfony_timestampable behavior
			if ($this->isModified() && !$this->isColumnModified(AdminUserPeer::UPDATED_AT))
			{
			  $this->setUpdatedAt(time());
			}

			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
				// symfony_timestampable behavior
				if (!$this->isColumnModified(AdminUserPeer::CREATED_AT))
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
				foreach (sfMixer::getCallables('BaseAdminUser:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				AdminUserPeer::addInstanceToPool($this);
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

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aAdminUserGroup !== null) {
				if ($this->aAdminUserGroup->isModified() || $this->aAdminUserGroup->isNew()) {
					$affectedRows += $this->aAdminUserGroup->save($con);
				}
				$this->setAdminUserGroup($this->aAdminUserGroup);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = AdminUserPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(AdminUserPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.AdminUserPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += AdminUserPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collInformations !== null) {
				foreach ($this->collInformations as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLogs !== null) {
				foreach ($this->collLogs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRegulations !== null) {
				foreach ($this->collRegulations as $referrerFK) {
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


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aAdminUserGroup !== null) {
				if (!$this->aAdminUserGroup->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAdminUserGroup->getValidationFailures());
				}
			}


			if (($retval = AdminUserPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collInformations !== null) {
					foreach ($this->collInformations as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLogs !== null) {
					foreach ($this->collLogs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRegulations !== null) {
					foreach ($this->collRegulations as $referrerFK) {
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
		$pos = AdminUserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getAdminUserGroupId();
				break;
			case 2:
				return $this->getUsername();
				break;
			case 3:
				return $this->getPassword();
				break;
			case 4:
				return $this->getName();
				break;
			case 5:
				return $this->getEmail();
				break;
			case 6:
				return $this->getPhoneMobile();
				break;
			case 7:
				return $this->getNickname();
				break;
			case 8:
				return $this->getIsEnabled();
				break;
			case 9:
				return $this->getCreatedAt();
				break;
			case 10:
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
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $includeForeignObjects = false)
	{
		$keys = AdminUserPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getAdminUserGroupId(),
			$keys[2] => $this->getUsername(),
			$keys[3] => $this->getPassword(),
			$keys[4] => $this->getName(),
			$keys[5] => $this->getEmail(),
			$keys[6] => $this->getPhoneMobile(),
			$keys[7] => $this->getNickname(),
			$keys[8] => $this->getIsEnabled(),
			$keys[9] => $this->getCreatedAt(),
			$keys[10] => $this->getUpdatedAt(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aAdminUserGroup) {
				$result['AdminUserGroup'] = $this->aAdminUserGroup->toArray($keyType, $includeLazyLoadColumns, true);
			}
		}
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
		$pos = AdminUserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setAdminUserGroupId($value);
				break;
			case 2:
				$this->setUsername($value);
				break;
			case 3:
				$this->setPassword($value);
				break;
			case 4:
				$this->setName($value);
				break;
			case 5:
				$this->setEmail($value);
				break;
			case 6:
				$this->setPhoneMobile($value);
				break;
			case 7:
				$this->setNickname($value);
				break;
			case 8:
				$this->setIsEnabled($value);
				break;
			case 9:
				$this->setCreatedAt($value);
				break;
			case 10:
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
		$keys = AdminUserPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAdminUserGroupId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUsername($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPassword($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setName($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEmail($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPhoneMobile($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNickname($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setIsEnabled($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCreatedAt($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUpdatedAt($arr[$keys[10]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(AdminUserPeer::DATABASE_NAME);

		if ($this->isColumnModified(AdminUserPeer::ID)) $criteria->add(AdminUserPeer::ID, $this->id);
		if ($this->isColumnModified(AdminUserPeer::ADMIN_USER_GROUP_ID)) $criteria->add(AdminUserPeer::ADMIN_USER_GROUP_ID, $this->admin_user_group_id);
		if ($this->isColumnModified(AdminUserPeer::USERNAME)) $criteria->add(AdminUserPeer::USERNAME, $this->username);
		if ($this->isColumnModified(AdminUserPeer::PASSWORD)) $criteria->add(AdminUserPeer::PASSWORD, $this->password);
		if ($this->isColumnModified(AdminUserPeer::NAME)) $criteria->add(AdminUserPeer::NAME, $this->name);
		if ($this->isColumnModified(AdminUserPeer::EMAIL)) $criteria->add(AdminUserPeer::EMAIL, $this->email);
		if ($this->isColumnModified(AdminUserPeer::PHONE_MOBILE)) $criteria->add(AdminUserPeer::PHONE_MOBILE, $this->phone_mobile);
		if ($this->isColumnModified(AdminUserPeer::NICKNAME)) $criteria->add(AdminUserPeer::NICKNAME, $this->nickname);
		if ($this->isColumnModified(AdminUserPeer::IS_ENABLED)) $criteria->add(AdminUserPeer::IS_ENABLED, $this->is_enabled);
		if ($this->isColumnModified(AdminUserPeer::CREATED_AT)) $criteria->add(AdminUserPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(AdminUserPeer::UPDATED_AT)) $criteria->add(AdminUserPeer::UPDATED_AT, $this->updated_at);

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
		$criteria = new Criteria(AdminUserPeer::DATABASE_NAME);
		$criteria->add(AdminUserPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of AdminUser (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setAdminUserGroupId($this->admin_user_group_id);
		$copyObj->setUsername($this->username);
		$copyObj->setPassword($this->password);
		$copyObj->setName($this->name);
		$copyObj->setEmail($this->email);
		$copyObj->setPhoneMobile($this->phone_mobile);
		$copyObj->setNickname($this->nickname);
		$copyObj->setIsEnabled($this->is_enabled);
		$copyObj->setCreatedAt($this->created_at);
		$copyObj->setUpdatedAt($this->updated_at);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getInformations() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addInformation($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getLogs() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addLog($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getRegulations() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addRegulation($relObj->copy($deepCopy));
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
	 * @return     AdminUser Clone of current object.
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
	 * @return     AdminUserPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new AdminUserPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a AdminUserGroup object.
	 *
	 * @param      AdminUserGroup $v
	 * @return     AdminUser The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setAdminUserGroup(AdminUserGroup $v = null)
	{
		if ($v === null) {
			$this->setAdminUserGroupId(NULL);
		} else {
			$this->setAdminUserGroupId($v->getId());
		}

		$this->aAdminUserGroup = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the AdminUserGroup object, it will not be re-added.
		if ($v !== null) {
			$v->addAdminUser($this);
		}

		return $this;
	}


	/**
	 * Get the associated AdminUserGroup object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     AdminUserGroup The associated AdminUserGroup object.
	 * @throws     PropelException
	 */
	public function getAdminUserGroup(PropelPDO $con = null)
	{
		if ($this->aAdminUserGroup === null && ($this->admin_user_group_id !== null)) {
			$this->aAdminUserGroup = AdminUserGroupQuery::create()->findPk($this->admin_user_group_id, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aAdminUserGroup->addAdminUsers($this);
			 */
		}
		return $this->aAdminUserGroup;
	}

	/**
	 * Clears out the collInformations collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addInformations()
	 */
	public function clearInformations()
	{
		$this->collInformations = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collInformations collection.
	 *
	 * By default this just sets the collInformations collection to an empty array (like clearcollInformations());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initInformations()
	{
		$this->collInformations = new PropelObjectCollection();
		$this->collInformations->setModel('Information');
	}

	/**
	 * Gets an array of Information objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this AdminUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Information[] List of Information objects
	 * @throws     PropelException
	 */
	public function getInformations($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collInformations || null !== $criteria) {
			if ($this->isNew() && null === $this->collInformations) {
				// return empty collection
				$this->initInformations();
			} else {
				$collInformations = InformationQuery::create(null, $criteria)
					->filterByAdminUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collInformations;
				}
				$this->collInformations = $collInformations;
			}
		}
		return $this->collInformations;
	}

	/**
	 * Returns the number of related Information objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Information objects.
	 * @throws     PropelException
	 */
	public function countInformations(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collInformations || null !== $criteria) {
			if ($this->isNew() && null === $this->collInformations) {
				return 0;
			} else {
				$query = InformationQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAdminUser($this)
					->count($con);
			}
		} else {
			return count($this->collInformations);
		}
	}

	/**
	 * Method called to associate a Information object to this object
	 * through the Information foreign key attribute.
	 *
	 * @param      Information $l Information
	 * @return     void
	 * @throws     PropelException
	 */
	public function addInformation(Information $l)
	{
		if ($this->collInformations === null) {
			$this->initInformations();
		}
		if (!$this->collInformations->contains($l)) { // only add it if the **same** object is not already associated
			$this->collInformations[]= $l;
			$l->setAdminUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AdminUser is new, it will return
	 * an empty collection; or if this AdminUser has previously
	 * been saved, it will retrieve related Informations from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AdminUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Information[] List of Information objects
	 */
	public function getInformationsJoinInformationCategory($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = InformationQuery::create(null, $criteria);
		$query->joinWith('InformationCategory', $join_behavior);

		return $this->getInformations($query, $con);
	}

	/**
	 * Clears out the collLogs collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addLogs()
	 */
	public function clearLogs()
	{
		$this->collLogs = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collLogs collection.
	 *
	 * By default this just sets the collLogs collection to an empty array (like clearcollLogs());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initLogs()
	{
		$this->collLogs = new PropelObjectCollection();
		$this->collLogs->setModel('Log');
	}

	/**
	 * Gets an array of Log objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this AdminUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Log[] List of Log objects
	 * @throws     PropelException
	 */
	public function getLogs($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collLogs || null !== $criteria) {
			if ($this->isNew() && null === $this->collLogs) {
				// return empty collection
				$this->initLogs();
			} else {
				$collLogs = LogQuery::create(null, $criteria)
					->filterByAdminUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collLogs;
				}
				$this->collLogs = $collLogs;
			}
		}
		return $this->collLogs;
	}

	/**
	 * Returns the number of related Log objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Log objects.
	 * @throws     PropelException
	 */
	public function countLogs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collLogs || null !== $criteria) {
			if ($this->isNew() && null === $this->collLogs) {
				return 0;
			} else {
				$query = LogQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAdminUser($this)
					->count($con);
			}
		} else {
			return count($this->collLogs);
		}
	}

	/**
	 * Method called to associate a Log object to this object
	 * through the Log foreign key attribute.
	 *
	 * @param      Log $l Log
	 * @return     void
	 * @throws     PropelException
	 */
	public function addLog(Log $l)
	{
		if ($this->collLogs === null) {
			$this->initLogs();
		}
		if (!$this->collLogs->contains($l)) { // only add it if the **same** object is not already associated
			$this->collLogs[]= $l;
			$l->setAdminUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AdminUser is new, it will return
	 * an empty collection; or if this AdminUser has previously
	 * been saved, it will retrieve related Logs from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AdminUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Log[] List of Log objects
	 */
	public function getLogsJoinLogEvent($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = LogQuery::create(null, $criteria);
		$query->joinWith('LogEvent', $join_behavior);

		return $this->getLogs($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AdminUser is new, it will return
	 * an empty collection; or if this AdminUser has previously
	 * been saved, it will retrieve related Logs from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AdminUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Log[] List of Log objects
	 */
	public function getLogsJoinApp($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = LogQuery::create(null, $criteria);
		$query->joinWith('App', $join_behavior);

		return $this->getLogs($query, $con);
	}

	/**
	 * Clears out the collRegulations collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addRegulations()
	 */
	public function clearRegulations()
	{
		$this->collRegulations = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collRegulations collection.
	 *
	 * By default this just sets the collRegulations collection to an empty array (like clearcollRegulations());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initRegulations()
	{
		$this->collRegulations = new PropelObjectCollection();
		$this->collRegulations->setModel('Regulation');
	}

	/**
	 * Gets an array of Regulation objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this AdminUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Regulation[] List of Regulation objects
	 * @throws     PropelException
	 */
	public function getRegulations($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collRegulations || null !== $criteria) {
			if ($this->isNew() && null === $this->collRegulations) {
				// return empty collection
				$this->initRegulations();
			} else {
				$collRegulations = RegulationQuery::create(null, $criteria)
					->filterByAdminUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collRegulations;
				}
				$this->collRegulations = $collRegulations;
			}
		}
		return $this->collRegulations;
	}

	/**
	 * Returns the number of related Regulation objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Regulation objects.
	 * @throws     PropelException
	 */
	public function countRegulations(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collRegulations || null !== $criteria) {
			if ($this->isNew() && null === $this->collRegulations) {
				return 0;
			} else {
				$query = RegulationQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAdminUser($this)
					->count($con);
			}
		} else {
			return count($this->collRegulations);
		}
	}

	/**
	 * Method called to associate a Regulation object to this object
	 * through the Regulation foreign key attribute.
	 *
	 * @param      Regulation $l Regulation
	 * @return     void
	 * @throws     PropelException
	 */
	public function addRegulation(Regulation $l)
	{
		if ($this->collRegulations === null) {
			$this->initRegulations();
		}
		if (!$this->collRegulations->contains($l)) { // only add it if the **same** object is not already associated
			$this->collRegulations[]= $l;
			$l->setAdminUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AdminUser is new, it will return
	 * an empty collection; or if this AdminUser has previously
	 * been saved, it will retrieve related Regulations from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AdminUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Regulation[] List of Regulation objects
	 */
	public function getRegulationsJoinRegulationCategory($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = RegulationQuery::create(null, $criteria);
		$query->joinWith('RegulationCategory', $join_behavior);

		return $this->getRegulations($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->admin_user_group_id = null;
		$this->username = null;
		$this->password = null;
		$this->name = null;
		$this->email = null;
		$this->phone_mobile = null;
		$this->nickname = null;
		$this->is_enabled = null;
		$this->created_at = null;
		$this->updated_at = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->applyDefaultValues();
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
			if ($this->collInformations) {
				foreach ((array) $this->collInformations as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collLogs) {
				foreach ((array) $this->collLogs as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collRegulations) {
				foreach ((array) $this->collRegulations as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collInformations = null;
		$this->collLogs = null;
		$this->collRegulations = null;
		$this->aAdminUserGroup = null;
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseAdminUser:' . $name))
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

} // BaseAdminUser
