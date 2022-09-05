(function(win, doc) {
    'use strict';

    function confirmDel(event) {
        event.preventDefault();
        let location = doc.getElementById('location').value;

        let token = doc.getElementsByName('_token')[0].value;
        if(confirm('Deseja excluir esse item')) {
            let ajax = new XMLHttpRequest;
            ajax.open("DELETE", event.target.href);
            ajax.setRequestHeader('X-CSRF-TOKEN', token);
            ajax.onreadystatechange=function() {
                if(ajax.readyState === 4 && ajax.status === 200) {
                    console.log('OK');
                    win.location.href=location;
                }
            }
            ajax.send();
        }

        return false;
    }

    if(doc.querySelector('.del-product')) {
        let btn = doc.querySelectorAll('.del-product');
        console.log(btn);
        for(let i = 0; i<btn.length; i++) {
            btn[i].addEventListener('click', confirmDel, false);
        }
    }

})(window, document)