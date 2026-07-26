<!DOCTYPE html>
<html lang="id">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes" />
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TK Aisyiyah Mimika</title>
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
        html, body { overflow-x: hidden; width: 100%; font-family: "Aeonik TRIAL-Regular", Helvetica, Arial, sans-serif; scroll-behavior: smooth; font-size: 16px; }
        .navbar { position: fixed; top: clamp(10px, 3vw, 50px); left: 50%; transform: translateX(-50%); width: 92%; max-width: 1620px; display: flex; align-items: center; justify-content: space-between; padding: clamp(6px,1.2vw,10px) clamp(10px,1.5vw,15px) clamp(6px,1.2vw,10px) clamp(12px,1.8vw,20px); background-color: rgba(0,0,0,0.01); border-radius: 100px; backdrop-filter: blur(30px) brightness(100%) saturate(105%); -webkit-backdrop-filter: blur(30px) brightness(100%) saturate(105%); box-shadow: inset 0 1px 0 rgba(255,255,255,0.4), inset 1px 0 0 rgba(255,255,255,0.32), inset 0 -1px 20px rgba(0,0,0,0.2), inset -1px 0 20px rgba(0,0,0,0.16); z-index: 1000; transition: all 0.3s ease; }
        .navbar.white-bg { background-color: rgba(255,255,255,0.05); box-shadow: inset 0 1px 0 rgba(0,204,48,0.4), inset 1px 0 0 rgba(0,204,48,0.32), inset 0 -1px 20px rgba(0,204,48,0.2), inset -1px 0 20px rgba(0,204,48,0.16); }
        .navbar.white-bg .nav-brand, .navbar.white-bg .nav-item { color: #00CC30; }
        .navbar.white-bg .nav-item:hover { color: #009a24; }
        .navbar.white-bg .btn-admin { border-color: #00CC30; color: #00CC30; background: rgba(255,255,255,0.1); }
        .navbar.white-bg .nav-hamburger span { background: #00CC30; }
        .nav-logo { display: flex; align-items: center; gap: clamp(8px,1.5vw,15px); flex-shrink: 0; }
        .logo-wrapper { width: clamp(38px,5.5vw,60px); height: clamp(38px,5.5vw,60px); background: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .logo-img { width: 80%; height: 80%; object-fit: contain; }
        .nav-brand { font-size: clamp(.85rem,1.5vw,1.25rem); font-weight: 400; color: #fff; white-space: nowrap; transition: color .3s; }
        .nav-right { display: flex; align-items: center; gap: clamp(4px,1vw,10px); flex-shrink: 0; }
        .nav-item { padding: clamp(6px,1vw,10px) clamp(8px,1.2vw,15px); font-size: clamp(.8rem,1.2vw,1.05rem); color: #fff; white-space: nowrap; cursor: pointer; transition: all .3s; flex-shrink: 0; }
        .nav-item:hover { color: #00cc30; }
        .btn-admin { padding: clamp(6px, 1vw, 10px) clamp(10px, 1.5vw, 20px); border: 1px solid #fff; border-radius: 100px; background: rgba(0,0,0,0.01); color: #fff; font-size: clamp(.78rem, 1.1vw, 1.05rem); cursor: pointer; transition: all .3s; white-space: nowrap; flex-shrink: 0; -webkit-backdrop-filter: blur(18.5px); backdrop-filter: blur(18.5px); }
        .btn-admin:hover { background: rgba(255,255,255,0.1); }
        .btn-ppdb { padding: clamp(6px,1vw,10px) clamp(12px,1.8vw,25px); border: none; border-radius: 100px; background: linear-gradient(102deg,#00af29 0%,#00cc30 100%); color: #fff; font-size: clamp(.78rem,1.1vw,1.05rem); cursor: pointer; transition: all .3s; white-space: nowrap; flex-shrink: 0; }
        .btn-ppdb:hover { transform: translateY(-2px); box-shadow: 0 4px 15px rgba(0,204,48,.4); }
        .nav-hamburger { display: none; flex-direction: column; gap: 5px; cursor: pointer; padding: 8px; flex-shrink: 0; z-index: 1002; }
        .nav-hamburger span { display: block; width: 24px; height: 2.5px; background: #fff; border-radius: 2px; transition: all .3s; }
        .nav-hamburger.open span:nth-child(1) { transform: translateY(7.5px) rotate(45deg); }
        .nav-hamburger.open span:nth-child(2) { opacity: 0; }
        .nav-hamburger.open span:nth-child(3) { transform: translateY(-7.5px) rotate(-45deg); }
        .nav-mobile-menu { display: none; position: fixed; inset: 0; background: rgba(0,140,40,0.97); z-index: 999; flex-direction: column; align-items: center; justify-content: center; gap: 20px; padding: 40px 24px; }
        .nav-mobile-menu.open { display: flex; }
        .nav-mobile-close { position: absolute; top: 22px; right: 22px; font-size: 2rem; color: #fff; cursor: pointer; background: none; border: none; line-height: 1; }
        .nav-mobile-item { color: #fff; font-size: clamp(1.2rem,5vw,1.6rem); font-weight: 600; cursor: pointer; padding: 10px 24px; border-radius: 12px; transition: background .2s; text-align: center; }
        .nav-mobile-item:hover { background: rgba(255,255,255,.15); }
        .nav-mobile-divider { width: 60px; height: 2px; background: rgba(255,255,255,.3); border-radius: 2px; }
        .nav-mobile-btns { display: flex; gap: 12px; flex-wrap: wrap; justify-content: center; margin-top: 8px; }
        .section-hero { position: relative; width: 100%; min-height: 100svh; height: 100svh; overflow: hidden; display: flex; align-items: center; justify-content: center; }
        .hero-background { position: absolute; top: 0; left: 50%; transform: translateX(-50%); width: 100%; height: 100%; object-fit: cover; z-index: 1; opacity: 0; transition: opacity 1.5s ease-in-out; }
        .hero-background.active { opacity: 1; z-index: 2; }
        .hero-content { position: relative; z-index: 5; text-align: center; max-width: min(1000px, 92vw); padding: 0 clamp(16px,4vw,20px); }
        .hero-title { font-family: "Coolvetica-Regular","Arial Black",sans-serif; font-size: clamp(1.8rem,7vw,5.2rem); font-weight: 400; color: #fff; letter-spacing: clamp(1px,0.5vw,2.6px); line-height: 1.2; margin-bottom: clamp(16px,3vw,30px); padding-bottom: clamp(14px,2.5vw,20px); border-bottom: 2px solid #fff; }
        .hero-text { font-size: clamp(.9rem,2vw,1.25rem); line-height: 1.6; color: #fff; letter-spacing: .04em; }
        .section-colorful { position: relative; width: 100%; min-height: 100svh; background: #f5f5f5; display: flex; align-items: center; justify-content: center; overflow: hidden; }
        .box { position: absolute; width: 100%; height: 100%; top: 0; left: 0; z-index: 1; pointer-events: none; }
        .box .union { position: absolute; object-fit: fill; }
        .box .union-green { top: 0; left: 0; width: clamp(160px,25vw,360px); height: auto; filter: brightness(0) saturate(100%) invert(35%) sepia(85%) saturate(600%) hue-rotate(100deg) brightness(.85); animation: floating-leaf 5s ease-in-out infinite; }
        .box .union-red { top: clamp(40px,8vw,90px); right: 0; width: clamp(120px,18vw,250px); height: auto; filter: brightness(0) saturate(100%) invert(15%) sepia(90%) saturate(700%) hue-rotate(345deg) brightness(.9); animation: floating-leaf 4s ease-in-out infinite; animation-delay: 1s; }
        .box .union-blue { bottom: clamp(40px,8vw,100px); left: clamp(8px,2vw,20px); width: clamp(130px,20vw,280px); height: auto; filter: brightness(0) saturate(100%) invert(25%) sepia(90%) saturate(800%) hue-rotate(210deg) brightness(.9); animation: floating-leaf 6s ease-in-out infinite; animation-delay: 0.5s; }
        .box .union-yellow { bottom: 0; right: 0; width: clamp(180px,30vw,450px); height: auto; filter: brightness(0) saturate(100%) invert(95%) sepia(60%) saturate(500%) hue-rotate(5deg) brightness(1.05); animation: floating-leaf 5.5s ease-in-out infinite; animation-delay: 2s; }
        @keyframes floating-leaf { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-20px); } }
        .colorful-content { position: relative; z-index: 10; text-align: center; max-width: min(900px,90vw); padding: clamp(40px,6vw,60px) clamp(16px,4vw,20px); }
        .colorful-heading { font-family: "Coolvetica-Regular","Arial Black",sans-serif; font-size: clamp(2rem,7vw,5.5rem); font-weight: 700; color: #00a832; letter-spacing: clamp(1px,0.4vw,3px); line-height: 1.2; margin-bottom: 0; position: relative; display: inline-block; }
        .colorful-heading::after { content:''; position:absolute; bottom:-10px; left:0; right:0; height:2px; background:#00a832; }
        .colorful-paragraph { font-size: clamp(.9rem,2vw,1.35rem); line-height: 1.8; color: #00a832; margin: clamp(28px,4vw,40px) 0; }
        .btn-learn-more { display: inline-flex; align-items: center; gap: 10px; padding: clamp(10px,1.8vw,15px) clamp(20px,3.5vw,35px); border: none; border-radius: 100px; background: linear-gradient(102deg,#00af29 0%,#00cc30 100%); color: #fff; font-size: clamp(.88rem,1.5vw,1.15rem); font-weight: 500; cursor: pointer; transition: all .3s; box-shadow: 0 4px 20px rgba(0,168,50,.4); }
        .btn-learn-more:hover { transform: translateY(-3px); }
        .btn-learn-more::after { content:'›'; font-size:1.5rem; font-weight:bold; }
        .section-transition { position: relative; width: 100%; height: clamp(80px,12vw,200px); background: linear-gradient(to bottom,#f5f5f5 0%,#fff 100%); overflow: hidden; }
        .transition-blur { position: absolute; width: 100%; height: 100%; top: 0; left: 0; z-index: 1; pointer-events: none; }
        .transition-blur .blur-shape { position: absolute; filter: blur(80px); opacity: .2; }
        .blur-left { top: 50%; left: 10%; transform: translateY(-50%); width: clamp(150px,30vw,400px); height: clamp(80px,15vw,200px); background: radial-gradient(ellipse,#00a832 0%,transparent 70%); }
        .blur-center { top: 50%; left: 50%; transform: translate(-50%,-50%); width: clamp(140px,27vw,350px); height: clamp(70px,14vw,180px); background: radial-gradient(ellipse,#ffeb00 0%,transparent 70%); }
        .blur-right { top: 50%; right: 10%; transform: translateY(-50%); width: clamp(150px,29vw,380px); height: clamp(75px,14vw,190px); background: radial-gradient(ellipse,#0052cc 0%,transparent 70%); }
        .section-profil-home { background: #fff; padding: clamp(40px,6vw,80px) 0; }
        .profil-home-inner { max-width: 1300px; margin: 0 auto; padding: 0 clamp(20px,5vw,60px); }
        .profil-grid { display: grid; grid-template-columns: 1fr 1fr; gap: clamp(32px,6vw,80px); align-items: center; }
        .profil-badge { display: inline-flex; align-items: center; gap: 8px; padding: 6px 16px; background: rgba(0,137,1,.1); border-radius: 100px; color: #008901; font-size: clamp(.72rem,1vw,.8rem); font-weight: 700; letter-spacing: .8px; text-transform: uppercase; margin-bottom: 16px; }
        .profil-badge::before { content:''; width:7px; height:7px; background:#008901; border-radius:50%; }
        .profil-heading { font-family: "Coolvetica-Regular","Arial Black",sans-serif; font-size: clamp(1.3rem,3vw,2.3rem); font-weight: 900; color: #008901; line-height: 1.2; margin-bottom: clamp(16px,2.5vw,28px); }
        .profil-text p { font-size: clamp(1rem,1.5vw,1.15rem); line-height: 1.92; color: #555; margin-bottom: clamp(10px,1.5vw,16px); text-align: justify; }
        .profil-img-wrap { position: relative; }
        .profil-img-main { width: 100%; aspect-ratio: 4/3; border-radius: 20px; overflow: hidden; box-shadow: 0 24px 64px rgba(0,0,0,.16); }
        .profil-img-main img { width: 100%; height: 100%; object-fit: cover; transition: transform .5s; display: block; }
        .profil-img-main:hover img { transform: scale(1.04); }
        .deco-sq { position: absolute; bottom: -18px; right: -18px; width: clamp(70px,10vw,140px); height: clamp(70px,10vw,140px); border-radius: 16px; background: #008901; opacity: .12; z-index: -1; }
        .deco-ci { position: absolute; top: -12px; left: -12px; width: clamp(50px,7vw,80px); height: clamp(50px,7vw,80px); border-radius: 50%; border: 3px solid #008901; opacity: .2; z-index: -1; }
        .sec-divider-home { max-width: 1300px; margin: 0 auto; padding: 0 clamp(20px,5vw,60px); }
        .sec-divider-line { height: 1.5px; background: linear-gradient(to right,transparent,#008901 30%,#008901 70%,transparent); opacity: .2; }
        .section-kenapa-home { background: #fff; padding: clamp(36px,5vw,60px) 0 clamp(48px,7vw,80px); }
        .kenapa-home-inner { max-width: 1300px; margin: 0 auto; padding: 0 clamp(20px,5vw,60px); }
        .kenapa-top { display: grid; grid-template-columns: clamp(180px,24vw,300px) 1fr; gap: clamp(28px,6vw,80px); align-items: start; }
        .kenapa-title { font-family: "Coolvetica-Regular","Arial Black",sans-serif; font-size: clamp(1.6rem,4vw,3.2rem); font-weight: 900; color: #008901; line-height: 1.1; }
        .kenapa-title::after { content:''; display:block; width:clamp(36px,5vw,56px); height:5px; background:#008901; border-radius:4px; margin-top:clamp(12px,2vw,20px); }
        .kenapa-desc p { font-size: clamp(1rem,1.5vw,1.15rem); line-height: 1.9; color: #555; margin-bottom: clamp(10px,1.5vw,16px); text-align: justify; }
        .kenapa-desc p:last-child { margin-bottom: 0; }
        .section-cta { position: relative; width: 100%; background: #fff; display: flex; align-items: center; justify-content: center; padding: clamp(36px,6vw,60px) clamp(20px,4vw,20px); }
        .cta-container { text-align: center; max-width: min(900px,92vw); }
        .cta-title { font-family: "Arial Black","Coolvetica-Regular",sans-serif; font-size: clamp(1.3rem,4vw,2.8rem); font-weight: 900; color: #00a832; margin: 0 0 clamp(20px,3vw,30px); line-height: 1.3; }
        .btn-cta-ppdb { display: inline-block; padding: clamp(10px,1.8vw,12px) clamp(24px,4vw,36px); border: none; border-radius: 100px; background: linear-gradient(102deg,#00af29 0%,#00cc30 100%); color: #fff; font-size: clamp(.85rem,1.3vw,.95rem); font-weight: 700; letter-spacing: .5px; cursor: pointer; transition: all .3s; box-shadow: 0 4px 18px rgba(0,168,50,.35); text-decoration: none; }
        .btn-cta-ppdb:hover { transform: translateY(-2px); }

        /* ══ FOOTER BARU ══ */
        .footer { background: linear-gradient(160deg, #006b22 0%, #009830 55%, #00b836 100%); color: #fff; font-family: "Segoe UI", Helvetica, Arial, sans-serif; padding: clamp(40px,5vw,60px) clamp(20px,5vw,60px) 0; }
        .footer-top { max-width: 1300px; margin: 0 auto; display: grid; grid-template-columns: 1.5fr 1fr 1fr 1.2fr; gap: clamp(28px,4vw,48px); padding-bottom: clamp(32px,4vw,48px); border-bottom: 1px solid rgba(255,255,255,0.15); }
        .footer-brand { display: flex; flex-direction: column; gap: 14px; }
        .footer-logo-row { display: flex; align-items: center; gap: 12px; }
        .footer-logo-circle { width: clamp(44px,6vw,56px); height: clamp(44px,6vw,56px); background: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 4px 16px rgba(0,0,0,0.18); overflow: hidden; }
        .footer-logo-circle img { width: 80%; height: 80%; object-fit: contain; }
        .footer-school-name { font-size: clamp(0.9rem,1.4vw,1.05rem); font-weight: 700; line-height: 1.35; color: #fff; }
        .footer-tagline { font-size: clamp(0.78rem,1.1vw,0.86rem); line-height: 1.75; color: rgba(255,255,255,0.68); max-width: 230px; }
        .footer-socials { display: flex; gap: 8px; margin-top: 2px; }
        .footer-social-btn { width: 34px; height: 34px; border-radius: 8px; background: rgba(60,60,60,0.55); backdrop-filter: blur(6px); border: 1px solid rgba(255,255,255,0.2); display: flex; align-items: center; justify-content: center; font-size: 15px; cursor: pointer; text-decoration: none; transition: background .2s, transform .2s; }
        .footer-social-btn:hover { background: rgba(60,60,60,0.75); transform: translateY(-2px); }
        .footer-col-title { font-size: 0.7rem; font-weight: 700; letter-spacing: 1.3px; text-transform: uppercase; color: rgba(255,255,255,0.5); margin-bottom: 16px; }
        .footer-nav-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 10px; }
        .footer-nav-list li a { color: rgba(255,255,255,0.82); font-size: clamp(0.82rem,1.1vw,0.92rem); text-decoration: none; display: flex; align-items: center; gap: 7px; transition: color .2s, gap .2s; }
        .footer-nav-list li a::before { content: '›'; font-size: 1rem; font-weight: 700; opacity: 0.5; flex-shrink: 0; }
        .footer-nav-list li a:hover { color: #b6ffd0; gap: 11px; }
        .footer-contact-list { display: flex; flex-direction: column; gap: 12px; }
        .footer-contact-item { display: flex; align-items: flex-start; gap: 10px; }
        .footer-contact-icon { width: 34px; height: 34px; border-radius: 8px; background: rgba(60,60,60,0.55); backdrop-filter: blur(6px); border: 1px solid rgba(255,255,255,0.2); display: flex; align-items: center; justify-content: center; flex-shrink: 0; transition: background .2s; }
    .footer-contact-icon:hover { background: rgba(60,60,60,0.75); }
        .footer-contact-text { font-size: clamp(0.78rem,1.1vw,0.88rem); color: rgba(255,255,255,0.82); line-height: 1.55; word-break: break-word; }
        .footer-map-col { display: flex; flex-direction: column; gap: 12px; }
        .footer-map-box { border-radius: 14px; overflow: hidden; background: transparent; border: 1px solid rgba(255,255,255,0.2); height: clamp(120px,14vw,150px); display: flex; align-items: center; justify-content: center; cursor: pointer; transition: background .35s ease, transform .3s; flex-direction: column; gap: 6px; text-decoration: none; position: relative; }
        .footer-map-box:hover { background: rgba(0,0,0,0.35); transform: translateY(-3px); }
        .footer-map-box img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; opacity: 1; transition: opacity .35s ease; }
        .footer-map-box:hover img { opacity: 0.6; }
        .footer-map-box-inner { position: relative; z-index: 1; display: flex; flex-direction: column; align-items: center; gap: 5px; opacity: 0; transition: opacity .35s ease; }
        .footer-map-box:hover .footer-map-box-inner { opacity: 1; }
        .footer-map-pin { font-size: 24px; }
        .footer-map-label { font-size: 12px; font-weight: 700; color: #fff; text-align: center; line-height: 1.4; text-shadow: 0 1px 4px rgba(0,0,0,0.4); }
        .footer-ppdb-badge { display: flex; align-items: center; gap: 10px; background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.22); border-radius: 12px; padding: 10px 14px; }
        .footer-ppdb-dot { width: 8px; height: 8px; border-radius: 50%; flex-shrink: 0; animation: ftPpdbPulse 2s ease-in-out infinite; }
        .footer-ppdb-dot.open  { background: #7dffa3; }
        .footer-ppdb-dot.closed { background: #ff6b6b; }
        .footer-ppdb-badge.closed { background: rgba(255,80,80,0.15); border-color: rgba(255,100,100,0.3); }
        @keyframes ftPpdbPulse { 0%,100%{opacity:1;transform:scale(1);}50%{opacity:.4;transform:scale(.85);} }
        .footer-ppdb-text strong { display: block; font-size: 0.82rem; font-weight: 700; color: #fff; }
        .footer-ppdb-text span { font-size: 0.74rem; color: rgba(255,255,255,0.65); }
        .footer-bottom { max-width: 1300px; margin: 0 auto; padding: clamp(14px,2vw,20px) 0 clamp(20px,3vw,28px); display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 8px; }
        .footer-bottom-copy { font-size: 0.75rem; color: rgba(255,255,255,0.48); }
        .footer-bottom-brand { display: flex; align-items: center; gap: 6px; font-size: 0.75rem; font-weight: 700; color: rgba(255,255,255,0.72); }
        .footer-bottom-brand::before { content:''; display:inline-block; width:6px; height:6px; background:#7dffa3; border-radius:50%; }

        /* CHATBOT */
        .chatbot-toggle { position: fixed; bottom: clamp(80px,12vw,110px); right: clamp(16px,3vw,30px); width: clamp(50px,7vw,60px); height: clamp(50px,7vw,60px); background: linear-gradient(135deg,#00af29,#00cc30); border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; box-shadow: 0 4px 20px rgba(0,204,48,.4); z-index: 9997; transition: all .3s; border: 3px solid white; }
        .chatbot-toggle:hover { transform: scale(1.1); }
        .chatbot-toggle-icon { font-size: clamp(1.4rem,2.5vw,1.8rem); color: white; }
        .chatbot-badge { position: absolute; top: -5px; right: -5px; width: 22px; height: 22px; background: #f00; border-radius: 50%; display: none; align-items: center; justify-content: center; font-size: .7rem; color: white; font-weight: bold; border: 2px solid white; animation: pulse 2s infinite; }
        @keyframes pulse { 0%,100%{transform:scale(1);}50%{transform:scale(1.1);} }
        .chatbot-container { position: fixed; bottom: clamp(140px,18vw,180px); right: clamp(12px,3vw,30px); width: min(400px,calc(100vw - 24px)); height: clamp(480px,72vh,630px); background: white; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,.3); z-index: 9998; display: none; flex-direction: column; overflow: hidden; opacity: 0; }
        .chatbot-container.show { display: flex; opacity: 1; animation: slideUpChat .4s ease; }
        @keyframes slideUpChat { from{opacity:0;transform:translateY(20px);}to{opacity:1;transform:translateY(0);} }
        .chatbot-header { background: linear-gradient(135deg,#00af29,#00cc30); color: white; padding: 16px 18px; display: flex; justify-content: space-between; align-items: center; flex-shrink: 0; }
        .chatbot-header-content { display: flex; align-items: center; gap: 10px; }
        .chatbot-avatar { width: 40px; height: 40px; background: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.3rem; }
        .chatbot-header-text h3 { margin: 0; font-size: 1rem; font-weight: 600; }
        .chatbot-header-text p { margin: 0; font-size: .75rem; opacity: .9; }
        .chatbot-minimize { background: rgba(255,255,255,.2); border: none; color: white; width: 30px; height: 30px; border-radius: 50%; cursor: pointer; font-size: 1.2rem; display: flex; align-items: center; justify-content: center; }
        .chatbot-messages { flex: 1; padding: 16px; overflow-y: auto; background: #f8f9fa; min-height: 0; }
        .chatbot-messages::-webkit-scrollbar { width: 6px; }
        .chatbot-messages::-webkit-scrollbar-thumb { background: #00cc30; border-radius: 3px; }
        .chatbot-message { margin-bottom: 12px; display: flex; }
        .chatbot-message.bot { justify-content: flex-start; }
        .chatbot-message.user { justify-content: flex-end; }
        .chatbot-message-bubble { max-width: 82%; padding: 10px 14px; border-radius: 16px; word-wrap: break-word; line-height: 1.5; font-size: .88rem; }
        .chatbot-message.bot .chatbot-message-bubble { background: white; color: #333; border-bottom-left-radius: 4px; box-shadow: 0 2px 8px rgba(0,0,0,.08); }
        .chatbot-message.user .chatbot-message-bubble { background: linear-gradient(135deg,#00af29,#00cc30); color: white; border-bottom-right-radius: 4px; }
        .chatbot-typing { display: none; padding: 10px 14px; background: white; border-radius: 16px; border-bottom-left-radius: 4px; box-shadow: 0 2px 8px rgba(0,0,0,.08); width: fit-content; }
        .chatbot-typing span { height: 8px; width: 8px; background: #00cc30; border-radius: 50%; display: inline-block; margin-right: 4px; animation: chatTyping 1.4s infinite; }
        .chatbot-typing span:nth-child(2){animation-delay:.2s;} .chatbot-typing span:nth-child(3){animation-delay:.4s;}
        @keyframes chatTyping{0%,60%,100%{transform:translateY(0);}30%{transform:translateY(-10px);}}
        .chatbot-quick-replies { display: flex; flex-wrap: wrap; gap: 6px; padding: 8px 14px 10px; background: #f8f9fa; flex-shrink: 0; border-top: 1px solid #eee; }
        .quick-reply-btn { padding: 7px 12px; background: white; border: 1.5px solid #00cc30; border-radius: 15px; color: #00cc30; font-size: .82rem; cursor: pointer; transition: all .3s; white-space: nowrap; font-weight: 600; }
        .quick-reply-btn:hover { background: #00cc30; color: white; }
        .quick-reply-btn.masukan-btn { border-color: #0077cc; color: #0077cc; }
        .quick-reply-btn.masukan-btn:hover { background: #0077cc; color: white; }
        .chatbot-form-masukan { padding: 14px 16px 12px; background: #ffffff; border-top: 2px solid #e0f5e0; flex-shrink: 0; display: none; flex-direction: column; gap: 9px; max-height: 280px; overflow-y: auto; }
        .chatbot-form-masukan.show { display: flex; }
        .form-masukan-title { font-size: .84rem; font-weight: 800; color: #00a832; display: flex; align-items: center; gap: 6px; margin-bottom: 2px; }
        .masukan-form-name, .masukan-form-text { padding: 9px 12px; border: 2px solid #c8f0d0; border-radius: 12px; font-size: .84rem; outline: none; font-family: inherit; transition: border-color .25s; width: 100%; }
        .masukan-form-name:focus, .masukan-form-text:focus { border-color: #00cc30; }
        .masukan-form-text { resize: none; height: 68px; line-height: 1.5; }
        .masukan-stars-wrap { display: flex; align-items: center; gap: 8px; }
        .masukan-stars-wrap label { font-size: .78rem; color: #777; white-space: nowrap; }
        .masukan-stars-select { display: flex; gap: 3px; }
        .masukan-stars-select span { font-size: 1.25rem; cursor: pointer; transition: transform .15s; color: #ddd; user-select: none; line-height: 1; }
        .masukan-stars-select span.lit { color: #f59e0b; }
        .masukan-stars-select span:hover { transform: scale(1.25); }
        .form-btns { display: flex; gap: 8px; }
        .btn-submit-masukan { flex: 2; padding: 9px; background: linear-gradient(135deg,#00af29,#00cc30); color: white; border: none; border-radius: 12px; cursor: pointer; font-size: .88rem; font-weight: 700; transition: opacity .2s; }
        .btn-submit-masukan:hover { opacity: .9; }
        .btn-cancel-masukan { flex: 1; padding: 9px; background: #f0f0f0; color: #888; border: none; border-radius: 12px; cursor: pointer; font-size: .84rem; transition: background .2s; }
        .btn-cancel-masukan:hover { background: #e0e0e0; }
        .chatbot-input-container { padding: 10px 12px; background: white; border-top: 1px solid #e0e0e0; display: flex; gap: 8px; flex-shrink: 0; }
        .chatbot-input { flex: 1; padding: 9px 14px; border: 2px solid #e0e0e0; border-radius: 20px; font-size: .88rem; outline: none; transition: border-color .3s; font-family: inherit; }
        .chatbot-input:focus { border-color: #00cc30; }
        .chatbot-send { padding: 9px 18px; background: linear-gradient(135deg,#00af29,#00cc30); color: white; border: none; border-radius: 20px; cursor: pointer; font-size: .88rem; font-weight: 600; white-space: nowrap; }
        .btn-back-to-top { position: fixed; bottom: clamp(16px,3vw,30px); right: clamp(16px,3vw,30px); padding: clamp(10px,2vw,15px) clamp(18px,3vw,30px); border: none; border-radius: 100px; background: linear-gradient(102deg,#00af29,#00cc30); color: #fff; font-size: clamp(.85rem,1.5vw,1.05rem); font-weight: 500; cursor: pointer; transition: all .3s; box-shadow: 0 4px 15px rgba(0,168,50,.4); z-index: 9996; display: none; }
        .btn-back-to-top.show { display: inline-flex; align-items: center; gap: 8px; }
        .btn-back-to-top:hover { transform: translateY(-3px); }
        .btn-back-to-top::after { content: '⌃'; font-size: 1.2rem; font-weight: bold; }
        .toast-notif { position: fixed; bottom: 32px; left: 50%; transform: translateX(-50%) translateY(60px); background: linear-gradient(135deg,#00af29,#00cc30); color: white; padding: 14px 30px; border-radius: 100px; font-size: .95rem; font-weight: 700; box-shadow: 0 8px 28px rgba(0,204,48,.4); z-index: 99999; transition: transform .4s cubic-bezier(.22,1,.36,1), opacity .4s; opacity: 0; pointer-events: none; white-space: nowrap; }
        .toast-notif.show { transform: translateX(-50%) translateY(0); opacity: 1; }

        /* RESPONSIVE */
        @media (max-width: 1100px) { .profil-grid { grid-template-columns: 1fr; gap: 36px; } .kenapa-top { grid-template-columns: 1fr; gap: 24px; } }
        @media (max-width: 860px) { .nav-right { display: none; } .nav-hamburger { display: flex; } }
        @media (max-width: 1000px) { .footer-top { grid-template-columns: 1fr 1fr; } }
        @media (max-width: 600px) { .footer-top { grid-template-columns: 1fr; } .footer-tagline { max-width: 100%; } .footer-bottom { flex-direction: column; align-items: flex-start; } }
        @media (max-width: 768px) { .profil-img-wrap { order: -1; } }
        @media (max-width: 480px) { .chatbot-container { right: 8px; left: 8px; width: auto; bottom: 90px; } .chatbot-toggle { right: 12px; } .btn-back-to-top { right: 8px; } }
    </style>
</head>
<body>
    <div class="nav-mobile-menu" id="mobileMenu">
        <button class="nav-mobile-close" onclick="closeMobileMenu()">✕</button>
        <div class="nav-mobile-item" onclick="window.location.href='/'">Beranda</div>
        <div class="nav-mobile-divider"></div>
        <div class="nav-mobile-item" onclick="window.location.href='/profil'">Profil Sekolah</div>
        <div class="nav-mobile-item" onclick="window.location.href='/galeri'">Galeri</div>
        <div class="nav-mobile-divider"></div>
        <div class="nav-mobile-btns">
            <button class="btn-admin" onclick="window.location.href='/admin/login'">Admin Login</button>
            <button class="btn-ppdb" onclick="window.location.href='/ppdb'">PPDB 2027/2028</button>
        </div>
    </div>

    <section class="section-hero" id="hero">
        @php $banners = \App\Models\Banner::where('page', 'beranda')->orderBy('order')->get(); @endphp
        @foreach($banners as $index => $banner)
            <img class="hero-background {{ $index == 0 ? 'active' : '' }}" src="{{ asset('storage/' . $banner->image) }}" alt="Background {{ $index + 1 }}" />
        @endforeach
        <nav class="navbar" id="navbar">
            <div class="nav-logo">
                <div class="logo-wrapper"><img class="logo-img" src="{{ asset('assets/images/Logo TK.png') }}" alt="Logo TK Aisyiyah" /></div>
                <span class="nav-brand">TK Aisyiyah Mimika</span>
            </div>
            <div class="nav-right">
                <div class="nav-item" onclick="window.location.href='/'">Beranda</div>
                <div class="nav-item" onclick="window.location.href='/profil'">Profil Sekolah</div>
                <div class="nav-item" onclick="window.location.href='/galeri'">Galeri</div>
                <button class="btn-admin" onclick="window.location.href='/admin/login'">Admin Login</button>
                <button class="btn-ppdb" onclick="window.location.href='/ppdb'">PPDB 2027/2028</button>
            </div>
            <div class="nav-hamburger" id="hamburger" onclick="toggleMobileMenu()"><span></span><span></span><span></span></div>
        </nav>
        <div class="hero-content">
            <h1 class="hero-title">TK AISYIYAH MIMIKA</h1>
            <p class="hero-text">Tempat yang aman dan nyaman untuk belajar sambil bermain dan mendidik karakter anak usia dini di wilayah Mimika Papua Tengah</p>
        </div>
    </section>

    <div class="chatbot-toggle" id="chatbotToggle" onclick="toggleChatbot()">
        <div class="chatbot-toggle-icon" id="chatbotToggleIcon">💬</div>
        <div class="chatbot-badge" id="chatbotBadge">1</div>
    </div>
    <div class="chatbot-container" id="chatbotContainer">
        <div class="chatbot-header">
            <div class="chatbot-header-content"><div class="chatbot-avatar">🤖</div><div class="chatbot-header-text"><h3>Asisten TK Aisyiyah</h3><p>Online - Siap membantu</p></div></div>
            <button class="chatbot-minimize" onclick="toggleChatbot()">−</button>
        </div>
        <div class="chatbot-messages" id="chatbotMessages">
            <div class="chatbot-message bot"><div class="chatbot-message-bubble">Halo! 👋 Selamat datang di TK Aisyiyah Mimika. Saya siap membantu Anda! Gunakan tombol di bawah atau ketik pesan. 😊</div></div>
            <div class="chatbot-typing" id="chatbotTyping"><span></span><span></span><span></span></div>
        </div>
        <div class="chatbot-quick-replies">
            <button class="quick-reply-btn" onclick="sendQuickReply('PPDB')">📋 PPDB</button>
            <button class="quick-reply-btn" onclick="sendQuickReply('Fasilitas')">🏫 Fasilitas</button>
            <button class="quick-reply-btn" onclick="sendQuickReply('Biaya')">💰 Biaya</button>
            <button class="quick-reply-btn" onclick="sendQuickReply('Lokasi')">📍 Lokasi</button>
            <button class="quick-reply-btn masukan-btn" onclick="bukaFormMasukan()">📝 Beri Masukan</button>
        </div>
        <div class="chatbot-form-masukan" id="chatbotFormMasukan">
            <div class="form-masukan-title">Form Masukan / Testimoni</div>
            <input type="text" class="masukan-form-name" id="masukanNama" placeholder="Nama Anda (cth: Ibu Sari)" maxlength="50" />
            <div class="masukan-stars-wrap"><label>Rating:</label><div class="masukan-stars-select" id="masukanStars"><span data-v="1">★</span><span data-v="2">★</span><span data-v="3">★</span><span data-v="4">★</span><span data-v="5">★</span></div></div>
            <textarea class="masukan-form-text" id="masukanTeks" placeholder="Ceritakan pengalaman Anda bersama TK Aisyiyah Mimika..." maxlength="300"></textarea>
            <div class="form-btns"><button class="btn-submit-masukan" onclick="kirimMasukan()">📨 Kirim Masukan</button><button class="btn-cancel-masukan" onclick="tutupFormMasukan()">Batal</button></div>
        </div>
        <div class="chatbot-input-container">
            <input type="text" class="chatbot-input" id="chatbotInput" placeholder="Ketik pesan..." autocomplete="off" />
            <button class="chatbot-send" onclick="sendChatMessage()">Kirim</button>
        </div>
    </div>
    <button class="btn-back-to-top" id="backToTop" onclick="scrollToTop()">Back To The Top</button>

    <section class="section-colorful" id="colorful">
        <div class="box">
            <img class="union union-green" src="{{ asset('assets/images/Union-hijau.png') }}" alt="" />
            <img class="union union-red" src="{{ asset('assets/images/Union-merah.png') }}" alt="" />
            <img class="union union-blue" src="{{ asset('assets/images/Union-biru.png') }}" alt="" />
            <img class="union union-yellow" src="{{ asset('assets/images/Union-kuning.png') }}" alt="" />
        </div>
        <div class="colorful-content">
            <h2 class="colorful-heading">Lebih dari Sekadar Belajar</h2>
            <p class="colorful-paragraph">Kami juga membangun terbentuknya tunas pelajar yang bertaqwa, berakhlak mulia, mandiri, cakap, kreatif dan peduli.</p>
            <button class="btn-learn-more" onclick="learnMore()">Selengkapnya</button>
        </div>
    </section>

    <section class="section-transition">
        <div class="transition-blur">
            <div class="blur-shape blur-left"></div>
            <div class="blur-shape blur-center"></div>
            <div class="blur-shape blur-right"></div>
        </div>
    </section>

    <section class="section-profil-home" id="mengenal">
        <div class="profil-home-inner">
            <div class="profil-grid">
                <div>
                    <div class="profil-badge">Tentang Kami</div>
                    <h2 class="profil-heading">Mengenal TK Aisyiyah Mimika</h2>
                    <div class="profil-text">{!! $schoolDetail->history ?? 'Data sejarah belum diisi.' !!}</div>
                </div>
                <div class="profil-img-wrap">
                    <div class="profil-img-main">
                        @if($schoolDetail && $schoolDetail->image_path)
                            <img src="{{ asset('storage/' . $schoolDetail->image_path) }}" alt="Foto TK Aisyiyah" />
                        @else
                            <img src="{{ asset('assets/images/berkumpul.jpg') }}" alt="Foto TK Aisyiyah" />
                        @endif
                    </div>
                    <div class="deco-sq"></div>
                    <div class="deco-ci"></div>
                </div>
            </div>
        </div>
    </section>

    <div class="sec-divider-home"><div class="sec-divider-line"></div></div>

    <section class="section-kenapa-home" id="kenapa">
        <div class="kenapa-home-inner">
            <div class="kenapa-top">
                <div>
                    <h2 class="kenapa-title">{!! nl2br(e($schoolDetail->reason_title ?? "KENAPA\nHARUS TK\nAISYIYAH??")) !!}</h2>
                </div>
                <div class="kenapa-desc">
                    @if($schoolDetail && $schoolDetail->reasons)
                        @foreach($schoolDetail->reasons as $item)
                            <p>{{ $item['point'] }}</p>
                        @endforeach
                    @else
                        <p>Alasan belum diisi di dashboard.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="section-cta" id="cta">
        <div class="cta-container">
            <h2 class="cta-title">Mulai Petualangan Si Kecil bersama kami!<br>Daftar Sekarang !</h2>
            <a href="/ppdb" class="btn-cta-ppdb">PPDB 2027/2028</a>
        </div>
    </section>

    <!-- ══ FOOTER BARU ══ -->
    <footer class="footer">
        <div class="footer-top">
            <div class="footer-brand">
                <div class="footer-logo-row">
                    <div class="footer-logo-circle"><img src="{{ asset('assets/images/Logo TK.png') }}" alt="Logo TK Aisyiyah" /></div>
                    <div class="footer-school-name">TK Aisyiyah<br>Mimika</div>
                </div>
                <p class="footer-tagline">Tempat aman dan nyaman untuk belajar sambil bermain bagi anak usia dini di Mimika, Papua Tengah.</p>
                <div class="footer-socials">
                  <!-- Instagram: gradient asli -->
                  <a class="footer-social-btn" href="https://www.instagram.com/tkaisyiyahmimika?igsh=MW43bXd6Z3FpYTZwZA==" target="_blank" rel="noopener" title="Instagram">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                      <defs>
                        <linearGradient id="igGradient" x1="0%" y1="100%" x2="100%" y2="0%">
                          <stop offset="0%" stop-color="#FFDD55"/>
                          <stop offset="30%" stop-color="#FF543E"/>
                          <stop offset="60%" stop-color="#C837AB"/>
                          <stop offset="100%" stop-color="#5851DB"/>
                        </linearGradient>
                      </defs>
                      <path fill="url(#igGradient)" d="M12 2c2.717 0 3.056.01 4.123.06 1.066.05 1.793.217 2.428.465a4.9 4.9 0 0 1 1.772 1.153 4.9 4.9 0 0 1 1.153 1.772c.248.635.415 1.362.465 2.428.05 1.067.06 1.406.06 4.123s-.01 3.056-.06 4.123c-.05 1.066-.217 1.793-.465 2.428a4.9 4.9 0 0 1-1.153 1.772 4.9 4.9 0 0 1-1.772 1.153c-.635.248-1.362.415-2.428.465-1.067.05-1.406.06-4.123.06s-3.056-.01-4.123-.06c-1.066-.05-1.793-.217-2.428-.465a4.9 4.9 0 0 1-1.772-1.153 4.9 4.9 0 0 1-1.153-1.772c-.248-.635-.415-1.362-.465-2.428C2.01 15.056 2 14.717 2 12s.01-3.056.06-4.123c.05-1.066.217-1.793.465-2.428a4.9 4.9 0 0 1 1.153-1.772A4.9 4.9 0 0 1 5.45 2.524c.635-.248 1.362-.415 2.428-.465C8.944 2.01 9.283 2 12 2zm0 1.802c-2.67 0-2.986.01-4.04.059-.976.045-1.505.207-1.858.344-.467.182-.8.399-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.05 1.055-.06 1.372-.06 4.04s.01 2.986.06 4.04c.045.976.207 1.505.344 1.858.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.05 1.37.06 4.041.06s2.987-.01 4.041-.06c.976-.045 1.505-.207 1.858-.344.466-.182.8-.399 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.05-1.055.06-1.372.06-4.041s-.01-2.986-.06-4.04c-.045-.976-.207-1.505-.344-1.858a3.1 3.1 0 0 0-.748-1.15 3.1 3.1 0 0 0-1.15-.748c-.353-.137-.882-.3-1.858-.344-1.054-.05-1.37-.06-4.04-.06zm0 3.063a5.135 5.135 0 1 1 0 10.27 5.135 5.135 0 0 1 0-10.27zm0 1.802a3.333 3.333 0 1 0 0 6.666 3.333 3.333 0 0 0 0-6.666zm5.338-1.998a1.2 1.2 0 1 1-2.4 0 1.2 1.2 0 0 1 2.4 0z"/>
                    </svg>
                  </a>

                  <!-- Facebook: biru asli #1877F2 -->
                  <a class="footer-social-btn" href="https://www.facebook.com/share/1E4r3gWjBE/" target="_blank" rel="noopener" title="Facebook">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="#1877F2">
                      <path d="M22 12.06C22 6.507 17.523 2 12 2S2 6.507 2 12.06c0 5.02 3.657 9.184 8.438 9.94v-7.03H7.898v-2.91h2.54V9.845c0-2.507 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562v1.878h2.773l-.443 2.91h-2.33V22c4.78-.756 8.437-4.92 8.437-9.94z"/>
                    </svg>
                  </a>

                  <!-- TikTok: hitam asli #000000 -->
                  <a class="footer-social-btn" href="https://www.tiktok.com/@tk.aisyiyah.mimika?_r=1&_t=ZS-98LZSOqESDl" target="_blank" rel="noopener" title="TikTok">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="#000000">
                      <path d="M16.6 2h-3.2v13.6c0 1.5-1.2 2.7-2.7 2.7s-2.7-1.2-2.7-2.7 1.2-2.7 2.7-2.7c.3 0 .6.05.9.14V9.7c-.3-.04-.6-.06-.9-.06-3.2 0-5.8 2.6-5.8 5.8S7.4 21.2 10.6 21.2s5.8-2.6 5.8-5.8V8.3c1.24.9 2.77 1.43 4.4 1.43V6.5c-2.35 0-4.2-1.9-4.2-4.2V2z"/>
                    </svg>
                  </a>

                  <!-- WhatsApp: hijau asli #25D366 -->
                  <a class="footer-social-btn"
                     href="https://api.whatsapp.com/send/?phone={{ preg_replace('/\D/','',schoolInfo('telepon')) }}&text=Halo%2C+saya+ingin+mendaftar+di+sekolah+TK+Aisyiyah+Mimika.&type=phone_number&app_absent=0"
                     target="_blank" rel="noopener" title="WhatsApp">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="#25D366">
                      <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.46 1.32 4.96L2.05 22l5.25-1.38a9.9 9.9 0 0 0 4.74 1.21h.01c5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.83 9.83 0 0 0 12.04 2zm0 1.8c2.19 0 4.25.85 5.79 2.4a8.13 8.13 0 0 1 2.4 5.8c0 4.52-3.68 8.2-8.2 8.2a8.2 8.2 0 0 1-4.17-1.14l-.3-.18-3.12.82.83-3.04-.19-.31a8.16 8.16 0 0 1-1.25-4.35c0-4.52 3.68-8.2 8.21-8.2zm-4.5 4.35c-.16 0-.42.06-.64.31s-.85.83-.85 2.02.87 2.34.99 2.5c.12.16 1.7 2.71 4.19 3.7 2.07.83 2.49.66 2.94.62.45-.04 1.45-.59 1.65-1.16.2-.57.2-1.06.14-1.16-.06-.1-.22-.16-.46-.28-.24-.12-1.45-.72-1.68-.8-.22-.08-.39-.12-.55.12-.16.24-.63.8-.77.96-.14.16-.28.18-.52.06-.24-.12-1.01-.37-1.93-1.19-.71-.63-1.19-1.42-1.33-1.66-.14-.24-.02-.37.1-.49.11-.11.24-.28.36-.42.12-.14.16-.24.24-.4.08-.16.04-.3-.02-.42-.06-.12-.55-1.36-.77-1.85-.19-.46-.4-.42-.55-.43z"/>
                    </svg>
                  </a>
                </div>
            </div>
            <div class="footer-nav-col">
              <div class="footer-col-title">Navigasi</div>
              <ul class="footer-nav-list">
                <li><a href="/">Beranda</a></li>
                <li><a href="/profil">Profil Sekolah</a></li>
                <li><a href="/galeri">Galeri</a></li>
                <li><a href="/ppdb">PPDB 2027/2028</a></li>
              </ul>
            </div>
            <div class="footer-contact-col">
              <div class="footer-col-title">Hubungi Kami</div>
              <div class="footer-contact-list">
                <div class="footer-contact-item">
                  <div class="footer-contact-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="#F5A623">
                      <path d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6zm2 .3V6l8 5.5L20 6v.3l-8 5.7-8-5.7zM4 8.4V18h16V8.4l-8 5.6-8-5.6z"/>
                    </svg>
                  </div>
                  <div class="footer-contact-text">{{ schoolInfo('email') }}</div>
                </div>

                <div class="footer-contact-item">
                  <div class="footer-contact-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                      <defs>
                        <linearGradient id="igGradientContact" x1="0%" y1="100%" x2="100%" y2="0%">
                          <stop offset="0%" stop-color="#FFDD55"/>
                          <stop offset="30%" stop-color="#FF543E"/>
                          <stop offset="60%" stop-color="#C837AB"/>
                          <stop offset="100%" stop-color="#5851DB"/>
                        </linearGradient>
                      </defs>
                      <path fill="url(#igGradientContact)" d="M12 2c2.717 0 3.056.01 4.123.06 1.066.05 1.793.217 2.428.465a4.9 4.9 0 0 1 1.772 1.153 4.9 4.9 0 0 1 1.153 1.772c.248.635.415 1.362.465 2.428.05 1.067.06 1.406.06 4.123s-.01 3.056-.06 4.123c-.05 1.066-.217 1.793-.465 2.428a4.9 4.9 0 0 1-1.153 1.772 4.9 4.9 0 0 1-1.772 1.153c-.635.248-1.362.415-2.428.465-1.067.05-1.406.06-4.123.06s-3.056-.01-4.123-.06c-1.066-.05-1.793-.217-2.428-.465a4.9 4.9 0 0 1-1.772-1.153 4.9 4.9 0 0 1-1.153-1.772c-.248-.635-.415-1.362-.465-2.428C2.01 15.056 2 14.717 2 12s.01-3.056.06-4.123c.05-1.066.217-1.793.465-2.428a4.9 4.9 0 0 1 1.153-1.772A4.9 4.9 0 0 1 5.45 2.524c.635-.248 1.362-.415 2.428-.465C8.944 2.01 9.283 2 12 2zm0 1.802c-2.67 0-2.986.01-4.04.059-.976.045-1.505.207-1.858.344-.467.182-.8.399-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.05 1.055-.06 1.372-.06 4.04s.01 2.986.06 4.04c.045.976.207 1.505.344 1.858.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.05 1.37.06 4.041.06s2.987-.01 4.041-.06c.976-.045 1.505-.207 1.858-.344.466-.182.8-.399 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.05-1.055.06-1.372.06-4.041s-.01-2.986-.06-4.04c-.045-.976-.207-1.505-.344-1.858a3.1 3.1 0 0 0-.748-1.15 3.1 3.1 0 0 0-1.15-.748c-.353-.137-.882-.3-1.858-.344-1.054-.05-1.37-.06-4.04-.06zm0 3.063a5.135 5.135 0 1 1 0 10.27 5.135 5.135 0 0 1 0-10.27zm0 1.802a3.333 3.333 0 1 0 0 6.666 3.333 3.333 0 0 0 0-6.666zm5.338-1.998a1.2 1.2 0 1 1-2.4 0 1.2 1.2 0 0 1 2.4 0z"/>
                    </svg>
                  </div>
                  <div class="footer-contact-text">{{ schoolInfo('instagram') }}</div>
                </div>

                <div class="footer-contact-item">
                  <div class="footer-contact-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="#4CAF50">
                      <path d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.02-.24c1.12.37 2.33.57 3.57.57a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1C10.61 21 3 13.39 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.24.2 2.45.57 3.57a1 1 0 0 1-.25 1.02l-2.2 2.2z"/>
                    </svg>
                  </div>
                  <div class="footer-contact-text">{{ schoolInfo('telepon') }}</div>
                </div>

                <div class="footer-contact-item">
                  <div class="footer-contact-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="#EF5350">
                      <path d="M12 2c-4.42 0-8 3.58-8 8 0 5.5 7 12 8 12s8-6.5 8-12c0-4.42-3.58-8-8-8zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                    </svg>
                  </div>
                  <div class="footer-contact-text">{{ schoolInfo('alamat') }}</div>
                </div>
              </div>
            </div>
            <div class="footer-map-col">
              <div class="footer-col-title">Lokasi Kami</div>
              <a class="footer-map-box" href="{{ schoolInfo('maps_link') }}" target="_blank" rel="noopener">
                <img src="{{ asset('assets/images/Rectangle 49.png') }}" alt="Peta Lokasi" />
                <div class="footer-map-box-inner">
                  <div class="footer-contact-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="#EF5350">
                      <path d="M12 2c-4.42 0-8 3.58-8 8 0 5.5 7 12 8 12s8-6.5 8-12c0-4.42-3.58-8-8-8zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                    </svg>
                  </div>
                  <div class="footer-map-label">Lihat di<br>Google Maps</div>
                </div>
              </a>
              @php $ppdbOpen = \App\Models\PpdbSetting::first()?->is_active ?? false; @endphp
              <div class="footer-ppdb-badge {{ $ppdbOpen ? '' : 'closed' }}">
                <div class="footer-ppdb-dot {{ $ppdbOpen ? 'open' : 'closed' }}"></div>
                <div class="footer-ppdb-text">
                    <strong>PPDB 2027/2028</strong>
                    <span>{{ $ppdbOpen ? 'Pendaftaran sedang dibuka' : 'Pendaftaran ditutup' }}</span>
                </div>
              </div>
            </div>
        </div>
        <div class="footer-bottom">
            <span class="footer-bottom-copy">© {{ date('Y') }} TK Aisyiyah Mimika. All rights reserved.</span>
            <span class="footer-bottom-brand">TK Aisyiyah Mimika</span>
        </div>
    </footer>

    <div class="toast-notif" id="toastNotif"></div>

    <script>
        function toggleMobileMenu() { const m=document.getElementById('mobileMenu'),h=document.getElementById('hamburger'),o=m.classList.toggle('open'); h.classList.toggle('open',o); document.body.style.overflow=o?'hidden':''; }
        function closeMobileMenu() { document.getElementById('mobileMenu').classList.remove('open'); document.getElementById('hamburger').classList.remove('open'); document.body.style.overflow=''; }
        document.addEventListener('keydown', e=>{ if(e.key==='Escape') closeMobileMenu(); });
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', ()=>navbar.classList.toggle('white-bg', window.pageYOffset>100));
        const backgrounds = document.querySelectorAll('.hero-background'); let currentBg = 0;
        if(backgrounds.length > 1) { setInterval(()=>{ backgrounds[currentBg].classList.remove('active'); currentBg=(currentBg+1)%backgrounds.length; backgrounds[currentBg].classList.add('active'); }, 5000); }
        const backToTopBtn = document.getElementById('backToTop');
        window.addEventListener('scroll', ()=>backToTopBtn.classList.toggle('show', window.pageYOffset > window.innerHeight/2));
        function scrollToTop() { window.scrollTo({top:0, behavior:'smooth'}); }
        function learnMore() { document.getElementById('mengenal').scrollIntoView({behavior:'smooth'}); }
        let isChatbotOpen=false, hasSeenWelcome=false;
        const chatbotContainer=document.getElementById('chatbotContainer'), chatbotMessages=document.getElementById('chatbotMessages'), chatbotInput=document.getElementById('chatbotInput'), chatbotTyping=document.getElementById('chatbotTyping'), chatbotBadge=document.getElementById('chatbotBadge'), chatbotToggleIcon=document.getElementById('chatbotToggleIcon');
        function toggleChatbot() { isChatbotOpen=!isChatbotOpen; if(isChatbotOpen){chatbotContainer.classList.add('show');chatbotToggleIcon.textContent='✕';chatbotBadge.style.display='none';chatbotInput.focus();hasSeenWelcome=true;}else{chatbotContainer.classList.remove('show');chatbotToggleIcon.textContent='💬';} }
        setTimeout(()=>{ if(!hasSeenWelcome&&!isChatbotOpen) chatbotBadge.style.display='flex'; },5000);
        const botResponses={'halo':'Halo! 👋 Ada yang bisa saya bantu?\n\nKlik "📝 Beri Masukan" untuk berbagi pengalaman!','ppdb':`Untuk info PPDB:\n📞 {{ schoolInfo('telepon') }}\n📍 {{ schoolInfo('alamat') }}\n📋 Isi form PPDB online kami!`,'biaya':`💰 Biaya pendidikan sangat terjangkau.\nHubungi kami di {{ schoolInfo('telepon') }} untuk info lengkap!`,'lokasi':`📍 {{ schoolInfo('alamat') }}\nCek Google Maps di footer halaman ini!`,'terima kasih':'Sama-sama! 😊'};
        function addChatMessage(msg,isUser){const d=document.createElement('div');d.className=`chatbot-message ${isUser?'user':'bot'}`;const b=document.createElement('div');b.className='chatbot-message-bubble';b.innerHTML=msg.replace(/\n/g,'<br>');d.appendChild(b);chatbotMessages.insertBefore(d,chatbotTyping);chatbotMessages.scrollTop=chatbotMessages.scrollHeight;}
        function getBotResponse(msg){const l=msg.toLowerCase();for(let k in botResponses){if(l.includes(k))return botResponses[k];}return 'Terima kasih! 😊 Untuk info lebih lanjut silakan hubungi sekolah kami.';}
        function sendChatMessage(){const m=chatbotInput.value.trim();if(!m)return;addChatMessage(m,true);chatbotInput.value='';chatbotTyping.style.display='block';chatbotMessages.scrollTop=9999;setTimeout(()=>{chatbotTyping.style.display='none';addChatMessage(getBotResponse(m),false);},600+Math.random()*600);}
        function sendQuickReply(t){chatbotInput.value=t;sendChatMessage();}
        chatbotInput.addEventListener('keypress',e=>{if(e.key==='Enter')sendChatMessage();});
        let selectedBintang=5;
        function bukaFormMasukan(){document.getElementById('chatbotFormMasukan').classList.add('show');chatbotInput.disabled=true;document.querySelector('.chatbot-send').disabled=true;updateBintangUI(5);selectedBintang=5;document.getElementById('masukanNama').focus();}
        function tutupFormMasukan(){document.getElementById('chatbotFormMasukan').classList.remove('show');chatbotInput.disabled=false;document.querySelector('.chatbot-send').disabled=false;document.getElementById('masukanNama').value='';document.getElementById('masukanTeks').value='';selectedBintang=5;updateBintangUI(5);}
        document.querySelectorAll('#masukanStars span').forEach(el=>{el.addEventListener('click',()=>{selectedBintang=parseInt(el.dataset.v);updateBintangUI(selectedBintang);});el.addEventListener('mouseover',()=>{updateBintangUI(parseInt(el.dataset.v));});el.addEventListener('mouseleave',()=>{updateBintangUI(selectedBintang);});});
        function updateBintangUI(val){document.querySelectorAll('#masukanStars span').forEach(el=>{el.classList.toggle('lit',parseInt(el.dataset.v)<=val);});}
        updateBintangUI(5);
        function kirimMasukan(){const nama=document.getElementById('masukanNama').value.trim();const pesan=document.getElementById('masukanTeks').value.trim();const rating=selectedBintang;if(!nama){alert("Nama harus diisi");return;}if(pesan.length<10){alert("Masukan minimal 10 karakter");return;}fetch("/suggestion",{method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute('content')},body:JSON.stringify({nama,pesan,rating})}).then(res=>res.json()).then(data=>{if(data.success){tutupFormMasukan();showToast("Masukan berhasil dikirim!");}}).catch(err=>{console.error(err);alert("Terjadi kesalahan");});}
        function showToast(msg){const t=document.getElementById('toastNotif');if(!t)return;t.textContent=msg;t.classList.add('show');setTimeout(()=>t.classList.remove('show'),3800);}
    </script>
</body>
</html>