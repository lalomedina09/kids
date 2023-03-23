function editBranch(branch_id) {

    let url = '/perfil/branch/edit/' + branch_id;
    let token = $('#token').val();
    let modal = $('#modalSiemple');
    console.log('Initial Open Modal Edit Branch');

    $.post(url, {
        _token: token,
        branch_id: branch_id,
    },
        function (data) {
            console.log(data);

            console.log('Success Open Modal Edit Branch');
            modal.modal('show');
            $("#content-temporal").empty();
            $("#content-temporal").html(data.view);
        });
}
