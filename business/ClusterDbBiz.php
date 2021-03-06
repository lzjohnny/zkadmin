<?php

namespace app\business;

use app\components\ZKAdminException;
use app\models\ClusterDbModel;

/**
 * Created by PhpStorm.
 * User: liuzijian
 * Date: 2019/1/31
 * Time: 11:18
 */
class ClusterDbBiz extends BaseBiz
{
    private $cluster;

    public function __construct()
    {
        $this->cluster = new ClusterDbModel();
    }

    public function getClustersList($page, $pageSize = 20)
    {
        $clustersList = $this->cluster->getClustersList($page, $pageSize);

        $clustersInfo = [];
        foreach ($clustersList as $cluster) {
            $clusterItem['id'] = $cluster->id;
            $clusterItem['name'] = $cluster->name;
            $clusterItem['config'] = $cluster->config;
            $clusterItem['time'] = $cluster->time;

            $clustersInfo[] = $clusterItem;
        }
        return $clustersInfo;
    }

    public function createCluster($name, $config)
    {
        if (empty($name) || empty($config)) {
            throw ZKAdminException::createIllegalParameterException();
        }
        $this->cluster->createCluster($name, $config);
    }

    public function updateCluster($name, $config)
    {
        if (empty($name) || empty($config)) {
            throw ZKAdminException::createIllegalParameterException();
        }
        $this->cluster->updateCluster($name, $config);
    }

    public function deleteCluster($name) // 最好用ID识别
    {
        if (empty($name)) {
            throw ZKAdminException::createIllegalParameterException();
        }
        $this->cluster->deleteCluster($name);
    }

    public function getClusterConfig($name)
    {
        if (empty($name)) {
            throw ZKAdminException::createIllegalParameterException();
        }
        $config = $this->cluster->getClusterConfig($name);
        return $config;
    }
}