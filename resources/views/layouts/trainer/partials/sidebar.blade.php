<div class="col-md-3">
        <div class="list-group">
            <a class="list-group-item list-group-item-action">Trainer Name: {{ $trainer['trainer_name'] }}</a>
        </div>
        <hr/>
        <div class="list-group">
            <a href="/trainer/trainerProfile" class="list-group-item list-group-item-action">Profile</a>
            <a href="/trainer/trainerPanel" class="list-group-item list-group-item-action active">Dashboard</a>
        </div>
        <hr/>
        <div class="list-group">
            <a href="/trainerLogout" id="logout" class="list-group-item list-group-item-secondary">Logout</a>
        </div>
 </div>
