


@php
    $SEO = $blogDetail;
@endphp

@section('meta_keywords')
@if(isset($SEO->meta_keywords))
   {{$SEO->meta_keywords}}

@endif

@endsection
@section('meta_title')
@if(isset($SEO->meta_title))
    
{{$SEO->meta_title}}    
@endif
@endsection
@section('meta_description')
@if(isset($SEO->meta_description))
{{$SEO->meta_description}}    
@endif
@endsection
@section('meta_image')
@if(isset($SEO->meta_image))
{{asset('storage/'.$SEO->meta_image)}} 
    
@endif
@endsection
@section('title')
{{ $blogDetail->title }}
@endsection



<div>
   

    <section class="mt-4 content-box-area">
        <div class="container">
          <div class="row g-4">

            <livewire:home.about.show-about-me/>

            <div class="col-xl-8">
              <div class="card content-box-card">
                <div class="card-body portfolio-card article-details-card">
                  <div class="article-details-area">
                    <div class="main-image">
                      <img src="{{ asset('storage/'.$blogDetail->image) }}" alt="blog-img-1" class="img-fluid w-100">
                    </div>
                    <ul class="list-unstyled article-tags">
                      <li>{{ $blogDetail->getReadTime() }}</li>
                      <li>{{ $blogDetail->date }}</li>
                      <li>{{  $blogDetail->counter_view }}</li>
                    </ul>
                    <div class="article-details-text">

                            {!! $blogDetail->content !!}

                      <div class="tags-and-share">
                        <div class="tags">
                          <h3 class="title"> {{ trans('trans_all_data_front_end_pages.Tags') }} :</h3>
                          <ul class="list-unstyled">
                            @foreach($blogDetail->categoryBlog as $categoryBlog)
                            <span class="badge"
                              style="background-color: {{ $categoryBlog->bg_color }};color:{{ $categoryBlog->text_color }}">{{
                              $categoryBlog->name }}</span>
                          @endforeach
                            {{-- <li><a href="#">Development</a></li>
                            <li><a href="#">Design Trend</a></li> --}}
                          </ul>
                        </div>
                        <div class="share">
                          <h3 class="title">{{ trans('trans_all_data_front_end_pages.share') }} :</h3>
                          <div class="mt-0 social-media-icon">
                            <ul class="list-unstyled">
                              <ul class="list-unstyled">
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="https://pinterest.com/pin/create/button/?url={{ urlencode($url) }}"><i class="fab fa-pinterest"></i></a></li>
                                <li><a href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}&text={{ urlencode($blogDetail->getContent()) }}"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://www.linkedin.com/sharing/share-offsite?url={{ urlencode($url) }}"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="https://www.reddit.com/submit?url={{ urlencode($url) }}&title={{ urlencode($blogDetail->getContent()) }}"><i class="fab fa-reddit"></i></a></li>
                                <li><a href="https://telegram.me/share/url?url={{ urlencode($url) }}&text={{ urlencode($blogDetail->getContent()) }}"><i class="fab fa-telegram"></i></a></li>
                                <li><a href="https://wa.me/?text={{ urlencode($blogDetail->getContent() . ' ' . $url) }}"><i class="fab fa-whatsapp"></i></a></li>
                            </ul>
                            </ul>
                          </div>
                        </div>
                      </div>

                      {{-- <div class="related-post">
                        <h2 class="main-common-title"> {{ trans('trans_all_data_front_end_pages.RelatedPost') }}
                        </h2>
                        <div class="row g-4">
                            @if(isset($related_blog) && $related_blog->count() > 0)
                                @foreach($related_blog as $related)
                                    
                                <div class="col-md-6">
                                  <div class="article-publications-item">
                                    <div class="image">
                                      <a href="article.html" class="d-block w-100">
                                        <img src="{{ asset('storage/'.$related->image) }}" alt="{{ $related->name }}" class="img-fluid w-100">
                                      </a>
                                      <a href="article.html" class="tags">Development</a>
                                    </div>
                                    <div class="text">
                                      <a href="article.html" class="title">{{ $related->name }}</a>
                                      @foreach($Blog->categoryBlog as $categoryBlog)
                                      <span class="badge" wire:click="selectCategory({{ $categoryBlog->id }})" 
                                        style="background-color: {{ $categoryBlog->bg_color }};color:{{ $categoryBlog->text_color }};cursor: pointer">{{
                                        $categoryBlog->name }}</span>
                                    @endforeach
                                      <ul class="list-unstyled">
                                        <li>15 min read</li>
                                        <li>{{ $related->date }}</li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>

                                @endforeach
                            @endif
                         

                        </div>
                      </div> --}}

                      {{-- <div class="leave-comments-area">
                        <h2 class="main-common-title">{{ trans('trans_all_data_front_end_pages.LeaveComment') }}
                        </h2>
                        <div class="comments-box">
                          <div class="row gx-3">
                            <div class="col-md-6">
                              <div class="mb-4">
                                <label class="form-label">{{ trans('trans_all_data_front_end_pages.name') }}</label>
                                <input type="text" class="shadow-none form-control" placeholder="">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-4">
                                <label class="form-label">{{ trans('trans_all_data_front_end_pages.email') }}</label>
                                <input type="text" class="shadow-none form-control" placeholder="">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="mb-4">
                                <label class="form-label">{{ trans('trans_all_data_front_end_pages.Comment') }}</label>
                                <textarea class="shadow-none form-control" rows="4"
                                  placeholder=""></textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <button class="submit-btn" type="submit">
                                {{ trans('trans_all_data_front_end_pages.SendMessaeg') }}
                                <svg class="icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                  xmlns="http://www.w3.org/2000/svg">
                                  <path d="M17.5 11.6665V6.6665H12.5" stroke="white" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                  <path d="M17.5 6.6665L10 14.1665L2.5 6.6665" stroke="white" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div> --}}

                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </section>
    

</div>
