const password=document.getElementById('password');
const img=document.getElementById('img');


function mostrar(){

    if(password.type=='password'){
        password.type="text";
        img.setAttribute("src", "/img/olho (7).png");
}else{
    password.type="password";
    img.setAttribute("src", "/img/olho.png");
}
}