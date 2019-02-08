<?php

namespace app\service;

use app\business\ClusterAdminBiz;
use Yii;

/**
 * Created by PhpStorm.
 * User: liuzijian
 * Date: 2019/2/8
 * Time: 10:41
 */
class ClusterAdminService extends BaseService
{
    private $clusterBiz;

    public function __construct()
    {
        $this->clusterBiz = new ClusterAdminBiz();
    }

    public function getClusterList($page = 1, $pageSize = 10)
    {
        $clusters = $this->clusterBiz->getClusterList($page, $pageSize);
        return $clusters;
    }

    public function createCluster($name, $config)
    {
        Yii::info("Create cluster, name=${name}, config=${config}, operator=create");
        $this->clusterBiz->createCluster($name, $config);
    }

    public function updateCluster($name, $config)
    {
        Yii::info("Create cluster, name=${name}, config=${config}, operator=update");
        $this->clusterBiz->updateCluster($name, $config);
    }

    public function deleteCluster($name) // 最好用ID识别
    {
        Yii::info("Create cluster, name=${name}, operator=delete");
        $this->clusterBiz->deleteCluster($name);
    }

}