<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification d'etudiant</title>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>
<body>
    <h1>Modification de l'étudiant</h1>
    <form action="/update" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{$prenom}}" id="nameold" name="prenomold">
        <label class="prenom"  for="prenom">Prenom:</label>
        <input type="text" id="name" name="prenom" value="{{$prenom}}" ><br><br>
        <button type="submit">Modifier l'étudiant</button>
    </form>
</body>
</html>