

<div class="client-feedback" dir="ltr">

@if(isset($clients) && $clients->count() > 0)

   


<br>
<br>
        <div class="row client-feedback-slider">
            @foreach($clients as $client)
          <div class="col-lg-6" @if (app()->getLocale() === 'en') dir="ltr" @else dir="rtl" @endif>
            <div class="feedback-item">
              <div class="feedback-top-info">
                @if(isset($client->start) && $client->start != null)
                    
                <div class="rating">
                    @for($i = 0; $i <= $client->start; $i++)
                    <i class="fas fa-star"></i>
                    @endfor

                </div>
                    
                @endif
               
              </div>
              <div class="details">
                <p>
                    {{ $client->description }}
                </p>
              </div>
              <div class="designation">
                <p><span>{{ $client->name }} </span>  -    {{ $client->position }}</p>
              </div>
            </div>
          </div>
          @endforeach
        
        </div>

        
        @endif

      </div>
    

    
