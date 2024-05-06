
<div class="working-with-area">
    
    @if(isset($brands) && $brands->count() > 0)

    <h2 class="main-common-title"> {{ trans('trans_all_data_front_end_pages.WorkingWithBrands') }}
    </h2>
    <div class="working-with-main">

        @foreach($brands as $brand)
           
        @if($brand->slug != null)
        <div class="items">
            <a href="{{ $brand->slug }}">
            
                <img src="{{ asset('storage/'.$brand->logo) }}" loading="lazy" title="{{ $brand->name }}" alt="{{ $brand->name }}">
            </a>
        </div>
            
        @else
        <div class="items">
            
                <img src="{{ asset('storage/'.$brand->logo) }}" loading="lazy" title="{{ $brand->name }}" alt="{{ $brand->name }}">
               
        </div>
            
        @endif
       
        @endforeach
    </div>

  @endif

  </div>
