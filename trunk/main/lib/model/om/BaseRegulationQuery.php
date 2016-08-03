<?php


/**
 * Base class that represents a query for the 'regulation' table.
 *
 * 
 *
 * @method     RegulationQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     RegulationQuery orderByRegulationCategoryId($order = Criteria::ASC) Order by the regulation_category_id column
 * @method     RegulationQuery orderByCreatedByAdminUserId($order = Criteria::ASC) Order by the created_by_admin_user_id column
 * @method     RegulationQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     RegulationQuery orderByReleaseDate($order = Criteria::ASC) Order by the release_date column
 * @method     RegulationQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method     RegulationQuery orderBySummary($order = Criteria::ASC) Order by the summary column
 * @method     RegulationQuery orderByBody($order = Criteria::ASC) Order by the body column
 * @method     RegulationQuery orderByIsEnable($order = Criteria::ASC) Order by the is_enable column
 * @method     RegulationQuery orderByPosition($order = Criteria::ASC) Order by the position column
 * @method     RegulationQuery orderByPageView($order = Criteria::ASC) Order by the page_view column
 * @method     RegulationQuery orderBySeoKeywords($order = Criteria::ASC) Order by the seo_keywords column
 * @method     RegulationQuery orderBySeoDescription($order = Criteria::ASC) Order by the seo_description column
 * @method     RegulationQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     RegulationQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     RegulationQuery groupById() Group by the id column
 * @method     RegulationQuery groupByRegulationCategoryId() Group by the regulation_category_id column
 * @method     RegulationQuery groupByCreatedByAdminUserId() Group by the created_by_admin_user_id column
 * @method     RegulationQuery groupByTitle() Group by the title column
 * @method     RegulationQuery groupByReleaseDate() Group by the release_date column
 * @method     RegulationQuery groupByImage() Group by the image column
 * @method     RegulationQuery groupBySummary() Group by the summary column
 * @method     RegulationQuery groupByBody() Group by the body column
 * @method     RegulationQuery groupByIsEnable() Group by the is_enable column
 * @method     RegulationQuery groupByPosition() Group by the position column
 * @method     RegulationQuery groupByPageView() Group by the page_view column
 * @method     RegulationQuery groupBySeoKeywords() Group by the seo_keywords column
 * @method     RegulationQuery groupBySeoDescription() Group by the seo_description column
 * @method     RegulationQuery groupByCreatedAt() Group by the created_at column
 * @method     RegulationQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     RegulationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     RegulationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     RegulationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     RegulationQuery leftJoinRegulationCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the RegulationCategory relation
 * @method     RegulationQuery rightJoinRegulationCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RegulationCategory relation
 * @method     RegulationQuery innerJoinRegulationCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the RegulationCategory relation
 *
 * @method     RegulationQuery leftJoinAdminUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the AdminUser relation
 * @method     RegulationQuery rightJoinAdminUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AdminUser relation
 * @method     RegulationQuery innerJoinAdminUser($relationAlias = null) Adds a INNER JOIN clause to the query using the AdminUser relation
 *
 * @method     Regulation findOne(PropelPDO $con = null) Return the first Regulation matching the query
 * @method     Regulation findOneOrCreate(PropelPDO $con = null) Return the first Regulation matching the query, or a new Regulation object populated from the query conditions when no match is found
 *
 * @method     Regulation findOneById(int $id) Return the first Regulation filtered by the id column
 * @method     Regulation findOneByRegulationCategoryId(int $regulation_category_id) Return the first Regulation filtered by the regulation_category_id column
 * @method     Regulation findOneByCreatedByAdminUserId(int $created_by_admin_user_id) Return the first Regulation filtered by the created_by_admin_user_id column
 * @method     Regulation findOneByTitle(string $title) Return the first Regulation filtered by the title column
 * @method     Regulation findOneByReleaseDate(string $release_date) Return the first Regulation filtered by the release_date column
 * @method     Regulation findOneByImage(string $image) Return the first Regulation filtered by the image column
 * @method     Regulation findOneBySummary(string $summary) Return the first Regulation filtered by the summary column
 * @method     Regulation findOneByBody(string $body) Return the first Regulation filtered by the body column
 * @method     Regulation findOneByIsEnable(int $is_enable) Return the first Regulation filtered by the is_enable column
 * @method     Regulation findOneByPosition(int $position) Return the first Regulation filtered by the position column
 * @method     Regulation findOneByPageView(int $page_view) Return the first Regulation filtered by the page_view column
 * @method     Regulation findOneBySeoKeywords(string $seo_keywords) Return the first Regulation filtered by the seo_keywords column
 * @method     Regulation findOneBySeoDescription(string $seo_description) Return the first Regulation filtered by the seo_description column
 * @method     Regulation findOneByCreatedAt(int $created_at) Return the first Regulation filtered by the created_at column
 * @method     Regulation findOneByUpdatedAt(int $updated_at) Return the first Regulation filtered by the updated_at column
 *
 * @method     array findById(int $id) Return Regulation objects filtered by the id column
 * @method     array findByRegulationCategoryId(int $regulation_category_id) Return Regulation objects filtered by the regulation_category_id column
 * @method     array findByCreatedByAdminUserId(int $created_by_admin_user_id) Return Regulation objects filtered by the created_by_admin_user_id column
 * @method     array findByTitle(string $title) Return Regulation objects filtered by the title column
 * @method     array findByReleaseDate(string $release_date) Return Regulation objects filtered by the release_date column
 * @method     array findByImage(string $image) Return Regulation objects filtered by the image column
 * @method     array findBySummary(string $summary) Return Regulation objects filtered by the summary column
 * @method     array findByBody(string $body) Return Regulation objects filtered by the body column
 * @method     array findByIsEnable(int $is_enable) Return Regulation objects filtered by the is_enable column
 * @method     array findByPosition(int $position) Return Regulation objects filtered by the position column
 * @method     array findByPageView(int $page_view) Return Regulation objects filtered by the page_view column
 * @method     array findBySeoKeywords(string $seo_keywords) Return Regulation objects filtered by the seo_keywords column
 * @method     array findBySeoDescription(string $seo_description) Return Regulation objects filtered by the seo_description column
 * @method     array findByCreatedAt(int $created_at) Return Regulation objects filtered by the created_at column
 * @method     array findByUpdatedAt(int $updated_at) Return Regulation objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseRegulationQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseRegulationQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Regulation', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new RegulationQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    RegulationQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof RegulationQuery) {
			return $criteria;
		}
		$query = new RegulationQuery();
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
	 * @return    Regulation|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = RegulationPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    RegulationQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(RegulationPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    RegulationQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(RegulationPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RegulationQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(RegulationPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the regulation_category_id column
	 * 
	 * @param     int|array $regulationCategoryId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RegulationQuery The current query, for fluid interface
	 */
	public function filterByRegulationCategoryId($regulationCategoryId = null, $comparison = null)
	{
		if (is_array($regulationCategoryId)) {
			$useMinMax = false;
			if (isset($regulationCategoryId['min'])) {
				$this->addUsingAlias(RegulationPeer::REGULATION_CATEGORY_ID, $regulationCategoryId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($regulationCategoryId['max'])) {
				$this->addUsingAlias(RegulationPeer::REGULATION_CATEGORY_ID, $regulationCategoryId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RegulationPeer::REGULATION_CATEGORY_ID, $regulationCategoryId, $comparison);
	}

	/**
	 * Filter the query on the created_by_admin_user_id column
	 * 
	 * @param     int|array $createdByAdminUserId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RegulationQuery The current query, for fluid interface
	 */
	public function filterByCreatedByAdminUserId($createdByAdminUserId = null, $comparison = null)
	{
		if (is_array($createdByAdminUserId)) {
			$useMinMax = false;
			if (isset($createdByAdminUserId['min'])) {
				$this->addUsingAlias(RegulationPeer::CREATED_BY_ADMIN_USER_ID, $createdByAdminUserId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdByAdminUserId['max'])) {
				$this->addUsingAlias(RegulationPeer::CREATED_BY_ADMIN_USER_ID, $createdByAdminUserId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RegulationPeer::CREATED_BY_ADMIN_USER_ID, $createdByAdminUserId, $comparison);
	}

	/**
	 * Filter the query on the title column
	 * 
	 * @param     string $title The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RegulationQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RegulationPeer::TITLE, $title, $comparison);
	}

	/**
	 * Filter the query on the release_date column
	 * 
	 * @param     string|array $releaseDate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RegulationQuery The current query, for fluid interface
	 */
	public function filterByReleaseDate($releaseDate = null, $comparison = null)
	{
		if (is_array($releaseDate)) {
			$useMinMax = false;
			if (isset($releaseDate['min'])) {
				$this->addUsingAlias(RegulationPeer::RELEASE_DATE, $releaseDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($releaseDate['max'])) {
				$this->addUsingAlias(RegulationPeer::RELEASE_DATE, $releaseDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RegulationPeer::RELEASE_DATE, $releaseDate, $comparison);
	}

	/**
	 * Filter the query on the image column
	 * 
	 * @param     string $image The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RegulationQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RegulationPeer::IMAGE, $image, $comparison);
	}

	/**
	 * Filter the query on the summary column
	 * 
	 * @param     string $summary The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RegulationQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RegulationPeer::SUMMARY, $summary, $comparison);
	}

	/**
	 * Filter the query on the body column
	 * 
	 * @param     string $body The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RegulationQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RegulationPeer::BODY, $body, $comparison);
	}

	/**
	 * Filter the query on the is_enable column
	 * 
	 * @param     int|array $isEnable The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RegulationQuery The current query, for fluid interface
	 */
	public function filterByIsEnable($isEnable = null, $comparison = null)
	{
		if (is_array($isEnable)) {
			$useMinMax = false;
			if (isset($isEnable['min'])) {
				$this->addUsingAlias(RegulationPeer::IS_ENABLE, $isEnable['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($isEnable['max'])) {
				$this->addUsingAlias(RegulationPeer::IS_ENABLE, $isEnable['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RegulationPeer::IS_ENABLE, $isEnable, $comparison);
	}

	/**
	 * Filter the query on the position column
	 * 
	 * @param     int|array $position The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RegulationQuery The current query, for fluid interface
	 */
	public function filterByPosition($position = null, $comparison = null)
	{
		if (is_array($position)) {
			$useMinMax = false;
			if (isset($position['min'])) {
				$this->addUsingAlias(RegulationPeer::POSITION, $position['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($position['max'])) {
				$this->addUsingAlias(RegulationPeer::POSITION, $position['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RegulationPeer::POSITION, $position, $comparison);
	}

	/**
	 * Filter the query on the page_view column
	 * 
	 * @param     int|array $pageView The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RegulationQuery The current query, for fluid interface
	 */
	public function filterByPageView($pageView = null, $comparison = null)
	{
		if (is_array($pageView)) {
			$useMinMax = false;
			if (isset($pageView['min'])) {
				$this->addUsingAlias(RegulationPeer::PAGE_VIEW, $pageView['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($pageView['max'])) {
				$this->addUsingAlias(RegulationPeer::PAGE_VIEW, $pageView['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RegulationPeer::PAGE_VIEW, $pageView, $comparison);
	}

	/**
	 * Filter the query on the seo_keywords column
	 * 
	 * @param     string $seoKeywords The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RegulationQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RegulationPeer::SEO_KEYWORDS, $seoKeywords, $comparison);
	}

	/**
	 * Filter the query on the seo_description column
	 * 
	 * @param     string $seoDescription The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RegulationQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RegulationPeer::SEO_DESCRIPTION, $seoDescription, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     int|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RegulationQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(RegulationPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(RegulationPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RegulationPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     int|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RegulationQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(RegulationPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(RegulationPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RegulationPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related RegulationCategory object
	 *
	 * @param     RegulationCategory $regulationCategory  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RegulationQuery The current query, for fluid interface
	 */
	public function filterByRegulationCategory($regulationCategory, $comparison = null)
	{
		return $this
			->addUsingAlias(RegulationPeer::REGULATION_CATEGORY_ID, $regulationCategory->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the RegulationCategory relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RegulationQuery The current query, for fluid interface
	 */
	public function joinRegulationCategory($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('RegulationCategory');
		
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
			$this->addJoinObject($join, 'RegulationCategory');
		}
		
		return $this;
	}

	/**
	 * Use the RegulationCategory relation RegulationCategory object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RegulationCategoryQuery A secondary query class using the current class as primary query
	 */
	public function useRegulationCategoryQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinRegulationCategory($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'RegulationCategory', 'RegulationCategoryQuery');
	}

	/**
	 * Filter the query by a related AdminUser object
	 *
	 * @param     AdminUser $adminUser  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RegulationQuery The current query, for fluid interface
	 */
	public function filterByAdminUser($adminUser, $comparison = null)
	{
		return $this
			->addUsingAlias(RegulationPeer::CREATED_BY_ADMIN_USER_ID, $adminUser->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AdminUser relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RegulationQuery The current query, for fluid interface
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
	 * @param     Regulation $regulation Object to remove from the list of results
	 *
	 * @return    RegulationQuery The current query, for fluid interface
	 */
	public function prune($regulation = null)
	{
		if ($regulation) {
			$this->addUsingAlias(RegulationPeer::ID, $regulation->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseRegulationQuery
