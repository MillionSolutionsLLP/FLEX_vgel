<?php 

   $company=\B\MAS\Model::getCompany();

?>
@extends('F.L.Plate')
@section('title')
{{$company['NameOfBussiness']}}
@endsection


@section('content')

<section class="cid-qTkA127IK8 mbr-fullscreen mbr-parallax-background" id="header2-1" style="padding-top: 77px;">

    
<!-- 
    <div class="mbr-overlay" style="opacity: 0.7; background-color: rgb(255, 255, 255);"></div>
 -->
    <div class="container-fluid align-center">
        <div class="row ">

                 <!-- <div class=" col-md-3 visible-lg" style="position: fixed;left:0;top:90px;right:0; "> -->
  <!--                   <div class=" col-md-3 visible-lg mt-5"   >


         <div class="panel panel-success">
             <div class="panel-heading"> <span class="mbri-help"></span> News</div>
 
                 

                @include("HM.V.Object.NewsBox")



         </div>

        </div> -->

            <div class="mbr-white col-md-12">
              <!--   <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1 "><small>Sorry ,Currently we can not undertand   </small><br>what actully you are trying.</h1> -->
               <div class="col-md-12">
                   
               <img src="{{asset('/images/uc2.png')}}"  class="img-404">     
               </div>
               
               <h4 class="text-center " style="color:black;">This page is under Construction or under maintenance .<br> Please , Try after some time<br><br>or</h4>
               

                <div class="mbr-section-btn " >
                <center>
                    <div class="btn-group btn-group-justified">

                	<a class="btn btn-md btn-primary display-4" href="{{action('\F\HM\Controller@index')}}"><i class="fa fa-chevron-left" aria-hidden="true"></i> Go Back to Home</a>
                    </div>
                </center>
                </div>
            </div>
<!-- 
  <div class=" col-md-3 visible-lg mt-5" >


         <div class="panel panel-success">
             <div class="panel-heading"> <span class="mbri-bookmark"></span> Tenders</div>
             @include("HM.V.Object.TenderBox")

         </div>

        </div> -->




        </div>






    </div>



   
    
</section>

@endsection