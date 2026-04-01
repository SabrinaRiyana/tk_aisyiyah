@if(request()->routeIs('filament.admin.auth.login'))
<style>
    html, body {
        margin: 0 !important;
        padding: 0 !important;
        height: 100vh !important;
        overflow: hidden !important;
    }

    body {
        background-image:
            linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)),
            url('/assets/images/Halaman.png');
        background-size: cover !important;
        background-position: center !important;
        background-repeat: no-repeat !important;
    }

    .fi-layout,
    .fi-simple-layout,
    .fi-simple-page-layout,
    .fi-simple-main,
    .fi-simple-main-ctn,
    main {
        background: transparent !important;
        background-color: transparent !important;
        min-height: 100vh !important;
        height: auto !important;
        padding: 0 !important;
        margin: 0 !important;
    }

    .fi-simple-page {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        min-height: 100vh !important;
        height: auto !important;
    }

    .fi-simple-page-content {
        background: rgba(0, 0, 0, 0.35);
        backdrop-filter: blur(20px) !important;
        -webkit-backdrop-filter: blur(20px) !important;
        border-radius: 20px !important;
        border: 1px solid rgba(255, 255, 255, 0.15);
        padding: 44px 36px 36px !important;
        width: 100% !important;
        max-width: 380px !important;
        box-shadow: 0 12px 48px rgba(0,0,0,0.30) !important;
        position: relative !important;
        margin: auto !important;
    }

    .fi-simple-header {
        text-align: center !important;
        margin-bottom: 24px !important;
    }

    .fi-logo {
        display: flex !important;
        justify-content: center !important;
        margin-bottom: 10px !important;
    }

    .fi-logo img {
        filter: drop-shadow(0 2px 8px rgba(0,0,0,0.4)) !important;
        max-height: 64px !important;
        width: auto !important;
        object-fit: contain !important;
        display: block !important;
    }

    .fi-simple-page-content .fi-heading,
    .fi-simple-page-content h1,
    .fi-simple-page-content h2,
    .fi-simple-page-content label,
    .fi-simple-page-content .fi-label,
    .fi-simple-page-content p,
    .fi-simple-page-content span,
    .fi-simple-page-content a {
        color: #ffffff;
        text-shadow: 0 1px 4px rgba(0,0,0,0.4);
    }

    .fi-simple-page-content input[type="text"],
    .fi-simple-page-content input[type="email"],
    .fi-simple-page-content input[type="password"] {
        background: rgba(255, 255, 255, 0.85);
        border: 1px solid rgba(255, 255, 255, 0.6);
        border-radius: 10px !important;
        padding: 11px 14px !important;
        font-size: 0.88rem !important;
        color: #222;
        text-shadow: none !important;
    }

    .fi-simple-page-content input:focus {
        border-color: rgba(255,255,255,0.95) !important;
        background: rgba(255,255,255,0.95);
        box-shadow: 0 0 0 3px rgba(255,255,255,0.30) !important;
        outline: none !important;
    }

    .fi-simple-page-content .fi-input-wrp {
        overflow: visible !important;
    }

    .fi-simple-page-content .fi-input-wrp button,
    .fi-simple-page-content [class*="fi-input-wrp"] button {
        background: transparent !important;
        border: none !important;
        box-shadow: none !important;
        padding: 0 10px !important;
        width: auto !important;
        min-width: unset !important;
        text-shadow: none !important;
        cursor: pointer !important;
    }

    .fi-simple-page-content .fi-input-wrp button span,
    .fi-simple-page-content [class*="fi-input-wrp"] button span {
        color: #444 !important;
        text-shadow: none !important;
    }

    .fi-simple-page-content .fi-input-wrp button svg,
    .fi-simple-page-content [class*="fi-input-wrp"] button svg {
        display: block !important;
        width: 20px !important;
        height: 20px !important;
        stroke: #444 !important;
        color: #444 !important;
        fill: none !important;
        opacity: 1 !important;
        visibility: visible !important;
        filter: none !important;
    }

    .fi-simple-page-content .fi-input-wrp button svg *,
    .fi-simple-page-content [class*="fi-input-wrp"] button svg * {
        stroke: #444 !important;
        color: #444 !important;
        opacity: 1 !important;
        visibility: visible !important;
    }

    .fi-simple-page-content .fi-input-wrp button:hover svg,
    .fi-simple-page-content [class*="fi-input-wrp"] button:hover svg {
        stroke: #111 !important;
    }

    .fi-simple-page-content .fi-btn,
    .fi-simple-page-content button[type="submit"] {
        width: 100% !important;
        background: linear-gradient(135deg, #f97316, #ea580c) !important;
        border: none !important;
        border-radius: 10px !important;
        color: #fff !important;
        font-weight: 700 !important;
        font-size: 0.95rem !important;
        padding: 14px !important;
        cursor: pointer !important;
        box-shadow: 0 4px 20px rgba(249,115,22,0.50) !important;
        transition: all 0.2s !important;
        text-shadow: none !important;
    }

    .fi-simple-page-content .fi-btn:hover,
    .fi-simple-page-content button[type="submit"]:hover {
        background: linear-gradient(135deg, #ea580c, #c2410c) !important;
        transform: translateY(-2px) !important;
    }

    .btn-back-beranda {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 6px !important;
        width: 100% !important;
        margin-top: 10px !important;
        padding: 12px !important;
        background: transparent !important;
        border: 1.5px solid rgba(255,255,255,0.55) !important;
        border-radius: 10px !important;
        color: #ffffff !important;
        font-size: 0.88rem !important;
        font-weight: 600 !important;
        text-decoration: none !important;
        text-shadow: 0 1px 3px rgba(0,0,0,0.4) !important;
        cursor: pointer !important;
        transition: all 0.2s ease !important;
        letter-spacing: 0.03em !important;
        box-sizing: border-box !important;
    }

    .btn-back-beranda:hover {
        background: rgba(255,255,255,0.18) !important;
        border-color: rgba(255,255,255,0.85) !important;
        transform: translateY(-1px) !important;
        color: #fff !important;
        text-decoration: none !important;
    }

    .btn-back-beranda svg {
        flex-shrink: 0 !important;
        filter: none !important;
    }

    #login-popup-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.55);
        z-index: 99999;
        align-items: center;
        justify-content: center;
    }

    #login-popup-overlay.show { display: flex !important; }

    #login-popup-box {
        background: #fff;
        border-radius: 20px;
        padding: 40px 48px;
        text-align: center;
        box-shadow: 0 16px 60px rgba(0,0,0,0.35);
        animation: popupIn 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        min-width: 260px;
    }

    @keyframes popupIn {
        from { transform: scale(0.6); opacity: 0; }
        to   { transform: scale(1);   opacity: 1; }
    }

    #login-popup-icon {
        width: 72px; height: 72px; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 16px; font-size: 2.2rem; font-weight: 900;
    }

    #login-popup-icon.success { background: #dcfce7; color: #16a34a; border: 3px solid #16a34a; }
    #login-popup-icon.error   { background: #fee2e2; color: #dc2626; border: 3px solid #dc2626; }

    #login-popup-title {
        font-size: 1.2rem; font-weight: 800;
        margin-bottom: 20px; letter-spacing: 0.05em;
        text-shadow: none !important;
    }

    #login-popup-title.success { color: #16a34a !important; }
    #login-popup-title.error   { color: #dc2626 !important; }

    #login-popup-btn {
        padding: 11px 40px; border: none; border-radius: 10px;
        font-weight: 700; font-size: 0.95rem; cursor: pointer;
        transition: opacity 0.2s, transform 0.15s;
        text-shadow: none !important; color: #fff !important;
    }

    #login-popup-btn.success { background: #16a34a; }
    #login-popup-btn.error   { background: #dc2626; }
    #login-popup-btn:hover   { opacity: 0.85; transform: translateY(-1px); }
</style>

<!-- Popup overlay -->
<div id="login-popup-overlay">
    <div id="login-popup-box">
        <div id="login-popup-icon"><span id="login-popup-icon-char"></span></div>
        <div id="login-popup-title"></div>
        <button id="login-popup-btn" onclick="closeLoginPopup()"></button>
    </div>
</div>

<script>
    function showLoginPopup(type) {
        const overlay  = document.getElementById('login-popup-overlay');
        const icon     = document.getElementById('login-popup-icon');
        const iconChar = document.getElementById('login-popup-icon-char');
        const title    = document.getElementById('login-popup-title');
        const btn      = document.getElementById('login-popup-btn');

        if (type === 'success') {
            icon.className = 'success'; iconChar.innerHTML = '✓';
            title.className = 'success'; title.textContent = 'LOGIN BERHASIL';
            btn.className = 'success'; btn.textContent = 'Oke';
        } else {
            icon.className = 'error'; iconChar.innerHTML = '✕';
            title.className = 'error'; title.textContent = 'LOGIN GAGAL';
            btn.className = 'error'; btn.textContent = 'Coba Lagi';
        }
        overlay.classList.add('show');
    }

    function closeLoginPopup() {
        document.getElementById('login-popup-overlay').classList.remove('show');
    }

    document.addEventListener('DOMContentLoaded', function () {
        const content = document.querySelector('.fi-simple-page-content');
        if (content) {
            const btn = document.createElement('a');
            btn.href = '/';
            btn.className = 'btn-back-beranda';
            btn.innerHTML = `
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9.5L12 3l9 6.5V20a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9.5z"/>
                    <polyline points="9 21 9 12 15 12 15 21"/>
                </svg>
                Kembali ke Beranda
            `;
            content.appendChild(btn);
        }

        let errorPopupShown = false;
        const observer = new MutationObserver(function(mutations) {
            if (errorPopupShown) return;
            mutations.forEach(function(mutation) {
                mutation.addedNodes.forEach(function(node) {
                    if (node.nodeType !== 1) return;
                    const hasError =
                        node.matches?.('[class*="fi-color-danger"]') ||
                        node.matches?.('[class*="fi-fo-field-wrp-error"]') ||
                        node.querySelector?.('[class*="fi-color-danger"]') ||
                        node.querySelector?.('[class*="fi-fo-field-wrp-error"]') ||
                        node.querySelector?.('p[class*="danger"]') ||
                        (node.textContent && (
                            node.textContent.includes('credentials do not match') ||
                            node.textContent.includes('These credentials do not match')
                        ));
                    if (hasError) {
                        errorPopupShown = true;
                        showLoginPopup('error');
                        const btn = document.getElementById('login-popup-btn');
                        btn.addEventListener('click', function handler() {
                            errorPopupShown = false;
                            btn.removeEventListener('click', handler);
                        }, { once: true });
                    }
                });
            });
        });
        observer.observe(document.body, { childList: true, subtree: true });

        document.addEventListener('livewire:navigated', function() {
            if (!window.location.pathname.includes('/login')) {
                showLoginPopup('success');
            }
        });

        function fixEyeIcon() {
            document.querySelectorAll(
                '.fi-input-wrp button, [class*="fi-input-wrp"] button'
            ).forEach(function(btn) {
                if (btn.type === 'submit') return;
                btn.style.setProperty('background',  'transparent', 'important');
                btn.style.setProperty('border',      'none',        'important');
                btn.style.setProperty('box-shadow',  'none',        'important');
                btn.style.setProperty('padding',     '0 10px',      'important');
                btn.style.setProperty('width',       'auto',        'important');
                btn.style.setProperty('cursor',      'pointer',     'important');
                btn.querySelectorAll('span').forEach(function(s) {
                    s.style.setProperty('color',       '#444', 'important');
                    s.style.setProperty('text-shadow', 'none', 'important');
                });
                btn.querySelectorAll('svg').forEach(function(svg) {
                    svg.style.setProperty('display',     'block',   'important');
                    svg.style.setProperty('width',       '20px',    'important');
                    svg.style.setProperty('height',      '20px',    'important');
                    svg.style.setProperty('stroke',      '#444',    'important');
                    svg.style.setProperty('fill',        'none',    'important');
                    svg.style.setProperty('color',       '#444',    'important');
                    svg.style.setProperty('opacity',     '1',       'important');
                    svg.style.setProperty('visibility',  'visible', 'important');
                    svg.style.setProperty('filter',      'none',    'important');
                    svg.querySelectorAll('*').forEach(function(el) {
                        el.style.setProperty('stroke',     '#444',   'important');
                        el.style.setProperty('opacity',    '1',      'important');
                        el.style.setProperty('visibility', 'visible','important');
                    });
                });
            });
        }
        fixEyeIcon();
        const eyeObserver = new MutationObserver(fixEyeIcon);
        eyeObserver.observe(document.body, { childList: true, subtree: true });
    });
</script>
@endif

<!-- {{-- ===== SIDEBAR & NAVBAR STYLE (semua halaman admin) ===== --}}
@unless(request()->routeIs('filament.admin.auth.login'))
<style>
    /* ===== SIDEBAR ===== */
    .fi-sidebar {
        background-color: #ffffff;
        border-right: 1px solid #e5e7eb;
        padding: 0.75rem !important;
    }

    .fi-sidebar-header {
        background-color: #ffffff;
        border: 2px solid #059669 !important;
        border-radius: 1rem !important;
        padding: 0.5rem 0.75rem !important;
        margin-bottom: 1rem !important;
    }

    .fi-sidebar-group-label {
        color: #9ca3af !important;
        font-size: 0.7rem !important;
        font-weight: 600 !important;
        text-transform: uppercase !important;
        letter-spacing: 0.05em !important;
        padding-left: 0.5rem !important;
    }

    .fi-sidebar-item-button {
        border-radius: 0.625rem !important;
        margin-bottom: 2px !important;
        color: #374151 !important;
        font-size: 0.875rem !important;
        font-weight: 500 !important;
        transition: all 0.15s ease !important;
    }

    .fi-sidebar-item-button:hover {
        background-color: #d1fae5 !important;
        color: #059669 !important;
    }

    .fi-sidebar-item-button:hover svg {
        color: #059669 !important;
        stroke: #059669 !important;
    }

    .fi-sidebar-item-button.fi-active,
    .fi-sidebar-item-button[aria-current="page"] {
        background-color: #059669 !important;
        color: #ffffff !important;
    }

    .fi-sidebar-item-button.fi-active svg,
    .fi-sidebar-item-button[aria-current="page"] svg {
        color: #ffffff !important;
        stroke: #ffffff !important;
    }

    .fi-sidebar-item-button svg {
        color: #6b7280 !important;
    }

    /* Sidebar collapse button */
    .fi-sidebar-close-overlay-btn,
    .fi-sidebar-collapse-btn {
        color: #6b7280 !important;
    }

    /* ===== TOPBAR / NAVBAR ===== */
    .fi-topbar {
        background-color: #ffffff !important;
        border-bottom: 1px solid #e5e7eb !important;
        box-shadow: none !important;
    }

    nav.fi-topbar {
        background-color: #ffffff !important;
    }

    /* ===== MAIN CONTENT ===== */
    .fi-main,
    .fi-main-ctn {
        background-color: #f3f4f6 !important;
    }

    /* ===== LAYOUT WRAPPER ===== */
    .fi-layout {
        background-color: #f3f4f6 !important;
    }
</style>
@endunless -->