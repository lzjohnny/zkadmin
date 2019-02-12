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
class ClusterDbModel extends BaseDbModel
{
    public static function tableName()
    {
        return '{{%cluster}}';
    }

    public function createCluster($name, $config)
    {
        $this->name = $name;
        $this->config = $config;
        $this->time = date('Y-m-d H:i:s');
        return $this->save();
    }

    public function updateCluster($name, $config)
    {
        $cluster = ClusterDbModel::findOne(['name' => $name]);
        $cluster->name = $name;
        $cluster->config = $config;
        return $cluster->save();
    }

    public function deleteCluster($name)
    {
        $cluster = ClusterDbModel::findOne(['name' => $name]);
        return $cluster->delete();
    }

    public function getClustersList($page, $pageSize = 10)
    {
        $offset = ($page - 1) * $pageSize;
        $clusters = ClusterDbModel::find()->offset($offset)->limit($pageSize)->all();
        return $clusters;
    }

    public function getClusterConfig($name)
    {
        $cond = ['name' => $name];
        $cluster = ClusterDbModel::find()->where($cond)->limit(1)->one();
        return $cluster->config;
    }
}