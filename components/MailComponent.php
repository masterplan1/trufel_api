<?php
namespace app\components;

use Yii;
use yii\base\Component;
/**
 * Description of MailComponent
 *
 * @author NickName
 */
class MailComponent extends Component{
    public function send($params = null){
        if($params){
            Yii::$app->mailer->compose('order', ['order' => $params])
                ->setFrom('masterplan1804@gmail.com')
                ->setTo(Yii::$app->params['adminEmail'])
                ->setSubject('Нове замовлення')
                ->send();
        }
    }
}
