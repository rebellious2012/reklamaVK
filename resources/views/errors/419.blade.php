<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>419 | Session Expired</title>
</head>
<body>
    <h1>419 - Сессия истекла</h1>
    <p>Ваша сессия истекла. Пожалуйста, обновите страницу или войдите заново.</p>
    <a href="{{ url()->previous() }}">Назад</a>
    <a href="{{ route('index') }}">Главная</a>
</body>
</html>
