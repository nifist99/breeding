@extends('admin_template.content')
@section('content')

            <div class="row">
                <div class="col-sm-12">

                    <h1 class="h3 mb-2 text-gray-800">Menu&nbsp;{{$title}}</h1>
                    <div class="mb-10">
                        <a href="javascript::void(0)" data-toggle="modal" data-target="#createModal" class="btn btn-sm btn-success"><i class="fa fa-plus-circle"></i>&nbsp;Tambah Data</a>
                    </div>

                    <div class="mb-10">
                        @include('admin_template.error')
                    </div>
                    
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
                                            <th>Email</th>
                                            <th>Privileges</th>
                                            <th>Hp</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($row as $key)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$key->name}}</td>
                                            <td>{{$key->email}}</td>
                                            <td>{{$key->privileges}}</td>
                                            <td>{{$key->hp}}</td>
                                            <td>{{$key->status}}</td>
                                            <td>
                                                <a href="{{url('admin/users/show/'.$key->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                                <a href="javascript::void(0)" data-toggle="modal" data-target="#edit{{$key->id}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                                <button onclick="hapus({{$key->id}})" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                         <!-- edit Modal-->
                                            <div class="modal fade" id="edit{{$key->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">

                                                <form action="{{url($view['update'])}}" method="post">
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data {{$title}}</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" value="{{$key->id}}">
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Name</label>
                                                            <input type="text" class="form-control" id="name" name="name" placeholder="name" required="" value="{{$key->name}}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="email" class="form-label">email</label>
                                                            <input type="email" class="form-control" id="email" name="email" placeholder="email" required="" value="{{$key->email}}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="privileges" class="form-label">privileges</label>
                                                            <select class="form-select" name="id_privileges" aria-label="Default select example" required="">
                                                                <option selected value="{{$key->id_privileges}}">{{$key->privileges}}</option>
                                                                @foreach (Laravel::privilegesEditData($key->id_privileges) as $val)
                                                                    <option value="{{$val->id}}">{{$val->name}}</option>
                                                                @endforeach
                                                              </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="password" class="form-label">password</label>
                                                            <input type="password" class="form-control" id="password" name="password" placeholder="password">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="hp" class="form-label">hp / Whatsapp</label>
                                                            <input type="number" class="form-control" id="hp" name="hp" placeholder="hp" required="" value="{{$key->hp}}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="status" class="form-label">Status</label>
                                                            <select class="form-select" name="status" aria-label="Default select example" required="">
                                                                <option selected value="{{$key->status}}">{{$key->status}}</option>
                                                                <option value="active">active</option>
                                                                <option value="notactive">notactive</option>
                                                              </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                        <button class="btn btn-primary" type="submit">Edit</button>
                                                    </div>
                                                </div>
                                            </form>
                                            </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- create Modal-->
            <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">

                <form action="{{url($view['save'])}}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data {{$title}}</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="name" required="">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="email" required="">
                        </div>
                        <div class="mb-3">
                            <label for="privileges" class="form-label">privileges</label>
                            <select class="form-select" name="id_privileges" aria-label="Default select example" required="">
                                <option selected value="">Open this select privileges</option>
                                @foreach (Laravel::privilegesGetAllData() as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                              </select>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="password" required="">
                        </div>
                        <div class="mb-3">
                            <label for="hp" class="form-label">hp / Whatsapp</label>
                            <input type="number" class="form-control" id="hp" name="hp" placeholder="hp" required="">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" name="status" aria-label="Default select example" required="">
                                <option selected value="">Open this select status</option>
                                <option value="active">active</option>
                                <option value="notactive">notactive</option>
                              </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
            </form>
            </div>
            </div>

@push('js')
    <script>
        function hapus(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You want delete this file!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    location.href="{{url('admin/users/delete')}}/"+id; 
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
                })
            }
    </script>
@endpush

@endsection
                
                    