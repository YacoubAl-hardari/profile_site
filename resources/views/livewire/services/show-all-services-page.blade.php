<div>

    <section class="content-box-area mt-4">
        <div class="container">
          <div class="row g-4">

            <livewire:home.about.show-about-me/>
            
            
            
        

            <div class="col-xl-8">
                <div class="card content-box-card">
                    <div class="card-body">

                      @if(isset($setting) && $setting != null)
                        
                      <div class="top-info">
                        <div class="text">
                          <h1 class="main-title">{{ $setting->service_title_page }}</h1>
                          <p>{{ $setting->service_title_page_description }}</p>
                        </div>
                        <div class="available-btn">
                          <span><i class="fas fa-circle mx-2"></i> {{ trans('trans_all_data_front_end_pages.AvailableForHire') }}</span>
                        </div>
                      </div>

                      @endif


                    @if(isset($getAllServices) && $getAllServices->count() > 0) 

                  <div class="services">
                    <div class="row g-4">

                        @foreach($getAllServices as $getAllService)
                        <div class="col-md-3 col-sm-6 col-6">
                          <div class="services-item text-center">
                            <div class="image">
                              <img src="{{ asset('storage/'. $getAllService->image) }}" alt="{{ $getAllService->title }}" width="70">
                            </div>
                            <div class="text">
                              <h3 class="title">{{ $getAllService->title }}</h3>
                            </div>
                          </div>
                        </div>
                            
                        @endforeach


                    </div>
                 
                  </div>
                  @endif
             
                  <livewire:services.get-frequently-asked-question/>

       
                </div>
              </div>
            </div>


          </div>
        </div>
      </section>
</div>
