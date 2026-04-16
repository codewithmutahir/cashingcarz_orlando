{{-- Sticky Floating Call Now Button --}}
{{-- Place this component just before </body> in your layout file --}}
{{-- Usage: @include('components.call-button') or <x-call-button /> --}}

<style>
    @import url('https://fonts.googleapis.com/css2?family=Barlow:wght@500;700&display=swap');

    /* ── Base (shared desktop + mobile) ── */
    .call-float-wrapper {
        position: fixed;
        z-index: 9999;
        display: flex;
        flex-direction: row;
        align-items: center;
        font-family: 'Barlow', sans-serif;
    }

    /* ── Desktop: bottom-right ── */
    @media (min-width: 769px) {
        .call-float-wrapper {
            bottom: 32px;
            right: 32px;
            animation: slideUp 0.5s cubic-bezier(0.34, 1.56, 0.64, 1) 0.8s both;
        }

        @keyframes slideUp {
            from { transform: translateY(80px); opacity: 0; }
            to   { transform: translateY(0);    opacity: 1; }
        }
    }

    /* ── Mobile: vertically centered, pinned right ── */
    @media (max-width: 768px) {
        .call-float-wrapper {
            top: 50%;
            right: 0;
            bottom: auto;
            left: auto;
            transform: translateY(-50%);
            animation: fadeIn 0.5s ease 0.8s both;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to   { opacity: 1; }
        }

        /* On mobile, button flush to edge — rounded only on left side at rest */
        .call-float-btn {
            border-radius: 30px 0 0 30px !important;
            width: 56px !important;
            height: 56px !important;
        }

        /* When label is open on mobile, button stays same shape */
        .call-float-wrapper.active .call-float-btn {
            border-radius: 0 !important;
            border-top-left-radius: 0 !important;
            border-bottom-left-radius: 0 !important;
        }

        /* Label on mobile: rounded left corners only */
        .call-float-label {
            border-radius: 30px 0 0 30px !important;
            height: 56px !important;
            padding: 0 18px 0 20px !important;
        }
    }

    /* ── Pill label ── */
    .call-float-label {
        background: #0f0f0f;
        color: #fff;
        padding: 0 20px 0 22px;
        height: 52px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        border-radius: 30px 0 0 30px;
        max-width: 0;
        overflow: hidden;
        opacity: 0;
        white-space: nowrap;
        transition: max-width 0.4s cubic-bezier(0.4, 0, 0.2, 1),
                    opacity 0.3s ease;
        pointer-events: none;
        order: 1;
    }

    /* Button is always on the right of the label */
    .call-float-btn {
        order: 2;
    }

    /* Expand label on hover (desktop) or .active (touch) */
    .call-float-wrapper:hover .call-float-label,
    .call-float-wrapper.active .call-float-label {
        max-width: 220px;
        opacity: 1;
        pointer-events: auto;
    }

    .call-float-label .label-top {
        font-size: 10px;
        font-weight: 500;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: #c8ff00;
        line-height: 1;
        margin-bottom: 3px;
    }

    .call-float-label .label-number {
        font-size: 15px;
        font-weight: 700;
        color: #ffffff;
        line-height: 1;
        letter-spacing: 0.04em;
    }

    /* ── Main button ── */
    .call-float-btn {
        width: 62px;
        height: 62px;
        background: #c8ff00;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        text-decoration: none;
        box-shadow: 0 4px 20px rgba(200, 255, 0, 0.45);
        transition: box-shadow 0.2s ease,
                    border-radius 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        z-index: 1;
        flex-shrink: 0;
    }

    /* When label open on desktop: flatten left side of button */
    .call-float-wrapper:hover .call-float-btn,
    .call-float-wrapper.active .call-float-btn {
        border-radius: 0 30px 30px 0;
        box-shadow: 0 6px 28px rgba(200, 255, 0, 0.55);
    }

    .call-float-btn svg {
        width: 25px;
        height: 25px;
        color: #0f0f0f;
        transition: transform 0.3s ease;
    }

    .call-float-wrapper:hover .call-float-btn svg,
    .call-float-wrapper.active .call-float-btn svg {
        transform: rotate(12deg);
    }

    /* ── Pulse rings ── */
    .call-float-btn::before,
    .call-float-btn::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: rgba(200, 255, 0, 0.3);
        animation: callPulse 2s ease-out infinite;
        pointer-events: none;
    }

    .call-float-btn::after {
        animation-delay: 0.75s;
    }

    .call-float-wrapper:hover .call-float-btn::before,
    .call-float-wrapper:hover .call-float-btn::after,
    .call-float-wrapper.active .call-float-btn::before,
    .call-float-wrapper.active .call-float-btn::after {
        animation: none;
        opacity: 0;
    }

    @keyframes callPulse {
        0%   { transform: scale(1);   opacity: 0.6; }
        100% { transform: scale(1.9); opacity: 0;   }
    }
</style>

<div class="call-float-wrapper" id="callFloatBtn">
    <div class="call-float-label">
        <span class="label-top">Call Now</span>
        <span class="label-number">+1 817 835-6585</span>
        <span class="label-number">+1 469 383-8321</span>
    </div>
    <a href="tel:8178356585" class="call-float-btn" aria-label="Call Now: 817 835-6585">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
             stroke-linecap="round" stroke-linejoin="round">
            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07
                     A19.5 19.5 0 0 1 4.69 13a19.79 19.79 0 0 1-3.07-8.67
                     A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72
                     c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.91
                     a16 16 0 0 0 6.18 6.18l1.27-1.27a2 2 0 0 1 2.11-.45
                     c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/>
        </svg>
    </a>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const wrapper = document.getElementById('callFloatBtn');
        if (!wrapper) return;

        // Toggle label open on first tap, follow href on second tap
        wrapper.addEventListener('touchstart', function (e) {
            if (!wrapper.classList.contains('active')) {
                e.preventDefault();
                wrapper.classList.add('active');
            }
            // If already active, let the link fire naturally
        }, { passive: false });

        // Close when tapping outside
        document.addEventListener('touchstart', function (e) {
            if (!wrapper.contains(e.target)) {
                wrapper.classList.remove('active');
            }
        }, { passive: true });
    });
</script>