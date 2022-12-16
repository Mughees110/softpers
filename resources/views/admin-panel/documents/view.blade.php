@extends('admin-panel.main')
@section('body')                
<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview wide-md mx-auto">
                    @if (\Session::has('message'))
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <!--<h5><i class="icon fas fa-check"></i> Alerta !</h5>-->
                          {!! \Session::get('message') !!}
                    </div>
                    @endif
                    @if (\Session::has('message2'))
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <!--<h5><i class="icon fas fa-check"></i> Alerta !</h5>-->
                          {!! \Session::get('message2') !!}
                    </div>
                    @endif
                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title">Users</h4>
                                <div class="nk-block-des">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card card-preview">
                            <div class="card-inner">
                                <table class="table" id="st">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Roll Number</th>
                                            <th>Class</th>
                                            <th>Department</th>
                                            <th>Title</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($document->users))
                                        @foreach($document->users as $user)
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->rollNumber}}</td>
                                                <td>{{$user->class}}</td>
                                                <td>{{$user->department}}</td>
                                                <td>{{$user->title}}</td>
                                            </tr>
                                        @endforeach
                                        @endif
                                        
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div><!-- .card-preview -->
                    </div> <!-- nk-block -->
                    
                </div><!-- .components-preview -->
            </div>
        </div>
    </div>
</div>

@endsection('body')