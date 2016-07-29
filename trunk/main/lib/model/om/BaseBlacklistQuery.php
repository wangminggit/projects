<?php


/**
 * Base class that represents a query for the 'blacklist' table.
 *
 * 
 *
 * @method     BlacklistQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     BlacklistQuery orderByIp($order = Criteria::ASC) Order by the IP column
 * @method     BlacklistQuery orderByReason($order = Criteria::ASC) Order by the reason column
 * @method     BlacklistQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     BlacklistQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     BlacklistQuery groupById() Group by the id column
 * @method     BlacklistQuery groupByIp() Group by the IP column
 * @method     BlacklistQuery groupByReason() Group by the reason column
 * @method     BlacklistQuery groupByCreatedAt() Group by the created_at column
 * @method     BlacklistQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     BlacklistQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     BlacklistQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     BlacklistQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Blacklist findOne(PropelPDO $con = null) Return the first Blacklist matching the query
 * @method     Blacklist findOneOrCreate(PropelPDO $con = null) Return the first Blacklist matching the query, or a new Blacklist object populated from the query conditions when no match is found
 *
 * @method     Blacklist findOneById(int $id) Return the first Blacklist filtered by the id column
 * @method     Blacklist findOneByIp(string $IP) Return the first Blacklist filtered by the IP column
 * @method     Blacklist findOneByReason(string $reason) Return the first Blacklist filtered by the reason column
 * @method     Blacklist findOneByCreatedAt(int $created_at) Return the first Blacklist filtered by the created_at column
 * @method     Blacklist findOneByUpdatedAt(int $updated_at) Return the first Blacklist filtered by the updated_at column
 *
 * @method     array findById(int $id) Return Blacklist objects filtered by the id column
 * @method     array findByIp(string $IP) Return Blacklist objects filtered by the IP column
 * @method     array findByReason(string $reason) Return Blacklist objects filtered by the reason column
 * @method     array findByCreatedAt(int $created_at) Return Blacklist objects filtered by the created_at column
 * @method     array findByUpdatedAt(int $updated_at) Return Blacklist objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseBlacklistQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseBlacklistQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Blacklist', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new BlacklistQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    BlacklistQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof BlacklistQuery) {
			return $criteria;
		}
		$query = new BlacklistQuery();
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
	 * @return    Blacklist|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = BlacklistPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    BlacklistQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(BlacklistPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    BlacklistQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(BlacklistPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BlacklistQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(BlacklistPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the IP column
	 * 
	 * @param     string $ip The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BlacklistQuery The current query, for fluid interface
	 */
	public function filterByIp($ip = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($ip)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $ip)) {
				$ip = str_replace('*', '%', $ip);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(BlacklistPeer::IP, $ip, $comparison);
	}

	/**
	 * Filter the query on the reason column
	 * 
	 * @param     string $reason The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BlacklistQuery The current query, for fluid interface
	 */
	public function filterByReason($reason = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($reason)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $reason)) {
				$reason = str_replace('*', '%', $reason);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(BlacklistPeer::REASON, $reason, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     int|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BlacklistQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(BlacklistPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(BlacklistPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(BlacklistPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     int|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BlacklistQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(BlacklistPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(BlacklistPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(BlacklistPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Blacklist $blacklist Object to remove from the list of results
	 *
	 * @return    BlacklistQuery The current query, for fluid interface
	 */
	public function prune($blacklist = null)
	{
		if ($blacklist) {
			$this->addUsingAlias(BlacklistPeer::ID, $blacklist->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseBlacklistQuery
