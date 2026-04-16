<section class="co-pills-section" aria-labelledby="co-pills-heading">
    <div class="container">
        <h2 id="co-pills-heading" class="co-pills-section__title">We buy cars in any condition</h2>
        <div class="co-pills" role="list">
            @foreach ([
                'Perfect', 'Damaged', 'Flooded', 'Totaled', 'Old', 'Burned',
                'Scrap', 'No Keys', 'Missing Tires', 'Non-Running', 'High Mileage',
            ] as $pill)
                <span class="co-pill" role="listitem">{{ $pill }}</span>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('get_offer') }}" class="co-btn co-btn--primary">Get offer</a>
        </div>
    </div>
</section>
