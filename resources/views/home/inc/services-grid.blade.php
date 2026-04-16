<section class="co-services" aria-labelledby="co-services-heading">
    <div class="container">
        <p class="co-section-label">Services</p>
        <h2 id="co-services-heading" class="co-section-h2">Everything handled for you.</h2>
        <div class="row g-4 co-services__grid">
            @php
                $svc = [
                    ['t' => 'Instant Cash Offers', 'd' => 'Any make or model. Competitive price based on market value.', 'ico' => 'cash'],
                    ['t' => 'Free Towing & Pickup', 'd' => 'We come to your location. No transportation cost ever.', 'ico' => 'tow'],
                    ['t' => 'Same-Day Payment', 'd' => 'Cash in hand the day we collect your car. No waiting.', 'ico' => 'bolt'],
                    ['t' => 'Any Condition Accepted', 'd' => 'Damaged, flooded, totaled, burned, old — we buy it all.', 'ico' => 'wrench'],
                    ['t' => 'Free Car Valuation', 'd' => 'No-obligation quote in minutes. No commitment required.', 'ico' => 'clipboard'],
                    ['t' => 'Paperwork Handled', 'd' => 'We manage all DMV paperwork. You just hand over the keys.', 'ico' => 'doc'],
                ];
            @endphp
            @foreach ($svc as $item)
            <div class="col-md-6 col-lg-4">
                <article class="co-service-card">
                    <div class="co-service-card__icon" aria-hidden="true">
                        @if($item['ico'] === 'cash')
                            <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="16" cy="16" r="14" stroke="currentColor" stroke-width="1.75"/><path d="M16 8v16M11 12h6a3 3 0 010 6H12a2 2 0 100 4h7" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"/></svg>
                        @elseif($item['ico'] === 'tow')
                            <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 22h20l2-8H8l-2 8z" stroke="currentColor" stroke-width="1.75" stroke-linejoin="round"/><circle cx="10" cy="24" r="2.5" stroke="currentColor" stroke-width="1.75"/><circle cx="22" cy="24" r="2.5" stroke="currentColor" stroke-width="1.75"/><path d="M26 14h4l2 4v4h-3" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"/></svg>
                        @elseif($item['ico'] === 'bolt')
                            <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18 4l-8 14h6l-2 14 10-16h-7l1-12z" stroke="currentColor" stroke-width="1.75" stroke-linejoin="round"/></svg>
                        @elseif($item['ico'] === 'wrench')
                            <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14 18l-8 8a4 4 0 005.5 5.5l8-8" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"/><path d="M22 6l4 4-3 3-5-5 3-3z" stroke="currentColor" stroke-width="1.75" stroke-linejoin="round"/><path d="M13 15l4 4" stroke="currentColor" stroke-width="1.75"/></svg>
                        @elseif($item['ico'] === 'clipboard')
                            <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="8" y="6" width="16" height="22" rx="2" stroke="currentColor" stroke-width="1.75"/><path d="M12 6V5a2 2 0 012-2h4a2 2 0 012 2v1" stroke="currentColor" stroke-width="1.75"/><path d="M11 14h10M11 18h7" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"/></svg>
                        @else
                            <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 8h12v20H10V8z" stroke="currentColor" stroke-width="1.75"/><path d="M13 8V6a2 2 0 012-2h2a2 2 0 012 2v2" stroke="currentColor" stroke-width="1.75"/><path d="M13 16h6M13 20h4" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"/></svg>
                        @endif
                    </div>
                    <h3 class="co-service-card__title">{{ $item['t'] }}</h3>
                    <p class="co-service-card__body">{{ $item['d'] }}</p>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</section>
