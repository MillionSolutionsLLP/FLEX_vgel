<?php
namespace B\TM;

class Controller extends \App\Http\Controllers\Controller
{
	public function __construct(){
     

        //$this->middleware('groupname')->except(['method_name']);
    }
	public function index(){

Base::migrate([['id'=>2]]);


			$data=[

			

			];
		return view('TM.V.panel_data')->with('data',$data);
		
		
	}


	public function indexData(){




			$data=[

			

			];
		return view('TM.V.Object.MasterDetails')->with('data',$data);
		
		
	}





	public function addTender(){

		$id=0;
		$build=new \MS\Core\Helper\Builder (__NAMESPACE__);

		$build->title("Add Tender")->content($id)->action("addTender")->btn([
								'action'=>"\\B\\TM\\Controller@indexData",
								'color'=>"btn-info",
								'icon'=>"fa fa-fast-backward",
								'text'=>"Back"
							])->btn([
								//'action'=>"\\B\\MAS\\Controller@addCCPost",
								'color'=>"btn-success",
								'icon'=>"fa fa-floppy-o",
								'text'=>"Save"
							])->js(["TM.J.tender"])->extraFrom(1,['title'=>'Attachments','multiple'=>true,'multipleAdd'=>true]);


		return $build->view();



	}


		public function addTenderPost(R\AddTender $r){


			$status=200;
			$tableId=2;
			$rData=$r->all();
			$filePath=[];
			$FileNo=0;
			//dd();
			if(array_key_exists('Attachments',$rData)){
				
				
				foreach ($rData['Attachments'] as  $value) {
					
					$filePath[ $rData['UniqId'].$FileNo]=$value->storeAs($rData['UniqId'], $rData['UniqId'].$FileNo.'.'.$value->clientExtension(), 'TM');

					
					$FileNo++;
				}

			}
			
	
			if($FileNo > 0 ){$FileNo=true;}else{$FileNo=false;}

			if($rData['Status']){$rData['Status']=true;}else{$rData['Status']=false;}


			$arraReturn=[
'UniqId'=>$rData['UniqId'],

'TenderTitle'=>$rData['TenderTitle'],

'TenderContent'=>$rData['TenderContent'],

'TenderDate'=>$rData['TenderDate'],

'TenderDateExp'=>$rData['TenderDateExp'],

'TenderFileAttchments'=>$FileNo,

'TenderFileArray'=>collect($filePath)->toJson(),

'Status'=>$rData['Status'],

			];


			//dd($arraReturn);
			

			$model=new Model($tableId);
			$return=$model->MS_add($arraReturn,$tableId);








			$array=[
					'msg'=>"OK",
			 		'redirectData'=>action('\B\TM\Controller@indexData'),
			 		//'data'=>$input,
			 		'array'=>$return

				];

	
		 return response()->json($array, $status);



	}


		public function viewTender(){



		$tableId=2;

		$build=new \MS\Core\Helper\Builder (__NAMESPACE__);
		$build->title("View All Tenders");
	//	

		$model=new Model($tableId);

		//dd(new Model($tableId));
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

			'delete'=>[
				'method'=>'TM.deleteTender',
				'key'=>'UniqId',

			],

			'edit'=>[
				'method'=>'TM.editTender',
				'key'=>'UniqId',

			],


			'view'=>[
				'method'=>'TM.viewTender.id',
				'key'=>'UniqId',

			],

		];
		$build->listData($model)->listView($diplayArray)->btn([
								'action'=>"\\B\\TM\\Controller@addTender",
								'color'=>"btn-info",
								'icon'=>"fa fa-plus",
								'text'=>"Add Tender"
							])->addListAction($link);	

		return $build->view(true,'list');

	}


		public function viewTenderbyId($UniqId){


		$uniqId=\MS\Core\Helper\Comman::de4url($UniqId);
		//$uniqId=$enUniqId;
		$id=0;
		$m=New Model();

		if($m->where('UniqId',$uniqId)->first()!=null){$newsData=$m->where('UniqId',$uniqId)->first()->toArray();}
		else{$newsData=[];}
		$data=[

			'tender'=>$newsData
		];

//	    dd($data);

		return view('TM.V.Object.TenderDetailed')->with('data',$data);
		//dd($m->where('UniqId',$uniqId)->first()->toArray());


	}


		public function editTender($UniqId){

			$id=0;
			$model=new Model($id);
			$build=new \MS\Core\Helper\Builder (__NAMESPACE__);
			//dd($model->where('UniqId',\MS\Core\Helper\Comman::de4url($UniqId))->get()->first()->toArray());
			
			$nullCheck=$model->where('UniqId',\MS\Core\Helper\Comman::de4url($UniqId))->get()->first();
			//dd($nullCheck);
			if($nullCheck =! null ){
				$data=$model->where('UniqId',\MS\Core\Helper\Comman::de4url($UniqId))->get()->first();
			}else{
				$data=[];
			}
			
			
			//dd($data);

			$build->title("Edit Tender ")->content($id,$data)->action("editTenderPost");

			$build->btn([
									'action'=>"\\B\\TM\\Controller@viewTender",
									'color'=>"btn-info",
									'icon'=>"fa fa-fast-backward",
									'text'=>"Back"
								]);
			$build->btn([
									//'action'=>"\\B\\MAS\\Controller@editCompany",
									'color'=>"btn-success",
									'icon'=>"fa fa-floppy-o",
									'text'=>"Save"
								]);

			return $build->view();




	}


	public function editTenderPost(R\EditTender $r){



		$status=200;
			$rData=$r->all();

			//dd($rData);


			$model=new Model(2);
			$model->MS_update($rData,2);	

			



			//return ;
			$array=[
	 		'msg'=>"OK",
	 	//	'redirect'=>action('\B\Users\Controller@login_form_otp'),
	 		'redirectData'=>action('\B\TM\Controller@viewTender'),

	 		// 	'db Password'=>$psw,
	 		// 'in Password'=>$input['Password']
	 		];
	 		$json=collect($array)->toJson();
	 		return response()->json($array, $status);


	}



	public function deleteTender($UniqId){
			$UniqId=\MS\Core\Helper\Comman::de4url($UniqId);
			$status=200;
			$tableId=2;
			$rData=['UniqId'=>$UniqId];
			$model=new Model($tableId);
			$fileExist=(boolean)$model->where('UniqId',$UniqId)->first()['TenderFileAttchments'];
			$disk=\Storage::disk('TM');
			$model->MS_delete($rData,$tableId);	
			if($fileExist)$disk->deleteDirectory($UniqId);
			return  $this->viewTender();
	}


}