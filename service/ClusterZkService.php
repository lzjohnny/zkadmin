<?php

namespace app\service;

use app\business\ClusterDbBiz;
use app\business\ClusterZkBiz;

/**
 * Created by PhpStorm.
 * User: liuzijian
 * Date: 2019/2/8
 * Time: 9:06
 */
class ClusterZkService extends BaseService
{
    private $clusterDbBiz;
    private $clusterZkBiz;

    public function __construct()
    {
        $this->clusterDbBiz = new ClusterDbBiz();
        $this->clusterZkBiz = new ClusterZkBiz();
    }

    public function getClustersList($page = 1, $pageSize = 10)
    {
        $clusters = $this->clusterDbBiz->getClustersList($page, $pageSize);
        return $clusters;
    }

    public function getNodeChildren($cluster, $path)
    {
        $address = $this->clusterDbBiz->getClusterConfig($cluster);
        $children = $this->clusterZkBiz->getChildren($address, $path);
        sort($children);
        return $children;
    }
}