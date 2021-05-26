<?php


?>
<h1><?= $item->title ?></h1>

<div class="realty-one row">
    <div class="realty-one__image col-sm-6">
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
    <div class="realty-one__harac col-sm-6">
        <div class="realty-one__box">
            <div class="realty-one__name">Нас. пункт:</div>
            <div class="realty-one__value"><?= $item->address->street->city->title ?></div>
        </div>
        <div class="realty-one__box">
            <div class="realty-one__name">Район:</div>
            <div class="realty-one__value"><?= $item->district ?></div>
        </div>
        <div class="realty-one__box">
            <div class="realty-one__name">Адрес:</div>
            <div class="realty-one__value"><?php
                $result = $item->address->street->title . ' ' . $item->address->building;
                if ($item->address->apartment) {
                    $result .= ', кв. ' . $item->address->apartment;
                }
                echo $result;
                ?></div>
        </div>
        <div class="realty-one__box">
            <div class="realty-one__name">Количество комнат:</div>
            <div class="realty-one__value"><?= $item->number_of_rooms ?></div>
        </div>
        <div class="realty-one__box">
            <div class="realty-one__name">Спальные места:</div>
            <div class="realty-one__value"><?= $item->sleeping_places ?></div>
        </div>
        <div class="realty-one__box">
            <div class="realty-one__name">Цена:</div>
            <div class="realty-one__value"><?= $item->price ?> руб.</div>
        </div>
        <div class="realty-one__box">
            <div class="realty-one__name">Телефон:</div>
            <div class="realty-one__value"><?= $item->phones ?></div>
        </div>
    </div>
</div>
