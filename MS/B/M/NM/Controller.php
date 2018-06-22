<?php
namespace B\NM;

class Controller extends \App\Http\Controllers\Controller
{
	public function __construct(){
     

        //$this->middleware('groupname')->except(['method_name']);
    }
	public function index(){




			$data=[

			

			];
		return view('NM.V.panel_data')->with('data',$data);
		
		
	}


	public function indexData(){




			$data=[

			

			];
		return view('NM.V.Object.MasterDetails')->with('data',$data);
		
		
	}

	public function addNews(){

		$id=0;
		$build=new \MS\Core\Helper\Builder (__NAMESPACE__);

		$build->title("Add News")->content($id)->action("addNews")->btn([
								'action'=>"\\B\\NM\\Controller@indexData",
								'color'=>"btn-info",
								'icon'=>"fa fa-fast-backward",
								'text'=>"Back"
							])->btn([
								//'action'=>"\\B\\MAS\\Controller@addCCPost",
								'color'=>"btn-success",
								'icon'=>"fa fa-floppy-o",
								'text'=>"Save"
							])->js(["NM.J.news"])->extraFrom(1,['title'=>'Attachments','multiple'=>true,'multipleAdd'=>true]);


		return $build->view();



	}
	public function addNewsPost(R\AddNews $r){


			$status=200;
			$tableId=0;
			$rData=$r->all();
			
			//dd();
			if(array_key_exists('Attachments',$rData)){
				$FileNo=0;
				$filePath=[];
				foreach ($rData['Attachments'] as  $value) {
					$filePath[]=$value->storeAs($rData['UniqId'], $rData['UniqId'].$FileNo.'.jpg', 'NM');
					$FileNo++;
				}
		
			}

			dd(\Storage::disk('NM')->url($filePath[0]));
			dd($filePath);
			$model=new Model($tableId);
			//$model->MS_add($arraReturn,$tableId);








			$array=[
					'msg'=>"OK",
			 		'redirectData'=>action('\B\NM\Controller@indexData'),
			 		//'data'=>$input,
			 		//'array'=>$arraReturn

				];

	
		 return response()->json($array, $status);



	}
	public function editNews($UniqId){}
	public function editNewsPost(){}
	public function viewNews(){

		


	}
	public function viewNewsbyId($UniqId){}
	

}