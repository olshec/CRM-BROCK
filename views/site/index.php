<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;


$this->title = 'Система учета клиентов';
?>



<div class="site-index">

    <div class="jumbotron">
<!--         <h1>Congratulations!</h1> -->

        <p class="lead"></p>

<!--         <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p> -->
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>&nbsp;&nbsp;Локация</h2>
                    <?= Html::a('Города', ['/city'],  ['class' => ['btn', 'btn-primary']]) ?>
                    <br><br>
                    <?= Html::a('Страны', ['/country'],  ['class' => ['btn', 'btn-primary']] ) ?>
                    <br><br>
<!--                 <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p> -->
            </div>
            
            <div class="col-lg-4">
                <h2>&nbsp;&nbsp;&nbsp;Детали</h2>
               		<?= Html::a('Детали', ['/detail'],  ['class' => ['btn', 'btn-primary']] ) ?>
                    <br><br>
                    <?= Html::a('Виды деталей', ['/type-detail'],  ['class' => ['btn', 'btn-primary']] ) ?>
                    <br><br>

<!--                 <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p> -->
            </div>
            
            <div class="col-lg-4">
                <h2>&nbsp;Поставка</h2>
                    <?= Html::a('Поставщики', ['/distributer'],  ['class' => ['btn', 'btn-primary']] ) ?>
                    <br><br>
                    <?= Html::a('Клиенты', ['/customers'],  ['class' => ['btn', 'btn-primary']] ) ?>
                    <br><br>
                    <?= Html::a('Заказы', ['/order'],  ['class' => ['btn', 'btn-primary']] ) ?>
            </div>
            
            
            
        </div>

    </div>
</div>


