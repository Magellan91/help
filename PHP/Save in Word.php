	$div=$this->render('setact.php',[
      'model'=>$invoicingModel,
      'data'=>$tempData,
    ]);
	header("Pragma: no-cache");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false);
    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment; filename=\"act.doc");
    header("Content-Transfer-Encoding: binary");
    ob_clean();
    flush();
    echo $div;
    Yii::$app->end();