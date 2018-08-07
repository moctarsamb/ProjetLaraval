
    <div id="details" class="card text-center" >
        <div class="card-header">
            Details
        </div>
        <div class="card-body">
            <h5 class="card-title">Etudiant {{$etudiant->id}}</h5>
            <p class="card-text"> {{ $etudiant->prenom . ' ' . $etudiant->nom }} </p>
            <p class="card-text"> {{ $etudiant->email}} </p>
            <p class="card-text"> {{ $etudiant->telephone}} </p>
            <p onclick="update()" class="card-text"> {{$etudiant->ddn}} </p>
            <p id="ddn" class="card-text">  </p>
            <p>
                <button data-dismiss="modal" aria-label="Close" class="btn btn-primary">{{trans('etudiant.retour')}}</button>

            </p>
        </div>
    </div>