
    <div class="row">
        <div class="col-md-8">

            @if(session('status'))
            <div class="alert alert-primary" role="alert">
                {{ session('status')  }}
            </div>
                @endif
        </div>
    </div>
    <div style="padding-top: 20px">
        @include('etudiant._form')

    </div>
    <button data-dismiss="modal" aria-label="Close" class="btn btn-lg btn-block btn-danger">{{trans('etudiant.retour')}}</button>
