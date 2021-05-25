<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\RealtySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Недвижимость';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="realty-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Новая недвижимость', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'address_id',
                'value' => function($data){
                    $result = $data->address->street->title . ' ' . $data->address->building;
                    if ($data->address->apartment) {
                        $result .= ', кв. ' . $data->address->apartment;
                    }
                    return $result;
                },
            ],
//            'name',
            'title',
            [
                'attribute' => 'status',
                'value' => function($data){
                    return !$data->status ?
                        '<span class="text-danger">Отключен</span>' :
                        '<span class="text-success">Активен</span>';
                },
                'format' => 'raw',
            ],
//            'description',
//            'price',
            //'photos',
            //'phones',
            //'contact',
            //'district',
            //'number_of_rooms',
            //'sleeping_places',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
