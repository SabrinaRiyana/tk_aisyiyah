{{-- PPDB 2027/2028 - TK Aisyiyah Mimika --}}
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>PPDB 2027/2028 – TK Aisyiyah Mimika</title>
<style>
  *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
  html, body { font-family: "Segoe UI", Helvetica, Arial, sans-serif; background: #f0faf0; color: #222; overflow-x: hidden; scroll-behavior: smooth; }
  .navbar { position: fixed; top: clamp(10px,3vw,50px); left: 50%; transform: translateX(-50%); width: 92%; max-width: 1620px; display: flex; align-items: center; justify-content: space-between; padding: clamp(6px,1.2vw,10px) clamp(10px,1.5vw,15px) clamp(6px,1.2vw,10px) clamp(12px,1.8vw,20px); background-color: rgba(0,30,10,0.18); border-radius: 100px; backdrop-filter: blur(30px) brightness(100%) saturate(105%); -webkit-backdrop-filter: blur(30px) brightness(100%) saturate(105%); box-shadow: inset 0 1px 0 rgba(255,255,255,0.4), inset 1px 0 0 rgba(255,255,255,0.32), inset 0 -1px 20px rgba(0,0,0,0.2), inset -1px 0 20px rgba(0,0,0,0.16); z-index: 1000; transition: all 0.3s ease; }
  .navbar.white-bg { background-color: rgba(255,255,255,0.05); box-shadow: inset 0 1px 0 rgba(0,204,48,0.4), inset 1px 0 0 rgba(0,204,48,0.32), inset 0 -1px 20px rgba(0,204,48,0.2), inset -1px 0 20px rgba(0,204,48,0.16); }
  .navbar.white-bg .nav-brand, .navbar.white-bg .nav-item { color: #00CC30; }
  .navbar.white-bg .nav-item:hover { color: #009a24; }
  .navbar.white-bg .btn-admin { border-color: #00CC30; color: #00CC30; background: rgba(255,255,255,0.1); }
  .navbar.white-bg .nav-hamburger span { background: #00CC30; }
  .nav-logo { display: flex; align-items: center; gap: clamp(8px,1.5vw,15px); flex-shrink: 0; }
  .logo-wrapper { width: clamp(38px,5.5vw,60px); height: clamp(38px,5.5vw,60px); background: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
  .logo-img { width: 80%; height: 80%; object-fit: contain; }
  .nav-brand { font-size: clamp(.85rem,1.5vw,1.25rem); font-weight: 600; color: #fff; white-space: nowrap; transition: color .3s; text-decoration: none; cursor: pointer; }
  .nav-right { display: flex; align-items: center; gap: clamp(4px,1vw,10px); flex-shrink: 0; }
  .nav-item { padding: clamp(6px,1vw,10px) clamp(8px,1.2vw,15px); font-size: clamp(.8rem,1.2vw,1.05rem); color: #fff; white-space: nowrap; cursor: pointer; transition: all .3s; flex-shrink: 0; text-decoration: none; display: inline-block; }
  .nav-item:hover { color: #00cc30; }
  .btn-admin { padding: clamp(6px,1vw,10px) clamp(10px,1.5vw,20px); border: 1px solid #fff; border-radius: 100px; background: rgba(0,0,0,0.01); color: #fff; font-size: clamp(.78rem,1.1vw,1.05rem); cursor: pointer; transition: all .3s; white-space: nowrap; backdrop-filter: blur(18.5px); }
  .btn-admin:hover { background: rgba(255,255,255,0.1); }
  .btn-ppdb { padding: clamp(6px,1vw,10px) clamp(12px,1.8vw,25px); border: none; border-radius: 100px; background: linear-gradient(102deg,#00af29,#00cc30); color: #fff; font-size: clamp(.78rem,1.1vw,1.05rem); cursor: pointer; transition: all .3s; font-weight: 700; }
  .btn-ppdb:hover { transform: translateY(-2px); box-shadow: 0 4px 15px rgba(0,204,48,.4); }
  .btn-ppdb.active-page { background: #fff; color: #00a832; pointer-events: none; }
  .nav-hamburger { display: none; flex-direction: column; gap: 5px; cursor: pointer; padding: 8px; z-index: 1002; }
  .nav-hamburger span { display: block; width: 24px; height: 2.5px; background: #fff; border-radius: 2px; transition: all .3s; }
  .nav-hamburger.open span:nth-child(1) { transform: translateY(7.5px) rotate(45deg); }
  .nav-hamburger.open span:nth-child(2) { opacity: 0; }
  .nav-hamburger.open span:nth-child(3) { transform: translateY(-7.5px) rotate(-45deg); }
  .nav-mobile-menu { display: none; position: fixed; inset: 0; background: rgba(0,140,40,0.97); z-index: 999; flex-direction: column; align-items: center; justify-content: center; gap: 20px; padding: 40px 24px; }
  .nav-mobile-menu.open { display: flex; }
  .nav-mobile-close { position: absolute; top: 22px; right: 22px; font-size: 2rem; color: #fff; cursor: pointer; background: none; border: none; }
  .nav-mobile-item { color: #fff; font-size: clamp(1.2rem,5vw,1.6rem); font-weight: 600; cursor: pointer; padding: 10px 24px; border-radius: 12px; transition: background .2s; text-align: center; text-decoration: none; display: block; }
  .nav-mobile-item:hover { background: rgba(255,255,255,.15); }
  .nav-mobile-btns { display: flex; gap: 12px; flex-wrap: wrap; justify-content: center; margin-top: 8px; }
  .hero { position: relative; width: 100%; min-height: 100svh; height: 100svh; overflow: hidden; display: flex; align-items: center; justify-content: center; }
  .hero-bg-img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; z-index: 1; }
  .hero-overlay-dark { position: absolute; inset: 0; background: rgba(0,0,0,.52); z-index: 2; }
  .hero-inner { position: relative; z-index: 3; text-align: center; max-width: min(720px,92vw); padding: 0 clamp(16px,4vw,20px); }
  .hero-title { font-size: clamp(2.2rem,8vw,5rem); font-weight: 900; color: #fff; line-height: 1.1; margin-bottom: 20px; letter-spacing: 1px; }
  .hero-sub { font-size: clamp(.88rem,1.8vw,1.05rem); color: rgba(255,255,255,.88); line-height: 1.8; }
  .section-langkah { background: #fff; padding: clamp(36px,5vw,64px) clamp(20px,5vw,40px); text-align: center; }
  .langkah-title { font-size: clamp(1.5rem,4vw,2.4rem); font-weight: 900; color: #1fb149; margin-bottom: 12px; }
  .langkah-sub { font-size: clamp(.82rem,1.3vw,.92rem); color: #1fb149; line-height: 1.7; margin-bottom: clamp(24px,4vw,40px); }
  .langkah-cards { display: flex; justify-content: center; gap: clamp(12px,2vw,20px); flex-wrap: wrap; margin-bottom: clamp(28px,4vw,44px); }
  .langkah-card { position: relative; width: clamp(160px,28vw,210px); aspect-ratio: 4/3; border-radius: 14px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,.15); }
  .langkah-card img { width: 100%; height: 100%; object-fit: cover; display: block; }
  .langkah-card-overlay { position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(to top,rgba(10,100,40,.88),transparent); padding: 20px 12px 12px; }
  .langkah-card-overlay span { color: #fff; font-size: clamp(.78rem,1.2vw,.88rem); font-weight: 700; }
  .btn-daftar-sekarang { display: inline-block; padding: 14px 44px; background: #1fb149; color: #fff; font-size: clamp(.9rem,1.5vw,1.05rem); font-weight: 800; border-radius: 6px; text-decoration: none; transition: all .25s; }
  .btn-daftar-sekarang:hover { background: #178c3a; transform: translateY(-2px); }
  .page-wrapper { max-width: 860px; margin: 0 auto; padding: clamp(24px,4vw,48px) clamp(16px,4vw,24px); }
  .ppdb-closed { background: #fff; border-radius: 20px; padding: clamp(40px,6vw,72px) clamp(24px,5vw,60px); text-align: center; box-shadow: 0 4px 32px rgba(0,100,30,.1); border: 1px solid #d8f0d8; }
  .ppdb-closed-title { font-size: clamp(1.3rem,3vw,2rem); font-weight: 800; color: #1fb149; margin-bottom: 12px; }
  .ppdb-closed-msg { font-size: clamp(.88rem,1.5vw,1rem); color: #888; line-height: 1.8; max-width: 440px; margin: 0 auto 28px; }
  .ppdb-closed-contact { display: inline-flex; align-items: center; gap: 8px; background: #f0fdf0; border: 1px solid #b8e6c0; border-radius: 12px; padding: 12px 20px; font-size: .88rem; color: #1fb149; font-weight: 600; }
  .form-card { background: #fff; border-radius: 20px; box-shadow: 0 4px 32px rgba(0,100,30,.1); border: 1px solid #d8f0d8; overflow: hidden; }
  .form-card-header { background: linear-gradient(102deg,#1fb149,#178c3a); padding: clamp(20px,3vw,32px) clamp(20px,4vw,36px); }
  .form-card-title { font-size: clamp(1.1rem,2.5vw,1.5rem); font-weight: 800; color: #fff; margin-bottom: 6px; }
  .form-card-sub { font-size: clamp(.8rem,1.3vw,.9rem); color: rgba(255,255,255,.8); }
  .form-card-body { padding: clamp(20px,3vw,36px) clamp(20px,4vw,36px); }
  .form-field { margin-bottom: clamp(16px,2.5vw,22px); }
  .field-label { display: flex; align-items: center; gap: 6px; font-size: .85rem; font-weight: 700; color: #333; margin-bottom: 7px; }
  .field-input { width: 100%; padding: 11px 16px; border: 1.5px solid #d0e8d0; border-radius: 12px; font-size: .92rem; font-family: inherit; outline: none; transition: border-color .2s; background: #fafff9; }
  .field-input:focus { border-color: #1fb149; box-shadow: 0 0 0 3px rgba(31,177,73,.1); }
  .field-upload { border: 2px dashed #b8ddb8; border-radius: 12px; padding: 20px; text-align: center; cursor: pointer; background: #f7fdf7; }
  .field-upload:hover { border-color: #1fb149; background: #f0fdf0; }
  .field-upload input { display: none; }
  .field-upload-icon { font-size: 1.8rem; margin-bottom: 6px; display: block; }
  .field-upload-text { font-size: .82rem; color: #888; }
  .field-upload-text span { color: #1fb149; font-weight: 600; }
  .field-upload-preview { font-size: .8rem; color: #1fb149; margin-top: 6px; font-weight: 600; }
  .form-divider { height: 1px; background: #f0f8f0; margin: clamp(16px,2.5vw,24px) 0; }
  .form-submit-wrap { display: flex; flex-direction: column; align-items: center; gap: 14px; margin-top: clamp(20px,3vw,32px); }
  .btn-submit-form { width: 100%; max-width: 360px; padding: 15px 32px; border: none; border-radius: 100px; background: linear-gradient(102deg,#00af29,#1fb149); color: #fff; font-size: 1rem; font-weight: 800; cursor: pointer; transition: all .3s; box-shadow: 0 6px 24px rgba(31,177,73,.35); }
  .btn-submit-form:hover { transform: translateY(-2px); }
  .progress-wrap { margin-bottom: 28px; }
  .progress-label { display: flex; justify-content: space-between; font-size: .78rem; color: #888; margin-bottom: 6px; }
  .progress-bar-bg { height: 6px; background: #e8f5e8; border-radius: 10px; overflow: hidden; }
  .progress-bar-fill { height: 100%; background: linear-gradient(90deg,#1fb149,#00cc30); border-radius: 10px; transition: width .4s; }
  @keyframes popIn { from{transform:scale(0);}to{transform:scale(1);} }
  @keyframes fadeSlideUp { from{opacity:0;transform:translateY(30px);}to{opacity:1;transform:translateY(0);} }
  @keyframes confettiFall { 0%{opacity:0;transform:translateY(-20px);}100%{opacity:1;transform:translateY(0);} }
  .success-wrapper { display: none; padding: 20px 16px; }
  .success-box { background: linear-gradient(135deg,#e8f9ed,#f0fff4); border: 1.5px solid #a8e6be; border-radius: 24px; padding: clamp(32px,5vw,56px) clamp(20px,4vw,40px); text-align: center; max-width: 620px; margin: 0 auto; animation: fadeSlideUp .5s ease both; }
  .success-confetti { display: flex; justify-content: center; gap: 6px; margin-bottom: 24px; flex-wrap: wrap; }
  .success-confetti span { width: 10px; height: 10px; border-radius: 2px; display: inline-block; animation: confettiFall .6s ease both; }
  .success-check { width: 84px; height: 84px; background: linear-gradient(135deg,#1fb149,#00cc30); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 22px; box-shadow: 0 8px 30px rgba(31,177,73,.38); animation: popIn .5s cubic-bezier(.36,1.56,.64,1) .1s both; }
  .success-check svg { width: 42px; height: 42px; }
  .success-title { font-size: clamp(1.4rem,4vw,1.85rem); font-weight: 800; color: #1a8c3a; margin: 0 0 10px; }
  .success-subtitle { font-size: clamp(.88rem,1.5vw,.97rem); color: #4a7a56; line-height: 1.75; margin: 0 0 24px; }
  .success-steps { display: flex; justify-content: center; gap: 8px; margin-bottom: 28px; flex-wrap: wrap; }
  .step-pill { background: #fff; border: 1px solid #c8ecd4; border-radius: 100px; padding: 6px 14px; font-size: .82rem; color: #1a8c3a; font-weight: 600; display: flex; align-items: center; gap: 7px; }
  .step-num { width: 22px; height: 22px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: .72rem; font-weight: 800; flex-shrink: 0; }
  .step-num.done { background: #1fb149; color: #fff; } .step-num.todo { background: #b8ddc8; color: #1a8c3a; }
  .success-info-cards { display: flex; flex-direction: column; gap: 12px; margin-bottom: 30px; text-align: left; }
  .success-info-card { background: #fff; border: 1px solid #d0eeda; border-radius: 16px; padding: 15px 18px; display: flex; align-items: flex-start; gap: 14px; }
  .sic-icon { width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.25rem; flex-shrink: 0; }
  .sic-icon.green { background: #e8f9ed; } .sic-icon.blue { background: #e8f0ff; } .sic-icon.amber { background: #fff4e8; }
  .sic-label { font-size: .73rem; font-weight: 700; color: #aaa; text-transform: uppercase; letter-spacing: .05em; margin-bottom: 4px; }
  .sic-value { font-size: .93rem; font-weight: 700; color: #1a1a1a; word-break: break-all; }
  .success-btn-row { display: flex; gap: 10px; justify-content: center; flex-wrap: wrap; }
  .btn-success-primary { padding: 13px 32px; background: linear-gradient(102deg,#00af29,#1fb149); color: #fff; border: none; border-radius: 100px; font-size: .95rem; font-weight: 800; cursor: pointer; transition: transform .2s; }
  .btn-success-primary:hover { transform: translateY(-2px); }
  .btn-success-secondary { padding: 13px 26px; border: 2px solid #1fb149; border-radius: 100px; background: transparent; color: #1fb149; font-size: .92rem; font-weight: 700; cursor: pointer; transition: all .2s; }
  .btn-success-secondary:hover { background: #1fb149; color: #fff; }

  /* ══ FOOTER BARU ══ */
  .footer { background: linear-gradient(160deg, #006b22 0%, #009830 55%, #00b836 100%); color: #fff; font-family: "Segoe UI", Helvetica, Arial, sans-serif; padding: clamp(40px,5vw,60px) clamp(20px,5vw,60px) 0; margin-top: clamp(40px,6vw,72px); }
  .footer-top { max-width: 1300px; margin: 0 auto; display: grid; grid-template-columns: 1.5fr 1fr 1fr 1.2fr; gap: clamp(28px,4vw,48px); padding-bottom: clamp(32px,4vw,48px); border-bottom: 1px solid rgba(255,255,255,0.15); }
  .footer-brand { display: flex; flex-direction: column; gap: 14px; }
  .footer-logo-row { display: flex; align-items: center; gap: 12px; }
  .footer-logo-circle { width: clamp(44px,6vw,56px); height: clamp(44px,6vw,56px); background: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 4px 16px rgba(0,0,0,0.18); overflow: hidden; }
  .footer-logo-circle img { width: 80%; height: 80%; object-fit: contain; }
  .footer-school-name { font-size: clamp(0.9rem,1.4vw,1.05rem); font-weight: 700; line-height: 1.35; color: #fff; }
  .footer-tagline { font-size: clamp(0.78rem,1.1vw,0.86rem); line-height: 1.75; color: rgba(255,255,255,0.68); max-width: 230px; }
  .footer-socials { display: flex; gap: 8px; margin-top: 2px; }
  .footer-social-btn { width: 34px; height: 34px; border-radius: 8px; background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.2); display: flex; align-items: center; justify-content: center; font-size: 15px; cursor: pointer; text-decoration: none; transition: background .2s, transform .2s; }
  .footer-social-btn:hover { background: rgba(255,255,255,0.24); transform: translateY(-2px); }
  .footer-col-title { font-size: 0.7rem; font-weight: 700; letter-spacing: 1.3px; text-transform: uppercase; color: rgba(255,255,255,0.5); margin-bottom: 16px; }
  .footer-nav-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 10px; }
  .footer-nav-list li a { color: rgba(255,255,255,0.82); font-size: clamp(0.82rem,1.1vw,0.92rem); text-decoration: none; display: flex; align-items: center; gap: 7px; transition: color .2s, gap .2s; }
  .footer-nav-list li a::before { content: '›'; font-size: 1rem; font-weight: 700; opacity: 0.5; flex-shrink: 0; }
  .footer-nav-list li a:hover { color: #b6ffd0; gap: 11px; }
  .footer-contact-list { display: flex; flex-direction: column; gap: 12px; }
  .footer-contact-item { display: flex; align-items: flex-start; gap: 10px; }
  .footer-contact-icon { width: 28px; height: 28px; background: rgba(255,255,255,0.12); border-radius: 7px; display: flex; align-items: center; justify-content: center; font-size: 13px; flex-shrink: 0; margin-top: 1px; }
  .footer-contact-text { font-size: clamp(0.78rem,1.1vw,0.88rem); color: rgba(255,255,255,0.82); line-height: 1.55; word-break: break-word; }
  .footer-map-col { display: flex; flex-direction: column; gap: 12px; }
  .footer-map-box { border-radius: 14px; overflow: hidden; background: rgba(0,0,0,0.15); border: 1px solid rgba(255,255,255,0.2); height: clamp(120px,14vw,150px); display: flex; align-items: center; justify-content: center; cursor: pointer; transition: background .2s, transform .3s; flex-direction: column; gap: 6px; text-decoration: none; position: relative; }
  .footer-map-box:hover { background: rgba(0,0,0,0.25); transform: translateY(-3px); }
  .footer-map-box img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.45; }
  .footer-map-box-inner { position: relative; z-index: 1; display: flex; flex-direction: column; align-items: center; gap: 5px; }
  .footer-map-pin { font-size: 24px; }
  .footer-map-label { font-size: 12px; font-weight: 700; color: #fff; text-align: center; line-height: 1.4; text-shadow: 0 1px 4px rgba(0,0,0,0.4); }
  .footer-ppdb-badge { display: flex; align-items: center; gap: 10px; background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.22); border-radius: 12px; padding: 10px 14px; }
  .footer-ppdb-dot { width: 8px; height: 8px; border-radius: 50%; flex-shrink: 0; animation: ftPpdbPulse 2s ease-in-out infinite; }
  .footer-ppdb-dot.open { background: #7dffa3; }
  .footer-ppdb-dot.closed { background: #ff6b6b; }
  .footer-ppdb-badge.closed { background: rgba(255,80,80,0.15); border-color: rgba(255,100,100,0.3); }
  @keyframes ftPpdbPulse { 0%,100%{opacity:1;transform:scale(1);}50%{opacity:.4;transform:scale(.85);} }
  .footer-ppdb-text strong { display: block; font-size: 0.82rem; font-weight: 700; color: #fff; }
  .footer-ppdb-text span { font-size: 0.74rem; color: rgba(255,255,255,0.65); }
  .footer-bottom { max-width: 1300px; margin: 0 auto; padding: clamp(14px,2vw,20px) 0 clamp(20px,3vw,28px); display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 8px; }
  .footer-bottom-copy { font-size: 0.75rem; color: rgba(255,255,255,0.48); }
  .footer-bottom-brand { display: flex; align-items: center; gap: 6px; font-size: 0.75rem; font-weight: 700; color: rgba(255,255,255,0.72); }
  .footer-bottom-brand::before { content:''; display:inline-block; width:6px; height:6px; background:#7dffa3; border-radius:50%; }
  @media (max-width: 1000px) { .footer-top { grid-template-columns: 1fr 1fr; } }
  @media (max-width: 600px) { .footer-top { grid-template-columns: 1fr; } .footer-tagline { max-width: 100%; } .footer-bottom { flex-direction: column; align-items: flex-start; } }

  .chatbot-toggle { position: fixed; bottom: clamp(80px,12vw,110px); right: clamp(16px,3vw,30px); width: clamp(50px,7vw,60px); height: clamp(50px,7vw,60px); background: linear-gradient(135deg,#00af29,#00cc30); border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; box-shadow: 0 4px 20px rgba(0,204,48,.4); z-index: 9997; transition: all .3s; border: 3px solid white; }
  .chatbot-toggle:hover { transform: scale(1.1); }
  .chatbot-toggle-icon { font-size: clamp(1.4rem,2.5vw,1.8rem); color: white; }
  .chatbot-badge { position: absolute; top: -5px; right: -5px; width: 22px; height: 22px; background: #f00; border-radius: 50%; display: none; align-items: center; justify-content: center; font-size: .7rem; color: white; font-weight: bold; border: 2px solid white; }
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
  .chatbot-message { margin-bottom: 12px; display: flex; }
  .chatbot-message.bot { justify-content: flex-start; }
  .chatbot-message.user { justify-content: flex-end; }
  .chatbot-message-bubble { max-width: 82%; padding: 10px 14px; border-radius: 16px; word-wrap: break-word; line-height: 1.5; font-size: .88rem; }
  .chatbot-message.bot .chatbot-message-bubble { background: white; color: #333; border-bottom-left-radius: 4px; box-shadow: 0 2px 8px rgba(0,0,0,.08); }
  .chatbot-message.user .chatbot-message-bubble { background: linear-gradient(135deg,#00af29,#00cc30); color: white; border-bottom-right-radius: 4px; }
  .chatbot-typing { display: none; padding: 10px 14px; background: white; border-radius: 16px; border-bottom-left-radius: 4px; box-shadow: 0 2px 8px rgba(0,0,0,.08); width: fit-content; }
  .chatbot-quick-replies { display: flex; flex-wrap: wrap; gap: 6px; padding: 8px 14px 10px; background: #f8f9fa; flex-shrink: 0; border-top: 1px solid #eee; }
  .quick-reply-btn { padding: 7px 12px; background: white; border: 1.5px solid #00cc30; border-radius: 15px; color: #00cc30; font-size: .82rem; cursor: pointer; transition: all .3s; white-space: nowrap; font-weight: 600; }
  .quick-reply-btn:hover { background: #00cc30; color: white; }
  .chatbot-input-container { display: flex; padding: 10px 14px; border-top: 1px solid #eee; gap: 8px; flex-shrink: 0; background: #fff; }
  .chatbot-input { flex: 1; padding: 10px 14px; border: 1.5px solid #e0e0e0; border-radius: 20px; font-size: .88rem; font-family: inherit; outline: none; }
  .chatbot-input:focus { border-color: #00cc30; }
  .chatbot-send { padding: 10px 18px; background: linear-gradient(135deg,#00af29,#00cc30); color: white; border: none; border-radius: 20px; font-size: .85rem; font-weight: 700; cursor: pointer; }
  .btn-back-to-top { position: fixed; bottom: clamp(20px,4vw,30px); right: clamp(16px,3vw,30px); padding: 10px 18px; background: rgba(31,177,73,.9); color: #fff; border: none; border-radius: 100px; font-size: .82rem; font-weight: 700; cursor: pointer; opacity: 0; pointer-events: none; transition: opacity .3s; z-index: 9990; }
  .btn-back-to-top.show { opacity: 1; pointer-events: auto; }
  .toast-notif { position: fixed; bottom: 80px; left: 50%; transform: translateX(-50%); background: #1fb149; color: #fff; padding: 12px 24px; border-radius: 100px; font-size: .88rem; font-weight: 600; opacity: 0; pointer-events: none; transition: opacity .3s; z-index: 9999; }
  .toast-notif.show { opacity: 1; }

  @media (max-width: 768px) { .nav-right { display: none; } .nav-hamburger { display: flex; } }
</style>
</head>
<body>

<div class="nav-mobile-menu" id="mobileMenu">
  <button class="nav-mobile-close" onclick="closeMobileMenu()">✕</button>
  <a class="nav-mobile-item" href="/" onclick="closeMobileMenu()">Beranda</a>
  <a class="nav-mobile-item" href="/profil" onclick="closeMobileMenu()">Profil Sekolah</a>
  <a class="nav-mobile-item" href="/galeri" onclick="closeMobileMenu()">Galeri</a>
  <div class="nav-mobile-btns">
    <button class="btn-admin" onclick="window.location.href='/login';closeMobileMenu()">Admin Login</button>
    <button class="btn-ppdb active-page">PPDB 2027/2028</button>
  </div>
</div>

<section class="hero">
  @php $ppdbBanner = \App\Models\Banner::where('page', 'ppdb')->first(); @endphp
  <img src="{{ $ppdbBanner ? asset('storage/' . $ppdbBanner->image) : asset('assets/images/Shering.png') }}" alt="Hero PPDB" class="hero-bg-img" />
  <div class="hero-overlay-dark"></div>
  <nav class="navbar" id="navbar">
    <div class="nav-logo" onclick="window.location.href='/'" style="cursor:pointer">
      <div class="logo-wrapper"><img class="logo-img" src="{{ asset('assets/images/Logo TK.png') }}" alt="Logo TK Aisyiyah" /></div>
      <span class="nav-brand">TK Aisyiyah Mimika</span>
    </div>
    <div class="nav-right">
      <a class="nav-item" href="/">Beranda</a>
      <a class="nav-item" href="/profil">Profil Sekolah</a>
      <a class="nav-item" href="/galeri">Galeri</a>
      <button class="btn-admin" onclick="window.location.href='/admin/login'">Admin Login</button>
      <button class="btn-ppdb active-page">PPDB 2027/2028</button>
    </div>
    <div class="nav-hamburger" id="hamburger" onclick="toggleMobileMenu()"><span></span><span></span><span></span></div>
  </nav>
  <div class="hero-inner">
    <h1 class="hero-title">PPDB 2027/2028</h1>
    <p class="hero-sub">Jadilah bagian dari cerita hebat kami. Kami mencari para petualang cilik yang siap mengeksplorasi dunia, mengasah kemandirian, dan mewujudkan imajinasi menjadi nyata</p>
  </div>
</section>

<section class="section-langkah">
  <h2 class="langkah-title">Langkah Mudah Mendaftar</h2>
  <p class="langkah-sub">Cukup siapkan versi digital (softfile) dari dokumen di bawah ini untuk<br>memulai petualangan si kecil bersama kami :</p>
  <div class="langkah-cards">
    <div class="langkah-card"><img src="{{ asset('assets/images/kk.png') }}" alt="Kartu Keluarga" /><div class="langkah-card-overlay"><span>Kartu Keluarga</span></div></div>
    <div class="langkah-card"><img src="{{ asset('assets/images/Akta.png') }}" alt="Akta Kelahiran" /><div class="langkah-card-overlay"><span>Akta Kelahiran Anak</span></div></div>
    <div class="langkah-card"><img src="{{ asset('assets/images/ktp.png') }}" alt="KTP Orang Tua" /><div class="langkah-card-overlay"><span>KTP Orang Tua / Wali</span></div></div>
  </div>
  <a href="#ppdbForm" class="btn-daftar-sekarang">DAFTAR SEKARANG &gt;</a>
</section>

<div class="page-wrapper" id="ppdbForm">
  @if(!$setting || !$setting->is_active)
    <div class="ppdb-closed">
      <div class="ppdb-closed-title">🔒 PPDB Sedang Ditutup</div>
      <p class="ppdb-closed-msg">{{ $setting->closed_message ?? 'Pendaftaran belum dibuka.' }}</p>
      <div class="ppdb-closed-contact">📞 Hubungi sekolah untuk info lebih lanjut.</div>
    </div>
  @else
    <div id="ppdbFormInner">
      <form action="{{ route('ppdb.store') }}" method="POST" enctype="multipart/form-data" id="mainPpdbForm">
        @csrf
        <div class="form-card">
          <div class="form-card-header">
            <div class="form-card-title">📝 Formulir Pendaftaran PPDB</div>
            <div class="form-card-sub">Isi data berikut dengan benar. Tanda <span style="color:#a0ffb8;">*</span> wajib diisi.</div>
          </div>
          <div class="form-card-body">
            <div class="progress-wrap">
              <div class="progress-label"><span>Kelengkapan Form</span><span id="progressPct">0%</span></div>
              <div class="progress-bar-bg"><div class="progress-bar-fill" id="progressFill" style="width:0%"></div></div>
            </div>
            @foreach(($setting->form_fields ?? []) as $index => $field)
              <div class="form-field">
                <label class="field-label">{{ $field['label'] }} {!! $field['required'] ? '<span style="color:red">*</span>' : '' !!}</label>
                @if($field['type'] == 'file')
                  <div class="field-upload" onclick="this.querySelector('input').click()">
                    <span class="field-upload-icon">📁</span>
                    <div class="field-upload-text">Klik untuk <span>upload {{ $field['label'] }}</span></div>
                    <div class="field-upload-preview" id="preview_{{ $index }}"></div>
                    <input type="file" name="files[{{ $field['label'] }}]" class="ppdb-input" {{ $field['required'] ? 'required' : '' }} onchange="updatePreview(this, 'preview_{{ $index }}')" style="display:none">
                  </div>
                @else
                  <input type="{{ $field['type'] }}" name="payload[{{ $field['label'] }}]" class="field-input ppdb-input" placeholder="Masukkan {{ $field['label'] }}" {{ $field['required'] ? 'required' : '' }} oninput="calculateProgress()">
                @endif
              </div>
            @endforeach
            <div class="form-divider"></div>
            <div class="form-submit-wrap">
              <button type="submit" class="btn-submit-form">Kirim Pendaftaran 🚀</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  @endif
</div>

<div class="success-wrapper" id="ppdbSuccess">
  <div class="success-box">
    <div class="success-confetti">
      <span style="background:#1fb149;"></span><span style="background:#ffd700;"></span><span style="background:#00cc30;"></span><span style="background:#ff6b6b;"></span><span style="background:#4ecdc4;"></span><span style="background:#a78bfa;"></span><span style="background:#ffd700;"></span><span style="background:#1fb149;"></span>
    </div>
    <div class="success-check"><svg viewBox="0 0 42 42" fill="none"><path d="M10 21.5L18 30L32 13" stroke="white" stroke-width="3.8" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
    <h2 class="success-title">Pendaftaran Berhasil! 🎉</h2>
    <p class="success-subtitle">Selamat! Si kecil sudah terdaftar di TK Aisyiyah Mimika.<br>Silakan ikuti langkah berikutnya.</p>
    <div class="success-steps">
      <div class="step-pill"><span class="step-num done">1</span> Daftar ✓</div>
      <div class="step-pill"><span class="step-num todo">2</span> Bayar Formulir</div>
      <div class="step-pill"><span class="step-num todo">3</span> Konfirmasi Admin</div>
    </div>
    <div class="success-info-cards">
      <div class="success-info-card"><div class="sic-icon green">💳</div><div><div class="sic-label">Rekening Pembayaran</div><div class="sic-value">{{ schoolInfo('rekening') }}</div></div></div>
      <div class="success-info-card"><div class="sic-icon blue">📧</div><div><div class="sic-label">Kirim Bukti ke Email</div><div class="sic-value">{{ schoolInfo('email') }}</div></div></div>
      <div class="success-info-card"><div class="sic-icon amber">📞</div><div><div class="sic-label">Hubungi Admin</div><div class="sic-value">{{ schoolInfo('phone') }}</div></div></div>
    </div>
    <div class="success-btn-row">
      <button class="btn-success-primary" onclick="location.reload()">Daftar Lagi</button>
      <button class="btn-success-secondary" onclick="window.location.href='/'">Kembali ke Beranda</button>
    </div>
  </div>
</div>

{{-- ══ FOOTER BARU ══ --}}
<footer class="footer">
  <div class="footer-top">
    <div class="footer-brand">
      <div class="footer-logo-row">
        <div class="footer-logo-circle"><img src="{{ asset('assets/images/Logo Tk.png') }}" alt="Logo TK Aisyiyah" /></div>
        <div class="footer-school-name">TK Aisyiyah<br>Mimika</div>
      </div>
      <p class="footer-tagline">Tempat aman dan nyaman untuk belajar sambil bermain bagi anak usia dini di Mimika, Papua Tengah.</p>
      <div class="footer-socials">
        <a class="footer-social-btn" href="#" target="_blank" rel="noopener" title="Instagram">📸</a>
        <a class="footer-social-btn" href="#" target="_blank" rel="noopener" title="Facebook">📘</a>
        <a class="footer-social-btn" href="https://wa.me/{{ preg_replace('/\D/','',schoolInfo('phone')) }}" target="_blank" rel="noopener" title="WhatsApp">💬</a>
      </div>
    </div>
    <div>
      <div class="footer-col-title">Navigasi</div>
      <ul class="footer-nav-list">
        <li><a href="/">Beranda</a></li>
        <li><a href="/profil">Profil Sekolah</a></li>
        <li><a href="/galeri">Galeri</a></li>
        <li><a href="/ppdb">PPDB 2027/2028</a></li>
      </ul>
    </div>
    <div>
      <div class="footer-col-title">Hubungi Kami</div>
      <div class="footer-contact-list">
        <div class="footer-contact-item"><div class="footer-contact-icon">📧</div><div class="footer-contact-text">{{ schoolInfo('email') }}</div></div>
        <div class="footer-contact-item"><div class="footer-contact-icon">📱</div><div class="footer-contact-text">{{ schoolInfo('instagram') }}</div></div>
        <div class="footer-contact-item"><div class="footer-contact-icon">📞</div><div class="footer-contact-text">{{ schoolInfo('phone') }}</div></div>
        <div class="footer-contact-item"><div class="footer-contact-icon">📍</div><div class="footer-contact-text">{{ schoolInfo('address') }}</div></div>
      </div>
    </div>
    <div class="footer-map-col">
      <div class="footer-col-title">Lokasi Kami</div>
      <a class="footer-map-box" href="{{ schoolInfo('maps_link') }}" target="_blank" rel="noopener">
        <img src="{{ asset('assets/images/Rectangle 49.png') }}" alt="Peta Lokasi" />
        <div class="footer-map-box-inner">
          <div class="footer-map-pin">📍</div>
          <div class="footer-map-label">Lihat di<br>Google Maps</div>
        </div>
      </a>
      <div class="footer-ppdb-badge {{ (!$setting || !$setting->is_active) ? 'closed' : '' }}">
        <div class="footer-ppdb-dot {{ (!$setting || !$setting->is_active) ? 'closed' : 'open' }}"></div>
        <div class="footer-ppdb-text">
          <strong>PPDB 2027/2028</strong>
          <span>{{ ($setting && $setting->is_active) ? 'Pendaftaran sedang dibuka' : 'Pendaftaran ditutup' }}</span>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <span class="footer-bottom-copy">© {{ date('Y') }} TK Aisyiyah Mimika. All rights reserved.</span>
    <span class="footer-bottom-brand">TK Aisyiyah Mimika</span>
  </div>
</footer>

<div class="chatbot-toggle" id="chatbotToggle" onclick="toggleChatbot()">
  <div class="chatbot-toggle-icon" id="chatbotToggleIcon">💬</div>
  <div class="chatbot-badge" id="chatbotBadge">1</div>
</div>
<div class="chatbot-container" id="chatbotContainer">
  <div class="chatbot-header"><div class="chatbot-header-content"><div class="chatbot-avatar">🤖</div><div class="chatbot-header-text"><h3>Asisten TK Aisyiyah</h3><p>Online – Siap membantu</p></div></div><button class="chatbot-minimize" onclick="toggleChatbot()">−</button></div>
  <div class="chatbot-messages" id="chatbotMessages">
    <div class="chatbot-message bot"><div class="chatbot-message-bubble">Halo! 👋 Selamat datang di halaman PPDB TK Aisyiyah Mimika. Ada yang bisa saya bantu? 😊</div></div>
    <div class="chatbot-typing" id="chatbotTyping"><span></span><span></span><span></span></div>
  </div>
  <div class="chatbot-quick-replies">
    <button class="quick-reply-btn" onclick="sendQuickReply('PPDB')">📋 Info PPDB</button>
    <button class="quick-reply-btn" onclick="sendQuickReply('Biaya')">💰 Biaya</button>
    <button class="quick-reply-btn" onclick="sendQuickReply('Lokasi')">📍 Lokasi</button>
  </div>
  <div class="chatbot-input-container">
    <input type="text" class="chatbot-input" id="chatbotInput" placeholder="Ketik pertanyaan..." autocomplete="off" />
    <button class="chatbot-send" onclick="sendChatMessage()">Kirim</button>
  </div>
</div>
<button class="btn-back-to-top" id="backToTop" onclick="window.scrollTo({top:0,behavior:'smooth'})">Back To Top ⌃</button>
<div class="toast-notif" id="toastNotif"></div>

<script>
  const mainForm = document.getElementById('mainPpdbForm');
  if(mainForm) { mainForm.addEventListener('submit', function(e){ e.preventDefault(); const formData = new FormData(this); fetch(this.action,{method:'POST',body:formData,headers:{'X-CSRF-TOKEN':document.querySelector('input[name="_token"]').value}}).then(r=>r.json()).then(data=>{ if(data.success){document.getElementById('ppdbFormInner').style.display='none';const s=document.getElementById('ppdbSuccess');s.style.display='block';s.scrollIntoView({behavior:'smooth',block:'start'});}else{alert('Ada kesalahan.');}}).catch(()=>alert('Terjadi error.')); }); }
  function calculateProgress(){const inputs=document.querySelectorAll('.ppdb-input');let filled=0;inputs.forEach(i=>{if(i.type==='file'){if(i.files.length>0)filled++;}else{if(i.value.trim()!=='')filled++;}});const pct=inputs.length>0?Math.round((filled/inputs.length)*100):0;document.getElementById('progressFill').style.width=pct+'%';document.getElementById('progressPct').textContent=pct+'%';}
  function updatePreview(input,previewId){if(input.files&&input.files[0]){document.getElementById(previewId).textContent='✅ '+input.files[0].name;calculateProgress();}}
  window.addEventListener('scroll',()=>{document.getElementById('navbar').classList.toggle('white-bg',window.pageYOffset>100);document.getElementById('backToTop').classList.toggle('show',window.pageYOffset>window.innerHeight/2);});
  function toggleMobileMenu(){const m=document.getElementById('mobileMenu'),h=document.getElementById('hamburger');m.classList.toggle('open');h.classList.toggle('open');document.body.style.overflow=m.classList.contains('open')?'hidden':'';}
  function closeMobileMenu(){document.getElementById('mobileMenu').classList.remove('open');document.getElementById('hamburger').classList.remove('open');document.body.style.overflow='';}
  document.addEventListener('keydown',e=>{if(e.key==='Escape')closeMobileMenu();});
  function showToast(msg){const t=document.getElementById('toastNotif');t.textContent=msg;t.classList.add('show');setTimeout(()=>t.classList.remove('show'),3000);}
  let isChatbotOpen=false,hasSeenWelcome=false;
  const chatbotContainer=document.getElementById('chatbotContainer'),chatbotMessages=document.getElementById('chatbotMessages'),chatbotInput=document.getElementById('chatbotInput'),chatbotTyping=document.getElementById('chatbotTyping'),chatbotBadge=document.getElementById('chatbotBadge'),chatbotToggleIcon=document.getElementById('chatbotToggleIcon');
  function toggleChatbot(){isChatbotOpen=!isChatbotOpen;if(isChatbotOpen){chatbotContainer.classList.add('show');chatbotToggleIcon.textContent='✕';chatbotBadge.style.display='none';chatbotInput.focus();hasSeenWelcome=true;}else{chatbotContainer.classList.remove('show');chatbotToggleIcon.textContent='💬';}}
  setTimeout(()=>{if(!hasSeenWelcome&&!isChatbotOpen)chatbotBadge.style.display='flex';},5000);
  const botResponses={'halo':'Halo! 👋 Ada yang bisa saya bantu?','ppdb':'Untuk info PPDB 2027/2028:\n📞 Hubungi sekolah\n📋 Isi form di halaman ini!','biaya':'💰 Biaya pendidikan sangat terjangkau. Hubungi kami untuk info lengkap.','lokasi':'📍 Cek Google Maps di footer halaman ini!','terima kasih':'Sama-sama! 😊'};
  function addChatMessage(msg,isUser){const d=document.createElement('div');d.className=`chatbot-message ${isUser?'user':'bot'}`;const b=document.createElement('div');b.className='chatbot-message-bubble';b.innerHTML=msg.replace(/\n/g,'<br>');d.appendChild(b);chatbotMessages.insertBefore(d,chatbotTyping);chatbotMessages.scrollTop=chatbotMessages.scrollHeight;}
  function getBotResponse(msg){const l=msg.toLowerCase();for(let k in botResponses){if(l.includes(k))return botResponses[k];}return 'Terima kasih! Silakan hubungi sekolah kami.';}
  function sendChatMessage(){const m=chatbotInput.value.trim();if(!m)return;addChatMessage(m,true);chatbotInput.value='';chatbotTyping.style.display='block';setTimeout(()=>{chatbotTyping.style.display='none';addChatMessage(getBotResponse(m),false);},600+Math.random()*600);}
  function sendQuickReply(t){chatbotInput.value=t;sendChatMessage();}
  chatbotInput.addEventListener('keypress',e=>{if(e.key==='Enter')sendChatMessage();});
</script>
</body>
</html>