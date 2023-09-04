<?php
class HomeForm extends Controller
{
    function index()
    {
        $error = array();
        $tableform = new TableForm();
        $result = null;
        $usuario = new Usuario();
        $data = $_SESSION['USUARIO']->USUARIO_LOGIN;

        //ACESSO GERAL SPTRANS = 4 - ACESSO GERAL ATHENS = 3 - ACESSO GESTOR FISCALIZAÇÃO = 2 ACESSO FISCALIZAÇÃO = 1

        if (!Auth::loggetin()) {
            $this->redirect('logout');
        }
        if (Auth::idfativo() != "S") {
            $this->redirect('logout');
        }
        if (Auth::acess() != 4 && Auth::acess() != 3 && Auth::acess() != 2 && Auth::acess() != 1){
           $this->redirect('home');
        }
        

        if (!empty($_GET['search'])) {
            $tableform = new TableForm();
            $data = $_GET['search'];
            $result = $tableform->searchHomeForm($data);
            if ($result === null) {
                $tableform->validate($data);
            }
        } else {
            $tableform = new TableForm();
            $result = $tableform->selectHomeform();
        }
        $error = $tableform->error;


        // Defina o número de itens por página
        $itensPorPagina = 6;

        // Obtenha o número total de resultados
        if ($result > 1) {
            $totalResultados = count($result);
            // Calcule o número total de páginas
            $totalPaginas = ceil($totalResultados / $itensPorPagina);

            // Obtenha a página atual
            $paginaAtual = isset($_GET['page']) ? $_GET['page'] : 1;

            // Calcule o índice de início e fim dos resultados a serem exibidos na página atual
            $indiceInicio = ($paginaAtual - 1) * $itensPorPagina;

            // Obtenha os resultados da página atual com a função que usa limitação de página
            if (!empty($_GET['search'])) {
                $resultPaginado = $tableform->pagesHomeForm($data, $indiceInicio, $itensPorPagina);
            } else {
                $resultPaginado = array_slice($result, $indiceInicio, $itensPorPagina);
            }
        }
        $error = $tableform->error;

        if($result > 0){
        $this->view('homeform', [
            'result' => $resultPaginado, 'error' => $error, 'totalPaginas' => $totalPaginas,
            'paginaAtual' => $paginaAtual, 'data' => $data, 'Auth' => Auth::acess()
        ]);}
        else{
            $this->view('homeform', ['error' => $error,  'data' => $data, 'result' => $result]);
        }
    }
    
}
