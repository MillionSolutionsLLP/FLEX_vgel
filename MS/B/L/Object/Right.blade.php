            <ul class="nav navbar-nav pull-right">
 


   <li class="visible-md visible-lg" role="presentation"><div class="loading ">
   	
   	<img src="{{asset('/images/loading.gif')}}" style="margin-top: 5px;" width="40px" height="40px"> 
   </div> </li>

	 <?php 

	 $user=session('user')['userData'];

	 //	dd($user['name']);



	 ?>

  <li class="bg-info ms-border" role="presentation" data-toggle="modal" data-target="#profileModal" > <a href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i> {{$user['name']}} </a>



  </li>
  <li class="bg-danger ms-border" role="presentation"><a href="{{action('\B\Users\Controller@logout')}}" ms-live-link="{{action('\B\Users\Controller@logout')}}" ms-shortcut="q"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign out</a></li>
  
</ul>