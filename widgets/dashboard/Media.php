<?php

namespace yeesoft\media\widgets\dashboard;

use Yii;
use yeesoft\media\models\Media as MediaModel;
use yeesoft\models\User;
use yeesoft\widgets\DashboardWidget;

class Media extends DashboardWidget
{
    /**
     * Most recent post limit
     */
    public $recentLimit = 5;

    /**
     * Post index action
     */
    public $indexAction = 'media/default/index';

    public function run()
    {
        if (Yii::$app->user->can('view-media')) {
            $recent = MediaModel::find()->orderBy(['id' => SORT_DESC])->limit($this->recentLimit)->all();

            return $this->render('media',
                [
                    'height' => $this->height,
                    'width' => $this->width,
                    'position' => $this->position,
                    'recent' => $recent,
                ]);
        }
    }
}