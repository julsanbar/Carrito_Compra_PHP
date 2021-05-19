
window.addEventListener("load",function(){
    
    //Recogemos todas las etiquetas button que tenemos en el documento y 
    //lanzamos en todos ellos una escucha para el evento click. Todo ello mediante burbujeo.
    let botones = document.getElementsByTagName("button");

    for(let i = 0;i<botones.length;i++){

        botones[i].addEventListener("click",botonSeleccionado,false);

    }

    let denegar = document.getElementsByTagName("input")[2];

    denegar.addEventListener("click",ocultaSeccion,false);

},false);

//Recogemos el elemento capturado por el evento lanzado, y verificamos su id.
//Además deshabilitamos todos los botones para que el usuario no pueda pulsar dos productos.
//Cambiamos de color el producto seleccionado y le damos una última opción al usuario de poder 
//indicar que no quiere eliminar el producto seleccionado.
function botonSeleccionado(evt){

    let idBoton = evt.target.id;

    deshabilitaBotones("disabled",idBoton);

    visibilidadCampos("visible","block",idBoton);

}

//Función donde si ha sido clickeada la opción NO del formulario se volvera a ocultar la sección del formulario
//Además de resetear el value de nuestro campo oculto.
function ocultaSeccion(event){

    event.preventDefault();

    visibilidadCampos("hidden","none",""); 

    deshabilitaBotones("",-1);

}

//Función donde se regula la visibilidad del campo
function visibilidadCampos(visi,dis,id){

    let campoOculto = document.getElementsByTagName("input")[0];
    let seccionOculta = document.getElementsByTagName("section")[1];

    campoOculto.setAttribute("value",id);
    seccionOculta.setAttribute("style","visibility: "+visi+"; display: "+dis+";");

}

//Función dedicada únicamente a deshabilitar o habilitar todos los botones de la página.
function deshabilitaBotones(estado,indice){
    
    var botones = document.getElementsByTagName("button");
    var hijosCuerpoTabla = document.getElementsByTagName("tbody")[0].childNodes;

    if(estado == "disabled"){

        for(let i=0;i<botones.length;i++){

            botones[i].setAttribute("disabled",estado);
    
        }
        
        //Aqui vemos cual es el nodo hijo fila que corresponde al boton seleccionado.
        var filasCuerpo = 0;

        for(let i=0;i<hijosCuerpoTabla.length;i++){

            if(hijosCuerpoTabla[i].nodeName.toLowerCase() == "tr"){

                if(filasCuerpo == Number.parseInt(indice)){

                    hijosCuerpoTabla[i].setAttribute("class","seleccionado");

                }

                filasCuerpo++;

            }

        }

    }else{

        for(let i=0;i<botones.length;i++){

            botones[i].removeAttribute("disabled");

        }
        
        //Vemos que elemento hijo tiene un atributo con valor seleccionado,en tal caso lo eliminamos
        for(let i=0;i<hijosCuerpoTabla.length;i++){
            
            if(hijosCuerpoTabla[i].nodeName.toLowerCase() == "tr"){

                if(Number.parseInt(hijosCuerpoTabla[i].attributes.length) != 0){

                    for (const atributo of hijosCuerpoTabla[i].attributes) {
                        
                        if(atributo.nodeValue == "seleccionado"){

                            hijosCuerpoTabla[i].removeAttribute("class");

                        }

                    }

                }
            }

        }

    }

}