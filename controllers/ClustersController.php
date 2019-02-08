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
class ClustersController extends BaseController
{
    public function actionIndex()
    {
        $page = Yii::$app->request->get('page');

        $clusterSrv = new ClusterService();
        $clusters = $clusterSrv->getClusterList($page);

        return $this->renderPartial('list.twig', ['clusters' => $clusters]);
    }
}