<div class="post-comments post-comments-padding white-bg mt-70 mb-30" id="post-comments">
    <div class="section-title mb-20">
        <h2>{{ $post->commentsNumber('Comment') }}</h2>
    </div>
    <div class="latest-comments">
        <ul>
            @foreach ($post->comments as $comment)
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
    </div>
    <div class="post-comments-form">
        <div class="section-title mb-30">
            <h2>Leave a Reply</h2>
        </div>
        <form action="#">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <input type="text" placeholder="Your Name">
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <input type="text" placeholder="Your Email">
                </div>
                <div class="col-xl-4 col-lg-4  col-md-4">
                    <input type="text" placeholder="Your Email">
                </div>
                <div class="col-xl-12">
                    <textarea name="comments" id="comments" cols="30" rows="10" placeholder="Your Comments"></textarea>
                    <button class="btn blue-bg" type="submit">send reply</button>
                </div>
            </div>
        </form>
    </div>
</div>