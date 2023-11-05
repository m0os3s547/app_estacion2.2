<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estación Meteorológica</title>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
                * {
            margin: 0rem;
            padding: 0rem;
            box-sizing: border-box;
            font-family: sans-serif;
        }
        main {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        #monitor {
            border: solid 1px silver;
            width: 300px;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        #monitor-container {
            margin: 1rem;
        }

        #grafico-container {
            width: 300px;
            height: 400px;
            border: solid 1px silver;
            border-radius: 8px;
        }

        .caja {
            display: grid;
            grid-template-columns: 1fr 1fr;
            margin-bottom: 0.5rem;
        }

        .caja-title {
            font-weight: bold;
            color: rgb(102, 102, 102);
        }

        .caja-valor {
            border: solid 1px silver;
            border-radius: 8px;
            text-align: center;
            color: rgb(102, 102, 102);
        }
    </style>
</head>
<body>
    <header>
        <h1>Estación Meteorológica</h1>
    </header>
    <main>
        <!-- Contenedor del monitor instantáneo -->
        <div id="monitor">
            <div id="monitor-container">
                <div class="caja">
                    <div class="caja-title">
                        TEMPERATURA
                    </div>
                    <div id="temperatura" class="caja-valor">
                        20 °C <!-- Contenido inicial de temperatura -->
                    </div>
                </div>
                <div class="caja">
                    <div class="caja-title">
                        HUMEDAD
                    </div>
                    <div id="humedad" class="caja-valor">
                        50% <!-- Contenido inicial de humedad -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenedor del gráfico -->
        <div id="grafico-container">
            <canvas id="grafico-temperatura" style="width: 100%; height: 100%;"></canvas>
        </div>
    </main>

    <script type="text/javascript">
        // Función para obtener y mostrar los datos de la estación meteorológica
        async function fetchEstacionData() {
            try {
                // Obtiene el "chipid" de la URL
                const urlParams = new URLSearchParams(window.location.search);
                const chipid = urlParams.get('chipid');

                // Conecta a la API para obtener los datos de la estación
                const response = await fetch(`https://mattprofe.com.ar/proyectos/app-estacion/datos.php?chipid=${chipid}&cant=7`);
                const data = await response.json();

                // Actualiza el contenido del elemento HTML con los nuevos datos
                document.getElementById('temperatura').innerHTML = data[0].temperatura + ' °C';
                document.getElementById('humedad').innerHTML = data[0].humedad + '%';
            } catch (error) {
                console.error('Error al obtener datos de la estación:', error);
            }
        }

        // Función para recargar la página cada 60 segundos
        function reloadPage() {
            location.reload();
        }

        // Ejecuta fetchEstacionData() inmediatamente
        fetchEstacionData();

        // Ejecuta fetchEstacionData() cada 60 segundos
        setInterval(fetchEstacionData, 60000); // 60000 ms = 60 segundos

        // Ejecuta reloadPage() cada 60 segundos
        setInterval(reloadPage, 60000); // 60000 ms = 60 segundos
    </script>
</body>
</html>