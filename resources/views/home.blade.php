@extends('layout.app')

@section('title','Dashboard')

@section('content')
    <div class="row">
        <div class="col-md-8">

        <p class="text-center">
        <h3> {{trans('etudiant.maintitre')}} </h3>
        </p>
        @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status')  }}
            </div>
        @endif
            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error')  }}
            </div>
        @endif
        </div>
    </div>
        <div style="padding-top: 20px">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
               {{trans('etudiant.newEtu')}}
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{trans('etudiant.newEtu')}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('etudiant._form')
                        </div>
                    </div>
                </div>
        </div>

    <div style="padding-top: 20px">
            @include('etudiant._table')
        </div>


        <script>
            setTimeout(()=> {
                $(".alert").alert('close');
            },1500)
        </script>

@endsection