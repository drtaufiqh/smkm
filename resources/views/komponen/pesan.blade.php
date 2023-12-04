@if (Session::has('success') || Session::has('failed')|| $errors->any())
    <div class="mx-3 my-0 p-0" id="notification">
        @if (Session::has('success'))
            <p class="mx-0 my-2 p-3 alert alert-success">{{ Session::get('success') }}</p>
        @endif

        @if (Session::has('failed'))
            <p class="mx-0 my-2 p-3 alert alert-danger">{{ Session::get('failed') }}</p>
        @endif

        @if ($errors->any())
            <div class="mx-0 my-2 p-3 alert alert-danger">
                <ul class="p-0 my-0 mx-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <script>
        setTimeout(function() {
            document.getElementById('notification').style.display = 'none';
        }, 2500);
    </script>
@endif
