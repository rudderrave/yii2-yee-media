<?php

use yii\widgets\Pjax;
use yeesoft\helpers\Html;
use yeesoft\grid\GridView;
use yeesoft\media\models\Category;

/* @var $this yii\web\View */
/* @var $searchModel yeesoft\media\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yee/media', 'Categories');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/media', 'Media'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/media', 'Albums'), 'url' => ['album/index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['description'] = 'YeeCMS 0.2.0';
$this->params['header-content'] = Html::a(Yii::t('yee', 'Add New'), ['create'], ['class' => 'btn btn-sm btn-primary']) . ' '
        . Html::a(Yii::t('yee/media', 'Manage Albums'), ['album/index'], ['class' => 'btn btn-sm btn-primary']);
?>

<div class="box box-primary">
    <div class="box-body">
        <?php $pjax = Pjax::begin() ?>
        <?=
        GridView::widget([
            'pjaxId' => $pjax->id,
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'quickFilters' => false,
            'columns' => [
                ['class' => 'yeesoft\grid\CheckboxColumn', 'options' => ['style' => 'width:10px'], 'displayFilter' => false],
                [
                    'class' => 'yeesoft\grid\columns\TitleActionColumn',
                    'controller' => '/media/category',
                    'title' => function (Category $model) {
                        return Html::a($model->title, ['/media/category/update', 'id' => $model->id], ['data-pjax' => 0]);
                    },
                    'buttonsTemplate' => '{update} {delete}',
                    'filterOptions' => ['colspan' => 2],
                ],
                'description:ntext',
                [
                    'class' => 'yeesoft\grid\columns\StatusColumn',
                    'attribute' => 'visible',
                ],
            ],
        ]);
        ?>
        <?php Pjax::end() ?>
    </div>
</div>