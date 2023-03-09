const btnUpdate = document.getElementById('subUpdate');
const updateForm = document.getElementById('update');


//fetch for update

btnUpdate.addEventListener("click", (e)=>{
    e.preventDefault();
    const formData = new FormData(updateForm)
    // console.log(Array.from(formData))
    fetch('update.php', {
        method: "POST",
        body: formData
    })
    .then(response=>{
        // console.log(response)
        return response.text();
    })
})