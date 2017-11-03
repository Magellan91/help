<?php public
function beforeAction($action)
{

	if($action->id==='transfer')
	{
		$this->enableCsrfValidation=false;
	}

	return parent::beforeAction($action);
}