@extends('layouts.master')

@section('meta_title', 'How to Get Your Title in Cedar Hill, Texas | CashingCarz')
@section('meta_description', 'Learn How to Get Your Title in Cedar Hill, Texas quickly with our step-by-step guide for hassle-free vehicle title transfer and replacement.')
@section('meta_keywords', 'How to Get Your Title in Cedar Hill, Texas')
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
            <span>How to Get Your Title in Cedar Hill, Texas</span>
        </div>
        <h1>How to Get Your Title in Cedar Hill, Texas</h1>
        <p>Easy Step-by-Step Process from Cashing Carz</p>
        <div class="intro-box">
            <p>Lost your title? Maybe it was shredded, gotten wet, or misplaced? No problem if you are in Cedar Hill, Texas and need a duplicate title. Want to sell your vehicle to Cashing Carz or simply have a clean one for your records? It is easy.</p>
        </div>
    </div>
</div>

<div class="main-content">
    <div class="step step-emerald">
        <div class="card">
            <div class="header">
                <div class="icon">✅</div>
                <h2>Step 1: Confirm It Was Titled in Texas</h2>
            </div>
            <p>First things first — make sure the title was issued in Texas. If the car was last titled in another state, you’ll need to request a duplicate from that state’s DMV.</p>
            <div class="highlight">
                <p>If it was a Texas title, you’re ready for the next step.</p>
            </div>
        </div>
    </div>

    <div class="step step-blue">
        <div class="card">
            <div class="header">
                <div class="icon">📝</div>
                <h2>Step 2: Fill Out Form VTR-34</h2>
            </div>
            <p>To request a certified duplicate you’ll need to complete Form VTR-34 (Application for a Certified Copy of Title). Here’s what you’ll need:</p>
            <div class="highlight">
                <p>Your vehicle’s VIN</p>
                <p>A valid Texas driver’s license or state ID</p>
                <p>Every owner’s signature exactly as it appears on the title</p>
                <p>If the car had a lien and it’s been paid off, provide a lien release letter</p>
            </div>
            <div class="note">
                <p>Key reminder: You can only request a replacement if it has been 30 or more days since the last title was issued.</p>
            </div>
        </div>
    </div>

    <div class="step step-purple">
        <div class="card">
            <div class="header">
                <div class="icon">🖊️</div>
                <h2>Step 3: Sign before a Notary or DMV Employee</h2>
            </div>
            <p style="font-size: 1.5em;">Your form must be either:</p>
            <div class="options-grid">
                <div class="option">
                    <div class="option-icon">📋</div>
                    <p style="font-weight: bold; color: #3b82f6; margin-bottom: 10px;">Notarized,</p>
                </div>
                <div class="option">
                    <div class="option-icon">🏢</div>
                    <p style="font-weight: bold; color: #10b981; margin-bottom: 10px;">Or, Signed in the presence of a Texas DMV employee</p>
                    <p style="color: #34d399;">This authenticates the request and prevents fraud.</p>
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
            <p style="font-size: 1.5em; color: #f97316;">The fee differs based on how you make your request:</p>
            <div class="options-grid">
                <div class="option" style="background: linear-gradient(to bottom right, #10b981, #22c55e); color: white;">
                    <div style="font-size: 2.5em; font-weight: bold; margin-bottom: 10px;">$2</div>
                    <p style="font-weight: bold; margin-bottom: 10px;">when mailed</p>
                </div>
                <div class="option" style="background: linear-gradient(to bottom right, #3b82f6, #60a5fa); color: white;">
                    <div style="font-size: 2.5em; font-weight: bold; margin-bottom: 10px;">$5.45</div>
                    <p style="font-weight: bold; margin-bottom: 10px;">when presenting in person to the Dallas County Tax Office (Cedar Hill is located in Dallas County)</p>
                </div>
            </div>
        </div>
    </div>

    <div class="step step-red">
        <div class="card">
            <div class="header">
                <div class="icon">📬</div>
                <h2>Step 5: Submit Your Application</h2>
            </div>
            <p style="font-size: 1.5em; color: #ef4444;">You can do either:</p>
            <div class="options-grid">
                <div class="option">
                    <div class="option-icon">🏢</div>
                    <h3 style="font-size: 1.5em; color: #3b82f6; margin-bottom: 20px;">In Person:</h3>
                    <p style="color: #60a5fa; margin-bottom: 10px;">Visit your local Dallas County Tax Assessor-Collector office with:</p>
                    <div style="display: flex; flex-direction: column; gap: 10px;">
                        <div style="display: flex; align-items: center; background: white; padding: 10px; border-radius: 8px;">
                            <span style="color: #3b82f6; margin-right: 10px;">📋</span>
                            <span>Your signed and completed Form VTR-34</span>
                        </div>
                        <div style="display: flex; align-items: center; background: white; padding: 10px; border-radius: 8px;">
                            <span style="color: #3b82f6; margin-right: 10px;">🆔</span>
                            <span>Your identification</span>
                        </div>
                        <div style="display: flex; align-items: center; background: white; padding: 10px; border-radius: 8px;">
                            <span style="color: #3b82f6; margin-right: 10px;">💵</span>
                            <span>The fee</span>
                        </div>
                        <div style="display: flex; align-items: center; background: white; padding: 10px; border-radius: 8px;">
                            <span style="color: #3b82f6; margin-right: 10px;">📄</span>
                            <span>Any lien documents that are required</span>
                        </div>
                    </div>
                </div>
                <div class="option">
                    <div class="option-icon">📮</div>
                    <h3 style="font-size: 1.5em; color: #10b981; margin-bottom: 20px;">By Mail:</h3>
                    <p style="color: #34d399; margin-bottom: 10px;">Mail your notarized form, a copy of your identification, and the $2 fee to:</p>
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
            <h2 style="color:#000;">What to Keep in Mind</h2>
        </div>
        <p>Once your duplicate title is issued, the original is no longer valid. If it shows up later, you’ll need to turn it in.</p>
        <p>If your vehicle was financed, be sure to include proof the loan was paid off.</p>
        <div style="background: rgba(255, 243, 199, 0.2); backdrop-filter: blur(10px); padding: 20px; border-radius: 12px;">
            <p style="color: #fef3c7; font-weight: bold;">🚗 Need to sell your car to Cashing Carz in Cedar Hill but can’t give it the title? We can help with that or in most situations buy your car despite it.</p>
        </div>
    </div>

    <div class="cta">
        <div class="content">
            <div class="header" style="display:flex; justify-content:center; padding:10px;">
                <h2 style="color:#000;">Sell Your Car Easy</h2>
            </div>
            <h3 style="font-size: 2em; margin-bottom: 20px;">No red tape is required at Cashing Carz</h3>
            <p style="margin-bottom: 20px;">Our business is selling your car for quick cash or issuing a replacement title. We'll walk you through the process, with fast courteous service and top-dollar competitive value.</p>
            <p style="font-size: 1.5em; font-weight: bold; background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); padding: 20px; border-radius: 12px; display: inline-block;">✨ Stress-free process, guaranteed!</p>
        </div>
    </div>

    <div class="tips">
        <div class="tip">
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                <span style="font-size: 1.5em; margin-right: 10px;">Tip:</span>
                <p style="font-weight: bold; color: #991b1b;">Title fees and requirements can change</p>
            </div>
            <p>Confirm the current rules with the Texas DMV or Dallas County Tax Office before submitting.</p>
        </div>
        <div class="tip">
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                <span style="font-size: 1.5em; margin-right: 10px;">Need help?</span>
                <p style="font-weight: bold; color: #1e40af;">Just give Cashing Carz Cedar Hill a call</p>
            </div>
            <p>we’ve got your back!</p>

        </div>
    </div>
</div>
@endsection