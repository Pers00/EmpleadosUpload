(function() { // evitar el codigo tenga interferencias, se modifique. Es como si fuese un private, se aisla del resto de javascrpit

    // delete metodo 3 se dispara el evento con show.bs.modal ( Mejor el tercero )
    let modalDelete = document.getElementById('modalDelete');
    let deletePuesto = document.getElementById('deletePuesto');
    modalDelete.addEventListener('show.bs.modal', function(event) {
        // nos dice quien ha abierto la ventana (el enlace con el que ha hecho link)
        let element = event.relatedTarget;
        let action = element.getAttribute('data-url');
        let name = element.dataset.name;
        if (deletePuesto) {
            deletePuesto.innerHTML = name;
        }
        let form = document.getElementById('modalDeleteResourceForm');
        // su action quiere que sea su actio
        form.action = action;
    });

    // delete metodo 3 se dispara el evento con show.bs.modal ( Mejor el tercero )
    let modalDelete1 = document.getElementById('modalDelete1');
    let deletePuesto1 = document.getElementById('deletePuesto1');
    modalDelete1.addEventListener('show.bs.modal', function(event) {
        // nos dice quien ha abierto la ventana (el enlace con el que ha hecho link)
        let element = event.relatedTarget;
        let action = element.getAttribute('data-url');
        let name = element.dataset.name;
        if (deletePuesto1) {
            deletePuesto1.innerHTML = name;
        }
        let form = document.getElementById('modalDeleteResourceForm1');
        // su action quiere que sea su actio
        form.action = action;
    });


})();
