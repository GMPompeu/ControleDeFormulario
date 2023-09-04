// -------------------------------------------GUICHES BUS--------------------------------------------------------

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('add-content').addEventListener('click', function (a) {
        a.preventDefault();
        var campos = document.getElementById('content-include');


        var newCamp0 = document.createElement('div');
        newCamp0.innerHTML = '<legend></legend>'

        var newCamp1 = document.createElement('div');
        newCamp1.innerHTML = '<label for="apurado"><b>Prata</b></label><input type="number" name="bu_prata_apurado[]" id="apurado1" min="0" class="obrigatorio">'

        var newCamp2 = document.createElement('div');
        newCamp2.innerHTML = '<label for="apurado"><b>Estudante</b></label><input type="number" name="bu_estudante_apurado[]" id="apurado" min="0" class="obrigatorio">'

        var newCamp3 = document.createElement('div');
        newCamp3.innerHTML = '<label for="apurado"><b>Prata Personalizado</b></label><input type="number" name="bu_prata_personalizado[]" id="perso" min="0" class="obrigatorio"><label for="apurado"><b>Estudante Personalizado</b></label><input type="number" name="bu_estudante_personalizado[]" id="perso" min="0" class="obrigatorio">'

        var newCamp4 = document.createElement('hr');

        var newCamp5 = document.createElement('div');
        newCamp5.innerHTML = '<label for="funcionario"><b>Nome do Funcionário:</b></label><input type="text" name="bu_funcionario[]" id="funcionario" class="obrigatorio" size="25">&nbsp;<label for="idFun"><b>ID:</b></label><input type="text" name="bu_idFun[]" id="idFun" class="obrigatorio" maxlength="5" size="10">'

        campos.insertBefore(newCamp0, document.getElementById('button-add'));
        campos.insertBefore(newCamp1, document.getElementById('button-add'));
        campos.insertBefore(newCamp2, document.getElementById('button-add'));
        campos.insertBefore(newCamp3, document.getElementById('button-add'));
        campos.insertBefore(newCamp4, document.getElementById('button-add'));
        campos.insertBefore(newCamp5, document.getElementById('button-add'));

    });
});

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('add-content-pasta').addEventListener('click', function (b) {
        b.preventDefault();
        var camposPastas = document.getElementById('content_pastas');


        var newPasta0 = document.createElement('div');
        newPasta0.innerHTML = '<legend></legend>'

        var newPasta1 = document.createElement('div');
        newPasta1.innerHTML = '<label for="apurado"><b>Prata</b></label><input type="number" name="pasta_prata_apurado[]" id="apurado1" min="0" class="obrigatorio" required>'

        var newPasta2 = document.createElement('div');
        newPasta2.innerHTML = '<label for="apurado"><b>Estudante</b></label><input type="number" name="pasta_estudante_apurado[]" id="apurado" min="0" class="obrigatorio" required>'

        var newPasta3 = document.createElement('div');
        newPasta3.innerHTML = ' <label for="apurado"><b>Prata Personalizado</b></label><input type="number" name="pasta_prata_personalizado[]" id="perso" min="0" class="obrigatorio" required><label for="apurado"><b>Estudante Personalizado</b></label><input type="number" name="pasta_estudante_personalizado[]" id="perso" min="0" class="obrigatorio" required>'

        var newPasta4 = document.createElement('hr');

        var newPasta5 = document.createElement('div');
        newPasta5.innerHTML = '<label for="funcionario"><b>Nome do Funcionário:</b></label><input type="text" name="pasta_funcionario[]" id="funcionario" class="obrigatorio" size="25" required>&nbsp;<label for="idFun"><b>ID:</b></label><input type="text" name="pasta_idFun[]" id="idFun" class="obrigatorio" maxlength="5" size="10" required>'

        camposPastas.insertBefore(newPasta0, document.getElementById('pastas-content'));
        camposPastas.insertBefore(newPasta1, document.getElementById('pastas-content'));
        camposPastas.insertBefore(newPasta2, document.getElementById('pastas-content'));
        camposPastas.insertBefore(newPasta3, document.getElementById('pastas-content'));
        camposPastas.insertBefore(newPasta4, document.getElementById('pastas-content'));
        camposPastas.insertBefore(newPasta5, document.getElementById('pastas-content'));
    });
});

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('add-content-cofre').addEventListener('click', function (c) {
        c.preventDefault();
        var campoCofre = document.getElementById('content-cofre');

        var newCofre0 = document.createElement('div');

        var newCofre1 = document.createElement('div');
        newCofre1.innerHTML = '<hr>'

        var newCofre2 = document.createElement('div');
        newCofre2.innerHTML = '<label for="apurado"><b>Prata</b></label><input type="number" name="cof_prata_personalizado[]" id="sistema" min="0" class="obrigatorio"><label for="apurado"><b>Estudante</b></label><input type="number" name="cof_estudante_personalizado[]" id="sistema" min="0" class="obrigatorio">'

        campoCofre.insertBefore(newCofre0, document.getElementById('cofre-content'));
        campoCofre.insertBefore(newCofre1, document.getElementById('cofre-content'));
        campoCofre.insertBefore(newCofre2, document.getElementById('cofre-content'));

    })
})
