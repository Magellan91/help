use moonland\phpexcel\Excel;

if(Yii::$app->request->get('export'))
{
  $field = Yii::$app->request->get('export');
  $tempData = $this->createDouble($field);
  $data = [];
  $count=0;
  foreach($tempData["data"] as $tempDatum)
  {
    $count++;
    $data[$count]['id'] = $tempDatum['id'];
    $data[$count]['name'] = $tempDatum['name'];
    $data[$count]['value'] = ArrayHelper::getValue($tempDatum['custom_fields'],$field.'.0.value');
  }
  $excel=new ArrayDataProvider(['allModels'=>$data]);
  Excel::export([
    'models'=>$excel->allModels,
    'columns'=>[
      'id',
      'name',
      'value'

    ],
    'headers'=>[
      'id'=>'№',
      'name'=>'Название',
      'value'=>'Значение',
    ]
  ]);
}


public function createDouble($fieldName){
    $contactsDb=KonsibAmoValues::find()->asArray()->all();
    $partArray=array_chunk($contactsDb,500);

    $data=[];
    $data['unique']=[];
    $data['data']=[];

    foreach($partArray as $contacts){

      foreach($contacts as &$contact)
      {
        $contact = json_decode($contact['data'],true);
        $flag=false;
        $contact['custom_fields']=ArrayHelper::map($contact['custom_fields'],'name','values');
        if($contact['custom_fields'][$fieldName]===null)
        {
          continue;
        }
        foreach($data['unique'] as $key=>$dataUn)
        {
          if($dataUn['custom_fields'][$fieldName]===$contact['custom_fields'][$fieldName])
          {
            $flag=$dataUn;
            break;
          }
        }
        if($flag===false)
        {
          $data['unique'][]=$contact;
        }
        else
        {
          $data['data'][$contact['id']]=$contact;
          $data['data'][$flag['id']]=$flag;
        }
      }
    }

    ArrayHelper::multisort($data['data'],"custom_fields.${fieldName}");

    return $data;

  }