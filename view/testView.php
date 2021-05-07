<div class="container">
    <div class="panel panel-default">
    <div class="panel-heading">Vacantes</div>

        <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Empresa</th>
                        <th>Título</th>
                        <th>Fecha de publicación</th>
                        <th>Lugar</th>
                        <th>Acccines</th>
                    </tr>
                </thead>
                <tbody id="content-data">
                    <tr>
                        <td colspan="5" class="text-center">Cargando...</td>
                    </tr>
                </tbody>
            </table>
    </div>    
</div>

<script>
    
    function load()
    {        
        
        fetch('index.php?action=getData')
        .then(response => response.json())
        .then(data => {
            let html = '';
            for (let index = 0; index < data.length; index++) {
                console.log(data[index]);
                let city = data[index].city;
                let state = data[index].state;
                let country = data[index].country;
                html+=`<tr>
                    <td>${data[index].company}</td>
                    <td>${data[index].title}</td>
                    <td>${data[index].date}</td>
                    <td>${city.concat(', ',state,', ',country)}</td>
                    <td><a href="index.php?action=details&referencenumber=${data[index].referencenumber}">Ver detalle</a></td>
                </tr>`;
            }

            document.getElementById("content-data").innerHTML = html;
        });
    }

    function details()
    {

    }

    load();

</script>