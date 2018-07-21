<div class="panel panel-success" >
                      <?php 

                 //    dd($data);

                      ?>  
                        <div class="panel-heading"><i class="fa fa-newspaper-o" aria-hidden="true"></i> {{  $data['news']['NewsTitle'] }}
                     

                        </div>
                         <?php 

                         $date=Carbon::parse($data['news']['NewsDate']);

                          $exdate=Carbon::parse($data['news']['NewsDateExp']);


                         //dd($date->toFormattedDateString());

                          ?> 
                        <div class="panel-body" >

                        

                

                                      <p class=" text-justify p-5" style="text-indent: 1em;">
                            {{ (string)$data['news']['NewsContent'] }}</p>
         


 @if($data['news']['NewsFileAttchments'] )
                    <div class="col-md-12">
                            
                        <?php

                        $data['news']['NewsFileArray']=json_decode($data['news']['NewsFileArray'], true);
                           ?>

                        @foreach($data['news']['NewsFileArray'] as $key=>$value)
                    
                        <?php 


                             

                        $type=explode('/',Storage::disk('NM')->mimeType($value));

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
                          <div class="card p-3 col-12 col-md-3 col-lg-3 ms-file-download" ms-link="{{ Storage::disk('NM')->url($value) }}" >
                <div class="card-img pb-3 " style="background-color: #CFD8DC;    text-align: left;padding: 0.5rem 2.5rem 0 2.5rem;">

               
                    <span class="fa {{$icon}} fa-3x"></span>

                    

                    <i  class="fa fa-paperclip pull-right fa-2x   fa-rotate-180" aria-hidden="true"></i>
                   
                </div>
                <div class="card-box" style="background-color: #efefef;    text-align: left;padding: 0.1rem 2.5rem 0 2.5rem;">
                    <h4 class="card-title mbr-fonts-style display-4">{{$key}}.<span class="text-lowercase">{{end($type)}}</span></h4>
                    <p class="mbr-text mbr-fonts-style display-7">
                      Type: <span class="text-uppercase"> {{ end($type) }} </span><br>Size: {{ (integer) round(Storage::disk('NM')->size($value)/1024)  }} KB</p>
                </div>
            </div>
                        @endforeach


                    </div>
                    @endif




                   



                </div>

                <div class="panel-footer">
                  

                     <div class="btn-group btn-group-xs btn-group-justified" >
                              


                              <div class="btn btn-default ms-text-black ms-mod-btn" ms-live-link="{{ route('NM.viewNews') }}"><i class="fa fa-arrow-left"  ></i> Go Back to News List</div>

                              <div class="btn btn-info ms-text-black"><i class="fa fa-eye"></i><br> Live Preview</div>
                              <div class="btn btn-success ms-text-black ms-mod-btn" ms-live-link="{{ route('NM.editNews',['UniqId'=>\MS\Core\Helper\Comman::en4url($data['news']['UniqId'])]) }}"><i class="fa fa-pencil"  ></i><br>Edit</div>
                              <div class="btn btn-danger ms-text-black ms-mod-btn ms-btn-confirm" ms-live-link="{{ route('NM.deleteNews',['UniqId'=>\MS\Core\Helper\Comman::en4url($data['news']['UniqId'])]) }}"><i class="fa fa-trash"></i><br>Delete</div>

                            </div>

                </div>
                </div>


    
