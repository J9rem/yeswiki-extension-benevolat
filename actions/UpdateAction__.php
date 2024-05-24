<?php

namespace YesWiki\Benevolat;

use YesWiki\Core\YesWikiAction;

class UpdateAction__ extends YesWikiAction
{
    public function run()
    {
        if (!$this->isWikiHibernated()
            && $this->wiki->UserIsAdmin()
            && !empty($_GET['action'])
            && $_GET['action'] === 'post_install'
        ) {
            $version = $this->params->get('yeswiki_version');
            if (!is_string($version)) {
                $version = '';
            }
            $release = $this->params->get('yeswiki_release');
            if (!is_string($release)) {
                $release = '';
            }
            $matches = [];
            if (
                $version  !== 'doryphore'
                || !preg_match("/^(\d+)\.(\d+)\.(\d+)\$/", $release, $matches)
                || intval($matches[1]) > 4
                || (
                    intval($matches[1]) === 4
                    && (
                        intval($matches[2]) > 4
                        || (
                            intval($matches[2]) === 4
                            && intval($matches[3]) > 4
                        )
                    )
                )
            ) {
                $anchor = '<span class="update-hint">' . _t('UPDATE_ADMIN_PAGES_HINT') . '</span><br />';
                $this->output = str_replace(
                    $anchor,
                    <<<HTML
                    $anchor
                    <br/>
                    {$this->wiki->render('@benevolat/update-handler.twig', [])}
                    HTML,
                    $this->output
                );
            }
        }
    }

}
