<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="w-100" style="max-width: 400px;">
            <h2 class="text-center mb-4">Logout</h2>
            <form action="api/logout" method="POST">
                @csrf
                <!-- <div class="form-group">
                    <label for="email">Email (for confirmation)</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password (for confirmation)</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div> -->
                <button type="submit" class="btn btn-primary btn-block">Logout</button>
            </form>
        </div>
    </div>
</body>

</html>