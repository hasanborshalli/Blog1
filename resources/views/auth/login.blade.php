<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{ asset('css/admin-blog.css') }}">
</head>

<body class="admin-auth-page">
    <div class="admin-auth-wrap">
        <div class="admin-auth-card">
            <h1>Admin Login</h1>
            <p>Sign in to access the blog dashboard.</p>

            @if($errors->any())
            <div class="admin-alert error">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('login.submit') }}" class="admin-auth-form">
                @csrf

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" required>
                </div>

                <div class="form-check">
                    <label>
                        <input type="checkbox" name="remember">
                        Remember me
                    </label>
                </div>

                <button type="submit" class="admin-btn">Login</button>
            </form>
        </div>
    </div>
</body>

</html>