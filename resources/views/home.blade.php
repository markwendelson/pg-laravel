@extends('layouts.app')

@section('content')
<div id="user-form" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged as!
                    <p>{{ auth()->user()->name}}</p>

                    <h5>Comments</h5>
                    <ul>
                        @foreach($user as $post)
                            @foreach($post->comments as $comments)
                                <li>{{$comments->comment}}</li>
                            @endforeach
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @include('includes.side-bar')
    </div>
</div>
@endsection
@section('extra_scripts')
<script type="text/javascript">
    new Vue({
        el: '#user-form',
            data () {
                return {
                    comments: @json(`{{$user}}`),
                    isLoading: false,
                    users: @json(`{{ $users }}`),
                }
            },
            mounted () {
            },
            created() {
            },
            methods: {
            },
            watch: {
            },
            computed: {
            },
    })
</script>
@endsection
