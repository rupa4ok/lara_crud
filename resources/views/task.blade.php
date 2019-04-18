@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="pull-left">
                            {{ $project->title }}
                        </div>
                        <div class="pull-right">
                            Задача № {{ $project->id }} - выполняется
                        </div>
                    </div>
                    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                        <div class="container" id="app">
                            <div class="row">
                                <tasks></tasks>
                                <div class="col-md-6">
                                    Комментарии
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

