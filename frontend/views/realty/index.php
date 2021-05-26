<?php
/* @var $this yii\web\View
 * @var \common\models\Realty $realty
 */

use yii\helpers\Html;

?>
<h1>Недвижимость</h1>

<div class="realty-wrap row">
    <?php foreach ($realty as $item) : ?>
    <div class="realty col-sm-4">
        <div class="realty__bg">
            <div class="realty__image">
                <?php
                $photos = explode('|', $item->photos);
                foreach ($photos as $key => $photo) :
                    if ($photo) :
                        ?>
                        <div>
                            <img width="100%" src="/uploads/realty/<?= $item->id ?>/<?= $photo ?>" alt="<?= $key + 1 ?> slide">
                        </div>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
            <div class="realty__box">
                <div class="realty__name">Нас. пункт:</div>
                <div class="realty__value"><?= $item->address->street->city->title ?></div>
            </div>
            <div class="realty__box">
                <div class="realty__name">Район:</div>
                <div class="realty__value"><?= $item->district ?></div>
            </div>
            <div class="realty__box">
                <div class="realty__name">Адрес:</div>
                <div class="realty__value"><?php
                    $result = $item->address->street->title . ' ' . $item->address->building;
                    if ($item->address->apartment) {
                        $result .= ', кв. ' . $item->address->apartment;
                    }
                    echo $result;
                    ?></div>
            </div>
            <div class="realty__box">
                <div class="realty__name">Количество комнат:</div>
                <div class="realty__value"><?= $item->number_of_rooms ?></div>
            </div>
            <div class="realty__box">
                <div class="realty__name">Спальные места:</div>
                <div class="realty__value"><?= $item->sleeping_places ?></div>
            </div>
            <div class="realty__box">
                <div class="realty__name">Цена:</div>
                <div class="realty__value"><?= $item->price ?> руб.</div>
            </div>
            <div class="realty__box">
                <div class="realty__name">Телефон:</div>
                <div class="realty__value"><?= $item->phones ?></div>
            </div>
            <div class="realty__button">
                <?= Html::a('Подробнее', ['realty/view/', ['id' => $item->id]], ['class' => 'btn btn-danger']) ?>
            </div>
        </div>
    </div>
    <?php endforeach ?>
</div>