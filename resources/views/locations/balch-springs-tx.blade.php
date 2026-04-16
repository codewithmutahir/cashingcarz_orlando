@extends('layouts.master')

@section('meta_title', 'Cash For Junk Cars in Balch Springs (TX) | Cashing Carz')
@section('meta_description', 'Get top dollar with I Buy Junk Cars Today Balch Springs TX—fast, easy cash for junk cars in any condition. Call now for a free quote!')
@section('meta_keywords', 'I Buy Junk Cars Today Balch Springs TX')
@section('meta_robots', 'index, follow')

@section('content')
<div class="junk-car-page" style="background: linear-gradient(135deg, #fff9f4 0%, #fdfdfd 50%, #f2f6ff 100%); padding: 2rem 0; margin-top: 100px; font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">
  
  <!-- Hero Section -->
  <div class="hero-container" style="max-width: 1200px; margin: 0 auto; padding: 0 1rem;">
    <div class="hero-card" style="background: rgba(255,255,255,0.97); backdrop-filter: blur(20px); border-radius: 24px; padding: 3rem 1.5rem; text-align: center; box-shadow: 0 25px 50px rgba(15,12,41,0.15); border: 1px solid rgba(255,255,255,0.3); position: relative; overflow: hidden; animation: slideInUp 0.8s ease-out;">
      <div style="position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, #FF6B35, #F7931E, #FFD23F, #06FFA5); background-size: 400% 400%; animation: gradientShift 8s ease infinite;"></div>

      <h1 style="font-size: clamp(2rem, 4.5vw, 3rem); font-weight: 800; background: linear-gradient(135deg, #0F0C29 0%, #FF6B35 50%, #302B63 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 1.5rem; line-height: 1.2;">
        Cash For Junk Cars in <strong style="color: #FF6B35;">Balch Springs</strong>: Fast, Easy & Hassle‑Free
      </h1>
      <p style="font-size: clamp(1rem, 3vw, 1.1rem); color: #5A5A5A; margin-bottom: 1.5rem; padding-bottom:23px; max-width: 600px; margin: auto;">
        Got a junk car taking up space? <strong style="color: #FF6B35;">Cashing Carz</strong> makes it quick, stress‑free, and cash‑based. No games. No hidden fees. Just honest service and top dollar in Balch Springs.
      </p>
      <div style="display: flex; justify-content: center; maring-top:23px; gap: 1rem; flex-wrap: wrap; margin-bottom: 1.5rem;">
        <a href="{{ url('/get_offer') }}" style="background: linear-gradient(135deg, #FF6B35 0%, #F7931E 100%); color: white; padding: 0.8rem 1.5rem; border-radius: 50px; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 0.5rem; transition: all .3s ease; box-shadow: 0 8px 25px rgba(255,107,53,0.4); font-size: clamp(0.9rem, 2.5vw, 1rem);">
          <span style="font-size: 1.1rem;">💰</span> Get Free Quote
        </a>
        <a href="tel:+14693838321" style="background: rgba(6,255,165,0.1); color: #0F0C29; padding: 0.8rem 1.5rem; border-radius: 50px; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 0.5rem; transition: all .3s ease; border: 2px solid #06FFA5; font-size: clamp(0.9rem, 2.5vw, 1rem);">
          <span style="font-size: 1.1rem;">📞</span> Call Now
        </a>
      </div>
    </div>
  </div>

  <div class="content-container" style="max-width: 1200px; margin: 2rem auto; padding: 0 1rem;">

    <!-- Benefits -->
    <div class="benefits-card" style="background: rgba(255,255,255,0.97); backdrop-filter: blur(20px); border-radius: 20px; padding: 2rem 1.5rem; margin-bottom: 2rem; box-shadow: 0 15px 35px rgba(15,12,41,0.1); border: 1px solid rgba(255,255,255,0.3);">
      <h2 style="font-size: clamp(1.8rem, 4vw, 2.2rem); font-weight: 700; color: #0F0C29; margin-bottom: 1.5rem; text-align: center;">
        <span style="font-size: 1.8rem;">🚘</span> Why Choose Cashing Carz?
      </h2>
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1rem;">
        <div style="background: linear-gradient(135deg, rgba(255,107,53,0.08) 0%, rgba(247,147,30,0.08) 100%); padding: 1rem; border-radius: 16px; border-left: 4px solid #FF6B35;">
          <div style="font-size: 1.3rem; margin-bottom: 0.5rem; color: #0F0C29; font-weight: 600;">✅ Free Pickup</div>
          <p style="color: #5A5A5A; margin: 0; font-size: 0.95rem;">We come to you with free junk car removal</p>
        </div>
        <div style="background: linear-gradient(135deg, rgba(6,255,165,0.08) 0%, rgba(255,210,63,0.08) 100%); padding: 1rem; border-radius: 16px; border-left: 4px solid #06FFA5;">
          <div style="font-size: 1.3rem; margin-bottom: 0.5rem; color: #0F0C29; font-weight: 600;">✅ Cash on Spot</div>
          <p style="color: #5A5A5A; margin: 0; font-size: 0.95rem;">Get paid immediately when we pick up</p>
        </div>
        <div style="background: linear-gradient(135deg, rgba(247,147,30,0.08) 0%, rgba(255,210,63,0.08) 100%); padding: 1rem; border-radius: 16px; border-left: 4px solid #F7931E;">
          <div style="font-size: 1.3rem; margin-bottom: 0.5rem; color: #0F0C29; font-weight: 600;">✅ Same Day Service</div>
          <p style="color: #5A5A5A; margin: 0; font-size: 0.95rem;">Quick scheduling, often same-day pickup</p>
        </div>
        <div style="background: linear-gradient(135deg, rgba(48,43,99,0.08) 0%, rgba(36,36,62,0.08) 100%); padding: 1rem; border-radius: 16px; border-left: 4px solid #302B63;">
          <div style="font-size: 1.3rem; margin-bottom: 0.5rem; color: #0F0C29; font-weight: 600;">✅ No Paperwork Hassle</div>
          <p style="color: #5A5A5A; margin: 0; font-size: 0.95rem;">We handle all the documentation for you</p>
        </div>
      </div>
    </div>

    <!-- What We Buy -->
    <div class="what-we-buy-card" style="background: rgba(255,255,255,0.97); backdrop-filter: blur(20px); border-radius: 20px; padding: 2rem 1.5rem; margin-bottom: 2rem; box-shadow: 0 15px 35px rgba(15,12,41,0.1); border: 1px solid rgba(255,255,255,0.3);">
      <h2 style="font-size: clamp(1.8rem, 4vw, 2.2rem); font-weight: 700; color: #0F0C29; margin-bottom: 1.5rem; text-align: center;">
        <span style="font-size: 1.8rem;">🛠</span> What Counts as a Junk Car?
      </h2>
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
        <div style="background: linear-gradient(135deg, rgba(255,107,53,0.1) 0%, rgba(247,147,30,0.1) 100%); padding: 1rem; border-radius: 12px; text-align: center; border: 1px solid rgba(255,107,53,0.2);">
          <div style="font-size: 1.8rem; margin-bottom: 0.5rem;">🚗</div>
          <div style="font-weight: 600; color: #0F0C29; font-size: 0.95rem;">Non‑running vehicles</div>
        </div>
        <div style="background: linear-gradient(135deg, rgba(6,255,165,0.1) 0%, rgba(255,210,63,0.1) 100%); padding: 1rem; border-radius: 12px; text-align: center; border: 1px solid rgba(6,255,165,0.2);">
          <div style="font-size: 1.8rem; margin-bottom: 0.5rem;">🔧</div>
          <div style="font-weight: 600; color: #0F0C29; font-size: 0.95rem;">Damaged cars</div>
        </div>
        <div style="background: linear-gradient(135deg, rgba(247,147,30,0.1) 0%, rgba(255,210,63,0.1) 100%); padding: 1rem; border-radius: 12px; text-align: center; border: 1px solid rgba(247,147,30,0.2);">
          <div style="font-size: 1.8rem; margin-bottom: 0.5rem;">📋</div>
          <div style="font-weight: 600; color: #0F0C29; font-size: 0.95rem;">Expired registration</div>
        </div>
        <div style="background: linear-gradient(135deg, rgba(48,43,99,0.1) 0%, rgba(36,36,62,0.1) 100%); padding: 1rem; border-radius: 12px; text-align: center; border: 1px solid rgba(48,43,99,0.2);">
          <div style="font-size: 1.8rem; margin-bottom: 0.5rem;">🏠</div>
          <div style="font-weight: 600; color: #0F0C29; font-size: 0.95rem;">Abandoned vehicles</div>
        </div>
        <div style="background: linear-gradient(135deg, rgba(255,107,53,0.1) 0%, rgba(6,255,165,0.1) 100%); padding: 1rem; border-radius: 12px; text-align: center; border: 1px solid rgba(255,107,53,0.2);">
          <div style="font-size: 1.8rem; margin-bottom: 0.5rem;">🚚</div>
          <div style="font-weight: 600; color: #0F0C29; font-size: 0.95rem;">Trucks & SUVs</div>
        </div>
      </div>
      <p style="text-align: center; margin-top: 1.5rem; font-size: clamp(0.95rem, 2.5vw, 1rem); color: #5A5A5A;">
        Totaled? Missing parts? Doesn’t run? <strong style="color: #FF6B35;">We’ll take it and pay you on the spot.</strong>
      </p>
    </div>

    <!-- Process -->
    <div class="process-card" style="background: rgba(255,255,255,0.97); backdrop-filter: blur(20px); border-radius: 20px; padding: 2rem 1.5rem; margin-bottom: 2rem; box-shadow: 0 15px 35px rgba(15,12,41,0.1); border: 1px solid rgba(255,255,255,0.3);">
      <h2 style="font-size: clamp(1.8rem, 4vw, 2.2rem); font-weight: 700; color: #0F0C29; margin-bottom: 1.5rem; text-align: center;">
        <span style="font-size: 1.8rem;">🧾</span> Our Simple 3-Step Process
      </h2>
      <div style="display: flex; justify-content: space-between; align-items: stretch; flex-wrap: wrap; gap: 1rem;">
        <!-- Step 1 -->
        <div style="flex: 1; min-width: 200px; text-align: center; padding: 1rem;">
          <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #FF6B35 0%, #F7931E 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-size: 1.5rem; color: white; box-shadow: 0 8px 25px rgba(255,107,53,0.3);">
            1
          </div>
          <h3 style="font-size: 1.3rem; font-weight: 600; color: #0F0C29;">Get Free Quote</h3>
          <p style="color: #5A5A5A; font-size: 0.95rem;">Call us or fill out our online form for instant quote</p>
        </div>
        <!-- Step 2 -->
        <div style="flex: 1; min-width: 200px; text-align: center; padding: 1rem;">
          <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #06FFA5 0%, #FFD23F 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-size: 1.5rem; color: white; box-shadow: 0 8px 25px rgba(6,255,165,0.3);">
            2
          </div>
          <h3 style="font-size: 1.3rem; font-weight: 600; color: #0F0C29;">Schedule Pickup</h3>
          <p style="color: #5A5A5A; font-size: 0.95rem;">Accept our offer and we'll schedule pickup—often same-day</p>
        </div>
        <!-- Step 3 -->
        <div style="flex: 1; min-width: 200px; text-align: center; padding: 1rem;">
          <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #302B63 0%, #24243e 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-size: 1.5rem; color: white; box-shadow: 0 8px 25px rgba(48,43,99,0.3);">
            3
          </div>
          <h3 style="font-size: 1.3rem; font-weight: 600; color: #0F0C29;">Get Paid</h3>
          <p style="color: #5A5A5A; font-size: 0.95rem;">We tow it, handle paperwork, and pay you cash instantly</p>
        </div>
      </div>
    </div>

    <!-- Pricing Factors -->
    <div class="pricing-card" style="background: rgba(255,255,255,0.97); backdrop-filter: blur(20px); border-radius: 20px; padding: 2rem 1.5rem; margin-bottom: 2rem; box-shadow: 0 15px 35px rgba(15,12,41,0.1); border: 1px solid rgba(255,255,255,0.3);">
      <h2 style="font-size: clamp(1.8rem, 4vw, 2.2rem); font-weight: 700; color: #0F0C29; margin-bottom: 1.5rem; text-align: center;">
        <span style="font-size: 1.8rem;">💸</span> What Determines Your Car’s Value?
      </h2>
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 1rem;">
        <div style="text-align: center; padding: 1rem; background: linear-gradient(135deg, rgba(255,107,53,0.08), rgba(247,147,30,0.08)); border-radius: 16px; border: 1px solid rgba(255,107,53,0.15);">
          <div style="font-size: 2.5rem; margin-bottom: 0.8rem;">📅</div>
          <h4 style="font-weight: 600; color: #0F0C29; font-size: 1.1rem;">Year, Make & Model</h4>
          <p style="color: #5A5A5A; font-size: 0.9rem;">Vehicle specs matter</p>
        </div>
        <div style="text-align: center; padding: 1rem; background: linear-gradient(135deg, rgba(6,255,165,0.08), rgba(255,210,63,0.08)); border-radius: 16px; border: 1px solid rgba(6,255,165,0.15);">
          <div style="font-size: 2.5rem; margin-bottom: 0.8rem;">🔍</div>
          <h4 style="font-weight: 600; color: #0F0C29; font-size: 1.1rem;">Overall Condition</h4>
          <p style="color: #5A5A5A; font-size: 0.9rem;">Body, frame, engine state</p>
        </div>
        <div style="text-align: center; padding: 1rem; background: linear-gradient(135deg, rgba(247,147,30,0.08), rgba(255,210,63,0.08)); border-radius: 16px; border: 1px solid rgba(247,147,30,0.15);">
          <div style="font-size: 2.5rem; margin-bottom: 0.8rem;">⚖️</div>
          <h4 style="font-weight: 600; color: #0F0C29; font-size: 1.1rem;">Scrap Weight</h4>
          <p style="color: #5A5A5A; font-size: 0.9rem;">Metal value & scrap pricing</p>
        </div>
        <div style="text-align: center; padding: 1rem; background: linear-gradient(135deg, rgba(48,43,99,0.08), rgba(36,36,62,0.08)); border-radius: 16px; border: 1px solid rgba(48,43,99,0.15);">
          <div style="font-size: 2.5rem; margin-bottom: 0.8rem;">🔧</div>
          <h4 style="font-weight: 600; color: #0F0C29; font-size: 1.1rem;">Parts Demand</h4>
          <p style="color: #5A5A5A; font-size: 0.9rem;">Salvageable parts value</p>
        </div>
      </div>
      <div style="text-align: center; margin-top: 1.5rem; padding: 1.5rem; background: linear-gradient(135deg, rgba(6,255,165,0.08), rgba(255,210,63,0.08)); border-radius: 16px; border: 1px solid rgba(6,255,165,0.2);">
        <p style="font-size: clamp(1rem, 2.5vw, 1.1rem); color: #FF6B35; font-weight: 600;">
          <strong>No lowballing. No pressure.</strong> Just fast, fair quotes with no obligation.
        </p>
      </div>
    </div>

    <!-- Contact CTA -->
    <div class="contact-card" style="background: linear-gradient(135deg, #0F0C29 0%, #302B63 50%, #24243e 100%); border-radius: 20px; padding: 3rem 1.5rem; text-align: center; box-shadow: 0 20px 50px rgba(15,12,41,0.4); color: white; position: relative; overflow: hidden;">
      <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: radial-gradient(circle at 30% 40%, rgba(255,107,53,0.1) 0%, transparent 50%), radial-gradient(circle at 80% 10%, rgba(6,255,165,0.1) 0%, transparent 50%); pointer-events: none;"></div>
      <div style="position: relative; z-index: 1;">
        <h2 style="font-size: clamp(1.8rem, 4vw, 2.2rem); font-weight: 700; margin-bottom: 1rem; color: white;">
          <span style="font-size: 1.8rem;">💬</span> Ready to Get Cash for Your Junk Car?
        </h2>
        <p style="font-size: clamp(0.95rem, 2.5vw, 1.1rem); margin-bottom: 2rem; padding-bottom:1rem; opacity: 0.9; max-width: 600px; margin: auto;">
          Searching for <strong>"junk car removal Balch Springs"</strong>? Look no further. We'll help you clean up, clear space, and get paid—fast.
        </p>
        <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap; margin-bottom: 1.5rem;">
          <div style="background: rgba(255,255,255,0.1); padding: 1rem; border-radius: 16px; backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2); min-width: 160px;">
            <div style="font-size: 0.95rem; opacity: 0.8; margin-bottom: 0.5rem;">Dallas Office</div>
            <a href="tel:+14693838321" style="color: #06FFA5; text-decoration: none; font-size: 1.1rem; font-weight: 600;">📞 +1 469-383-8321</a>
          </div>
          <div style="background: rgba(255,255,255,0.1); padding: 1rem; border-radius: 16px; backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2); min-width: 160px;">
            <div style="font-size: 0.95rem; opacity: 0.8; margin-bottom: 0.5rem;">Florida Office</div>
            <a href="tel:+13214420085" style="color: #FFD23F; text-decoration: none; font-size: 1.1rem; font-weight: 600;">📞 +1 321-442-0085</a>
          </div>
        </div>
        <a href="{{ url('/get_offer') }}" style="background: linear-gradient(135deg, #FF6B35 0%, #F7931E 100%); color: white; padding: 1rem 2rem; border-radius: 50px; text-decoration: none; font-weight: 700; font-size: clamp(0.95rem, 2.5vw, 1.1rem); display: inline-flex; align-items: center; gap: 0.5rem; transition: all .3s ease; box-shadow: 0 10px 30px rgba(255,107,53,0.4);">
          <span style="font-size: 1.3rem;">🚀</span> Get Your Free Offer Now
        </a>
         <p style="margin:16px;">
    Want to know how to get your title in Balch Spring? 
    <a class="anchor-location" href="https://cashingcarz.com/how-to-get-your-title-in-balch-springs">Read our Title Guide for Balch Spring</a>.
</p>
      </div>
    </div>

  </div>
</div>

<style>
/* Animations */
@keyframes slideInUp {
  from { opacity: 0;
    transform: translateY(30px);
  }
  to { 
    opacity: 1;
    transform: translateY(0);
  }
}
@keyframes gradientShift {
  0% { 
    background-position: 0% 50%;
  }
  50% { 
    background-position: 100% 50%;
  }
  100% { 
    background-position: 0% 50%;
  }
}

/* Global responsive styles */
.junk-car-page {
  margin-top: 80px;
  /* Reduced for mobile */
}

/* Hero section */
.hero-card {
  padding: 2.5rem 1rem;
}
}

/* Benefits section */
.benefits-card {
  padding: 1.5rem;
  1rem;
}
.benefits-card-grid .grid {
  grid-template-columns: 1fr;
}
  grid-template-columns: repeat(auto-fit, .minmax(250px, 1fr));
}

/* What we buy */
.what-we-buy {
  padding: 1.5rem;
  card1rem;
}
.what-we-buy .card {
  grid-template-columns: 1fr;
  grid-template-columns: repeat(auto-fit, minmax(180px, .1fr));
}

/* Process section */
.process-card {
  padding: 1.5rem;
  1rem;
}
.process-card .steps {
  flex-direction: column;
  align-items: center;
}
.process-card .step {
  min-width: 100px;
  margin-bottom: 1rem;
}

/* Pricing section */
.pricing-card {
  padding: 1.5rem;
  padding: 1rem;
}
.pricing-card .grid {
  grid-template-columns: 1fr;
  grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
}

/* Contact CTA */
.contact-card {
  padding: 2rem;
  padding: 1rem;
}
.contact-card .card {
  flex-direction: column;
  gap: 1rem;
}
.contact-card a {
  padding: 0.8rem;
  1.5rem;
}

/* Media queries for larger screens */
@media (min-width: 768px) {
  .junk-car-page {
    margin-top: 100px;
  }
  .hero-card {
    padding: 3rem 2rem;
  }
  .benefits-card {
    padding: 2rem;
    .grid {
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    }
  }
  .what-we-buy-card {
    padding: 2rem;
    .grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  }
  .process-card {
    padding: 2rem;
    .steps {
      flex-direction: row;
    }
    .step {
      min-width: 200px;
      margin-bottom: 0;
    }
  }
  .pricing-card {
    padding: 2rem;
    .grid {
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    }
  }
  .contact-card {
    padding: 3rem;
    .flex-direction: row;
    gap: 2rem;
  }
}

@media screen(min-width: 1024px) {
  .hero-container {
    padding: 0 2rem;
  }
  .content-container {
    padding: 1200px;
  }
}
</style>

@endsection