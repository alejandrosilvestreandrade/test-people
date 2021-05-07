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

<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Descripción</h4>
      </div>
      <div class="modal-body">
        <div id="description"></div>
      </div>
    </div>
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
                let city = data[index].city;
                let state = data[index].state;
                let country = data[index].country;
                html+=`<tr>
                    <td>${data[index].company}</td>
                    <td>${data[index].title}</td>
                    <td>${data[index].date}</td>
                    <td>${city.concat(', ',state,', ',country)}</td>
                    <td>
                    <!--<a href="index.php?action=details&referencenumber=${data[index].referencenumber}">Ver detalle</a>-->
                    <button id="view" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" data-description="${data[index].description}"">Ver detalle</button></td>
                </tr>`;
            }

            document.getElementById("content-data").innerHTML = html;
        });
    }

    $( "body" ).on( "click", "#view", function(e) {
        var element = document.getElementById("description");
        element.innerHTML = '';
        var p = document.createElement("p");
        var text = document.createTextNode(e.target.dataset.description);
        p.appendChild(text);   
        p.classList.add("text-justify") 
        element.append(p);       
    });

   

    load();

</script>