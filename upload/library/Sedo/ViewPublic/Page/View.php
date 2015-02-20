<?php
class Sedo_UserUpgradeTemplate_ViewPublic_Page_View extends XFCP_Sedo_UserUpgradeTemplate_ViewPublic_Page_View
{
	public function renderHtml()
	{
		parent::renderHtml();
		$page = $this->_params['page'];

		if(!empty($page['sedo_template_name']))
		{			
			$formatterOptions = array(
				'view' => $this,
				//'smilies' => array()
			);
			$bbCodeParser = XenForo_BbCode_Parser::create(XenForo_BbCode_Formatter_Base::create('Base', $formatterOptions));

			$templateParams = array(
				'page' => $page,
				'bbCodeParser' => $bbCodeParser
			);

			$this->_params['templateHtml'] = $this->createTemplateObject($page['sedo_template_name'], $templateParams);
		}
	}
}