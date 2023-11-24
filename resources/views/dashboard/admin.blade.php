<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hai Admin</h1>
    <form action="{{ route('logout') }}" method="POST">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        @csrf
        <button type="submit" class="btn btn-primary" >Logout</button>
    </form>
</body>
</html>