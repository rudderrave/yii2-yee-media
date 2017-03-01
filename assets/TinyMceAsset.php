<?php

namespace yeesoft\media\assets;

use yii\web\AssetBundle;

class TinyMceAsset extends AssetBundle
{

    public $sourcePath = '@vendor/tinymce/tinymce';
    public $js = [
        'tinymce.jquery.min.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];

}
