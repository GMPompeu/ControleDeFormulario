// ---------------------------------------------------RECEBER PESQUISA FORMULÁRIO---------------------------------------------------

function searchHomeForm(){
    const search = document.getElementById('pesquisa')

    var search_select = search.value

    window.location = "homeform?search="+ search_select
}

// <!-- -----------------------------------------------CONCLUIDO --------------------------------------------------------- -->

function abrirPopup() {
    var popup = document.getElementById('container-pop-concluido');
    popup.classList.add('open');
}
function closeConc(){
    var popup = document.getElementById('container-pop-concluido');
    popup.classList.remove('open');
}
// <!-- -----------------------------------------------EM ATENDIMENTO ---------------------------------------------------- -->

function abrirAtend() {
    var popup = document.getElementById('container-pop-atend');
    popup.classList.add('open');
}
function closeAtend(){
    var popup = document.getElementById('container-pop-atend');
    popup.classList.remove('open');
}
// <!-- -----------------------------------------------AGUARDANDO TERCEIRO ---------------------------------------------------- -->

function abrirAguard() {
    var popup = document.getElementById('container-pop-aguard');
    popup.classList.add('open');
}
function closeAguard(){
    var popup = document.getElementById('container-pop-aguard');
    popup.classList.remove('open');
}

// ---------------------------------------------------NÃO CONFORME---------------------------------------------------------

function abrirNconf() {
    var popup = document.getElementById('container-naoconf');
    popup.classList.add('open');
}
function closeNconf(){
    var popup = document.getElementById('container-naoconf');
    popup.classList.remove('open');
}


// ---------------------------------------------------CONFORME---------------------------------------------------------

function abrirconf() {
    var popup = document.getElementById('container-conf');
    popup.classList.add('open');
}
function closeconfig(){
    var popup = document.getElementById('container-conf');
    popup.classList.remove('open');
}


// ---------------------------------------------------INDEFINIDO---------------------------------------------------------

function abrirIndf() {
    var popup = document.getElementById('container-indf');
    popup.classList.add('open');
}
function closeconf(){
    var popup = document.getElementById('container-indf');
    popup.classList.remove('open');
}

