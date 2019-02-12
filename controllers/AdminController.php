<?php

namespace app\controllers;

use app\service\ClusterDbService;
use Yii;

/**
 * Created by PhpStorm.
 * User: liuzijian
 * Date: 2019/2/7
 * Time: 23:28
 */
class AdminController extends BaseController
{
    public function actionIndex()
    {
        $page = Yii::$app->request->get('page', 1);

        $clusterSrv = new ClusterDbService();
        $clusters = $clusterSrv->getClustersList($page);

        return $this->renderPartial('index.twig', ['clusters' => $clusters]);
    }

    public function actionCreate()
    {
        $name = Yii::$app->request->post('name');
        $config = Yii::$app->request->post('config');

        $clusterSrv = new ClusterDbService();
        $clusterSrv->createCluster($name, $config);

        $this->redirect('index');
    }

    public function actionUpdate()
    {
        $name = Yii::$app->request->post('name');
        $config = Yii::$app->request->post('config');

        $clusterSrv = new ClusterDbService();
        $clusterSrv->updateCluster($name, $config);

        $this->redirect('index');
    }

    public function actionDelete()
    {
        $name = Yii::$app->request->post('name');

        $clusterSrv = new ClusterDbService();
        $clusterSrv->deleteCluster($name);

        $this->redirect('index');
    }
}