<?php

namespace app\controllers;


use yii\web\Controller;
use app\models\Filling;
use Yii;
use yii\web\Response;
/**
 * Description of FillingController
 *
 * @author NickName
 */
class FillingController extends Controller{
    
    public function actionIndex(){
        $fillings = Filling::find()->where(['status' => Filling::FILLING_STATUS_ACTIVE])->orderBy(['price' => SORT_ASC])->limit(Yii::$app->params['fillingPerPageLimit'])->all();
        
        return $this->render('index', ['fillings' => $fillings]);
    }
    
    public function actionFilter(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        
        $categoryId = Yii::$app->request->post('categoryId');
        $limit = Yii::$app->request->post('limit') ?? Yii::$app->params['fillingPerPageLimit'];
        
        if(!stripos($categoryId, ', ')) {
            $categoryId = intval($categoryId);
            if ($categoryId !== 0) {
                $fillingsByCategory = Filling::find()->where(['category_id' => $categoryId, 'status' => Filling::FILLING_STATUS_ACTIVE])
                                ->orderBy(['price' => SORT_ASC])->limit($limit)->all();
            } else {
                $fillingsByCategory = Filling::find()
                                ->limit($limit)->where(['status' => Filling::FILLING_STATUS_ACTIVE])->all();
            }
        }else{
            $fillingsByCategory = Filling::find()->where(['in', 'category_id', explode(', ', $categoryId)])->andWhere(['status' => Filling::FILLING_STATUS_ACTIVE])
                                ->orderBy(['price' => SORT_ASC])->limit($limit)->all();
        }

        if($fillingsByCategory){
            
            $fillingsWithImages = [];
            $i = 0;
            foreach ($fillingsByCategory as $item){
                $img = $item->getImage();
                
                $fillingsWithImages[$i]['id'] = $item->id;
                $fillingsWithImages[$i]['name'] = $item->name;
                $fillingsWithImages[$i]['description'] = $item->description;
                $fillingsWithImages[$i]['min_weight'] = $item->min_weight;
                $fillingsWithImages[$i]['price'] = $item->price;
                $fillingsWithImages[$i]['category_id'] = $item->category_id; //asd
                $fillingsWithImages[$i]['image'] = $img->getUrl();
                $i++;
            }
            return [
                'success' => true,
                'items' => $fillingsWithImages,
            ];
        }else{
            return [
                'success' => false,
                'errors' => 'error',
            ];
        }
    }
}
