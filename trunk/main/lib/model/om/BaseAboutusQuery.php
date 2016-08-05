<?php


/**
 * Base class that represents a query for the 'aboutus' table.
 *
 * 
 *
 * @method     AboutusQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AboutusQuery orderByAboutusCategoryId($order = Criteria::ASC) Order by the aboutus_category_id column
 * @method     AboutusQuery orderByCreatedByAdminUserId($order = Criteria::ASC) Order by the created_by_admin_user_id column
 * @method     AboutusQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     AboutusQuery orderByReleaseDate($order = Criteria::ASC) Order by the release_date column
 * @method     AboutusQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method     AboutusQuery orderBySummary($order = Criteria::ASC) Order by the summary column
 * @method     AboutusQuery orderByBody($order = Criteria::ASC) Order by the body column
 * @method     AboutusQuery orderByIsEnable($order = Criteria::ASC) Order by the is_enable column
 * @method     AboutusQuery orderByPosition($order = Criteria::ASC) Order by the position column
 * @method     AboutusQuery orderByPageView($order = Criteria::ASC) Order by the page_view column
 * @method     AboutusQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     AboutusQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     AboutusQuery groupById() Group by the id column
 * @method     AboutusQuery groupByAboutusCategoryId() Group by the aboutus_category_id column
 * @method     AboutusQuery groupByCreatedByAdminUserId() Group by the created_by_admin_user_id column
 * @method     AboutusQuery groupByTitle() Group by the title column
 * @method     AboutusQuery groupByReleaseDate() Group by the release_date column
 * @method     AboutusQuery groupByImage() Group by the image column
 * @method     AboutusQuery groupBySummary() Group by the summary column
 * @method     AboutusQuery groupByBody() Group by the body column
 * @method     AboutusQuery groupByIsEnable() Group by the is_enable column
 * @method     AboutusQuery groupByPosition() Group by the position column
 * @method     AboutusQuery groupByPageView() Group by the page_view column
 * @method     AboutusQuery groupByCreatedAt() Group by the created_at column
 * @method     AboutusQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     AboutusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AboutusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AboutusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AboutusQuery leftJoinAboutusCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the AboutusCategory relation
 * @method     AboutusQuery rightJoinAboutusCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AboutusCategory relation
 * @method     AboutusQuery innerJoinAboutusCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the AboutusCategory relation
 *
 * @method     AboutusQuery leftJoinAdminUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the AdminUser relation
 * @method     AboutusQuery rightJoinAdminUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AdminUser relation
 * @method     AboutusQuery innerJoinAdminUser($relationAlias = null) Adds a INNER JOIN clause to the query using the AdminUser relation
 *
 * @method     Aboutus findOne(PropelPDO $con = null) Return the first Aboutus matching the query
 * @method     Aboutus findOneOrCreate(PropelPDO $con = null) Return the first Aboutus matching the query, or a new Aboutus object populated from the query conditions when no match is found
 *
 * @method     Aboutus findOneById(int $id) Return the first Aboutus filtered by the id column
 * @method     Aboutus findOneByAboutusCategoryId(int $aboutus_category_id) Return the first Aboutus filtered by the aboutus_category_id column
 * @method     Aboutus findOneByCreatedByAdminUserId(int $created_by_admin_user_id) Return the first Aboutus filtered by the created_by_admin_user_id column
 * @method     Aboutus findOneByTitle(string $title) Return the first Aboutus filtered by the title column
 * @method     Aboutus findOneByReleaseDate(string $release_date) Return the first Aboutus filtered by the release_date column
 * @method     Aboutus findOneByImage(string $image) Return the first Aboutus filtered by the image column
 * @method     Aboutus findOneBySummary(string $summary) Return the first Aboutus filtered by the summary column
 * @method     Aboutus findOneByBody(string $body) Return the first Aboutus filtered by the body column
 * @method     Aboutus findOneByIsEnable(int $is_enable) Return the first Aboutus filtered by the is_enable column
 * @method     Aboutus findOneByPosition(int $position) Return the first Aboutus filtered by the position column
 * @method     Aboutus findOneByPageView(int $page_view) Return the first Aboutus filtered by the page_view column
 * @method     Aboutus findOneByCreatedAt(int $created_at) Return the first Aboutus filtered by the created_at column
 * @method     Aboutus findOneByUpdatedAt(int $updated_at) Return the first Aboutus filtered by the updated_at column
 *
 * @method     array findById(int $id) Return Aboutus objects filtered by the id column
 * @method     array findByAboutusCategoryId(int $aboutus_category_id) Return Aboutus objects filtered by the aboutus_category_id column
 * @method     array findByCreatedByAdminUserId(int $created_by_admin_user_id) Return Aboutus objects filtered by the created_by_admin_user_id column
 * @method     array findByTitle(string $title) Return Aboutus objects filtered by the title column
 * @method     array findByReleaseDate(string $release_date) Return Aboutus objects filtered by the release_date column
 * @method     array findByImage(string $image) Return Aboutus objects filtered by the image column
 * @method     array findBySummary(string $summary) Return Aboutus objects filtered by the summary column
 * @method     array findByBody(string $body) Return Aboutus objects filtered by the body column
 * @method     array findByIsEnable(int $is_enable) Return Aboutus objects filtered by the is_enable column
 * @method     array findByPosition(int $position) Return Aboutus objects filtered by the position column
 * @method     array findByPageView(int $page_view) Return Aboutus objects filtered by the page_view column
 * @method     array findByCreatedAt(int $created_at) Return Aboutus objects filtered by the created_at column
 * @method     array findByUpdatedAt(int $updated_at) Return Aboutus objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseAboutusQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseAboutusQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Aboutus', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AboutusQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AboutusQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AboutusQuery) {
			return $criteria;
		}
		$query = new AboutusQuery();
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
	 * @return    Aboutus|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = AboutusPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    AboutusQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AboutusPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AboutusQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AboutusPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AboutusQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AboutusPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the aboutus_category_id column
	 * 
	 * @param     int|array $aboutusCategoryId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AboutusQuery The current query, for fluid interface
	 */
	public function filterByAboutusCategoryId($aboutusCategoryId = null, $comparison = null)
	{
		if (is_array($aboutusCategoryId)) {
			$useMinMax = false;
			if (isset($aboutusCategoryId['min'])) {
				$this->addUsingAlias(AboutusPeer::ABOUTUS_CATEGORY_ID, $aboutusCategoryId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($aboutusCategoryId['max'])) {
				$this->addUsingAlias(AboutusPeer::ABOUTUS_CATEGORY_ID, $aboutusCategoryId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AboutusPeer::ABOUTUS_CATEGORY_ID, $aboutusCategoryId, $comparison);
	}

	/**
	 * Filter the query on the created_by_admin_user_id column
	 * 
	 * @param     int|array $createdByAdminUserId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AboutusQuery The current query, for fluid interface
	 */
	public function filterByCreatedByAdminUserId($createdByAdminUserId = null, $comparison = null)
	{
		if (is_array($createdByAdminUserId)) {
			$useMinMax = false;
			if (isset($createdByAdminUserId['min'])) {
				$this->addUsingAlias(AboutusPeer::CREATED_BY_ADMIN_USER_ID, $createdByAdminUserId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdByAdminUserId['max'])) {
				$this->addUsingAlias(AboutusPeer::CREATED_BY_ADMIN_USER_ID, $createdByAdminUserId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AboutusPeer::CREATED_BY_ADMIN_USER_ID, $createdByAdminUserId, $comparison);
	}

	/**
	 * Filter the query on the title column
	 * 
	 * @param     string $title The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AboutusQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AboutusPeer::TITLE, $title, $comparison);
	}

	/**
	 * Filter the query on the release_date column
	 * 
	 * @param     string|array $releaseDate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AboutusQuery The current query, for fluid interface
	 */
	public function filterByReleaseDate($releaseDate = null, $comparison = null)
	{
		if (is_array($releaseDate)) {
			$useMinMax = false;
			if (isset($releaseDate['min'])) {
				$this->addUsingAlias(AboutusPeer::RELEASE_DATE, $releaseDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($releaseDate['max'])) {
				$this->addUsingAlias(AboutusPeer::RELEASE_DATE, $releaseDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AboutusPeer::RELEASE_DATE, $releaseDate, $comparison);
	}

	/**
	 * Filter the query on the image column
	 * 
	 * @param     string $image The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AboutusQuery The current query, for fluid interface
	 */
	public function filterByImage($image = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($image)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $image)) {
				$image = str_replace('*', '%', $image);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AboutusPeer::IMAGE, $image, $comparison);
	}

	/**
	 * Filter the query on the summary column
	 * 
	 * @param     string $summary The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AboutusQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AboutusPeer::SUMMARY, $summary, $comparison);
	}

	/**
	 * Filter the query on the body column
	 * 
	 * @param     string $body The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AboutusQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AboutusPeer::BODY, $body, $comparison);
	}

	/**
	 * Filter the query on the is_enable column
	 * 
	 * @param     int|array $isEnable The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AboutusQuery The current query, for fluid interface
	 */
	public function filterByIsEnable($isEnable = null, $comparison = null)
	{
		if (is_array($isEnable)) {
			$useMinMax = false;
			if (isset($isEnable['min'])) {
				$this->addUsingAlias(AboutusPeer::IS_ENABLE, $isEnable['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($isEnable['max'])) {
				$this->addUsingAlias(AboutusPeer::IS_ENABLE, $isEnable['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AboutusPeer::IS_ENABLE, $isEnable, $comparison);
	}

	/**
	 * Filter the query on the position column
	 * 
	 * @param     int|array $position The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AboutusQuery The current query, for fluid interface
	 */
	public function filterByPosition($position = null, $comparison = null)
	{
		if (is_array($position)) {
			$useMinMax = false;
			if (isset($position['min'])) {
				$this->addUsingAlias(AboutusPeer::POSITION, $position['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($position['max'])) {
				$this->addUsingAlias(AboutusPeer::POSITION, $position['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AboutusPeer::POSITION, $position, $comparison);
	}

	/**
	 * Filter the query on the page_view column
	 * 
	 * @param     int|array $pageView The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AboutusQuery The current query, for fluid interface
	 */
	public function filterByPageView($pageView = null, $comparison = null)
	{
		if (is_array($pageView)) {
			$useMinMax = false;
			if (isset($pageView['min'])) {
				$this->addUsingAlias(AboutusPeer::PAGE_VIEW, $pageView['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($pageView['max'])) {
				$this->addUsingAlias(AboutusPeer::PAGE_VIEW, $pageView['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AboutusPeer::PAGE_VIEW, $pageView, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     int|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AboutusQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(AboutusPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(AboutusPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AboutusPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     int|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AboutusQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(AboutusPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(AboutusPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AboutusPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related AboutusCategory object
	 *
	 * @param     AboutusCategory $aboutusCategory  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AboutusQuery The current query, for fluid interface
	 */
	public function filterByAboutusCategory($aboutusCategory, $comparison = null)
	{
		return $this
			->addUsingAlias(AboutusPeer::ABOUTUS_CATEGORY_ID, $aboutusCategory->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AboutusCategory relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AboutusQuery The current query, for fluid interface
	 */
	public function joinAboutusCategory($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AboutusCategory');
		
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
			$this->addJoinObject($join, 'AboutusCategory');
		}
		
		return $this;
	}

	/**
	 * Use the AboutusCategory relation AboutusCategory object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AboutusCategoryQuery A secondary query class using the current class as primary query
	 */
	public function useAboutusCategoryQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinAboutusCategory($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AboutusCategory', 'AboutusCategoryQuery');
	}

	/**
	 * Filter the query by a related AdminUser object
	 *
	 * @param     AdminUser $adminUser  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AboutusQuery The current query, for fluid interface
	 */
	public function filterByAdminUser($adminUser, $comparison = null)
	{
		return $this
			->addUsingAlias(AboutusPeer::CREATED_BY_ADMIN_USER_ID, $adminUser->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AdminUser relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AboutusQuery The current query, for fluid interface
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
	 * @param     Aboutus $aboutus Object to remove from the list of results
	 *
	 * @return    AboutusQuery The current query, for fluid interface
	 */
	public function prune($aboutus = null)
	{
		if ($aboutus) {
			$this->addUsingAlias(AboutusPeer::ID, $aboutus->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseAboutusQuery
