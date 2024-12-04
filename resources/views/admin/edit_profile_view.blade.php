@extends('admin.admin_master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<div class="page-content">
    <div class="container-fluid">



        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Edit Profile Page</h4>


                          <form method="post" action="{{route('store.profile')}}"   enctype="multipart/form-data">

                            @csrf


                        <div class=" row mb-3">

                            <label class="col-sm-2 col-form-label" for="progress-basicpill-firstname-input"> Name</label>
                            <div class="col-sm-10">

                                <input type="text" class="form-control" name="name" id="progress-basicpill-firstname-input" value="{{$editAdmin->name}}">
                            </div>
                        </div><br>

                        <div class=" row mb-3">

                            <label class="col-sm-2 col-form-label" for="progress-basicpill-firstname-input">User  Email</label>
                            <div class="col-sm-10">

                                <input type="text" class="form-control" name="email" id="progress-basicpill-firstname-input"  value="{{$editAdmin->email}}">
                            </div>
                        </div> <br>

                        <div class=" row mb-3">

                            <label class="col-sm-2 col-form-label" for="progress-basicpill-firstname-input"> Profile Image</label>
                            <div class="col-sm-10">

                                <input type="file" class="form-control" name="profile_image" id="image">
                            </div>
                        </div>



                        <div class=" row mb-3">

                            <label class="col-sm-2 col-form-label" for="progress-basicpill-firstname-input"> </label>
                            <div class="col-sm-10">

                                <img class="rounded avatar-lg"  id="showimage" src="{{ (!empty($editAdmin->profile_image))? url('upload/admin_images/'.$editAdmin->profile_image) : url('upload/no_image.png')}}" alt="Card image cap">


                            </div>
                        </div>


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
