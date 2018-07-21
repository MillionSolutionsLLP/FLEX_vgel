<?php



		$tableId=2;

		$build=new \MS\Core\Helper\Builder (__NAMESPACE__);
		//$build->title("View All News");
	//	

		$model=new \B\NM\Model($tableId);
		$model=$model->paginate(10);
	//	dd($model);

		$diplayArray=[
//'UniqId'=>'ID',

'NewsTitle'=>'Title',


//'NewsDate'=>'Date',

'NewsDateExp'=>'Exp. Date',

'NewsFileAttchments'=>'Files',


'Status'=>'Live',

		];

		$link=[

			// 'delete'=>[
			// 	'method'=>'NM.deleteNews',
			// 	'key'=>'UniqId',

			// ],

			// 'edit'=>[
			// 	'method'=>'NM.editNews',
			// 	'key'=>'UniqId',

			// ],


			'view'=>[
				'method'=>'NM.viewNews.id',
				'key'=>'UniqId',

			],

		];
		$build->listData($model)->listView($diplayArray)->
							btn([
								'action'=>"\\B\\NM\\Controller@addNews",
								'color'=>"btn-info",
								'icon'=>"fa fa-plus",
								'text'=>"Add News"
							])->
							addListAction($link);	


				echo $build->view(true,'list');

							?>

