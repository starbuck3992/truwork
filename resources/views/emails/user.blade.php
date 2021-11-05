<html>
<head>
    <title>Zpráva uživateli - {{ config('app.name', 'Truwork') }}</title>
</head>
<body>
<div>
    <p>Dobrý den,</p>
    <br/>
    <p>Děkujeme že jste nás kontaktovali. Budeme se Vám snažit odpovědět co nejdříve.</p>
    <br/>
    <p>S přáním pěkného dne TRUWORK S.R.O</p>
    
    <div>
        <p>Adresa : Jeseník 790 00, Astur 185</p>
        <p>Telefon : 607 238 514</p>
        <p>Email : truwork@seznam.cz</p>
    </div>
    <div width="200px" height="50px">
        <img src="asset({{ $mail_data['logo'] }})" alt="logo"/>
    </div>
</div>
</body>
</html>
