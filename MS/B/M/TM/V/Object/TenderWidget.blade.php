<?php



		$tableId=2;

		$build=new \MS\Core\Helper\Builder (__NAMESPACE__);
		//$build->title("View All News");
	//	

		$model=new \B\TM\Model($tableId);
		$model=$model->paginate(10);
	//	dd($model);

		$diplayArray=[
//'UniqId'=>'ID',

'TenderTitle'=>'Title',


//'NewsDate'=>'Date',

'TenderDateExp'=>'Exp. Date',

'TenderFileAttchments'=>'Files',


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
				'method'=>'TM.viewTender.id',
				'key'=>'UniqId',

			],

		];
		$build->listData($model)->listView($diplayArray)->
							btn([
								'action'=>"\\B\\TM\\Controller@addTender",
								'color'=>"btn-info",
								'icon'=>"fa fa-plus",
								'text'=>"Add Tender"
							])->
							addListAction($link);	


				echo $build->view(true,'list');

							?>

