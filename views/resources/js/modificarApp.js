
window.addEventListener("load",function(){
    
    let botones = document.getElementsByTagName("button");

    for(let i = 0;i<botones.length;i++){

        botones[i].addEventListener("click",botonSeleccionado,false);

    }

    let denegar = document.getElementById("no");
    denegar.addEventListener("click",ocultaSeccion,false);

    //Detectamos cualquier cambio en los values requeridos para poder de esta forma guardar los
    //nuevos datos en cada campo oculto y llevarlos a nuestro controlador
    guardarNuevosValores();


},false);

function guardarNuevosValores(){
    
    let tbodyHijosEscucha = document.getElementsByTagName("tbody")[0].childNodes;
    var ocNombre = document.getElementById("ocultoNombre");
    var ocCantidad = document.getElementById("ocultoCantidad");
    var ocPrecio = document.getElementById("ocultoPrecio");

    for(let i=0;i<tbodyHijosEscucha.length;i++){

        if(tbodyHijosEscucha[i].nodeName.toLowerCase() == "tr"){

            tbodyHijosEscucha[i].childNodes[0].childNodes[0].addEventListener("input",function(){

                ocNombre.setAttribute("value",this.value);

            },false);

            tbodyHijosEscucha[i].childNodes[1].childNodes[0].addEventListener("input",function(){

                ocCantidad.setAttribute("value",this.value);

            },false);

            tbodyHijosEscucha[i].childNodes[2].childNodes[0].addEventListener("input",function(){

                ocPrecio.setAttribute("value",this.value);

            },false);

        }

    }

}

function botonSeleccionado(evt){

    let idBoton = evt.target.id;

    deshabilitaBotones("disabled",idBoton);

    visibilidadCampos("visible","block",idBoton);

}

function ocultaSeccion(event){

    event.preventDefault();

    visibilidadCampos("hidden","none",""); 

    deshabilitaBotones("",-1);
    
    //Recargamos la página para no guardar los cambios en los values
    location.reload();

}

function visibilidadCampos(visi,dis,id){

    let ocProducto = document.getElementById("ocultoProducto");
    let seccionOculta = document.getElementsByTagName("section")[1];

    ocProducto.setAttribute("value",id);
    seccionOculta.setAttribute("style","visibility: "+visi+"; display: "+dis+";");

}

function deshabilitaBotones(estado,indice){
    
    var botones = document.getElementsByTagName("button");
    var hijosCuerpoTabla = document.getElementsByTagName("tbody")[0].childNodes;

    if(estado == "disabled"){

        for(let i=0;i<botones.length;i++){

            botones[i].setAttribute("disabled",estado);
    
        }

        var filasCuerpo = 0;

        for(let i=0;i<hijosCuerpoTabla.length;i++){

            if(hijosCuerpoTabla[i].nodeName.toLowerCase() == "tr"){

                if(filasCuerpo == Number.parseInt(indice)){

                    hijosCuerpoTabla[i].setAttribute("class","seleccionado");
                    
                    //Buscamos el nodo hijo del td hijo de la fila correspondiente al producto seleccionado
                    var hijosFilaActualiza = hijosCuerpoTabla[i].childNodes;

                    for(let k=0;k<hijosFilaActualiza.length-1;k++){

                        hijosFilaActualiza[k].childNodes[0].removeAttribute("disabled");

                    }

                    //Guardamos en los campos ocultos los valores anteriores a la actualización por si el usuario
                    //solo desea cambiar un valor y no todos.
                    document.getElementById("ocultoNombre").setAttribute("value",hijosFilaActualiza[0].childNodes[0].value);
                    document.getElementById("ocultoCantidad").setAttribute("value",hijosFilaActualiza[1].childNodes[0].value);
                    document.getElementById("ocultoPrecio").setAttribute("value",hijosFilaActualiza[2].childNodes[0].value);

                }

                filasCuerpo++;

            }

        }

    }else{

        for(let i=0;i<botones.length;i++){

            botones[i].removeAttribute("disabled");

        }

        for(let i=0;i<hijosCuerpoTabla.length;i++){
            
            if(hijosCuerpoTabla[i].nodeName.toLowerCase() == "tr"){

                if(Number.parseInt(hijosCuerpoTabla[i].attributes.length) != 0){

                    for (const atributo of hijosCuerpoTabla[i].attributes) {
                        
                        if(atributo.nodeValue == "seleccionado"){

                            hijosCuerpoTabla[i].removeAttribute("class");

                        }

                    }

                }
                
                //Buscamos el nodo hijo del td hijo de la fila correspondiente al producto seleccionado
                var hijosFilaActualizaNo = hijosCuerpoTabla[i].childNodes;

                for(let k=0;k<hijosFilaActualizaNo.length-1;k++){

                    hijosFilaActualizaNo[k].childNodes[0].setAttribute("disabled","disabled");

                }


            }

        }

    }

}