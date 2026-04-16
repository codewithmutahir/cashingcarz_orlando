@extends('layouts.master')

@section('meta_title', 'How to Get Your Title in Ferris, Texas | CashingCarz')
@section('meta_description', 'Learn How to Get Your Title in Ferris, Texas fast. Clear steps, local tips, and resources to secure your vehicle title easily.')
@section('meta_keywords', 'How to Get Your Title in Ferris, Texas')
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
            <span>How to Get Your Title in Ferris, Texas</span>
        </div>
        <h1>How to Get Your Title in Ferris, Texas</h1>
        <p>Simple Process by Cashing Carz</p>
        <div class="intro-box">
            <p>Lost your car title? Accidentally damaged it or can no longer read it? Worry not—replacing your car title in Ferris, Texas is easier than you imagine. You're selling your vehicle to Cashing Carz or just require a copy for your record-keeping purposes? No issue. We have made the simple and fast, hassle-free process to guide you.</p>
        </div>
    </div>
</div>

<div class="main-content">
    <div class="step step-emerald">
        <div class="card">
            <div class="header">
                <div class="icon">✅</div>
                <h2>First Things First: Was Your Car Titled in Texas?</h2>
            </div>
            <p>First, make sure your vehicle was actually titled in Texas. If not from Texas, you'll need to go to the DMV from that state in order to request a duplicate.</p>
            <div class="highlight">
                <p>However, if you know your title is (or was) Texas, you're in luck.</p>
            </div>
        </div>
    </div>

    <div class="step step-blue">
        <div class="card">
            <div class="header">
                <div class="icon">📝</div>
                <h2>Step 1: Fill Out the Title Replacement Form</h2>
            </div>
            <p>To get a new copy of your title, you'll need to fill out a form called VTR-34, or "Application for a Certified Copy of Title." It's fairly easy and asks for things like:</p>
            <div class="highlight">
                <p>Your car’s VIN (car identification number)</p>
                <p>Your driver’s license number and name</p>
                <p>Signatures of all listed owners</p>
                <p>And if there was financing on the car (a lien), you might need to give them proof that it’s been paid out</p>
            </div>
            <div class="note">
                <p><strong style="color: #92400e;">Important:</strong> It’s only possible to get a new title if it’s been at least 30 days since the last one was issued.</p>
            </div>
        </div>
    </div>

    <div class="step step-purple">
        <div class="card">
            <div class="header">
                <div class="icon">🖊️</div>
                <h2>Step 2: Sign It (Properly)</h2>
            </div>
            <p>Once your form is filled out, you'll have to either:</p>
            <div class="options-grid">
                <div class="option">
                    <div class="option-icon">📋</div>
                    <p style="font-weight: bold; color: #3b82f6; margin-bottom: 10px;">Sign it in front of a notary</p>
                </div>
                <div class="option">
                    <div class="option-icon">🏢</div>
                    <p style="font-weight: bold; color: #10b981; margin-bottom: 10px;">Visit the DMV and have a DMV worker witness your signature</p>
                    <p style="color: #34d399;">This step ensures the paperwork is valid and keeps you safe from title fraud.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="step step-orange">
        <div class="card">
            <div class="header">
                <div class="icon">💵</div>
                <h2>Step 3: Pay the Fee</h2>
            </div>
            <p style="font-size: 1.5em; color: #f97316;">Texas does charge a small fee for title replacement:</p>
            <div class="options-grid">
                <div class="option" style="background: linear-gradient(to bottom right, #10b981, #22c55e); color: white;">
                    <div style="font-size: 2.5em; font-weight: bold; margin-bottom: 10px;">$2.00</div>
                    <p style="font-weight: bold; margin-bottom: 10px;">if you mail it</p>
                </div>
                <div class="option" style="background: linear-gradient(to bottom right, #3b82f6, #60a5fa); color: white;">
                    <div style="font-size: 2.5em; font-weight: bold; margin-bottom: 10px;">$5.45</div>
                    <p style="font-weight: bold; margin-bottom: 10px;">if you visit the Ellis County Tax Office in person (that’s the local office for most people in Ferris)</p>
                </div>
            </div>
        </div>
    </div>

    <div class="step step-red">
        <div class="card">
            <div class="header">
                <div class="icon">📬</div>
                <h2>Step 4: Submit Your Application</h2>
            </div>
            <p style="font-size: 1.5em; color: #ef4444;">Now that you're ready, just send it off or drop it off.</p>
            <div class="options-grid">
                <div class="option">
                    <div class="option-icon">🏢</div>
                    <h3 style="font-size: 1.5em; color: #3b82f6; margin-bottom: 20px;">In Person</h3>
                    <p style="color: #60a5fa; margin-bottom: 10px;">Go to the Ellis County Tax Office at: 109 S Jackson St, Waxahachie, TX 75165</p>
                    <p style="color: #60a5fa; margin-bottom: 10px;">Bring your completed form, your ID, any lien documents if needed, and the fee.</p>
                </div>
                <div class="option">
                    <div class="option-icon">📮</div>
                    <h3 style="font-size: 1.5em; color: #10b981; margin-bottom: 20px;">By Mail</h3>
                    <p style="color: #34d399; margin-bottom: 10px;">If you’re mailing it, send everything (signed and notarized form, ID copy, $2 fee) to:</p>
                    <div style="background: white; padding: 10px; border-radius: 8px; border-left: 4px solid #10b981;">
                        <p style="color: #065f46; font-weight: bold;">Texas Department of Motor Vehicles</p>
                        <p style="color: #065f46;">Vehicle Titles and Registration Division</p>
                        <p style="color: #065f46;">P.O. Box 26417</p>
                        <p style="color: #065f46;">Austin, TX 78755-0417</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="reminders">
        <div class="header">
            <h2 style="color:#000; padding:16px;">A Few Things to Keep in Mind</h2>
        </div>
        <p>When the new title is released, the old one is no longer valid. If you find yourself encountering the original afterwards, you will be required to surrender it.</p>
        <p>Owing on your car? You might need a letter from the lender stating the loan’s been paid off.</p>
        <div style="background: rgba(255, 243, 199, 0.2); backdrop-filter: blur(10px); padding: 20px; border-radius: 12px;">
            <p style="color: #fef3c7; font-weight: bold;">If you are selling your vehicle to Cashing Carz, we are still able to help you even if you have not yet obtained the title—simply ask!</p>
        </div>
    </div>

    <div class="cta">
        <div class="content">
            <div class="header">
                <h2 style="color:#000; padding:16px;">Need to Sell Your Car in Ferris? Cashing Carz Is Ready to Assist</h2>
            </div>
            <h3 style="font-size: 2em; margin-bottom: 20px;">Paperwork is the worst, we know</h3>
            <p style="margin-bottom: 20px;">—but let that not deter you from selling your car at the highest price possible. If you require help with the title process or simply want to know your options, call Cashing Carz in Ferris. We buy cars every day, titled or untitled, and are more than willing to walk you through the entire process.</p>
            <p style="font-size: 1.5em; font-weight: bold; background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); padding: 20px; border-radius: 12px; display: inline-block;">✨ Stress-free process, guaranteed!</p>
        </div>
    </div>

    <div class="tips">
        <div class="tip">
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                <p style="font-weight: bold; color: #991b1b;">Disclaimer: Charges and fees can fluctuate</p>
            </div>
            <p>therefore make sure to always confirm with the Texas DMV or Ellis County Tax Office before submitting any documents.</p>

        </div>
    </div>
</div>
@endsection