<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Created by PhpStorm.
 * User: liuzijian
 * Date: 2019/1/31
 * Time: 10:57
 */
class NeedReview extends ActiveRecord
{
    public $id;
    public $cluster;
    public $reviewer_list;
    public $path_prefix;
    public $time;

    public static function tableName()
    {
        return parent::tableName();
    }
}