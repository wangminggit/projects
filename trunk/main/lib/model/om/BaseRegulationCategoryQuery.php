<?php


/**
 * Base class that represents a query for the 'regulation_category' table.
 *
 * 
 *
 * @method     RegulationCategoryQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     RegulationCategoryQuery orderByValue($order = Criteria::ASC) Order by the value column
 *
 * @method     RegulationCategoryQuery groupById() Group by the id column
 * @method     RegulationCategoryQuery groupByValue() Group by the value column
 *
 * @method     RegulationCategoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     RegulationCategoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     RegulationCategoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     RegulationCategoryQuery leftJoinRegulation($relationAlias = null) Adds a LEFT JOIN clause to the query using the Regulation relation
 * @method     RegulationCategoryQuery rightJoinRegulation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Regulation relation
 * @method     RegulationCategoryQuery innerJoinRegulation($relationAlias = null) Adds a INNER JOIN clause to the query using the Regulation relation
 *
 * @method     RegulationCategory findOne(PropelPDO $con = null) Return the first RegulationCategory matching the query
 * @method     RegulationCategory findOneOrCreate(PropelPDO $con = null) Return the first RegulationCategory matching the query, or a new RegulationCategory object populated from the query conditions when no match is found
 *
 * @method     RegulationCategory findOneById(int $id) Return the first RegulationCategory filtered by the id column
 * @method     RegulationCategory findOneByValue(string $value) Return the first RegulationCategory filtered by the value column
 *
 * @method     array findById(int $id) Return RegulationCategory objects filtered by the id column
 * @method     array findByValue(string $value) Return RegulationCategory objects filtered by the value column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseRegulationCategoryQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseRegulationCategoryQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'RegulationCategory', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new RegulationCategoryQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    RegulationCategoryQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof RegulationCategoryQuery) {
			return $criteria;
		}
		$query = new RegulationCategoryQuery();
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
	 * @return    RegulationCategory|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = RegulationCategoryPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    RegulationCategoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(RegulationCategoryPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    RegulationCategoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(RegulationCategoryPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RegulationCategoryQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(RegulationCategoryPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the value column
	 * 
	 * @param     string $value The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RegulationCategoryQuery The current query, for fluid interface
	 */
	public function filterByValue($value = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($value)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $value)) {
				$value = str_replace('*', '%', $value);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RegulationCategoryPeer::VALUE, $value, $comparison);
	}

	/**
	 * Filter the query by a related Regulation object
	 *
	 * @param     Regulation $regulation  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RegulationCategoryQuery The current query, for fluid interface
	 */
	public function filterByRegulation($regulation, $comparison = null)
	{
		return $this
			->addUsingAlias(RegulationCategoryPeer::ID, $regulation->getRegulationCategoryId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Regulation relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RegulationCategoryQuery The current query, for fluid interface
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
	 * @param     RegulationCategory $regulationCategory Object to remove from the list of results
	 *
	 * @return    RegulationCategoryQuery The current query, for fluid interface
	 */
	public function prune($regulationCategory = null)
	{
		if ($regulationCategory) {
			$this->addUsingAlias(RegulationCategoryPeer::ID, $regulationCategory->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseRegulationCategoryQuery
