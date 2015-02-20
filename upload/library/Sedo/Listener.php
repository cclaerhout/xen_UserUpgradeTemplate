<?php
class Sedo_UserUpgradeTemplate_Listener
{
	public static function extendDwPage($class, array &$extend)
	{
		if($class == 'XenForo_DataWriter_Page')
		{
			$extend[] = 'Sedo_UserUpgradeTemplate_DataWriter_Page';
		}
	}

	public static function extendDwHelpPage($class, array &$extend)
	{
		if($class == 'XenForo_DataWriter_HelpPage')
		{
			$extend[] = 'Sedo_UserUpgradeTemplate_DataWriter_HelpPage';
		}
	}

	public static function extendDwUserUpgrade($class, array &$extend)
	{
		if($class == 'XenForo_DataWriter_UserUpgrade')
		{
			$extend[] = 'Sedo_UserUpgradeTemplate_DataWriter_UserUpgrade';
		}
	}

	public static function extendViewPublicPage($class, array &$extend)
	{
		if($class == 'XenForo_ViewPublic_Page_View')
		{
			$extend[] = 'Sedo_UserUpgradeTemplate_ViewPublic_Page_View';
		}	
	}

	public static function extendViewPublicHelpPage($class, array &$extend)
	{
		if($class == 'XenForo_ViewPublic_Help_Page')
		{
			$extend[] = 'Sedo_UserUpgradeTemplate_ViewPublic_Help_Page';
		}	
	}

	public static function extendViewPublicAccountUpgrades($class, array &$extend)
	{
		if($class == 'XenForo_ViewPublic_Account_Upgrades')
		{
			$extend[] = 'Sedo_UserUpgradeTemplate_ViewPublic_Account_Upgrades';
		}	
	}	
}
//Zend_Debug::dump($configs);