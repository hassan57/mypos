@if (session('success'))

    <script>
        new Noty({
            type: 'success',
            layout: 'topRight',
            theme: 'nest',
            text: "{{ session('success') }}",
            timeout: 2000,
            killer: true
        }).show();
    </script>

@endif
