       
       

        {{-- <script src="js/app.js"></script> --}}
        
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