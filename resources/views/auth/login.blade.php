<!DOCTYPE html>
<html>
<head>
    <title>Login Kasir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5" style="max-width:400px">
    <div class="card shadow">
        <div class="card-body">
            <h4 class="mb-3 text-center">Login Kasir</h4>

            <form method="POST">
                @csrf

                <input type="email" name="email"
                       class="form-control mb-3"
                       placeholder="Email" required>

                <input type="password" name="password"
                       class="form-control mb-3"
                       placeholder="Password" required>

                <button class="btn btn-primary w-100">
                    Login
                </button>
            </form>

            @error('email')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

</body>
</html>
