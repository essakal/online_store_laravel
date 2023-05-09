<!DOCTYPE html>
<html>
<head>
    <title>ItsolutionStuff.com</title>
</head>
<body>
    <h2>bonjour {{ $mailData['data']->user_name  }}</h2>
    <p>status: {{ $mailData['data']->status_name  }}</p>
    {{-- <h1>{{ $data->user_name }}</h1>
    <p>status: {{ $data->status_name }}</p> --}}
    <p>votre status de votre commande #{{ $mailData['data']->id }} est {{ $mailData['data']->status_name  }}</p>
     
    <div>
        <p>merci</p>
    </div>
</body>
</html>