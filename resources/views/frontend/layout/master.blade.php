<?php
    if (!isset($lang) || $lang == null) {
        $lang = 'ru';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1,maximum-scale=1,minimum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @if(isset($metaTag) && !empty($metaTag))
        <title>{{ $metaTag['title'] }}</title>
    @else
        <title>{{ @$setting->meta_title[$lang] }}</title>
    @endif

    <link rel="icon" type="image/ico" href="/frontend/favicon.svg" sizes="32x32">
    <link rel="stylesheet" href="/frontend/styles/vendor.css">
    <link rel="stylesheet" href="/frontend/styles/main.css">
    <link rel="stylesheet" href="/frontend/styles/custom.css">
    <style>
        .pre-line {
            white-space: pre-line;
        }
        .services-card__num {
            min-width: 40px;
            margin-right: 10px;
        }
    </style>
    @yield('styles')
</head>
<body>

<div class="page-wrapper">
    @include('frontend.layout.header')
    @include('frontend.components.menu-mobile')
    <div class="page-content">
        @yield('section')
    </div>
    @include('frontend.layout.footer')
</div>

<script src="/frontend/scripts/jQuery-3.4.1.min.js"></script>
<script src="/frontend/scripts/vendor.min.js"></script>
<script src="/frontend/scripts/main.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    function ajaxErrorMessage(error) {
        if (typeof error.responseJSON === 'object' && error.responseJSON !== null) {

            if (error.responseJSON.errors !== 'undefined') {
                let errorMessage = '';
                for (const [key, value] of Object.entries(error.responseJSON.errors)) {
                    value.forEach(val => {
                        errorMessage+='<br>'+val
                    })
                }
                Swal.fire({
                    icon: 'error',
                    title: '@lang('static.error')',
                    html: '<div style="font-size: 16px">'+errorMessage+'</div>',
                    showConfirmButton: false,
                    timer: 3000
                })

                return
            }

            if (typeof error.responseJSON.message !== 'undefined') {
                Swal.fire({
                    icon: 'error',
                    title: '@lang('static.error')',
                    text: error.responseJSON.message,
                    showConfirmButton: false,
                    timer: 3000
                })
            }

            if (typeof error.responseJSON.error !== 'undefined') {
                Swal.fire({
                    icon: 'error',
                    title: '@lang('static.error')',
                    text: error.responseJSON.error,
                    showConfirmButton: false,
                    timer: 3000
                })
            }
        }
    }

    let formDisabled = false;

    $('.feedbackForm').on('submit', function (e) {
        e.preventDefault();

        if (!formDisabled) {
            formDisabled = true;
            let method = $(this).attr('method');
            let action = $(this).attr('action');
            let form = $(this);
            let form_data = form.serializeArray();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: action,
                method: method,
                dataType: 'json',
                data: form_data,
                success: function (data) {
                    if (data === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: '@lang('static.success')',
                            text: '@lang('static.success_text')',
                            showConfirmButton: false,
                            timer: 3000
                        })
                    }
                    form.trigger("reset");
                },
                error: function (error) {
                    ajaxErrorMessage(error);
                    form.trigger("reset");
                },
                complete: function () {
                    formDisabled = false
                }
            })
        }
    });

</script>

@include('frontend.sections.basket-modal')


</body>
</html>
