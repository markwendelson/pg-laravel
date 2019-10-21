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
                    <div class="row">
                        <div class="form-control-group">
                            <label for="comment">Submit Comment</label>
                            <textarea name="comment" id="comment" cols="80" rows="5" class="form-control" v-model="comment"></textarea>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <button type="submit" class="btn btn-primary" @click="submit">Post</button>
                    </div>
                </div>
            </div>
        </div>
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
                    comment: '',
                    user_id: `{{ $user[0]->id }}`
                }
            },
            mounted () {
            },
            created() {
            },
            methods: {
                submit() {
                    var app = this
                    let routes = '{{ route('comment.store') }}'
                    let params = {
                        user_id: app.user_id,
                        comment : app.comment
                    }
                    axios.post(routes, params)
                    .then((response) => {
                        window.location.reload()
                    })
                }
            },
            watch: {
            },
            computed: {
            },
    })
</script>
@endsection
