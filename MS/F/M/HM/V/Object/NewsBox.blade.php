
<?php 

$news=new \B\NM\Model();

$limit=5;

if(!isset($data))$data=[];
if(!array_key_exists('limit', $data))$data['limit']=$limit;



if($news->MS_all() != null)$news=$news->where('Status',1)->get()->sortByDesc(function ($product, $key) {
    
//	return $product['NewsDate'];
	//var_dump(Carbon::parse($product['NewsDate'])->dayOfYear);
    return Carbon::parse($product['NewsDate'])->dayOfYear;

}


	)->forPage(1,$data['limit'])->toArray();
//dd($news);

?>





@if(array_key_exists('detailed', $data))
	<div class="panel-body" >
	<table class="table table-striped table-hover" style="color:black;">

		<tr class="info">
				
				<th>News/Update/Documents Title</th>
				<th>Uploaded on</th>

		</tr>
		

		@if(count($news)  > 0  )




		@foreach($news as $value)
		 		


		 <tr class="ms-row-f" ms-link="{{  route('HM.News.View',['UniqId'=>\MS\Core\Helper\Comman::en4url($value['UniqId'])]) }}">
		 		
				 		<td class="text-capitalize">

		 			{{ $value['NewsTitle'] }}
		 		</td>

		 		<td>{{ Carbon::parse($value['NewsDate'])->toFormattedDateString() }}</td>

		 </tr>

		@endforeach

		@else


		 <tr class="ms-row-f" ms-link="{{  route('HM.News.View',['UniqId'=>\MS\Core\Helper\Comman::en4url($value['UniqId'])]) }}">
		 		
				 		<td class="text-capitalize">
No Data available
		 		</td>

		 </tr>


		@endif

	</table>
	</div>
@else


<div class="list-group">

@if(count($news)  > 0  )


@foreach($news as $value)

  <button type="button" class="list-group-item ms-row-f" ms-link="{{  route('HM.News.View',['UniqId'=>\MS\Core\Helper\Comman::en4url($value['UniqId'])]) }}" style="text-align: justify;"><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{$value['NewsTitle']}}</button>

@endforeach
@else


<button type="button" class="list-group-item"  style="text-align: justify;"><i class="fa fa-angle-double-right" aria-hidden="true"></i> No Data available</button>


@endif



<a href="{{ route('HM.News') }}">
  <button type="button"  class="list-group-item" style="text-align: right;"><i class="fa fa-angle-double-right" aria-hidden="true"></i>  View more..</button>
</a>


</div>



@endif

