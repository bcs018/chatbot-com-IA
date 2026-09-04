(function () {
    // pega o script atual
    const script = document.currentScript;
    var session = '';

    const PK_KEY = script.getAttribute("data-puplic-key");
    const API_URL = "http://127.0.0.1:8000/api/v1/chat";
    const API_URL_SES = "http://127.0.0.1:8000/api/v1/session";

    getSession();

    // CSS do widget
    const style = document.createElement("style");
    style.innerHTML = `
                        #ai-chat-btn {
                        position: fixed;
                        bottom: 20px;
                        right: 20px;
                        width: 55px;
                        height: 55px;
                        border-radius: 50%;
                        background: #111;
                        color: #fff;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        cursor: pointer;
                        font-size: 22px;
                        z-index: 999999;
                        }

                        #ai-chat-box {
                        position: fixed;
                        bottom: 90px;
                        right: 20px;
                        width: 320px;
                        height: 420px;
                        background: #fff;
                        border-radius: 12px;
                        box-shadow: 0 10px 40px rgba(0,0,0,0.2);
                        display: none;
                        flex-direction: column;
                        overflow: hidden;
                        z-index: 999999;
                        font-family: Arial;
                        }

                        #ai-chat-header {
                        background: #111;
                        color: #fff;
                        padding: 10px;
                        font-size: 14px;
                        }

                        #ai-chat-messages {
                        flex: 1;
                        padding: 10px;
                        overflow-y: auto;
                        font-size: 13px;
                        }

                        .msg-user {
                        margin: 5px 0 14px;
                        color: #fff;
                        background-color: #000;
                        padding: 10px; 
                        border-radius: 8px;
                        max-width: 50%;
                        margin-left: auto;
                        }

                        .msg-bot {
                        text-align: left;
                        margin: 5px 0 14px;
                        color: #111;
                        background-color: #c7c7c7;
                        padding: 10px; 
                        border-radius: 8px;
                        max-width: 50%;
                        }

                        #ai-chat-input {
                        display: flex;
                        border-top: 1px solid #ddd;
                        }

                        #ai-chat-input input {
                        flex: 1;
                        border: none;
                        padding: 10px;
                        outline: none;
                        }

                        #ai-chat-input button {
                        border: none;
                        background: #111;
                        color: #fff;
                        padding: 10px 15px;
                        cursor: pointer;
                        }
                    `;
    document.head.appendChild(style);

    // botão
    const btn = document.createElement("div");
    btn.id = "ai-chat-btn";
    btn.innerHTML = "💬";
    document.body.appendChild(btn);

    // box
    const box = document.createElement("div");
    box.id = "ai-chat-box";
    box.innerHTML = `
                        <div id="ai-chat-header">Atendimento IA</div>
                        <div id="ai-chat-messages"></div>
                        <div id="ai-chat-input">
                        <input type="text" id="ai-input" placeholder="Digite sua pergunta..." />
                        <button id="ai-send">Enviar</button>
                        </div>
                    `;
    document.body.appendChild(box);

    const messages = document.getElementById("ai-chat-messages");
    const input = document.getElementById("ai-input");

    btn.onclick = () => {
        box.style.display = box.style.display === "flex" ? "none" : "flex";
        input.focus();
    };

    box.style.display = "none";
    box.style.flexDirection = "column";

    function addMessage(text, type) {
        const div = document.createElement("div");
        div.className = type === "user" ? "msg-user" : "msg-bot";
        div.innerText = text;
        messages.appendChild(div);
        messages.scrollTop = messages.scrollHeight;
    }

    async function sendMessage() {
        const text = input.value.trim();
        if (!text) return;

        addMessage('🧒🏽 ' + text, "user");
        input.value = "";

        addMessage("🤖 digitando...", "bot");

        const typingEl = messages.lastChild;

        try {
            const res = await fetch(API_URL, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Authorization": "Bearer " + API_KEY
                },
                body: JSON.stringify({
                    message: text,
                    url: window.location.href
                })
            });

            const data = await res.json();

            typingEl.remove();
            addMessage('🤖 ' + data.reply || "Sem resposta", "bot");

        } catch (err) {
            typingEl.remove();
            addMessage("🤖 Erro ao conectar com o servidor.", "bot");
        }
    }

    async function getSession()
    {
        try {
            const res = await fetch(API_URL_SES, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                // body: JSON.stringify({
                //     message: text,
                //     url: window.location.href
                // })
            });

            const data = await res.json();
            console.log(data.session_id)
            session = data.session_id;
        } catch (err) {
            typingEl.remove();
            addMessage("🤖 Erro ao conectar com o servidor, sessão inválida.", "bot");
        }
    }

    document.getElementById("ai-send").onclick = sendMessage;
    input.addEventListener("keypress", function (e) {
        if (e.key === "Enter") sendMessage();
    });

})();
