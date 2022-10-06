@extends('adminlte::page')
@section('title', 'Profile')

@section('css')
<link rel="stylesheet" href="{{ asset('profile.css') }}">
@endsection

@section('content_header')
    <h1>Profile</h1>
@endsection


@section('content')
    <form action="{{ route('profile.update', $user->id) }}" method="POST" class="container" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @if (Session::has('alert'))
            <div class="alert alert-danger">{{ Session::get('alert') }}</div>
        @endif
        <div class="card">
            <div class="card-body">
            <!-- image -->
            <div class="d-flex flex-row container justify-content-center">
                <img src="{{ url('public/Image/'.$user->image) }}" class="rounded-circle flex-wrap">
            </div>

            <!-- new image -->
            <!-- <div class="image mt-3">
                <input type="file" class="form-control" name="image">
            </div> -->


            <div class="d-flex mt-3">
                <x-adminlte-input-file name="image" igroup-size="sm" placeholder="Choose an image" class="col-md-6">
                    <x-slot name="image">
                    <div class="input-group-text bg-lightblue">
                        <i class="fas fa-upload"></i>
                    </div>
                    </x-slot>
                </x-adminlte-input-file>
            </div>
    
                <div class="row">
                    <x-adminlte-input type="text" label="Name: " name="name" placeholder="Eren Yeager"
                        value="{{ old('name', $user->name) }}" fgroup-class="col-sm-6" required></x-adminlte-input>
                    <x-adminlte-input type="email" label="Email: " name="email" placeholder="eren@kyojin.com"
                        value="{{ old('email', $user->email) }}" fgroup-class="col-sm-6" readonly required></x-adminlte-input>
                </div>
                <x-adminlte-input type="password" label="Password: " name="password" placeholder="*********" required>
                </x-adminlte-input>
                <div class="d-flex flex-column">
                        <label>New Password</label>
                        <input class="form-control" id="passwordBaru" type="password" name="password_baru" placeholder="***************">
                    </div>

                    <div class="d-flex flex-column">
                        <label id="ulangiPasswordLabel">Verify Password</label>
                        <input class="form-control" id="ulangiPassword" type="password" name="password_baru" placeholder="***************">
                        <div id="ulangiPasswordFeedback" class="invalid-feedback">Password doesn't match</div>
                    </div>
                    
                    <button class="btn btn-primary mt-3 container" type="submit">Save Changes</button>
                </div>

    </form>

    </div>
    </div>
@endsection


@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/app.js') }}"></script>
    
    <script>
        const massage = document.getElementById('peringatan');

        massage !== null && setTimeout(() => {
            massage.style.display = 'none'
        }, 3000);

        const ulangiPassword = $('#ulangiPassword');
        const passwordBaru = $('#passwordBaru');

        $('#ulangiPasswordLabel, #ulangiPassword').hide();

        $('#ulangiPassword, #passwordBaru').on('keyup', () => {
            if (ulangiPassword.val().length > 0) {
                ulangiPassword.addClass('is-invalid')
                if (ulangiPassword.val() === passwordBaru.val()) return ulangiPassword.removeClass('is-invalid')
            }
        })

        passwordBaru.on('keyup', function() {
            if ($(this).val().length > 0) return $('#ulangiPasswordLabel, #ulangiPassword').show().fadeIn();
            if ($(this).val().length <= 0) {
                $('#ulangiPasswordLabel, #ulangiPassword, #ulangiPasswordFeedback').hide().fadeOut();
                ulangiPassword.val('');
                ulangiPassword.removeClass('is-invalid');
            }
        })

        // NOTIFICATION
        const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            })

        @if (Session::has('success'))
                Toast.fire({
                    icon: 'success',
                    title: '{{ Session::get('success') }}'
                })
        @endif
        @if (Session::has('danger'))
                Toast.fire({
                    icon: 'error',
                    title: '{{ Session::get('danger') }}'
                })
        @endif
        @if (Session::has('alert'))
                Toast.fire({
                    icon: 'error',
                    title: '{{ Session::get('alert') }}'
                })
        @endif
        @if (Session::has('primary'))
                Toast.fire({
                    icon: 'success',
                    title: '{{ Session::get('primary') }}'
                })
        @endif
    </script>
@endsection