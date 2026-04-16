@extends('layouts.master')

@section('meta_title', 'Сash For Junk Cars in Cockrell Hill (TX) | Cashing Carz')
@section('meta_description', 'Get top-dollar Cash For Junk Cars Cockrell Hill TX—fast pickup, no hassle, any condition. Sell your car today with ease!')
@section('meta_keywords', 'Сash For Junk Cars Cockrell Hill TX')
@section('meta_robots', 'index, follow')

@section('content')
<div class="junk-car-page" style="background: linear-gradient(135deg, #fff9f4 0%, #fdfdfd 50%, #f2f6ff 100%); padding: 2rem 0; margin-top:150px; font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">
    
    <!-- Hero Section -->
    <div class="hero-container" style="max-width: 1200px; margin: 0 auto; padding: 0 1rem;">
        <div class="hero-card" style="background: rgba(255, 255, 255, 0.97); backdrop-filter: blur(20px); border-radius: 24px; padding: 4rem 2rem; text-align: center; box-shadow: 0 25px 50px rgba(15, 12, 41, 0.15); border: 1px solid rgba(255, 255, 255, 0.3); position: relative; overflow: hidden; animation: slideInUp 0.8s ease-out;">
            <div style="position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, #FF6B35, #F7931E, #FFD23F, #06FFA5); background-size: 400% 400%; animation: gradientShift 8s ease infinite;"></div>
            
            <h1 style="font-size: clamp(2.5rem, 5vw, 3.5rem); font-weight: 800; background: linear-gradient(135deg, #0F0C29 0%, #FF6B35 50%, #302B63 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; margin-bottom: 1.5rem; line-height: 1.2;">
                Cash for Junk Cars in Cockrell Hill, TX – Fast & Easy
            </h1>
            
            <p style="font-size: 1.2rem; color: #5A5A5A; margin-bottom: 2rem; max-width: 600px; margin-left: auto; margin-right: auto;">
                Got a junk car taking up space? <strong style="color: #FF6B35;">Cashing Carz</strong> offers top-dollar cash, free towing, and hassle-free removal in Cockrell Hill.
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
                <span style="font-size: 2rem;">🚗</span> We Buy All Junk Cars in Cockrell Hill
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
                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">📋</div>
                    <div style="font-weight: 600; color: #0F0C29;">Expired registration</div>
                </div>
                
                <div style="background: linear-gradient(135deg, rgba(48, 43, 99, 0.1) 0%, rgba(36, 36, 62, 0.1) 100%); padding: 1rem; border-radius: 12px; text-align: center; border: 1px solid rgba(48, 43, 99, 0.2);">
                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">🚚</div>
                    <div style="font-weight: 600; color: #0F0C29;">Trucks, SUVs, vans</div>
                </div>
                
                <div style="background: linear-gradient(135deg, rgba(255, 107, 53, 0.1) 0%, rgba(6, 255, 165, 0.1) 100%); padding: 1rem; border-radius: 12px; text-align: center; border: 1px solid rgba(255, 107, 53, 0.2);">
                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">📜</div>
                    <div style="font-weight: 600; color: #0F0C29;">No title (conditions apply)</div>
                </div>
            </div>
            
            <p style="text-align: center; margin-top: 2rem; font-size: 1.1rem; color: #5A5A5A;">
                Any make, any model, any condition—<strong style="color: #FF6B35;">we’ll buy it and pay you cash on the spot.</strong>
            </p>
        </div>

        <!-- Pricing Factors -->
        <div class="pricing-card" style="background: rgba(255, 255, 255, 0.97); backdrop-filter: blur(20px); border-radius: 20px; padding: 3rem 2rem; margin-bottom: 2rem; box-shadow: 0 15px 35px rgba(15, 12, 41, 0.1); border: 1px solid rgba(255, 255, 255, 0.3);">
            <h2 style="font-size: 2.5rem; font-weight: 700; color: #0F0C29; margin-bottom: 2rem; text-align: center;">
                <span style="font-size: 2rem;">💸</span> How Much Can I Get for My Junk Car?
            </h2>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem;">
                <div style="text-align: center; padding: 1.5rem; background: linear-gradient(135deg, rgba(255, 107, 53, 0.08) 0%, rgba(247, 147, 30, 0.08) 100%); border-radius: 16px; border: 1px solid rgba(255, 107, 53, 0.15);">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">📅</div>
                    <h4 style="font-size: 1.2rem; font-weight: 600; margin-bottom: 0.5rem; color: #0F0C29;">Year, Make & Model</h4>
                    <p style="color: #5A5A5A; font-size: 0.9rem; margin: 0;">Vehicle specifications matter</p>
                </div>
                
                <div style="text-align: center; padding: 1.5rem; background: linear-gradient(135deg, rgba(6, 255, 165, 0.08) 0%, rgba(255, 210, 63, 0.08) 100%); border-radius: 16px; border: 1px solid rgba(6, 255, 165, 0.15);">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🔍</div>
                    <h4 style="font-size: 1.2rem; font-weight: 600; margin-bottom: 0.5rem; color: #0F0C29;">Overall Condition</h4>
                    <p style="color: #5A5A5A; font-size: 0.9rem; margin: 0;">Body, frame, and engine state</p>
                </div>
                
                <div style="text-align: center; padding: 1.5rem; background: linear-gradient(135deg, rgba(247, 147, 30, 0.08) 0%, rgba(255, 210, 63, 0.08) 100%); border-radius: 16px; border: 1px solid rgba(247, 147, 30, 0.15);">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">⚖️</div>
                    <h4 style="font-size: 1.2rem; font-weight: 600; margin-bottom: 0.5rem; color: #0F0C29;">Scrap Weight</h4>
                    <p style="color: #5A5A5A; font-size: 0.9rem; margin: 0;">Metal value and current pricing</p>
                </div>
                
                <div style="text-align: center; padding: 1.5rem; background: linear-gradient(135deg, rgba(48, 43, 99, 0.08) 0%, rgba(36, 36, 62, 0.08) 100%); border-radius: 16px; border: 1px solid rgba(48, 43, 99, 0.15);">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🔧</div>
                    <h4 style="font-size: 1.2rem; font-weight: 600; margin-bottom: 0.5rem; color: #0F0C29;">Parts Demand</h4>
                    <p style="color: #5A5A5A; font-size: 0.9rem; margin: 0;">Salvageable components value</p>
                </div>
            </div>
            
            <div style="text-align: center; margin-top: 2rem; padding: 2rem; background: linear-gradient(135deg, rgba(6, 255, 165, 0.08) 0%, rgba(255, 210, 63, 0.08) 100%); border-radius: 16px; border: 1px solid rgba(6, 255, 165, 0.2);">
                <p style="font-size: 1.2rem; color: #FF6B35; font-weight: 600; margin: 0;">
                    <strong>No lowballing. No pressure.</strong> Just fair, competitive offers with no hidden fees.
                </p>
            </div>
        </div>

        <!-- Process Section -->
        <div class="process-card" style="background: rgba(255, 255, 255, 0.97); backdrop-filter: blur(20px); border-radius: 20px; padding: 3rem 2rem; margin-bottom: 2rem; box-shadow: 0 15px 35px rgba(15, 12, 41, 0.1); border: 1px solid rgba(255, 255, 255, 0.3);">
            <h2 style="font-size: 2.5rem; font-weight: 700; color: #0F0C29; margin-bottom: 2rem; text-align: center;">
                <span style="font-size: 2rem;">🧾</span> Our Simple 3-Step Process
            </h2>
            
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 2rem;">
                <div style="flex: 1; min-width: 250px; text-align: center; position: relative;">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #FF6B35 0%, #F7931E 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-size: 2rem; color: white; font-weight: bold; box-shadow: 0 8px 25px rgba(255, 107, 53, 0.3);">1</div>
                    <h3 style="font-size: 1.5rem; font-weight: 600; margin-bottom: 0.5rem; color: #0F0C29;">Get Free Quote</h3>
                    <p style="color: #5A5A5A; margin: 0;">Call or fill out our online form for an instant offer</p>
                </div>
                
                <div style="flex: 1; min-width: 250px; text-align: center; position: relative;">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #06FFA5 0%, #FFD23F 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-size: 2rem; color: white; font-weight: bold; box-shadow: 0 8px 25px rgba(6, 255, 165, 0.3);">2</div>
                    <h3 style="font-size: 1.5rem; font-weight: 600; margin-bottom: 0.5rem; color: #0F0C29;">Schedule Pickup</h3>
                    <p style="color: #5A5A5A; margin: 0;">Accept the offer and schedule a convenient pickup time</p>
                </div>
                
                <div style="flex: 1; min-width: 250px; text-align: center; position: relative;">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #302B63 0%, #24243e 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-size: 2rem; color: white; font-weight: bold; box-shadow: 0 8px 25px rgba(48, 43, 99, 0.3);">3</div>
                    <h3 style="font-size: 1.5rem; font-weight: 600; margin-bottom: 0.5rem; color: #0F0C29;">Get Paid</h3>
                    <p style="color: #5A5A5A; margin: 0;">We tow for free and pay you cash on the spot</p>
                </div>
            </div>
        </div>

        <!-- Benefits Section -->
        <div class="benefits-card" style="background: rgba(255, 255, 255, 0.97); backdrop-filter: blur(20px); border-radius: 20px; padding: 3rem 2rem; margin-bottom: 2rem; box-shadow: 0 15px 35px rgba(15, 12, 41, 0.1); border: 1px solid rgba(255, 255, 255, 0.3);">
            <h2 style="font-size: 2.5rem; font-weight: 700; color: #0F0C29; margin-bottom: 2rem; text-align: center;">
                <span style="font-size: 2rem;">🌎</span> Why Choose Cashing Carz?
            </h2>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
                <div style="background: linear-gradient(135deg, rgba(255, 107, 53, 0.08) 0%, rgba(247, 147, 30, 0.08) 100%); padding: 1.5rem; border-radius: 16px; border-left: 4px solid #FF6B35;">
                    <div style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #0F0C29; font-weight: 600;">✅ Fast Cash Payments</div>
                    <p style="color: #5A5A5A; margin: 0;">Get paid instantly on pickup</p>
                </div>
                
                <div style="background: linear-gradient(135deg, rgba(6, 255, 165, 0.08) 0%, rgba(255, 210, 63, 0.08) 100%); padding: 1.5rem; border-radius: 16px; border-left: 4px solid #06FFA5;">
                    <div style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #0F0C29; font-weight: 600;">✅ Free Towing</div>
                    <p style="color: #5A5A5A; margin: 0;">No cost for junk car removal</p>
                </div>
                
                <div style="background: linear-gradient(135deg, rgba(247, 147, 30, 0.08) 0%, rgba(255, 210, 63, 0.08) 100%); padding: 1.5rem; border-radius: 16px; border-left: 4px solid #F7931E;">
                    <div style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #0F0C29; font-weight: 600;">✅ No Paperwork Hassle</div>
                    <p style="color: #5A5A5A; margin: 0;">We handle all documentation</p>
                </div>
                
                <div style="background: linear-gradient(135deg, rgba(48, 43, 99, 0.08) 0%, rgba(36, 36, 62, 0.08) 100%); padding: 1.5rem; border-radius: 16px; border-left: 4px solid #302B63;">
                    <div style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #0F0C29; font-weight: 600;">✅ Local & Licensed</div>
                    <p style="color: #5A5A5A; margin: 0;">Trusted Cockrell Hill team</p>
                </div>
            </div>
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
                Sell your car and help keep Cockrell Hill clean and green! 🌱
            </p>
        </div>

        <!-- Location Section -->
        <div class="location-card" style="background: rgba(255, 255, 255, 0.97); backdrop-filter: blur(20px); border-radius: 20px; padding: 3rem 2rem; margin-bottom: 2rem; box-shadow: 0 15px 35px rgba(15, 12, 41, 0.1); border: 1px solid rgba(255, 255, 255, 0.3);">
            <h2 style="font-size: 2.5rem; font-weight: 700; color: #0F0C29; margin-bottom: 2rem; text-align: center;">
                <span style="font-size: 2rem;">📍</span> Serving All of Cockrell Hill, TX
            </h2>
            
            <div style="display: flex; justify-content: center; gap: 2rem; flex-wrap: wrap;">
                <div style="background: linear-gradient(135deg, rgba(255, 107, 53, 0.1) 0%, rgba(247, 147, 30, 0.1) 100%); padding: 1rem 2rem; border-radius: 50px; font-weight: 600; color: #0F0C29; border: 1px solid rgba(255, 107, 53, 0.2);">
                    📍 Jefferson Blvd
                </div>
                <div style="background: linear-gradient(135deg, rgba(6, 255, 165, 0.1) 0%, rgba(255, 210, 63, 0.1) 100%); padding: 1rem 2rem; border-radius: 50px; font-weight: 600; color: #0F0C29; border: 1px solid rgba(6, 255, 165, 0.2);">
                    📍 Cockrell Hill Road
                </div>
                <div style="background: linear-gradient(135deg, rgba(48, 43, 99, 0.1) 0%, rgba(36, 36, 62, 0.1) 100%); padding: 1rem 2rem; border-radius: 50px; font-weight: 600; color: #0F0C29; border: 1px solid rgba(48, 43, 99, 0.2);">
                    📍 Westmoreland Heights
                </div>
                <div style="background: linear-gradient(135deg, rgba(255, 107, 53, 0.1) 0%, rgba(6, 255, 165, 0.1) 100%); padding: 1rem 2rem; border-radius: 50px; font-weight: 600; color: #0F0C29; border: 1px solid rgba(255, 107, 53, 0.2);">
                    📍 Kessler Plaza
                </div>
                <div style="background: linear-gradient(135deg, rgba(247, 147, 30, 0.1) 0%, rgba(255, 210, 63, 0.1) 100%); padding: 1rem 2rem; border-radius: 50px; font-weight: 600; color: #0F0C29; border: 1px solid rgba(247, 147, 30, 0.2);">
                    📍 Arcadia Park
                </div>
            </div>
        </div>

        <!-- Testimonials Section -->
        <div class="testimonials-card" style="background: rgba(255, 255, 255, 0.97); backdrop-filter: blur(20px); border-radius: 20px; padding: 3rem 2rem; margin-bottom: 2rem; box-shadow: 0 15px 35px rgba(15, 12, 41, 0.1); border: 1px solid rgba(255, 255, 255, 0.3);">
            <h2 style="font-size: 2.5rem; font-weight: 700; color: #0F0C29; margin-bottom: 2rem; text-align: center;">
                <span style="font-size: 2rem;">💬</span> Real People. Real Cash.
            </h2>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
                <div style="background: linear-gradient(135deg, rgba(255, 107, 53, 0.08) 0%, rgba(247, 147, 30, 0.08) 100%); padding: 1.5rem; border-radius: 16px; border-left: 4px solid #FF6B35;">
                    <p style="color: #5A5A5A; margin: 0;">"I had an old Dodge that wouldn’t pass inspection. Cashing Carz picked it up the same day and paid me cash before loading it up. Super smooth!"</p>
                    <div style="font-size: 1.2rem; margin-top: 1rem; color: #0F0C29; font-weight: 600;">— Carlos G., Cockrell Hill TX</div>
                </div>
                
                <div style="background: linear-gradient(135deg, rgba(6, 255, 165, 0.08) 0%, rgba(255, 210, 63, 0.08) 100%); padding: 1.5rem; border-radius: 16px; border-left: 4px solid #06FFA5;">
                    <p style="color: #5A5A5A; margin: 0;">"Tried selling online but got low offers. Cashing Carz gave me $450 and towed it for free."</p>
                    <div style="font-size: 1.2rem; margin-top: 1rem; color: #0F0C29; font-weight: 600;">— Lydia R., Dallas TX</div>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="contact-card" style="background: linear-gradient(135deg, #0F0C29 0%, #302B63 50%, #24243e 100%); border-radius: 20px; padding: 4rem 2rem; text-align: center; box-shadow: 0 20px 50px rgba(15, 12, 41, 0.4); color: white; position: relative; overflow: hidden;">
            <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: radial-gradient(circle at 30% 40%, rgba(255, 107, 53, 0.1) 0%, transparent 50%), radial-gradient(circle at 80% 10%, rgba(6, 255, 165, 0.1) 0%, transparent 50%); pointer-events: none;"></div>
            
            <div style="position: relative; z-index: 1;">
                <h2 style="font-size: 2.5rem; font-weight: 700; margin-bottom: 1rem; color: white;">
                    <span style="font-size: 2rem;">🚀</span> Ready to Sell Your Junk Car in Cockrell Hill?
                </h2>
                
                <p style="font-size: 1.2rem; margin-bottom: 2rem; opacity: 0.9; max-width: 600px; margin-left: auto; margin-right: auto;">
                    Searching for <strong>"cash for junk cars Cockrell Hill"</strong>? <strong>Cashing Carz</strong> makes it easy with free towing and instant cash payments.
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
                    Want to know how to get your title in Cockrell Hill? 
                    <a class="anchor-location" href="{{ route('title-guides.cockrell-hill') }}">Read our Title Guide for Cockrell Hill</a>.
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