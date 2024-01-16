<?php

namespace app\Contracts;

interface DefaultMethods
{
    public static function insertInfo();
    public static function insertBulkInfo();
    public static function updateInfo();
    public static function deleteInfo();
    public static function restoreInfoByID();
    public static function getInfoByID(int $ID);
    public static function getAll();
}