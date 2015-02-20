<?php
class Sedo_UserUpgradeTemplate_ViewPublic_Account_Upgrades extends XFCP_Sedo_UserUpgradeTemplate_ViewPublic_Account_Upgrades
{
	public function parseDescription(array &$data)
	{
		if(!is_array($data))
		{
			return $data;
		}
		
		foreach($data as &$upgrade)
		{
			if(!empty($upgrade['sedo_template_name']))
			{			
				$formatterOptions = array(
					'view' => $this,
					//'smilies' => array()
				);
				$bbCodeParser = XenForo_BbCode_Parser::create(XenForo_BbCode_Formatter_Base::create('Base', $formatterOptions));

				$templateParams = array(
					'upgrade' => $upgrade,
					'bbCodeParser' => $bbCodeParser
				);

				$upgrade['description'] = $this->createTemplateObject($upgrade['sedo_template_name'], $templateParams);
			}
		}
	}

	public function renderHtml()
	{
		if(is_callable('parent::renderHtml'))
		{
			parent::renderHtml();
		}

		if(!empty($this->_params['available']))
		{
			$this->parseDescription($this->_params['available']);
		}
		
		if(!empty($this->_params['purchased']))
		{
			$this->parseDescription($this->_params['purchased']);		
		}
	}
}