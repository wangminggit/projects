<?php


/**
 * Base class that represents a row from the 'information' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseInformation extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'InformationPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        InformationPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the information_category_id field.
	 * @var        int
	 */
	protected $information_category_id;

	/**
	 * The value for the created_by_admin_user_id field.
	 * @var        int
	 */
	protected $created_by_admin_user_id;

	/**
	 * The value for the title field.
	 * @var        string
	 */
	protected $title;

	/**
	 * The value for the release_date field.
	 * @var        string
	 */
	protected $release_date;

	/**
	 * The value for the image field.
	 * @var        string
	 */
	protected $image;

	/**
	 * The value for the summary field.
	 * @var        string
	 */
	protected $summary;

	/**
	 * The value for the body field.
	 * @var        string
	 */
	protected $body;

	/**
	 * The value for the is_enable field.
	 * Note: this column has a database default value of: 1
	 * @var        int
	 */
	protected $is_enable;

	/**
	 * The value for the position field.
	 * @var        int
	 */
	protected $position;

	/**
	 * The value for the page_view field.
	 * @var        int
	 */
	protected $page_view;

	/**
	 * The value for the seo_keywords field.
	 * @var        string
	 */
	protected $seo_keywords;

	/**
	 * The value for the seo_description field.
	 * @var        string
	 */
	protected $seo_description;

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
	 * @var        InformationCategory
	 */
	protected $aInformationCategory;

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
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->is_enable = 1;
	}

	/**
	 * Initializes internal state of BaseInformation object.
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
	 * Get the [information_category_id] column value.
	 * 
	 * @return     int
	 */
	public function getInformationCategoryId()
	{
		return $this->information_category_id;
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
	 * Get the [title] column value.
	 * 
	 * @return     string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * Get the [optionally formatted] temporal [release_date] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getReleaseDate($format = 'Y-m-d')
	{
		if ($this->release_date === null) {
			return null;
		}


		if ($this->release_date === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->release_date);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->release_date, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [image] column value.
	 * 
	 * @return     string
	 */
	public function getImage()
	{
		return $this->image;
	}

	/**
	 * Get the [summary] column value.
	 * 
	 * @return     string
	 */
	public function getSummary()
	{
		return $this->summary;
	}

	/**
	 * Get the [body] column value.
	 * 
	 * @return     string
	 */
	public function getBody()
	{
		return $this->body;
	}

	/**
	 * Get the [is_enable] column value.
	 * 
	 * @return     int
	 */
	public function getIsEnable()
	{
		return $this->is_enable;
	}

	/**
	 * Get the [position] column value.
	 * 
	 * @return     int
	 */
	public function getPosition()
	{
		return $this->position;
	}

	/**
	 * Get the [page_view] column value.
	 * 
	 * @return     int
	 */
	public function getPageView()
	{
		return $this->page_view;
	}

	/**
	 * Get the [seo_keywords] column value.
	 * 
	 * @return     string
	 */
	public function getSeoKeywords()
	{
		return $this->seo_keywords;
	}

	/**
	 * Get the [seo_description] column value.
	 * 
	 * @return     string
	 */
	public function getSeoDescription()
	{
		return $this->seo_description;
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
	 * @return     Information The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = InformationPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [information_category_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Information The current object (for fluent API support)
	 */
	public function setInformationCategoryId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->information_category_id !== $v) {
			$this->information_category_id = $v;
			$this->modifiedColumns[] = InformationPeer::INFORMATION_CATEGORY_ID;
		}

		if ($this->aInformationCategory !== null && $this->aInformationCategory->getId() !== $v) {
			$this->aInformationCategory = null;
		}

		return $this;
	} // setInformationCategoryId()

	/**
	 * Set the value of [created_by_admin_user_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Information The current object (for fluent API support)
	 */
	public function setCreatedByAdminUserId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->created_by_admin_user_id !== $v) {
			$this->created_by_admin_user_id = $v;
			$this->modifiedColumns[] = InformationPeer::CREATED_BY_ADMIN_USER_ID;
		}

		if ($this->aAdminUser !== null && $this->aAdminUser->getId() !== $v) {
			$this->aAdminUser = null;
		}

		return $this;
	} // setCreatedByAdminUserId()

	/**
	 * Set the value of [title] column.
	 * 
	 * @param      string $v new value
	 * @return     Information The current object (for fluent API support)
	 */
	public function setTitle($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = InformationPeer::TITLE;
		}

		return $this;
	} // setTitle()

	/**
	 * Sets the value of [release_date] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Information The current object (for fluent API support)
	 */
	public function setReleaseDate($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->release_date !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->release_date !== null && $tmpDt = new DateTime($this->release_date)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->release_date = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = InformationPeer::RELEASE_DATE;
			}
		} // if either are not null

		return $this;
	} // setReleaseDate()

	/**
	 * Set the value of [image] column.
	 * 
	 * @param      string $v new value
	 * @return     Information The current object (for fluent API support)
	 */
	public function setImage($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->image !== $v) {
			$this->image = $v;
			$this->modifiedColumns[] = InformationPeer::IMAGE;
		}

		return $this;
	} // setImage()

	/**
	 * Set the value of [summary] column.
	 * 
	 * @param      string $v new value
	 * @return     Information The current object (for fluent API support)
	 */
	public function setSummary($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->summary !== $v) {
			$this->summary = $v;
			$this->modifiedColumns[] = InformationPeer::SUMMARY;
		}

		return $this;
	} // setSummary()

	/**
	 * Set the value of [body] column.
	 * 
	 * @param      string $v new value
	 * @return     Information The current object (for fluent API support)
	 */
	public function setBody($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->body !== $v) {
			$this->body = $v;
			$this->modifiedColumns[] = InformationPeer::BODY;
		}

		return $this;
	} // setBody()

	/**
	 * Set the value of [is_enable] column.
	 * 
	 * @param      int $v new value
	 * @return     Information The current object (for fluent API support)
	 */
	public function setIsEnable($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->is_enable !== $v || $this->isNew()) {
			$this->is_enable = $v;
			$this->modifiedColumns[] = InformationPeer::IS_ENABLE;
		}

		return $this;
	} // setIsEnable()

	/**
	 * Set the value of [position] column.
	 * 
	 * @param      int $v new value
	 * @return     Information The current object (for fluent API support)
	 */
	public function setPosition($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->position !== $v) {
			$this->position = $v;
			$this->modifiedColumns[] = InformationPeer::POSITION;
		}

		return $this;
	} // setPosition()

	/**
	 * Set the value of [page_view] column.
	 * 
	 * @param      int $v new value
	 * @return     Information The current object (for fluent API support)
	 */
	public function setPageView($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->page_view !== $v) {
			$this->page_view = $v;
			$this->modifiedColumns[] = InformationPeer::PAGE_VIEW;
		}

		return $this;
	} // setPageView()

	/**
	 * Set the value of [seo_keywords] column.
	 * 
	 * @param      string $v new value
	 * @return     Information The current object (for fluent API support)
	 */
	public function setSeoKeywords($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->seo_keywords !== $v) {
			$this->seo_keywords = $v;
			$this->modifiedColumns[] = InformationPeer::SEO_KEYWORDS;
		}

		return $this;
	} // setSeoKeywords()

	/**
	 * Set the value of [seo_description] column.
	 * 
	 * @param      string $v new value
	 * @return     Information The current object (for fluent API support)
	 */
	public function setSeoDescription($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->seo_description !== $v) {
			$this->seo_description = $v;
			$this->modifiedColumns[] = InformationPeer::SEO_DESCRIPTION;
		}

		return $this;
	} // setSeoDescription()

	/**
	 * Set the value of [created_at] column.
	 * 
	 * @param      int $v new value
	 * @return     Information The current object (for fluent API support)
	 */
	public function setCreatedAt($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->created_at !== $v) {
			$this->created_at = $v;
			$this->modifiedColumns[] = InformationPeer::CREATED_AT;
		}

		return $this;
	} // setCreatedAt()

	/**
	 * Set the value of [updated_at] column.
	 * 
	 * @param      int $v new value
	 * @return     Information The current object (for fluent API support)
	 */
	public function setUpdatedAt($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->updated_at !== $v) {
			$this->updated_at = $v;
			$this->modifiedColumns[] = InformationPeer::UPDATED_AT;
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
			if ($this->is_enable !== 1) {
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
			$this->information_category_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->created_by_admin_user_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->title = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->release_date = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->image = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->summary = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->body = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->is_enable = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->position = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->page_view = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
			$this->seo_keywords = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->seo_description = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->created_at = ($row[$startcol + 13] !== null) ? (int) $row[$startcol + 13] : null;
			$this->updated_at = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 15; // 15 = InformationPeer::NUM_COLUMNS - InformationPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Information object", $e);
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

		if ($this->aInformationCategory !== null && $this->information_category_id !== $this->aInformationCategory->getId()) {
			$this->aInformationCategory = null;
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
			$con = Propel::getConnection(InformationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = InformationPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aInformationCategory = null;
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
			$con = Propel::getConnection(InformationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseInformation:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			    return;
			  }
			}

			if ($ret) {
				InformationQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseInformation:delete:post') as $callable)
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
			$con = Propel::getConnection(InformationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseInformation:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			  	$con->commit();
			    return $affectedRows;
			  }
			}

			// symfony_timestampable behavior
			if ($this->isModified() && !$this->isColumnModified(InformationPeer::UPDATED_AT))
			{
			  $this->setUpdatedAt(time());
			}

			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
				// symfony_timestampable behavior
				if (!$this->isColumnModified(InformationPeer::CREATED_AT))
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
				foreach (sfMixer::getCallables('BaseInformation:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				InformationPeer::addInstanceToPool($this);
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

			if ($this->aInformationCategory !== null) {
				if ($this->aInformationCategory->isModified() || $this->aInformationCategory->isNew()) {
					$affectedRows += $this->aInformationCategory->save($con);
				}
				$this->setInformationCategory($this->aInformationCategory);
			}

			if ($this->aAdminUser !== null) {
				if ($this->aAdminUser->isModified() || $this->aAdminUser->isNew()) {
					$affectedRows += $this->aAdminUser->save($con);
				}
				$this->setAdminUser($this->aAdminUser);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = InformationPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(InformationPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.InformationPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += InformationPeer::doUpdate($this, $con);
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

			if ($this->aInformationCategory !== null) {
				if (!$this->aInformationCategory->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aInformationCategory->getValidationFailures());
				}
			}

			if ($this->aAdminUser !== null) {
				if (!$this->aAdminUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAdminUser->getValidationFailures());
				}
			}


			if (($retval = InformationPeer::doValidate($this, $columns)) !== true) {
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
		$pos = InformationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getInformationCategoryId();
				break;
			case 2:
				return $this->getCreatedByAdminUserId();
				break;
			case 3:
				return $this->getTitle();
				break;
			case 4:
				return $this->getReleaseDate();
				break;
			case 5:
				return $this->getImage();
				break;
			case 6:
				return $this->getSummary();
				break;
			case 7:
				return $this->getBody();
				break;
			case 8:
				return $this->getIsEnable();
				break;
			case 9:
				return $this->getPosition();
				break;
			case 10:
				return $this->getPageView();
				break;
			case 11:
				return $this->getSeoKeywords();
				break;
			case 12:
				return $this->getSeoDescription();
				break;
			case 13:
				return $this->getCreatedAt();
				break;
			case 14:
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
		$keys = InformationPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getInformationCategoryId(),
			$keys[2] => $this->getCreatedByAdminUserId(),
			$keys[3] => $this->getTitle(),
			$keys[4] => $this->getReleaseDate(),
			$keys[5] => $this->getImage(),
			$keys[6] => $this->getSummary(),
			$keys[7] => $this->getBody(),
			$keys[8] => $this->getIsEnable(),
			$keys[9] => $this->getPosition(),
			$keys[10] => $this->getPageView(),
			$keys[11] => $this->getSeoKeywords(),
			$keys[12] => $this->getSeoDescription(),
			$keys[13] => $this->getCreatedAt(),
			$keys[14] => $this->getUpdatedAt(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aInformationCategory) {
				$result['InformationCategory'] = $this->aInformationCategory->toArray($keyType, $includeLazyLoadColumns, true);
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
		$pos = InformationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setInformationCategoryId($value);
				break;
			case 2:
				$this->setCreatedByAdminUserId($value);
				break;
			case 3:
				$this->setTitle($value);
				break;
			case 4:
				$this->setReleaseDate($value);
				break;
			case 5:
				$this->setImage($value);
				break;
			case 6:
				$this->setSummary($value);
				break;
			case 7:
				$this->setBody($value);
				break;
			case 8:
				$this->setIsEnable($value);
				break;
			case 9:
				$this->setPosition($value);
				break;
			case 10:
				$this->setPageView($value);
				break;
			case 11:
				$this->setSeoKeywords($value);
				break;
			case 12:
				$this->setSeoDescription($value);
				break;
			case 13:
				$this->setCreatedAt($value);
				break;
			case 14:
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
		$keys = InformationPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setInformationCategoryId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCreatedByAdminUserId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTitle($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setReleaseDate($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setImage($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setSummary($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setBody($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setIsEnable($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setPosition($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setPageView($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setSeoKeywords($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setSeoDescription($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCreatedAt($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setUpdatedAt($arr[$keys[14]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(InformationPeer::DATABASE_NAME);

		if ($this->isColumnModified(InformationPeer::ID)) $criteria->add(InformationPeer::ID, $this->id);
		if ($this->isColumnModified(InformationPeer::INFORMATION_CATEGORY_ID)) $criteria->add(InformationPeer::INFORMATION_CATEGORY_ID, $this->information_category_id);
		if ($this->isColumnModified(InformationPeer::CREATED_BY_ADMIN_USER_ID)) $criteria->add(InformationPeer::CREATED_BY_ADMIN_USER_ID, $this->created_by_admin_user_id);
		if ($this->isColumnModified(InformationPeer::TITLE)) $criteria->add(InformationPeer::TITLE, $this->title);
		if ($this->isColumnModified(InformationPeer::RELEASE_DATE)) $criteria->add(InformationPeer::RELEASE_DATE, $this->release_date);
		if ($this->isColumnModified(InformationPeer::IMAGE)) $criteria->add(InformationPeer::IMAGE, $this->image);
		if ($this->isColumnModified(InformationPeer::SUMMARY)) $criteria->add(InformationPeer::SUMMARY, $this->summary);
		if ($this->isColumnModified(InformationPeer::BODY)) $criteria->add(InformationPeer::BODY, $this->body);
		if ($this->isColumnModified(InformationPeer::IS_ENABLE)) $criteria->add(InformationPeer::IS_ENABLE, $this->is_enable);
		if ($this->isColumnModified(InformationPeer::POSITION)) $criteria->add(InformationPeer::POSITION, $this->position);
		if ($this->isColumnModified(InformationPeer::PAGE_VIEW)) $criteria->add(InformationPeer::PAGE_VIEW, $this->page_view);
		if ($this->isColumnModified(InformationPeer::SEO_KEYWORDS)) $criteria->add(InformationPeer::SEO_KEYWORDS, $this->seo_keywords);
		if ($this->isColumnModified(InformationPeer::SEO_DESCRIPTION)) $criteria->add(InformationPeer::SEO_DESCRIPTION, $this->seo_description);
		if ($this->isColumnModified(InformationPeer::CREATED_AT)) $criteria->add(InformationPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(InformationPeer::UPDATED_AT)) $criteria->add(InformationPeer::UPDATED_AT, $this->updated_at);

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
		$criteria = new Criteria(InformationPeer::DATABASE_NAME);
		$criteria->add(InformationPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Information (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setInformationCategoryId($this->information_category_id);
		$copyObj->setCreatedByAdminUserId($this->created_by_admin_user_id);
		$copyObj->setTitle($this->title);
		$copyObj->setReleaseDate($this->release_date);
		$copyObj->setImage($this->image);
		$copyObj->setSummary($this->summary);
		$copyObj->setBody($this->body);
		$copyObj->setIsEnable($this->is_enable);
		$copyObj->setPosition($this->position);
		$copyObj->setPageView($this->page_view);
		$copyObj->setSeoKeywords($this->seo_keywords);
		$copyObj->setSeoDescription($this->seo_description);
		$copyObj->setCreatedAt($this->created_at);
		$copyObj->setUpdatedAt($this->updated_at);

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
	 * @return     Information Clone of current object.
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
	 * @return     InformationPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new InformationPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a InformationCategory object.
	 *
	 * @param      InformationCategory $v
	 * @return     Information The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setInformationCategory(InformationCategory $v = null)
	{
		if ($v === null) {
			$this->setInformationCategoryId(NULL);
		} else {
			$this->setInformationCategoryId($v->getId());
		}

		$this->aInformationCategory = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the InformationCategory object, it will not be re-added.
		if ($v !== null) {
			$v->addInformation($this);
		}

		return $this;
	}


	/**
	 * Get the associated InformationCategory object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     InformationCategory The associated InformationCategory object.
	 * @throws     PropelException
	 */
	public function getInformationCategory(PropelPDO $con = null)
	{
		if ($this->aInformationCategory === null && ($this->information_category_id !== null)) {
			$this->aInformationCategory = InformationCategoryQuery::create()->findPk($this->information_category_id, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aInformationCategory->addInformations($this);
			 */
		}
		return $this->aInformationCategory;
	}

	/**
	 * Declares an association between this object and a AdminUser object.
	 *
	 * @param      AdminUser $v
	 * @return     Information The current object (for fluent API support)
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
			$v->addInformation($this);
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
				 $this->aAdminUser->addInformations($this);
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
		$this->information_category_id = null;
		$this->created_by_admin_user_id = null;
		$this->title = null;
		$this->release_date = null;
		$this->image = null;
		$this->summary = null;
		$this->body = null;
		$this->is_enable = null;
		$this->position = null;
		$this->page_view = null;
		$this->seo_keywords = null;
		$this->seo_description = null;
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
		} // if ($deep)

		$this->aInformationCategory = null;
		$this->aAdminUser = null;
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseInformation:' . $name))
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

} // BaseInformation
