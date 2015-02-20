<?php

class Sedo_UserUpgradeTemplate_DataWriter_UserUpgrade extends XFCP_Sedo_UserUpgradeTemplate_DataWriter_UserUpgrade
{
	protected function _getFields()
	{
		$fields = parent::_getFields();
		if(isset($fields['xf_user_upgrade']))
		{
			$fields['xf_user_upgrade']['sedo_template_name'] = array('type' => self::TYPE_BINARY, 'default' => '', 'maxLength' => 50);
		}
		return $fields;
	}

	protected function _preSave()
	{
	        $_input = new XenForo_Input($_REQUEST);
		$sedo_template_name = $_input->filterSingle('sedo_template_name', XenForo_Input::STRING);
		
		if($sedo_template_name)
		{
			$templateNameCheck = $this->_getTemplateModel()->getTemplateIdInStylesByTitle($sedo_template_name);

			if(!$templateNameCheck)
			{
				$this->error(new XenForo_Phrase('requested_template_not_found', array('templateName' => $sedo_template_name)), 'template_name');
			}
		}
		
		$this->set('sedo_template_name', $sedo_template_name);

		return parent::_preSave();
	}

	protected function _getTemplateModel()
	{
		return $this->getModelFromCache('XenForo_Model_Template');
	}		
}
//Zend_Debug::dump($class);