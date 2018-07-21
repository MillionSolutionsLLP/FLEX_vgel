<?php
namespace F\HM;

class Controller extends \App\Http\Controllers\Controller
{
	public function __construct(){
     

        //$this->middleware('groupname')->except(['method_name']);
    }
	public function index(){




			$data=[

			

			];
		return view('HM.V.Pages.Home')->with('data',$data);
		
		
	}


	public function contactUs(){




			$data=[

			

			];
		return view('HM.V.Pages.ContactUs')->with('data',$data);
		
		
	}


	public function aboutUs(){



			$data=[

			

			];
		return view('HM.V.Pages.AboutUs')->with('data',$data);

	}


	
	public function news(){



			$data=[



			];
		return view('HM.V.Pages.News')->with('data',$data);

	}


	public function newsById($enUniqId){

		$uniqId=\MS\Core\Helper\Comman::de4url($enUniqId);
		//$uniqId=$enUniqId;
		$id=0;
		$m=New \B\NM\Model();

		if($m->where('UniqId',$uniqId)->first()!=null){$newsData=$m->where('UniqId',$uniqId)->first()->toArray();}
		else{$newsData=[];}
		$data=[

			'news'=>$newsData
		];
		return view('HM.V.Object.NewsDetail')->with('data',$data);
		//dd($m->where('UniqId',$uniqId)->first()->toArray());


	}

	public function tenders(){


			return view('errors.503');

	}

	public function gallery(){

		return view('errors.503');

	}

	public function careers(){

		return view('errors.503');
	}

}