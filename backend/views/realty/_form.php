<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Realty */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="realty-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php

    $addresses = \common\models\Address::find()->all();
    $items = \yii\helpers\ArrayHelper::map($addresses,'id',function ($addresses, $defaultValue) {
        $result = $addresses->street->title . ' ' . $addresses->building;
        if ($addresses->apartment) {
            $result .= ', кв. ' . $addresses->apartment;
        }
        return $result;
    });
    $params = [
        'prompt' => 'Выберите ...'
    ];
    ?>

    <?= $form->field($model, 'address_id')->dropDownList($items, $params) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'photos')->textInput() ?>

    <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <?= $form->field($model, 'phones')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'district')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number_of_rooms')->textInput() ?>

    <?= $form->field($model, 'sleeping_places')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([
        '1' => 'Активный',
        '0' => 'Отключен',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
