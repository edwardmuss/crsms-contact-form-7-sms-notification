(function ($) {

    $(document).ready(function () {
        $.ajax({
            url: 'https://restcountries.com/v3.1/all',
            type: 'GET',
            timeout: 0
        }).done(function (res) {
            if (res) {
                $.each(res, function (k, v) {
                    $('#countries').append(`<option value="${v.name.common}">${v.name.common}</option>`)
                })
            }
        })

        $('#countries').change(function () {
            // get country details by country name
            let country = $(this).val()
            $.ajax({
                url: `https://restcountries.com/v3.1/name/${country}?fullText=true`,
                type: 'GET',
                timeout: 0
            }).done(function (res) {
                $.each(res, function (k, v) {
                    $('#country_code').val(v.idd.root.replace('+', '') + v.idd.suffixes)
                })
            })
        })
    })
    
}(jQuery))
