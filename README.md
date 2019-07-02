##Media Module

####Backend module for managing media files 

This module is part of Yee CMS (based on Yii2 Framework).

Media module lets you easily upload and manage images and other files on your site. 

Installation
------------

- Either run

```
composer require --prefer-dist rudderrave/yii2-yee-media "dev-master"
```

or add

```
"rudderrave/yii2-yee-media": "dev-master"
```

to the require section of your `composer.json` file.

- Run migrations

```php
yii migrate --migrationPath=@vendor/rudderrave/yii2-yee-media/migrations/
```

Configuration
------
- In your backend config file

```php
'modules'=>[
    'media' => [
        'class' => 'yeesoft\media\MediaModule',
        'routes' => [
            'baseUrl' => '', // Base absolute path to web directory
            'basePath' => '@frontend/web', // Base web directory url
            'uploadPath' => 'uploads', // Path for uploaded files in web directory
        ],
        //'allowedFileTypes' => ['image/gif', 'image/jpeg', 'image/png'], //allowed for upload file types
    ],
],
```

Dashboard widget
-------  

You can use dashboard widget to display information about recent uploaded images.

Add this code in your control panel dashboard to display widget:
```php
echo \yeesoft\media\widgets\dashboard\Media::widget();
```