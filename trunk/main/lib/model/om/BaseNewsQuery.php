<?php


/**
 * Base class that represents a query for the 'news' table.
 *
 * 
 *
 * @method     NewsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     NewsQuery orderByCreatedByAdminUserId($order = Criteria::ASC) Order by the created_by_admin_user_id column
 * @method     NewsQuery orderByNewsCategoryId($order = Criteria::ASC) Order by the news_category_id column
 * @method     NewsQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     NewsQuery orderByReleaseDate($order = Criteria::ASC) Order by the release_date column
 * @method     NewsQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method     NewsQuery orderBySummary($order = Criteria::ASC) Order by the summary column
 * @method     NewsQuery orderByBody($order = Criteria::ASC) Order by the body column
 * @method     NewsQuery orderByPageView($order = Criteria::ASC) Order by the page_view column
 * @method     NewsQuery orderByIsEnable($order = Criteria::ASC) Order by the is_enable column
 * @method     NewsQuery orderByPosition($order = Criteria::ASC) Order by the position column
 * @method     NewsQuery orderBySeoKeywords($order = Criteria::ASC) Order by the seo_keywords column
 * @method     NewsQuery orderBySeoDescription($order = Criteria::ASC) Order by the seo_description column
 * @method     NewsQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     NewsQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     NewsQuery groupById() Group by the id column
 * @method     NewsQuery groupByCreatedByAdminUserId() Group by the created_by_admin_user_id column
 * @method     NewsQuery groupByNewsCategoryId() Group by the news_category_id column
 * @method     NewsQuery groupByTitle() Group by the title column
 * @method     NewsQuery groupByReleaseDate() Group by the release_date column
 * @method     NewsQuery groupByImage() Group by the image column
 * @method     NewsQuery groupBySummary() Group by the summary column
 * @method     NewsQuery groupByBody() Group by the body column
 * @method     NewsQuery groupByPageView() Group by the page_view column
 * @method     NewsQuery groupByIsEnable() Group by the is_enable column
 * @method     NewsQuery groupByPosition() Group by the position column
 * @method     NewsQuery groupBySeoKeywords() Group by the seo_keywords column
 * @method     NewsQuery groupBySeoDescription() Group by the seo_description column
 * @method     NewsQuery groupByCreatedAt() Group by the created_at column
 * @method     NewsQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     NewsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     NewsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     NewsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     NewsQuery leftJoinAdminUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the AdminUser relation
 * @method     NewsQuery rightJoinAdminUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AdminUser relation
 * @method     NewsQuery innerJoinAdminUser($relationAlias = null) Adds a INNER JOIN clause to the query using the AdminUser relation
 *
 * @method     News findOne(PropelPDO $con = null) Return the first News matching the query
 * @method     News findOneOrCreate(PropelPDO $con = null) Return the first News matching the query, or a new News object populated from the query conditions when no match is found
 *
 * @method     News findOneById(int $id) Return the first News filtered by the id column
 * @method     News findOneByCreatedByAdminUserId(int $created_by_admin_user_id) Return the first News filtered by the created_by_admin_user_id column
 * @method     News findOneByNewsCategoryId(int $news_category_id) Return the first News filtered by the news_category_id column
 * @method     News findOneByTitle(string $title) Return the first News filtered by the title column
 * @method     News findOneByReleaseDate(string $release_date) Return the first News filtered by the release_date column
 * @method     News findOneByImage(string $image) Return the first News filtered by the image column
 * @method     News findOneBySummary(string $summary) Return the first News filtered by the summary column
 * @method     News findOneByBody(string $body) Return the first News filtered by the body column
 * @method     News findOneByPageView(int $page_view) Return the first News filtered by the page_view column
 * @method     News findOneByIsEnable(int $is_enable) Return the first News filtered by the is_enable column
 * @method     News findOneByPosition(int $position) Return the first News filtered by the position column
 * @method     News findOneBySeoKeywords(string $seo_keywords) Return the first News filtered by the seo_keywords column
 * @method     News findOneBySeoDescription(string $seo_description) Return the first News filtered by the seo_description column
 * @method     News findOneByCreatedAt(int $created_at) Return the first News filtered by the created_at column
 * @method     News findOneByUpdatedAt(int $updated_at) Return the first News filtered by the updated_at column
 *
 * @method     array findById(int $id) Return News objects filtered by the id column
 * @method     array findByCreatedByAdminUserId(int $created_by_admin_user_id) Return News objects filtered by the created_by_admin_user_id column
 * @method     array findByNewsCategoryId(int $news_category_id) Return News objects filtered by the news_category_id column
 * @method     array findByTitle(string $title) Return News objects filtered by the title column
 * @method     array findByReleaseDate(string $release_date) Return News objects filtered by the release_date column
 * @method     array findByImage(string $image) Return News objects filtered by the image column
 * @method     array findBySummary(string $summary) Return News objects filtered by the summary column
 * @method     array findByBody(string $body) Return News objects filtered by the body column
 * @method     array findByPageView(int $page_view) Return News objects filtered by the page_view column
 * @method     array findByIsEnable(int $is_enable) Return News objects filtered by the is_enable column
 * @method     array findByPosition(int $position) Return News objects filtered by the position column
 * @method     array findBySeoKeywords(string $seo_keywords) Return News objects filtered by the seo_keywords column
 * @method     array findBySeoDescription(string $seo_description) Return News objects filtered by the seo_description column
 * @method     array findByCreatedAt(int $created_at) Return News objects filtered by the created_at column
 * @method     array findByUpdatedAt(int $updated_at) Return News objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseNewsQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseNewsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'News', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new NewsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    NewsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof NewsQuery) {
			return $criteria;
		}
		$query = new NewsQuery();
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
	 * @return    News|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = NewsPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    NewsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(NewsPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    NewsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(NewsPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(NewsPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the created_by_admin_user_id column
	 * 
	 * @param     int|array $createdByAdminUserId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsQuery The current query, for fluid interface
	 */
	public function filterByCreatedByAdminUserId($createdByAdminUserId = null, $comparison = null)
	{
		if (is_array($createdByAdminUserId)) {
			$useMinMax = false;
			if (isset($createdByAdminUserId['min'])) {
				$this->addUsingAlias(NewsPeer::CREATED_BY_ADMIN_USER_ID, $createdByAdminUserId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdByAdminUserId['max'])) {
				$this->addUsingAlias(NewsPeer::CREATED_BY_ADMIN_USER_ID, $createdByAdminUserId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NewsPeer::CREATED_BY_ADMIN_USER_ID, $createdByAdminUserId, $comparison);
	}

	/**
	 * Filter the query on the news_category_id column
	 * 
	 * @param     int|array $newsCategoryId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsQuery The current query, for fluid interface
	 */
	public function filterByNewsCategoryId($newsCategoryId = null, $comparison = null)
	{
		if (is_array($newsCategoryId)) {
			$useMinMax = false;
			if (isset($newsCategoryId['min'])) {
				$this->addUsingAlias(NewsPeer::NEWS_CATEGORY_ID, $newsCategoryId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($newsCategoryId['max'])) {
				$this->addUsingAlias(NewsPeer::NEWS_CATEGORY_ID, $newsCategoryId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NewsPeer::NEWS_CATEGORY_ID, $newsCategoryId, $comparison);
	}

	/**
	 * Filter the query on the title column
	 * 
	 * @param     string $title The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsQuery The current query, for fluid interface
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
		return $this->addUsingAlias(NewsPeer::TITLE, $title, $comparison);
	}

	/**
	 * Filter the query on the release_date column
	 * 
	 * @param     string|array $releaseDate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsQuery The current query, for fluid interface
	 */
	public function filterByReleaseDate($releaseDate = null, $comparison = null)
	{
		if (is_array($releaseDate)) {
			$useMinMax = false;
			if (isset($releaseDate['min'])) {
				$this->addUsingAlias(NewsPeer::RELEASE_DATE, $releaseDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($releaseDate['max'])) {
				$this->addUsingAlias(NewsPeer::RELEASE_DATE, $releaseDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NewsPeer::RELEASE_DATE, $releaseDate, $comparison);
	}

	/**
	 * Filter the query on the image column
	 * 
	 * @param     string $image The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsQuery The current query, for fluid interface
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
		return $this->addUsingAlias(NewsPeer::IMAGE, $image, $comparison);
	}

	/**
	 * Filter the query on the summary column
	 * 
	 * @param     string $summary The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsQuery The current query, for fluid interface
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
		return $this->addUsingAlias(NewsPeer::SUMMARY, $summary, $comparison);
	}

	/**
	 * Filter the query on the body column
	 * 
	 * @param     string $body The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsQuery The current query, for fluid interface
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
		return $this->addUsingAlias(NewsPeer::BODY, $body, $comparison);
	}

	/**
	 * Filter the query on the page_view column
	 * 
	 * @param     int|array $pageView The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsQuery The current query, for fluid interface
	 */
	public function filterByPageView($pageView = null, $comparison = null)
	{
		if (is_array($pageView)) {
			$useMinMax = false;
			if (isset($pageView['min'])) {
				$this->addUsingAlias(NewsPeer::PAGE_VIEW, $pageView['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($pageView['max'])) {
				$this->addUsingAlias(NewsPeer::PAGE_VIEW, $pageView['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NewsPeer::PAGE_VIEW, $pageView, $comparison);
	}

	/**
	 * Filter the query on the is_enable column
	 * 
	 * @param     int|array $isEnable The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsQuery The current query, for fluid interface
	 */
	public function filterByIsEnable($isEnable = null, $comparison = null)
	{
		if (is_array($isEnable)) {
			$useMinMax = false;
			if (isset($isEnable['min'])) {
				$this->addUsingAlias(NewsPeer::IS_ENABLE, $isEnable['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($isEnable['max'])) {
				$this->addUsingAlias(NewsPeer::IS_ENABLE, $isEnable['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NewsPeer::IS_ENABLE, $isEnable, $comparison);
	}

	/**
	 * Filter the query on the position column
	 * 
	 * @param     int|array $position The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsQuery The current query, for fluid interface
	 */
	public function filterByPosition($position = null, $comparison = null)
	{
		if (is_array($position)) {
			$useMinMax = false;
			if (isset($position['min'])) {
				$this->addUsingAlias(NewsPeer::POSITION, $position['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($position['max'])) {
				$this->addUsingAlias(NewsPeer::POSITION, $position['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NewsPeer::POSITION, $position, $comparison);
	}

	/**
	 * Filter the query on the seo_keywords column
	 * 
	 * @param     string $seoKeywords The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsQuery The current query, for fluid interface
	 */
	public function filterBySeoKeywords($seoKeywords = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($seoKeywords)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $seoKeywords)) {
				$seoKeywords = str_replace('*', '%', $seoKeywords);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(NewsPeer::SEO_KEYWORDS, $seoKeywords, $comparison);
	}

	/**
	 * Filter the query on the seo_description column
	 * 
	 * @param     string $seoDescription The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsQuery The current query, for fluid interface
	 */
	public function filterBySeoDescription($seoDescription = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($seoDescription)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $seoDescription)) {
				$seoDescription = str_replace('*', '%', $seoDescription);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(NewsPeer::SEO_DESCRIPTION, $seoDescription, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     int|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(NewsPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(NewsPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NewsPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     int|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(NewsPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(NewsPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NewsPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related AdminUser object
	 *
	 * @param     AdminUser $adminUser  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsQuery The current query, for fluid interface
	 */
	public function filterByAdminUser($adminUser, $comparison = null)
	{
		return $this
			->addUsingAlias(NewsPeer::CREATED_BY_ADMIN_USER_ID, $adminUser->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AdminUser relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NewsQuery The current query, for fluid interface
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
	 * @param     News $news Object to remove from the list of results
	 *
	 * @return    NewsQuery The current query, for fluid interface
	 */
	public function prune($news = null)
	{
		if ($news) {
			$this->addUsingAlias(NewsPeer::ID, $news->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseNewsQuery
