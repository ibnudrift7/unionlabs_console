<?php

class BlogController extends Controller
{

	public function actionIndex()
	{
		$this->layout='//layouts/column2';

		$typeName = Yii::app()->request->getParam('type');
		$categoryName = Yii::app()->request->getParam('category');
		$query = Yii::app()->request->getParam('q');

		// get TypeArtikel
		$cri1 = new CDbCriteria;
		$cri1->addCondition('LOWER(name) = :name');
		$cri1->params[':name'] = strtolower($typeName);
		$typeArtikel = TypeArtikel::model()->find($cri1);

		$criteria = new CDbCriteria;
		// $criteria->with = array('description');
		$criteria->addCondition('deleted_at IS NULL');
		// $criteria->addCondition('description.language_id = :language_id');
		// $criteria->params[':language_id'] = $this->languageID;
		$criteria->addCondition('type_artikel_id = :type_artikel_id');
		$criteria->params[':type_artikel_id'] = $typeArtikel->id;

		if($query){
			$criteria->addCondition('LOWER(title) LIKE :query OR LOWER(content) LIKE :query');
			$criteria->params[':query'] = '%' . strtolower($query) . '%';
		}
		
		if($categoryName){
			$crtierArt = new CDbCriteria;
			$crtierArt->addCondition('LOWER(name) = :name');
			$crtierArt->params[':name'] = strtolower($categoryName);
			$categoryIds = ArticlesCategory::model()->find($crtierArt);
			$criteria->addCondition('articles_category_id = :articles_category_id');
			$criteria->params[':articles_category_id'] = $categoryIds->id;
			// $arrId = [];
			// if($categoryIds){
			// 	foreach ($categoryIds as $categoryId) {
			// 		$arrId[] = $categoryId->id;
			// 	}
			// 	$criteria->addInCondition('t.articles_category_id', $arrId);
			// }
		}
		$criteria->order = 't.created_at DESC';

		$this->pageTitle = strtoupper($typeName) .' - Blog - '.$this->pageTitle;
		$this->metaKey = strtoupper($typeName) .', Blog, '.$this->metaKey;
		$this->metaDesc = strtoupper($typeName) .', Blog, '.$this->metaDesc;
		
		$dataBlog = new CActiveDataProvider('ArtikelList', array(
			'criteria'=>$criteria,
		    'pagination'=>array(
		        'pageSize'=>8,
		    ),
		));

		$this->render('index', array(
			'dataBlog'=>$dataBlog,
		));
	}

	public function actionDetail($id)
	{
		$this->layout='//layouts/column2';

		$criteria = new CDbCriteria;
		// $criteria->with = array('description');
		$criteria->addCondition('deleted_at IS NULL');
		// $criteria->addCondition('description.language_id = :language_id');
		// $criteria->params[':language_id'] = $this->languageID;
		$criteria->addCondition('t.id = :id');
		$criteria->params[':id'] = $id;
		$criteria->order = 't.created_at DESC';
		$dataBlog = ArtikelList::model()->find($criteria);
		if($dataBlog===null)
			throw new CHttpException(404,'The requested page does not exist.');

		// $criteria = new CDbCriteria;
		// $criteria->order = 'RAND()';
		// $criteria->addCondition('id != :id');
		// $criteria->params[':id'] = $dataBlog->id;
		// $dataBlogs = new CActiveDataProvider('Blog', array(
		// 	'criteria'=>$criteria,
		//     'pagination'=>array(
		//         'pageSize'=>4,
		//     ),
		// ));

		$typeArticle = $dataBlog->typeArtikel->name;

		$this->pageTitle = $dataBlog->title . ' - '.$typeArticle.' - Blog - '.$this->pageTitle;
		$this->metaKey = $dataBlog->title.', '.$typeArticle.', Blog, '.$this->metaKey;
		$this->metaDesc = $dataBlog->title.', '.$typeArticle.', Blog, '.$this->metaDesc;

		$this->render('detail', array(
			'dataBlog' => $dataBlog,
			// 'dataBlogs' => $dataBlogs,
		));
	}

}