function editCompanyRole(role_id) {

    let url = '/perfil/company-role/edit/' + role_id;
    let token = $('#token').val();
    let modal = $('#modalSiemple');
    console.log('Initial Open Modal Edit Company Role');

    $.post(url, {
        _token: token,
        role_id: role_id,
    },
        function (data) {
            console.log(data);

            console.log('Success Open Modal Edit Company Role');
            modal.modal('show');
            $("#content-temporal").empty();
            $("#content-temporal").html(data.view);
        });
}
