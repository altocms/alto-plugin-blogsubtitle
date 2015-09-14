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

class PluginBlogsubtitle_ActionBlog extends PluginBlogsubtitle_Inherits_ActionBlog {

    protected function checkBlogFields($oBlog = null) {

        $bOk = parent::checkBlogFields($oBlog);

        if (!F::isPost('submit_blog_add')) {
            //  Проверяем есть ли подзаголовок блога
            $iMin = C::Get('plugin.blogsubtitle.min_subtitle_len');
            $iMax = C::Get('plugin.blogsubtitle.max_subtitle_len');
            $sSubtitle = F::GetRequestStr('blog_subtitle');

            if (!$sSubtitle && $iMin) {
                E::ModuleMessage()->AddError(
                    E::ModuleLang()->Get('plugin.blogsubtitle.blog_create_subtitle_error', array('min' => $iMin, 'max' => $iMax)),
                    E::ModuleLang()->Get('error'));
                $bOk = false;
            } elseif ($iMax) {
                if (!F::CheckVal($sSubtitle, 'text', $iMin, $iMax)) {
                    E::ModuleMessage()->AddError(
                        E::ModuleLang()->Get('plugin.blogsubtitle.blog_create_subtitle_error', array('min' => $iMin, 'max' => $iMax)),
                        E::ModuleLang()->Get('error'));
                    $bOk = false;
                }
            }
        }

        return $bOk;
    }

    protected function _addBlog($oBlog) {

        $sSubtitle = E::ModuleText()->Parser(F::GetRequestStr('blog_subtitle'));
        $oBlog->setSubtitle($sSubtitle);

        return parent::_addBlog($oBlog);
    }

    protected function EventEditBlog() {

        $xResult = parent::EventEditBlog();
        if (is_null($xResult)) {
            $_REQUEST['blog_subtitle'] = $this->oCurrentBlog->getSubtitle();
        }
    }

    protected function _updateBlog($oBlog) {

        $sSubtitle = E::ModuleText()->Parser(F::GetRequestStr('blog_subtitle'));
        $oBlog->setSubtitle($sSubtitle);

        return parent::_updateBlog($oBlog);
    }
}

// EOF