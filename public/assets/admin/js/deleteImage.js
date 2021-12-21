(function() {
    let modalDelete1 = document.getElementById('modalDelete2');
    let deletePuesto1 = document.getElementById('deletePuesto2');
    modalDelete1.addEventListener('show.bs.modal', function(event) {
        // nos dice quien ha abierto la ventana (el enlace con el que ha hecho link)
        let element = event.relatedTarget;
        let action = element.getAttribute('data-url');
        let name = element.dataset.name;
        if (deletePuesto1) {
            deletePuesto1.innerHTML = name;
        }
        let form = document.getElementById('modalDeleteResourceForm2');
        // su action quiere que sea su actio
        form.action = action;
    });


})();
