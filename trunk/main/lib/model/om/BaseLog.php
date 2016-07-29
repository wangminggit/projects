<?php


/**
 * Base class that represents a row from the 'log' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseLog extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'LogPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        LogPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the log_event_id field.
	 * @var        int
	 */
	protected $log_event_id;

	/**
	 * The value for the app_id field.
	 * @var        int
	 */
	protected $app_id;

	/**
	 * The value for the description field.
	 * @var        string
	 */
	protected $description;

	/**
	 * The value for the parameters field.
	 * @var        string
	 */
	protected $parameters;

	/**
	 * The value for the ip field.
	 * @var        string
	 */
	protected $ip;

	/**
	 * The value for the object_id field.
	 * @var        int
	 */
	protected $object_id;

	/**
	 * The value for the created_by_admin_user_id field.
	 * @var        int
	 */
	protected $created_by_admin_user_id;

	/**
	 * The value for the created_at field.
	 * @var        int
	 */
	protected $created_at;

	/**
	 * @var        LogEvent
	 */
	protected $aLogEvent;

	/**
	 * @var        App
	 */
	protected $aApp;

	/**
	 * @var        AdminUser
	 */
	protected $aAdminUser;

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
	 * Get the [log_event_id] column value.
	 * 
	 * @return     int
	 */
	public function getLogEventId()
	{
		return $this->log_event_id;
	}

	/**
	 * Get the [app_id] column value.
	 * 
	 * @return     int
	 */
	public function getAppId()
	{
		return $this->app_id;
	}

	/**
	 * Get the [description] column value.
	 * 
	 * @return     string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Get the [parameters] column value.
	 * 
	 * @return     string
	 */
	public function getParameters()
	{
		return $this->parameters;
	}

	/**
	 * Get the [ip] column value.
	 * 
	 * @return     string
	 */
	public function getIp()
	{
		return $this->ip;
	}

	/**
	 * Get the [object_id] column value.
	 * 
	 * @return     int
	 */
	public function getObjectId()
	{
		return $this->object_id;
	}

	/**
	 * Get the [created_by_admin_user_id] column value.
	 * 
	 * @return     int
	 */
	public function getCreatedByAdminUserId()
	{
		return $this->created_by_admin_user_id;
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
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Log The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = LogPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [log_event_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Log The current object (for fluent API support)
	 */
	public function setLogEventId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->log_event_id !== $v) {
			$this->log_event_id = $v;
			$this->modifiedColumns[] = LogPeer::LOG_EVENT_ID;
		}

		if ($this->aLogEvent !== null && $this->aLogEvent->getId() !== $v) {
			$this->aLogEvent = null;
		}

		return $this;
	} // setLogEventId()

	/**
	 * Set the value of [app_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Log The current object (for fluent API support)
	 */
	public function setAppId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->app_id !== $v) {
			$this->app_id = $v;
			$this->modifiedColumns[] = LogPeer::APP_ID;
		}

		if ($this->aApp !== null && $this->aApp->getId() !== $v) {
			$this->aApp = null;
		}

		return $this;
	} // setAppId()

	/**
	 * Set the value of [description] column.
	 * 
	 * @param      string $v new value
	 * @return     Log The current object (for fluent API support)
	 */
	public function setDescription($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = LogPeer::DESCRIPTION;
		}

		return $this;
	} // setDescription()

	/**
	 * Set the value of [parameters] column.
	 * 
	 * @param      string $v new value
	 * @return     Log The current object (for fluent API support)
	 */
	public function setParameters($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->parameters !== $v) {
			$this->parameters = $v;
			$this->modifiedColumns[] = LogPeer::PARAMETERS;
		}

		return $this;
	} // setParameters()

	/**
	 * Set the value of [ip] column.
	 * 
	 * @param      string $v new value
	 * @return     Log The current object (for fluent API support)
	 */
	public function setIp($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->ip !== $v) {
			$this->ip = $v;
			$this->modifiedColumns[] = LogPeer::IP;
		}

		return $this;
	} // setIp()

	/**
	 * Set the value of [object_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Log The current object (for fluent API support)
	 */
	public function setObjectId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->object_id !== $v) {
			$this->object_id = $v;
			$this->modifiedColumns[] = LogPeer::OBJECT_ID;
		}

		return $this;
	} // setObjectId()

	/**
	 * Set the value of [created_by_admin_user_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Log The current object (for fluent API support)
	 */
	public function setCreatedByAdminUserId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->created_by_admin_user_id !== $v) {
			$this->created_by_admin_user_id = $v;
			$this->modifiedColumns[] = LogPeer::CREATED_BY_ADMIN_USER_ID;
		}

		if ($this->aAdminUser !== null && $this->aAdminUser->getId() !== $v) {
			$this->aAdminUser = null;
		}

		return $this;
	} // setCreatedByAdminUserId()

	/**
	 * Set the value of [created_at] column.
	 * 
	 * @param      int $v new value
	 * @return     Log The current object (for fluent API support)
	 */
	public function setCreatedAt($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->created_at !== $v) {
			$this->created_at = $v;
			$this->modifiedColumns[] = LogPeer::CREATED_AT;
		}

		return $this;
	} // setCreatedAt()

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
			$this->log_event_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->app_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->description = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->parameters = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->ip = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->object_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->created_by_admin_user_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->created_at = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 9; // 9 = LogPeer::NUM_COLUMNS - LogPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Log object", $e);
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

		if ($this->aLogEvent !== null && $this->log_event_id !== $this->aLogEvent->getId()) {
			$this->aLogEvent = null;
		}
		if ($this->aApp !== null && $this->app_id !== $this->aApp->getId()) {
			$this->aApp = null;
		}
		if ($this->aAdminUser !== null && $this->created_by_admin_user_id !== $this->aAdminUser->getId()) {
			$this->aAdminUser = null;
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
			$con = Propel::getConnection(LogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = LogPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aLogEvent = null;
			$this->aApp = null;
			$this->aAdminUser = null;
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
			$con = Propel::getConnection(LogPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseLog:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			    return;
			  }
			}

			if ($ret) {
				LogQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseLog:delete:post') as $callable)
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
			$con = Propel::getConnection(LogPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseLog:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			  	$con->commit();
			    return $affectedRows;
			  }
			}

			// symfony_timestampable behavior
			
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
				// symfony_timestampable behavior
				if (!$this->isColumnModified(LogPeer::CREATED_AT))
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
				foreach (sfMixer::getCallables('BaseLog:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				LogPeer::addInstanceToPool($this);
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

			if ($this->aLogEvent !== null) {
				if ($this->aLogEvent->isModified() || $this->aLogEvent->isNew()) {
					$affectedRows += $this->aLogEvent->save($con);
				}
				$this->setLogEvent($this->aLogEvent);
			}

			if ($this->aApp !== null) {
				if ($this->aApp->isModified() || $this->aApp->isNew()) {
					$affectedRows += $this->aApp->save($con);
				}
				$this->setApp($this->aApp);
			}

			if ($this->aAdminUser !== null) {
				if ($this->aAdminUser->isModified() || $this->aAdminUser->isNew()) {
					$affectedRows += $this->aAdminUser->save($con);
				}
				$this->setAdminUser($this->aAdminUser);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = LogPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(LogPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.LogPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += LogPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
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

			if ($this->aLogEvent !== null) {
				if (!$this->aLogEvent->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLogEvent->getValidationFailures());
				}
			}

			if ($this->aApp !== null) {
				if (!$this->aApp->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aApp->getValidationFailures());
				}
			}

			if ($this->aAdminUser !== null) {
				if (!$this->aAdminUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAdminUser->getValidationFailures());
				}
			}


			if (($retval = LogPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$pos = LogPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getLogEventId();
				break;
			case 2:
				return $this->getAppId();
				break;
			case 3:
				return $this->getDescription();
				break;
			case 4:
				return $this->getParameters();
				break;
			case 5:
				return $this->getIp();
				break;
			case 6:
				return $this->getObjectId();
				break;
			case 7:
				return $this->getCreatedByAdminUserId();
				break;
			case 8:
				return $this->getCreatedAt();
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
		$keys = LogPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getLogEventId(),
			$keys[2] => $this->getAppId(),
			$keys[3] => $this->getDescription(),
			$keys[4] => $this->getParameters(),
			$keys[5] => $this->getIp(),
			$keys[6] => $this->getObjectId(),
			$keys[7] => $this->getCreatedByAdminUserId(),
			$keys[8] => $this->getCreatedAt(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aLogEvent) {
				$result['LogEvent'] = $this->aLogEvent->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aApp) {
				$result['App'] = $this->aApp->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aAdminUser) {
				$result['AdminUser'] = $this->aAdminUser->toArray($keyType, $includeLazyLoadColumns, true);
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
		$pos = LogPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setLogEventId($value);
				break;
			case 2:
				$this->setAppId($value);
				break;
			case 3:
				$this->setDescription($value);
				break;
			case 4:
				$this->setParameters($value);
				break;
			case 5:
				$this->setIp($value);
				break;
			case 6:
				$this->setObjectId($value);
				break;
			case 7:
				$this->setCreatedByAdminUserId($value);
				break;
			case 8:
				$this->setCreatedAt($value);
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
		$keys = LogPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setLogEventId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAppId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDescription($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setParameters($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setIp($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setObjectId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedByAdminUserId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCreatedAt($arr[$keys[8]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(LogPeer::DATABASE_NAME);

		if ($this->isColumnModified(LogPeer::ID)) $criteria->add(LogPeer::ID, $this->id);
		if ($this->isColumnModified(LogPeer::LOG_EVENT_ID)) $criteria->add(LogPeer::LOG_EVENT_ID, $this->log_event_id);
		if ($this->isColumnModified(LogPeer::APP_ID)) $criteria->add(LogPeer::APP_ID, $this->app_id);
		if ($this->isColumnModified(LogPeer::DESCRIPTION)) $criteria->add(LogPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(LogPeer::PARAMETERS)) $criteria->add(LogPeer::PARAMETERS, $this->parameters);
		if ($this->isColumnModified(LogPeer::IP)) $criteria->add(LogPeer::IP, $this->ip);
		if ($this->isColumnModified(LogPeer::OBJECT_ID)) $criteria->add(LogPeer::OBJECT_ID, $this->object_id);
		if ($this->isColumnModified(LogPeer::CREATED_BY_ADMIN_USER_ID)) $criteria->add(LogPeer::CREATED_BY_ADMIN_USER_ID, $this->created_by_admin_user_id);
		if ($this->isColumnModified(LogPeer::CREATED_AT)) $criteria->add(LogPeer::CREATED_AT, $this->created_at);

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
		$criteria = new Criteria(LogPeer::DATABASE_NAME);
		$criteria->add(LogPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Log (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setLogEventId($this->log_event_id);
		$copyObj->setAppId($this->app_id);
		$copyObj->setDescription($this->description);
		$copyObj->setParameters($this->parameters);
		$copyObj->setIp($this->ip);
		$copyObj->setObjectId($this->object_id);
		$copyObj->setCreatedByAdminUserId($this->created_by_admin_user_id);
		$copyObj->setCreatedAt($this->created_at);

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
	 * @return     Log Clone of current object.
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
	 * @return     LogPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new LogPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a LogEvent object.
	 *
	 * @param      LogEvent $v
	 * @return     Log The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setLogEvent(LogEvent $v = null)
	{
		if ($v === null) {
			$this->setLogEventId(NULL);
		} else {
			$this->setLogEventId($v->getId());
		}

		$this->aLogEvent = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the LogEvent object, it will not be re-added.
		if ($v !== null) {
			$v->addLog($this);
		}

		return $this;
	}


	/**
	 * Get the associated LogEvent object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     LogEvent The associated LogEvent object.
	 * @throws     PropelException
	 */
	public function getLogEvent(PropelPDO $con = null)
	{
		if ($this->aLogEvent === null && ($this->log_event_id !== null)) {
			$this->aLogEvent = LogEventQuery::create()->findPk($this->log_event_id, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aLogEvent->addLogs($this);
			 */
		}
		return $this->aLogEvent;
	}

	/**
	 * Declares an association between this object and a App object.
	 *
	 * @param      App $v
	 * @return     Log The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setApp(App $v = null)
	{
		if ($v === null) {
			$this->setAppId(NULL);
		} else {
			$this->setAppId($v->getId());
		}

		$this->aApp = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the App object, it will not be re-added.
		if ($v !== null) {
			$v->addLog($this);
		}

		return $this;
	}


	/**
	 * Get the associated App object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     App The associated App object.
	 * @throws     PropelException
	 */
	public function getApp(PropelPDO $con = null)
	{
		if ($this->aApp === null && ($this->app_id !== null)) {
			$this->aApp = AppQuery::create()->findPk($this->app_id, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aApp->addLogs($this);
			 */
		}
		return $this->aApp;
	}

	/**
	 * Declares an association between this object and a AdminUser object.
	 *
	 * @param      AdminUser $v
	 * @return     Log The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setAdminUser(AdminUser $v = null)
	{
		if ($v === null) {
			$this->setCreatedByAdminUserId(NULL);
		} else {
			$this->setCreatedByAdminUserId($v->getId());
		}

		$this->aAdminUser = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the AdminUser object, it will not be re-added.
		if ($v !== null) {
			$v->addLog($this);
		}

		return $this;
	}


	/**
	 * Get the associated AdminUser object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     AdminUser The associated AdminUser object.
	 * @throws     PropelException
	 */
	public function getAdminUser(PropelPDO $con = null)
	{
		if ($this->aAdminUser === null && ($this->created_by_admin_user_id !== null)) {
			$this->aAdminUser = AdminUserQuery::create()->findPk($this->created_by_admin_user_id, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aAdminUser->addLogs($this);
			 */
		}
		return $this->aAdminUser;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->log_event_id = null;
		$this->app_id = null;
		$this->description = null;
		$this->parameters = null;
		$this->ip = null;
		$this->object_id = null;
		$this->created_by_admin_user_id = null;
		$this->created_at = null;
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
		} // if ($deep)

		$this->aLogEvent = null;
		$this->aApp = null;
		$this->aAdminUser = null;
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseLog:' . $name))
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

} // BaseLog
