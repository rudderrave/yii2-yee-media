<?php

/* @var $this yii\web\View */
/* @var $model yeesoft\media\models\Album */

$this->title = Yii::t('yee', 'Update {item}', ['item' => Yii::t('yee/media', 'Album')]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/media', 'Media'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/media', 'Albums'), 'url' => ['album/index']];
$this->params['breadcrumbs'][] = Yii::t('yee', 'Update');
?>

<?= $this->render('_form', compact('model')) ?>