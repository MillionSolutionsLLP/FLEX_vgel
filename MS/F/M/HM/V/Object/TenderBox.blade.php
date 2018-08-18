
<?php 

$news=new \B\TM\Model();

$limit=5;

if(!isset($data))$data=[];
if(!array_key_exists('limit', $data))$data['limit']=$limit;
//dd($data);
if($news->MS_all() != null)$news=$news->MS_all()->forPage(1,$data['limit'])->toArray();
//dd($news);

?>





@if(array_key_exists('detailed', $data))
	<div class="panel-body" >
	<table class="table table-striped table-hover" style="color:black;">

		<tr class="info">
				
				<th>Tender Title</th>
				<th>Uploaded on</th>

		</tr>
		

		@if(count($news)  > 0  )





		@foreach($news as $value)
		 <tr class="ms-row-f" ms-link="{{  route('HM.Tenders.View',['UniqId'=>\MS\Core\Helper\Comman::en4url($value['UniqId'])]) }}">
		 		<?php //dd(Carbon::parse($value['NewsDate'])->toFormattedDateString());  ?>
		 		<td class="text-capitalize">

		 			{{ $value['TenderTitle'] }}
		 		</td>

		 		<td>{{ Carbon::parse($value['TenderDate'])->toFormattedDateString() }}</td>

		 </tr>

		@endforeach



				@else


		 <tr class="ms-row-f" >
		 		
				 		<td class="text-capitalize">
No Data available
		 		</td>

		 </tr>


		@endif


	</table>
	</div>
@else


<div class="list-group" >






		@if(count($news)  > 0  )




@foreach($news as $value)

  <button type="button" class="list-group-item" style="text-align: justify;"><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{$value['TenderTitle']}}</button>

@endforeach


@else

<button type="button" class="list-group-item" style="text-align: justify;">
		 		<i class="fa fa-angle-double-right" aria-hidden="true"></i> No Data available
				 	</button>

		@endif


<a href="{{ route('HM.Tenders') }}">
  <button type="button"  class="list-group-item" style="text-align: right;"><i class="fa fa-angle-double-right" aria-hidden="true"></i>  View more..</button>
</a>


</div>



@endif

