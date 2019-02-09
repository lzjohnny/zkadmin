<?php

namespace app\controllers;

use app\service\ClusterService;
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

        $clusterSrv = new ClusterService();
        $clusters = $clusterSrv->getClusterList($page);

        return $this->renderPartial('list.twig', ['clusters' => $clusters]);
    }

    public function actionSelect($name)
    {
        $attrs = [
            'children' => ['test1', 'test2', 'test3'],
            'data' => '',
            'stat' => '',
            'path' => '/path1/path2',
            'pathArr' => ['path1', 'path2'],
            'cluster' => $name,
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