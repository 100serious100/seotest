//открытие и закрытие pop_up
const openPopUp = document.getElementById('open_pop_up');
const closePopUp = document.getElementById('pop_up_close');
const popUp = document.getElementById('pop_up');

openPopUp.addEventListener("click", function (event) {
    event.preventDefault();//убирает дефолтное поведение
    popUp.style.display = "block";
});

closePopUp.addEventListener("click", function (event) {
    popUp.style.display = "none";
});

//обязательные поля
document.getElementById('pop_up_form').addEventListener("submit", checkForm);//какое событие мы отслеживаем

function checkForm(event) {
    event.preventDefault();
    element = document.getElementById('pop_up_form');
    var name = element.name.value;
    var tel = element.tel.value;
    var fail = "";
    if (tel == "" || tel.length < 17) {
        fail = "Заполните поле с указанием номера телефона";
    } else if (name.length > 50) {
        fail = "Имя должно быть не более 50 символов";
    }
    if (fail != "") {
        alert(fail);
    } else {
        alert("Данные упешно отправлены");
        popUp.style.display = "none";
    }
}


//маска
window.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.tel').forEach(function (input) {
        var keyCode;

        function mask(event) {
            event.keyCode && (keyCode = event.keyCode);
            var pos = this.selectionStart;

            if (pos < 3 && event.keyCode !== 8 && event.keyCode !== 46) { // Allow backspace (8) and delete (46) keys
                event.preventDefault();
            }

            var matrix = "+7 (___) ___ ____",
                i = 0,
                def = matrix.replace(/\D/g, ""),
                val = this.value.replace(/\D/g, ""),
                new_value = matrix.replace(/[_\d]/g, function (a) {
                    return i < val.length ? val.charAt(i++) : a;
                });

            i = new_value.indexOf("_");
            if (i != -1) {
                i < 5 && (i = 3);
                new_value = new_value.slice(0, i);
            }

            var reg = matrix.substr(0, this.value.length).replace(/_+/g, function (a) {
                return "\\d{1," + a.length + "}";
            }).replace(/[+()]/g, "\\$&");

            reg = new RegExp("^" + reg + "$");

            if (!reg.test(this.value) || this.value.length < 5 || (keyCode > 47 && keyCode < 58)) {
                this.value = new_value;
            }

            if (event.type == "blur" && this.value.length < 5) {
                this.value = "";
            }

            // Fix cursor position
            if (pos < this.value.length) {
                this.setSelectionRange(pos, pos);
            }
        }

        function handleDelete(event) {
            if (this.selectionStart == 0 && this.selectionEnd == this.value.length) {
                this.value = "";
            }
        }

        function handleInput(event) {
            if (this.value === "") {
                this.value = "+7 ";
            }
        }

        input.addEventListener("input", mask, false);
        input.addEventListener("focus", mask, false);
        input.addEventListener("blur", mask, false);
        input.addEventListener("keydown", mask, false);
        input.addEventListener("keydown", handleDelete, false);
        input.addEventListener("input", handleInput, false);

    });
});