$(document).ready(
    function () {
        $('input.changeRole').change(function (e) {
            e.preventDefault();
            let target = e.target;
            let userinfo = target.closest(".userInfo");
            let userId = userinfo.getAttribute('userId');
            let roleName = target.getAttribute('name');
            let checkbox = 'off';
            if ($(this).prop('checked')) {
                checkbox = 'on';
            }
            let data = `userId=${userId}&roleName=${roleName}&checkbox=${checkbox}`;
            $.ajax({
                type: "POST",
                url: '/admin',
                data: data,
            });
        });
        $('input[type="checkbox"]').change(function (e) {
            e.preventDefault();

            $(this).closest('.changeRole').submit();
        });
    }
)
