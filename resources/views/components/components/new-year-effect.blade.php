

<div id="newYearOverlay" style="display: none;">
    <div id="fireworksCanvas"></div>
    <div class="newyear-content">
        <h1 class="newyear-title">🎉 Happy New Year! 🎉</h1>
        <div class="newyear-year">2025</div>
        <p class="newyear-message">Wishing you joy and success!</p>
        <button id="closeNewYear" class="newyear-close">Continue</button>
    </div>
</div>

<style>
    #newYearOverlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        z-index: 999999;
        display: flex;
        align-items: center;
        justify-content: center;
        animation: fadeIn 0.5s ease;
    }

    #fireworksCanvas {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
    }

    .newyear-content {
        text-align: center;
        color: white;
        z-index: 10;
        animation: slideUp 1s ease;
    }

    .newyear-title {
        font-size: 3rem;
        font-weight: bold;
        margin: 0 0 20px 0;
        text-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
        animation: pulse 2s infinite;
    }

    .newyear-year {
        font-size: 6rem;
        font-weight: bold;
        background: linear-gradient(45deg, #ffd700, #ffed4e, #ffd700);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin: 20px 0;
        animation: glow 1.5s ease-in-out infinite;
    }

    .newyear-message {
        font-size: 1.5rem;
        margin: 20px 0;
        opacity: 0.9;
    }

    .newyear-close {
        padding: 15px 40px;
        font-size: 1.2rem;
        background: white;
        color: #667eea;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        font-weight: bold;
        margin-top: 30px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .newyear-close:hover {
        transform: scale(1.1);
        box-shadow: 0 10px 30px rgba(255, 255, 255, 0.3);
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideUp {
        from {
            transform: translateY(50px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    @keyframes glow {
        0%, 100% {
            text-shadow: 0 0 20px #ffd700, 0 0 30px #ffd700;
        }
        50% {
            text-shadow: 0 0 30px #ffd700, 0 0 50px #ffd700;
        }
    }

    @media (max-width: 768px) {
        .newyear-title { font-size: 2rem; }
        .newyear-year { font-size: 4rem; }
        .newyear-message { font-size: 1.2rem; }
    }
</style>

<script>
    (function() {
        // Check if user has already seen the effect in this session
        const hasSeenEffect = sessionStorage.getItem('newYearEffectSeen');
        
        if (!hasSeenEffect) {
            const overlay = document.getElementById('newYearOverlay');
            const closeBtn = document.getElementById('closeNewYear');
            const canvas = document.getElementById('fireworksCanvas');
            
            // Show overlay
            overlay.style.display = 'flex';
            
            // Create fireworks effect
            createFireworks(canvas);
            
            // Close button handler
            closeBtn.addEventListener('click', function() {
                overlay.style.animation = 'fadeIn 0.5s ease reverse';
                setTimeout(() => {
                    overlay.style.display = 'none';
                    sessionStorage.setItem('newYearEffectSeen', 'true');
                }, 500);
            });
            
            // Auto-close after 10 seconds
            setTimeout(() => {
                if (overlay.style.display !== 'none') {
                    closeBtn.click();
                }
            }, 10000);
        }
        
        function createFireworks(container) {
            const colors = ['#ff0000', '#00ff00', '#0000ff', '#ffff00', '#ff00ff', '#00ffff', '#ffd700'];
            
            function createParticle() {
                const particle = document.createElement('div');
                const size = Math.random() * 4 + 2;
                const startX = Math.random() * window.innerWidth;
                const startY = Math.random() * window.innerHeight;
                const color = colors[Math.floor(Math.random() * colors.length)];
                
                particle.style.position = 'absolute';
                particle.style.width = size + 'px';
                particle.style.height = size + 'px';
                particle.style.background = color;
                particle.style.borderRadius = '50%';
                particle.style.left = startX + 'px';
                particle.style.top = startY + 'px';
                particle.style.pointerEvents = 'none';
                particle.style.boxShadow = `0 0 10px ${color}`;
                
                container.appendChild(particle);
                
                const angle = Math.random() * Math.PI * 2;
                const velocity = Math.random() * 3 + 2;
                let x = startX;
                let y = startY;
                let vx = Math.cos(angle) * velocity;
                let vy = Math.sin(angle) * velocity;
                let opacity = 1;
                
                function animate() {
                    x += vx;
                    y += vy;
                    vy += 0.1; // gravity
                    opacity -= 0.01;
                    
                    particle.style.left = x + 'px';
                    particle.style.top = y + 'px';
                    particle.style.opacity = opacity;
                    
                    if (opacity > 0) {
                        requestAnimationFrame(animate);
                    } else {
                        particle.remove();
                    }
                }
                
                animate();
            }
            
            // Create particles periodically
            const interval = setInterval(() => {
                for (let i = 0; i < 5; i++) {
                    createParticle();
                }
            }, 200);
            
            // Stop after 10 seconds
            setTimeout(() => clearInterval(interval), 10000);
        }
    })();
</script>