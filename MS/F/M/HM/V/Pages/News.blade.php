<?php 

   $company=\B\MAS\Model::getCompany();

?>
@extends('F.L.Plate')
@section('title')
{{$company['NameOfBussiness']}}
@endsection


@section('content')

<section class="cid-qTkA127IK8 mbr-fullscreen mbr-parallax-background" id="header2-1" x>

    
<!-- 
    <div class="mbr-overlay" style="opacity: 0.7; background-color: rgb(255, 255, 255);"></div>
 -->
    <div class="container-fluid ">
        <div class="row ">

     

            <div class="mbr-white col-md-9">

                <div class="panel panel-success">
                        
                        <div class="panel-heading">News</div>
                          @include("HM.V.Object.NewsBox",['data'=>[
                          'detailed'=>true,
                          'limit'=>10,

                          ]])
                        


                </div>


            </div>

  <div class=" col-md-3 visible-lg" >
    <!-- <div class=" col-md-3 visible-lg" style="position: fixed;top:90px;right:0px;float: right; "> -->
<!--                             <div class=" col-md-2 navbar-fixed-top" > -->

         <div class="panel panel-success">
             <div class="panel-heading"> <span class="mbri-bookmark"></span> Tenders</div>
             @include("HM.V.Object.TenderBox")

         </div>

        </div>




        </div>






    </div>



   
    
</section>

@endsection