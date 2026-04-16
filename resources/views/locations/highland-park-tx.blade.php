@extends('layouts.master')

@section('meta_title', 'We Pay Cash For Junk Cars in Highland Park, TX | Cashing Carz')
@section('meta_description', 'Get top dollar for clunkers—Highland Park we buy junk cars with free towing & instant cash offers. Call now for a fast quote!')
@section('meta_keywords', 'Cash for Junk Cars Highland Park')
@section('meta_robots', 'index, follow')

@section('content')
<div class="junk-car-page" style="background: linear-gradient(135deg, #fff9f4 0%, #fdfdfd 50%, #f2f6ff 100%); padding: 2rem 0; margin-top: 100px; font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">
    
    <!-- Hero Section -->
    <div class="hero-container" style="max-width: 1200px; margin: 0 auto; padding: 0 1rem;">
        <div class="hero-card" style="background: rgba(255, 255, 255, 0.97); backdrop-filter: blur(20px); border-radius: 24px; padding: 3rem 1.5rem; text-align: center; box-shadow: 0 25px 50px rgba(15, 12, 41, 0.15); border: 1px solid rgba(255, 255, 255, 0.3); position: relative; overflow: hidden; animation: slideInUp 0.8s ease-out;">
            <div style="position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, #FF6B35, #F7931E, #FFD23F, #06FFA5); background-size: 400% 400%; animation: gradientShift 8s ease infinite;"></div>
            
            <h1 style="font-size: clamp(2rem, 4.5vw, 3rem); font-weight: 800; background: linear-gradient(135deg, #0F0C29 0%, #FF6B35 50%, #302B63 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; margin-bottom: 1.5rem; line-height: 1.2;">
                Cash for Junk Cars in Highland Park, TX – Fast & Hassle-Free
            </h1>
            
            <p style="font-size: clamp(1rem, 3vw, 1.1rem); color: #5A5A5A; margin-bottom: 1.5rem; max-width: 600px; margin-left: auto; margin-right: auto; line-height: 1.5;">
                Got a junk car taking up space? <strong style="color: #FF6B35;">Cashing Carz</strong> offers top cash, free towing, and same-day service in Highland Park, TX.
            </p>
            
            <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap; margin-bottom: 1.5rem;">
                <a href="{{ url('/get_offer') }}" style="background: linear-gradient(135deg, #FF6B35 0%, #F7931E 100%); color: white; padding: 0.8rem 1.5rem; border-radius: 50px; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 0.5rem; transition: all 0.3s ease; box-shadow: 0 8px 25px rgba(255, 107, 53, 0.4); font-size: clamp(0.9rem, 2.5vw, 1rem);">
                    <span style="font-size: 1.1rem;">💰</span> Get Free Quote
                </a>
                <a href="tel:+14693838321" style="background: rgba(6, 255, 165, 0.1); color: #0F0C29; padding: 0.8rem 1.5rem; border-radius: 50px; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 0.5rem; transition: all 0.3s ease; border: 2px solid #06FFA5; font-size: clamp(0.9rem, 2.5vw, 1rem);">
                    <span style="font-size: 1.1rem;">📞</span> Call Now
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content-container" style="max-width: 1200px; margin: 2rem auto; padding: 0 1rem;">
        
        <!-- What We Buy Section -->
        <div class="what-we-buy-card" style="background: rgba(255, 255, 255, 0.97); backdrop-filter: blur(20px); border-radius: 20px; padding: 2rem 1.5rem; margin-bottom: 2rem; box-shadow: 0 15px 35px rgba(15, 12, 41, 0.1); border: 1px solid rgba(255, 255, 255, 0.3);">
            <h2 style="font-size: clamp(1.8rem, 4vw, 2.2rem); font-weight: 700; color: #0F0C29; margin-bottom: 1.5rem; text-align: center;">
                <span style="font-size: 1.8rem;">🚗</span> Vehicles We Buy in Highland Park
            </h2>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                <div style="background: linear-gradient(135deg, rgba(255, 107, 53, 0.1) 0%, rgba(247, 147, 30, 0.1) 100%); padding: 1rem; border-radius: 12px; text-align: center; border: 1px solid rgba(255, 107, 53, 0.2);">
                    <div style="font-size: 1.8rem; margin-bottom: 0.5rem;">🚗</div>
                    <div style="font-weight: 600; color: #0F0C29; font-size: 0.95rem;">Junk cars</div>
                </div>
                
                <div style="background: linear-gradient(135deg, rgba(6, 255, 165, 0.1) 0%, rgba(255, 210, 63, 0.1) 100%); padding: 1rem; border-radius: 12px; text-align: center; border: 1px solid rgba(6, 255, 165, 0.2);">
                    <div style="font-size: 1.8rem; margin-bottom: 0.5rem;">🔧</div>
                    <div style="font-weight: 600; color: #0F0C29; font-size: 0.95rem;">Wrecked or damaged</div>
                </div>
                
                <div style="background: linear-gradient(135deg, rgba(247, 147, 30, 0.1) 0%, rgba(255, 210, 63, 0.1) 100%); padding: 1rem; border-radius: 12px; text-align: center; border: 1px solid rgba(247, 147, 30, 0.2);">
                    <div style="font-size: 1.8rem; margin-bottom: 0.5rem;">🛠</div>
                    <div style="font-weight: 600; color: #0F0C29; font-size: 0.95rem;">Non-running vehicles</div>
                </div>
                
                <div style="background: linear-gradient(135deg, rgba(48, 43, 99, 0.1) 0%, rgba(36, 36, 62, 0.1) 100%); padding: 1rem; border-radius: 12px; text-align: center; border: 1px solid rgba(48, 43, 99, 0.2);">
                    <div style="font-size: 1.8rem; margin-bottom: 0.5rem;">📜</div>
                    <div style="font-weight: 600; color: #0F0C29; font-size: 0.95rem;">No title (some cases)</div>
                </div>
                
                <div style="background: linear-gradient(135deg, rgba(255, 107, 53, 0.1) 0%, rgba(6, 255, 165, 0.1) 100%); padding: 1rem; border-radius: 12px; text-align: center; border: 1px solid rgba(255, 107, 53, 0.2);">
                    <div style="font-size: 1.8rem; margin-bottom: 0.5rem;">🚚</div>
                    <div style="font-weight: 600; color: #0F0C29; font-size: 0.95rem;">Trucks, vans, SUVs</div>
                </div>
                
                <div style="background: linear-gradient(135deg, rgba(6, 255, 165, 0.1) 0%, rgba(255, 210, 63, 0.1) 100%); padding: 1rem; border-radius: 12px; text-align: center; border: 1px solid rgba(6, 255, 165, 0.2);">
                    <div style="font-size: 1.8rem; margin-bottom: 0.5rem;">🚘</div>
                    <div style="font-weight: 600; color: #0F0C29; font-size: 0.95rem;">Old, unwanted vehicles</div>
                </div>
            </div>
            
            <p style="text-align: center; margin-top: 1.5rem; font-size: clamp(0.95rem, 2.5vw, 1rem); color: #5A5A5A; line-height: 1.5;">
                From clunkers to totaled vehicles—<strong style="color: #FF6B35;">we buy any car and pay you cash instantly.</strong>
            </p>
        </div>

        <!-- Process Section -->
        <div class="process-card" style="background: rgba(255, 255, 255, 0.97); backdrop-filter: blur(20px); border-radius: 20px; padding: 2rem 1.5rem; margin-bottom: 2rem; box-shadow: 0 15px 35px rgba(15, 12, 41, 0.1); border: 1px solid rgba(255, 255, 255, 0.3);">
            <h2 style="font-size: clamp(1.8rem, 4vw, 2.2rem); font-weight: 700; color: #0F0C29; margin-bottom: 1.5rem; text-align: center;">
                <span style="font-size: 1.8rem;">🚘</span> Our Simple 3-Step Process
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
                     <p style="margin:16px;">
    Want to know how to get your title in Highland Park? 
    <a class="anchor-location"  href="https://cashingcarz.com/how-to-get-your-title-in-highlandpark">Read our Title Guide for Highland Park</a>.
</p>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
/* Animations */
@keyframes slideInUp {
  from { opacity: 0; transform: translateY(30px); }
  to { opacity: 1; transform: translateY(0); }
}
@keyframes gradientShift {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}

/* Global responsive styles */
.junk-car-page {
  margin-top: 80px; /* Reduced for mobile */
}

/* Hero section */
.hero-card {
  padding: 2.5rem 1rem;
}

/* What we buy */
.what-we-buy-card {
  padding: 1.5rem 1rem;
}
.what-we-buy-card .grid {
  grid-template-columns: 1fr;
}

/* Process section */
.process-card {
  padding: 1.5rem 1rem;
}
.process-card .steps {
  flex-direction: column;
  align-items: center;
}
.process-card .step {
  min-width: 180px;
  margin-bottom: 1rem;
}

/* Media queries for larger screens */
@media (min-width: 768px) {
  .junk-car-page {
    margin-top: 100px;
  }
  .hero-card {
    padding: 3rem 2rem;
  }
  .what-we-buy-card {
    padding: 2rem 1.5rem;
  }
  .what-we-buy-card .grid {
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  }
  .process-card {
    padding: 2rem 1.5rem;
  }
  .process-card .steps {
    flex-direction: row;
  }
  .process-card .step {
    min-width: 200px;
    margin-bottom: 0;
  }
}

@media (min-width: 1024px) {
  .hero-container {
    padding: 0 2rem;
  }
  .content-container {
    padding: 0 2rem;
  }
}
</style>

@endsection