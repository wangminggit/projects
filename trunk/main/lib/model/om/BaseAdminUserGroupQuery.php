<?php


/**
 * Base class that represents a query for the 'admin_user_group' table.
 *
 * 
 *
 * @method     AdminUserGroupQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AdminUserGroupQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     AdminUserGroupQuery orderByIsSuperAdmin($order = Criteria::ASC) Order by the is_super_admin column
 * @method     AdminUserGroupQuery orderByIsFixed($order = Criteria::ASC) Order by the is_fixed column
 * @method     AdminUserGroupQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     AdminUserGroupQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     AdminUserGroupQuery groupById() Group by the id column
 * @method     AdminUserGroupQuery groupByName() Group by the name column
 * @method     AdminUserGroupQuery groupByIsSuperAdmin() Group by the is_super_admin column
 * @method     AdminUserGroupQuery groupByIsFixed() Group by the is_fixed column
 * @method     AdminUserGroupQuery groupByCreatedAt() Group by the created_at column
 * @method     AdminUserGroupQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     AdminUserGroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AdminUserGroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AdminUserGroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AdminUserGroupQuery leftJoinAdminItemAdminUserGroupAccess($relationAlias = null) Adds a LEFT JOIN clause to the query using the AdminItemAdminUserGroupAccess relation
 * @method     AdminUserGroupQuery rightJoinAdminItemAdminUserGroupAccess($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AdminItemAdminUserGroupAccess relation
 * @method     AdminUserGroupQuery innerJoinAdminItemAdminUserGroupAccess($relationAlias = null) Adds a INNER JOIN clause to the query using the AdminItemAdminUserGroupAccess relation
 *
 * @method     AdminUserGroupQuery leftJoinAdminUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the AdminUser relation
 * @method     AdminUserGroupQuery rightJoinAdminUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AdminUser relation
 * @method     AdminUserGroupQuery innerJoinAdminUser($relationAlias = null) Adds a INNER JOIN clause to the query using the AdminUser relation
 *
 * @method     AdminUserGroup findOne(PropelPDO $con = null) Return the first AdminUserGroup matching the query
 * @method     AdminUserGroup findOneOrCreate(PropelPDO $con = null) Return the first AdminUserGroup matching the query, or a new AdminUserGroup object populated from the query conditions when no match is found
 *
 * @method     AdminUserGroup findOneById(int $id) Return the first AdminUserGroup filtered by the id column
 * @method     AdminUserGroup findOneByName(string $name) Return the first AdminUserGroup filtered by the name column
 * @method     AdminUserGroup findOneByIsSuperAdmin(int $is_super_admin) Return the first AdminUserGroup filtered by the is_super_admin column
 * @method     AdminUserGroup findOneByIsFixed(int $is_fixed) Return the first AdminUserGroup filtered by the is_fixed column
 * @method     AdminUserGroup findOneByCreatedAt(int $created_at) Return the first AdminUserGroup filtered by the created_at column
 * @method     AdminUserGroup findOneByUpdatedAt(int $updated_at) Return the first AdminUserGroup filtered by the updated_at column
 *
 * @method     array findById(int $id) Return AdminUserGroup objects filtered by the id column
 * @method     array findByName(string $name) Return AdminUserGroup objects filtered by the name column
 * @method     array findByIsSuperAdmin(int $is_super_admin) Return AdminUserGroup objects filtered by the is_super_admin column
 * @method     array findByIsFixed(int $is_fixed) Return AdminUserGroup objects filtered by the is_fixed column
 * @method     array findByCreatedAt(int $created_at) Return AdminUserGroup objects filtered by the created_at column
 * @method     array findByUpdatedAt(int $updated_at) Return AdminUserGroup objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseAdminUserGroupQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseAdminUserGroupQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'AdminUserGroup', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AdminUserGroupQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AdminUserGroupQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AdminUserGroupQuery) {
			return $criteria;
		}
		$query = new AdminUserGroupQuery();
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
	 * @return    AdminUserGroup|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = AdminUserGroupPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    AdminUserGroupQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AdminUserGroupPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AdminUserGroupQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AdminUserGroupPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminUserGroupQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AdminUserGroupPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminUserGroupQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AdminUserGroupPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the is_super_admin column
	 * 
	 * @param     int|array $isSuperAdmin The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminUserGroupQuery The current query, for fluid interface
	 */
	public function filterByIsSuperAdmin($isSuperAdmin = null, $comparison = null)
	{
		if (is_array($isSuperAdmin)) {
			$useMinMax = false;
			if (isset($isSuperAdmin['min'])) {
				$this->addUsingAlias(AdminUserGroupPeer::IS_SUPER_ADMIN, $isSuperAdmin['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($isSuperAdmin['max'])) {
				$this->addUsingAlias(AdminUserGroupPeer::IS_SUPER_ADMIN, $isSuperAdmin['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AdminUserGroupPeer::IS_SUPER_ADMIN, $isSuperAdmin, $comparison);
	}

	/**
	 * Filter the query on the is_fixed column
	 * 
	 * @param     int|array $isFixed The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminUserGroupQuery The current query, for fluid interface
	 */
	public function filterByIsFixed($isFixed = null, $comparison = null)
	{
		if (is_array($isFixed)) {
			$useMinMax = false;
			if (isset($isFixed['min'])) {
				$this->addUsingAlias(AdminUserGroupPeer::IS_FIXED, $isFixed['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($isFixed['max'])) {
				$this->addUsingAlias(AdminUserGroupPeer::IS_FIXED, $isFixed['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AdminUserGroupPeer::IS_FIXED, $isFixed, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     int|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminUserGroupQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(AdminUserGroupPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(AdminUserGroupPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AdminUserGroupPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     int|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminUserGroupQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(AdminUserGroupPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(AdminUserGroupPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AdminUserGroupPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related AdminItemAdminUserGroupAccess object
	 *
	 * @param     AdminItemAdminUserGroupAccess $adminItemAdminUserGroupAccess  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminUserGroupQuery The current query, for fluid interface
	 */
	public function filterByAdminItemAdminUserGroupAccess($adminItemAdminUserGroupAccess, $comparison = null)
	{
		return $this
			->addUsingAlias(AdminUserGroupPeer::ID, $adminItemAdminUserGroupAccess->getAdminUserGroupId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AdminItemAdminUserGroupAccess relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdminUserGroupQuery The current query, for fluid interface
	 */
	public function joinAdminItemAdminUserGroupAccess($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AdminItemAdminUserGroupAccess');
		
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
			$this->addJoinObject($join, 'AdminItemAdminUserGroupAccess');
		}
		
		return $this;
	}

	/**
	 * Use the AdminItemAdminUserGroupAccess relation AdminItemAdminUserGroupAccess object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdminItemAdminUserGroupAccessQuery A secondary query class using the current class as primary query
	 */
	public function useAdminItemAdminUserGroupAccessQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAdminItemAdminUserGroupAccess($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AdminItemAdminUserGroupAccess', 'AdminItemAdminUserGroupAccessQuery');
	}

	/**
	 * Filter the query by a related AdminUser object
	 *
	 * @param     AdminUser $adminUser  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminUserGroupQuery The current query, for fluid interface
	 */
	public function filterByAdminUser($adminUser, $comparison = null)
	{
		return $this
			->addUsingAlias(AdminUserGroupPeer::ID, $adminUser->getAdminUserGroupId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AdminUser relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdminUserGroupQuery The current query, for fluid interface
	 */
	public function joinAdminUser($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AdminUser');
		
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
			$this->addJoinObject($join, 'AdminUser');
		}
		
		return $this;
	}

	/**
	 * Use the AdminUser relation AdminUser object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdminUserQuery A secondary query class using the current class as primary query
	 */
	public function useAdminUserQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinAdminUser($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AdminUser', 'AdminUserQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     AdminUserGroup $adminUserGroup Object to remove from the list of results
	 *
	 * @return    AdminUserGroupQuery The current query, for fluid interface
	 */
	public function prune($adminUserGroup = null)
	{
		if ($adminUserGroup) {
			$this->addUsingAlias(AdminUserGroupPeer::ID, $adminUserGroup->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseAdminUserGroupQuery
