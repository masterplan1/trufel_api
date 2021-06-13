<?php

namespace app\models;

use Yii;
use app\models\Filling;
/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property int|null $type
 * @property int|null $category_id
 * @property int|null $status
 */
class Product extends \yii\db\ActiveRecord
{
    
    const PRODUCT_STATUS_INACTIVE = 0;
    const PRODUCT_STATUS_ACTIVE = 1;
    
    public static function tableName()
    {
        return 'product';
    }

    public function behaviors() {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['type', 'category_id', 'status'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }
    
    public static function findDesc($id){
        $descriptions = [
            1 => '*тут ви можете обрати оформлення за вподобанням, 
або у розділі “створити замовлення”  запропонувати своє оформлення',
            2 => '*тут ви можете обрати оформлення за вподобанням.',
            3 => '*тут ви можете обрати оформлення за вподобанням.',
            4 => '*тут ви можете обрати оформлення за вподобанням.',
            5 => '*тут ви можете обрати оформлення за вподобанням.',
        ];
        return $descriptions[$id];
    }
    
    public static function findDecoration($id){
        $decoration = [
            1 => 'cake',
            2 => 'cupcake',
            3 => 'candybar', 
            4 => 'candybar', 
            5 => 'candybar', 
        ];
        return $decoration[$id];
    }
    public function fillingCreate($product){
        if ($product) {
            $fillings = 0;
            if ($product->type == 1) {
                $fillingCatIds = 0;
                switch ($product->category_id){
                    
                    case 1:
                    case 2:
                    case 3:
                    case 4:
                    case 5:
                        $fillingCatIds = 1;
                        break;
                    case 6:
                        $fillingCatIds = 2;
                        break;
                    case 7:
                        $fillingCatIds = 3;
                        break;      
                }  
//                echo $fillingCatId;
                $fillings = Filling::find()->where(['category_id' => $fillingCatIds])->limit(Yii::$app->params['fillingPerPageLimit'])->all();
                
            }
            if ($product->type == 2) {
                $fillingCatIds = 4;
                $fillings = Filling::find()->where(['category_id' => $fillingCatIds])->limit(Yii::$app->params['fillingPerPageLimit'])->all();
            }
            return [$fillingCatIds, $fillings];
        }  
    }
    
//    public static function AddPicture($productsByCategory){
//        if($productsByCategory){
//            
//            $productsWithImages = [];
//            $i = 0;
//            foreach ($productsByCategory as $item){
//                $img = $item->getImage();
//                
//                $productsWithImages[$i]['name'] = $item->name;
//                $productsWithImages[$i]['id'] = $item->id;
//                $productsWithImages[$i]['category_id'] = $item->category_id;
////                $productsWithImages[$i]['description'] = $item->description;
//                $productsWithImages[$i]['image'] = $img->getUrl();
//                $i++;
//            }
//            return [
//                'success' => true,
//                'items' => $productsWithImages,
//            ];
//        }else{
//            return [
//                'success' => false,
//                'errors' => 'error',
//            ];
//        }
//    }

}
