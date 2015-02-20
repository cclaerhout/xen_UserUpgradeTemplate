<?php
class Sedo_UserUpgradeTemplate_Installer
{
	public static $tables = array('xf_help_page', 'xf_user_upgrade', 'xf_page');

	public static function install($addon)
	{
		$db = XenForo_Application::get('db');
		
		if(empty($addon))
		{
			//Force uninstall on fresh install
			self::uninstall();
			
			foreach(self::$tables as $table)
			{
				self::addColumnIfNotExist($db, $table, 'sedo_template_name', "VARBINARY(50) NOT NULL DEFAULT ''");
			}
		}
	}

	public static function uninstall()
	{
		$db = XenForo_Application::get('db');

		foreach(self::$tables as $table)
		{
			if ($db->fetchRow("SHOW COLUMNS FROM $table WHERE Field = ?", 'sedo_template_name'))
			{
				$db->query("ALTER TABLE $table DROP sedo_template_name");
			}
		}
	}
	
	public static function addColumnIfNotExist($db, $table, $field, $attr)
	{
		if ($db->fetchRow("SHOW COLUMNS FROM $table WHERE Field = ?", $field))
		{
			return;
		}
	 
		return $db->query("ALTER TABLE $table ADD $field $attr");
	}
	
	public static function changeColumnValueIfExist($db, $table, $field, $attr)
	{
		if (!$db->fetchRow("SHOW COLUMNS FROM $table WHERE Field = ?", $field))
		{
			return;
		}

		return $db->query("ALTER TABLE $table CHANGE $field $field $attr");
	}
}