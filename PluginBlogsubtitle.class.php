<?php
/*---------------------------------------------------------------------------
 * @Project: Alto CMS
 * @Project URI: http://altocms.com
 * @Description: Advanced Community Engine
 * @Copyright: Alto CMS Team
 * @License: GNU GPL v2 & MIT
 *----------------------------------------------------------------------------
 */

/**
 * @package plugin BlogSubtitle
 */

class PluginBlogsubtitle extends Plugin {

    protected $aInherits
        = array(
            'action' => array(
                'ActionBlog',
            ),
            'module' => array(
                'ModuleBlog',
            ),
            'entity' => array(
                'ModuleBlog_EntityBlog'
            ),
            'mapper' => array(
                'ModuleBlog_MapperBlog'
            ),
        );


    /**
     * Активация плагина
     */
    public function Activate() {

        if (!$this->isFieldExists('?_blog', 'blog_subtitle')) {
            $this->ExportSQL(__DIR__ . '/install/db/init.sql');
        }

        return true;
    }

    /**
     * Деактивация плагина
     *
     * @return bool
     */
    public function Deactivate() {

        return true;
    }

    /**
     * Инициализация плагина
     */
    public function Init() {

        return true;
    }

}

// EOF