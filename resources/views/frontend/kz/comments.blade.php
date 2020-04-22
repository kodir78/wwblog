<div class="col-12" id="post-comments">
    <!-- Blog Comments -->
    <div class="blog-comments">
        <div class="bottom-title">
            <h2>{{ $post->commentsNumber('Comment') }}</h2>
        </div>
        <div class="comments-body">
            <!-- Single Comments -->
            @foreach ($postComments as $comment)
            <div class="single-comments">
                <div class="main">
                    <div class="head">
                        <img src="/assets/frontend/kz/images/author1.jpg" alt="#"/>
                    </div>
                    <div class="body">
                        <h4>{{ $comment->author_name }}</h4>
                        <span class="meta">Posted <i class="fa fa-calendar"></i> {{ $comment->date }}</span>
                        {!! $comment->body_html !!}
                        <a href="#" class="reply">Replay</a>
                    </div>
                </div>
                <!-- Comment Reply -->
                {{-- <div class="comment-list">
                    <div class="head">
                        <img src="/assets/frontend/kz/images/author2.jpg" alt="#"/>
                    </div>
                    <div class="body">
                        <h4>Marry Jonael</h4>
                        <span class="meta">Posted at<i class="fa fa-clock-o"></i>05:30pm,<i class="fa fa-calendar"></i>25 July, 2018</span>
                        <p>Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas</p>
                        <a href="#" class="reply">Replay</a>
                    </div>
                </div> --}}
                <!--/ End Comment Reply -->
            </div>
            @endforeach
            <!--/ End Single Comments -->
            											
        </div>
    </div>
    <!--/ End Blog Comments -->
    <div class="row ">
        <div class="col-12 ">
        <!-- Pagination -->
        <div class="pagination-main" style="padding:30px;">
            {{$postComments->appends(Request::all())->links()}}
        </div>
        <!--/ End Pagination -->
    </div>
</div>	
</div>
<div class="col-12">
    <!-- Comments Form -->
    <div class="comments-form">
        <div class="bottom-title">
            <h2>Leave a comment</h2>
            <small><span class="required text-danger">*</span>
                <em>Indicates required fields</em></small>
        </div>
        @if(session('message'))
            <div class="alert alert-info">
                {{ session('message') }}
            </div>
        @endif
        <!-- Comment Form -->
        {!! Form::open(['route' => ['blog.comments', $post->slug]])  !!}
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12 required {{ $errors->has('author_name') ? 'has-error' : '' }}">
                    <div class="form-group">
                        <label for="author_name">Your Name<span>*</span></label>
                        {!! Form::text('author_name', null, ['class' => 'form-control', 'placehoder' => 'Your Name']) !!}
                @if($errors->has('author_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('author_name') }}</strong>
                    </span>
                @endif
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12 required {{ $errors->has('author_email') ? 'has-error' : '' }}">
                    <div class="form-group">
                        <label for="author_email">Your Email<span>*</span></label>
                        {!! Form::text('author_email', null, ['class' => 'form-control', 'placehoder' => 'Your Email']) !!}
                @if($errors->has('author_email'))
                <span class="help-block">
                    <strong>{{ $errors->first('author_email') }}</strong>
                </span>
                @endif
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="form-group">
                        <label for="author_website">Your Website</label>
                {!! Form::text('author_url', null, ['class' => 'form-control', 'placehoder' => 'Website']) !!}
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group required {{ $errors->has('body') ? 'has-error' : '' }}"">
                        <label for="comments">Your Comment<span>*</span></label>
                        {!! Form::textarea('body', null, ['row' => 6, 'class' => 'form-control']) !!}
                @if($errors->has('body'))
                    <span class="help-block">
                        <strong>{{ $errors->first('body') }}</strong>
                    </span>
                @endif
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group button">	
                        <button type="submit" class="btn primary animate">Submit Comment</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        <!--/ End Comment Form -->
    </div>
    <!--/ End Comments Form -->
</div>