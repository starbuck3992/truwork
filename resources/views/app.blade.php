<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Masivní dřevo, špičková řemeslná práce a individuální přístup je to,co dělá kuchyně Truwok naprosto výjimečnými. Zakázková výroba na míru. Kuchyně, vestavěné skříně, vybavení komerčních prostor.">
    <title>{{ config('app.name', 'Truwork') }}</title>
    <link rel="icon" href="../images/logo-icon.png"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<div id="app">
    <app></app>
</div>
</html>
