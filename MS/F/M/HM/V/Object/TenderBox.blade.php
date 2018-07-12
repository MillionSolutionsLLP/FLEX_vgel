
<?php 

$news=new \B\NM\Model();


if($news->MS_all() != null)$news=$news->MS_all()->forPage(1,5)->toArray();
//dd($news->MS_all()->forPage(1,5)->toArray());

?>




<div class="list-group">




@foreach($news as $value)

  <button type="button" class="list-group-item" style="text-align: justify;" ><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{$value['NewsTitle']}}</button>

@endforeach

  <button type="button" class="list-group-item" style="text-align: right;" ><i class="fa fa-angle-double-right" aria-hidden="true"></i>  View more</button>

</div>