<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Realty */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Недмижимость', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="realty-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
            'name',
            'title',
            'description',
            'price',
            'photos',
            'phones',
            'contact',
            'district',
            'number_of_rooms',
            'sleeping_places',
            [
                'attribute' => 'status',
                'value' => function($data){
                    return !$data->status ?
                        '<span class="text-danger">Отключен</span>' :
                        '<span class="text-success">Активен</span>';
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'created_at',
                'value' => function($data){
                    return date('d.m.Y H:i:s', $data->created_at);
                },
            ],
            [
                'attribute' => 'updated_at',
                'value' => function($data){
                    return date('d.m.Y H:i:s', $data->updated_at);
                },
            ],
        ],
    ]) ?>

</div>
