<div>


  <section class="mt-4 content-box-area">
    <div class="container">
      <div class="row g-4">

        <livewire:home.about.show-about-me />

        <div class="col-xl-8">
          <div class="card content-box-card">
            <div class="card-body portfolio-card">
              @if(isset($setting) && $setting != null)
              <div class="top-info">
                <div class="text">
                  <h1 class="main-title">{{ $setting->blog_title_page }}</h1>
                  <p>{{ $setting->blog_title_page_description }}</p>
                </div>
              </div>
              @endif

              <button class="mb-5 btn btn-danger" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">Filters</button>

              <div class="offcanvas offcanvas-end"  data-bs-scroll="true" data-bs-backdrop="static" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                      <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                        Offcanvas
                      </h5>
                      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                      

                      <div class="text-center col-12">
                        <div class="card">
                          <div class="text-center card-header">
                            <b class="card-title">فرز المدونات</b>
                          </div>
                          <div class="card-body">

                            <div class="mb-5 text-right ">
                              <p class="mb-2">ترتيب</p>

                              <select wire:model.live="sortBy" class="form-select" id="sortBy">
                                <option value="desc">Latest First</option>
                                <option value="asc">Oldest First</option>
                            </select>
                            
                            </div>
                            
                            <div class="my-5 text-right">
                              <p class="mb-2">بحث</p>
                      <input class="form-control me-2 reounded" wire:model.live.lazy="searchQuery" type="search" placeholder="Search" aria-label="Search" />

                            </div>
                            
                            <div class="my-5 text-right" >
                              <p class="mb-2">الوسوم</p>
                              @if(isset($Blogs) && $Blogs->count() > 0)
                              @php
                                  $uniqueCategoryIds = [];
                              @endphp

                              @foreach($Blogs as $Blog)
                                  @foreach($Blog->categoryBlog as $categoryBlog)
                                      @if(!in_array($categoryBlog->id, $uniqueCategoryIds))
                                          @php
                                              $uniqueCategoryIds[] = $categoryBlog->id;
                                          @endphp
                                          <button type="button" class="m-1 btn" wire:click="selectCategory({{ $categoryBlog->id }})" 
                                                style="background-color: {{ $categoryBlog->bg_color }};color:{{ $categoryBlog->text_color }};cursor: pointer">
                                              {{ $categoryBlog->name }}
                                          </button>
                                      @endif
                                  @endforeach
                              @endforeach
                          @endif
                            </div>


                       

                          </div>
                          <div class="card-footer">
                            <div class="my-3 tex-center">
                              <li class="my-2 text-danger"><a wire:click="resetFilters()" style="cursor: pointer" >اعادة الفرز<span class="icon-right-arrow" ></span></a></li>
                            </div>
                          </div>
                        </div>
                        </div>                    
                    </div>
                  </div>



              @if(isset($Blogs) && $Blogs->count() > 0)


              <div class="article-publications article-area">
                <div class="article-publications-main">
                  <div class="row">

                    @foreach($Blogs as $Blog)

                    <div class="col-xl-6 col-lg-4 col-md-6">
                      <div class="article-publications-item">
                        <div class="image">
                          <a href="article.htm{{ route('blog-detilas',$Blog->slug) }}" class="d-block w-100">
                            <img src="{{ asset('storage/'.$Blog->image) }}" alt="blog-img-1" class="img-fluid w-100">
                          </a>
                          {{-- <a href="{{ route('blog-detilas',$Blog->slug) }}" class="tags">{{ $Blog->categoryBlog
                            }}</a> --}}

                        </div>
                        <div class="text">
                          <a href="{{ route('blog-detilas',$Blog->slug) }}" class="mx-2 title">{{ $Blog->name }}</a>
                          @foreach($Blog->categoryBlog as $categoryBlog)
                            <span class="badge" wire:click="selectCategory({{ $categoryBlog->id }})" 
                              style="background-color: {{ $categoryBlog->bg_color }};color:{{ $categoryBlog->text_color }};cursor: pointer">{{
                              $categoryBlog->name }}</span>
                          @endforeach

                          <ul class="list-unstyled">



                            <li> {{ $Blog->getReadTime() }} </li>
                            </li>
                            <li>{{ $Blog->date }}</li>
                          </ul>
                        </div>
                      </div>
                    </div>

                    @endforeach
                  </div>
                </div>
              </div>

              @endif

              <div class="text-center pagination">
                {{ $Blogs->links() }}
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>
  </section>


</div>