<?php
/**
 * Created by PhpStorm.
 * User: anguoyue
 * Date: 31/08/2018
 * Time: 6:45 PM
 */

class ZalyError
{
    const ErrorGroupCreateForbid = "error.group.create.forbid";
    const ErrorGroupEmptyId = "error.group.emptyId";
    const ErrorGroupPermission = "error.group.permission";

    private static $defaultErrors = ["error", "request error", "请求错误"];


    public static $errors = [
        "error.group.emptyId" => ["error.alert", "groupId is empty", "群Id为空"],
        "error.group.permission" => ["error.alert", "no permission for group", "无当前群组操作权限"],
        "error.group.create.forbid" => ["error.alert", "create group forbidden", "站点禁止创建群组"],
    ];

    public static function getErrCode($error)
    {
        if (isset(self::$errors[$error])) {
            return self::$errors[$error][0];
        }
        return self::$defaultErrors[0];
    }

    public static function getErrorInfo($error, $lang)
    {
        return self::getErrorInfo2($error, $lang);
    }

    public static function getErrorInfo2($error, $lang = Zaly\Proto\Core\UserClientLangType::UserClientLangZH)
    {
        if (isset(self::$errors[$error])) {
            return self::$errors[$error][$lang + 1];
        }
        return self::$defaultErrors[$lang + 1];
    }

}