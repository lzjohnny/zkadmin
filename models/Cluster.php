<?php

namespace app\models;

use app\components\ZKAdminException;
use yii\db\ActiveRecord;

/**
 * Created by PhpStorm.
 * User: liuzijian
 * Date: 2019/1/31
 * Time: 10:57
 */
class Cluster extends ActiveRecord
{
    public $id;
    public $name;
    public $config;
    public $time;

    public static function tableName()
    {
        return parent::tableName();
    }

    public function createCluster($name, $config)
    {
        if (empty($name) || empty($config)) {
            throw new ZKAdminException();
        }

        $cluster = new Cluster();
        $cluster->name = $name;
        $cluster->config = $config;
        $cluster->time = date('Y-m-d H:i:s');
        $cluster->save();
    }

    public function updateCluster()
    {

    }

    public function deleteCluster()
    {

    }
}