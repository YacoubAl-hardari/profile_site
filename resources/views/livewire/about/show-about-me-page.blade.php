<div>

    
    <section class="content-box-area mt-4">
        <div class="container">
          <div class="row g-4">

            <livewire:home.about.show-about-me/>

            <div class="col-xl-8">
              <div class="card content-box-card">
                <div class="card-body">


                    @if(isset($sboutMe->counter) && $sboutMe->counter != null)
                    <div class="counter-area">
                      <div class="counter">

                        @foreach($sboutMe->counter as $counter)
                        <div class="counter-item ">
                          <h3 class="number">{{ $counter['counter'] }}</h3>
                          <p class="subtitle">{{ $counter['title'] }}</p>
                        </div>
                            
                        @endforeach
                       

                      </div>
                      <div class="circle-area">
                        <div class="circle-text">
                          <span class="arrow-down">
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                              xmlns="http://www.w3.org/2000/svg">
                              <path d="M20 5V35" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                              <path d="M15 30L20 35L25 30" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            </svg>
                          </span>
                        </div>
                      </div>
                    </div>
                        
                    @endif

               <livewire:about.show-brand/>

                <livewire:about.show-client/>

                <livewire:about.show-awardand-recognition/>



             

                </div>
              </div>
            </div>
            
          </div>
        </div>
      </section>


</div>
