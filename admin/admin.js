/*
|--------------------------------------------------------------------------
| TESTAR CONEXÃO COM API
|--------------------------------------------------------------------------
*/

document.getElementById("leadyia-test")?.addEventListener("click", function(){

    fetch(ajaxurl + "?action=leadyia_test_connection")
    .then(r => r.json())
    .then(data => {

        const el = document.getElementById("leadyia-status")

        if(data.success){

            el.innerHTML = "✅ Conectado com sucesso"

        }else{

            el.innerHTML = "❌ Erro: " + data.data

        }

    })
})

/*
|--------------------------------------------------------------------------
| REGISTRAR NOVA CONTA
|--------------------------------------------------------------------------
*/

document.getElementById("leadyia-register-btn")?.addEventListener("click", async () => {

    const name = document.getElementById("leadyia-name")?.value
    const email = document.getElementById("leadyia-email")?.value
    const password = document.getElementById("leadyia-password")?.value

    const form = new FormData()

    form.append("action","leadyia_register")
    form.append("name",name)
    form.append("email",email)
    form.append("password",password)

    const r = await fetch(ajaxurl,{
        method:"POST",
        body:form
    })

    const data = await r.json()

    const result = document.getElementById("leadyia-result")

    if(data.success){

        result.innerHTML = "✅ Conta criada com sucesso"

        setTimeout(() => {
            location.reload()
        },1500)

    }else{

        result.innerHTML = "❌ Erro: " + data.data

    }

})