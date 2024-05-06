<div class="col-lg-12">
        <div class="card">
          <div class="card-body work-experiance-card">
            <h3 class="card-title">{{ trans('trans_all_data_front_end_pages.WorkExperience') }}</h3>
            <div class="work-experiance-main">
              <ul class="work-experiance-slider list-unstyled" dir="ltr">
                @if(isset($WorkExperiences) && $WorkExperiences->count() > 0)
                    
                @foreach($WorkExperiences as $WorkExperience)
                    
                <li>
                  <div class="date">
                    <p>{{ $WorkExperience->start_date }} - {{  $WorkExperience->end_date }}</p>
                  </div>
                  <div class="info">
                    <div class="icon">
                      <img src="{{ asset('storage/'. $WorkExperience->company_logo ) }}" alt="adobe">
                    </div>
                    <div class="text">
                      <h4 class="title">{{ $WorkExperience->company_name }}</h4>
                      <h6 class="subtitle">{{ $WorkExperience->position }}</h6>
                    </div>
                  </div>
                </li>
             
                @endforeach

                @endif
              </ul>
           
            </div>
          </div>
        </div>
</div>
