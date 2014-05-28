<?php
/*
* One plugin, two filters, one of which has to do with camels. Named for two-hump camel.
*/

namespace Craft;

class BactrianTwigExtension extends \Twig_Extension
{

    public function getName()
    {
        return Craft::t('Bactrian');
    }

    public function getFilters()
    {
        return array(
            'camelspace' => new \Twig_Filter_Method($this, 'camelspaceFilter'),
            'spacedashes' => new \Twig_Filter_Method($this, 'spacedashesFilter'),
        );
    }

    // converts a name with spaces to a camelCase name without spaces
	public function camelspaceFilter($str)
    {
        $charset = craft()->templates->getTwig()->getCharset();
		
		$words = explode(" ", $str); // these are spaces we are about to destroy
		
		// use old-fashioned index counter, as we want to skip treating the 0th word
		$cnt = count($words);
		for($i = 1; $i < $cnt; $i++) 
		{
			$words[$i] = ucfirst($words[$i]); // capitals are camels
		}
		
		// and let's be sure about that first word
		$words[0] = lcfirst($words[0]);

        $str = implode("", $words); // no separator, we hope...
		
        return new \Twig_Markup($str, $charset);
    }

    // converts both underscores and hyphen dashes to spaces
	public function spacedashesFilter($str)
    {
        $charset = craft()->templates->getTwig()->getCharset();
		
		$arr = array("-" => " ", "_" => " ");
		$str = strtr($str,$arr); // useful things that have been invented since Unix

        return new \Twig_Markup($str, $charset);
    }
}