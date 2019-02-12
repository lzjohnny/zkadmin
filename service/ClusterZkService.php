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
    private $clusterBiz;
    private $nodeBiz;

    public function __construct()
    {
        $this->clusterBiz = new ClusterDbBiz();
        $this->nodeBiz = new ClusterZkBiz();
    }

    public function getClustersList($page = 1, $pageSize = 10)
    {
        $clusters = $this->clusterBiz->getClustersList($page, $pageSize);
        return $clusters;
    }

    public function getNodeChildren($cluster, $path)
    {
        $address = $this->clusterBiz->getClusterConfig($cluster);
        $children = $this->nodeBiz->getChildren($address, $path);
        sort($children);
        return $children;
    }
}