"use strict"

document.addEventListener('DOMContentLoaded', function (){
    const form = document.getElementsById('form');
    form.addEventListener('submit', formSend);

    async function formSend(e){
        e.preventDefault();
        let error = formValidate(form);
    }

    function formValidate(form){
        let error = 0;
        let formReq = document.querySelectorAll('._req');

        for (let index = 0; index<formReq.length; index++){
            const input = formReq[index];
            formRemoveError(input);

        }
    }



    function formAddError(input) {
        input.parentsElement.classList.add('_error');
        input.classList.add('_error');
    }
    function formRemoveError(input) {
        input.parentsElement.classList.remove('_error');
        input.classList.remove('_error');
    }

    function emailTest(input) {

    }
});