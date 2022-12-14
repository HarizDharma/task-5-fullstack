@extends('layouts.main')

@section('konten')
    <div class="pagetitle">
        <h1 style="color: white;">Edit Category</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" style="color: white;">Home</a></li>
                <li class="breadcrumb-item"><a href="/categories" style="color: white;">Categories</a></li>
                <li class="breadcrumb-item active" style="color: white;">Edit</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        @if (session()->has('alert'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('alert') }} <button type="button" class="btn-close"
                                    data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <h5 class="card-title" style="color: black;">Details</h5>

                        <!-- General Form Elements -->
                        <form action="/categories/{{ $category->id }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="row mb-3">
                                <label for="yourCategory" class="col-sm-2 form-label">Category name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name"
                                        class="form-control @error('category') is-invalid @enderror" id="yourCategory"
                                        required value="{{ old('category', $category->name) }}">
                                    @error('category')
                                        <div class="invalid-feedback">Please enter your category name.</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">User</label>
                                <div class="col-sm-10">
                                    <select class="form-select @error('user_id') is-invalid @enderror"
                                        aria-label="Default select example" name="user_id" required>
                                        <option selected="" disabled="" value="">Choose...</option>
                                        @foreach ($users as $user)
                                            <option
                                                {{ old('user_id', $category->user_id) === $user->id ? 'selected=""' : '' }}
                                                value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                        @error('user_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </select>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form><!-- End General Form Elements -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
