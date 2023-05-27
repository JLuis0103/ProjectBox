function mostrarDiv(valor) {
    var tarea = valor;
  
    var div = document.createElement("div");
    div.className = "alert alert-danger text-center";
    div.id = "alerta-div";
  
    var p = document.createElement("p");
    p.innerHTML = "&iquest;Estas seguro que deseas eliminar esta tarea?";
  
    var btnGroup = document.createElement("div");
    btnGroup.className = "btn-group"; 
  
    var btnAceptar = document.createElement("a");
    btnAceptar.className = "btn btn-danger";
    btnAceptar.innerHTML = "Aceptar";
    btnAceptar.href = "eliminacionTarea.php?id=" + tarea;
  
    var btnCancelar = document.createElement("button");
    btnCancelar.type = "button";
    btnCancelar.className = "btn btn-secondary";
    btnCancelar.innerHTML = "Cancelar";
    btnCancelar.addEventListener("click", function() {
      document.querySelector("#alerta-div").remove();
    });
  
    btnGroup.appendChild(btnAceptar);
    btnGroup.appendChild(btnCancelar);
  
    div.appendChild(p);
    div.appendChild(btnGroup);
  
    document.querySelector(".alerta").appendChild(div);
  }
  