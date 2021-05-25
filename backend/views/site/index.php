<?php

/**
 * @var string $realty_all
 * @var string $realty_active
 */

?>
<div class="index">
    <div class="realty">
        <h3>Недвижимость</h3>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="text-center">Количество</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Активны</th>
                    <td class="text-center"><?= $realty_active ?></td>
                </tr>
                <tr>
                    <th scope="row">Отключены</th>
                    <td class="text-center"><?= $realty_all - $realty_active ?></td>
                </tr>
                <tr>
                    <th scope="row">ВСЕГО</th>
                    <td class="text-center"><?= $realty_all ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>