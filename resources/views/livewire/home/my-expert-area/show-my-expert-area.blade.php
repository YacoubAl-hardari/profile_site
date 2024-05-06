<div class="col-lg-12">
        <div class="card expertise-card">
          <div class="card-body">
            <h3 class="card-title">{{ trans('trans_all_data_front_end_pages.MyExpertArea') }}
            </h3>
            <div class="expertise-main mt-24">
              <div class="row g-3">
                @if(isset($MyExpertAreas) && $MyExpertAreas->count() > 0)
                    @foreach($MyExpertAreas as $MyExpertArea)
                        
                    <div class="col-xl-4 col-md-4 col-sm-6 col-6">
                      <div class="expertise-item">
                        <div class="image text-center">
                          <img src="{{ asset('storage/'.$MyExpertArea->image) }}" loading="lazy" alt="{{ $MyExpertArea->name }}">
                        </div>
                        <div class="text">
                          <h4 class="title">{{ $MyExpertArea->name }}</h4>
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
