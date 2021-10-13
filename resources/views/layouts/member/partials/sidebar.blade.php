<div class="col-md-3">
    {{--Member List Item--}}
    <div class="list-group">
        <a class="list-group-item list-group-item-action">First Name: {{ $member['first_name'] }}</a>
        <a class="list-group-item list-group-item-action">Last Name:{{ $member['last_name'] }}</a>
    </div>
    <hr/>
    {{--Member List Item--}}
    {{--Member List Item--}}
    <div class="list-group">
        <a href="/member/memberPanel" class="list-group-item list-group-item-action">Dashboard</a>
        @if(($member->package_counter=="1") && ($member->payment_counter=="1"))
            <a href="/member/payment" style="color: rgb(0, 168, 65)" class="list-group-item list-group-item-action disabled">You already have Payment</a>
        @else
            <a href="/member/payment" class="list-group-item list-group-item-action">Payments</a>
        @endif
        <a href="/member/package" class="list-group-item list-group-item-action">Package Details</a>
        <a href="/member/profile" class="list-group-item list-group-item-action">Profile</a>
    </div>
    {{--Member List Item--}}
    <hr/>
     <div class="list-group">
      <a href="/memberLogout" id="logout" class="list-group-item list-group-item-secondary">Logout</a>
      {{-- <a href="/trainer_details" class="list-group-item list-group-item-secondary">Trainer Details</a> --}}
    </div>
 </div>
