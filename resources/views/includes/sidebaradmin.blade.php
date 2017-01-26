@inject('request', 'Illuminate\Http\Request')
<?php $path=$request::capture()->path() ?>
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li @if(strcmp($path,"showadmin")==0) class="active" @endif>
            <a href="/showadmin">Rekapitulasi Absen</a>
        </li>
        <li @if(strcmp($path,"viewuser")==0) class="active" @endif>
            <a href="/viewuser">Daftar User</a>
        </li>
        <li @if(strcmp($path,"crudjadwal")==0) class="active" @endif>
            <a href="/crudjadwal">Jadwal Kuliah</a>
        </li>
        <li @if(strcmp($path,"rekapadmin")==0) class="active" @endif>
            <a href="/rekapadmin">Rekap Absen</a>
        </li>
        <li @if(strcmp($path,"viewroom")==0) class="active" @endif>
            <a href="/viewroom">Alokasi Ruang</a>
        </li>
        <li @if(strcmp($path,"admin/view_semester")==0) class="active" @endif>
            <a href="/admin/view_semester"> Semester </a>
        </li>
        <li @if(strcmp($path,"profiladmin")==0) class="active" @endif>
            <a href="/profiladmin"> Profile </a>
        </li>
    </ul>
</div>