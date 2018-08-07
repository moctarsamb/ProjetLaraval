@if(isset($etudiant))
    {!! Form::model($etudiant,['route' => ['updateEtudiant', $etudiant->id], 'method' => 'put' ] ) !!}
    @else
{!! Form::open(['route' => 'addEtudiant' ]) !!}
    @endif
<div class="form-group">
    {!! Form::label("{{trans('etudiant.prenom')}}", trans('etudiant.prenom')) !!}
    {!! Form::text('prenom',null,['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label("{{trans('etudiant.nom')}}", trans('etudiant.nom')) !!}
    {!! Form::text('nom',null,['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label("{{trans('etudiant.mail')}}", trans('etudiant.mail')) !!}
    {!! Form::text('email',null,['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label("{{trans('etudiant.tel')}}", trans('etudiant.tel')) !!}
    {!! Form::text('telephone',null,['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label("{{trans('etudiant.ddn')}}", trans('etudiant.ddn')) !!}
    {!! Form::date('ddn',null,['class'=> 'form-control']) !!}
</div>


<button type="submit" class="btn btn-lg btn-block btn-primary m-t-n-xs"> {{trans('etudiant.enregister')}} </button>

{!! Form::close() !!}