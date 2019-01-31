<?php

namespace app\controllers;

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
        $clusters = [
            ['name' => 'dev', 'config' => '123'],
            ['name' => 'test', 'config' => '123'],
        ];
        $cluster = 'dev';
        return $this->renderPartial('list.twig', ['clusters' => $clusters, 'cluster' => $cluster]);
    }
}