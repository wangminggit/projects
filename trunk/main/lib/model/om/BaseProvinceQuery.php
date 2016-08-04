<?php


/**
 * Base class that represents a query for the 'province' table.
 *
 * 
 *
 * @method     ProvinceQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ProvinceQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ProvinceQuery orderByNameShort($order = Criteria::ASC) Order by the name_short column
 * @method     ProvinceQuery orderByCapital($order = Criteria::ASC) Order by the capital column
 *
 * @method     ProvinceQuery groupById() Group by the id column
 * @method     ProvinceQuery groupByName() Group by the name column
 * @method     ProvinceQuery groupByNameShort() Group by the name_short column
 * @method     ProvinceQuery groupByCapital() Group by the capital column
 *
 * @method     ProvinceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ProvinceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ProvinceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Province findOne(PropelPDO $con = null) Return the first Province matching the query
 * @method     Province findOneOrCreate(PropelPDO $con = null) Return the first Province matching the query, or a new Province object populated from the query conditions when no match is found
 *
 * @method     Province findOneById(int $id) Return the first Province filtered by the id column
 * @method     Province findOneByName(string $name) Return the first Province filtered by the name column
 * @method     Province findOneByNameShort(string $name_short) Return the first Province filtered by the name_short column
 * @method     Province findOneByCapital(string $capital) Return the first Province filtered by the capital column
 *
 * @method     array findById(int $id) Return Province objects filtered by the id column
 * @method     array findByName(string $name) Return Province objects filtered by the name column
 * @method     array findByNameShort(string $name_short) Return Province objects filtered by the name_short column
 * @method     array findByCapital(string $capital) Return Province objects filtered by the capital column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseProvinceQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseProvinceQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Province', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ProvinceQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ProvinceQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ProvinceQuery) {
			return $criteria;
		}
		$query = new ProvinceQuery();
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
	 * @return    Province|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ProvincePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ProvinceQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ProvincePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ProvinceQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ProvincePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProvinceQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ProvincePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProvinceQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ProvincePeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the name_short column
	 * 
	 * @param     string $nameShort The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProvinceQuery The current query, for fluid interface
	 */
	public function filterByNameShort($nameShort = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nameShort)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nameShort)) {
				$nameShort = str_replace('*', '%', $nameShort);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProvincePeer::NAME_SHORT, $nameShort, $comparison);
	}

	/**
	 * Filter the query on the capital column
	 * 
	 * @param     string $capital The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProvinceQuery The current query, for fluid interface
	 */
	public function filterByCapital($capital = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($capital)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $capital)) {
				$capital = str_replace('*', '%', $capital);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProvincePeer::CAPITAL, $capital, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Province $province Object to remove from the list of results
	 *
	 * @return    ProvinceQuery The current query, for fluid interface
	 */
	public function prune($province = null)
	{
		if ($province) {
			$this->addUsingAlias(ProvincePeer::ID, $province->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseProvinceQuery
