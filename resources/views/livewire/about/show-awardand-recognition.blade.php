<div class="awards-recognitions">
    @if (isset($AwardandRecognitions) && $AwardandRecognitions->count() > 0)
        <h2 class="main-common-title">
            {{ trans('trans_all_data_front_end_pages.AwardsandRecognitions') }}
        </h2>
        <div class="awards-recognitions-main">
            <ul class="list-unstyled">

                @foreach ($AwardandRecognitions as $AwardandRecognition)
                    @if ($AwardandRecognition->link_type == 'external_social_media_url')
                        <li>
                            <a href="{{ $AwardandRecognition->link }}" class="d-block w-100">
                                <div class="awards-item">
                                    <div class="award-name">
                                        <div class="icon rounded-circle">
                                            <img src="{{ asset('storage/' . $AwardandRecognition->image) }}"
                                                alt="{{ $AwardandRecognition->title }}" class="rounded-circle">
                                        </div>
                                        <div class="text">
                                            <h4 class="title">{{ $AwardandRecognition->title }}</h4>
                                            <p class="year"> {{ $AwardandRecognition->start_date }} -
                                                {{ $AwardandRecognition->end_date }}</p>
                                        </div>
                                    </div>
                                    <div class="winner-tag">
                                        <h4 class="title">
                                            <svg class="icon" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6 9C6 10.5913 6.63214 12.1174 7.75736 13.2426C8.88258 14.3679 10.4087 15 12 15C13.5913 15 15.1174 14.3679 16.2426 13.2426C17.3679 12.1174 18 10.5913 18 9C18 7.4087 17.3679 5.88258 16.2426 4.75736C15.1174 3.63214 13.5913 3 12 3C10.4087 3 8.88258 3.63214 7.75736 4.75736C6.63214 5.88258 6 7.4087 6 9Z"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M12 15L15.4 20.89L16.998 17.657L20.596 17.889L17.196 12"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M6.80234 12L3.40234 17.89L7.00034 17.657L8.59834 20.889L11.9983 15"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            {{ $AwardandRecognition->award_or_recognition_type }}
                                        </h4>
                                    </div>
                                    <div class="project-btn">
                                        <span>
                                            View

                                            <svg href="http://" class="arrow-up" width="14" height="15"
                                                viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.91634 4.5835L4.08301 10.4168" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M4.66699 4.5835H9.91699V9.8335" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @elseif ($AwardandRecognition->link_type == 'internal_url')
                        <li>
                            <a href="{{ $AwardandRecognition->link }}" data-bs-toggle="modal"
                                data-bs-target="#{{ $AwardandRecognition->link }}-{{ $AwardandRecognition->id }}"
                                class="d-block w-100">
                                <div class="awards-item">
                                    <div class="award-name">
                                        <div class="icon rounded-circle">
                                            <img src="{{ asset('storage/' . $AwardandRecognition->image) }}"
                                                alt="{{ $AwardandRecognition->title }}" class="rounded-circle">
                                        </div>
                                        <div class="text">
                                            <h4 class="title">{{ $AwardandRecognition->title }}</h4>
                                            <p class="year"> {{ $AwardandRecognition->start_date }} -
                                                {{ $AwardandRecognition->end_date }}</p>
                                        </div>
                                    </div>
                                    <div class="winner-tag">
                                        <h4 class="title">
                                            <svg class="icon" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6 9C6 10.5913 6.63214 12.1174 7.75736 13.2426C8.88258 14.3679 10.4087 15 12 15C13.5913 15 15.1174 14.3679 16.2426 13.2426C17.3679 12.1174 18 10.5913 18 9C18 7.4087 17.3679 5.88258 16.2426 4.75736C15.1174 3.63214 13.5913 3 12 3C10.4087 3 8.88258 3.63214 7.75736 4.75736C6.63214 5.88258 6 7.4087 6 9Z"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M12 15L15.4 20.89L16.998 17.657L20.596 17.889L17.196 12"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M6.80234 12L3.40234 17.89L7.00034 17.657L8.59834 20.889L11.9983 15"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            {{ $AwardandRecognition->award_or_recognition_type }}
                                        </h4>
                                    </div>
                                    <div class="project-btn">
                                        <span>
                                            View

                                            <svg href="http://" class="arrow-up" width="14" height="15"
                                                viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.91634 4.5835L4.08301 10.4168" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M4.66699 4.5835H9.91699V9.8335" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <div class="modal fade" id="{{ $AwardandRecognition->link }}-{{ $AwardandRecognition->id }}"
                            tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                            aria-labelledby="modalTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                role="document">
                                <div class="modal-content">
                                    
                                    <div class="modal-body">
                                      
                                        <img src="{{ asset('storage/' . $AwardandRecognition->image) }}"
                                        alt="{{ $AwardandRecognition->title }}" class="img-filud w-100">
                                        <h3 class="title  px-2 my-3" id="modalTitleId">
                                            {{ $AwardandRecognition->title }}
                                        </h3>

                                        <p>
                                            {{ $AwardandRecognition->start_date }} -
                                                {{ $AwardandRecognition->end_date }}
                                        </p>

                                    

                                        <p class="py-3 px-1">
                                            {{ $AwardandRecognition->description }}
                                        </p>
                                    </div>
                                    <div class="modal-footer text-center">
                                        <button type="button" class="btn btn-danger w-100" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    
                    @else
                        <li>
                            <a href="javascript:void()" class="d-block w-100">
                                <div class="awards-item">
                                    <div class="award-name">
                                        <div class="icon rounded-circle">
                                            <img src="{{ asset('storage/' . $AwardandRecognition->image) }}"
                                                alt="{{ $AwardandRecognition->title }}" class="rounded-circle">
                                        </div>
                                        <div class="text">
                                            <h4 class="title">{{ $AwardandRecognition->title }}</h4>
                                            <p class="year"> {{ $AwardandRecognition->start_date }} -
                                                {{ $AwardandRecognition->end_date }}</p>
                                        </div>
                                    </div>
                                    <div class="winner-tag">
                                        <h4 class="title">
                                            <svg class="icon" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6 9C6 10.5913 6.63214 12.1174 7.75736 13.2426C8.88258 14.3679 10.4087 15 12 15C13.5913 15 15.1174 14.3679 16.2426 13.2426C17.3679 12.1174 18 10.5913 18 9C18 7.4087 17.3679 5.88258 16.2426 4.75736C15.1174 3.63214 13.5913 3 12 3C10.4087 3 8.88258 3.63214 7.75736 4.75736C6.63214 5.88258 6 7.4087 6 9Z"
                                                    stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M12 15L15.4 20.89L16.998 17.657L20.596 17.889L17.196 12"
                                                    stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M6.80234 12L3.40234 17.89L7.00034 17.657L8.59834 20.889L11.9983 15"
                                                    stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                            {{ $AwardandRecognition->award_or_recognition_type }}
                                        </h4>
                                    </div>
                                    <div class="project-btn">
                                        <span>
                                            View

                                            <svg href="http://" class="arrow-up" width="14" height="15"
                                                viewBox="0 0 14 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.91634 4.5835L4.08301 10.4168" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M4.66699 4.5835H9.91699V9.8335" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endif
                @endforeach

            </ul>
        </div>


    @endif
</div>
