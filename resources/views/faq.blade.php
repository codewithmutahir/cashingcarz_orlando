<div class="container co-faq-wrap">

    <div class="row justify-content-center">

        <div class="col-12 col-lg-10 col-xl-8">

            <h2 class="mb-0">Questions? We have answers.</h2>

            @if(($faqList ?? collect())->isEmpty())

                <p class="text-center text-muted mt-4 mb-0">No FAQs available right now.</p>

            @else

            <div class="accordion co-faq-accordion mt-4" id="coFaqAccordion">

                @foreach($faqList as $i => $faq)

                    <div class="accordion-item">

                        <h3 class="accordion-header" id="coFaqHead{{ $i }}">

                            <button class="accordion-button {{ $i > 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#coFaq{{ $i }}" aria-expanded="{{ $i === 0 ? 'true' : 'false' }}" aria-controls="coFaq{{ $i }}">

                                {{ $faq->question }}

                            </button>

                        </h3>

                        <div id="coFaq{{ $i }}" class="accordion-collapse collapse {{ $i === 0 ? 'show' : '' }}" data-bs-parent="#coFaqAccordion" aria-labelledby="coFaqHead{{ $i }}">

                            <div class="accordion-body">

                                {{ $faq->answer }}

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

            @endif

        </div>

    </div>

</div>

