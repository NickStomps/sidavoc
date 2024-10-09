@extends('layout')

@section('content')
<div class="form-container">
    <h1>Registreer</h1>
    @if (session('success'))
        <div class="alert alert-success" style="color: green">
            {{ session('success') }}
        </div>
    @endif
        @if ($errors->any())
    <div class="alert alert-danger" style="color: red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <label class="form-label" for="Name">Naam:</label>
            <input class="form-input" type="text" name="name" id="name" value="{{ old('name') }}" required autofocus>
        </div>

        <div>
            <label class="form-label" for="email">Email:</label>
            <input class="form-input" type="email" name="email" id="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label class="form-label" for="password">Password:</label>
            <input class="form-input" type="password" name="password" id="password" required>
        </div>

        <div>
            <label class="form-label" for="password_confirmation">Confirm Password:</label>
            <input class="form-input" type="password" name="password_confirmation" id="password_confirmation" required>
        </div>

        <div>
            <label class="form-label" for="roleId">Roles</label>
            <input class="form-input" list='roles' name="roleId" id="roleId" required>
            <datalist id="roles">
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->role }}</option>
                @endforeach
            </datalist>
        </div>

        <button class="form-button" type="submit">Registreer</button>
    </form>
    <style>
                     .form-container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .form-input, .form-button, .form-table {
            max-width: 500px;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        .form-input {
            background-color: #f2f2f2;
            border: 2px solid #ccc;
        }
        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #333;
            margin-bottom: 5px;
        }
        .form-button {
            background-color: #FFD700;
            color: white;
            border: none;
            cursor: pointer;
        }
        .form-table {
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }
        .form-table th, .form-table td {
            padding: 10px;
            text-align: left;
        }
        .form-table td input[type="number"] {
            width: 50px;
        }
        .error-message {
            color: red;
            font-size: 12px;
        }
        .alert {
            padding: 10px;
            margin-top: 10px;
            border: 1px solid transparent;
            border-radius: 0.25rem;
        }
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
        @media (max-width: 600px) {
            .form-container {
                padding: 10px;
            }
            .form-input, .form-button {
                padding: 5px;
            }
            .form-table th, .form-table td {
                padding: 5px;
            }
        }
    </style>
@endsection
