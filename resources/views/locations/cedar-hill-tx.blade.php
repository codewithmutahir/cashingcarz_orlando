@extends('layouts.master')

@section('meta_title', 'Сash For Junk Cars in Cedar Hill (TX) | Cashing Carz')
@section('meta_description', 'Get top cash offers for junk cars Cedar Hill TX. Fast removal, same-day service, and hassle-free process for your unwanted vehicles.')
@section('meta_keywords', 'Junk Cars Cedar Hill TX')
@section('meta_robots', 'index, follow')

@section('content')
<div class="junk-car-page" style="background: linear-gradient(135deg, #fff9f4 0%, #fdfdfd 50%, #f2f6ff 100%); padding: 2rem 0; margin-top:150px; font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">
    
    <!-- Hero Section -->
    <div class="hero-container" style="max-width: 1200px; margin: 0 auto; padding: 0 1rem;">
        <div class="hero-card" style="background: rgba(255, 255, 255, 0.97); backdrop-filter: blur(20px); border-radius: 24px; padding: 4rem 2rem; text-align: center; box-shadow: 0 25px 50px rgba(15, 12, 41, 0.15); border: 1px solid rgba(255, 255, 255, 0.3); position: relative; overflow: hidden; animation: slideInUp 0.8s ease-out;">
            <div style="position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, #FF6B35, #F7931E, #FFD23F, #06FFA5); background-size: 400% 400%; animation: gradientShift 8s ease infinite;"></div>
            
            <h1 style="font-size: clamp(2.5rem, 5vw, 3.5rem); font-weight: 800; background: linear-gradient(135deg, #0F0C29 0%, #FF6B35 50%, #302B63 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; margin-bottom: 1.5rem; line-height: 1.2;">
                Cash for Junk Cars in Cedar Hill, TX – Get Paid Today
            </h1>
            
            <p style="font-size: 1.2rem; color: #5A5A5A; margin-bottom: 2rem; max-width: 600px; margin-left: auto; margin-right: auto;">
                Got a junk car collecting dust? <strong style="color: #FF6B35;">Cashing Carz</strong> offers fast, hassle-free junk car removal in Cedar Hill with top cash payouts and free towing.
            </p>
            
            <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap; margin-bottom: 2rem;">
                <a href="{{ url('/get_offer') }}" style="background: linear-gradient(135deg, #FF6B35 0%, #F7931E 100%); color: white; padding: 1rem 2rem; border-radius: 50px; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 0.5rem; transition: all 0.3s ease; box-shadow: 0 8px 25px rgba(255, 107, 53, 0.4);">
                    <span style="font-size: 1.2rem;">💰</span> Get Free Quote
                </a>
                <a href="tel:+14693838321" style="background: rgba(6, 255, 165, 0.1); color: #0F0C29; padding: 1rem 2rem; border-radius: 50px; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 0.5rem; transition: all 0.3s ease; border: 2px solid #06FFA5;">
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
                <span style="font-size: 2rem;">🚗</span> Junk Cars Cedar Hill TX? We’ll Buy Them All
            </h2>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1rem;">
                <div style="background: linear-gradient(135deg, rgba(255, 107, 53, 0.1) 0%, rgba(247, 147, 30, 0.1) 100%); padding: 1rem; border-radius: 12px; text-align: center; border: 1px solid rgba(255, 107, 53, 0.2);">
                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">🚗</div>
                    <div style="font-weight: 600; color: #0F0C29;">Non-running vehicles</div>
                </div>
                
                <div style="background: linear-gradient(135deg, rgba(6, 255, 165, 0.1) 0%, rgba(255, 210, 63, 0.1) 100%); padding: 1rem; border-radius: 12px; text-align: center; border: 1px solid rgba(6, 255, 165, 0.2);">
                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">🔧</div>
                    <div style="font-weight: 600; color: #0F0C29;">Wrecked or totaled</div>
                </div>
                
                <div style="background: linear-gradient(135deg, rgba(247, 147, 30, 0.1) 0%, rgba(255, 210, 63, 0.1) 100%); padding: 1rem; border-radius: 12px; text-align: center; border: 1px solid rgba(247, 147, 30, 0.2);">
                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">🛠</div>
                    <div style="font-weight: 600; color: #0F0C29;">Missing parts</div>
                </div>
                
                <div style="background: linear-gradient(135deg, rgba(48, 43, 99, 0.1) 0%, rgba(36, 36, 62, 0.1) 100%); padding: 1rem; border-radius: 12px; text-align: center; border: 1px solid rgba(48, 43, 99, 0.2);">
                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">📋</div>
                    <div style="font-weight: 600; color: #0F0C29;">Expired registration</div>
                </div>
                
                <div style="background: linear-gradient(135deg, rgba(255, 107, 53, 0.1) 0%, rgba(6, 255, 165, 0.1) 100%); padding: 1rem; border-radius: 12px; text-align: center; border: 1px solid rgba(255, 107, 53, 0.2);">
                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">🏠</div>
                    <div style="font-weight: 600; color: #0F0C29;">Abandoned vehicles</div>
                </div>
            </div>
            
            <p style="text-align: center; margin-top: 2rem; font-size: 1.1rem; color: #5A5A5A;">
                Even if your vehicle hasn’t moved in years, <strong style="color: #FF6B35;">we’ll take it and pay you on the spot.</strong>
            </p>
        </div>

        <!-- Process Section -->
        <div class="process-card" style="background: rgba(255, 255, 255, 0.97); backdrop-filter: blur(20px); border-radius: 20px; padding: 3rem 2rem; margin-bottom: 2rem; box-shadow: 0 15px 35px rgba(15, 12, 41, 0.1); border: 1px solid rgba(255, 255, 255, 0.3);">
            <h2 style="font-size: 2.5rem; font-weight: 700; color: #0F0C29; margin-bottom: 2rem; text-align: center;">
                <span style="font-size: 2rem;">🧾</span> Scrap My Car for Cash in Cedar Hill
            </h2>
            
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 2rem;">
                <div style="flex: 1; min-width: 250px; text-align: center; position: relative;">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #FF6B35 0%, #F7931E 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-size: 2rem; color: white; font-weight: bold; box-shadow: 0 8px 25px rgba(255, 107, 53, 0.3);">1</div>
                    <h3 style="font-size: 1.5rem; font-weight: 600; margin-bottom: 0.5rem; color: #0F0C29;">Get a Fast Quote</h3>
                    <p style="color: #5A5A5A; margin: 0;">Call or fill out our online form for an instant no-obligation offer</p>
                </div>
                
                <div style="flex: 1; min-width: 250px; text-align: center; position: relative;">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #06FFA5 0%, #FFD23F 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-size: 2rem; color: white; font-weight: bold; box-shadow: 0 8px 25px rgba(6, 255, 165, 0.3);">2</div>
                    <h3 style="font-size: 1.5rem; font-weight: 600; margin-bottom: 0.5rem; color: #0F0C29;">Schedule Free Pickup</h3>
                    <p style="color: #5A5A5A; margin: 0;">Accept our offer and schedule pickup, often same-day</p>
                </div>
                
                <div style="flex: 1; min-width: 250px; text-align: center; position: relative;">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #302B63 0%, #24243e 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-size: 2rem; color: white; font-weight: bold; box-shadow: 0 8px 25px rgba(48, 43, 99, 0.3);">3</div>
                    <h3 style="font-size: 1.5rem; font-weight: 600; margin-bottom: 0.5rem; color: #0F0C29;">Get Paid</h3>
                    <p style="color: #5A5A5A; margin: 0;">We tow it for free, handle paperwork, and pay you cash instantly</p>
                </div>
            </div>
        </div>

        <!-- Benefits Section -->
        <div class="benefits-card" style="background: rgba(255, 255, 255, 0.97); backdrop-filter: blur(20px); border-radius: 20px; padding: 3rem 2rem; margin-bottom: 2rem; box-shadow: 0 15px 35px rgba(15, 12, 41, 0.1); border: 1px solid rgba(255, 255, 255, 0.3);">
            <h2 style="font-size: 2.5rem; font-weight: 700; color: #0F0C29; margin-bottom: 2rem; text-align: center;">
                <span style="font-size: 2rem;">🔧</span> We’re More Than Just a Junk Car Buyer
            </h2>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
                <div style="background: linear-gradient(135deg, rgba(255, 107, 53, 0.08) 0%, rgba(247, 147, 30, 0.08) 100%); padding: 1.5rem; border-radius: 16px; border-left: 4px solid #FF6B35;">
                    <div style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #0F0C29; font-weight: 600;">✅ Junk Car Removal</div>
                    <p style="color: #5A5A5A; margin: 0;">Fast and free towing service</p>
                </div>
                
                <div style="background: linear-gradient(135deg, rgba(6, 255, 165, 0.08) 0%, rgba(255, 210, 63, 0.08) 100%); padding: 1.5rem; border-radius: 16px; border-left: 4px solid #06FFA5;">
                    <div style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #0F0C29; font-weight: 600;">✅ Scrap Car Recycling</div>
                    <p style="color: #5A5A5A; margin: 0;">Eco-friendly disposal of materials</p>
                </div>
                
                <div style="background: linear-gradient(135deg, rgba(247, 147, 30, 0.08) 0%, rgba(255, 210, 63, 0.08) 100%); padding: 1.5rem; border-radius: 16px; border-left: 4px solid #F7931E;">
                    <div style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #0F0C29; font-weight: 600;">✅ Cash for Broken Cars</div>
                    <p style="color: #5A5A5A; margin: 0;">Top dollar for any condition</p>
                </div>
                
                <div style="background: linear-gradient(135deg, rgba(48, 43, 99, 0.08) 0%, rgba(36, 36, 62, 0.08) 100%); padding: 1.5rem; border-radius: 16px; border-left: 4px solid #302B63;">
                    <div style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #0F0C29; font-weight: 600;">✅ Local Service</div>
                    <p style="color: #5A5A5A; margin: 0;">Trusted Cedar Hill team</p>
                </div>
            </div>
        </div>

        <!-- Location Section -->
        <div class="location-card" style="background: rgba(255, 255, 255, 0.97); backdrop-filter: blur(20px); border-radius: 20px; padding: 3rem 2rem; margin-bottom: 2rem; box-shadow: 0 15px 35px rgba(15, 12, 41, 0.1); border: 1px solid rgba(255, 255, 255, 0.3);">
            <h2 style="font-size: 2.5rem; font-weight: 700; color: #0F0C29; margin-bottom: 2rem; text-align: center;">
                <span style="font-size: 2rem;">📍</span> Local Junk Car Buyer in Cedar Hill
            </h2>
            
            <div style="display: flex; justify-content: center; gap: 2rem; flex-wrap: wrap;">
                <div style="background: linear-gradient(135deg, rgba(255, 107, 53, 0.1) 0%, rgba(247, 147, 30, 0.1) 100%); padding: 1rem 2rem; border-radius: 50px; font-weight: 600; color: #0F0C29; border: 1px solid rgba(255, 107, 53, 0.2);">
                    📍 Belt Line Rd
                </div>
                <div style="background: linear-gradient(135deg, rgba(6, 255, 165, 0.1) 0%, rgba(255, 210, 63, 0.1) 100%); padding: 1rem 2rem; border-radius: 50px; font-weight: 600; color: #0F0C29; border: 1px solid rgba(6, 255, 165, 0.2);">
                    📍 Joe Wilson Rd
                </div>
                <div style="background: linear-gradient(135deg, rgba(48, 43, 99, 0.1) 0%, rgba(36, 36, 62, 0.1) 100%); padding: 1rem 2rem; border-radius: 50px; font-weight: 600; color: #0F0C29; border: 1px solid rgba(48, 43, 99, 0.2);">
                    📍 Pleasant Run
                </div>
                <div style="background: linear-gradient(135deg, rgba(255, 107, 53, 0.1) 0%, rgba(6, 255, 165, 0.1) 100%); padding: 1rem 2rem; border-radius: 50px; font-weight: 600; color: #0F0C29; border: 1px solid rgba(255, 107, 53, 0.2);">
                    📍 Lake Ridge Pkwy
                </div>
                <div style="background: linear-gradient(135deg, rgba(247, 147, 30, 0.1) 0%, rgba(255, 210, 63, 0.1) 100%); padding: 1rem 2rem; border-radius: 50px; font-weight: 600; color: #0F0C29; border: 1px solid rgba(247, 147, 30, 0.2);">
                    📍 High Pointe
                </div>
            </div>
        </div>

        <!-- Testimonials Section -->
        <div class="testimonials-card" style="background: rgba(255, 255, 255, 0.97); backdrop-filter: blur(20px); border-radius: 20px; padding: 3rem 2rem; margin-bottom: 2rem; box-shadow: 0 15px 35px rgba(15, 12, 41, 0.1); border: 1px solid rgba(255, 255, 255, 0.3);">
            <h2 style="font-size: 2.5rem; font-weight: 700; color: #0F0C29; margin-bottom: 2rem; text-align: center;">
                <span style="font-size: 2rem;">⭐</span> What Our Cedar Hill Customers Say
            </h2>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
                <div style="background: linear-gradient(135deg, rgba(255, 107, 53, 0.08) 0%, rgba(247, 147, 30, 0.08) 100%); padding: 1.5rem; border-radius: 16px; border-left: 4px solid #FF6B35;">
                    <p style="color: #5A5A5A; margin: 0;">"I had an old truck that wouldn’t start. Cashing Carz gave me $475 and picked it up the same afternoon. Super easy!"</p>
                    <div style="font-size: 1.2rem; margin-top: 1rem; color: #0F0C29; font-weight: 600;">— James W., Cedar Hill TX</div>
                </div>
                
                <div style="background: linear-gradient(135deg, rgba(6, 255, 165, 0.08) 0%, rgba(255, 210, 63, 0.08) 100%); padding: 1.5rem; border-radius: 16px; border-left: 4px solid #06FFA5;">
                    <p style="color: #5A5A5A; margin: 0;">"Selling my junk car took less than 15 minutes. They towed it for free and paid cash on the spot. Highly recommend!"</p>
                    <div style="font-size: 1.2rem; margin-top: 1rem; color: #0F0C29; font-weight: 600;">— Tamika R., Cedar Hill TX</div>
                </div>
            </div>
        </div>

        <!-- Eco-Friendly Section -->
        <div class="eco-card" style="background: linear-gradient(135deg, rgba(6, 255, 165, 0.12) 0%, rgba(255, 210, 63, 0.12) 100%); backdrop-filter: blur(20px); border-radius: 20px; padding: 3rem 2rem; margin-bottom: 2rem; box-shadow: 0 15px 35px rgba(6, 255, 165, 0.1); border: 1px solid rgba(6, 255, 165, 0.2);">
            <h2 style="font-size: 2.5rem; font-weight: 700; color: #0F0C29; margin-bottom: 2rem; text-align: center;">
                <span style="font-size: 2rem;">🔄</span> Eco-Friendly Car Recycling
            </h2>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; text-align: center;">
                <div>
                    <div style="font-size: 3rem; margin-bottom: 1rem;">♻️</div>
                    <h4 style="font-weight: 600; color: #0F0C29; margin-bottom: 0.5rem;">Reuse Parts</h4>
                    <p style="color: #5A5A5A; margin: 0;">Salvage working components</p>
                </div>
                
                <div>
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🔩</div>
                    <h4 style="font-weight: 600; color: #0F0C29; margin-bottom: 0.5rem;">Recycle Metals</h4>
                    <p style="color: #5A5A5A; margin: 0;">Process valuable materials</p>
                </div>
                
                <div>
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🛡️</div>
                    <h4 style="font-weight: 600; color: #0F0C29; margin-bottom: 0.5rem;">Safe Disposal</h4>
                    <p style="color: #5A5A5A; margin: 0;">Handle fluids responsibly</p>
                </div>
            </div>
            
            <p style="text-align: center; margin-top: 2rem; font-size: 1.1rem; color: #0F0C29; font-weight: 500;">
                Help keep Texas clean and green while earning cash! 🌱
            </p>
        </div>

        <!-- Contact Section -->
        <div class="contact-card" style="background: linear-gradient(135deg, #0F0C29 0%, #302B63 50%, #24243e 100%); border-radius: 20px; padding: 4rem 2rem; text-align: center; box-shadow: 0 20px 50px rgba(15, 12, 41, 0.4); color: white; position: relative; overflow: hidden;">
            <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: radial-gradient(circle at 30% 40%, rgba(255, 107, 53, 0.1) 0%, transparent 50%), radial-gradient(circle at 80% 10%, rgba(6, 255, 165, 0.1) 0%, transparent 50%); pointer-events: none;"></div>
            
            <div style="position: relative; z-index: 1;">
                <h2 style="font-size: 2.5rem; font-weight: 700; margin-bottom: 1rem; color: white;">
                    <span style="font-size: 2rem;">💬</span> Ready to Sell Your Junk Car in Cedar Hill?
                </h2>
                
                <p style="font-size: 1.2rem; margin-bottom: 2rem; opacity: 0.9; max-width: 600px; margin-left: auto; margin-right: auto;">
                    Searching for <strong>"junk car removal Cedar Hill"</strong>? <strong>Cashing Carz</strong> offers fast, free towing and instant cash. Clear space and get paid today!
                </p>
                
                <div style="display: flex; justify-content: center; gap: 2rem; flex-wrap: wrap; margin-bottom: 2rem;">
                    <div style="background: rgba(255, 255, 255, 0.1); padding: 1.5rem; border-radius: 16px; backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2);">
                        <div style="font-size: 1.1rem; opacity: 0.8; margin-bottom: 0.5rem;">Dallas Office</div>
                        <a href="tel:+14693838321" style="color: #06FFA5; text-decoration: none; font-size: 1.3rem; font-weight: 600;">
                            📞 +1 469-383-8321
                        </a>
                    </div>
                    
                    <div style="background: rgba(255, 255, 255, 0.1); padding: 1.5rem; border-radius: 16px; backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2);">
                        <div style="font-size: 1.1rem; opacity: 0.8; margin-bottom: 0.5rem;">Florida Office</div>
                        <a href="tel:+13214420085" style="color: #FFD23F; text-decoration: none; font-size: 1.3rem; font-weight: 600;">
                            📞 +1 321-442-0085
                        </a>
                    </div>
                </div>
                
                <a href="{{ url('/get_offer') }}" style="background: linear-gradient(135deg, #FF6B35 0%, #F7931E 100%); color: white; padding: 1.2rem 3rem; border-radius: 50px; text-decoration: none; font-weight: 700; font-size: 1.2rem; display: inline-flex; align-items: center; gap: 0.5rem; transition: all 0.3s ease; box-shadow: 0 10px 30px rgba(255, 107, 53, 0.4);">
                    <span style="font-size: 1.5rem;">🚀</span> Get Your Free Offer Now
                </a>
                 <p style="margin:16px;">
    Want to know how to get your title in Cedar Hill? 
    <a class="anchor-location" href="https://cashingcarz.com/how-to-get-your-title-in-cedar-hill">Read our Title Guide for Cedar Hill</a>.
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
</style>
@endsection