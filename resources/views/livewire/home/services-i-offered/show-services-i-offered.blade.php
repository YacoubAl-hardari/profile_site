<div class="col-xl-8">
    <div class="card services-card">
      <div class="card-body">
        <h3 class="card-title">{{ trans('trans_all_data_front_end_pages.ServicesIOffered') }}
          <a class="link-btn" wire:navigate href="{{ route('services') }}"> {{ trans('trans_all_data_front_end_pages.SeeAllServices') }}
            <svg class="icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path d="M4.16699 10H15.8337" stroke="#4770FF" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round" />
              <path d="M10.833 15L15.833 10" stroke="#4770FF" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round" />
              <path d="M10.833 5L15.833 10" stroke="#4770FF" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round" />
            </svg>

          </a></h3>
        <div class="services-main mt-24">
          <div class="row g-4">


            @if(isset($Services) && $Services->count() > 0)
                @foreach($Services as $Service)
                    
                <div class="col-md-3 col-sm-6 col-6">
                  <div class="services-item text-center">
                    <div class="image">
                      <img src="{{ asset('storage/'.$Service->image) }}" width="70" alt="{{ $Service->title }}">
                    </div>
                    <div class="text">
                      <h3 class="title">{{ $Service->title }}</h3>
                    </div>
                  </div>
                </div>
              
                @endforeach
            @endif


          </div>
        </div>
      </div>
    </div>
  </div>