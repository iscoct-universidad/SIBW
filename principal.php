<!DOCTYPE html>
<html>
    <head>
        {{ include('head.html') }}
        <link rel="stylesheet" href="css/principal.css"/>
	</head>
    <body>
		{{ include('cabecera.twig') }}
		
        <section id="principal">
        	{{ include('barraLateral.twig') }}

            <main class="borde" id="conjuntoEventos">
            	{{ include('conjuntoEventos.twig') }}
            </main>
        </section>

        {{ include('pie.html') }}
    </body>
</html>
