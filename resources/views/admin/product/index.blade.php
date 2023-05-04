@extends('layouts.dashboard.admin.dashboard')
@section('content')
    <h3 class="mb-2 mt-0 text-3xl font-medium leading-tight text-primary">
        Gestion des produits
    </h3>
    <a href="">add</a>
    {{-- {{dd($dd)}} --}}
    @foreach ($dd as $d)
        <h2>{{$d->name}}</h2>
    @endforeach
    

    
</div>

@endsection
