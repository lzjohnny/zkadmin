<?php

namespace app\models;

/**
 * Created by PhpStorm.
 * User: liuzijian
 * Date: 2019/2/12
 * Time: 11:33
 */
class SnapshotDbModel extends BaseDbModel
{
    public static function tableName()
    {
        return '{{%snapshot}}';
    }
}