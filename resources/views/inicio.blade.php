<!-- <!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha aplicação Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-dark">Olá, Laravel!!!</h1>
        <a href="/perfil" class="btn btn-primary">Ver Perfil</a>
    </div>
</body>
</html> -->

<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" rel="stylesheet">
</head>
<body> 
    <main class="container"> 
        <h1>{{ config('app.name') }}</h1> 
        <p>Workshops, palestras e hackathons do ISLA Gaia.</p> 
        <p><a href="/eventos" role="button">Ver eventos</a></p> 
    </main> 
</body>
</html>

