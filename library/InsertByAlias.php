<?php

use Contao\ModuleModel;
use Contao\StringUtil;

class InsertByAlias extends Frontend
{
	public function replaceTags($strTag) {
		// Parameter abtrennen
		$arrSplit = explode('::', $strTag);

		if ($arrSplit[0] != 'insert_module_alias') {
			//nicht unser Insert-Tag
			return false;
		}
		if (strlen($arrSplit[0])<2) {
			//module alias not provided
			return '';
		}

		//find a corresponding module
		$module = ModuleModel::findByAlias($arrSplit[1]);

		if (!empty($module)) {
			//careful, there can be multiple because its an collection
			return $this->getFrontendModule($module[0], false);
		}
		return 'Module not found: '.$arrSplit[1];
	}
}
