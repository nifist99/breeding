@extends('admin_template.content')
@section('content')

    <div class="row">
        <div class="col-sm-12">

            <h1 class="h3 mb-2 text-gray-800">Detail {{$title}}</h1>
                    <div class="mb-10">
                        <a href="{{url($view['index'])}}"><i class="fa fa-chevron-circle-left "></i>&nbsp;kembali ke menu data</a>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Detail {{$title}}</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-borderless">

                                    <tr>
                                        <td><b>Name</b></td>
                                        <td>:</td>
                                        <td>{{$row->name}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Privileges</b></td>
                                        <td>:</td>
                                        <td>{{$row->privileges}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Email</b></td>
                                        <td>:</td>
                                        <td>{{$row->email}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Hp / Whatsapp</b></td>
                                        <td>:</td>
                                        <td>{{$row->hp}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Status</b></td>
                                        <td>:</td>
                                        <td>{{$row->status}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Created At</b></td>
                                        <td>:</td>
                                        <td>{{$row->created_at}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Updated At</b></td>
                                        <td>:</td>
                                        <td>{{$row->updated_at}}</td>
                                    </tr>
                                
                                </table>

                            </div>
                        </div>
                    </div>

        </div>
    </div>

@endsection