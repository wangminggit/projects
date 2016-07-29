<?php


/**
 * Base class that represents a query for the 'blog' table.
 *
 * 
 *
 * @method     BlogQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     BlogQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     BlogQuery orderBySummary($order = Criteria::ASC) Order by the summary column
 * @method     BlogQuery orderByBody($order = Criteria::ASC) Order by the body column
 * @method     BlogQuery orderByPageview($order = Criteria::ASC) Order by the pageview column
 * @method     BlogQuery orderByIsEnable($order = Criteria::ASC) Order by the is_enable column
 * @method     BlogQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     BlogQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     BlogQuery groupById() Group by the id column
 * @method     BlogQuery groupByTitle() Group by the title column
 * @method     BlogQuery groupBySummary() Group by the summary column
 * @method     BlogQuery groupByBody() Group by the body column
 * @method     BlogQuery groupByPageview() Group by the pageview column
 * @method     BlogQuery groupByIsEnable() Group by the is_enable column
 * @method     BlogQuery groupByCreatedAt() Group by the created_at column
 * @method     BlogQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     BlogQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     BlogQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     BlogQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Blog findOne(PropelPDO $con = null) Return the first Blog matching the query
 * @method     Blog findOneOrCreate(PropelPDO $con = null) Return the first Blog matching the query, or a new Blog object populated from the query conditions when no match is found
 *
 * @method     Blog findOneById(int $id) Return the first Blog filtered by the id column
 * @method     Blog findOneByTitle(string $title) Return the first Blog filtered by the title column
 * @method     Blog findOneBySummary(string $summary) Return the first Blog filtered by the summary column
 * @method     Blog findOneByBody(string $body) Return the first Blog filtered by the body column
 * @method     Blog findOneByPageview(int $pageview) Return the first Blog filtered by the pageview column
 * @method     Blog findOneByIsEnable(int $is_enable) Return the first Blog filtered by the is_enable column
 * @method     Blog findOneByCreatedAt(int $created_at) Return the first Blog filtered by the created_at column
 * @method     Blog findOneByUpdatedAt(int $updated_at) Return the first Blog filtered by the updated_at column
 *
 * @method     array findById(int $id) Return Blog objects filtered by the id column
 * @method     array findByTitle(string $title) Return Blog objects filtered by the title column
 * @method     array findBySummary(string $summary) Return Blog objects filtered by the summary column
 * @method     array findByBody(string $body) Return Blog objects filtered by the body column
 * @method     array findByPageview(int $pageview) Return Blog objects filtered by the pageview column
 * @method     array findByIsEnable(int $is_enable) Return Blog objects filtered by the is_enable column
 * @method     array findByCreatedAt(int $created_at) Return Blog objects filtered by the created_at column
 * @method     array findByUpdatedAt(int $updated_at) Return Blog objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseBlogQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseBlogQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Blog', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new BlogQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    BlogQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof BlogQuery) {
			return $criteria;
		}
		$query = new BlogQuery();
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
	 * @return    Blog|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = BlogPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    BlogQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(BlogPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    BlogQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(BlogPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BlogQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(BlogPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the title column
	 * 
	 * @param     string $title The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BlogQuery The current query, for fluid interface
	 */
	public function filterByTitle($title = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($title)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $title)) {
				$title = str_replace('*', '%', $title);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(BlogPeer::TITLE, $title, $comparison);
	}

	/**
	 * Filter the query on the summary column
	 * 
	 * @param     string $summary The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BlogQuery The current query, for fluid interface
	 */
	public function filterBySummary($summary = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($summary)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $summary)) {
				$summary = str_replace('*', '%', $summary);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(BlogPeer::SUMMARY, $summary, $comparison);
	}

	/**
	 * Filter the query on the body column
	 * 
	 * @param     string $body The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BlogQuery The current query, for fluid interface
	 */
	public function filterByBody($body = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($body)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $body)) {
				$body = str_replace('*', '%', $body);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(BlogPeer::BODY, $body, $comparison);
	}

	/**
	 * Filter the query on the pageview column
	 * 
	 * @param     int|array $pageview The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BlogQuery The current query, for fluid interface
	 */
	public function filterByPageview($pageview = null, $comparison = null)
	{
		if (is_array($pageview)) {
			$useMinMax = false;
			if (isset($pageview['min'])) {
				$this->addUsingAlias(BlogPeer::PAGEVIEW, $pageview['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($pageview['max'])) {
				$this->addUsingAlias(BlogPeer::PAGEVIEW, $pageview['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(BlogPeer::PAGEVIEW, $pageview, $comparison);
	}

	/**
	 * Filter the query on the is_enable column
	 * 
	 * @param     int|array $isEnable The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BlogQuery The current query, for fluid interface
	 */
	public function filterByIsEnable($isEnable = null, $comparison = null)
	{
		if (is_array($isEnable)) {
			$useMinMax = false;
			if (isset($isEnable['min'])) {
				$this->addUsingAlias(BlogPeer::IS_ENABLE, $isEnable['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($isEnable['max'])) {
				$this->addUsingAlias(BlogPeer::IS_ENABLE, $isEnable['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(BlogPeer::IS_ENABLE, $isEnable, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     int|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BlogQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(BlogPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(BlogPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(BlogPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     int|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BlogQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(BlogPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(BlogPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(BlogPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Blog $blog Object to remove from the list of results
	 *
	 * @return    BlogQuery The current query, for fluid interface
	 */
	public function prune($blog = null)
	{
		if ($blog) {
			$this->addUsingAlias(BlogPeer::ID, $blog->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseBlogQuery
