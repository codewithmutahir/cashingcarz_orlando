@extends('layouts.master')

@section('meta_title', 'How to Get Your Title in Dallas, Texas | CashingCarz')
@section('meta_description', 'Discover How to Get Your Title in Dallas, Texas easily with our step-by-step guide for a smooth vehicle title transfer process.')
@section('meta_keywords', 'How to Get Your Title in Dallas, Texas')
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
    .step {
        margin-bottom: 60px;
        position: relative;
    }
    .step .card {
        background: white;
        border-radius: 24px;
        padding: 40px;
        border-left: 8px solid;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: transform 0.5s, box-shadow 0.5s;
        position: relative;
        overflow: hidden;
    }
    .step .card:hover {
        transform: translateY(-8px) scale(1.03);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }
    .step .card::before {
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
    .step .header {
        display: flex;
        align-items: center;
        margin-bottom: 30px;
    }
    .step .icon {
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
    .step h2 {
        font-size: 2.5em;
        font-weight: 900;
        color: #1e293b;
    }
    .step p {
        color: #64748b;
        font-size: 1.2em;
        line-height: 1.6;
    }
    .step .highlight {
        background: linear-gradient(to right, #d1fae5, #a7f3d0);
        padding: 20px;
        border-radius: 12px;
        border-left: 4px solid #10b981;
        margin-top: 20px;
    }
    .step .highlight p {
        color: #065f46;
        font-weight: bold;
        font-size: 1.2em;
    }
    .step .note {
        background: linear-gradient(to right, #fefcbf, #fed7aa);
        padding: 20px;
        border-radius: 12px;
        border-left: 4px solid #f59e0b;
        margin-top: 20px;
    }
    .step .note p {
        color: #92400e;
    }

    /* Specific Step Styles */
    .step-emerald .card { border-left-color: #10b981; }
    .step-emerald .card::before { background: linear-gradient(to bottom right, rgba(16, 185, 129, 0.2), rgba(34, 197, 94, 0.2)); }
    .step-blue .card { border-left-color: #3b82f6; }
    .step-blue .card::before { background: linear-gradient(to bottom right, rgba(59, 130, 246, 0.2), rgba(96, 165, 250, 0.2)); }
    .step-purple .card { border-left-color: #9333ea; }
    .step-purple .card::before { background: linear-gradient(to bottom right, rgba(147, 51, 234, 0.2), rgba(168, 85, 247, 0.2)); }
    .step-orange .card { border-left-color: #f97316; }
    .step-orange .card::before { background: linear-gradient(to bottom right, rgba(249, 115, 22, 0.2), rgba(252, 165, 165, 0.2)); }
    .step-red .card { border-left-color: #ef4444; }
    .step-red .card::before { background: linear-gradient(to bottom right, rgba(239, 68, 68, 0.2), rgba(252, 165, 165, 0.2)); }

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
            <span>How to Get Your Title in Dallas, Texas</span>
        </div>
        <h1>How to Get Your Title in Dallas, Texas</h1>
        <p>Easy Guide from Cashing Carz</p>
        <div class="intro-box">
            <p>Lost your title? Damaged it? Can’t find it anywhere? If you're in Dallas, Texas, getting a replacement title is simpler than it seems. Whether you're planning to sell your car to Cashing Carz or just need a clean copy, we’ve got you covered.</p>
        </div>
    </div>
</div>

<div class="main-content">
    <div class="step step-emerald">
        <div class="card">
            <div class="header">
                <div class="icon">✅</div>
                <h2>Step 1: Confirm Your Vehicle Was Titled in Texas</h2>
            </div>
            <p>First, make sure your car was last titled in Texas. If it was titled in another state, you'll need to apply for a replacement through that state's DMV.</p>
            <div class="highlight">
                <p>If it's a Texas title, you're in the right place.</p>
            </div>
        </div>
    </div>

    <div class="step step-blue">
        <div class="card">
            <div class="header">
                <div class="icon">📝</div>
                <h2>Step 2: Complete Form VTR-34</h2>
            </div>
            <p>To request a certified duplicate title, fill out Form VTR-34 (Application for a Certified Copy of Title). You’ll need:</p>
            <div class="highlight">
                <p>Your vehicle’s VIN</p>
                <p>A valid Texas driver’s license or photo ID</p>
                <p>Signatures of all owners exactly as shown on the original title</p>
                <p>A lien release letter if the vehicle was financed and fully paid off</p>
            </div>
            <div class="note">
                <p><strong style="color: #92400e;">💡 Important:</strong> You can only request a duplicate if at least 30 days have passed since the original title was issued.</p>
            </div>
        </div>
    </div>

    <div class="step step-purple">
        <div class="card">
            <div class="header">
                <div class="icon">🖊️</div>
                <h2>Step 3: Sign in Front of Notary or DMV Official</h2>
            </div>
            <p style="font-size: 1.5em;">Your form must be:</p>
            <div class="options-grid">
                <div class="option">
                    <div class="option-icon">📋</div>
                    <p style="font-weight: bold; color: #3b82f6; margin-bottom: 10px;">Notarized</p>
                </div>
                <div class="option">
                    <div class="option-icon">🏢</div>
                    <p style="font-weight: bold; color: #10b981; margin-bottom: 10px;">Signed in front of a Texas DMV representative</p>
                    <p style="color: #34d399;">This step validates your request and protects against fraud.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="step step-orange">
        <div class="card">
            <div class="header">
                <div class="icon">💵</div>
                <h2>Step 4: Pay the Title Fee</h2>
            </div>
            <p style="font-size: 1.5em; color: #f97316;">Fees depend on how you submit your request:</p>
            <div class="options-grid">
                <div class="option" style="background: linear-gradient(to bottom right, #10b981, #22c55e); color: white;">
                    <div style="font-size: 2.5em; font-weight: bold; margin-bottom: 10px;">$2</div>
                    <p style="font-weight: bold; margin-bottom: 10px;">if mailed</p>
                </div>
                <div class="option" style="background: linear-gradient(to bottom right, #3b82f6, #60a5fa); color: white;">
                    <div style="font-size: 2.5em; font-weight: bold; margin-bottom: 10px;">$5.45</div>
                    <p style="font-weight: bold; margin-bottom: 10px;">if submitted in person at your local Dallas County Tax Office</p>
                </div>
            </div>
        </div>
    </div>

    <div class="step step-red">
        <div class="card">
            <div class="header">
                <div class="icon">📬</div>
                <h2>Step 5: Submit Your Request</h2>
            </div>
            <p style="font-size: 1.5em; color: #ef4444;">You have two options:</p>
            <div class="options-grid">
                <div class="option">
                    <div class="option-icon">🏢</div>
                    <h3 style="font-size: 1.5em; color: #3b82f6; margin-bottom: 20px;">Apply in Person</h3>
                    <p style="color: #60a5fa; margin-bottom: 10px;">Visit your local Dallas County Tax Assessor-Collector office with:</p>
                    <div style="display: flex; flex-direction: column; gap: 10px;">
                        <div style="display: flex; align-items: center; background: white; padding: 10px; border-radius: 8px;">
                            <span style="color: #3b82f6; margin-right: 10px;">📋</span>
                            <span>Completed and signed Form VTR-34</span>
                        </div>
                        <div style="display: flex; align-items: center; background: white; padding: 10px; border-radius: 8px;">
                            <span style="color: #3b82f6; margin-right: 10px;">🆔</span>
                            <span>Valid photo ID</span>
                        </div>
                        <div style="display: flex; align-items: center; background: white; padding: 10px; border-radius: 8px;">
                            <span style="color: #3b82f6; margin-right: 10px;">💵</span>
                            <span>The fee</span>
                        </div>
                        <div style="display: flex; align-items: center; background: white; padding: 10px; border-radius: 8px;">
                            <span style="color: #3b82f6; margin-right: 10px;">📄</span>
                            <span>Any lien release documentation if needed</span>
                        </div>
                    </div>
                </div>
                <div class="option">
                    <div class="option-icon">📮</div>
                    <h3 style="font-size: 1.5em; color: #10b981; margin-bottom: 20px;">Apply by Mail</h3>
                    <p style="color: #34d399; margin-bottom: 10px;">Send your notarized form, a copy of your ID, and the $2 fee to:</p>
                    <div style="background: white; padding: 10px; border-radius: 8px; border-left: 4px solid #10b981;">
                        <p style="color: #065f46; font-weight: bold;">Texas Department of Motor Vehicles</p>
                        <p style="color: #065f46;">1601 Southwest Parkway, Suite A</p>
                        <p style="color: #065f46;">Wichita Falls, TX 76302</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="reminders">
        <div class="header">
            <h2 style="color:#000; padding:16px;">What to Keep in Mind</h2>
        </div>
        <p>Once your duplicate is issued, the original title is invalid. If you find it later, you’ll need to surrender it to the DMV.</p>
        <p>If there was a lien on the vehicle, include proof that the loan has been fully paid off.</p>
        <div style="background: rgba(255, 243, 199, 0.2); backdrop-filter: blur(10px); padding: 20px; border-radius: 12px;">
            <p style="color: #fef3c7; font-weight: bold;">🚗 Want to sell your car to Cashing Carz in Dallas but don’t have the title yet? We can still help or even buy your car in many cases.</p>
        </div>
    </div>

    <div class="cta">
        <div class="content">
            <div class="header">
                <h2 style="color:#000; padding:16px;">Sell Your Car with Cashing Carz</h2>
            </div>
            <h3 style="font-size: 2em; margin-bottom: 20px;">We know paperwork can feel overwhelming</h3>
            <p style="margin-bottom: 20px;">Cashing Carz is here to help. Whether you’re replacing a lost title or selling your car fast for cash, we guide you every step of the way. Friendly, reliable support and top dollar offers are our promise.</p>
            <p style="font-size: 1.5em; font-weight: bold; background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); padding: 20px; border-radius: 12px; display: inline-block;">✨ Stress-free process, guaranteed!</p>
        </div>
    </div>

    <div class="tips">
        <div class="tip">
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                <p style="font-weight: bold; color: #991b1b;">Note: Rules and fees may change over time</p>
            </div>
            <p>Before submitting, double-check the latest information with the Texas DMV or Dallas County Tax Office.</p>
        </div>
        <div class="tip">
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                <p style="font-weight: bold; color: #1e40af;">Need assistance? Just give Cashing Carz Dallas a call</p>
            </div>
            <p>We’re ready to help.</p>

        </div>
    </div>
</div>
@endsection