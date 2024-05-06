<div>

    <section class="content-box-area mt-4">
        <div class="container">
          <div class="row g-4">

                  <livewire:home.about.show-about-me/>

            <div class="col-xl-8">
              <div class="card content-box-card">
                <div class="card-body portfolio-card">
                  @if(isset($setting) && $setting != null)
                  <div class="top-info">
                    <div class="text">
                      <h1 class="main-title">{{  $setting->portfolio_title_page }}</h1>
                      <p>{{  $setting->portfolio_title_page_description }}</p>
                    </div>
                  </div>
                  @endif

                  
                  @if(isset($Portfolios) && $Portfolios->count() > 0)
             
                    
                 
                  <div class="portfolio-area">
                    <div class="row g-4 parent-container">

                        @foreach($Portfolios as $Portfolio)
                            
                        <div class="col-lg-12">
                          <div class="portfolio-item">
                            <div class="image">
                              <img src="{{ asset('storage/'.$Portfolio->image) }}" alt="project-1" class="img-fluid w-100">
                              <a href="{{ asset('storage/'.$Portfolio->image) }}"
                                class="gallery-popup full-image-preview parent-container">
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none"
                                  stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                  <path d="M10 4.167v11.666M4.167 10h11.666"></path>
                                </svg>
                              </a>
                            </div>
                            <div class="text">
                              <div class="info">
                                <a href="{{ route('portfolios-details',$Portfolio->slug) }}" class="title">{{ $Portfolio->name }}</a>
                                <p class="subtitle">{{ $Portfolio->categoryPortfolio->name }}</p>
                              </div>
                              <div class="visite-btn">
                                <a href="{{ route('portfolios-details',$Portfolio->slug) }}">{{ trans('trans_all_data_front_end_pages.VisitSite') }}
                                  <svg class="arrow-up" width="14" height="15" viewBox="0 0 14 15" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.91634 4.5835L4.08301 10.4168" stroke-linecap="round"
                                      stroke-linejoin="round"></path>
                                    <path d="M4.66699 4.5835H9.91699V9.8335" stroke-linecap="round"
                                      stroke-linejoin="round"></path>
                                  </svg>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      
                        @endforeach


                    </div>


                 
                    <div class="pagination text-center">
                        {{  $Portfolios->links() }}
                    </div>

                  </div>
                  @endif

             


                </div>
              </div>
            </div>

          </div>
        </div>
      </section>

</div>
