<html>
    <head>
        <title>Zpráva od uživatele - {{ config('app.name', 'Truwork') }}</title>
    </head>
    <body>
        <div>
            <div>
                {{ $mail_data['message'] }}
            </div>
            <br/>
            <p>Jméno : {{ $mail_data['name'] }}</p>
            <p>Přijmení : {{ $mail_data['surname'] }}</p>
            <p>Telefon : {{ $mail_data['phone'] }}</p>
            <p>Email : {{ $mail_data['email'] }}</p>
        </div>
    </body>
</html>