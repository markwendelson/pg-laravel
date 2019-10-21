<div class="col-md-4">
    <div class="card">
        <div class="card-header">Users</div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
            @foreach ($users as $user)
                <li class="list-group-item"><a href="/user/{{ $user->id }}">{{ $user->name }}</a>
                    <div class="pull-right">
                    </div>
                </li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
