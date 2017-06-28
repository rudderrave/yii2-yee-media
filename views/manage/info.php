<?php

use yeesoft\helpers\Html;
use yeesoft\media\assets\MediaAsset;
use yeesoft\media\models\Album;
use yeesoft\models\User;
use yeesoft\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model yeesoft\media\models\Media */
/* @var $form yeesoft\widgets\ActiveForm */

$bundle = MediaAsset::register($this);
$mode = Yii::$app->getRequest()->get('mode', 'normal');
?>

<?php foreach (Yii::$app->session->getAllFlashes() as $key => $message) : ?>
    <script type="text/javascript"><?= "Notification.show('{$key}', '{$message}');" ?></script>
<?php endforeach ?>

<?php
$form = ActiveForm::begin([
            'action' => ['/media/manage/update', 'id' => $model->id],
            'options' => ['id' => 'control-form'],
        ]);
?>
<div class="row">
    <div class="col-md-6">
        <h5><?= Yii::t('yee/media', 'Media Details') ?>:</h5>
    </div>
    <div class="col-md-6">
        <?php if ($mode !== 'modal'): ?>
            <?= $form->languageSwitcher($model); ?>
        <?php endif; ?>
    </div>
</div>

<div class="clearfix"></div>

<?php if ($mode !== 'modal'): ?>
    <div class="clearfix">
        <a target="_blank" href="<?= $model->getThumbUrl('original') ?>"><?= Html::img($model->getDefaultThumbUrl($bundle->baseUrl)) ?></a>

        <ul class="detail">
            <li><b><?= Yii::t('yee', 'Author') ?>
                    :</b> <?= ($model->created_by) ? (($model->author) ? $model->author->username : 'DELETED') : 'GUEST' ?>
            </li>
            <li><b><?= Yii::t('yee', 'Type') ?>:</b> <?= $model->type ?></li>
            <li><b><?= Yii::t('yee', 'Uploaded') ?>:</b> <?= date("Y-m-d", $model->created_at) ?></li>
            <li><b><?= Yii::t('yee', 'Updated') ?>:</b> <?= date("Y-m-d", $model->getLastChanges()) ?></li>
            <?php if ($model->isImage()) : ?>
                <li><b><?= Yii::t('yee/media', 'Dimensions') ?>
                        :</b> <?= $model->getOriginalImageSize($this->context->module->routes) ?></li>
            <?php endif; ?>
            <li><b><?= Yii::t('yee/media', 'File Size') ?>:</b> <?= $model->getFileSize() ?></li>
        </ul>
    </div>
<?php endif; ?>



<?php /* echo $form->field($model, 'url')->textInput([
  'class' => 'form-control input-sm',
  'readonly' => 'readonly',
  'value' => Yii::$app->urlManager->hostInfo . $model->url,
  ]); */ ?>

<?php if ($mode !== 'modal'): ?>

    <?php if (User::hasPermission('editMedia')): ?>
        <?= $form->field($model, 'album_id')->dropDownList(ArrayHelper::merge([NULL => Yii::t('yee', 'Not Selected')], Album::getAlbums(true, true))) ?>
        <?= $form->field($model, 'title')->textInput(['class' => 'form-control input-sm']); ?>
    <?php else: ?>
        <?= $form->field($model, 'album_id')->dropDownList(ArrayHelper::merge([NULL => Yii::t('yee', 'Not Selected')], Album::getAlbums(true, true)), ['readonly' => 'readonly']) ?>
        <?= $form->field($model, 'title')->textInput(['class' => 'form-control input-sm', 'readonly' => 'readonly']); ?>
    <?php endif; ?>

<?php endif; ?>

<?php if ($model->isImage()) : ?>
    <?php if (User::hasPermission('editMedia')): ?>
        <?= $form->field($model, 'alt')->textInput(['class' => 'form-control input-sm']); ?>
    <?php else: ?>
        <?= $form->field($model, 'alt')->textInput(['class' => 'form-control input-sm', 'readonly' => 'readonly']); ?>
    <?php endif; ?>
<?php endif; ?>

<?php if ($mode !== 'modal'): ?>
    <?php if (User::hasPermission('editMedia')): ?>
        <?= $form->field($model, 'description')->textarea(['class' => 'form-control input-sm']); ?>
    <?php else: ?>
        <?= $form->field($model, 'description')->textarea(['class' => 'form-control input-sm', 'readonly' => 'readonly']); ?>
    <?php endif; ?>
<?php endif; ?>

<?php if ($model->isImage() && ($mode == 'modal')) : ?>
    <div class="form-group<?= $strictThumb ? ' hidden' : '' ?>">
        <?= Html::label(Yii::t('yee/media', 'Select image size'), 'image', ['class' => 'control-label']) ?>
        <?= Html::dropDownList('url', $model->getThumbUrl($strictThumb), $model->getImagesList($this->context->module), ['class' => 'form-control input-sm']) ?>
        <div class="help-block"></div>
    </div>
<?php else : ?>
    <?= Html::hiddenInput('url', $model->url) ?>
<?php endif; ?>

<?= Html::hiddenInput('id', $model->id) ?>

<?php if (User::hasPermission('editMedia') && ($mode != 'modal')): ?>
    <?= Html::submitButton(Yii::t('yee', 'Save'), ['class' => 'btn btn-primary']) ?>
<?php endif; ?>

<?php if ($mode == 'modal'): ?>
    <?= Html::button(Yii::t('yee', 'Insert'), ['id' => 'insert-btn', 'class' => 'btn btn-primary']) ?>
<?php endif; ?>

<?php if ($mode !== 'modal'): ?>
    <?=
    Html::a(Yii::t('yee', 'Delete'), ['/media/manage/delete', 'id' => $model->id], [
        'class' => 'btn btn-default',
        'data-message' => Yii::t('yii', 'Are you sure you want to delete this item?'),
        'data-id' => $model->id,
        'role' => 'delete',
    ])
    ?>
<?php endif; ?>

<?php ActiveForm::end(); ?>