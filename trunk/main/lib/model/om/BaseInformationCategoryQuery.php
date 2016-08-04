<?php


/**
 * Base class that represents a query for the 'information_category' table.
 *
 * 
 *
 * @method     InformationCategoryQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     InformationCategoryQuery orderByValue($order = Criteria::ASC) Order by the value column
 *
 * @method     InformationCategoryQuery groupById() Group by the id column
 * @method     InformationCategoryQuery groupByValue() Group by the value column
 *
 * @method     InformationCategoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     InformationCategoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     InformationCategoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     InformationCategoryQuery leftJoinInformation($relationAlias = null) Adds a LEFT JOIN clause to the query using the Information relation
 * @method     InformationCategoryQuery rightJoinInformation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Information relation
 * @method     InformationCategoryQuery innerJoinInformation($relationAlias = null) Adds a INNER JOIN clause to the query using the Information relation
 *
 * @method     InformationCategory findOne(PropelPDO $con = null) Return the first InformationCategory matching the query
 * @method     InformationCategory findOneOrCreate(PropelPDO $con = null) Return the first InformationCategory matching the query, or a new InformationCategory object populated from the query conditions when no match is found
 *
 * @method     InformationCategory findOneById(int $id) Return the first InformationCategory filtered by the id column
 * @method     InformationCategory findOneByValue(string $value) Return the first InformationCategory filtered by the value column
 *
 * @method     array findById(int $id) Return InformationCategory objects filtered by the id column
 * @method     array findByValue(string $value) Return InformationCategory objects filtered by the value column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseInformationCategoryQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseInformationCategoryQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'InformationCategory', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new InformationCategoryQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    InformationCategoryQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof InformationCategoryQuery) {
			return $criteria;
		}
		$query = new InformationCategoryQuery();
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
	 * @return    InformationCategory|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = InformationCategoryPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    InformationCategoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(InformationCategoryPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    InformationCategoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(InformationCategoryPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InformationCategoryQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(InformationCategoryPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the value column
	 * 
	 * @param     string $value The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InformationCategoryQuery The current query, for fluid interface
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
		return $this->addUsingAlias(InformationCategoryPeer::VALUE, $value, $comparison);
	}

	/**
	 * Filter the query by a related Information object
	 *
	 * @param     Information $information  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InformationCategoryQuery The current query, for fluid interface
	 */
	public function filterByInformation($information, $comparison = null)
	{
		return $this
			->addUsingAlias(InformationCategoryPeer::ID, $information->getInformationCategoryId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Information relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    InformationCategoryQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     InformationCategory $informationCategory Object to remove from the list of results
	 *
	 * @return    InformationCategoryQuery The current query, for fluid interface
	 */
	public function prune($informationCategory = null)
	{
		if ($informationCategory) {
			$this->addUsingAlias(InformationCategoryPeer::ID, $informationCategory->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseInformationCategoryQuery
