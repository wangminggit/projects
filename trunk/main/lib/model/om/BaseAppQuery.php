<?php


/**
 * Base class that represents a query for the 'app' table.
 *
 * 
 *
 * @method     AppQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AppQuery orderBySfApp($order = Criteria::ASC) Order by the sf_app column
 * @method     AppQuery orderByName($order = Criteria::ASC) Order by the name column
 *
 * @method     AppQuery groupById() Group by the id column
 * @method     AppQuery groupBySfApp() Group by the sf_app column
 * @method     AppQuery groupByName() Group by the name column
 *
 * @method     AppQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AppQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AppQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AppQuery leftJoinLog($relationAlias = null) Adds a LEFT JOIN clause to the query using the Log relation
 * @method     AppQuery rightJoinLog($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Log relation
 * @method     AppQuery innerJoinLog($relationAlias = null) Adds a INNER JOIN clause to the query using the Log relation
 *
 * @method     App findOne(PropelPDO $con = null) Return the first App matching the query
 * @method     App findOneOrCreate(PropelPDO $con = null) Return the first App matching the query, or a new App object populated from the query conditions when no match is found
 *
 * @method     App findOneById(int $id) Return the first App filtered by the id column
 * @method     App findOneBySfApp(string $sf_app) Return the first App filtered by the sf_app column
 * @method     App findOneByName(string $name) Return the first App filtered by the name column
 *
 * @method     array findById(int $id) Return App objects filtered by the id column
 * @method     array findBySfApp(string $sf_app) Return App objects filtered by the sf_app column
 * @method     array findByName(string $name) Return App objects filtered by the name column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseAppQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseAppQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'App', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AppQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AppQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AppQuery) {
			return $criteria;
		}
		$query = new AppQuery();
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
	 * @return    App|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = AppPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    AppQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AppPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AppQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AppPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AppQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AppPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the sf_app column
	 * 
	 * @param     string $sfApp The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AppQuery The current query, for fluid interface
	 */
	public function filterBySfApp($sfApp = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($sfApp)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $sfApp)) {
				$sfApp = str_replace('*', '%', $sfApp);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AppPeer::SF_APP, $sfApp, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AppQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AppPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query by a related Log object
	 *
	 * @param     Log $log  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AppQuery The current query, for fluid interface
	 */
	public function filterByLog($log, $comparison = null)
	{
		return $this
			->addUsingAlias(AppPeer::ID, $log->getAppId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Log relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AppQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     App $app Object to remove from the list of results
	 *
	 * @return    AppQuery The current query, for fluid interface
	 */
	public function prune($app = null)
	{
		if ($app) {
			$this->addUsingAlias(AppPeer::ID, $app->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseAppQuery
