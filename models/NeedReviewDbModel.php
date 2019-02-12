<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Created by PhpStorm.
 * User: liuzijian
 * Date: 2019/1/31
 * Time: 10:57
 */
class NeedReviewDbModel extends BaseDbModel
{
    public static function tableName()
    {
        return '{{%need_review}}';
    }
}