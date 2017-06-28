<?php

use yii\helpers\Html;
use yeesoft\media\widgets\Gallery;
use yeesoft\media\assets\ModalAsset;

/* @var $this yii\web\View */

$this->title = Yii::t('yee/media', 'Media');
$this->params['breadcrumbs'][] = $this->title;

$this->params['description'] = 'YeeCMS 0.2.0';
$this->params['header-content'] = Html::a(Yii::t('yee/media', 'Manage Albums'), ['album/index'], ['class' => 'btn btn-sm btn-primary']);

ModalAsset::register($this);
?>

<div class="box box-primary">
    <div class="box-body">
        <?= Gallery::widget() ?>
    </div>
</div>

