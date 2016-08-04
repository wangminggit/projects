<?php


/**
 * Base class that represents a query for the 'admin_user' table.
 *
 * 
 *
 * @method     AdminUserQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AdminUserQuery orderByAdminUserGroupId($order = Criteria::ASC) Order by the admin_user_group_id column
 * @method     AdminUserQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     AdminUserQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     AdminUserQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     AdminUserQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     AdminUserQuery orderByPhoneMobile($order = Criteria::ASC) Order by the phone_mobile column
 * @method     AdminUserQuery orderByNickname($order = Criteria::ASC) Order by the nickname column
 * @method     AdminUserQuery orderByIsEnabled($order = Criteria::ASC) Order by the is_enabled column
 * @method     AdminUserQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     AdminUserQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     AdminUserQuery groupById() Group by the id column
 * @method     AdminUserQuery groupByAdminUserGroupId() Group by the admin_user_group_id column
 * @method     AdminUserQuery groupByUsername() Group by the username column
 * @method     AdminUserQuery groupByPassword() Group by the password column
 * @method     AdminUserQuery groupByName() Group by the name column
 * @method     AdminUserQuery groupByEmail() Group by the email column
 * @method     AdminUserQuery groupByPhoneMobile() Group by the phone_mobile column
 * @method     AdminUserQuery groupByNickname() Group by the nickname column
 * @method     AdminUserQuery groupByIsEnabled() Group by the is_enabled column
 * @method     AdminUserQuery groupByCreatedAt() Group by the created_at column
 * @method     AdminUserQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     AdminUserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AdminUserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AdminUserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AdminUserQuery leftJoinAdminUserGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the AdminUserGroup relation
 * @method     AdminUserQuery rightJoinAdminUserGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AdminUserGroup relation
 * @method     AdminUserQuery innerJoinAdminUserGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the AdminUserGroup relation
 *
 * @method     AdminUserQuery leftJoinInformation($relationAlias = null) Adds a LEFT JOIN clause to the query using the Information relation
 * @method     AdminUserQuery rightJoinInformation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Information relation
 * @method     AdminUserQuery innerJoinInformation($relationAlias = null) Adds a INNER JOIN clause to the query using the Information relation
 *
 * @method     AdminUserQuery leftJoinLog($relationAlias = null) Adds a LEFT JOIN clause to the query using the Log relation
 * @method     AdminUserQuery rightJoinLog($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Log relation
 * @method     AdminUserQuery innerJoinLog($relationAlias = null) Adds a INNER JOIN clause to the query using the Log relation
 *
 * @method     AdminUserQuery leftJoinRegulation($relationAlias = null) Adds a LEFT JOIN clause to the query using the Regulation relation
 * @method     AdminUserQuery rightJoinRegulation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Regulation relation
 * @method     AdminUserQuery innerJoinRegulation($relationAlias = null) Adds a INNER JOIN clause to the query using the Regulation relation
 *
 * @method     AdminUser findOne(PropelPDO $con = null) Return the first AdminUser matching the query
 * @method     AdminUser findOneOrCreate(PropelPDO $con = null) Return the first AdminUser matching the query, or a new AdminUser object populated from the query conditions when no match is found
 *
 * @method     AdminUser findOneById(int $id) Return the first AdminUser filtered by the id column
 * @method     AdminUser findOneByAdminUserGroupId(int $admin_user_group_id) Return the first AdminUser filtered by the admin_user_group_id column
 * @method     AdminUser findOneByUsername(string $username) Return the first AdminUser filtered by the username column
 * @method     AdminUser findOneByPassword(string $password) Return the first AdminUser filtered by the password column
 * @method     AdminUser findOneByName(string $name) Return the first AdminUser filtered by the name column
 * @method     AdminUser findOneByEmail(string $email) Return the first AdminUser filtered by the email column
 * @method     AdminUser findOneByPhoneMobile(string $phone_mobile) Return the first AdminUser filtered by the phone_mobile column
 * @method     AdminUser findOneByNickname(string $nickname) Return the first AdminUser filtered by the nickname column
 * @method     AdminUser findOneByIsEnabled(int $is_enabled) Return the first AdminUser filtered by the is_enabled column
 * @method     AdminUser findOneByCreatedAt(int $created_at) Return the first AdminUser filtered by the created_at column
 * @method     AdminUser findOneByUpdatedAt(int $updated_at) Return the first AdminUser filtered by the updated_at column
 *
 * @method     array findById(int $id) Return AdminUser objects filtered by the id column
 * @method     array findByAdminUserGroupId(int $admin_user_group_id) Return AdminUser objects filtered by the admin_user_group_id column
 * @method     array findByUsername(string $username) Return AdminUser objects filtered by the username column
 * @method     array findByPassword(string $password) Return AdminUser objects filtered by the password column
 * @method     array findByName(string $name) Return AdminUser objects filtered by the name column
 * @method     array findByEmail(string $email) Return AdminUser objects filtered by the email column
 * @method     array findByPhoneMobile(string $phone_mobile) Return AdminUser objects filtered by the phone_mobile column
 * @method     array findByNickname(string $nickname) Return AdminUser objects filtered by the nickname column
 * @method     array findByIsEnabled(int $is_enabled) Return AdminUser objects filtered by the is_enabled column
 * @method     array findByCreatedAt(int $created_at) Return AdminUser objects filtered by the created_at column
 * @method     array findByUpdatedAt(int $updated_at) Return AdminUser objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseAdminUserQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseAdminUserQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'AdminUser', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AdminUserQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AdminUserQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AdminUserQuery) {
			return $criteria;
		}
		$query = new AdminUserQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    AdminUser|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = AdminUserPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
			// the object is alredy in the instance pool
			return $obj;
		} else {
			// the object has not been requested yet, or the formatter is not an object formatter
			$criteria = $this->isKeepQuery() ? clone $this : $this;
			$stmt = $criteria
				->filterByPrimaryKey($key)
				->getSelectStatement($con);
			return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
		}
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{	
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		return $this
			->filterByPrimaryKeys($keys)
			->find($con);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    AdminUserQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AdminUserPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AdminUserQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AdminUserPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminUserQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AdminUserPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the admin_user_group_id column
	 * 
	 * @param     int|array $adminUserGroupId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminUserQuery The current query, for fluid interface
	 */
	public function filterByAdminUserGroupId($adminUserGroupId = null, $comparison = null)
	{
		if (is_array($adminUserGroupId)) {
			$useMinMax = false;
			if (isset($adminUserGroupId['min'])) {
				$this->addUsingAlias(AdminUserPeer::ADMIN_USER_GROUP_ID, $adminUserGroupId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($adminUserGroupId['max'])) {
				$this->addUsingAlias(AdminUserPeer::ADMIN_USER_GROUP_ID, $adminUserGroupId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AdminUserPeer::ADMIN_USER_GROUP_ID, $adminUserGroupId, $comparison);
	}

	/**
	 * Filter the query on the username column
	 * 
	 * @param     string $username The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminUserQuery The current query, for fluid interface
	 */
	public function filterByUsername($username = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($username)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $username)) {
				$username = str_replace('*', '%', $username);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AdminUserPeer::USERNAME, $username, $comparison);
	}

	/**
	 * Filter the query on the password column
	 * 
	 * @param     string $password The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminUserQuery The current query, for fluid interface
	 */
	public function filterByPassword($password = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($password)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $password)) {
				$password = str_replace('*', '%', $password);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AdminUserPeer::PASSWORD, $password, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminUserQuery The current query, for fluid interface
	 */
	public function filterByName($name = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($name)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $name)) {
				$name = str_replace('*', '%', $name);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AdminUserPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the email column
	 * 
	 * @param     string $email The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminUserQuery The current query, for fluid interface
	 */
	public function filterByEmail($email = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($email)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $email)) {
				$email = str_replace('*', '%', $email);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AdminUserPeer::EMAIL, $email, $comparison);
	}

	/**
	 * Filter the query on the phone_mobile column
	 * 
	 * @param     string $phoneMobile The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminUserQuery The current query, for fluid interface
	 */
	public function filterByPhoneMobile($phoneMobile = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($phoneMobile)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $phoneMobile)) {
				$phoneMobile = str_replace('*', '%', $phoneMobile);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AdminUserPeer::PHONE_MOBILE, $phoneMobile, $comparison);
	}

	/**
	 * Filter the query on the nickname column
	 * 
	 * @param     string $nickname The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminUserQuery The current query, for fluid interface
	 */
	public function filterByNickname($nickname = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nickname)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nickname)) {
				$nickname = str_replace('*', '%', $nickname);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AdminUserPeer::NICKNAME, $nickname, $comparison);
	}

	/**
	 * Filter the query on the is_enabled column
	 * 
	 * @param     int|array $isEnabled The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminUserQuery The current query, for fluid interface
	 */
	public function filterByIsEnabled($isEnabled = null, $comparison = null)
	{
		if (is_array($isEnabled)) {
			$useMinMax = false;
			if (isset($isEnabled['min'])) {
				$this->addUsingAlias(AdminUserPeer::IS_ENABLED, $isEnabled['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($isEnabled['max'])) {
				$this->addUsingAlias(AdminUserPeer::IS_ENABLED, $isEnabled['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AdminUserPeer::IS_ENABLED, $isEnabled, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     int|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminUserQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(AdminUserPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(AdminUserPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AdminUserPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     int|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminUserQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(AdminUserPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(AdminUserPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AdminUserPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related AdminUserGroup object
	 *
	 * @param     AdminUserGroup $adminUserGroup  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminUserQuery The current query, for fluid interface
	 */
	public function filterByAdminUserGroup($adminUserGroup, $comparison = null)
	{
		return $this
			->addUsingAlias(AdminUserPeer::ADMIN_USER_GROUP_ID, $adminUserGroup->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AdminUserGroup relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdminUserQuery The current query, for fluid interface
	 */
	public function joinAdminUserGroup($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AdminUserGroup');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'AdminUserGroup');
		}
		
		return $this;
	}

	/**
	 * Use the AdminUserGroup relation AdminUserGroup object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdminUserGroupQuery A secondary query class using the current class as primary query
	 */
	public function useAdminUserGroupQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinAdminUserGroup($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AdminUserGroup', 'AdminUserGroupQuery');
	}

	/**
	 * Filter the query by a related Information object
	 *
	 * @param     Information $information  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminUserQuery The current query, for fluid interface
	 */
	public function filterByInformation($information, $comparison = null)
	{
		return $this
			->addUsingAlias(AdminUserPeer::ID, $information->getCreatedByAdminUserId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Information relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdminUserQuery The current query, for fluid interface
	 */
	public function joinInformation($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Information');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Information');
		}
		
		return $this;
	}

	/**
	 * Use the Information relation Information object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    InformationQuery A secondary query class using the current class as primary query
	 */
	public function useInformationQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinInformation($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Information', 'InformationQuery');
	}

	/**
	 * Filter the query by a related Log object
	 *
	 * @param     Log $log  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminUserQuery The current query, for fluid interface
	 */
	public function filterByLog($log, $comparison = null)
	{
		return $this
			->addUsingAlias(AdminUserPeer::ID, $log->getCreatedByAdminUserId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Log relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdminUserQuery The current query, for fluid interface
	 */
	public function joinLog($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Log');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Log');
		}
		
		return $this;
	}

	/**
	 * Use the Log relation Log object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LogQuery A secondary query class using the current class as primary query
	 */
	public function useLogQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinLog($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Log', 'LogQuery');
	}

	/**
	 * Filter the query by a related Regulation object
	 *
	 * @param     Regulation $regulation  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminUserQuery The current query, for fluid interface
	 */
	public function filterByRegulation($regulation, $comparison = null)
	{
		return $this
			->addUsingAlias(AdminUserPeer::ID, $regulation->getCreatedByAdminUserId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Regulation relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdminUserQuery The current query, for fluid interface
	 */
	public function joinRegulation($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Regulation');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Regulation');
		}
		
		return $this;
	}

	/**
	 * Use the Regulation relation Regulation object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RegulationQuery A secondary query class using the current class as primary query
	 */
	public function useRegulationQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinRegulation($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Regulation', 'RegulationQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     AdminUser $adminUser Object to remove from the list of results
	 *
	 * @return    AdminUserQuery The current query, for fluid interface
	 */
	public function prune($adminUser = null)
	{
		if ($adminUser) {
			$this->addUsingAlias(AdminUserPeer::ID, $adminUser->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseAdminUserQuery
