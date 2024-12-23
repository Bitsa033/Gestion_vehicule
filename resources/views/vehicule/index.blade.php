@extends('layouts.app')
@section('content')
<section class="page-section" id="contact">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">

            <div class="col-lg-8 col-xl-6 text-center">
                <h2 class="mt-0">Données enregistrées !</h2>
                <hr class="divider" />
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
            <div class="col-lg-10">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Matricule</th>
                            <th>type</th>
                            <th>proprietaire</th>
                            <th>
                                <a href="{{url('create_vehicule')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Nouvel enregistrement</a>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($voitures as $item)
                        <tr>
                            <td>{{$item->matricule}}</td>
                            <td>{{$item->type}}</td>
                            <td>{{$item->proprietaire}}</td>
                            <td style="width: 45%;">
                                <a href="{{url('edit_vehicule',$item->id)}}" class="btn btn-warning"> <i class="fa fa-pen"></i> Modifier</a>
                                <a href="{{url('delete_vehicule',$item->id)}}" class="btn btn-danger"> <i class="fa fa-trash"></i> Supprimer</a>
                                <a class="btn btn-info"> <i class="fa fa-th"></i>  Ajusterle stock</a>
                            </td>

                        </tr>

                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>

    </div>
</section>
@endsection
