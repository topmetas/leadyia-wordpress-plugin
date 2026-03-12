document.addEventListener("DOMContentLoaded", function () {

  const btn = document.getElementById("leadyia-test");
  const status = document.getElementById("leadyia-status");

  if (!btn) return;

  btn.addEventListener("click", function () {

    status.innerHTML = "Testando conexão...";

    fetch(ajaxurl + "?action=leadyia_test_connection")
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          status.innerHTML = "✅ Conectado com sucesso!";
        } else {
          status.innerHTML = "❌ Erro: " + data.data;
        }
      });
  });

});
