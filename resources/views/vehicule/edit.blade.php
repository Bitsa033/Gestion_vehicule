@extends('layouts.app')
@section('content')
<section class="page-section" id="contact">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 col-xl-6 text-center">
                <h2 class="mt-0"> Mise à jour du véhicule n°{{$voiture->id}} </h2>
                <hr class="divider" />
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
            <div class="col-lg-6">
                
                <form autocomplete="off" method="POST" action="{{route('update_vehicule',$voiture->id)}}">
                    @csrf
                    <!-- Name input-->
                    <div class="form-floating mb-3">
                        <input name="matricule" class="form-control" id="matricule" value="{{$voiture->matricule}}" type="text" placeholder="Matricule du véhicule..." required />
                        <label for="name">Matricule du véhicule...</label>
                        <div class="invalid-feedback" data-sb-feedback="name:required">Ce champ est obligatoire.</div>
                    </div>
                    <!-- Email address input-->
                    <div class="form-floating mb-3">
                        <input name="marque" class="form-control" value="{{$voiture->type}}" id="mark" type="text" placeholder="Marque du véhicule..." required/>
                        <label for="mark">Marque du véhicule...</label>
                        <div class="invalid-feedback" data-sb-feedback="mark:required">Ce champs est obligatoire.</div>
                        <div class="invalid-feedback" data-sb-feedback="mark:email">Ce champs ne doit pas etre valide</div>
                    </div>
                    <!-- Phone number input-->
                    <div class="form-floating mb-3">
                        <input name="phone" value="{{$voiture->proprietaire}}" class="form-control" id="phone" type="text" placeholder="Contact du propriétaire..." required />
                        <label for="phone">Contact du propriétaire...</label>
                        <div class="invalid-feedback" data-sb-feedback="phone:required">Ce champ est obligatoire.</div>
                    </div>
                    <!-- Message input-->
                    <div class="form-floating mb-3">
                        <textarea name="descr" class="form-control" id="message" type="text" placeholder="Description du véhicule..." style="height: 10rem"></textarea>
                        <label for="message">Description du véhicule</label>
                        <div class="invalid-feedback" data-sb-feedback="message:required">Ce champs est obligatoire.</div>
                    </div>
                    
                    <!-- Submit Button-->
                    <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton" type="submit">Mettre à jour les informations</button></div>
                </form>
            </div>
        </div>
        
    </div>
</section>
@endsection