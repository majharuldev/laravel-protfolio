@extends('admin.admin_master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<div class="page-content">
    <div class="container-fluid">



        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Change Password</h4>



                        @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger alert-dismissible fade show">{{ $error }}</p>
                        @endforeach
                          @endif



                          <form method="post" action="{{route('update.password')}}"   enctype="multipart/form-data">

                            @csrf


                        <div class=" row mb-3">

                                    <label class="col-sm-2 col-form-label" for="progress-basicpill-firstname-input"> Old Password</label>
                                    <div class="col-sm-10">

                                        <input type="password" class="form-control" name="oldpassword" id="progress-basicpill-firstname-input" value="">
                                    </div>
                                </div><br>

                                <div class=" row mb-3">
                                    <label class="col-sm-2 col-form-label" for="progress-basicpill-firstname-input">New password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="newpassword" id="progress-basicpill-firstname-input" >
                                    </div>
                                </div> <br>


                                <div class=" row mb-3">

                                    <label class="col-sm-2 col-form-label" for="progress-basicpill-firstname-input">Confirm password</label>
                                    <div class="col-sm-10">

                                        <input type="password" class="form-control" name="confirmpassword" id="progress-basicpill-firstname-input" >
                                    </div>
                                </div> <br>

                       <button class="btn btn-info" type="submit">Update</button>

                    </form>

                    </div>
                </div>
            </div>


        </div>

    </div>
</div>



<script>
    $(document).ready(function() {
        $('#image').on('change', function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showimage').attr('src', e.target.result);
            };
            reader.readAsDataURL(e.target.files[0]); // corrected method name and file reference
        });
    });
    </script>



@endsection
