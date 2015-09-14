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

class PluginBlogsubtitle_ModuleBlog_EntityBlog extends PluginBlogsubtitle_Inherits_ModuleBlog_EntityBlog {

    public function setSubtitle($sSubtitle) {

        $this->setProp('blog_subtitle', $sSubtitle);
    }

    public function getSubtitle() {

        return $this->getProp('blog_subtitle');
    }

}

// EOF