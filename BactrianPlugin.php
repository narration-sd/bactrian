<?php
namespace Craft;

// plugin wrapper for Bactrian Twig Extension

class BactrianPlugin extends BasePlugin
{
    function getName()
    {
        return Craft::t('Bactrian');
    }

    function getVersion()
    {
        return '0.1';
    }

    function getDeveloper()
    {
        return 'Narration SD';
    }

    function getDeveloperUrl()
    {
        return 'http://about.me/narration_sd';
    }

    public function hookAddTwigExtension()
    {
        Craft::import('plugins.bactrian.twigextensions.BactrianTwigExtension');
        return new BactrianTwigExtension();
    }
}