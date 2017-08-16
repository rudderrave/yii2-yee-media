<?php

namespace yeesoft\media\controllers;

use yeesoft\controllers\CrudController;

/**
 * CategoryController implements the CRUD actions for yeesoft\media\models\Category model.
 */
class CategoryController extends CrudController
{
    public $modelClass = 'yeesoft\media\models\Category';
    public $modelSearchClass = 'yeesoft\media\models\CategorySearch';
    public $disabledActions = ['view', 'bulk-activate', 'bulk-deactivate'];

    protected function getRedirectPage($action, $model = null)
    {
        switch ($action) {
            case 'update':
                return ['update', 'id' => $model->id];
                break;
            case 'create':
                return ['update', 'id' => $model->id];
                break;
            default:
                return parent::getRedirectPage($action, $model);
        }
    }
}