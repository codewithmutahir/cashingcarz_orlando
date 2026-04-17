@extends('layouts.master')

@section('meta_title', 'We Buy Junk Cars For Cash in Seagoville, TX | Cashing Carz')
@section('meta_description', 'Get top dollar for Junk Cars Seagoville TX! We buy all makes in any condition. Fast pickup & instant cash offers today!')
@section('meta_keywords', 'Junk Cars Seagoville TX')
@section('meta_robots', 'index, follow')

@section('content')
<div class="junk-car-page" style="background: linear-gradient(135deg, #fff9f4 0%, #fdfdfd 50%, #f2f6ff 100%); padding: 2rem 0; font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">
    
    <!-- Hero Section -->
    <div class="hero-container" style="max-width: 1200px; margin: 0 auto; padding: 0 1rem;">
        <div class="hero-card" style="background: rgba(255, 255, 255, 0.97); backdrop-filter: blur(20px); border-radius: 24px; padding: 4rem 2rem; text-align: center; box-shadow: 0 25px 50px rgba(15, 12, 41, 0.15); border: 1px solid rgba(255, 255, 255, 0.3); position: relative; overflow: hidden; animation: slideInUp 0.8s ease-out;">
            <div style="position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, #FF6B35, #F7931E, #FFD23F, #06FFA5); background-size: 400% 400%; animation: gradientShift 8s ease infinite;"></div>
            
            <h1 style="font-size: clamp(2.5rem, 5vw, 3.5rem); font-weight: 800; background: linear-gradient(135deg, #0F0C29 0%, #FF6B35 50%, #302B63 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; margin-bottom: 1.5rem; line-height: 1.2;">
                Cash for Junk Cars in Seagoville, TX – Fast & Hassle-Free
            </h1>
            
            <p style="font-size: 1.2rem; color: #5A5A5A; margin-bottom: 2rem; max-width: 600px; margin-left: auto; margin-right: auto; line-height: 1.5;">
                Got a junk car taking up space? <strong style="color: #FF6B35;">Cashing Carz</strong> offers top cash, free towing, and same-day service in Seagoville, TX.
            </p>
            
            <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap; margin-bottom: 2rem;">
                <a href="{{ url('/get_offer') }}" style="background: linear-gradient(135deg, #FF6B35 0%, #F7931E 100%); color: white; padding: 1rem 2rem; border-radius: 50px; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 0.5rem; transition: all 0.3s ease; box-shadow: 0 8px 25px rgba(255, 107, 53, 0.4);">
                    <span style="font-size: 1.2rem;">💰</span> Get Free Quote
                </a>
                <a href="tel:+13214420085" style="background: rgba(6, 255, 165, 0.1); color: #0F0C29; padding: 1rem 2rem; border-radius: 50px; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 0.5rem; transition: all 0.3s ease; border: 2px solid #06FFA5;">
                    <span style="font-size: 1.2rem;">📞</span> Call Now
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content-container" style="max-width: 1200px; margin: 2rem auto; padding: 0 1rem;">
        
        <!-- What We Buy Section -->
        <div class="what-we-buy-card" style="background: rgba(255, 255, 255, 0.97); backdrop-filter: blur(20px); border-radius: 20px; padding: 3rem 2rem; margin-bottom: 2rem; box-shadow: 0 15px 35px rgba(15, 12, 41, 0.1); border: 1px solid rgba(255, 255, 255, 0.3);">
            <h2 style="font-size: 2.5rem; font-weight: 700; color: #0F0C29; margin-bottom: 2rem; text-align: center;">
                <span style="font-size: 2rem;">🚗</span> Vehicles We Buy in Seagoville
            </h2>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1rem;">
                <div style="background: linear-gradient(135deg, rgba(255, 107, 53, 0.1) 0%, rgba(247, 147, 30, 0.1) 100%); padding: 1rem; border-radius: 12px; text-align: center; border: 1px solid rgba(255, 107, 53, 0.2);">
                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">🚗</div>
                    <div style="font-weight: 600; color: #0F0C29;">Junk cars</div>
                </div>
                
                <div style="background: linear-gradient(135deg, rgba(6, 255, 165, 0.1) 0%, rgba(255, 210, 63, 0.1) 100%); padding: 1rem; border-radius: 12px; text-align: center; border: 1px solid rgba(6, 255, 165, 0.2);">
                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">🔧</div>
                    <div style="font-weight: 600; color: #0F0C29;">Wrecked or damaged</div>
                </div>
                
                <div style="background: linear-gradient(135deg, rgba(247, 147, 30, 0.1) 0%, rgba(255, 210, 63, 0.1) 100%); padding: 1rem; border-radius: 12px; text-align: center; border: 1px solid rgba(247, 147, 30, 0.2);">
                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">🛠</div>
                    <div style="font-weight: 600; color: #0F0C29;">Non-running vehicles</div>
                </div>
                
                <div style="background: linear-gradient(135deg, rgba(48, 43, 99, 0.1) 0%, rgba(36, 36, 62, 0.1) 100%); padding: 1rem; border-radius: 12px; text-align: center; border: 1px solid rgba(48, 43, 99, 0.2);">
                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">📜</div>
                    <div style="font-weight: 600; color: #0F0C29;">No title (some cases)</div>
                </div>
                
                <div style="background: linear-gradient(135deg, rgba(255, 107, 53, 0.1) 0%, rgba(6, 255, 165, 0.1) 100%); padding: 1rem; border-radius: 12px; text-align: center; border: 1px solid rgba(255, 107, 53, 0.2);">
                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">🚚</div>
                    <div style="font-weight: 600; color: #0F0C29;">Trucks, vans, SUVs</div>
                </div>
                
                <div style="background: linear-gradient(135deg, rgba(6, 255, 165, 0.1) 0%, rgba(255, 210, 63, 0.1) 100%); padding: 1rem; border-radius: 12px; text-align: center; border: 1px solid rgba(6, 255, 165, 0.2);">
                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">🚘</div>
                    <div style="font-weight: 600; color: #0F0C29;">Old, unwanted vehicles</div>
                </div>
            </div>
            
            <p style="text-align: center; margin-top: 2rem; font-size: 1.1rem; color: #5A5A5A; line-height: 1.5;">
                From clunkers to totaled vehicles—<strong style="color: #FF6B35;">we buy any car and pay you cash instantly.</strong>
            </p>
        </div>

        <!-- Process Section -->
        <div class="process-card" style="background: rgba(255, 255, 255, 0.97); backdrop-filter: blur(20px); border-radius: 20px; padding: 3rem 2rem; margin-bottom: 2rem; box-shadow: 0 15px 35px rgba(15, 12, 41, 0.1); border: 1px solid rgba(255, 255, 255, 0.3);">
            <h2 style="font-size: 2.5rem; font-weight: 700; color: #0F0C29; margin-bottom: 2rem; text-align: center;">
                <span style="font-size: 2rem;">🚘</span> Sell Your Car in 4 Easy Steps
            </h2>
            
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 2rem;">
                <div style="flex: 1; min-width: 250px; text-align: center; position: relative;">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #FF6B35 0%, #F7931E 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-size: 2rem; color: white; font-weight: bold; box-shadow: 0 8px 25px rgba(255, 107, 53, 0.3);">1</div>
                    <h3 style="font-size: 1.5rem; font-weight: 600; margin-bottom: 0.5rem; color: #0F0C29;">Get a Quote</h3>
                    <p style="color: #5A5A5A; margin: 0; line-height: 1.5;">Call or submit vehicle info online</p>
                </div>
                
                <div style="flex: 1; min-width: 250px; text-align: center; position: relative;">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #06FFA5 0%, #FFD23F 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-size: 2rem; color: white; font-weight: bold; box-shadow: 0 8px 25px rgba(6, 255, 165, 0.3);">2</div>
                    <h3 style="font-size: 1.5rem; font-weight: 600; margin-bottom: 0.5rem; color: #0F0C29;">Accept Offer</h3>
                    <p style="color: #5A5A5A; margin: 0; line-height: 1.5;">Receive a fair, no-obligation offer</p>
                </div>
                
                <div style="flex: 1; min-width: 250px; text-align: center; position: relative;">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #302B63 0%, #24243e 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-size: 2rem; color: white; font-weight: bold; box-shadow: 0 8px 25px rgba(48, 43, 99, 0.3);">3</div>
                    <h3 style="font-size: 1.5rem; font-weight: 600; margin-bottom: 0.5rem; color: #0F0C29;">Schedule Pickup</h3>
                    <p style="color: #5A5A5A; margin: 0; line-height: 1.5;">Choose a convenient time</p>
                </div>
                
                <div style="flex: 1; min-width: 250px; text-align: center; position: relative;">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #FF6B35 0%, #F7931E 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-size: 2rem; color: white; font-weight: bold; box-shadow: 0 8px 25px rgba(255, 107, 53, 0.3);">4</div>
                    <h3 style="font-size: 1.5rem; font-weight: 600; margin-bottom: 0.5rem; color: #0F0C29;">Get Paid</h3>
                    <p style="color: #5A5A5A; margin: 0; line-height: 1.5;">We pay cash and tow for free</p>
                </div>
            </div>
        </div>

        <!-- Benefits Section -->
        <div class="benefits-card" style="background: rgba(255, 255, 255, 0.97); backdrop-filter: blur(20px); border-radius: 20px; padding: 3rem 2rem; margin-bottom: 2rem; box-shadow: 0 15px 35px rgba(15, 12, 41, 0.1); border: 1px solid rgba(255, 255, 255, 0.3);">
            <h2 style="font-size: 2.5rem; font-weight: 700; color: #0F0C29; margin-bottom: 2rem; text-align: center;">
                <span style="font-size: 2rem;">⭐</span> Why Choose Cashing Carz?
            </h2>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
                <div style="background: linear-gradient(135deg, rgba(255, 107, 53, 0.08) 0%, rgba(247, 147, 30, 0.08) 100%); padding: 1.5rem; border-radius: 16px; border-left: 4px solid #FF6B35;">
                    <div style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #0F0C29; font-weight: 600;">✅ Top Cash Offers</div>
                    <p style="color: #5A5A5A; margin: 0; line-height: 1.5;">Paid instantly on the spot</p>
                </div>
                
                <div style="background: linear-gradient(135deg, rgba(6, 255, 165, 0.08) 0%, rgba(255, 210, 63, 0.08) 100%); padding: 1.5rem; border-radius: 16px; border-left: 4px solid #06FFA5;">
                    <div style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #0F0C29; font-weight: 600;">✅ Free Towing</div>
                    <p style="color: #5A5A5A; margin: 0; line-height: 1.5;">No cost for removal</p>
                </div>
                
                <div style="background: linear-gradient(135deg, rgba(247, 147, 30, 0.08) 0%, rgba(255, 210, 63, 0.08) 100%); padding: 1.5rem; border-radius: 16px; border-left: 4px solid #F7931E;">
                    <div style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #0F0C29; font-weight: 600;">✅ Same-Day Pickup</div>
                    <p style="color: #5A5A5A; margin: 0; line-height: 1.5;">Fast and convenient service</p>
                </div>
                
                <div style="background: linear-gradient(135deg, rgba(48, 43, 99, 0.08) 0%, rgba(36, 36, 62, 0.08) 100%); padding: 1.5rem; border-radius: 16px; border-left: 4px solid #302B63;">
                    <div style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #0F0C29; font-weight: 600;">✅ Reliable Service</div>
                    <p style="color: #5A5A5A; margin: 0; line-height: 1.5;">Trusted in Seagoville</p>
                </div>
            </div>
        </div>

        <!-- Junk Car Removal Section -->
        <div class="removal-card" style="background: linear-gradient(135deg, rgba(255, 107, 53, 0.12) 0%, rgba(247, 147, 30, 0.12) 100%); backdrop-filter: blur(20px); border-radius: 20px; padding: 3rem 2rem; margin-bottom: 2rem; box-shadow: 0 15px 35px rgba(255, 107, 53, 0.1); border: 1px solid rgba(255, 107, 53, 0.2);">
            <h2 style="font-size: 2.5rem; font-weight: 700; color: #0F0C29; margin-bottom: 2rem; text-align: center;">
                <span style="font-size: 2rem;">🛻</span> Junk Car Removal in Seagoville
            </h2>
            
            <p style="font-size: 1.1rem; color: #5A5A5A; text-align: center; max-width: 800px; margin: 0 auto; line-height: 1.5;">
                Searching for <strong>“Junk cars Seagoville TX”</strong>? <strong style="color: #FF6B35;">Cashing Carz</strong> provides free towing with every purchase. Whether your car is in a driveway, garage, or lot, we’ll pick it up and pay you cash—no fees, no delays.
            </p>
        </div>

        <!-- Eco-Friendly Section -->
        <div class="eco-card" style="background: linear-gradient(135deg, rgba(6, 255, 165, 0.12) 0%, rgba(255, 210, 63, 0.12) 100%); backdrop-filter: blur(20px); border-radius: 20px; padding: 3rem 2rem; margin-bottom: 2rem; box-shadow: 0 15px 35px rgba(6, 255, 165, 0.1); border: 1px solid rgba(6, 255, 165, 0.2);">
            <h2 style="font-size: 2.5rem; font-weight: 700; color: #0F0C29; margin-bottom: 2rem; text-align: center;">
                <span style="font-size: 2rem;">♻️</span> Eco-Friendly Car Recycling
            </h2>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; text-align: center;">
                <div>
                    <div style="font-size: 3rem; margin-bottom: 1rem;">♻️</div>
                    <h4 style="font-weight: 600; color: #0F0C29; margin-bottom: 0.5rem;">Reuse Parts</h4>
                    <p style="color: #5A5A5A; margin: 0; line-height: 1.5;">Salvage working components</p>
                </div>
                
                <div>
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🛡️</div>
                    <h4 style="font-weight: 600; color: #0F0C29; margin-bottom: 0.5rem;">Safe Disposal</h4>
                    <p style="color: #5A5A5A; margin: 0; line-height: 1.5;">Handle fluids responsibly</p>
                </div>
                
                <div>
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🔩</div>
                    <h4 style="font-weight: 600; color: #0F0C29; margin-bottom: 0.5rem;">Recycle Metals</h4>
                    <p style="color: #5A5A5A; margin: 0; line-height: 1.5;">Crush and recycle frames</p>
                </div>
            </div>
            
            <p style="text-align: center; margin-top: 2rem; font-size: 1.1rem; color: #0F0C29; font-weight: 500; line-height: 1.5;">
                Earn cash and help keep Seagoville green! 🌱
            </p>
        </div>

        <!-- Location Section -->
        <div class="location-card" style="background: rgba(255, 255, 255, 0.97); backdrop-filter: blur(20px); border-radius: 20px; padding: 3rem 2rem; margin-bottom: 2rem; box-shadow: 0 15px 35px rgba(15, 12, 41, 0.1); border: 1px solid rgba(255, 255, 255, 0.3);">
            <h2 style="font-size: 2.5rem; font-weight: 700; color: #0F0C29; margin-bottom: 2rem; text-align: center;">
                <span style="font-size: 2rem;">📍</span> Serving Seagoville and Nearby Areas
            </h2>
            
            <div style="display: flex; justify-content: center; gap: 2rem; flex-wrap: wrap;">
                <div style="background: linear-gradient(135deg, rgba(255, 107, 53, 0.1) 0%, rgba(247, 147, 30, 0.1) 100%); padding: 1rem 2rem; border-radius: 50px; font-weight: 600; color: #0F0C29; border: 1px solid rgba(255, 107, 53, 0.2);">
                    📍 Seagoville
                </div>
                <div style="background: linear-gradient(135deg, rgba(6, 255, 165, 0.1) 0%, rgba(255, 210, 63, 0.1) 100%); padding: 1rem 2rem; border-radius: 50px; font-weight: 600; color: #0F0C29; border: 1px solid rgba(6, 255, 165, 0.2);">
                    📍 Dallas
                </div>
                <div style="background: linear-gradient(135deg, rgba(48, 43, 99, 0.1) 0%, rgba(36, 36, 62, 0.1) 100%); padding: 1rem 2rem; border-radius: 50px; font-weight: 600; color: #0F0C29; border: 1px solid rgba(48, 43, 99, 0.2);">
                    📍 Mesquite
                </div>
                <div style="background: linear-gradient(135deg, rgba(255, 107, 53, 0.1) 0%, rgba(247, 147, 30, 0.1) 100%); padding: 1rem 2rem; border-radius: 50px; font-weight: 600; color: #0F0C29; border: 1px solid rgba(255, 107, 53, 0.2);">
                    📍 Balch Springs
                </div>
            </div>
            <p style="text-align: center; margin-top: 2rem; font-size: 1.1rem; color: #5A5A5A; line-height: 1.5;">
                ZIP codes: 75159, and nearby areas.
            </p>
        </div>

        <!-- Contact Section -->
        <div class="contact-card" style="background: linear-gradient(135deg, #0F0C29 0%, #302B63 50%, #24243e 100%); border-radius: 20px; padding: 4rem 2rem; text-align: center; box-shadow: 0 20px 50px rgba(15, 12, 41, 0.4); color: white; position: relative; overflow: hidden;">
            <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: radial-gradient(circle at 30% 40%, rgba(255, 107, 53, 0.1) 0%, transparent 50%), radial-gradient(circle at 80% 10%, rgba(6, 255, 165, 0.1) 0%, transparent 50%); pointer-events: none;"></div>
            
            <div style="position: relative; z-index: 1;">
                <h2 style="font-size: 2.5rem; font-weight: 700; margin-bottom: 1rem; color: white;">
                    <span style="font-size: 2rem;">🚖</span> Ready to Sell Your Junk Car in Seagoville?
                </h2>
                
                <p style="font-size: 1.2rem; margin-bottom: 2rem; opacity: 0.9; max-width: 600px; margin-left: auto; margin-right: auto; line-height: 1.5;">
                    Searching for <strong>“Junk cars Seagoville TX”</strong>? <strong style="color: #FF6B35;">Cashing Carz</strong> offers fast, free towing, and instant cash payments.
                </p>
                
                <div style="display: flex; justify-content: center; gap: 2rem; flex-wrap: wrap; margin-bottom: 2rem;">
                    <div style="background: rgba(255, 255, 255, 0.1); padding: 1.5rem; border-radius: 16px; backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2);">
                        <div style="font-size: 1.1rem; opacity: 0.8; margin-bottom: 0.5rem;">Florida Office</div>
                        <a href="tel:+13214420085" style="color: #06FFA5; text-decoration: none; font-size: 1.3rem; font-weight: 600;">
                            📞 +1 321-442-0085
                        </a>
                    </div>
                    
                    <div style="background: rgba(255, 255, 255, 0.1); padding: 1.5rem; border-radius: 16px; backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2);">
                        <div style="font-size: 1.1rem; opacity: 0.8; margin-bottom: 0.5rem;">Dallas HQ</div>
                        <a href="tel:+14693838321" style="color: #FFD23F; text-decoration: none; font-size: 1.3rem; font-weight: 600;">
                            📞 +1 469-383-8321
                        </a>
                    </div>
                </div>
                
                <a href="{{ url('/get_offer') }}" style="background: linear-gradient(135deg, #FF6B35 0%, #F7931E 100%); color: white; padding: 1.2rem 3rem; border-radius: 50px; text-decoration: none; font-weight: 700; font-size: 1.2rem; display: inline-flex; align-items: center; gap: 0.5rem; transition: all 0.3s ease; box-shadow: 0 10px 30px rgba(255, 107, 53, 0.4);">
                    <span style="font-size: 1.5rem;">🚖</span> Get Your Free Quote Now
                </a>
                 <p style="margin:16px;">
    Want to know how to get your title in Seagoville? 
    <a class="anchor-location" href="https://cashingcarz.com/how-to-get-your-title-in-seagoville">Read our Title Guide for Seagoville</a>.
</p>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes slideInUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes gradientShift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* Ensure mobile readability */
@media (max-width: 768px) {
    p, li {
        line-height: 1.6 !important;
    }
}
</style>
@endsection