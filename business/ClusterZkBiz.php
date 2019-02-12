<?php

namespace app\business;

use app\models\ClusterZkModel;

/**
 * Created by PhpStorm.
 * User: liuzijian
 * Date: 2019/2/12
 * Time: 11:23
 */
class ClusterZkBiz extends BaseBiz
{
    public function getChildren($address, $path)
    {
        $node = new ClusterZkModel($address);
        $children = $node->getChildren($path);
        return $children;
    }

    public function create()
    {

    }

    public function delete()
    {

    }

    public function exists()
    {

    }
}