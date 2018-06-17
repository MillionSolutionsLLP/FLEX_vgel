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
							]);


		return $build->view();



	}
	public function addNewsPost(){


		



	}
	public function editNews($UniqId){}
	public function editNewsPost(){}
	public function viewNews(){}
	public function viewNewsbyId($UniqId){}
	

}