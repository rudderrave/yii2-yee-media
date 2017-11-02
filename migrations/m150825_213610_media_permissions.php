<?php

use yeesoft\db\PermissionsMigration;

class m150825_213610_media_permissions extends PermissionsMigration
{

    public function safeUp()
    {
        $this->addPermissionsGroup('media-management', 'Media Management');

        $this->addModel('media', 'Media', yeesoft\media\models\Media::class);
        $this->addModel('media-album', 'Media Album', yeesoft\media\models\Album::class);
        $this->addModel('media-category', 'Media Category', yeesoft\media\models\Category::class);

        parent::safeUp();
    }

    public function safeDown()
    {
        parent::safeDown();

        $this->removeModel('media');
        $this->removeModel('media-album');
        $this->removeModel('media-category');

        $this->deletePermissionsGroup('media-management');
    }

    public function getPermissions()
    {
        return [
            'media-management' => [
                'view-media' => [
                    'title' => 'View Media',
                    'roles' => [self::ROLE_AUTHOR],
                    'routes' => [
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'media/default', 'action' => 'index'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'media/manage', 'action' => 'index'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'media/manage', 'action' => 'info'],
                    ],
                ],
                'update-media' => [
                    'title' => 'Update Media',
                    'child' => ['view-media'],
                    'roles' => [self::ROLE_AUTHOR],
                    'routes' => [
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'media/manage', 'action' => 'update'],
                    ],
                ],
                'create-media' => [
                    'title' => 'Create Media',
                    'child' => ['view-media'],
                    'roles' => [self::ROLE_AUTHOR],
                    'routes' => [
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'media/manage', 'action' => 'upload'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'media/manage', 'action' => 'uploader'],
                    ],
                ],
                'delete-media' => [
                    'title' => 'Delete Media',
                    'child' => ['view-media'],
                    'roles' => [self::ROLE_ADMIN],
                    'routes' => [
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'media/manage', 'action' => 'delete'],
                    ],
                ],
                'update-media-settings' => [
                    'title' => 'Update Media Settings',
                    'child' => ['view-media'],
                    'roles' => [self::ROLE_ADMIN],
                    'routes' => [
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'media/default', 'action' => 'settings'],
                    ],
                ],
                'view-media-albums' => [
                    'title' => 'View Media Albums',
                    'roles' => [self::ROLE_ADMIN],
                    'routes' => [
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'media/album', 'action' => 'index'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'media/album', 'action' => 'grid-sort'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'media/album', 'action' => 'grid-page-size'],
                    ],
                ],
                'update-media-albums' => [
                    'title' => 'Update Media Albums',
                    'child' => ['view-media-albums'],
                    'roles' => [self::ROLE_ADMIN],
                    'routes' => [
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'media/album', 'action' => 'update'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'media/album', 'action' => 'toggle-attribute'],
                    ],
                ],
                'create-media-albums' => [
                    'title' => 'Create Media Albums',
                    'child' => ['view-media-albums'],
                    'roles' => [self::ROLE_ADMIN],
                    'routes' => [
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'media/album', 'action' => 'create'],
                    ],
                ],
                'delete-media-albums' => [
                    'title' => 'Delete Media Albums',
                    'child' => ['view-media-albums'],
                    'roles' => [self::ROLE_ADMIN],
                    'routes' => [
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'media/album', 'action' => 'delete'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'media/album', 'action' => 'bulk-delete'],
                    ],
                ],
                'view-media-categories' => [
                    'title' => 'View Media Categories',
                    'roles' => [self::ROLE_ADMIN],
                    'routes' => [
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'media/category', 'action' => 'index'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'media/category', 'action' => 'grid-sort'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'media/category', 'action' => 'grid-page-size'],
                    ],
                ],
                'update-media-categories' => [
                    'title' => 'Update Media Categories',
                    'child' => ['view-media-categories'],
                    'roles' => [self::ROLE_ADMIN],
                    'routes' => [
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'media/category', 'action' => 'update'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'media/category', 'action' => 'toggle-attribute'],
                    ],
                ],
                'create-media-categories' => [
                    'title' => 'Create Media Categories',
                    'child' => ['view-media-categories'],
                    'roles' => [self::ROLE_ADMIN],
                    'routes' => [
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'media/category', 'action' => 'create'],
                    ],
                ],
                'delete-media-categories' => [
                    'title' => 'Delete Media Categories',
                    'child' => ['view-media-categories'],
                    'roles' => [self::ROLE_ADMIN],
                    'routes' => [
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'media/category', 'action' => 'delete'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'media/category', 'action' => 'bulk-delete'],
                    ],
                ],
            ],
        ];
    }

}
