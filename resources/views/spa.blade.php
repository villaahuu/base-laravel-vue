<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vue SPA Demo</title>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <link href="/favicon.ico" rel="shortcut icon">
    <style>
    html {
  position: relative;
  min-height: 100%;
}
body {
  /* Margin bottom by footer height */
  margin-bottom: 60px;
}
.main-footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  /* Set the fixed height of the footer here */
  
  background-color: #12322B;
}
</style>
</head>

<body>
    <header>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation"><div class="container"><div class="navbar-header"><button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarMainCollapse"><span class="sr-only">Interruptor de Navegación</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="https://www.gob.mx/"><img src="https://framework-gb.cdn.gob.mx/landing/img/logoheader.svg" alt="Página de inicio, Gobierno de México" width="128" height="48"></a></div><div class="collapse navbar-collapse" id="navbarMainCollapse"><ul class="nav navbar-nav navbar-right"><li><a href="https://www.gob.mx/tramites">Trámites</a></li><li><a href="https://www.gob.mx/gobierno">Gobierno</a></li><li><a href="https://www.gob.mx/busqueda"><span class="sr-only">Búsqueda</span><i class="icon-search"></i></a></li></ul></div></div></nav>
    </header>  
    <div id="app" style>
        <app></app>
    </div>
    <footer class="main-footer"><div class="list-info"><div class="container"><div class="row"><div class="col-sm-3"><img data-v-9e928f9a="" src="https://framework-gb.cdn.gob.mx/landing/img/logoheader.svg" href="/" alt="logo gobierno de méxico" class="logo_footer" style="max-width: 90%;"></div><div class="col-sm-3"><h5>Enlaces</h5><ul><li><a href="https://participa.gob.mx" target="_blank" rel="noopener" title="Enlace abre en ventana nueva">Participa</a></li><li><a href="https://www.gob.mx/publicaciones" target="_blank" rel="noopener" title="Enlace abre en ventana nueva">Publicaciones Oficiales</a></li><li><a href="http://www.ordenjuridico.gob.mx" target="_blank" rel="noopener" title="Enlace abre en ventana nueva">Marco Jurídico</a></li><li><a href="https://consultapublicamx.inai.org.mx/vut-web/" target="_blank" rel="noopener" title="Enlace abre en ventana nueva">Plataforma Nacional de Transparencia</a></li></ul></div><div class="col-sm-3"><h5>¿Qué es gob.mx?</h5><p>Es el portal único de trámites, información y participación ciudadana. <a href="https://www.gob.mx/que-es-gobmx">Leer más</a></p><ul><li><a href="https://datos.gob.mx">Portal de datos abiertos</a></li><li><a href="https://www.gob.mx/accesibilidad">Declaración de accesibilidad</a></li><li><a href="https://www.gob.mx/privacidadintegral">Aviso de privacidad integral</a></li><li><a href="https://www.gob.mx/privacidadsimplificado">Aviso de privacidad simplificado</a></li><li><a href="https://www.gob.mx/terminos">Términos y Condiciones</a></li><li><a href="https://www.gob.mx/terminos#medidas-seguridad-informacion">Política de seguridad</a></li><li><a href="https://www.gob.mx/sitemap">Mapa de sitio</a></li></ul></div><div class="col-sm-3"><h5><a href="https://www.gob.mx/tramites/ficha/presentacion-de-quejas-y-denuncias-en-la-sfp/SFP54">Denuncia contra servidores públicos</a></h5><h5>Síguenos en</h5><ul class="list-inline"><li><a class="social-icon facebook" target="_blank" rel="noopener" title="Enlace abre en ventana nueva" href="https://www.facebook.com/gobmexico" aria-label="Facebook de presidencia"></a></li><li><a class="social-icon twitter" target="_blank" rel="noopener" title="Enlace abre en ventana nueva" href="https://twitter.com/GobiernoMX" aria-label="Twitter de presidencia"></a></li></ul></div></div></div></div><div class="container-fluid footer-pleca"><div class="row"><div class="col"><br><br></div></div></div></footer>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>