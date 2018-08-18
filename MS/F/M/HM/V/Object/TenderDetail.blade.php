<?php

//dd($data);



   $company=\B\MAS\Model::getCompany();


  //dd($data);
   if(count($data['tender']) < 1){echo response()->view('errors.404') ; exit();}

?>
@extends('F.L.Plate')
@section('title')
{{$company['NameOfBussiness']}}
@endsection


@section('content')

<section class="cid-qTkA127IK8 mbr-fullscreen mbr-parallax-background" >

    
<!-- 
    <div class="mbr-overlay" style="opacity: 0.7; background-color: rgb(255, 255, 255);"></div>
 -->
    <div class="container-fluid " style="min-height: 65vh;">
        <div class="row "  >

       <div class=" col-md-3 visible-lg" >
      <div class="panel panel-success">
             <div class="panel-heading"> <span class="mbri-bookmark"></span> News</div>
             @include("HM.V.Object.NewsBox")

         </div>

         

        </div>

            <div class="col-md-6" >

                <div class="panel panel-success" >
                        
                        <div class="panel-heading"><i class="fa fa-newspaper-o" aria-hidden="true"></i> {{  $data['tender']['TenderTitle'] }}</div>
                         <?php 

                         $date=Carbon::parse($data['tender']['TenderDate']);

                          $exdate=Carbon::parse($data['tender']['TenderDateExp']);


                         //dd($date->toFormattedDateString());

                          ?> 
                        <div class="panel-body" >

                                      <p class=" text-justify p-5" style="text-indent: 1em;">
                            {{ (string)$data['tender']['TenderContent'] }}</p>
         


                             <div class="col-md-12 pb-3 mb-3 mt-3">
                                <small class="pull-right" >
                             Published on:{{$date->toFormattedDateString()}}<br> 
                             Valid upto:{{$exdate->toFormattedDateString()}} 
                           
                               </small>

                           </div>
                    @if($data['tender']['TenderFileAttchments'] )
                    <div class="col-md-12">
                            
                        <?php

                        $data['tender']['TenderFileArray']=json_decode($data['tender']['TenderFileArray'], true);
                           ?>

                        @foreach($data['tender']['TenderFileArray'] as $key=>$value)
                    
                        <?php 


                             

                        $type=explode('/',Storage::disk('TM')->mimeType($value));

                         $typeOf=reset($type);


                         switch ($typeOf) {
                           case 'image':
                             $icon='fa-file-image-o';
                             break;
                           
                           default:
                             $icon='fa-file-text';
                             break;
                         }


                         switch (end($type)) {
                           case 'pdf':
                             $icon='fa-file-pdf-o';
                             break;
                        
                         }

                         ?>
                          <div class="card p-3 col-12 col-md-3 col-lg-3 ms-file-download" ms-link="{{ Storage::disk('TM')->url($value) }}" >
                <div class="card-img pb-3 " style="background-color: #CFD8DC;    text-align: left;padding: 0.5rem 2.5rem 0 2.5rem;">

               
                    <span class="fa {{$icon}} fa-3x"></span>

                    

                    <i  class="fa fa-paperclip pull-right fa-2x   fa-rotate-180" aria-hidden="true"></i>
                   
                </div>
                <div class="card-box" style="background-color: #efefef;    text-align: left;padding: 0.1rem 2.5rem 0 2.5rem;">
                    <h4 class="card-title mbr-fonts-style display-4">{{$key}}.<span class="text-lowercase">{{end($type)}}</span></h4>
                    <p class="mbr-text mbr-fonts-style display-7">
                      Type: <span class="text-uppercase"> {{ end($type) }} </span><br>Size: {{ (integer) round(Storage::disk('TM')->size($value)/1024)  }} KB</p>
                </div>
            </div>
                        @endforeach


                    </div>
                    @endif



                </div>
                </div>


            </div>

  <div class=" col-md-3 visible-lg" >
      <div class="panel panel-success">
             <div class="panel-heading"> <span class="mbri-bookmark"></span> Tenders</div>
             @include("HM.V.Object.TenderBox")

         </div>



        </div>






        </div>






    </div>



   
    
</section>

@endsection