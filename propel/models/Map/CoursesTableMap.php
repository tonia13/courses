<?php

namespace Propel\Map;

use Propel\Courses;
use Propel\CoursesQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'courses' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class CoursesTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Propel.Map.CoursesTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'courses';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\Courses';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Propel.Courses';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the id field
     */
    const COL_ID = 'courses.id';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'courses.title';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'courses.description';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'courses.status';

    /**
     * the column name for the is_premium field
     */
    const COL_IS_PREMIUM = 'courses.is_premium';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'courses.created_at';

    /**
     * the column name for the deleted_at field
     */
    const COL_DELETED_AT = 'courses.deleted_at';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Title', 'Description', 'Status', 'IsPremium', 'CreatedAt', 'DeletedAt', ),
        self::TYPE_CAMELNAME     => array('id', 'title', 'description', 'status', 'isPremium', 'createdAt', 'deletedAt', ),
        self::TYPE_COLNAME       => array(CoursesTableMap::COL_ID, CoursesTableMap::COL_TITLE, CoursesTableMap::COL_DESCRIPTION, CoursesTableMap::COL_STATUS, CoursesTableMap::COL_IS_PREMIUM, CoursesTableMap::COL_CREATED_AT, CoursesTableMap::COL_DELETED_AT, ),
        self::TYPE_FIELDNAME     => array('id', 'title', 'description', 'status', 'is_premium', 'created_at', 'deleted_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Title' => 1, 'Description' => 2, 'Status' => 3, 'IsPremium' => 4, 'CreatedAt' => 5, 'DeletedAt' => 6, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'title' => 1, 'description' => 2, 'status' => 3, 'isPremium' => 4, 'createdAt' => 5, 'deletedAt' => 6, ),
        self::TYPE_COLNAME       => array(CoursesTableMap::COL_ID => 0, CoursesTableMap::COL_TITLE => 1, CoursesTableMap::COL_DESCRIPTION => 2, CoursesTableMap::COL_STATUS => 3, CoursesTableMap::COL_IS_PREMIUM => 4, CoursesTableMap::COL_CREATED_AT => 5, CoursesTableMap::COL_DELETED_AT => 6, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'title' => 1, 'description' => 2, 'status' => 3, 'is_premium' => 4, 'created_at' => 5, 'deleted_at' => 6, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var string[]
     */
    protected $normalizedColumnNameMap = [

        'Id' => 'ID',
        'Courses.Id' => 'ID',
        'id' => 'ID',
        'courses.id' => 'ID',
        'CoursesTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'id' => 'ID',
        'courses.id' => 'ID',
        'Title' => 'TITLE',
        'Courses.Title' => 'TITLE',
        'title' => 'TITLE',
        'courses.title' => 'TITLE',
        'CoursesTableMap::COL_TITLE' => 'TITLE',
        'COL_TITLE' => 'TITLE',
        'title' => 'TITLE',
        'courses.title' => 'TITLE',
        'Description' => 'DESCRIPTION',
        'Courses.Description' => 'DESCRIPTION',
        'description' => 'DESCRIPTION',
        'courses.description' => 'DESCRIPTION',
        'CoursesTableMap::COL_DESCRIPTION' => 'DESCRIPTION',
        'COL_DESCRIPTION' => 'DESCRIPTION',
        'description' => 'DESCRIPTION',
        'courses.description' => 'DESCRIPTION',
        'Status' => 'STATUS',
        'Courses.Status' => 'STATUS',
        'status' => 'STATUS',
        'courses.status' => 'STATUS',
        'CoursesTableMap::COL_STATUS' => 'STATUS',
        'COL_STATUS' => 'STATUS',
        'status' => 'STATUS',
        'courses.status' => 'STATUS',
        'IsPremium' => 'IS_PREMIUM',
        'Courses.IsPremium' => 'IS_PREMIUM',
        'isPremium' => 'IS_PREMIUM',
        'courses.isPremium' => 'IS_PREMIUM',
        'CoursesTableMap::COL_IS_PREMIUM' => 'IS_PREMIUM',
        'COL_IS_PREMIUM' => 'IS_PREMIUM',
        'is_premium' => 'IS_PREMIUM',
        'courses.is_premium' => 'IS_PREMIUM',
        'CreatedAt' => 'CREATED_AT',
        'Courses.CreatedAt' => 'CREATED_AT',
        'createdAt' => 'CREATED_AT',
        'courses.createdAt' => 'CREATED_AT',
        'CoursesTableMap::COL_CREATED_AT' => 'CREATED_AT',
        'COL_CREATED_AT' => 'CREATED_AT',
        'created_at' => 'CREATED_AT',
        'courses.created_at' => 'CREATED_AT',
        'DeletedAt' => 'DELETED_AT',
        'Courses.DeletedAt' => 'DELETED_AT',
        'deletedAt' => 'DELETED_AT',
        'courses.deletedAt' => 'DELETED_AT',
        'CoursesTableMap::COL_DELETED_AT' => 'DELETED_AT',
        'COL_DELETED_AT' => 'DELETED_AT',
        'deleted_at' => 'DELETED_AT',
        'courses.deleted_at' => 'DELETED_AT',
    ];

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('courses');
        $this->setPhpName('Courses');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\Courses');
        $this->setPackage('Propel');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'BIGINT', true, null, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 50, null);
        $this->addColumn('description', 'Description', 'VARCHAR', false, 255, null);
        $this->addColumn('status', 'Status', 'CHAR', false, null, null);
        $this->addColumn('is_premium', 'IsPremium', 'BOOLEAN', false, 1, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('deleted_at', 'DeletedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? CoursesTableMap::CLASS_DEFAULT : CoursesTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Courses object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CoursesTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CoursesTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CoursesTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CoursesTableMap::OM_CLASS;
            /** @var Courses $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CoursesTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = CoursesTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CoursesTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Courses $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CoursesTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(CoursesTableMap::COL_ID);
            $criteria->addSelectColumn(CoursesTableMap::COL_TITLE);
            $criteria->addSelectColumn(CoursesTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(CoursesTableMap::COL_STATUS);
            $criteria->addSelectColumn(CoursesTableMap::COL_IS_PREMIUM);
            $criteria->addSelectColumn(CoursesTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(CoursesTableMap::COL_DELETED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.is_premium');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.deleted_at');
        }
    }

    /**
     * Remove all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be removed as they are only loaded on demand.
     *
     * @param Criteria $criteria object containing the columns to remove.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function removeSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->removeSelectColumn(CoursesTableMap::COL_ID);
            $criteria->removeSelectColumn(CoursesTableMap::COL_TITLE);
            $criteria->removeSelectColumn(CoursesTableMap::COL_DESCRIPTION);
            $criteria->removeSelectColumn(CoursesTableMap::COL_STATUS);
            $criteria->removeSelectColumn(CoursesTableMap::COL_IS_PREMIUM);
            $criteria->removeSelectColumn(CoursesTableMap::COL_CREATED_AT);
            $criteria->removeSelectColumn(CoursesTableMap::COL_DELETED_AT);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.title');
            $criteria->removeSelectColumn($alias . '.description');
            $criteria->removeSelectColumn($alias . '.status');
            $criteria->removeSelectColumn($alias . '.is_premium');
            $criteria->removeSelectColumn($alias . '.created_at');
            $criteria->removeSelectColumn($alias . '.deleted_at');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(CoursesTableMap::DATABASE_NAME)->getTable(CoursesTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CoursesTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CoursesTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CoursesTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Courses or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Courses object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CoursesTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\Courses) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CoursesTableMap::DATABASE_NAME);
            $criteria->add(CoursesTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = CoursesQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CoursesTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CoursesTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the courses table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CoursesQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Courses or Criteria object.
     *
     * @param mixed               $criteria Criteria or Courses object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CoursesTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Courses object
        }

        if ($criteria->containsKey(CoursesTableMap::COL_ID) && $criteria->keyContainsValue(CoursesTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.CoursesTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = CoursesQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CoursesTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CoursesTableMap::buildTableMap();
