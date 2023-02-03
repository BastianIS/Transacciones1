<script>
    /* Consulta 'Ajax' con Fetch */
    const url = "proc/consultar_todo.php"; 

    fetch(url)
        .then(response => response.json())
        .then(data => {
            /* Creación y población de la tabla con la data */
            var tabla_data = document.createElement('table');

            // Por cada registro se añade una nueva fila
            for (const fila of data){
                let tr = document.createElement('tr');

                // Recorrer la data de cada objeto
                for (const atributo of Object.values(fila)) {

                    var celda = document.createElement('td');
                    celda.textContent = atributo;
                    celda.style.border = '1px black solid';
                    tr.appendChild(celda);
                }

                tr.appendChild(celda);
                tabla_data.appendChild(tr);
            }
        
            document.getElementById("contenedor_carga").appendChild(tabla_data);
        })
</script>

<!-- Carga de la data solicitada por Fetch -->
<div id="contenedor_carga"></div>