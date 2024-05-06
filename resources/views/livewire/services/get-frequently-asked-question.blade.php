<div class="frequently-asked-questions">
    @if(isset($FrequentlyAskedQuestions) && $FrequentlyAskedQuestions->count() > 0)
        
        
    <h2 class="main-common-title">{{ trans('trans_all_data_front_end_pages.FrequentlyAskedQuestions') }}
    </h2>
    <div class="frequently-asked-questions-main">
      <div class="accordion" id="accordionExample">


        @foreach($FrequentlyAskedQuestions as $FrequentlyAskedQuestion)
        @if($loop->first)
        <div class="accordion-item">
            <h4 class="accordion-header" id="{{$FrequentlyAskedQuestion->question}}-{{ $FrequentlyAskedQuestion->id }}">
              <button class="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                {{ $FrequentlyAskedQuestion->question }}
                <span class="ms-auto mx-2">
                  <span class="icon ms-4">
                    <img class="icon-plus" src="{{ asset('front/assets/img/icons/plus.svg') }}" alt="plus">
                    <img class="icon-minus d-none" src="{{ asset('front/assets/img/icons/minus.svg') }}" alt="minus">
                  </span>
                </span>
              </button>
            </h4>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="{{$FrequentlyAskedQuestion->question}}-{{ $FrequentlyAskedQuestion->id }}"
              data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p>{{ $FrequentlyAskedQuestion->answer }}</p>
              </div>
            </div>
          </div>
        @else
        <div class="accordion-item">
            <h4 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                {{ $FrequentlyAskedQuestion->question }}
                <span class="ms-auto mx-2">
                  <span class="icon ms-4">
                    <img class="icon-plus" src="{{ asset('front/assets/img/icons/plus.svg') }}" alt="plus">
                    <img class="icon-minus d-none" src="{{ asset('front/assets/img/icons/minus.svg') }}" alt="minus">
                  </span>
                </span>
              </button>
            </h4>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
              data-bs-parent="#accordionExample">
              <div class="accordion-body">
              <p>{{ $FrequentlyAskedQuestion->answer }}</p>
              </div>
            </div>
          </div>
        @endif
            
        @endforeach
     

      
       
      </div>
    </div>
    @endif

  </div>