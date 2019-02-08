<?php

namespace app\components;

use Exception;
use Throwable;

/**
 * Created by PhpStorm.
 * User: liuzijian
 * Date: 2019/1/31
 * Time: 19:18
 */
class ZKAdminException extends Exception
{
    const ILLEGALPATH_ERROR = 1001;
    const NOAUTHORIZATION_ERROR = 1002;

    const NOSUCHROLE_ERROR = 2001;
    const NOSUCHTEAM_ERROR = 2002;
    const NOSUCHNODE_ERROR = 2003;
    const NOSUCHUSER_ERROR = 2004;
    const NOSUCHUSERTEAM_ERROR = 2007;
    const NOSUCHREVIEW_ERROR = 2005;
    const NOSUCHSNAPSHOT_ERROR = 2006;
    const USEREXISTS_ERROR = 2008;
    const NONODE_ERROR = 2009;
    const NODEEXISTS_ERROR = 2010;

    const NOLOGIN_ERROR = 3001;

    const ILLEGAL_PARAMETER_ERROR = 4001;

    const DB_NODATA_CREATE = 5001;
    const DB_NODATA_UPDATE = 5002;
    const DB_NODATA_DELETE = 5003;
    const DB_CREATE_ERROR = 5004;
    const DB_DELETE_ERROR = 5005;
    const DB_UPDATE_ERROR = 5006;
    const DB_DUPLICATE_KEY = 5007;

    const ILLEGAL_LOGINTYPE_ERROR = 6001;

    const UNKNOWN_ERROR = 7001;

    public function __construct($code = 0, $message = "")
    {
        parent::__construct($message, $code, null);
    }

    public static function createIllegalPathException()
    {
        return new ZKAdminException(ZKAdminException::ILLEGALPATH_ERROR, "Illegal path");
    }

    public static function createNoAuthorizationException()
    {
        return new ZKAdminException(ZKAdminException::NOAUTHORIZATION_ERROR, "No authorization");
    }

    public static function createNoSuchRoleException()
    {
        return new ZKAdminException(ZKAdminException::NOSUCHROLE_ERROR, "No such role");
    }

    public static function createNoSuchTeamException()
    {
        return new ZKAdminException(ZKAdminException::NOSUCHTEAM_ERROR, "No such team");
    }

    public static function createNoSuchNodeException()
    {
        return new ZKAdminException(ZKAdminException::NOSUCHNODE_ERROR, "No such node");
    }

    public static function createNoSuchUserException()
    {
        return new ZKAdminException(ZKAdminException::NOSUCHUSER_ERROR, "No such user");
    }

    public static function createNoSuchUserTeamException()
    {
        return new ZKAdminException(ZKAdminException::NOSUCHUSERTEAM_ERROR, "No such user_team");
    }

    public static function createNoSuchReviewException()
    {
        return new ZKAdminException(ZKAdminException::NOSUCHREVIEW_ERROR, "No such review");
    }

    public static function createNoSuchSnapshotException()
    {
        return new ZKAdminException(ZKAdminException::NOSUCHSNAPSHOT_ERROR, "No such snapshot");
    }

    public static function createNoLoginException()
    {
        return new ZKAdminException(ZKAdminException::NOLOGIN_ERROR, "Not login");
    }

    public static function createIllegalParameterException()
    {
        return new ZKAdminException(ZKAdminException::ILLEGAL_PARAMETER_ERROR, "Illegal parameter");
    }

    public static function createDBNoDataCreateException()
    {
        return new ZKAdminException(ZKAdminException::DB_NODATA_CREATE, "No data to create");
    }

    public static function createDBNoDataUpdateException()
    {
        return new ZKAdminException(ZKAdminException::DB_NODATA_UPDATE, "No data to update");
    }

    public static function createDBNoDataDeleteException()
    {
        return new ZKAdminException(ZKAdminException::DB_NODATA_DELETE, "No data to delete");
    }

    public static function createIllegalLoginTypeException()
    {
        return new ZKAdminException(ZKAdminException::ILLEGAL_LOGINTYPE_ERROR, "Illegal login type");

    }

    public static function createUnknownException()
    {
        return new ZKAdminException(ZKAdminException::UNKNOWN_ERROR, "Internal error");
    }

    /*
    public static function createUnknownException(Exception exception)
    {
        return new ZKAdminException(7001, exception ZKAdminException::getMessage());
    }
    */

    public static function createUserExistsException()
    {
        return new ZKAdminException(ZKAdminException::USEREXISTS_ERROR, "User exists");
    }

    public static function createNoNodeException()
    {
        return new ZKAdminException(ZKAdminException::NONODE_ERROR, "No such node");
    }

    public static function createNodeExistsException()
    {
        return new ZKAdminException(ZKAdminException::NODEEXISTS_ERROR, "Node already exists");
    }

    public static function createDuplicateKeyException()
    {
        return new ZKAdminException(ZKAdminException::DB_DUPLICATE_KEY, "Duplicate key");
    }

    public static function createDBCreateErrorException()
    {
        return new ZKAdminException(ZKAdminException::DB_CREATE_ERROR, "Data create failed");
    }

    public static function createDBDeleteErrorException()
    {
        return new ZKAdminException(ZKAdminException::DB_DELETE_ERROR, "Data delete failed");
    }

    public static function createDBUpdateErrorException()
    {
        return new ZKAdminException(ZKAdminException::DB_UPDATE_ERROR, "Data update failed");
    }
}