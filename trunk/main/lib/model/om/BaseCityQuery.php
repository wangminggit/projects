<?php


/**
 * Base class that represents a query for the 'city' table.
 *
 * 
 *
 * @method     CityQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     CityQuery orderByProvinceId($order = Criteria::ASC) Order by the province_id column
 * @method     CityQuery orderByName($order = Criteria::ASC) Order by the name column
 *
 * @method     CityQuery groupById() Group by the id column
 * @method     CityQuery groupByProvinceId() Group by the province_id column
 * @method     CityQuery groupByName() Group by the name column
 *
 * @method     CityQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CityQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CityQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     CityQuery leftJoinProvince($relationAlias = null) Adds a LEFT JOIN clause to the query using the Province relation
 * @method     CityQuery rightJoinProvince($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Province relation
 * @method     CityQuery innerJoinProvince($relationAlias = null) Adds a INNER JOIN clause to the query using the Province relation
 *
 * @method     City findOne(PropelPDO $con = null) Return the first City matching the query
 * @method     City findOneOrCreate(PropelPDO $con = null) Return the first City matching the query, or a new City object populated from the query conditions when no match is found
 *
 * @method     City findOneById(int $id) Return the first City filtered by the id column
 * @method     City findOneByProvinceId(int $province_id) Return the first City filtered by the province_id column
 * @method     City findOneByName(string $name) Return the first City filtered by the name column
 *
 * @method     array findById(int $id) Return City objects filtered by the id column
 * @method     array findByProvinceId(int $province_id) Return City objects filtered by the province_id column
 * @method     array findByName(string $name) Return City objects filtered by the name column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseCityQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseCityQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'City', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new CityQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    CityQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof CityQuery) {
			return $criteria;
		}
		$query = new CityQuery();
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
	 * @return    City|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = CityPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    CityQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(CityPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    CityQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(CityPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CityQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(CityPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the province_id column
	 * 
	 * @param     int|array $provinceId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CityQuery The current query, for fluid interface
	 */
	public function filterByProvinceId($provinceId = null, $comparison = null)
	{
		if (is_array($provinceId)) {
			$useMinMax = false;
			if (isset($provinceId['min'])) {
				$this->addUsingAlias(CityPeer::PROVINCE_ID, $provinceId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($provinceId['max'])) {
				$this->addUsingAlias(CityPeer::PROVINCE_ID, $provinceId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CityPeer::PROVINCE_ID, $provinceId, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CityQuery The current query, for fluid interface
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
		return $this->addUsingAlias(CityPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query by a related Province object
	 *
	 * @param     Province $province  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CityQuery The current query, for fluid interface
	 */
	public function filterByProvince($province, $comparison = null)
	{
		return $this
			->addUsingAlias(CityPeer::PROVINCE_ID, $province->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Province relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CityQuery The current query, for fluid interface
	 */
	public function joinProvince($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Province');
		
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
			$this->addJoinObject($join, 'Province');
		}
		
		return $this;
	}

	/**
	 * Use the Province relation Province object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProvinceQuery A secondary query class using the current class as primary query
	 */
	public function useProvinceQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinProvince($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Province', 'ProvinceQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     City $city Object to remove from the list of results
	 *
	 * @return    CityQuery The current query, for fluid interface
	 */
	public function prune($city = null)
	{
		if ($city) {
			$this->addUsingAlias(CityPeer::ID, $city->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseCityQuery
