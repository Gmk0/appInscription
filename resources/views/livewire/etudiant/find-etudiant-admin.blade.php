@section('css')
  <link rel="stylesheet" href="{{asset('styleProfile.css')}}">  
@endsection
<div>
    @foreach ($etudiants as $etudiant)
        
   

    <div class="col-12 col-sm-12">
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true"> Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Facultes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Annee Academique</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Settings</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                        <div class="row">
                            <div class="col-md-3 border-right">
                                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="{{asset('/storage/students_images/'.$etudiant->etudiant->Photo)}}"><span class="font-weight-bold">Edogaru</span><span class="text-black-50">edogaru@mail.com.my</span><span> </span></div>
                            </div>
                            <div class="col-md-5 border-right">
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-right">Profile Settings</h4>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="first name" value="{{$etudiant->etudiant->Nom}}"></div>
                                        <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" value="" placeholder="surname"></div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" value=""></div>
                                        <div class="col-md-6"><label class="labels">Address Line 1</label><input type="text" class="form-control" placeholder="enter address line 1" value=""></div>
                                        <div class="col-md-6"><label class="labels">Address Line 2</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                                        <div class="col-md-6"><label class="labels">Postcode</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                                        <div class="col-md-6"><label class="labels">State</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                                        <div class="col-md-6"><label class="labels">Area</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                                        <div class="col-md-6"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value=""></div>
                                        <div class="col-md-6"><label class="labels">Education</label><input type="text" class="form-control" placeholder="education" value=""></div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value=""></div>
                                        <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="state"></div>
                                    </div>
                                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                                    <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                                    <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
                                </div>
                            </div>
                        </div>
    
                      </div>
                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                        
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                      
                           
                            <!-- /.card-body -->
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                        Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                    </div>
                </div>
            </div>
            <div class="card-footer">

                <a name="" id="" class="btn btn-primary" href="#" role="button">TELECHARGE</a>

            </div>
            <!-- /.card -->
        </div>
    </div>
    @endforeach

</div>
