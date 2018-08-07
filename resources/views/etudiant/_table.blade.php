<table class="table table-striped  table-borderless ">
    <thead>
        <th>{{trans('etudiant.prenom')}}</th>
        <th>{{trans('etudiant.nom')}}</th>
        <th>Actions</th>
    </thead>
    <tbdoy>
        @foreach($etudiants as $index=>$etudiant )
            <tr>
                <td>{{$etudiant->prenom}}</td>
                <td>{{$etudiant->nom}}</td>
                <td>
                    {{--data-toggle="modal" data-target="#edit"--}}
                    <button type="button" class="btn btn-link" onclick="edit('{{$etudiant->id}}')" >
                        {{trans('commun.modify')}}
                    </button>
                </td>
                <td>
                    <button type="button" class="btn btn-link" onclick="show('{{$etudiant->id}}')" >
                        {{trans('commun.detail')}}
                    </button>
                </td>
                <td>
                    {!! Form::open(['route' => ['deleteEtudiant',$etudiant->id], 'method' => 'delete', 'id' => 'deleteForm'.$etudiant->id ]) !!}

                    <button type="button" onclick="validerDel('{{trans('etudiant.confirm')}}',{{$etudiant->id}})" class="btn btn-link"> {{trans('commun.suppr')}} </button>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach

    </tbdoy>
</table>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('commun.modify')}} Etudiant</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="editIN" class="modal-body">
                @include('etudiant._form')
                <button type="button" class="btn btn-lg btn-block btn-danger" data-dismiss="modal" aria-label="Close">
                    {{trans('etudiant.retour')}}
                </button>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('commun.detail')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="showIN"  class="modal-body">
            </div>
        </div>
    </div>
</div>


<script>

    /**
     * Fonction utilisée pour confirmer l'operation de suppression
     */
    function validerDel(confirmText,id) {
        const idForm = '#deleteForm' + id ;
        if(confirm(confirmText)){
            $(idForm).submit();
        }
    }

    /**
     * Fonction utilisée pour modifier
     */
    function edit(id) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("editIN").innerHTML = this.responseText;
                $('#edit').modal('show')
            }
        };
        xmlhttp.open("GET", "/etudiant/edit/" + id, true);
        xmlhttp.send();
    }

    /**
     * Fonction utilisée pour afficher les details
     */
    function show(id) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("showIN").innerHTML = this.responseText;
                $('#show').modal('show')
            }

        };
        xmlhttp.open("GET", "/etudiant/show/" + id, true);
        xmlhttp.send();
    }

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script>
    var moment = require('moment');
    function update() {
        const age = moment().diff('{{ $etudiant->ddn}}', 'years');
        const el = document.getElementById('ddn');
        el.innerHTML = age + ' ans';
    }
    const det = document.getElementById('details');
    det.onload = update ;
</script>