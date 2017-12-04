<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sovet".
 *
 * @property integer $id
 * @property string $city
 * @property string $phone
 * @property string $name
 */
class Sovet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sovet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city', 'phone', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city' => 'City',
            'phone' => 'Phone',
            'name' => 'Name',
        ];
    }
    public function getContact($count,$city){

    	$data=$this->find()->where(['city'=>$city])->limit($count)->asArray()->all();
    	return $data;
	}
	public function getCount($citys){

    	foreach($citys as $city){
			$data[]='<h4>'.$city.': '.$this->find()->where(['city'=>$city])->count().'</h4>';
		}

		return $data;
	}

	public function setContactAmo($data,$manager){

		$amo = new \AmoCRM\Client('domin', 'login', 'API');
		$fordata=[];
    	foreach($data as $valu){
			$contact = $amo->contact;
			$contact['name'] = $valu['name'];
			$contact['responsible_user_id'] = $manager;
			$contact['tags'] = ['Выгрузка с Excel'];
			$contact->addCustomField(491651, [
				[$valu['phone'], 'WORK'],
			]);
			$fordata[]=$contact;
		}
		$id[] = $amo->contact->apiAdd($fordata);
		return $id;

	}
	public function deletOld($data){

		foreach ($data as $value) {
			$customer = Sovet::findOne(['id'=>$value['id']]);
			$customer->delete();
		}

		return true;
	}

}
