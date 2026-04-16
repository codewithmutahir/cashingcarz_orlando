@extends('layouts.master')

@section('meta_title', 'Cash For Junk Cars in Carrollton (TX) | Cashing Carz')
@section('meta_description', 'Get top dollar with our Cash Cars for Sale Carrollton TX service. We buy junk cars fast with free towing and same-day pickup!')
@section('meta_keywords', 'Cash Cars for Sale Carrollton TX')
@section('meta_robots', 'index, follow')

@section('content')
<div class="junk-car-page" style="background: linear-gradient(135deg, #fff9f4 0%, #fdfdfd 50%, #f2f6ff 100%); padding: 2rem 0; margin-top:150px; font-family: 'Inter', sans-serif;">

  <!-- Hero -->
  <div class="hero-container" style="max-width:1200px; margin:0 auto; padding:0 1rem;">
    <div class="hero-card" style="background:rgba(255,255,255,0.97); backdrop-filter:blur(20px); border-radius:24px; padding:4rem 2rem; text-align:center; box-shadow:0 25px 50px rgba(15,12,41,0.15); border:1px solid rgba(255,255,255,0.3); position:relative; overflow:hidden; animation:slideInUp 0.8s ease-out;">
      <div style="position:absolute; top:0; left:0; right:0; height:4px; background:linear-gradient(90deg,#FF6B35,#F7931E,#FFD23F,#06FFA5); background-size:400% 400%; animation:gradientShift 8s ease infinite;"></div>
      <h1 style="font-size:clamp(2.5rem,5vw,3.5rem); font-weight:800; background:linear-gradient(135deg,#0F0C29 0%,#FF6B35 50%,#302B63 100%); -webkit-text-fill-color:transparent; -webkit-background-clip:text; margin-bottom:1.5rem; line-height:1.2;">
        Cash For Junk Cars in <strong style="color:#FF6B35;">Carrollton</strong>: Fast, Easy & Hassle‑Free
      </h1>
      <p style="font-size:1.2rem; color:#5A5A5A; max-width:600px; margin:0 auto 2rem;">
        Got a junk car taking up space? <strong style="color:#FF6B35;">Cashing Carz</strong> makes selling it quick, stress‑free, and profitable—even if it doesn't run.
      </p>
      <div style="display:flex; justify-content:center; gap:1rem; flex-wrap:wrap;">
        <a href="{{ url('/get_offer') }}" style="background:linear-gradient(135deg,#FF6B35 0%,#F7931E 100%); color:white; padding:1rem 2rem; border-radius:50px; font-weight:600; transition:all .3s; box-shadow:0 8px 25px rgba(255,107,53,0.4); display:inline-flex; align-items:center; gap:0.5rem;">
          💰 Get Free Quote
        </a>
        <a href="tel:+14693838321" style="background:rgba(6,255,165,0.1); color:#0F0C29; padding:1rem 2rem; border-radius:50px; border:2px solid #06FFA5; transition:all .3s; display:inline-flex; align-items:center; gap:0.5rem;">
          📞 Call Now
        </a>
      </div>
    </div>
  </div>

  <!-- Content Area -->
  <div class="content-container" style="max-width:1200px; margin:2rem auto; padding:0 1rem;">

    <!-- Benefits Section -->
    <div class="benefits-card" style="background:rgba(255,255,255,0.97); backdrop-filter:blur(20px); border-radius:20px; padding:3rem 2rem; margin-bottom:2rem; box-shadow:0 15px 35px rgba(15,12,41,0.1); border:1px solid rgba(255,255,255,0.3);">
      <h2 style="font-size:2.5rem; font-weight:700; color:#0F0C29; margin-bottom:2rem; text-align:center;">
        <span style="font-size:2rem;">🚘</span> Why Choose Cashing Carz?
      </h2>
      <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(300px,1fr)); gap:1.5rem;">
        <div style="background:linear-gradient(135deg,rgba(255,107,53,0.08)0%,rgba(247,147,30,0.08)100%); padding:1.5rem; border-radius:16px; border-left:4px solid #FF6B35;">
          <div style="font-size:1.5rem; font-weight:600; color:#0F0C29;">✅ Free Pickup</div>
          <p style="color:#5A5A5A; margin:0;">We tow your car at no charge.</p>
        </div>
        <div style="background:linear-gradient(135deg,rgba(6,255,165,0.08)0%,rgba(255,210,63,0.08)100%); padding:1.5rem; border-radius:16px; border-left:4px solid #06FFA5;">
          <div style="font-size:1.5rem; font-weight:600; color:#0F0C29;">✅ Cash on Spot</div>
          <p style="color:#5A5A5A; margin:0;">We pay you when we pick it up.</p>
        </div>
        <div style="background:linear-gradient(135deg,rgba(247,147,30,0.08)0%,rgba(255,210,63,0.08)100%); padding:1.5rem; border-radius:16px; border-left:4px solid #F7931E;">
          <div style="font-size:1.5rem; font-weight:600; color:#0F0C29;">✅ Same Day Service</div>
          <p style="color:#5A5A5A; margin:0;">Quick scheduling—usually same‑day.</p>
        </div>
        <div style="background:linear-gradient(135deg,rgba(48,43,99,0.08)0%,rgba(36,36,62,0.08)100%); padding:1.5rem; border-radius:16px; border-left:4px solid #302B63;">
          <div style="font-size:1.5rem; font-weight:600; color:#0F0C29;">✅ No Paperwork Hassle</div>
          <p style="color:#5A5A5A; margin:0;">We handle all the documentation.</p>
        </div>
      </div>
    </div>

    <!-- What We Buy -->
    <div class="what-we-buy-card" style="background:rgba(255,255,255,0.97); backdrop-filter:blur(20px); border-radius:20px; padding:3rem 2rem; margin-bottom:2rem; box-shadow:0 15px 35px rgba(15,12,41,0.1); border:1px solid rgba(255,255,255,0.3);">
      <h2 style="font-size:2.5rem; font-weight:700; color:#0F0C29; margin-bottom:2rem; text-align:center;">
        <span style="font-size:2rem;">🛠</span> What Counts as a Junk Car?
      </h2>
      <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:1rem;">
        <div style="background:linear-gradient(135deg,rgba(255,107,53,0.1)0%,rgba(247,147,30,0.1)100%); padding:1rem; border-radius:12px; text-align:center; border:1px solid rgba(255,107,53,0.2);">
          <div style="font-size:2rem; margin-bottom:0.5rem;">🚗</div>
          <div style="font-weight:600; color:#0F0C29;">Non‑running vehicles</div>
        </div>
        <div style="background:linear-gradient(135deg,rgba(6,255,165,0.1)0%,rgba(255,210,63,0.1)100%); padding:1rem; border-radius:12px; text-align:center; border:1px solid rgba(6,255,165,0.2);">
          <div style="font-size:2rem; margin-bottom:0.5rem;">🔧</div>
          <div style="font-weight:600; color:#0F0C29;">Damaged cars</div>
        </div>
        <div style="background:linear-gradient(135deg,rgba(247,147,30,0.1)0%,rgba(255,210,63,0.1)100%); padding:1rem; border-radius:12px; text-align:center; border:1px solid rgba(247,147,30,0.2);">
          <div style="font-size:2rem; margin-bottom:0.5rem;">📋</div>
          <div style="font-weight:600; color:#0F0C29;">Expired registration</div>
        </div>
        <div style="background:linear-gradient(135deg,rgba(48,43,99,0.1)0%,rgba(36,36,62,0.1)100%); padding:1rem; border-radius:12px; text-align:center; border:1px solid rgba(48,43,99,0.2);">
          <div style="font-size:2rem; margin-bottom:0.5rem;">🏠</div>
          <div style="font-weight:600; color:#0F0C29;">Abandoned vehicles</div>
        </div>
        <div style="background:linear-gradient(135deg,rgba(255,107,53,0.1)0%,rgba(6,255,165,0.1)100%); padding:1rem; border-radius:12px; text-align:center; border:1px solid rgba(255,107,53,0.2);">
          <div style="font-size:2rem; margin-bottom:0.5rem;">🚚</div>
          <div style="font-weight:600; color:#0F0C29;">Trucks & SUVs</div>
        </div>
      </div>
      <p style="text-align:center; margin-top:2rem; font-size:1.1rem; color:#5A5A5A;">
        Totaled? Missing parts? Doesn’t run? <strong style="color:#FF6B35;">We’ll take it and pay you on the spot.</strong>
      </p>
    </div>

    <!-- 3‑Step Process -->
    <div class="process-card" style="background:rgba(255,255,255,0.97); backdrop-filter:blur(20px); border-radius:20px; padding:3rem 2rem; margin-bottom:2rem; box-shadow:0 15px 35px rgba(15,12,41,0.1); border:1px solid rgba(255,255,255,0.3);">
      <h2 style="font-size:2.5rem; font-weight:700; color:#0F0C29; margin-bottom:2rem; text-align:center;">
        <span style="font-size:2rem;">🧾</span> Our Simple 3‑Step Process
      </h2>
      <div style="display:flex; justify-content:space-between; flex-wrap:wrap; gap:2rem;">
        <div style="flex:1; min-width:250px; text-align:center;">
          <div style="width:80px;height:80px;border-radius:50%; background:linear-gradient(135deg,#FF6B35 0%,#F7931E 100%); color:white; display:flex; align-items:center; justify-content:center; font-size:2rem; box-shadow:0 8px 25px rgba(255,107,53,0.3); margin:0 auto 1rem;">1</div>
          <h3 style="font-size:1.5rem; font-weight:600; color:#0F0C29;">Get Free Quote</h3>
          <p style="color:#5A5A5A;">Call or fill our form for instant quote.</p>
        </div>
        <div style="flex:1; min-width:250px; text-align:center;">
          <div style="width:80px;height:80px;border-radius:50%; background:linear-gradient(135deg,#06FFA5 0%,#FFD23F 100%); color:white; display:flex; align-items:center; justify-content:center; font-size:2rem; box-shadow:0 8px 25px rgba(6,255,165,0.3); margin:0 auto 1rem;">2</div>
          <h3 style="font-size:1.5rem; font-weight:600; color:#0F0C29;">Schedule Pickup</h3>
          <p style="color:#5A5A5A;">Accept our offer—date & time set.</p>
        </div>
        <div style="flex:1; min-width:250px; text-align:center;">
          <div style="width:80px;height:80px;border-radius:50%; background:linear-gradient(135deg,#302B63 0%,#24243e 100%); color:white; display:flex; align-items:center; justify-content:center; font-size:2rem; box-shadow:0 8px 25px rgba(48,43,99,0.3); margin:0 auto 1rem;">3</div>
          <h3 style="font-size:1.5rem; font-weight:600; color:#0F0C29;">Get Paid</h3>
          <p style="color:#5A5A5A;">We tow, document & pay cash instantly.</p>
        </div>
      </div>
    </div>

    <!-- Pricing Details -->
    <div class="pricing-card" style="background:rgba(255,255,255,0.97); backdrop-filter:blur(20px); border-radius:20px; padding:3rem 2rem; margin-bottom:2rem; box-shadow:0 15px 35px rgba(15,12,41,0.1); border:1px solid rgba(255,255,255,0.3);">
      <h2 style="font-size:2.5rem; font-weight:700; text-align:center; color:#0F0C29; margin-bottom:2rem;">
        <span style="font-size:2rem;">💸</span> What Determines Your Car’s Value?
      </h2>
      <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:1.5rem;">
        <div style="text-align:center; background:linear-gradient(135deg,rgba(255,107,53,0.08)0%,rgba(247,147,30,0.08)100%); padding:1.5rem; border-radius:16px; border:1px solid rgba(255,107,53,0.15);">
          <div style="font-size:3rem; margin-bottom:1rem;">📅</div>
          <h4 style="font-weight:600; color:#0F0C29;">Year, Make & Model</h4>
          <p style="color:#5A5A5A; font-size:0.9rem;">Vehicle specs matter</p>
        </div>
        <div style="text-align:center; background:linear-gradient(135deg,rgba(6,255,165,0.08)0%,rgba(255,210,63,0.08)100%); padding:1.5rem; border-radius:16px; border:1px solid rgba(6,255,165,0.15);">
          <div style="font-size:3rem; margin-bottom:1rem;">🔍</div>
          <h4 style="font-weight:600; color:#0F0C29;">Overall Condition</h4>
          <p style="color:#5A5A5A; font-size:0.9rem;">Body, engine, frame</p>
        </div>
        <div style="text-align:center; background:linear-gradient(135deg,rgba(247,147,30,0.08)0%,rgba(255,210,63,0.08)100%); padding:1.5rem; border-radius:16px; border:1px solid rgba(247,147,30,0.15);">
          <div style="font-size:3rem; margin-bottom:1rem;">⚖️</div>
          <h4 style="font-weight:600; color:#0F0C29;">Scrap Weight</h4>
          <p style="color:#5A5A5A; font-size:0.9rem;">Metal value matters</p>
        </div>
        <div style="text-align:center; background:linear-gradient(135deg,rgba(48,43,99,0.08)0%,rgba(36,36,62,0.08)100%); padding:1.5rem; border-radius:16px; border:1px solid rgba(48,43,99,0.15);">
          <div style="font-size:3rem; margin-bottom:1rem;">🔧</div>
          <h4 style="font-weight:600; color:#0F0C29;">Parts Demand</h4>
          <p style="color:#5A5A5A; font-size:0.9rem;">Salvageable components</p>
        </div>
      </div>
      <div style="background:linear-gradient(135deg,rgba(6,255,165,0.08)0%,rgba(255,210,63,0.08)100%); border-radius:16px; border:1px solid rgba(6,255,165,0.2); padding:2rem; margin-top:2rem; text-align:center;">
        <p style="color:#FF6B35; font-size:1.2rem; font-weight:600;"><strong>No lowballing. No pressure.</strong> Fast, fair quotes with zero obligation.</p>
      </div>
    </div>

    <!-- Final CTA -->
    <div class="contact-card" style="background:linear-gradient(135deg,#0F0C29 0%,#302B63 50%,#24243e 100%); border-radius:20px; padding:4rem 2rem; text-align:center; box-shadow:0 20px 50px rgba(15,12,41,0.4); color:white; position:relative; overflow:hidden; margin-bottom:2rem;">
      <div style="position:absolute; top:0; left:0; right:0; bottom:0; background:radial-gradient(circle at 30% 40%,rgba(255,107,53,0.1)0%,transparent 50%), radial-gradient(circle at 80% 10%,rgba(6,255,165,0.1)0%,transparent 50%); pointer-events:none;"></div>
      <div style="position:relative; z-index:1;">
        <h2 style="font-size:2.5rem; font-weight:700; margin-bottom:1rem; color:white;"><span style="font-size:2rem;">💬</span> Ready to Get Cash for Your Junk Car?</h2>
        <p style="font-size:1.2rem; opacity:0.9; max-width:600px; margin:0 auto 2rem;">
          Searching for <strong>"junk car removal Carrollton"</strong>? We’re nearby, speedy, and pay you YOUR cash—no waiting.
        </p>
        <div style="display:flex; justify-content:center; gap:2rem; flex-wrap:wrap; margin-bottom:2rem;">
          <div style="background:rgba(255,255,255,0.1); padding:1.5rem; border-radius:16px; backdrop-filter:blur(10px); border:1px solid rgba(255,255,255,0.2);">
            <div style="font-size:1.1rem; opacity:0.8; margin-bottom:0.5rem;">Dallas Office</div>
            <a href="tel:+14693838321" style="color:#06FFA5; text-decoration:none; font-size:1.3rem; font-weight:600;">📞 +1 469-383-8321</a>
          </div>
          <div style="background:rgba(255,255,255,0.1); padding:1.5rem; border-radius:16px; backdrop-filter:blur(10px); border:1px solid rgba(255,255,255,0.2);">
            <div style="font-size:1.1rem; opacity:0.8; margin-bottom:0.5rem;">Florida Office</div>
            <a href="tel:+13214420085" style="color:#FFD23F; text-decoration:none; font-size:1.3rem; font-weight:600;">📞 +1 321-442-0085</a>
          </div>
        </div>
        <a href="{{ url('/get_offer') }}" style="background: linear-gradient(135deg,#FF6B35 0%,#F7931E 100%); color:white; padding:1.2rem 3rem; border-radius:50px; font-size:1.2rem; font-weight:700; text-decoration:none; box-shadow:0 10px 30px rgba(255,107,53,0.4); display:inline-flex; align-items:center; gap:0.5rem;">
          🚀 Get Your Free Offer Now
        </a>
         <p style="margin:16px;">
    Want to know how to get your title in Carrollton? 
    <a class="anchor-location"  href="https://cashingcarz.com/how-to-get-your-title-in-carrollton">Read our Title Guide for Carrollton</a>.
</p>
      </div>
    </div>

  </div>
</div>

<style>
@keyframes slideInUp {
  from { opacity:0; transform: translateY(30px); }
  to { opacity:1; transform: translateY(0); }
}
@keyframes gradientShift {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}
</style>
@endsection
