<script>
    /* Consulta 'Ajax' con Fetch */
    let url = "proc/consultar_todo.php"; 

    const getData = url => {
        return new Promise((resolve, reject) => {
            fetch(url)
                .then(response => response.json())
                .then(data => resolve(data))
                .catch(error => reject(error));
        });
    };

    // getData(url)
    //     .then(data => funcion_salida_data(data))
    //     .catch(error => alert(`Error!\n${error}`));

    const funcion_salida_data = data => {
        console.log(data);
    };

</script>

<!-- Carga de la data solicitada por Fetch -->
<div id="contenedor_carga">
<?php require "proc/consultar_todo.php"; ?>
</div>