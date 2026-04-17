@props(['show' => true])

<style>
    #announcement-popup { display: {{ $show ? 'flex' : 'none' }}; }
    html.cc-announcement-dismissed #announcement-popup { display: none !important; }
    #announcement-popup .popup-overlay {
        position: fixed; top: 0; left: 0; right: 0; bottom: 0;
        z-index: 9999; display: flex; align-items: center; justify-content: center;
        background: rgba(17, 17, 17, 0.45); padding: 1rem;
    }
    #announcement-popup .popup-card {
        position: relative; width: 100%; max-width: 500px;
        border-radius: 12px; overflow: hidden;
        border: 3px solid #111; background: #FFFFFF;
        box-shadow: 12px 12px 0 rgba(17,17,17,0.12);
    }
    #announcement-popup .popup-topbar {
        background: #FFD000; padding: 10px 20px;
        display: flex; align-items: center; gap: 8px;
        border-bottom: 3px solid #111;
    }
    #announcement-popup .popup-topbar svg { width: 16px; height: 16px; fill: #111; }
    #announcement-popup .popup-topbar span {
        font-family: "Unbounded", system-ui, sans-serif;
        font-size: 12px; font-weight: 700; color: #111;
        text-transform: uppercase; letter-spacing: 0.1em;
    }
    #announcement-popup .popup-close {
        position: absolute; top: 48px; right: 16px;
        background: none; border: none; color: #111;
        font-size: 22px; cursor: pointer; line-height: 1; padding: 4px;
    }
    #announcement-popup .popup-close:hover { color: #FF6B1A; }
    #announcement-popup .popup-body { padding: 32px; text-align: center; }
    #announcement-popup .badge {
        display: inline-flex; align-items: center; gap: 6px;
        background: #F7F4EE; border: 2px solid #111;
        border-radius: 9999px; padding: 4px 14px; font-size: 12px;
        color: #111; font-weight: 600; margin-bottom: 20px;
    }
    #announcement-popup .badge svg { width: 14px; height: 14px; fill: #FF6B1A; }
    #announcement-popup .icon-main { margin: 0 auto 16px; width: 56px; height: 56px; }
    #announcement-popup .popup-title {
        font-family: "Unbounded", system-ui, sans-serif;
        color: #111; font-size: 22px; font-weight: 800;
        margin: 0 0 12px; line-height: 1.2;
    }
    #announcement-popup .popup-desc {
        color: #333; font-size: 14px; margin: 0 0 24px; line-height: 1.6;
    }
    #announcement-popup .feature-list { text-align: left; margin-bottom: 24px; }
    #announcement-popup .feature-item {
        display: flex; align-items: center; gap: 12px;
        background: #F7F4EE;
        border: 2px solid #111;
        border-radius: 8px; padding: 10px 16px; margin-bottom: 10px;
    }
    #announcement-popup .feature-item svg { width: 16px; height: 16px; flex-shrink: 0; }
    #announcement-popup .feature-item span { color: #111; font-size: 14px; }
    #announcement-popup .new-badge {
        margin-left: auto; background: #FF6B1A; color: #fff;
        font-size: 10px; font-weight: 700; padding: 2px 8px; border-radius: 9999px;
    }
    #announcement-popup .popup-btn-primary {
        display: block; width: 100%; padding: 12px;
        font-family: "Unbounded", system-ui, sans-serif;
        background: #111; color: #fff; font-weight: 700;
        font-size: 14px; border-radius: 6px; text-decoration: none;
        text-align: center; margin-bottom: 10px; text-transform: uppercase;
    }
    #announcement-popup .popup-btn-primary:hover { background: #FF6B1A; color: #fff; }
    #announcement-popup .popup-btn-secondary {
        background: none; border: none; color: #555;
        font-size: 12px; cursor: pointer;
    }
    #announcement-popup .popup-btn-secondary:hover { color: #111; }
</style>
<script>
    (function () {
        if (!{{ $show ? 'true' : 'false' }}) return;
        try {
            if (document.cookie.split(';').some(function (c) {
                return c.trim().indexOf('popup_dismissed=') === 0;
            })) {
                document.documentElement.classList.add('cc-announcement-dismissed');
            }
        } catch (e) {}
    })();
</script>

<div id="announcement-popup">
    <div class="popup-overlay">
        <div class="popup-card">
            <div class="popup-topbar">
                <svg viewBox="0 0 24 24"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/></svg>
                <span>Cashing Orlando</span>
            </div>

            <button type="button" onclick="closeAnnouncementPopup()" class="popup-close" aria-label="Close">&times;</button>

            <div class="popup-body">
                <span class="badge">
                    <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/></svg>
                    Central Florida
                </span>

                <svg class="icon-main" viewBox="0 0 56 56" fill="none">
                    <circle cx="28" cy="28" r="28" fill="#F7F4EE"/>
                    <path d="M12 22 Q20 12 28 16 Q36 20 44 10" stroke="#FF6B1A" stroke-width="2.5" fill="none" stroke-linecap="round"/>
                    <path d="M22 38 L34 38" stroke="#FFD000" stroke-width="2" stroke-linecap="round"/>
                    <path d="M28 38 L28 44" stroke="#111" stroke-width="2" stroke-linecap="round"/>
                </svg>

                <h2 class="popup-title">Cashing Carz is now in Orlando, Florida</h2>
                <p class="popup-desc">Sell your junk car for cash with same-day pickup options, free towing with accepted offers, and a team that keeps things bright and simple.</p>

                <div class="feature-list">
                    <div class="feature-item">
                        <svg fill="#FF6B1A" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5S13.38 11.5 12 11.5z"/></svg>
                        <span>Orlando &amp; surrounding cities</span>
                        <span class="new-badge">HERE</span>
                    </div>
                    <div class="feature-item">
                        <svg fill="#00B4D8" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14.5v-9l6 4.5-6 4.5z"/></svg>
                        <span>Same-day pickup available</span>
                    </div>
                </div>

                <a href="/get_offer" class="popup-btn-primary">Get your offer</a>
                <button type="button" onclick="closeAnnouncementPopup()" class="popup-btn-secondary">No thanks, close</button>
            </div>
        </div>
    </div>
</div>

<script>
    window.closeAnnouncementPopup = function() {
        document.documentElement.classList.add('cc-announcement-dismissed');
        var el = document.getElementById('announcement-popup');
        if (el) el.style.display = 'none';
        document.cookie = "popup_dismissed=1; path=/; max-age=" + (60 * 60 * 24 * 7);
    };
</script>
