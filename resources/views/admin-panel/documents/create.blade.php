@extends('admin-panel.main')
@section('body') 
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
                    <!-- .nk-block-head -->
                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h4 class="title nk-block-title">Upload Excel File</h4>
                                <div class="nk-block-des">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card card-preview">
                            <div class="card-inner">
                                <div class="preview-block">
                                    <form method="POST" action="{{url('documents-store')}}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="row gy-4">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="default-01">Upload File</label>
                                                    <div class="form-control-wrap">
                                                        <input type="file" class="form-control" name="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required="required">
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="submit" class="btn btn-danger" id="" value="Save">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </form>
                                    <!--<hr class="preview-hr">-->
                                </div>
                            </div>
                        </div><!-- .card-preview -->
                    </div><!-- .nk-block -->                
                </div><!-- .components-preview -->
            </div>
        </div>
    </div>
</div>

 <script>
    var selDiv = "";
        
    document.addEventListener("DOMContentLoaded", init, false);
    
    function init() {
        document.querySelector('#customFile').addEventListener('change', handleFileSelect, false);
        selDiv = document.querySelector("#selectedFiles");
    }
        
    function handleFileSelect(e) {
        
        if(!e.target.files || !window.FileReader) return;

        selDiv.innerHTML = "";
        
        var files = e.target.files;

        var filesArr = Array.prototype.slice.call(files);
        var i=0;
        filesArr.forEach(function(f) {

            var f = files[i];
            if(!f.type.match("image.*")) {
                return;
            }

            var reader = new FileReader();
            reader.onload = function (e) {
                var html = "<img src=\"" + e.target.result + "\">" + f.name + "<br clear=\"left\"/>";
                selDiv.innerHTML += html;               
            }
            reader.readAsDataURL(f); 
            i=i+1;
        });
        
    }
    </script>
    
@endsection 