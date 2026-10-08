(function () {

    document.getElementById('instalarNoSite1').addEventListener('click', function(event) {
        document.getElementById('contentShowId').setAttribute('hidden', true);

        getBots();

        const modalElement = document.getElementById('exampleModal');

        const modal = new bootstrap.Modal(modalElement);

        modal.show()
    });

    document.getElementById('instalarNoSite2').addEventListener('click', function(event) {
        document.getElementById('contentShowId').setAttribute('hidden', true);

        getBots();

        const modalElement = document.getElementById('exampleModal');

        const modal = new bootstrap.Modal(modalElement);

        modal.show()
    });

    document.getElementById('bots').addEventListener('change', function(event){
        console.log('Selecionou:', this.value)

        const showScript = document.getElementById('showScript');

        showScript.textContent ='<script src="http://127.0.0.1:8000/js/widget/widget.js" data-puplic-key="pk_key_'+this.value+'"></script>';
        document.getElementById('contentShowId').removeAttribute('hidden');
    });
})()

async function getBots()
{
    try 
    {
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const res = await fetch('/dashboard/bots/instalar-no-site/list', {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                'X-CSRF-TOKEN': token
            },
        });

        const data = await res.json();

        const select = document.getElementById('bots');

        select.innerHTML = '';

        const option = document.createElement('option');
        option.value = '';
        option.textContent = 'Selecione um bot';

        select.appendChild(option);

        data.forEach(bot => {
            const option = document.createElement('option');

            option.value = bot.id;
            option.textContent = bot.nome;

            select.appendChild(option);
        });
    } 
    catch (err) 
    {
        alert("Erro ao conectar com o servidor. " + err);
    }
}