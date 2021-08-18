@if ($errors->any())
    <div class="text-center alert alert-danger my-4 p-2">
        <ul class="list-unstyled">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
