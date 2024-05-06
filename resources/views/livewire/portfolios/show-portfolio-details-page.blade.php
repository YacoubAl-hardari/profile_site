<div>
  

    <section class="content-box-area mt-4">
        <div class="container">
          <div class="row g-4">

                    <livewire:home.about.show-about-me/>

            <div class="col-xl-8">
              <div class="card content-box-card">
                <div class="card-body portfolio-card">
                    @if(isset($portfolio_detail) && $portfolio_detail != null)
                        
                    <div class="portfolio-details-area">
                      <div class="main-image">
                        <img src="{{ asset('storage/'. $portfolio_detail->image ) }}" alt="{{ $portfolio_detail->name }}">
                      </div>
                      <div class="portfolio-details-text">

                        @if(isset($portfolio_detail->client) && $portfolio_detail->client != null)
                      
                    
                        @foreach($portfolio_detail->client as $client)

                        @if($client['is_view'] == false)
                            
                        <div class="short-info">
                          <div class="info-item">
                            <p class="subtitle"> {{ trans('trans_all_data_front_end_pages.client') }}:</p>
                            <h4 class="card-title">{{ $client['client_name'] }}</h4>
                            <p class="subtitle"> {{ trans('trans_all_data_front_end_pages.date') }}:</p>
                            <h4 class="card-title">{{ $client['date'] }}</h4>
                          </div>
                          <div class="info-item">
                            <p class="subtitle"> {{ trans('trans_all_data_front_end_pages.categoryPortfolio') }}</p>
                            <h4 class="card-title">{{ $portfolio_detail->categoryPortfolio->name }}</h4>
                            <a href="{{ $client['client_url'] }}" class="website">
                                visit
                              <svg class="arrow-up" width="14" height="15" viewBox="0 0 14 15" fill="none"
                                xmlns="http://www.w3.org/2000/svg">

                                <path d="M9.91634 4.5835L4.08301 10.4168" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path d="M4.66699 4.5835H9.91699V9.8335" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                              </svg>

                            </a>
                          </div>
                        </div>

                        @endif

                            
                        @endforeach
                      
                        
                            
                        @endif

                        <div class="overview">
                          <h4 class="card-title">{{ trans('trans_all_data_front_end_pages.Overview') }}</h4>
                          {{ $portfolio_detail->description }}
                        </div>
                      </div>
                      @if(isset($portfolio_detail->images) && $portfolio_detail->images != null)
                        
                        <div class="inner-images">
                          <div class="row g-3">
                            @foreach($portfolio_detail->images as $image)
                            <div class="col-md-4">
                              <div class="image">
                                <img src="{{ asset('storage/'. $image ) }}" alt="images"
                                  class="img-fluid w-100" >

                           
                              </div>

                            </div>
                            @endforeach
                          </div>
                        </div>

                        
                      @endif
                     

                      <div class="more-info-block">
                        {!! $portfolio_detail->content !!}
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
