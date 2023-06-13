function validaSenha(){
    let senha = document.querySelector("#senha").value;
    let senha2 = document.querySelector("#senha2").value;
    if (senha != senha2){
        alert('Senhas incompatíveis');
        return false;
    }
    return true;
}

function confirma(link){
    if (window.confirm("Confirma a exlusão deste registro?")){
        window.location.href = link;
    }
}