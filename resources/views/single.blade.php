@extends('layouts.frontend')

@include('admin.includes.froala_view')

@section('content')
    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">{{ $post->title }}</h1>
        </div>
    </div>

    <div class="container">
        <div class="row medium-padding120">
            <main class="main">
                <div class="col-lg-10 col-lg-offset-1">
                    <article class="hentry post post-standard-details">

                        <div class="post-thumb">
                            <img src="{{ $post->featured }}" alt="{{ $post->title }}">
                        </div>

                        <div class="post__content" style="color: #2f2c2c;">


                            <div class="post-additional-info">

                                <div class="post__author author vcard">
                                    Posted by

                                    <div class="post__author-name fn">
                                        <a href="#" class="post__author-link">Admin</a>
                                    </div>

                                </div>

                                <span class="post__date">

                                        <i class="seoicon-clock"></i>

                                        <time class="published" datetime="2016-03-20 12:00:00">
                                            {{ $post->created_at->toFormattedDateString() }}
                                        </time>

                                    </span>

                                <span class="category">
                                <i class="seoicon-tags"></i>
                                <a href="{{ route('category.single', ['id' => $post->category->id]) }}">{{ $post->category->name }}</a>
                                    </span>

                            </div>

                            {!! $post->content !!}

                        </div>

                    </article>

                    <div class="pagination-arrow">

                        @if($next_post)
                            <a href="{{ route('post.single', ['slug' => $next_post->slug]) }}" class="btn-prev-wrap">
                                <svg class="btn-prev">
                                    <use xlink:href="#arrow-left"></use>
                                </svg>
                                <div class="btn-content">
                                    <div class="btn-content-title">Next Post</div>
                                    <p class="btn-content-subtitle">{{ $next_post->title }}</p>
                                </div>
                            </a>
                        @endif

                        @if($previous_post)
                            <a href="{{ route('post.single', ['slug' => $previous_post->slug]) }}" class="btn-next-wrap">
                                <div class="btn-content">
                                    <div class="btn-content-title">Previous Post</div>
                                    <p class="btn-content-subtitle">{{ $previous_post->title }}</p>
                                </div>
                                <svg class="btn-next">
                                    <use xlink:href="#arrow-right"></use>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>

                @if(count($post->tags) > 0)
                    <div class="col-lg-12">
                        <aside aria-label="sidebar" class="sidebar sidebar-right">
                            <div class="widget w-tags">
                                <div class="heading text-center">
                                    <h4 class="heading-title">POST TAGS</h4>
                                    <div class="heading-line">
                                        <span class="short-line"></span>
                                        <span class="long-line"></span>
                                    </div>
                                </div>

                                <div class="tags-wrap">
                                    @foreach($post->tags as $tag)
                                        <a href="{{ route('tag.single', ['id' => $tag->id]) }}" class="w-tags-item">{{ $tag->tag }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </aside>
                    </div>
                @endif

                <div class="comments col-lg-12">

                    <div class="heading text-center">
                        <h4 class="h1 heading-title">Comments</h4>
                        <div class="heading-line">
                            <span class="short-line"></span>
                            <span class="long-line"></span>
                        </div>
                    </div>

                    @include('includes.disqus')
                </div>

            </main>
        </div>
    </div>
@endsection