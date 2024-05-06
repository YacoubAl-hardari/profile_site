@php
    $SEO = \App\Models\Settings::latest()->first();
@endphp
@section('meta_keywords')
@if(isset($SEO->meta_keywords))
@if(isset($SEO->meta_keywords))
   {{$SEO->meta_keywords}}
@endif
    
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
{{ trans('front_lang.Home') }}
@endsection


<div>
  
  <section class="home-area">
    <div class="container">
      <div class="row g-4">

              {{-- About me  --}}
             <livewire:home.about.show-about-me/>

              {{-- Work Experience  And My Expert Area --}}
              <div class="col-xl-4">
                <div class="row g-4">

                  {{-- Work Experience --}}
                 <livewire:home.work-experience.show-work-experience/>
                 
                 {{-- My Expert Area --}}
                 <livewire:home.my-expert-area.show-my-expert-area/>
             <div class="p-2">
              <livewire:services.get-frequently-asked-question/>
             </div>
            

                </div>
              </div>

              {{-- Recent Projects --}}
            <livewire:home.recent-project.show-recent-project/>

        


            {{-- Services I Offered  And Work Together --}}
            <div class="services-area mt-24">
              <div class="row g-4">

                {{-- Services I Offered --}}
              <livewire:home.services-i-offered.show-services-i-offered/>
                
                {{-- Work Together --}}
                <div class="col-xl-4">
                  <div class="card lets-talk-together-card">
                    <div class="card-body">
                      <div class="scrolling-info" dir="ltr">
                        <div class="slider-item">
                          @if(isset($SEO->slider_text) && $SEO->slider_text != null)
                          <p>
                           @foreach($SEO->slider_text as  $slider_text)
                            {{ $slider_text['title'] }} - 
                           @endforeach
                          </p>
                            
                          @endif
                        </div>
                      </div>

                      @if (app()->getLocale() === 'en')  
                      <h3 class="card-title">Let's👋
                        <span class="d-block">Work Together</span>
                      </h3>
                      @else
                      <h3 class="card-title">لنبدأ 👋
                        <span class="d-block">نعمل معًا</span>
                      </h3>
                       @endif

                      <a class="link-btn" wire:navigate href="{{ route('contact-us') }}"> {{ trans('trans_all_data_front_end_pages.LetsTalk') }}
                        <svg class="icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
                          xmlns="http://www.w3.org/2000/svg">
                          <path d="M17.5 11.6665V6.6665H12.5" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                          <path d="M17.5 6.6665L10 14.1665L2.5 6.6665" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>

              </div>

            </div>
        
          </div>
        </div>
      </section>
    
</div>
