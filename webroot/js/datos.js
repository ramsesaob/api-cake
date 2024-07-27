import productos from '../datos/productos.js';
import categorias from '../datos/categorias.js';


const coloresEl             =document.querySelector("#colores");
const tituloEl              =document.querySelector("#titulo")
const menuCategoriasEl      =document.querySelector("#menuCategorias");
const mostrarProductosEl    =document.querySelector("#mostrarProductos");
const modalDetalleEl        =document.querySelector("#modalDetalle");
const txtBuscarEl           =document.querySelector("#txtBuscar");
const contadorCarritoEl     =document.querySelector("#contadorCarrito");
const btnCarritoEl          =document.querySelector("#btnCarrito");
const mostrarCarritoEl      =document.querySelector("#mostrarCarrito");

let carrito=[];
let totalItem=0;
addEventListener("DOMContentLoaded",()=>{

    renderMenu();

    renderProductos(productos,"Todas");
})


function renderMenu(){
    let valor="";
    categorias.forEach(element => {
        valor+=
        `
        <li>
            <a class="dropdown-item" href="#" id="${element.id}" name="${element.nombre}">
                <img src="img/categorias/${element.icono}" alt="" width="20"> ${element.nombre}
            </a>
        </li>
        `
    });
    menuCategoriasEl.innerHTML=valor
}
menuCategoriasEl.addEventListener("click",(e)=>{
    e.preventDefault();
    if(e.target && e.target.tagName=="A"){
        let prod=productos.filter((productos) => productos.category==e.target.id); 
        renderProductos(prod, e.target.name)
    }
})

function renderProductos(prod,categoria){
    
    
    tituloEl.innerHTML=`(${prod.length}) Productos de la Categoria (${categoria})`

    let valor="";
    prod.forEach(element => {
        valor+=
        ` 
        <div class="col-md-4 col-lg-3 mb-4"> 
            <div class="card h-100 text-center " data-bs-theme="dark">
                <div class="card-header p-0">   
                    <img src="img/productos2/${element.img}" alt="" class="img-fluid" >
                </div>
                <div class="card-body">
                    <div class="card-title">${element.nombre}</div>
                    <div class="card-text text-danger h4">${(element.price).toFixed(0)}$</div>
                </div>
                <div class="card-footer">
                    <a href="#" id="${element.nombre}" name="detalle" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Detalle</a>
                    <a href="#" id="${element.nombre}" name="comprar"class="btn btn-sm btn-outline-danger">Comprar</a>
                </div>
            </div>   
        </div>
        `
    });
    mostrarProductosEl.innerHTML=valor
}
mostrarProductosEl.addEventListener("click",(e)=>{
    e.preventDefault();
    if(e.target && e.target.tagName=="A"){
        if(e.target.name=="detalle"){
            renderDetalle(e.target.id)
        }
        if(e.target.name=="comprar"){
            comprar(e.target.id);
        }
    }
})
function renderDetalle(id){

    const producto=productos.find(pro => (pro.nombre==(id)))
    const categoria=categorias.find(cat =>(cat.id==producto.category))
    console.log(categoria)
    let valor=
    `
        <div class="col-md-6">
            <img src="img/productos2/${producto.img}" alt="" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h3><b>Nombre:</b> ${producto.nombre}</h3>
            <h4><b>Categoria:</b> ${categoria.nombre}</h4>
            <p><b>Descripcion:</b> ${producto.description}</p>
            <h2 class="text-danger"><b>Precio: ${(producto.price).toFixed(2)}$</b></h2>
        </div>
    `
    modalDetalleEl.innerHTML=valor;



}
function comprar(id){
    const compra=productos.find(pro => (pro.nombre==(id)))
    if(carrito.find(producto => (producto.nombre==id))){

        swal("Error ", "Ya existe este producto !!!!!!!"+"id", "error");
        
    }else{
        swal("Indique la Cantidad:", {
            content: "input",
          })
          .then((value) => {
            if (value !== "" && !isNaN(value)) {
              swal(`Gracias por comprar: ${value} articulos`);
              const cant = Number(value);
              carrito.push(compra);
              console.table(carrito)  
              const ultimoElemento = carrito.length - 1;
              carrito[ultimoElemento].cantidad =  cant;

              actualizarCarrito(cant);
                //localstore
                    let jsonArray=JSON.stringify(carrito);
                    //save(jsonArray);
            } else {
              swal("Error", "Por favor, ingrese solo nÃƒÂºmeros", "error");
            }
          });  
    }
   
}
btnCarritoEl.addEventListener("click",(e)=>{
    renderCarrito();
})
function renderCarrito(){
    let valor="";
    carrito.forEach(element => {
        valor+=
            `
            <div class="card mb-3"  >
                <div class="row g-0"">
                    <div class="col-md-3 p-2 mt-3">
                    <img src="img/productos2/${element.img}" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-9">
                            <div class="card-body small">
                                <p><b>Nombre: </b>${element.nombre}<br/>
                                <b>Cantidad:</b>${element.cantidad}
                                <span class="text-danger"><b> Precio:</b>${element.price}</span>
                                <b> Total:</b>${(element.cantidad*element.price)}<br/>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <a href="#" class="btn btn-dark btn-sm bx bx-minus" name="resta" id="${element.id}"></a>
                                        <a href="#" class="btn btn-success btn-sm bx bx-plus" name="suma" id="${element.id}"></a>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-danger btn-sm bx bx-trash" name="elimina" id="${element.id}"></a>
                                    </div>
                              
                                </div>
                            </div>
                    </div>
                </div>
            </div>

            `
    });
    mostrarCarritoEl.innerHTML=valor; 
}
function actualizarCarrito(cant){
    totalItem=totalItem+cant
   contadorCarritoEl.innerHTML=`(${totalItem})`
    //renderCarrito();
    //renderTotales();

}
coloresEl.addEventListener("click",(e)=>{
    e.preventDefault();
    if(e.target && e.target.tagName=="A"){
        if(e.target.id=="c1"){
            document.body.style.backgroundColor = "#FFFFFF";
            tituloEl.style.color="#34495e";
        } else{
            tituloEl.style.color="#ecf0f1";
        }
        if(e.target.id=="c2") document.body.style.backgroundColor = "#2C3E50"
        if(e.target.id=="c3") document.body.style.backgroundColor = "#8E44AD"    
        if(e.target.id=="c4") document.body.style.backgroundColor = "#2980B9"  
        if(e.target.id=="c5") document.body.style.backgroundColor = "#C0392B"  
    }

})

txtBuscarEl.addEventListener("keyup",()=>{
    const text = txtBuscarEl.value
    console.log(text)
    const prodFiltrados = productos.filter(pro => pro.nombre.toLowerCase().includes(text))
    const total=prodFiltrados.length
    let titulo=`BUSCAR : ${text}`

    renderProductos(prodFiltrados)
})