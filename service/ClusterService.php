<?php

namespace app\service;

use app\business\ClusterAdminBiz;

/**
 * Created by PhpStorm.
 * User: liuzijian
 * Date: 2019/2/8
 * Time: 9:06
 */
class ClusterService extends BaseService
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
}