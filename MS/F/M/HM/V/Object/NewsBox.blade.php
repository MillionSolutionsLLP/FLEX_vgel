
<?php 

$news=new \B\NM\Model();

$limit=5;

if(!isset($data))$data=[];
if(!array_key_exists('limit', $data))$data['limit']=$limit;
//dd($data);
if($news->MS_all() != null)$news=$news->MS_all()->forPage(1,$data['limit'])->toArray();
//dd($news);

?>





@if(array_key_exists('detailed', $data))
	<div class="panel-body">
	<table class="table table-striped table-hover" style="color:black;">

		<tr class="info">
				
				<th>News/Update/Documents Title</th>
				<th>Uploaded on</th>

		</tr>
		



		@foreach($news as $value)
		 <tr>
		 		<?php //dd(Carbon::parse($value['NewsDate'])->toFormattedDateString());  ?>
		 		<td class="text-capitalize">

		 			{{ $value['NewsTitle'] }}
		 		</td>

		 		<td>{{ Carbon::parse($value['NewsDate'])->toFormattedDateString() }}</td>

		 </tr>

		@endforeach


	</table>
	</div>
@else


<div class="list-group">


@foreach($news as $value)

  <button type="button" class="list-group-item" style="text-align: justify;"><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{$value['NewsTitle']}}</button>

@endforeach



<a href="{{ route('HM.News') }}">
  <button type="button"  class="list-group-item" style="text-align: right;"><i class="fa fa-angle-double-right" aria-hidden="true"></i>  View more..</button>
</a>


</div>



@endif

