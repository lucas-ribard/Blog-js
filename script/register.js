

const btnLogin = document.getElementById('subLogin');
const btnRegister = document.getElementById('subRegister');

const loginForm1 = document.getElementById('login');
const registerForm1 = document.getElementById('register');




/*
//fetch login form

btnLogin.addEventListener("click", (e)=>{
    e.preventDefault();
    let formData = new FormData(loginForm1)

    fetch('register.php', {
        method: "POST",
        body: formData
    })
    .then(response=>{
        return response.text();
    })
})



//fetch register form

btnRegister.addEventListener("click", (e)=>{
    e.preventDefault();
    const formData = new FormData(registerForm1)
    //console.log(Array.from(formData))
    fetch('register.php', {
        method: "POST",
        body: formData
    })
    .then(response=>{
        //console.log(response)
        return response.text();
    })
})
*/


function PostLogin(){
    e.preventDefault();
    let formData = new FormData(loginForm1)

    fetch('register.php', {
        method: "POST",
        body: formData
    })
    .then(response=>{
        return response.text();
    })
}




function PostRegister(){
    
    const formData = new FormData(registerForm1)
    //console.log(Array.from(formData))
    fetch('register.php', {
        method: "POST",
        body: formData
    })
    .then(response=>{
        //console.log(response)
        return response.text();
    })
}

function PostCommentaires(){
    
    const formData = new FormData(registerForm1)
    //console.log(Array.from(formData))
    fetch('register.php', {
        method: "GET",
        body: formData
    })
    .then(response=>{
        //console.log(response)
        return response.text();
    })
}