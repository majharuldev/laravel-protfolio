@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <div class="page-content">
        <div class="container-fluid">



            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Home Slide</h4>


                            <form method="post" action="{{ route('update.about') }}" enctype="multipart/form-data">

                                @csrf

                                <input type="hidden" name="id" class="form-control" value="{{ $aboutpage->id }}" />


                                <div class=" row mb-3">

                                    <label class="col-sm-2 col-form-label" for="progress-basicpill-firstname-input">
                                        Tittle</label>
                                    <div class="col-sm-10">

                                        <input type="text" class="form-control" name="title"
                                            id="progress-basicpill-firstname-input" value="{{ $aboutpage->title }}">
                                    </div>
                                </div><br>

                                <div class=" row mb-3">

                                    <label class="col-sm-2 col-form-label" for="progress-basicpill-firstname-input">Short
                                        Title</label>
                                    <div class="col-sm-10">

                                        <input type="text" class="form-control" name="short_title"
                                            id="progress-basicpill-firstname-input" value="{{ $aboutpage->short_title }}">
                                    </div>
                                </div> <br>


                                <div class=" row mb-3">

                                    <label class="col-sm-2 col-form-label" for="progress-basicpill-firstname-input">Short Description
                                        </label>
                                    <div class="col-sm-10">

                                        <textarea id="textarea"  name="short_des"  class="form-control" maxlength="225" rows="3">{{ $aboutpage->short_des }}</textarea>
                                    </div>
                                </div> <br>

                                <div class=" row ">

                                    <label class="col-sm-2 col-form-label" for="progress-basicpill-firstname-input">Long Description
                                        </label>
                                        <div class="col-10">
                                            <div class="card">
                                                <div class="card-body">

                                                    <form method="post">
                                                        <textarea id="elm1" name="area"></textarea>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                </div> <br>



                                <div class=" row mb-3">

                                    <label class="col-sm-2 col-form-label" for="progress-basicpill-firstname-input"> About
                                        Image</label>
                                    <div class="col-sm-10">

                                        <input type="file" class="form-control" name="about_image" id="image">
                                    </div>
                                </div>



                                <div class=" row mb-3">

                                    <label class="col-sm-2 col-form-label" for="progress-basicpill-firstname-input">
                                    </label>
                                    <div class="col-sm-10">

                                        <img class="rounded avatar-lg" id="showimage"
                                            src="{{ !empty($homeslide->aboutpage) ? url($homeslide->aboutpage) : url('upload/no_image.png') }}"
                                            alt="Card image cap">


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


<script src="{{asset('backend/assets/libs/tinymce/tinymce.min.js')}}"></script>

<!-- init js -->
<script src="{{asset('backend/assets/js/pages/form-editor.init.js')}}"></script>
@endsection
