import * as bootstrap from 'bootstrap';

(function () {

    document.getElementById('instalarNoSite').addEventListener('click', function(event) {
        console.log(this.id);

        getBots();

        const modalElement = document.getElementById('exampleModal');

        const modal = new bootstrap.Modal(modalElement);

        modal.show()
    });
})()

async function getBots()
{
    try {
        const res = await fetch('/dashboard/bots/instalar-no-site/list', {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Authorization": "Bearer " + session
            },
            body: JSON.stringify({
                message: text,
                url: window.location.href
            })
        });

        const data = await res.json();

        console.log(data);

        // typingEl.remove();
        // addMessage('🤖 ' + data.reply || "Sem resposta", "bot");

    } catch (err) {
        console.log("🤖 Erro ao conectar com o servidor. "+err);
    }
}