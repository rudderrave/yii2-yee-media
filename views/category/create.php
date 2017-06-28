<?php

/* @var $this yii\web\View */
/* @var $model yeesoft\media\models\Category */

$this->title = Yii::t('yee/media', 'Create Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/media', 'Media'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/media', 'Albums'), 'url' => ['album/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/media', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('yee', 'Create');
?>

<?= $this->render('_form', compact('model')) ?>