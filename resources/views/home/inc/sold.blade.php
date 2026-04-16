<div class="co-sold-strip">
    <div class="container py-4 py-lg-5">
        <div class="co-sold-grid">
            <div class="co-sold-pitch">
                <p class="co-sold-eyebrow">Volume you can feel</p>
                <h2 class="co-sold-headline">We buy 3,000+ cars per week</h2>
                <p class="co-sold-sub">Offers go out fast — inventory turns over even faster.</p>
                <a href="{{ url('/get_offer') }}" class="co-btn co-btn--primary">Get an instant offer</a>
            </div>
            <div class="co-sold-feed">
                <h3 class="co-sold-feed-title">Recently sold to Cashing Orlando</h3>
                <ul class="co-sold-list" id="peddleSalesList"></ul>
            </div>
        </div>
    </div>
</div>

<script>
    class SalesAnimation {
        static instance = null;

        constructor() {
            if (SalesAnimation.instance) {
                return SalesAnimation.instance;
            }
            SalesAnimation.instance = this;

            this.sales = [
                { car: '2014 Honda Civic', location: 'ORLANDO, FL' },
                { car: '2008 Ford F-150', location: 'KISSIMMEE, FL' },
                { car: '2011 Toyota Camry', location: 'SANFORD, FL' },
                { car: '2005 Nissan Altima', location: 'LAKELAND, FL' },
                { car: '2010 Kia Soul', location: 'TAMPA, FL' },
                { car: '2007 Chevy Silverado', location: 'OCALA, FL' }
            ];

            this.salesList = document.getElementById('peddleSalesList');
            this.init();
        }

        renderSales() {
            if (!this.salesList) return;
            this.salesList.innerHTML = this.sales
                .map(
                    (sale) => `
                <li class="co-sold-item">
                    <span class="co-sold-car">${sale.car}</span>
                    <span class="co-sold-loc">${sale.location}</span>
                </li>
            `
                )
                .join('');
        }

        animateSales() {
            const items = this.salesList.children;
            const duration = 0.5;

            if (typeof gsap !== 'undefined' && items.length > 0) {
                gsap.to(items[0], {
                    y: -40,
                    opacity: 0,
                    duration: duration,
                    onComplete: () => {
                        this.sales.push(this.sales.shift());
                        this.renderSales();
                        gsap.set(items, { y: 0, opacity: 1 });
                    }
                });
            } else if (items.length > 0) {
                this.sales.push(this.sales.shift());
                this.renderSales();
            }
        }

        init() {
            this.renderSales();
            setInterval(() => this.animateSales(), 3000);
        }
    }

    if (!SalesAnimation.instance) {
        new SalesAnimation();
    }
</script>
