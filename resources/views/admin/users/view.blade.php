@extends('admin_template.content')
@section('content')

            <div class="row">
                <div class="col-sm-12">

                    <h1 class="h3 mb-2 text-gray-800">{{$title}}</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data {{$title}}</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>test</td>
                                        </tr>
                                    
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
@endsection
                
                    