<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Certificado Participación {{ $invitado->nombre_completo }}</title>
        <style>
            @page {
                odd-header-name: html_header;
                odd-footer-name: html_footer;
                background-image: url("{{ asset('images/certificados.jpg') }}");
                background-image-resize: 6;
                background-repeat: no-repeat;
                background-position: center;
            }

            h2 {
                padding-top: 300px;
                padding-left: 50px;
                text-align: center;
                font-size: 20px;
                width: 100%;
            }
        </style>

    </head>

    <body>
        <htmlpageheader name="header">
        </htmlpageheader>

        <h2>{{ $invitado->nombre_completo }}</h2>

        {{-- <img src="{{ asset('images/certificados.png') }}" alt=""> --}}
        <htmlpagefooter name="footer">
        </htmlpagefooter>

    </body>

</html>
