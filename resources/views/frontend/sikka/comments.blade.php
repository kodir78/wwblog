<div class="post-comments post-comments-padding white-bg mt-70 mb-30" id="post-comments">
    <div class="section-title mb-20">
        <h2>{{ $post->commentsNumber('Comment') }}</h2>
    </div>
    <div class="latest-comments">
        <ul>
            @foreach ($postComments as $comment)
            <li>
                <div class="comments-box main-comments d-flex">
                    <div class="comments-avatar">
                        <img src="/assets/frontend/sikka/img/comments/comments_01.png" alt="">
                    </div>
                    <div class="comments-text">
                        <div class="avatar-name">
                            <h5>{{ $comment->author_name }} <small>{{ $comment->date }}</small></h5>
                        </div>
                        {{-- {{ $comment->body }} --}}
                        {!! $comment->body_html !!}
                        <a href="#">Reply</a>
                    </div>
                </div>
                {{-- <ul class="comments-reply">
                    <li>
                        <div class="comments-box d-flex">
                            <div class="comments-avatar">
                                <img src="/assets/frontend/sikka/img/comments/comments_02.png" alt="">
                            </div>
                            <div class="comments-text">
                                <div class="avatar-name">
                                    <h5>Angelina</h5>
                                </div>
                                <p>Norem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore worth.</p>
                                <a href="#">Reply</a>
                            </div>
                        </div>
                    </li>
                </ul> --}}
            </li>
            @endforeach
        </ul>
        <div class="row">
            <div class="col-xl-12 text-center">
                <nav class="course-pagination mb-30" aria-label="Page navigation example">
                    <ul class="pagination justify-content-start ">
                        {{$postComments->appends(Request::all())->links()}}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="post-comments-form">
        <div class="section-title mb-30">
            <h2>Leave a Reply</h2>
            <small><span class="required text-danger">*</span>
            <em>Indicates required fields</em></small>
        </div>
        @if(session('message'))
            <div class="alert alert-info">
                {{ session('message') }}
            </div>
        @endif
        {!! Form::open(['route' => ['blog.comments', $post->slug]])  !!}
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 required {{ $errors->has('author_name') ? 'has-error' : '' }}">
                <label for="author_name">Your Name <small class="text-danger">*</small></label>
                {!! Form::text('author_name', null, ['class' => 'form-control', 'placehoder' => 'Your Name']) !!}
                @if($errors->has('author_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('author_name') }}</strong>
                    </span>
                @endif
                
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 form-group required {{ $errors->has('author_email') ? 'has-error' : '' }}">
                <label for="author_email">Your Email <small class="text-danger">*</small></label>
                {!! Form::text('author_email', null, ['class' => 'form-control', 'placehoder' => 'Your Email']) !!}
                @if($errors->has('author_email'))
                <span class="help-block">
                    <strong>{{ $errors->first('author_email') }}</strong>
                </span>
                @endif
            </div>
            <div class="col-xl-4 col-lg-4  col-md-4">
                <label for="author_website">Website</label>
                {!! Form::text('author_url', null, ['class' => 'form-control', 'placehoder' => 'Website']) !!}
                
            </div>
            <div class="col-xl-12 form-group required {{ $errors->has('body') ? 'has-error' : '' }}">
                <label for="comments">Comment <small class="text-danger">*</small></label>
                {!! Form::textarea('body', null, ['row' => 6, 'class' => 'form-control']) !!}
                @if($errors->has('body'))
                    <span class="help-block">
                        <strong>{{ $errors->first('body') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-xl-12 form-group">
                <button class="btn blue-bg" type="submit">send</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>