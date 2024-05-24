<?php

namespace YesWiki\Benevolat;

use YesWiki\Core\YesWikiHandler;
use YesWiki\Security\Controller\SecurityController;

class UpdateHandler__ extends YesWikiHandler
{
    public function run()
    {
        if ($this->getService(SecurityController::class)->isWikiHibernated()) {
            throw new \Exception(_t('WIKI_IN_HIBERNATION'));
        };
        if (!$this->wiki->UserIsAdmin()) {
            return null;
        }

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
            return null;
        }

        $output = $this->wiki->render('@benevolat/update-handler.twig', []);

        // set output
        $this->output = str_replace(
            '<!-- end handler /update -->',
            $output . '<!-- end handler /update -->',
            $this->output
        );
        return null;
    }
}
