@inject('request', 'Illuminate\Http\Request')
<?php $path=$request::capture()->path() ?>
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li @if(strcmp($path,"showadmin")==0) class="active" @endif>
            <a href="/showadmin">Show All Presences</a>
        </li>
        <li @if(strcmp($path,"viewuser")==0) class="active" @endif>
            <a href="/viewuser">View User</a>
        </li>
        <li @if(strcmp($path,"crudjadwal")==0) class="active" @endif>
            <a href="/crudjadwal">CRUD Course Schedule</a>
        </li>
        <li @if(strcmp($path,"rekapadmin")==0) class="active" @endif>
            <a href="/rekapadmin">Rekap Absen</a>
        </li>
        <li @if(strcmp($path,"viewroom")==0) class="active" @endif>
            <a href="/viewroom">Room Allocation</a>
        </li>
        <li @if(strcmp($path,"profiladmin")==0) class="active" @endif>
            <a href="/profiladmin"> Profile </a>
        </li>
    </ul>
</div>