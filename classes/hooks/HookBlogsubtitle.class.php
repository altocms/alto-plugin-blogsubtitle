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

class PluginBlogsubtitle_HookBlogsubtitle extends Hook {

    public function RegisterHook() {

        $this->AddHookTemplate('form_add_blog_end', Plugin::GetTemplateDir(__CLASS__) . '/tpls/hook_form_add_blog_end.tpl');
    }

}

// EOF