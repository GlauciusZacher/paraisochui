let form;
const formContainer = document.querySelector("#formContainer");

printForm();

function printForm(mes = "", nam = "", mai = "") {
  let frm =
    `<p>O sírvase rellenar el siguiente formulario:</p><form name="contacto" id="contacto">
  <label for="mens">Escriba su consulta</label>
  <textarea name="mens" id="mens">` +
    mes +
    `</textarea>
  <label for="nombre">Nombre:</label>
  <input type="text" name="nombre" id="nombre" value="` +
    nam +
    `">
  <label for="email">E-mail:</label>
  <input type="email" name="email" id="email" value="` +
    mai +
    `">
  </form>`;
  formContainer.innerHTML = frm;
  const frmSubmit = document.createElement("input");
  frmSubmit.type = "submit";
  frmSubmit.name = "submit";
  frmSubmit.id = "submit";
  frmSubmit.value = "Enviar";

  form = document.querySelector("#contacto");
  form.appendChild(frmSubmit);

  form.addEventListener("submit", (event) => {
    event.preventDefault();
    frmSubmit.disabled = true;
    sendData();
  });
}

function printMess(errors = "", classMess = "") {
  formContainer.innerHTML = `<div class="contact-card"><div><p class="` + classMess + `">` + errors + `</p></div></div>`;
  if (classMess == "success") formContainer.style.marginBottom = "0";
}

async function sendData() {
  const formData = new FormData(form);
  //console.log(formData);

  try {
    const response = await fetch("./app/form.php", {
      method: "POST",
      body: formData,
    });
    //console.log(response.text());
    let res = await response.json();
    console.log("---" + res.status);
    if (res.status == 2 || res.status == 1) {
      printMess(res.response, "alert");
      const btnBack = document.createElement("button");
      btnBack.className = "btn";
      btnBack.innerHTML = "<< Volver";
      btnBack.addEventListener("click", function () {
        printForm(res.message, res.name, res.email);
      });
      formContainer.appendChild(btnBack);
    } else {
      console.log(res.response);
      printMess(res.response, "success");
    }
  } catch (e) {
    console.error(e);
  }
}
