@if (Session::has('info') || Session::has('type'))
    <div class="container my-2">
        <div class="alert alert-{{ Session::get('type') }} col-md-8 offset-md-2 msj">
            {{ Session::get('message') }}
        </div>

    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger col-md-8 offset-md-2">
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endif



<script>
    window.addEventListener('DOMContentLoaded', (e) => {
        $('.msj').slideDown('slow');
        setTimeout(() => $('.msj').slideUp('slow'), 3000);
    });

</script>
