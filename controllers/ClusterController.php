<?php

namespace app\controllers;

use app\service\ClusterZkService;
use Yii;

/**
 * Created by PhpStorm.
 * User: liuzijian
 * Date: 2019/1/31
 * Time: 11:05
 */
class ClusterController extends BaseController
{
    public function actionIndex()
    {
        $page = Yii::$app->request->get('page');

        $clusterSrv = new ClusterZkService();
        $clusters = $clusterSrv->getClustersList($page);

        return $this->renderPartial('list.twig', ['clusters' => $clusters]);
    }

    public function actionSelect($cluster)
    {
        $path = Yii::$app->request->get('path');

        $clusterSrv = new ClusterZkService();
        $children = $clusterSrv->getNodeChildren($cluster, $path);

        $attrs = [
            'children' => $children,
            'data' => '',
            'stat' => '',
            'path' => '/path1/path2',
            'pathArr' => ['path1', 'path2'],
            'cluster' => $cluster,
            'clusters' => '',
            'snapshots' => '',
            'hasPermission' => '',
            'hasDeletePermission' => '',
            'isOnebox' => '',
            'showIp' => '',
        ];

        return $this->renderPartial('index.twig', $attrs);
    }
}