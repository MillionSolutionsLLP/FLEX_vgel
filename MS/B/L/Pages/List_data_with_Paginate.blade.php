

<?php
$heading=[];
$headingKey=[];
//dd($data);

if(count($data['List-array'])>0){




  foreach ($data['List-array'] as $key => $value) {
    
    if(in_array($key, $data['List-display'])){

      $heading[]=ucfirst($value);
    $headingKey[]=$key;
    }else{

       $heading[]=ucfirst($value);

    }
    



  }


}else{

  $heading=$data['List-display'];
  $headingKey=$data['List-display'];

}

//dd($heading);

?>
<div class="panel panel-default ">
<div  class="panel-heading panel-info"><h5 class=""> <strong><i class="glyphicon glyphicon-chevron-right"></i> {{$data['List-title']}}



</strong>  
</h5></div>
  <div class="panel-body">
  <div class="col-lg-12" style="margin-bottom: 5px;">
    

     <div class="btn-group">
        
      @foreach ($data['List-btn'] as $btn)
      
      @if(array_key_exists('action',$btn))

      @if(array_key_exists('data',$btn))
      
      @if(array_key_exists('color',$btn))
      {{ Form::button("<i class='".$btn["icon"]." ' aria-hidden='true'></i> ".$btn["text"], ['class'=>'btn   ms-mod-btn '.$btn['color'].' ms-text-black' , 'ms-live-link'=>action($btn["action"],$btn['data']),] ) }}
      @else
      {{ Form::button("<i class='".$btn["icon"]."' aria-hidden='true'></i> ".$btn["text"], ['class'=>'btn btn-info   ms-mod-btn'.' ms-text-black' , 'ms-live-link'=>action($btn["action"],$btn['data']),] ) }}
      @endif


      @else
      
      @if(array_key_exists('color',$btn))
      {{ Form::button("<i class='".$btn["icon"]."' aria-hidden='true'></i> ".$btn["text"], ['class'=>'btn   ms-mod-btn '.$btn['color'].' ms-text-black' , 'ms-live-link'=>action($btn["action"]),] ) }}
      @else
      {{ Form::button("<i class='".$btn["icon"]."' aria-hidden='true'></i> ".$btn["text"], ['class'=>'btn btn-info   ms-mod-btn ms-text-black ' , 'ms-live-link'=>action($btn["action"]),] ) }}
      @endif


      @endif

      
      @else

      @if(array_key_exists('color',$btn))
      {{ Form::button("<i class='".$btn["icon"]."' aria-hidden='true'></i> ".$btn["text"], ['class'=>'btn  btn-frm-submit end-close '.$btn['color'].' ms-text-black'] ) }}
      @else
      {{ Form::button("<i class='".$btn["icon"]."' aria-hidden='true'></i> ".$btn["text"], ['class'=>'btn btn-success  btn-frm-submit ms-text-black'] ) }}
      @endif
      

      @endif


      @endforeach
      </div>


  </div>


      <table class="table table-responsive table-bordered table-hover">
  <tr>
  @foreach ($heading as $head)
    <th>{{ $head }}</th>
  @endforeach
  </tr>
<tbody>


  @foreach ($data['List-Paginate'] as $object)

  <tr>
   
    @foreach($headingKey as $key)

     <td>
      @if((string)$object->$key ==  '0')


      <i class="fa fa-times text-danger"></i>
      @elseif((string )$object->$key ==  '1')


      <i class="fa fa-check text-success"></i>


      @else


       {{ $object->$key }} 
      @endif

      </td>

        
    @endforeach
 

  </tr>
  @endforeach
   </tbody>

  
  </table>

  </div>

  <div class="panel-footer">
    


{{ $data['List-Paginate']->links('Pages.Paginate') }}

  </div>

</div>


<script type="text/javascript">


@include('L.jsFix')


</script>