@extends('layouts.client')

@section('content')
    <div>
        {{-- The best athlete wants his opponent at his best. --}}
        <div id="box-theme" class="row">
            <div id="Inscription" class="col-lg-6 ">

                <h2><a href="{{route('inscription')}}"><span><i class="fa fa-address-card " aria-hidden="true"></i></span>
                        Inscription</a></h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam quasi magni quaerat, illo non tenetur
                    blanditiis
                    praesentium labore, voluptas odio esse magnam dolores. Amet officia tenetur aut ad sunt consequuntur?
                </p>


            </div>
            <div id="Reinscription" class="col-lg-6 ">

                <h2><a href=""><span><i class="fa fa-address-card " aria-hidden="true"></i></span>
                        Reinscription</a></h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam quasi magni quaerat, illo non tenetur
                    blanditiis praesentium labore, voluptas odio esse magnam dolores. Amet officia tenetur aut ad sunt
                    consequuntur?
                </p>


            </div>
            <div id="Enrolement" class="col-lg-6">

                <h2><a href=""><span><i class="fa fa-address-card " aria-hidden="true"></i></span> Enrolement</a></h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam quasi magni quaerat, illo non tenetur
                    blanditiis praesentium labore, voluptas odio esse magnam dolores. Amet officia tenetur aut ad sunt
                    consequuntur?
                </p>



            </div>
            <div id="Resultat" class="col-lg-6 ">

                <h2><a href=""><span><i class="fa fa-address-card " aria-hidden="true"></i></span> Resultat</a></h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam quasi magni quaerat, illo non tenetur
                    blanditiis praesentium labore, voluptas odio esse magnam dolores. Amet officia tenetur aut ad sunt
                    consequuntur?
                </p>



            </div>
        </div>
    </div>

@endsection
