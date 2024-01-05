@extends('layouts.app')

@section('content')
<div class="container">


    <form class="searchForm form-inline sticky-top" action="{{route('home')}}" method="get">
        @csrf
        @method('get')

        <input class="form-control " type="search" placeholder="Rechercher" aria-label="Search" name="search">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
    </form>


    <div class="row justify-content-center">
        

        <div class="col-md-8">


            <div class="card mb-3">
                
                <button class="btn btn-success" onclick="openModal(0)">
                    Publier un nouveau héro

                </button>
                <div id="modal0" class="modal ">
                    <div class="modal-content d-flex align-items-center">
                        
                        <span class="close align-self-end" onclick="closeModal()">&times;</span>
                        <h2>Publier un nouveau héro</h2>


                        <form action="{{ route('heroes.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('post')


                            <div class="form-group mb-2">
                                <label for="name">Nom</label>
                                <input required type="text" class="form-control" placeholder="Nom" name="name" id="name">
                            </div>
                            
                            <div class="form-group mb-2">
                                <label for="gender">Genre</label>
                                <select required type="text" class="form-control" name="gender_id" id="gender">
                                    @foreach($genders as $gender)
                                        <option value="{{$gender->id}}">{{ $gender->gender }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group mb-2">
                                <label for="race">Race</label>
                                <input required type="text" class="form-control" placeholder="Race" name="race" id="race">
                            </div>

                            <div class="form-group mb-2">
                                <label for="skill">Pouvoir</label>
                                <select required type="text" class="form-control" name="skill_id" id="skill">
                                    @foreach($skills as $skill)
                                        <option value="{{$skill->id}}">{{ $skill->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group mb-2">
                                <label for="description">Description</label>
                                <textarea required type="text" class="form-control" placeholder="Description" name="description" id="description"></textarea>
                            </div>


                            <div class="form-group mb-2">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image" id="image">
                            </div>
            
                            <button type="submit" class="btn btn-success align-self-center">Valider</button>
                        </form>


                    </div>
                </div>


            </div>
        </div>



        <div class="col-md-8">

            @foreach($heroes as $hero)
            
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between">
                    {{ $hero->name }}
                    @if ($user->id == $hero->user_id or $user->role_id == 2)
                        <div class="d-flex">
                            

                            <button onclick="openModal({{$hero->id}})" class="btn btn-primary">Modifier</button>

                            <div id="modal{{$hero->id}}" class="modal ">
                                <div class="modal-content d-flex align-items-center">
                                    <span class="close align-self-end" onclick="closeModal()">&times;</span>

                                    <form action="{{ route('heroes.update', $hero) }}" method="post" enctype="multipart/form-data" class="modalForm">
                                        @csrf
                                        @method('PUT')


                                        <div class="form-group">
                                            <label for="name">Nom</label>
                                            <input required type="text" class="form-control" placeholder="modifier" name="name" value="{{ $hero->name }}" id="name">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="gender">Genre</label>
                                            <select required type="text" class="form-control" placeholder="modifier" name="gender_id" id="gender">
                                                @foreach($genders as $gender)
                                                    @if ($gender->id == $hero->gender_id)
                                                        <option value="{{$gender->id}}" selected="true">{{ $gender->gender }}</option>
                                                    @else
                                                        <option value="{{$gender->id}}">{{ $gender->gender }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="race">Race</label>
                                            <input required type="text" class="form-control" placeholder="modifier" name="race" value="{{ $hero->race }}" id="race">
                                        </div>

                                        <div class="form-group">
                                            <label for="skill">Pouvoir</label>
                                            <select required type="text" class="form-control" placeholder="modifier" name="skill_id" id="skill">
                                                @foreach($skills as $skill)
                                                    @if ($skill->id == $hero->skill_id)
                                                        <option value="{{$skill->id}}" selected="true">{{ $skill->name }}</option>
                                                    @else
                                                        <option value="{{$skill->id}}">{{ $skill->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea required type="text" class="form-control" placeholder="modifier" name="description" id="description">{{ $hero->description }}</textarea>
                                        </div>
                                        
                                        

                                        <div class="form-group d-flex flex-column">
                                            <label for="image">Image actuelle</label>
                                            @if($hero->image)
                                                <img src="/storage/uploads/{{$hero->image}}" alt="Image actuelle" class="align-self-center w-100 shadow-1-strong rounded mb-4">
                                            @else
                                                <p>Aucune image actuelle</p>
                                            @endif
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="image">Image</label>
                                            <input type="file" class="form-control" name="image" id="image">
                                        </div>
                                        

                        
                                        <button type="submit" class="btn btn-success align-self-center">Valider</button>
                                    </form>
                                    
                                    <form action="{{ route('heroes.destroy', $hero) }}" method="post">
                                        @csrf
                                        @method('delete')
                        
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>

                                </div>
                            </div>
              

                        </div>
                    @endif
                </div>

                <div class="card-body d-flex flex-column">
                    @if($hero->image)
                        <img src="/storage/uploads/{{$hero->image}}" class="heroImage align-self-center mb-3 shadow-1-strong rounded mb-4">
                    @endif
                    <div class="d-flex justify-content-around">
                        
                        <p><b>GENRE : </b>{{ $hero->gender->gender }}</p>
                        <p><b>RACE : </b>{{ $hero->race }}</p>
                        <p><b>POUVOIR : </b>{{ $hero->skill->name }}</p>
                        
                    </div>
                    
                    {{ $hero->description }}
                </div>
            </div>
            @endforeach 

        </div>
        
       


    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        // Masquer l'image actuelle si aucun fichier n'est choisi
        $('input[name="image"]').change(function() {
            if ($(this).val() === "") {
                $('img').hide();
            }
        });

        // Afficher la nouvelle image sélectionnée
        $('input[name="image"]').change(function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('img').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
</script>

@endsection
