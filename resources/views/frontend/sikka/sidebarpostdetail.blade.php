<div class="col-xl-4 col-lg-4">
    <div class="courses-details-sidebar-area">
        {{-- <div class="widget mb-40 white-bg">
            <div class="sidebar-form">
                <form action="{{ route('blog.search') }}">
                    <input placeholder="Cari..." type="text" name="keyword">
                    <button type="submit" value="filter" >
                        <i class="ti-search"></i>
                    </button>
                </form>
            </div>
        </div> --}}
        <div class="widget mb-40 widget-padding white-bg">
            <h4 class="widget-title">Categories</h4>
            <div class="widget-link">
                <ul class="sidebar-link">
                    @foreach ($categories as $category)
                    <li>
                        <a href="{{ route('category', $category->slug) }}">{{ $category->title }}</a>
                        <span>{{ $category->posts->count() }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="widget mb-40 widget-padding white-bg">
            <h4 class="widget-title">Populer Post</h4>
            <div class="sidebar-rc-post">
                <ul>
                   @foreach ($popularPosts as $post)
                    <li>
                        <div class="sidebar-rc-post-main-area d-flex mb-20">
                            <div class="rc-post-thumb">
                                <a href="{{ route('blog.show', $post->slug) }}">
                                    <img src="{{$post->imageThumbUrl}}" alt="">
                                </a>
                            </div>
                            <div class="rc-post-content">
                                <h4>
                                    <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                                </h4>
                                <div class="widget-advisors-name">
                                    <span>{{ $post->date }}</span></span>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="widget mb-40 widget-padding white-bg">
            <h4 class="widget-title">Tags</h4>
            <div class="widget-tags clearfix">
                <ul class="sidebar-tad clearfix">
                    @foreach ($tags as $tag)
                    <li>
                        <a href="#">{{ $tag->title }}</a>
                    </li> 
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="widget mb-40 widget-padding banner-padding white-bg">
            <div class="banner-thumb pos-relative">
                <img src="/assets/frontend/sikka/img/courses/course_banner_01.png" alt="">
                <div class="bannger-text">
                    <h2>New eBook are availablei our shop</h2>
                    <div class="banner-btn">
                        <button class="btn white-bg-btn">shop now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>