@extends('layouts.master')

@section('meta_title', 'How to Get Your Title in Sunnyvale, California | CashingCarz')
@section('meta_description', 'Learn How to Get Your Title in Sunnyvale, California fast, whether lost or new, with clear DMV steps for hassle-free ownership transfer.')
@section('meta_keywords', 'How to Get Your Title in Sunnyvale, California')
@section('meta_robots', 'index, follow')

@section('content')
<style>
    /* General Styles */
    body {
        min-height: 100vh;
        background: linear-gradient(to bottom right, #f3f4f6, #e0f2fe, #e0e7ff);
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    /* Hero Section */
    .hero {
        position: relative;
        overflow: hidden;
        background: linear-gradient(45deg, #4f46e5, #a855f7, #ec4899);
        color: white;
        padding: 100px 20px;
    }
    .hero .background-elements {
        position: absolute;
        inset: 0;
        opacity: 0.3;
    }
    .hero .background-elements div {
        position: absolute;
        border-radius: 50%;
        mix-blend-mode: multiply;
        filter: blur(40px);
        animation: pulse 3s infinite;
    }
    .hero .background-elements .element1 {
        top: 10%;
        left: 10%;
        width: 200px;
        height: 200px;
        background: #93c5fd;
    }
    .hero .background-elements .element2 {
        top: 30%;
        right: 10%;
        width: 240px;
        height: 240px;
        background: #f9a8d4;
        animation-delay: 0.1s;
    }
    .hero .background-elements .element3 {
        bottom: 0;
        left: 20%;
        width: 180px;
        height: 180px;
        background: #fde047;
        animation-delay: 0.2s;
    }
    .hero .content {
        position: relative;
        max-width: 1200px;
        margin: 0 auto;
        text-align: center;
    }
    .hero .tag {
        display: inline-flex;
        align-items: center;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        border-radius: 999px;
        padding: 15px 20px;
        margin-bottom: 20px;
        animation: float 3s ease-in-out infinite;
    }
    .hero .tag span:first-child {
        font-size: 1.5em;
        margin-right: 10px;
    }
    .hero h1 {
        font-size: 3.5em;
        font-weight: 900;
        margin-bottom: 20px;
        background: linear-gradient(to right, #ffffff, #dbeafe);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        line-height: 1.2;
    }
    .hero p {
        font-size: 1.5em;
        margin-bottom: 40px;
        color: #dbeafe;
    }
    .hero .intro-box {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 16px;
        padding: 40px;
        max-width: 800px;
        margin: 0 auto;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.5s, box-shadow 0.5s;
    }
    .hero .intro-box:hover {
        transform: scale(1.05);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    }

    /* Steps Section */
    .main-content {
        max-width: 1200px;
        margin: 0 auto;
        padding: 80px 20px;
    }
    .section {
        margin-bottom: 60px;
        position: relative;
    }
    .section .card {
        background: white;
        border-radius: 24px;
        padding: 40px;
        border-left: 8px solid;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: transform 0.5s, box-shadow 0.5s;
        position: relative;
        overflow: hidden;
    }
    .section .card:hover {
        transform: translateY(-8px) scale(1.03);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }
    .section .card::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 160px;
        height: 160px;
        background: linear-gradient(to bottom right, rgba(16, 185, 129, 0.2), rgba(34, 197, 94, 0.2));
        border-radius: 50%;
        transform: translateX(40px) translateY(-40px);
        opacity: 0.2;
    }
    .section .header {
        display: flex;
        align-items: center;
        margin-bottom: 30px;
    }
    .section .icon {
        background: linear-gradient(to right, #10b981, #22c55e);
        color: white;
        border-radius: 50%;
        width: 64px;
        height: 64px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2em;
        margin-right: 20px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }
    .section h2 {
        font-size: 2.5em;
        font-weight: 900;
        color: #1e293b;
    }
    .section p {
        color: #64748b;
        font-size: 1.2em;
        line-height: 1.6;
    }
    .section .highlight {
        background: linear-gradient(to right, #d1fae5, #a7f3d0);
        padding: 20px;
        border-radius: 12px;
        border-left: 4px solid #10b981;
        margin-top: 20px;
    }
    .section .highlight p {
        color: #065f46;
        font-weight: bold;
        font-size: 1.2em;
    }
    .section .note {
        background: linear-gradient(to right, #fefcbf, #fed7aa);
        padding: 20px;
        border-radius: 12px;
        border-left: 4px solid #f59e0b;
        margin-top: 20px;
    }
    .section .note p {
        color: #92400e;
    }

    /* Specific Section Styles */
    .section-emerald .card { border-left-color: #10b981; }
    .section-emerald .card::before { background: linear-gradient(to bottom right, rgba(16, 185, 129, 0.2), rgba(34, 197, 94, 0.2)); }
    .section-blue .card { border-left-color: #3b82f6; }
    .section-blue .card::before { background: linear-gradient(to bottom right, rgba(59, 130, 246, 0.2), rgba(96, 165, 250, 0.2)); }
    .section-purple .card { border-left-color: #9333ea; }
    .section-purple .card::before { background: linear-gradient(to bottom right, rgba(147, 51, 234, 0.2), rgba(168, 85, 247, 0.2)); }
    .section-orange .card { border-left-color: #f97316; }
    .section-orange .card::before { background: linear-gradient(to bottom right, rgba(249, 115, 22, 0.2), rgba(252, 165, 165, 0.2)); }

    /* Options Grid */
    .options-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 24px;
        margin-top: 20px;
    }
    .option {
        background: linear-gradient(to bottom right, #e0f2fe, #dbeafe);
        padding: 20px;
        border-radius: 16px;
        border: 2px solid #bfdbfe;
        text-align: center;
        transition: transform 0.5s, border-color 0.5s;
    }
    .option:hover {
        transform: scale(1.05);
        border-color: #60a5fa;
    }
    .option .option-icon {
        background: #3b82f6;
        color: white;
        border-radius: 50%;
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 1.5em;
    }

    /* Reminders and CTA */
    .reminders, .cta {
        background: linear-gradient(to right, #f59e0b, #f97316);
        border-radius: 24px;
        padding: 40px;
        color: white;
        margin-bottom: 60px;
        transition: transform 0.5s;
    }
    .reminders:hover, .cta:hover {
        transform: scale(1.05);
    }
    .reminders .header, .cta .header {
        display: flex;
        align-items: center;
        margin-bottom: 30px;
    }
    .reminders .icon, .cta .icon {
        background: white;
        color: #f59e0b;
        border-radius: 50%;
        width: 64px;
        height: 64px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2em;
        margin-right: 20px;
    }
    .reminders p {
        color: #fef3c7;
    }
    .cta {
        background: linear-gradient(to right, #9333ea, #ec4899, #f43f5e);
        position: relative;
        overflow: hidden;
    }
    .cta::before {
        content: '';
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.1);
    }
    .cta .content {
        position: relative;
        z-index: 1;
        text-align: center;
    }

    /* Tips */
    .tips {
        background: linear-gradient(to bottom right, #f3f4f6, #e5e7eb);
        border-radius: 24px;
        padding: 40px;
        border-left: 8px solid #64748b;
    }
    .tip {
        background: linear-gradient(to right, #fee2e2, #fee2e2);
        padding: 20px;
        border-radius: 16px;
        margin-bottom: 20px;
    }
    .tip p {
        color: #991b1b;
    }

    /* Animations */
    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
</style>

<div class="hero">
    <div class="background-elements">
        <div class="element1"></div>
        <div class="element2"></div>
        <div class="element3"></div>
    </div>
    <div class="content">
        <div class="tag">
            <span>California Title Guide</span>
        </div>
        <h1>How to Get Your Title in Sunnyvale, California</h1>
        <p>Your Step-by-Step Guide from Cashing Carz</p>
        <div class="intro-box">
            <p>Lost, stolen, or damaged your car title? <span style="color: #f59e0b; font-weight: bold;">No stress!</span> If you’re in Sunnyvale, California, our guide makes replacing or transferring your title simple and fast!</p>
        </div>
    </div>
</div>

<div class="main-content">
    <div class="section section-emerald">
        <div class="card">
            <div class="header">
                <div class="icon">📜</div>
                <h2>What Is a Car Title?</h2>
            </div>
            <p>A car title is an official document issued by the California DMV. It confirms legal ownership and includes your name, vehicle details (make, model, year, VIN), and any lienholder information.</p>
            <div class="highlight">
                <p>✨ Your title is key to proving ownership and transferring it when selling!</p>
            </div>
        </div>
    </div>

    <div class="section section-blue">
        <div class="card">
            <div class="header">
                <div class="icon">📝</div>
                <h2>How to Replace a Lost or Damaged Title</h2>
            </div>
            <p>Follow these steps to get a duplicate title from the California DMV:</p>
            <div class="highlight">
                <p>📋 Steps to Follow:</p>
                <div style="display: flex; flex-direction: column; gap: 10px; margin-top: 10px;">
                    <div style="background: white; padding: 10px; border-radius: 8px; border-left: 4px solid #bfdbfe;">
                        <p style="color: #3b82f6;">1. Download and complete <span style="font-weight: bold;">Form REG 227</span> (Application for Duplicate or Paperless Title).</p>
                    </div>
                    <div style="background: white; padding: 10px; border-radius: 8px; border-left: 4px solid #a855f7;">
                        <p style="color: #a855f7;">2. Visit your local DMV office or mail the form.</p>
                    </div>
                    <div style="background: white; padding: 10px; border-radius: 8px; border-left: 4px solid #10b981;">
                        <p style="color: #10b981;">3. Provide a valid ID and vehicle information.</p>
                    </div>
                    <div style="background: white; padding: 10px; border-radius: 8px; border-left: 4px solid #f59e0b;">
                        <p style="color: #f59e0b;">4. Pay the duplicate title fee.</p>
                    </div>
                </div>
            </div>
            <div class="note">
                <p><strong style="color: #92400e;">💡 Tip:</strong> For mail requests, include a copy of your ID and payment with the form to the address listed in the instructions.</p>
            </div>
        </div>
    </div>

    <div class="section section-purple">
        <div class="card">
            <div class="header">
                <div class="icon">💳</div>
                <h2>What If There’s a Lien on Your Title?</h2>
            </div>
            <p>A lien means you owe money on your vehicle, and the lienholder’s details are on the title. To clear it:</p>
            <div class="highlight">
                <p>📋 Steps to Clear a Lien:</p>
                <div style="display: flex; flex-direction: column; gap: 10px; margin-top: 10px;">
                    <div style="background: white; padding: 10px; border-radius: 8px; border-left: 4px solid #bfdbfe;">
                        <p style="color: #3b82f6;">1. Pay off the loan completely.</p>
                    </div>
                    <div style="background: white; padding: 10px; border-radius: 8px; border-left: 4px solid #a855f7;">
                        <p style="color: #a855f7;">2. Request a lien release letter from the lienholder.</p>
                    </div>
                    <div style="background: white; padding: 10px; border-radius: 8px; border-left: 4px solid #10b981;">
                        <p style="color: #10b981;">3. Apply for a clean title at the DMV.</p>
                    </div>
                </div>
            </div>
            <div class="note">
                <p><strong style="color: #92400e;">💡 Note:</strong> A clean title is required for a legal sale.</p>
            </div>
        </div>
    </div>

    <div class="section section-orange">
        <div class="card">
            <div class="header">
                <div class="icon">🚫</div>
                <h2>Selling Without a Title</h2>
            </div>
            <p>In California, transferring ownership without a title is not allowed. You must obtain a duplicate title from the DMV before selling your vehicle.</p>
            <div class="highlight">
                <p style="color: #f97316; font-style: italic;">✨ Always secure a duplicate title to ensure a legal and smooth sale.</p>
            </div>
        </div>
    </div>

    <div class="cta">
        <div class="content">
            <div class="header">
                <h2 style="color:#000; padding:16px;">Ready to Sell Your Car in Sunnyvale?</h2>
            </div>
            <h3 style="font-size: 2em; margin-bottom: 20px;">Cashing Carz Makes It Simple</h3>
            <p style="margin-bottom: 20px;">With your title in hand, Cashing Carz offers top cash offers, free towing, and instant payment with no hidden fees or delays.</p>
            <p style="font-size: 1.5em; font-weight: bold; background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); padding: 20px; border-radius: 12px; display: inline-block;">✨ Fast, easy, and stress-free!</p>
        </div>
    </div>

    <div class="tips">
        <div class="tip">
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                <p style="font-weight: bold; color: #991b1b;">Pro Tip:</p>
            </div>
            <p>Check with the California DMV for the latest fees and requirements before applying for a duplicate title.</p>
        </div>
        <div class="tip">
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                <p style="font-weight: bold; color: #1e40af;">Need Help?</p>
            </div>
            <p>Contact <span style="color: #3b82f6; font-weight: bold;">Cashing Carz Sunnyvale</span> or fill out our online form to get your cash offer today!</p>
          
        </div>
    </div>
</div>
@endsection