const FormLogin = document.getElementById('form-login');

FormLogin.addEventListener('submit', (e) => {
    e.preventDefault();
    LoginUser();
})
const showPasswordButton = document.getElementById('show-password');
showPasswordButton.addEventListener('click', ShowToggle);

function ShowToggle(){
    const passwordInput = document.getElementById('password');
    if(passwordInput.type === 'password'){
        passwordInput.type = 'text';
        showPasswordButton.innerText = 'Ocultar Senha';
    } else {
        passwordInput.type = 'password';
        showPasswordButton.innerText = 'Mostrar Senha';
    }
}

async function LoginUser(){
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    const response = await fetch('/EstudosEmGrupo/api/login',{
        method:'POST',
        body: JSON.stringify({'EMAIL':email,'SENHA_HASH':password}),
        headers:{
            'Content-Type':'application/json'
        }
    })
    const data = await response.json();
    console.log(data);
}