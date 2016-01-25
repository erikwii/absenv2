@extends('layouts.mastermhs')
@section('content')
    <div class="container">
        <h1 class="page-header" style="background-color:#222222; color:#DEDEDE; text-align:center">
            {!! HTML::image('./img/logo.jpg', 'alt', array( 'width' => 150, 'height' => 150 )) !!} ONLINE PRESENCE
            SYSTEM
        </h1>
        <h2 style="text-align:center">
            <small>:: Department of Mathematics, Faculty of Mathematics and Natural Science State University of Jakarta
                ::
            </small>
        </h2>
        </tr>

        <h2 style="text-align:center">ENROLL MATA KULIAH</h2>

        <form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
            <div class="form-group form-group-sm" style="text-align: center;">
                <div>
                    Kode Seksi
                </div>
            </div>
            <div class="form-group form-group-sm">
                <div class="col-md-5 col-sm-5"></div>
                <div class="col-md-2 col-sm-2">
                    <input type="text" class="form-control" name="name" value="">
                </div>
                <div class="col-md-5 col-sm-5"></div>
            </div>
            <div class="form-group form-group-sm">
                <div class="col-md-5 col-sm-5"></div>
                <div class="col-md-1 col-sm-1">
                    <button type="submit" class="btn btn-primary" value="Submit">Tambah</button>
                </div>
                <div class="col-md-1 col-sm-1">
                    <button type="reset" class="btn btn-info" value="Reset">Reset</button>
                </div>
            </div>
            <br/>
        </form>

        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>
                            Kode Seksi
                        </th>
                        <th>
                            Nama Mata Kuliah
                        </th>
                        <th>
                            Hapus
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td>3901</td>
                        <td>Analisis dan Perancangan Sistem</td>
                        <td>Hapus</td>
                    </tr>
                    <tr>
                        <td>3902</td>
                        <td> Pengolahan Citra</td>
                        <td>Hapus</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
@stop