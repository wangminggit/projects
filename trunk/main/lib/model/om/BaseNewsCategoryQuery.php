<?php


/**
 * Base class that represents a query for the 'news_category' table.
 *
 * 
 *
 * @method     NewsCategoryQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     NewsCategoryQuery orderByValue($order = Criteria::ASC) Order by the value column
 *
 * @method     NewsCategoryQuery groupById() Group by the id column
 * @method     NewsCategoryQuery groupByValue() Group by the value column
 *
 * @method     NewsCategoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     NewsCategoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     NewsCategoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     NewsCategory findOne(PropelPDO $con = null) Return the first NewsCategory matching the query
 * @method     NewsCategory findOneOrCreate(PropelPDO $con = null) Return the first NewsCategory matching the query, or a new NewsCategory object populated from the query conditions when no match is found
 *
 * @method     NewsCategory findOneById(int $id) Return the first NewsCategory filtered by the id column
 * @method     NewsCategory findOneByValue(string $value) Return the first NewsCategory filtered by the value column
 *
 * @method     array findById(int $id) Return NewsCategory objects filtered by the id column
 * @method     array findByValue(string $value) Return NewsCategory objects filtered by the value column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseNewsCategoryQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseNewsCategoryQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'NewsCategory', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new NewsCategoryQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    NewsCategoryQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof NewsCategoryQuery) {
			return $criteria;
		}
		$query = new NewsCategoryQuery();
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
	 * @return    NewsCategory|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = NewsCategoryPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    NewsCategoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(NewsCategoryPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    NewsCategoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(NewsCategoryPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsCategoryQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(NewsCategoryPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the value column
	 * 
	 * @param     string $value The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsCategoryQuery The current query, for fluid interface
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
		return $this->addUsingAlias(NewsCategoryPeer::VALUE, $value, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     NewsCategory $newsCategory Object to remove from the list of results
	 *
	 * @return    NewsCategoryQuery The current query, for fluid interface
	 */
	public function prune($newsCategory = null)
	{
		if ($newsCategory) {
			$this->addUsingAlias(NewsCategoryPeer::ID, $newsCategory->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseNewsCategoryQuery
