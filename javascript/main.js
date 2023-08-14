let itemMenu = document.querySelectorAll('.item');

function adicionarAtivo(){
    itemMenu.forEach((item)=>
        item.classList.remove("ativo")
    )
    this.classList.add("ativo");
}

itemMenu.forEach((item)=>
    item.addEventListener('click', adicionarAtivo)
)



let btnLista = document.querySelector('#btnLista')
let menu = document.querySelector('.menu-lateral')

function expandir(){
    menu.classList.toggle('expandir');
}
btnLista.addEventListener('click', expandir)

let home = document.querySelector('#containerHome')
let colab = document.querySelector('#containerColab')

function cliqueMenuLateral(pagina){
    if(pagina == 'home'){
        home.classList.remove('hidden');
        colab.classList.add('hidden');
    }
    if(pagina == 'colab'){
        home.classList.add('hidden');
        colab.classList.remove('hidden');
    }
    
}

let search = document.getElementById('pesquisar');

pesquisa.addEventListener("keydown", function(event){
    if (event.key === "Enter"){
        searchData(pesquisa.value);
    }
});

function searchData(){
    window.location = 'inicio.php?search='+search.value;
}