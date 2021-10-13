<div class="col-md-2">
    <div class="list-group metismenu" id="menu">
        <a class="list-group-item list-group-item-action">Admin Name: {{ $user['first_name'] }}</a>
    </div>
     <hr/>
     {{--Member List Item--}}
     {{--Member List Item--}}
     <div class="list-group">
       <a href="/admin/adminPanel" class="list-group-item list-group-item-action">
           Dashboard
       </a>
     </div>
     <hr/>
     <div class="list-group">
         <a href="/admin/member" class="list-group-item list-group-item-action">Members Details</a>
         <a href="/admin/package/create" class="list-group-item list-group-item-action">Package Details</a>
         <a href="/admin/payment" class="list-group-item list-group-item-action">Payments</a>
     </div>
     {{--Member List Item--}}
     <hr/>
     {{--Trainer List Item--}}
     <div class="list-group">
        <a href="/admin/trainer" class="list-group-item list-group-item-secondary">Trainer</a>
     </div>
     {{--Trainer List Item--}}
     <hr/>
     <div class="list-group">
         <a href="/logout" id="logout" class="list-group-item list-group-item-secondary">Logout</a>
     {{-- <a href="/trainer_details" class="list-group-item list-group-item-secondary">Trainer Details</a> --}}
     </div>
 </div>
