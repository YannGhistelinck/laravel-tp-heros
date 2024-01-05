@extends('layouts.app')

@section('title')
    Pouvoirs
@endsection

@section('content')

    <main class="container">
        <div class="row justify-content-center">
            <h1>Tous les pouvoirs</h1>

            <div class="col-md-8">
                <div class="card mb-3">
                    <button class="btn btn-warning" onclick="openModal(0)">
                        Créer un pouvoir

                    </button>
                    <div id="modal0" class="modal ">
                        <div class="modal-content d-flex align-items-center">
                            
                            <span class="close align-self-end" onclick="closeModal()">&times;</span>

                            <h2>Créer un pouvoir</h2>

                            <form action="{{ route('skills.store') }}" method="post">
                                @csrf
                                @method('post')

                                <div class="form-group mb-2">
                                    <label for="name">Pouvoir</label>
                                    <input required type="text" class="form-control" placeholder="Pouvoir" name="name" id="name">
                                </div>

                                <button type="submit" class="btn btn-success align-self-center">Valider</button>

                            </form>

                            
                        </div>
                    </div>


                </div>
            </div>


            <div class="d-flex flex-row flex-wrap">
                @foreach($skills as $skill)
                    <button class="m-4 p-2 border-top border-bottom nav-link action" onclick="openModal({{$skill->id}})">{{ $skill->name }}</button>


                    <div id="modal{{$skill->id}}" class="modal">
                        <div class="modal-content d-flex align-items-center">
                            
                            <span class="close align-self-end" onclick="closeModal()">&times;</span>

                            <h2>Modifier le pouvoir</h2>

                            <form action="{{ route('skills.update', $skill) }}" method="post">
                                @csrf
                                @method('PUT')

                                <div class="form-group mb-2">
                                    <label for="name">Modifier le pouvoir</label>
                                    <input required type="text" class="form-control" value="{{$skill->name}}" name="name" id="name">
                                </div>

                                <button type="submit" class="btn btn-success align-self-center">Valider</button>

                            </form>


                            <form action="{{ route('skills.destroy', $skill) }}" method="post">
                                @csrf
                                @method('delete')
                
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>

                            
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </main>

@endsection