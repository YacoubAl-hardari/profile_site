<div>
   
    
    <section class="content-box-area mt-4">
        <div class="container">
          <div class="row g-4">
            
            <livewire:home.about.show-about-me/>

            <div class="col-xl-8">
              <div class="card content-box-card">
                <div class="card-body portfolio-card contact-card">
                  @if(isset($setting) && $setting != null)
                  <div class="top-info">
                    <div class="text">
                      <h1 class="main-title">{{  $setting->contact_title_page }}</h1>
                      <p>{{  $setting->contact_title_page_description }}</p>
                    </div>
                  </div>
                  @endif
                  <div class="contact-area">
                    <div class="leave-comments-area">
                      <div class="comments-box">
                        <form id="contact-form"  method="POST" wire:submit="save">
                          <div class="row gx-3">
                            <div class="col-md-6">
                              <div class="mb-4">
                                <label class="form-label">{{ trans('trans_all_data_front_end_pages.name') }}</label>
                                <input wire:model="name"  type="text" class="form-control shadow-none" placeholder="Enter your name">
                                @error('name')
                                <b class="lead text-danger">{{ $message }}</b>
                                @enderror
                               
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-4">
                                <label class="form-label">{{ trans('trans_all_data_front_end_pages.phone') }}</label>
                                <input wire:model="phone"  type="text" class="form-control shadow-none" placeholder="Enter your phone">
                                @error('phone')
                                <b class="lead text-danger">{{ $message }}</b>
                                @enderror
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-4">
                                <label class="form-label">{{ trans('trans_all_data_front_end_pages.email') }}</label>
                                <input wire:model="email"  type="email" class="form-control shadow-none" placeholder="Enter your email">
                                @error('email')
                                <b class="lead text-danger">{{ $message }}</b>
                                @enderror
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-4">
                                <label class="form-label"> {{ trans('trans_all_data_front_end_pages.subject') }}</label>
                                <input wire:model="subject"  type="text" class="form-control shadow-none" placeholder=" {{ trans('trans_all_data_front_end_pages.subject') }}">
                                @error('subject')
                                <b class="lead text-danger">{{ $message }}</b>
                                @enderror
                              </div>
                            </div>
                           
                            <div class="col-md-12">
                              <div class="mb-4">
                                <label class="form-label">   {{ trans('trans_all_data_front_end_pages.message') }}</label>
                                <textarea wire:model="message" class="form-control shadow-none" rows="4"
                                  placeholder="Type details about your inquiry"></textarea>
                                  @error('message')
                                  <b class="lead text-danger">{{ $message }}</b>
                                  @enderror
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
                        </form>
                      </div>
                    </div>
                    {{-- <div class="contact-map-area">
                      <iframe  src="" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div> --}}
                   

                      <livewire:services.get-frequently-asked-question/>
                      
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>



</div>
