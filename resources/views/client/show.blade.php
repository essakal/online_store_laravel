@extends('layouts.dashboard.client.dashboard')
@section('content')
    <h3 class="mb-2 mt-0 text-3xl font-medium leading-tight text-primary">
        show product
    </h3>
    
    <div class="container mt-5">
        <div class="row">
          {{-- <div class="col-md-6">
            <img class="img-fluid" src="{{ asset('storage/images/' . $data->image) }}" alt="Product image">
          </div> --}}
          <div style="background-image: url('{{ asset('storage/images/' . $data->image) }}');"
            class="bg-hero bg-no-repeat bg-cover bg-center  w-1/2 h-96">
        </div>
          <div class="col-md-6">
            <h1 class="h3 mb-3">Product Title</h1>
            <p class="lead mb-4">$99.99</p>
            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis fringilla tellus. Donec vel enim ut lorem bibendum tempor in eu ipsum. Nam eget urna vel est hendrerit interdum eu at ipsum.</p>
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
            href="#"
            >
                Add to Cart
            </a>
          </div>
        </div>
      </div>
      
      
@endsection
