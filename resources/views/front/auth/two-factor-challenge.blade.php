<x-guest-layout>
    <style>
        .form-control {
            margin-bottom: 10px;
        }
        button {
            margin-top: 10px;
        }
        .btn-primary{
            background-color: #0056b3;
            padding: 10px 20px;
            color: #fff;
            border-radius: 5px
        }
        button:hover {
            background-color: #0056b3;
        }
        button:focus {
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
        }
        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        .form-control::placeholder {
            color: #6c757d;
            opacity: 1;
        }
        .form-control:disabled, .form-control[readonly] {
            background-color: #e9ecef;
            opacity: 1;
        }
        input{
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
    </style>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-4 text-md ">
        admin login
    </div>

    <div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color: red">{{ $error }}</li>
                    <br>
                @endforeach
            </ul>
        @endif
    </div>
    <form method="POST" action="{{ route('two-factor.login') }}">
        @csrf
        <div class="col-4">
            <input type="text" name="code" placeholder="Enter your authenticator Code" class="form-control"  autofocus>
        </div>
        <div class="col-4">
            <input type="text" name="recovery_code" placeholder="Enter your recovery code" class="form-control"  autofocus>
        </div>
        <div class="col-4">
            <button type="submit" class="btn btn-primary">
            {{--    {{ __('Log in') }} --}} login
            </button>
    </form>
</x-guest-layout>
