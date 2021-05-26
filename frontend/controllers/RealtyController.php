<?php

namespace frontend\controllers;

use common\models\Realty;

class RealtyController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $realty = Realty::find()->where("status = 1")->all();

        return $this->render('index', compact('realty'));
    }

    public function actionView()
    {
        $realty = Realty::find()->where([
            'status' => 1
        ])->one();

        return $this->render('view', [
            'item' => $realty
        ]);
    }

}
