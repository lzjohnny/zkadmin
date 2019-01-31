<?php

namespace app\business;

use app\models\Cluster;
use yii\data\Pagination;

/**
 * Created by PhpStorm.
 * User: liuzijian
 * Date: 2019/1/31
 * Time: 11:18
 */
class ClusterAdminBiz extends BaseBiz
{
    public function getClusterList($page, $pageSize = 20)
    {
        $offset = ($page - 1) * $pageSize;
        $clusters = Cluster::find()->offset($offset)->limit($pageSize)->all();
    }
}