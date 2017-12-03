<?php

namespace yeesoft\media\widgets;

use Yii;

class Gallery extends \yii\base\Widget
{

    /**
     * @var ActiveRecord
     */
    public $modelClass = 'yeesoft\media\models\Media';

    /**
     * @var ActiveRecord
     */
    public $modelSearchClass = 'yeesoft\media\models\MediaSearch';
    public $pageSize = 15;
    public $mode = 'normal';

    public function run()
    {
        $params = Yii::$app->request->getQueryParams();
        $searchModel = $this->modelSearchClass ? new $this->modelSearchClass : null;

        $dataProvider = $searchModel->search($params);
        $dataProvider->pagination->defaultPageSize = $this->pageSize;

        return $this->render('gallery', [
                    'searchModel' => $searchModel,
                    'mode' => $this->mode,
                    'dataProvider' => $dataProvider,
                        ]
        );
    }

}
