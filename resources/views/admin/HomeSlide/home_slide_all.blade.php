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


                            <form method="post" action="{{ route('update.slide') }}" enctype="multipart/form-data">

                                @csrf

                                <input type="hidden" name="id" class="form-control" value="{{ $homeslide->id }}" />


                                <div class=" row mb-3">

                                    <label class="col-sm-2 col-form-label" for="progress-basicpill-firstname-input">
                                        Tittle</label>
                                    <div class="col-sm-10">

                                        <input type="text" class="form-control" name="title"
                                            id="progress-basicpill-firstname-input" value="{{ $homeslide->title }}">
                                    </div>
                                </div><br>

                                <div class=" row mb-3">

                                    <label class="col-sm-2 col-form-label" for="progress-basicpill-firstname-input">Short
                                        Title</label>
                                    <div class="col-sm-10">

                                        <input type="text" class="form-control" name="short_title"
                                            id="progress-basicpill-firstname-input" value="{{ $homeslide->short_title }}">
                                    </div>
                                </div> <br>


                                <div class=" row mb-3">

                                    <label class="col-sm-2 col-form-label" for="progress-basicpill-firstname-input">Video
                                        Url</label>
                                    <div class="col-sm-10">

                                        <input type="text" class="form-control" name="video_url"
                                            id="progress-basicpill-firstname-input" value="{{ $homeslide->video_url }}">
                                    </div>
                                </div> <br>





                                <div class=" row mb-3">

                                    <label class="col-sm-2 col-form-label" for="progress-basicpill-firstname-input"> Slide
                                        Image</label>
                                    <div class="col-sm-10">

                                        <input type="file" class="form-control" name="home_slide" id="image">
                                    </div>
                                </div>



                                <div class=" row mb-3">

                                    <label class="col-sm-2 col-form-label" for="progress-basicpill-firstname-input">
                                    </label>
                                    <div class="col-sm-10">

                                        <img class="rounded avatar-lg" id="showimage"
                                            src="{{ !empty($homeslide->home_slide) ? url($homeslide->home_slide) : url('upload/no_image.png') }}"
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
@endsection
