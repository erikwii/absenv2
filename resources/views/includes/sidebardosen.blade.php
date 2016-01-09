@inject('request', 'Illuminate\Http\Request')
<?php $path=$request::capture()->path() ?>
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li @if(strcmp($path,"createcourse/tambahMatkul")==0) class="active" @endif>
            <a href="/createcourse/tambahMatkul">Create Course</a>
        </li>
        <li @if(strcmp($path,"coursetopic/tambahtopik")==0) class="active" @endif>
            <a href="/coursetopic/tambahtopik">Course Topic</a>
        </li>
        <li @if(strcmp($path,"rekapdosen")==0) class="active" @endif>
            <a href="/rekapdosen">Rekap Absen</a>
        </li>
        <br>
        <li @if(strcmp($path,"profildosen")==0) class="active" @endif>
            <a href="/profildosen">Profile </a>
        </li>
    </ul>
</div>