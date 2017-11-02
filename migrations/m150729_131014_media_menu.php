<?php

class m150729_131014_media_menu extends yii\db\Migration
{

    public function up()
    {
        $this->insert('{{%menu_link}}', ['id' => 'admin-menu-media', 'menu_id' => 'admin-menu', 'image' => 'image', 'created_by' => 1, 'order' => 5]);
        $this->insert('{{%menu_link}}', ['id' => 'admin-menu-media-index', 'menu_id' => 'admin-menu', 'link' => '/media/default/index', 'parent_id' => 'admin-menu-media', 'created_by' => 1, 'order' => 1]);
        $this->insert('{{%menu_link}}', ['id' => 'admin-menu-media-album', 'menu_id' => 'admin-menu', 'link' => '/media/album/index', 'parent_id' => 'admin-menu-media', 'created_by' => 1, 'order' => 2]);
        $this->insert('{{%menu_link}}', ['id' => 'admin-menu-media-category', 'menu_id' => 'admin-menu', 'link' => '/media/category/index', 'parent_id' => 'admin-menu-media', 'created_by' => 1, 'order' => 3]);
        $this->insert('{{%menu_link}}', ['id' => 'admin-menu-image-settings', 'menu_id' => 'admin-menu', 'link' => '/media/default/settings', 'parent_id' => 'admin-menu-settings', 'created_by' => 1, 'order' => 5]);

        $this->insert('{{%menu_link_lang}}', ['link_id' => 'admin-menu-media', 'label' => 'Media', 'language' => 'en-US']);
        $this->insert('{{%menu_link_lang}}', ['link_id' => 'admin-menu-media-index', 'label' => 'Media', 'language' => 'en-US']);
        $this->insert('{{%menu_link_lang}}', ['link_id' => 'admin-menu-media-album', 'label' => 'Albums', 'language' => 'en-US']);
        $this->insert('{{%menu_link_lang}}', ['link_id' => 'admin-menu-media-category', 'label' => 'Categories', 'language' => 'en-US']);
        $this->insert('{{%menu_link_lang}}', ['link_id' => 'admin-menu-image-settings', 'label' => 'Image Settings', 'language' => 'en-US']);

    }

    public function down()
    {
        $this->delete('{{%menu_link}}', ['like', 'id', 'admin-menu-image-settings']);
        $this->delete('{{%menu_link}}', ['like', 'id', 'admin-menu-media-category']);
        $this->delete('{{%menu_link}}', ['like', 'id', 'admin-menu-media-album']);
        $this->delete('{{%menu_link}}', ['like', 'id', 'admin-menu-media-index']);
        $this->delete('{{%menu_link}}', ['like', 'id', 'admin-menu-media']);
    }
}