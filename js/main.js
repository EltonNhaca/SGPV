//esta funcao e executada quando clicar o botao login
function validarNome(){
    var nome = document.getElementById("uname").value;
    var password = document.getElementById("psw").value;

    if (nome == "Chantel" && password == "1234") {
       alert("Login sucessfully");
       //window.location = "menuParque.html";
       return false;
    }else{
       alert("Tente Novamente!")
    }
}