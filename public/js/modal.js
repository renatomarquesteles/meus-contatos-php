$(document).ready(function() {
    $('#contactModal').on('show.bs.modal', function(event) {
        const contactTableRow = $(event.relatedTarget);

        const name = contactTableRow.data('name');
        const phone = contactTableRow.data('phone');
        const email = contactTableRow.data('email');
        const zipcode = contactTableRow.data('zipcode');
        const street = contactTableRow.data('street');
        const number = contactTableRow.data('number');
        const complement = contactTableRow.data('complement');
        const neighborhood = contactTableRow.data('neighborhood');
        const city = contactTableRow.data('city');
        const state = contactTableRow.data('state');

        const modal = $(this);
        modal.find('.modal-title').text(name);
        modal.find('.modal-body #phone').text(phone);
        modal.find('.modal-body #email').text(email);
        modal.find('.modal-body #zipcode').text(zipcode);
        modal.find('.modal-body #street').text(street);
        modal.find('.modal-body #number').text(number);
        modal.find('.modal-body #neighborhood').text(neighborhood);
        modal.find('.modal-body #city').text(city);
        modal.find('.modal-body #state').text(state);
        modal
            .find('.modal-body #complement')
            .text(complement && 'Complemento: ' + complement);
    });

    $('#editContactBtn').click(function (event) {
        event.stopPropagation();
    });

    $('#removeContactBtn').click(function (event) {
        event.stopPropagation();
    });
});
