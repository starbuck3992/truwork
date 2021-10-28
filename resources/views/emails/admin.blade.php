<html>
    <head>
        <title>Zpráva od uživatele</title>
    </head>
    <body>
        <div>
            <p>Jméno : {{ $mail_data['name'] }}</p>
            <p>Přijmění : {{ $mail_data['surname'] }}</p>
            <p>Telefon : {{ $mail_data['phone'] }}</p>
            <p>Email : {{ $mail_data['email'] }}</p>
            <p>Obsah zprávy:</p>
            <div>
                {{ $mail_data['message'] }}
            </div>
        </div>
    </body>
</html>