@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
    
                        <div class="container">
                            <div class="row">
                                @foreach($projects as $project)
                                <div class="col-md-4 task">
                                    <div class="project-item">
                                        <span class="project-title"><a href="{{ route('task') }}">{{ $project->title }}</a></span>
                                        <span class="data">{{ $project->time }}</span>
                                        <span class="status">{{ $project->status }}</span>
                                        <span>Задач: {{ $project->task->count() }}</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="row">
                                {{ $projects->render() }}
                            </div>
                        </div>
                    
            </div>
        </div>
    </div>
</div>
@endsection

