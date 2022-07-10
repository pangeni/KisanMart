@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">

        <div class="col-12 col-lg-3">

            <!-- Side Navigation -->
            @include('layouts.sidebar', ['addShop' => true])
            <!-- End of Side Navigation -->

        </div>

        <div class="col-12 col-md-9">
            <div class="w-lg-90 ml-auto">
                <form method="post" class="text-dark" action="{{ route('shops.store') }}" enctype="multipart/form-data">

                    {!! session('message') !!}

                    <div class="form-group">
                        <label class="mb-0" for="email">Name*</label>
                        <input type="text"
                            class="form-control @error('shop_name') is-invalid @else border-text @enderror"
                            name="shop_name" id="email" placeholder="Shop Name" value="{{ old('shop_name') }}">
                        @error('shop_name') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>

                    <label style="margin-bottom:0" for="image">Image</label>
                    <div class="custom-file mb-3">
                        <input type="file" style="border: 1px solid black" class="custom-file-input @error('image') is-invalid @enderror" name="image"
                            id="image">
                        <label class="custom-file-label" for="validatedCustomFile">Choose File</label>
                        @error('image') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>

                    <div class="text-right">
                        @csrf
                        <button class="btn btn-secondary ml-auto">Create</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection('content')
