       
       

        {{-- <script src="js/app.js"></script> --}}
        {{-- <script>
            window.Laravel =  {!! json_encode([
                'csrfToken' => csrf_token(),
            ]); !!}
    
            window.axios.defaults.headers.common = {
                'X-CSRF-TOKEN': window.Laravel.csrfToken,
                'X-Requested-With': 'XMLHttpRequest'
            };
        </script> --}}

        
        <script>
        
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
        </script>
        {{-- <script src="js/app.js"></script> --}}
        
    </body>
</html>