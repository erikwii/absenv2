@inject('request', 'Illuminate\Http\Request')
<?php $path=$request::capture()->path() ?>

<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li @if(strcmp($path,"lihatabsen")==0) class="active" @endif>
            <a href="/lihatabsen">Lihat Absen</a>
        </li>
        <br>
        <li @if(strcmp($path,"inputabsen")==0) class="active" @endif>
            <a href="/inputabsen">Input Absen</a>
        </li>
        <li @if(strcmp($path,"student/viewcourse")==0) class="active" @endif>
            <a href="/student/viewcourse">View Registered Course</a>
        </li>
        <li @if(strcmp($path,"enrollmhs")==0) class="active" @endif>
            <a href="/enrollmhs">Enroll Course</a>
        </li>
        <li @if(strcmp($path,"profil")==0) class="active" @endif>
            <a href="/profil">Profile</a>
        </li>
    </ul>
</div>