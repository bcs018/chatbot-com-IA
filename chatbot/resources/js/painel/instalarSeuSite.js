(function () {
    const modalElement = document.getElementById('exampleModal');
    const botsSelect = document.getElementById('bots');
    const contentShow = document.getElementById('contentShowId');

    // Só executa se o modal existir na página
    if (modalElement) 
    {
        modalElement.addEventListener('show.bs.modal', function () {
            contentShow.hidden = true;
            getBots();
        });
    }

    // Exibe o código quando um bot for selecionado
    botsSelect?.addEventListener('change', function () {
        if (!this.value) 
        {
            contentShow.hidden = true;
            return;
        }

        const showScript = document.getElementById('showScript');

        showScript.textContent =
            '<script src="http://127.0.0.1:8000/js/widget/widget.js" data-puplic-key="pk_key_' +
            this.value +
            '"></script>';

        contentShow.hidden = false;
    });
})();

async function getBots() 
{
    try 
    {
        const token = document.querySelector('meta[name="csrf-token"]')?.content;

        const res = await fetch('/dashboard/bots/instalar-no-site/list', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            }
        });

        if (!res.ok) 
        {
            throw new Error(`Erro HTTP: ${res.status}`);
        }

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
        console.error('Erro ao carregar bots:', err);
        alert('Erro ao carregar os bots.');
    }
}
