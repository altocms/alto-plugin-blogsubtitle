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

class PluginBlogsubtitle_ModuleBlog_MapperBlog extends PluginBlogsubtitle_Inherits_ModuleBlog_MapperBlog {

    protected function _updateSubtitle($iBlogId, $sSubtitle) {

        $sql = "
            UPDATE ?_blog SET blog_subtitle=? WHERE blog_id=?d
        ";
        $bResult = $this->oDb->query($sql, $sSubtitle, $iBlogId);
        return $bResult !== false;
    }

    public function AddBlog($oBlog) {

        $iBlogId = parent::AddBlog($oBlog);
        if ($iBlogId) {
            $this->_updateSubtitle($iBlogId, $oBlog->getSubtitle());
        }

        return $iBlogId ? $iBlogId : false;
    }

    public function UpdateBlog($oBlog) {

        $bResult = parent::UpdateBlog($oBlog);
        if ($bResult) {
            $this->_updateSubtitle($oBlog->getId(), $oBlog->getSubtitle());
        }

        return $bResult;
    }

}

// EOF