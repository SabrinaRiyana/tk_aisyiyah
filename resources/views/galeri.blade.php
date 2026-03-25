<!DOCTYPE html>
<html lang="id">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes" />
  <meta charset="utf-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Galeri – TK Aisyiyah Mimika</title>
  <style>
    *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
    html, body { overflow-x: hidden; width: 100%; max-width: 100vw; font-family: "Segoe UI", Helvetica, Arial, sans-serif; scroll-behavior: smooth; background: #fff; color: #222; }

    /* ══ NAVBAR ══ */
    .navbar { position: fixed; top: clamp(10px,3vw,50px); left: 50%; transform: translateX(-50%); width: 92%; max-width: 1620px; display: flex; align-items: center; justify-content: space-between; padding: clamp(6px,1.2vw,10px) clamp(10px,1.5vw,15px) clamp(6px,1.2vw,10px) clamp(12px,1.8vw,20px); background-color: rgba(0,30,10,0.18); border-radius: 100px; backdrop-filter: blur(30px) brightness(100%) saturate(105%); -webkit-backdrop-filter: blur(30px) brightness(100%) saturate(105%); box-shadow: inset 0 1px 0 rgba(255,255,255,0.4), inset 1px 0 0 rgba(255,255,255,0.32), inset 0 -1px 20px rgba(0,0,0,0.2), inset -1px 0 20px rgba(0,0,0,0.16); z-index: 1000; transition: all 0.3s ease; }
    .navbar.white-bg { background-color: rgba(255,255,255,0.05); box-shadow: inset 0 1px 0 rgba(0,204,48,0.4), inset 1px 0 0 rgba(0,204,48,0.32), inset 0 -1px 20px rgba(0,204,48,0.2), inset -1px 0 20px rgba(0,204,48,0.16); }
    .navbar.white-bg .nav-brand, .navbar.white-bg .nav-item { color: #00CC30; }
    .navbar.white-bg .nav-item:hover { color: #009a24; }
    .navbar.white-bg .btn-admin { border-color: #00CC30; color: #00CC30; background: rgba(255,255,255,0.1); }
    .navbar.white-bg .nav-hamburger span { background: #00CC30; }
    .nav-logo { display: flex; align-items: center; gap: clamp(8px,1.5vw,15px); flex-shrink: 0; cursor: pointer; }
    .logo-wrapper { width: clamp(38px,5.5vw,60px); height: clamp(38px,5.5vw,60px); background: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
    .logo-img { width: 80%; height: 80%; object-fit: contain; }
    .nav-brand { font-size: clamp(.85rem,1.5vw,1.25rem); font-weight: 600; color: #fff; white-space: nowrap; transition: color .3s; text-decoration: none; }
    .nav-right { display: flex; align-items: center; gap: clamp(4px,1vw,10px); flex-shrink: 0; }
    .nav-item { padding: clamp(6px,1vw,10px) clamp(8px,1.2vw,15px); font-size: clamp(.8rem,1.2vw,1.05rem); color: #fff; white-space: nowrap; cursor: pointer; transition: all .3s; flex-shrink: 0; text-decoration: none; display: inline-block; }
    .nav-item:hover { color: #00cc30; }
    .nav-item.active { color: #44ff77; font-weight: 700; }
    .btn-admin { padding: clamp(6px, 1vw, 10px) clamp(10px, 1.5vw, 20px); border: 1px solid #fff; border-radius: 100px; background: rgba(0,0,0,0.01); color: #fff; font-size: clamp(.78rem, 1.1vw, 1.05rem); cursor: pointer; transition: all .3s; white-space: nowrap; flex-shrink: 0; -webkit-backdrop-filter: blur(18.5px); backdrop-filter: blur(18.5px); }
    .btn-admin:hover { background: rgba(255,255,255,0.1); }
    .btn-ppdb { padding: clamp(6px,1vw,10px) clamp(12px,1.8vw,25px); border: none; border-radius: 100px; background: linear-gradient(102deg,#00af29,#00cc30); color: #fff; font-size: clamp(.78rem,1.1vw,1.05rem); cursor: pointer; transition: all .3s; white-space: nowrap; flex-shrink: 0; font-weight: 700; }
    .btn-ppdb:hover { transform: translateY(-2px); box-shadow: 0 4px 15px rgba(0,204,48,.4); }
    .nav-hamburger { display: none; flex-direction: column; gap: 5px; cursor: pointer; padding: 8px; flex-shrink: 0; z-index: 1002; }
    .nav-hamburger span { display: block; width: 24px; height: 2.5px; background: #fff; border-radius: 2px; transition: all .3s; }
    .nav-hamburger.open span:nth-child(1) { transform: translateY(7.5px) rotate(45deg); }
    .nav-hamburger.open span:nth-child(2) { opacity: 0; }
    .nav-hamburger.open span:nth-child(3) { transform: translateY(-7.5px) rotate(-45deg); }

    /* ══ MOBILE MENU ══ */
    .nav-mobile-menu { display: none; position: fixed; inset: 0; background: rgba(0,140,40,0.97); z-index: 999; flex-direction: column; align-items: center; justify-content: center; gap: 20px; padding: 40px 24px; }
    .nav-mobile-menu.open { display: flex; animation: menuIn .3s ease; }
    @keyframes menuIn { from{opacity:0;transform:translateY(-10px);}to{opacity:1;transform:translateY(0);} }
    .nav-mobile-close { position: absolute; top: 22px; right: 22px; font-size: 2rem; color: #fff; cursor: pointer; background: none; border: none; }
    .nav-mobile-item { color: #fff; font-size: clamp(1.2rem,5vw,1.6rem); font-weight: 600; cursor: pointer; padding: 10px 24px; border-radius: 12px; transition: background .2s; text-align: center; text-decoration: none; display: block; }
    .nav-mobile-item:hover { background: rgba(255,255,255,.15); }
    .nav-mobile-item.active { color: #44ff77; }
    .nav-mobile-btns { display: flex; gap: 12px; flex-wrap: wrap; justify-content: center; margin-top: 8px; }

    /* ══ HERO ══ */
    .section-hero { position: relative; width: 100%; height: 100svh; min-height: 480px; overflow: hidden; display: flex; align-items: center; justify-content: center; }
    .hero-background { position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0; transition: opacity 1.5s ease-in-out; z-index: 1; }
    .hero-background.active { opacity: 1; z-index: 2; }
    .hero-bg-overlay { position: absolute; inset: 0; background: rgba(0,0,0,.48); z-index: 3; }
    .hero-content { position: relative; z-index: 4; text-align: center; display: flex; flex-direction: column; align-items: center; padding: 0 clamp(20px,5vw,80px); max-width: 1000px; width: 100%; }
    .hero-title { font-size: clamp(2.4rem,8vw,5.5rem); font-weight: 900; color: #fff; line-height: 1.1; margin-bottom: clamp(16px,3vw,28px); letter-spacing: 1px; }
    .hero-title em { font-style: normal; color: #44ff77; }
    .hero-divider { width: 100%; max-width: 720px; height: 2px; background: rgba(255,255,255,0.55); margin-bottom: clamp(14px,2.5vw,28px); }
    .hero-sub { font-size: clamp(.85rem,2.2vw,1.1rem); color: rgba(255,255,255,.9); line-height: 1.7; max-width: 640px; padding: 0 10px; }

    /* ══ FASILITAS ══ */
    .section-fasilitas { max-width: 1300px; margin: 0 auto; padding: clamp(40px,6vw,80px) clamp(20px,5vw,60px); }
    .fasilitas-item { display: grid; grid-template-columns: 1fr 1fr; gap: clamp(30px,6vw,80px); align-items: center; margin-bottom: clamp(50px,6vw,80px); opacity: 0; transform: translateY(30px); transition: opacity .65s ease, transform .65s ease; }
    .fasilitas-item.visible { opacity: 1; transform: translateY(0); }
    .fasilitas-item.reverse { direction: rtl; } .fasilitas-item.reverse > * { direction: ltr; }
    .fasilitas-img-wrap { border-radius: clamp(14px,2vw,22px); overflow: hidden; box-shadow: 0 16px 48px rgba(0,0,0,.15); aspect-ratio: 4/3; background: #e8f5e9; }
    .fasilitas-img-wrap img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform .5s; }
    .fasilitas-img-wrap:hover img { transform: scale(1.04); }
    .fasilitas-content { display: flex; flex-direction: column; justify-content: center; }
    .fasilitas-number { font-size: clamp(3rem,7vw,5.5rem); font-weight: 900; color: rgba(0,168,50,.1); line-height: 1; margin-bottom: -10px; }
    .fasilitas-name { font-size: clamp(1.3rem,3vw,2rem); font-weight: 900; color: #00a832; margin-bottom: 12px; }
    .fasilitas-desc { font-size: clamp(.85rem,1.8vw,.97rem); line-height: 1.85; color: #555; }
    .fasilitas-tag { display: inline-flex; align-items: center; gap: 6px; margin-top: 18px; padding: 8px 18px; background: linear-gradient(102deg, #00af29, #00cc30); border-radius: 100px; color: #fff; font-size: .82rem; font-weight: 700; letter-spacing: .4px; width: fit-content; box-shadow: 0 4px 14px rgba(0,168,50,.3); }
    .fasilitas-tag::before { content: '✓'; }

    /* ══ GALERI SEKOLAH ══ */
    .section-galeri-sekolah { background: #f9fdf9; padding: clamp(40px,5vw,60px) 0; }
    .galeri-inner { max-width: 1300px; margin: 0 auto; padding: 0 clamp(20px,4vw,60px); }
    .galeri-head { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px; margin-bottom: 28px; }
    .galeri-head-left { display: flex; flex-direction: column; gap: 4px; }
    .galeri-breadcrumb { font-size: .85rem; color: #00a832; display: flex; align-items: center; gap: 6px; } .galeri-breadcrumb span { color: #aaa; }
    .galeri-title { font-size: clamp(1.6rem,4vw,3rem); font-weight: 900; color: #00a832; }
    .galeri-wrap { position: relative; }
    .galeri-outer { overflow: hidden; border-radius: 14px; width: 100%; }
    .galeri-track { display: flex; transition: transform 0.5s ease-in-out; }
    .galeri-slide { min-width: 100%; box-sizing: border-box; padding: 10px; }
    .galeri-grid { display: grid; grid-template-columns: repeat(3, 1fr); grid-template-rows: repeat(2, 1fr); gap: 20px; }
    .galeri-card { position: relative; border-radius: 15px; overflow: hidden; height: 250px; }
    .galeri-card img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1); }
    .galeri-overlay { position: absolute; inset: 0; background: linear-gradient(to top, rgba(20,50,20,0.9) 0%, rgba(20,50,20,0.4) 40%, transparent 100%); display: flex; align-items: flex-end; justify-content: flex-start; padding: 20px; opacity: 0; transition: opacity 0.4s ease; }
    .overlay-text { text-align: left; color: #fff; }
    .overlay-text h3 { font-size: 1.1rem; font-weight: 700; margin: 0 0 2px; }
    .overlay-text p { font-size: 0.8rem; margin: 0; opacity: 0.9; }
    .galeri-card:hover img { transform: scale(1.1); }
    .galeri-card:hover .galeri-overlay { opacity: 1; }
    .galeri-btn { position: absolute; top: 50%; transform: translateY(-50%); width: clamp(36px,4vw,46px); height: clamp(36px,4vw,46px); background: #00a832; border: none; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 14px rgba(0,168,50,.4); transition: all .25s; z-index: 10; }
    .galeri-btn:hover { background: #007a26; transform: translateY(-50%) scale(1.08); }
    .galeri-btn.prev { left: clamp(-12px,-2vw,-23px); }
    .galeri-btn.next { right: clamp(-12px,-2vw,-23px); }
    .galeri-dots { display: flex; justify-content: center; gap: 8px; margin-top: 26px; }
    .gd-dot { width: 9px; height: 9px; border-radius: 50%; background: #ccc; cursor: pointer; transition: background .25s, transform .25s; }
    .gd-dot.active { background: #00a832; transform: scale(1.4); }

    /* ══ TESTIMONIAL ══ */
    .section-testimonial { position: relative; width: 100%; background: #f5f5f5; padding: clamp(40px,5vw,60px) clamp(16px,3vw,20px) clamp(50px,6vw,70px); }
    .testimonial-container { max-width: 1400px; margin: 0 auto; }
    .testimonial-header { text-align: center; margin-bottom: 36px; }
    .testimonial-title { font-size: clamp(1.6rem,4vw,3.2rem); font-weight: 700; color: #00a832; margin: 0 0 16px 0; line-height: 1.3; }
    .testimonial-subtitle { font-size: clamp(.88rem,1.8vw,1.1rem); color: #666; max-width: 900px; margin: 0 auto; line-height: 1.6; }
    .testimonial-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: clamp(14px,2vw,25px); margin-bottom: 40px; }
    .testimonial-card { background: #ffffff; border-radius: clamp(14px,2vw,20px); padding: clamp(16px,2.5vw,25px); box-shadow: 0 4px 15px rgba(0,0,0,0.08); transition: transform 0.3s ease, box-shadow 0.3s ease; border: 2px solid #e0e0e0; }
    .testimonial-card:hover { transform: translateY(-5px); box-shadow: 0 8px 25px rgba(0,0,0,0.12); border-color: #00cc30; }
    .testimonial-card-header { display: flex; align-items: center; gap: 10px; margin-bottom: 12px; }
    .testimonial-avatar { width: clamp(38px,5vw,50px); height: clamp(38px,5vw,50px); border-radius: 50%; object-fit: cover; flex-shrink: 0; }
    .testimonial-info { flex: 1; min-width: 0; } .testimonial-name { font-size: clamp(.9rem,1.5vw,1.1rem); font-weight: 700; color: #00a832; margin: 0 0 3px 0; } .testimonial-role { font-size: clamp(.75rem,1.2vw,.9rem); color: #666; margin: 0; }
    .testimonial-rating { display: flex; align-items: center; gap: 4px; flex-shrink: 0; } .star { font-size: clamp(.9rem,1.5vw,1.2rem); } .rating-number { font-size: clamp(.8rem,1.2vw,.95rem); font-weight: 600; color: #00a832; }
    .testimonial-text { font-size: clamp(.82rem,1.3vw,.95rem); line-height: 1.7; color: #444; margin: 0; }
    .testimonial-button-wrapper { display: flex; justify-content: center; gap: 14px; flex-wrap: wrap; }
    .btn-read-all-testimonial { display: inline-flex; align-items: center; gap: 10px; padding: clamp(12px,2vw,15px) clamp(24px,4vw,40px); border: none; border-radius: 100px; background: linear-gradient(102deg, #00af29 0%, #00cc30 100%); color: #fff; font-size: clamp(.9rem,1.8vw,1.05rem); font-weight: 600; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 20px rgba(0,168,50,0.4); }
    .btn-read-all-testimonial:hover { transform: translateY(-3px); }
    .btn-kirim-masukan-utama { display: inline-flex; align-items: center; gap: 10px; padding: clamp(12px,2vw,15px) clamp(24px,4vw,40px); border: none; border-radius: 100px; background: linear-gradient(102deg,#007acc,#00aaff); color: #fff; font-size: clamp(.9rem,1.8vw,1.05rem); font-weight: 600; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 20px rgba(0,150,220,0.4); }
    .btn-kirim-masukan-utama:hover { transform: translateY(-3px); }
    .arrow-icon { font-size: 1.5rem; font-weight: bold; }

    /* ══ TESTI MODAL ══ */
    .testi-modal-overlay { display: none; position: fixed; inset: 0; background: rgba(0,30,10,0.65); backdrop-filter: blur(8px); z-index: 99999; align-items: center; justify-content: center; padding: clamp(12px,3vw,30px) clamp(12px,3vw,20px); }
    .testi-modal-overlay.active { display: flex; animation: testiOverlayIn 0.3s ease; }
    @keyframes testiOverlayIn { from{opacity:0;}to{opacity:1;} }
    .testi-modal-box { background: #f5f5f5; border-radius: clamp(16px,3vw,28px); width: 100%; max-width: 1100px; max-height: calc(100dvh - clamp(24px,6vw,60px)); position: relative; animation: testiBoxIn 0.35s cubic-bezier(0.22,1,0.36,1); box-shadow: 0 24px 80px rgba(0,0,0,0.35); display: flex; flex-direction: column; overflow: hidden; }
    @keyframes testiBoxIn { from{opacity:0;transform:translateY(50px) scale(0.97);}to{opacity:1;transform:translateY(0) scale(1);} }
    .testi-modal-header-wrap { flex-shrink: 0; padding: clamp(20px,3vw,36px) clamp(16px,3vw,40px) 0; background: #f5f5f5; border-radius: clamp(16px,3vw,28px) clamp(16px,3vw,28px) 0 0; position: relative; }
    .testi-modal-close { position: absolute; top: 12px; right: 12px; width: 40px; height: 40px; border-radius: 50%; border: 2px solid #00cc30; background: white; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 16px; color: #00cc30; font-weight: bold; transition: all 0.25s; z-index: 10; }
    .testi-modal-close:hover { background: #00cc30; color: white; transform: rotate(90deg); }
    .testi-modal-header { text-align: center; padding-bottom: 20px; border-bottom: 2px dashed #c8f0d0; }
    .testi-modal-header h2 { font-size: clamp(1.2rem,3vw,2.6rem); font-weight: 700; color: #00a832; margin-bottom: 6px; } .testi-modal-header p { font-size: clamp(.82rem,1.5vw,1rem); color: #666; }
    .testi-modal-scroll-area { flex: 1; overflow-y: auto; padding: clamp(16px,2.5vw,28px) clamp(16px,3vw,40px) clamp(24px,3vw,40px); scrollbar-width: thin; scrollbar-color: #00cc30 #e8f5ea; }
    .testi-modal-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: clamp(14px,2vw,22px); }
    .testi-modal-card { background: #ffffff; border-radius: clamp(12px,2vw,18px); padding: clamp(14px,2vw,22px) clamp(14px,2vw,20px); border: 2px solid #e8f5ea; box-shadow: 0 3px 14px rgba(0,168,50,0.07); transition: transform 0.25s, box-shadow 0.25s, border-color 0.25s, opacity 0.4s ease, translate 0.4s ease; opacity: 0; translate: 0 24px; }
    .testi-modal-card.visible { opacity: 1; translate: 0 0; }
    .testi-modal-card:hover { transform: translateY(-5px); box-shadow: 0 10px 28px rgba(0,168,50,0.14); border-color: #00cc30; }
    .testi-modal-card .testi-card-header { display: flex; align-items: center; gap: 10px; margin-bottom: 12px; }
    .testi-modal-avatar { width: 44px; height: 44px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 1rem; color: white; flex-shrink: 0; }
    .testi-card-info .testi-card-name { font-size: clamp(.85rem,1.5vw,1rem); font-weight: 700; color: #00a832; margin: 0 0 2px 0; }
    .testi-card-info .testi-card-role { font-size: clamp(.72rem,1.2vw,.82rem); color: #888; margin: 0; }
    .testi-modal-card .testi-stars { display: flex; gap: 2px; margin-bottom: 10px; }
    .testi-modal-card .testi-stars span { font-size: .95rem; color: #f59e0b; }
    .testi-modal-card .testi-text { font-size: clamp(.8rem,1.2vw,.9rem); line-height: 1.7; color: #555; margin: 0; }
    .testi-modal-footer { text-align: center; margin-top: 30px; padding-top: 20px; border-top: 2px dashed #c8f0d0; color: #888; font-size: clamp(.78rem,1.3vw,.9rem); }

    /* ══ CTA ══ */
    .section-cta { background: #fff; padding: clamp(40px,6vw,60px) clamp(20px,5vw,60px); text-align: center; }
    .cta-title { font-size: clamp(1.6rem,4vw,3.2rem); font-weight: 900; color: #00a832; line-height: 1.3; margin-bottom: 30px; }
    .cta-btn { display: inline-block; padding: clamp(14px,2.5vw,18px) clamp(32px,5vw,56px); background: linear-gradient(102deg, #00af29, #00cc30); color: #fff; border: none; border-radius: 100px; font-size: clamp(.95rem,2vw,1.1rem); font-weight: 800; cursor: pointer; transition: all .3s; box-shadow: 0 8px 28px rgba(0,168,50,.35); }
    .cta-btn:hover { transform: translateY(-3px); }

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

    /* ══ CHATBOT ══ */
    .chatbot-toggle { position: fixed; bottom: clamp(80px,12vw,110px); right: clamp(16px,3vw,30px); width: clamp(50px,7vw,60px); height: clamp(50px,7vw,60px); background: linear-gradient(135deg,#00af29,#00cc30); border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; box-shadow: 0 4px 20px rgba(0,204,48,.4); z-index: 9997; transition: all .3s; border: 3px solid white; }
    .chatbot-toggle:hover { transform: scale(1.1); } .chatbot-toggle-icon { font-size: clamp(1.4rem,2.5vw,1.8rem); color: white; }
    .chatbot-badge { position: absolute; top: -5px; right: -5px; width: 22px; height: 22px; background: #f00; border-radius: 50%; display: none; align-items: center; justify-content: center; font-size: .7rem; color: white; font-weight: bold; border: 2px solid white; animation: pulse 2s infinite; }
    @keyframes pulse { 0%,100%{transform:scale(1);}50%{transform:scale(1.1);} }
    .chatbot-container { position: fixed; bottom: clamp(140px,18vw,180px); right: clamp(12px,3vw,30px); width: min(400px,calc(100vw - 24px)); height: clamp(480px,72vh,630px); background: white; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,.3); z-index: 9998; display: none; flex-direction: column; overflow: hidden; opacity: 0; }
    .chatbot-container.show { display: flex; opacity: 1; animation: slideUpChat .4s ease; }
    @keyframes slideUpChat { from{opacity:0;transform:translateY(20px);}to{opacity:1;transform:translateY(0);} }
    .chatbot-header { background: linear-gradient(135deg,#00af29,#00cc30); color: white; padding: 16px 18px; display: flex; justify-content: space-between; align-items: center; flex-shrink: 0; }
    .chatbot-header-content { display: flex; align-items: center; gap: 10px; }
    .chatbot-avatar { width: 40px; height: 40px; background: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.3rem; }
    .chatbot-header-text h3 { margin: 0; font-size: 1rem; font-weight: 600; } .chatbot-header-text p { margin: 0; font-size: .75rem; opacity: .9; }
    .chatbot-minimize { background: rgba(255,255,255,.2); border: none; color: white; width: 30px; height: 30px; border-radius: 50%; cursor: pointer; font-size: 1.2rem; display: flex; align-items: center; justify-content: center; }
    .chatbot-messages { flex: 1; padding: 16px; overflow-y: auto; background: #f8f9fa; min-height: 0; }
    .chatbot-messages::-webkit-scrollbar { width: 6px; } .chatbot-messages::-webkit-scrollbar-thumb { background: #00cc30; border-radius: 3px; }
    .chatbot-message { margin-bottom: 12px; display: flex; } .chatbot-message.bot { justify-content: flex-start; } .chatbot-message.user { justify-content: flex-end; }
    .chatbot-message-bubble { max-width: 82%; padding: 10px 14px; border-radius: 16px; word-wrap: break-word; line-height: 1.5; font-size: .88rem; }
    .chatbot-message.bot .chatbot-message-bubble { background: white; color: #333; border-bottom-left-radius: 4px; box-shadow: 0 2px 8px rgba(0,0,0,.08); }
    .chatbot-message.user .chatbot-message-bubble { background: linear-gradient(135deg,#00af29,#00cc30); color: white; border-bottom-right-radius: 4px; }
    .chatbot-typing { display: none; padding: 10px 14px; background: white; border-radius: 16px; border-bottom-left-radius: 4px; box-shadow: 0 2px 8px rgba(0,0,0,.08); width: fit-content; }
    .chatbot-typing span { height: 8px; width: 8px; background: #00cc30; border-radius: 50%; display: inline-block; margin-right: 4px; animation: chatTyping 1.4s infinite; }
    .chatbot-typing span:nth-child(2){animation-delay:.2s;} .chatbot-typing span:nth-child(3){animation-delay:.4s;}
    @keyframes chatTyping{0%,60%,100%{transform:translateY(0);}30%{transform:translateY(-10px);}}
    .chatbot-quick-replies { display: flex; flex-wrap: wrap; gap: 6px; padding: 8px 14px 10px; background: #f8f9fa; flex-shrink: 0; border-top: 1px solid #eee; }
    .quick-reply-btn { padding: 7px 12px; background: white; border: 1.5px solid #00cc30; border-radius: 15px; color: #00cc30; font-size: .82rem; cursor: pointer; transition: all .3s; white-space: nowrap; font-weight: 600; }
    .quick-reply-btn:hover { background: #00cc30; color: white; } .quick-reply-btn.masukan-btn { border-color: #0077cc; color: #0077cc; } .quick-reply-btn.masukan-btn:hover { background: #0077cc; color: white; }
    .chatbot-form-masukan { padding: 14px 16px 12px; background: #ffffff; border-top: 2px solid #e0f5e0; flex-shrink: 0; display: none; flex-direction: column; gap: 9px; max-height: 280px; overflow-y: auto; }
    .chatbot-form-masukan.show { display: flex; }
    .form-masukan-title { font-size: .84rem; font-weight: 800; color: #00a832; display: flex; align-items: center; gap: 6px; margin-bottom: 2px; }
    .masukan-form-name, .masukan-form-text { padding: 9px 12px; border: 2px solid #c8f0d0; border-radius: 12px; font-size: .84rem; outline: none; font-family: inherit; transition: border-color .25s; width: 100%; }
    .masukan-form-name:focus, .masukan-form-text:focus { border-color: #00cc30; }
    .masukan-form-text { resize: none; height: 68px; line-height: 1.5; }
    .masukan-stars-wrap { display: flex; align-items: center; gap: 8px; } .masukan-stars-wrap label { font-size: .78rem; color: #777; white-space: nowrap; }
    .masukan-stars-select { display: flex; gap: 3px; } .masukan-stars-select span { font-size: 1.25rem; cursor: pointer; transition: transform .15s; color: #ddd; user-select: none; line-height: 1; }
    .masukan-stars-select span.lit { color: #f59e0b; } .masukan-stars-select span:hover { transform: scale(1.25); }
    .form-btns { display: flex; gap: 8px; }
    .btn-submit-masukan { flex: 2; padding: 9px; background: linear-gradient(135deg,#00af29,#00cc30); color: white; border: none; border-radius: 12px; cursor: pointer; font-size: .88rem; font-weight: 700; transition: opacity .2s; } .btn-submit-masukan:hover { opacity: .9; }
    .btn-cancel-masukan { flex: 1; padding: 9px; background: #f0f0f0; color: #888; border: none; border-radius: 12px; cursor: pointer; font-size: .84rem; transition: background .2s; } .btn-cancel-masukan:hover { background: #e0e0e0; }
    .chatbot-input-container { padding: 10px 12px; background: white; border-top: 1px solid #e0e0e0; display: flex; gap: 8px; flex-shrink: 0; }
    .chatbot-input { flex: 1; padding: 9px 14px; border: 2px solid #e0e0e0; border-radius: 20px; font-size: .88rem; outline: none; transition: border-color .3s; font-family: inherit; } .chatbot-input:focus { border-color: #00cc30; }
    .chatbot-send { padding: 9px 18px; background: linear-gradient(135deg,#00af29,#00cc30); color: white; border: none; border-radius: 20px; cursor: pointer; font-size: .88rem; font-weight: 600; white-space: nowrap; }

    /* ══ BACK TO TOP & TOAST ══ */
    .btn-back-to-top { position: fixed; bottom: clamp(16px,3vw,30px); right: clamp(16px,3vw,30px); padding: clamp(10px,2vw,15px) clamp(18px,3vw,30px); border: none; border-radius: 100px; background: linear-gradient(102deg,#00af29,#00cc30); color: #fff; font-size: clamp(.85rem,1.5vw,1.05rem); font-weight: 500; cursor: pointer; transition: all .3s; box-shadow: 0 4px 15px rgba(0,168,50,.4); z-index: 9996; display: none; }
    .btn-back-to-top.show { display: inline-flex; align-items: center; gap: 8px; } .btn-back-to-top:hover { transform: translateY(-3px); } .btn-back-to-top::after { content: '⌃'; font-size: 1.2rem; font-weight: bold; }
    .toast-notif { position: fixed; bottom: 32px; left: 50%; transform: translateX(-50%) translateY(60px); background: linear-gradient(135deg,#00af29,#00cc30); color: white; padding: 14px 30px; border-radius: 100px; font-size: .95rem; font-weight: 700; box-shadow: 0 8px 28px rgba(0,204,48,.4); z-index: 99999; transition: transform .4s cubic-bezier(.22,1,.36,1), opacity .4s; opacity: 0; pointer-events: none; white-space: nowrap; }
    .toast-notif.show { transform: translateX(-50%) translateY(0); opacity: 1; }

    /* ══ RESPONSIVE ══ */
    @media (max-width: 860px) { .nav-right { display: none; } .nav-hamburger { display: flex; } }
    @media (max-width: 1100px) { .fasilitas-item { grid-template-columns: 1fr; gap: 28px; } .fasilitas-item.reverse { direction: ltr; } .testimonial-grid { grid-template-columns: repeat(2,1fr); } .testi-modal-grid { grid-template-columns: repeat(2,1fr); } .galeri-grid { grid-template-columns: repeat(2,1fr); } }
    @media (max-width: 1000px) { .footer-top { grid-template-columns: 1fr 1fr; } }
    @media (max-width: 600px) { .galeri-grid { grid-template-columns: 1fr; } .galeri-btn.prev { left: 4px; } .galeri-btn.next { right: 4px; } .testimonial-grid { grid-template-columns: 1fr; } .testi-modal-grid { grid-template-columns: 1fr; } .chatbot-container { right: 8px; left: 8px; width: auto; bottom: 90px; } .chatbot-toggle { right: 16px; bottom: 80px; } .btn-back-to-top { right: 16px; bottom: 16px; } .footer-top { grid-template-columns: 1fr; } .footer-tagline { max-width: 100%; } .footer-bottom { flex-direction: column; align-items: flex-start; } }
  </style>
</head>
<body>

  <!-- MOBILE MENU -->
  <div class="nav-mobile-menu" id="mobileMenu">
    <button class="nav-mobile-close" onclick="closeMobileMenu()">✕</button>
    <a class="nav-mobile-item" href="/" onclick="closeMobileMenu()">Beranda</a>
    <a class="nav-mobile-item" href="/profil" onclick="closeMobileMenu()">Profil Sekolah</a>
    <a class="nav-mobile-item active" href="/galeri" onclick="closeMobileMenu()">Galeri</a>
    <div class="nav-mobile-btns">
      <button class="btn-admin" onclick="window.location.href='/login';closeMobileMenu()">Admin Login</button>
      <button class="btn-ppdb" onclick="window.location.href='/ppdb';closeMobileMenu()">PPDB 2026/2027</button>
    </div>
  </div>

  <!-- HERO -->
  <section class="section-hero">
    @php
      $galeriBanners = \App\Models\Banner::where('page', 'galeri')->orderBy('order')->get();
    @endphp
    @foreach($galeriBanners as $index => $banner)
      <img class="hero-background {{ $index == 0 ? 'active' : '' }}" src="{{ asset('storage/' . $banner->image) }}" alt="Banner {{ $index + 1 }}" />
    @endforeach
    <div class="hero-bg-overlay"></div>
    <nav class="navbar" id="navbar">
      <div class="nav-logo" onclick="window.location.href='/'">
        <div class="logo-wrapper"><img class="logo-img" src="{{ asset('assets/images/Logo Tk.png') }}" alt="Logo TK Aisyiyah" /></div>
        <span class="nav-brand">TK Aisyiyah Mimika</span>
      </div>
      <div class="nav-right">
        <a class="nav-item" href="/">Beranda</a>
        <a class="nav-item" href="/profil">Profil Sekolah</a>
        <a class="nav-item active" href="/galeri">Galeri</a>
        <button class="btn-admin" onclick="window.location.href='/admin/login'">Admin Login</button>
        <button class="btn-ppdb" onclick="window.location.href='/ppdb'">PPDB 2026/2027</button>
      </div>
      <div class="nav-hamburger" id="hamburger" onclick="toggleMobileMenu()">
        <span></span><span></span><span></span>
      </div>
    </nav>
    <div class="hero-content">
      <h1 class="hero-title">Galeri <em>Kami</em></h1>
      <div class="hero-divider"></div>
      <p class="hero-sub">Ruang aman untuk bereksplorasi, melatih kemandirian, dan membiarkan imajinasi si kecil terbang tinggi.</p>
    </div>
  </section>

  <!-- FASILITAS -->
  <section class="section-fasilitas" id="fasilitasSection">
    <div class="galeri-head">
      <div class="galeri-head-left">
        <div class="galeri-breadcrumb">Galeri &nbsp;›&nbsp; <span>Fasilitas Sekolah</span></div>
      </div>
    </div>
    @foreach($fasilitas as $index => $item)
      <div class="fasilitas-item {{ $index % 2 !== 0 ? 'reverse' : '' }}">
        <div class="fasilitas-img-wrap">
          <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}" />
        </div>
        <div class="fasilitas-content">
          <div class="fasilitas-number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
          <h3 class="fasilitas-name">{{ $item->judul }}</h3>
          <p class="fasilitas-desc">{{ $item->deskripsi }}</p>
          @if($item->is_tersedia)
            <span class="fasilitas-tag">Tersedia</span>
          @endif
        </div>
      </div>
    @endforeach
  </section>

  <!-- GALERI SEKOLAH -->
  <section class="section-galeri-sekolah" id="galeri-sekolah">
    <div class="galeri-inner">
      <div class="galeri-head">
        <div class="galeri-head-left">
          <div class="galeri-breadcrumb">Galeri &nbsp;›&nbsp; <span>Kegiatan Sekolah</span></div>
        </div>
        <h2 class="galeri-title">GALERI SEKOLAH</h2>
      </div>
      <div class="galeri-wrap">
        <button class="galeri-btn prev" onclick="moveGaleri(-1)" aria-label="Sebelumnya">‹</button>
        <div class="galeri-outer">
          <div class="galeri-track" id="galeriTrack"></div>
        </div>
        <button class="galeri-btn next" onclick="moveGaleri(1)" aria-label="Berikutnya">›</button>
      </div>
      <div class="galeri-dots" id="galeriDots"></div>
    </div>
  </section>

  <!-- TESTIMONIAL -->
  <section class="section-testimonial" id="testimonial">
    <div class="testimonial-container">
      <div class="testimonial-header">
        <h2 class="testimonial-title">Saksi Keceriaan yang Tumbuh Bersama</h2>
        <p class="testimonial-subtitle">Inilah cerita para orang tua yang telah melihat buah hati mereka tumbuh menjadi pribadi yang lebih mandiri, percaya diri, dan tentu saja, bahagia</p>
      </div>
      @if($suggestionsAll->count() > 0)
      <div class="testimonial-grid">
        @foreach($suggestionsAll->take(6) as $s)
        <div class="testimonial-card">
          <div class="testimonial-card-header">
            <img src="{{ asset('assets/images/Logo Tk.png') }}" alt="" class="testimonial-avatar" />
            <div class="testimonial-info">
              <h3 class="testimonial-name">{{ $s->nama }}</h3>
              <p class="testimonial-role">Pengunjung Website</p>
            </div>
            <div class="testimonial-rating">
              <span class="star">⭐</span>
              <span class="rating-number">{{ $s->rating }}/5</span>
            </div>
          </div>
          <p class="testimonial-text">{{ $s->pesan }}</p>
        </div>
        @endforeach
      </div>
      @else
      <p style="text-align:center;color:#aaa;padding:30px 0;">Belum ada testimoni. Jadilah yang pertama! 😊</p>
      @endif
      <div class="testimonial-button-wrapper">
        <button class="btn-read-all-testimonial" onclick="bukaModalTestimoni()">BACA SEMUA TESTIMONI <span class="arrow-icon">›</span></button>
        <button class="btn-kirim-masukan-utama" onclick="bukaChatbotMasukan()">💬 Kirim Masukan Anda</button>
      </div>
    </div>
  </section>

  <!-- TESTIMONI MODAL -->
  <div class="testi-modal-overlay" id="testiModalOverlay" onclick="tutupModalTestimoniOverlay(event)">
    <div class="testi-modal-box">
      <div class="testi-modal-header-wrap">
        <button class="testi-modal-close" onclick="tutupModalTestimoni()">✕</button>
        <div class="testi-modal-header">
          <h2>💬 Semua Testimoni</h2>
          <p id="testiModalCount">Dari orang tua & pengunjung TK Aisyiyah Mimika</p>
        </div>
      </div>
      <div class="testi-modal-scroll-area">
        <div class="testi-modal-grid" id="testiModalGrid"></div>
        <div class="testi-modal-footer">✨ Bergabunglah bersama kami! &nbsp;|&nbsp; PPDB 2026/2027 Dibuka</div>
      </div>
    </div>
  </div>

  <!-- CTA -->
  <section class="section-cta">
    <h2 class="cta-title">Mulai Petualangan Si Kecil bersama kami!<br>Daftar Sekarang !</h2>
    <button class="cta-btn" onclick="window.open('/ppdb')">PPDB 2026/2027</button>
  </section>

  <!-- ══ FOOTER BARU ══ -->
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
      <div class="footer-nav-col">
        <div class="footer-col-title">Navigasi</div>
        <ul class="footer-nav-list">
          <li><a href="/">Beranda</a></li>
          <li><a href="/profil">Profil Sekolah</a></li>
          <li><a href="/galeri">Galeri</a></li>
          <li><a href="/ppdb">PPDB 2026/2027</a></li>
        </ul>
      </div>
      <div class="footer-contact-col">
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
        @php $ppdbOpen = \App\Models\PpdbSetting::first()?->is_active ?? false; @endphp
        <div class="footer-ppdb-badge {{ $ppdbOpen ? '' : 'closed' }}">
            <div class="footer-ppdb-dot {{ $ppdbOpen ? 'open' : 'closed' }}"></div>
            <div class="footer-ppdb-text">
                <strong>PPDB 2026/2027</strong>
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

  <!-- BACK TO TOP -->
  <button class="btn-back-to-top" id="backToTop" onclick="scrollToTop()">Back To Top</button>
  <div class="toast-notif" id="toastNotif"></div>

  <!-- CHATBOT -->
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

  <script>
    const suggestions = {!! json_encode($suggestionsAll) !!};
    function escHtml(s) { return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;'); }
    function inisialDari(nama) { const p=nama.trim().split(' '); return p.length>=2?(p[0][0]+p[1][0]).toUpperCase():nama.substring(0,2).toUpperCase(); }
    const WARNA_AVATAR=['linear-gradient(135deg,#00af29,#00cc30)','linear-gradient(135deg,#0077cc,#00aaff)','linear-gradient(135deg,#cc7700,#ffaa00)','linear-gradient(135deg,#cc0077,#ff00aa)','linear-gradient(135deg,#7700cc,#aa00ff)','linear-gradient(135deg,#009900,#00dd44)'];

    /* NAVBAR */
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll',()=>navbar.classList.toggle('white-bg',window.pageYOffset>100));

    /* MOBILE MENU */
    function toggleMobileMenu(){ const m=document.getElementById('mobileMenu'),h=document.getElementById('hamburger'),o=m.classList.toggle('open'); h.classList.toggle('open',o); document.body.style.overflow=o?'hidden':''; }
    function closeMobileMenu(){ document.getElementById('mobileMenu').classList.remove('open'); document.getElementById('hamburger').classList.remove('open'); document.body.style.overflow=''; }
    document.addEventListener('keydown',e=>{ if(e.key==='Escape'){ closeMobileMenu(); tutupModalTestimoni(); } });

    /* HERO SLIDESHOW */
    const bgs=document.querySelectorAll('.hero-background'); let bgIdx=0;
    if(bgs.length > 1) { setInterval(()=>{ bgs[bgIdx].classList.remove('active'); bgIdx=(bgIdx+1)%bgs.length; bgs[bgIdx].classList.add('active'); },5000); }

    /* FASILITAS REVEAL */
    const fasObs=new IntersectionObserver(entries=>{entries.forEach(e=>{if(e.isIntersecting){e.target.classList.add('visible');fasObs.unobserve(e.target);}});},{threshold:0.1});
    document.querySelectorAll('.fasilitas-item').forEach(el=>fasObs.observe(el));

    /* BACK TO TOP */
    const bttBtn=document.getElementById('backToTop');
    window.addEventListener('scroll',()=>bttBtn.classList.toggle('show',window.pageYOffset>window.innerHeight/2));
    function scrollToTop(){window.scrollTo({top:0,behavior:'smooth'});}

    /* GALERI */
    const fotoDB = {!! json_encode($galleryFromDb ?? []) !!};
    const semuaFoto = fotoDB.map(f => ({ url: `/storage/${f.foto}`, judul: f.judul || 'Kegiatan Sekolah', sub: f.deskripsi || 'Aktivitas Siswa' }));
    const fotoFinal = semuaFoto.slice(0, 18);
    let galIdx = 0;
    let galTotalPages = Math.max(1, Math.ceil(fotoFinal.length / 6));

    function renderGaleriKeHTML() {
      const track = document.getElementById('galeriTrack');
      let html = '';
      for (let i = 0; i < fotoFinal.length; i += 6) {
        const chunk = fotoFinal.slice(i, i + 6);
        html += `<div class="galeri-slide"><div class="galeri-grid">${chunk.map(f=>`<div class="galeri-card"><img src="${f.url}" alt="${f.judul}"><div class="galeri-overlay"><div class="overlay-text"><h3>${f.judul}</h3><p>${f.sub}</p></div></div></div>`).join('')}</div></div>`;
      }
      if(!html) html = '<div class="galeri-slide"><div style="padding:40px;text-align:center;color:#aaa;width:100%">Belum ada foto galeri.</div></div>';
      track.innerHTML = html;
    }

    function buildGaleriDots() {
      const c = document.getElementById('galeriDots'); if(!c) return;
      c.innerHTML = '';
      for (let i = 0; i < galTotalPages; i++) {
        const d = document.createElement('div'); d.className = 'gd-dot' + (i === galIdx ? ' active' : '');
        d.onclick = () => { galIdx = i; applyGaleri(); buildGaleriDots(); }; c.appendChild(d);
      }
    }

    function applyGaleri() { document.getElementById('galeriTrack').style.transform = `translateX(-${galIdx * 100}%)`; }
    function moveGaleri(dir) { galIdx = Math.max(0, Math.min(galTotalPages - 1, galIdx + dir)); applyGaleri(); buildGaleriDots(); }
    renderGaleriKeHTML(); buildGaleriDots();

    (function(){ const el = document.getElementById('galeriTrack'); let sx = 0;
      el.addEventListener('touchstart', e => { sx = e.touches[0].clientX; }, {passive:true});
      el.addEventListener('touchend', e => { const dx = e.changedTouches[0].clientX - sx; if (Math.abs(dx) > 40) moveGaleri(dx < 0 ? 1 : -1); }, {passive:true});
    })();

    /* TESTIMONI MODAL */
    function bukaModalTestimoni() {
      try {
        const o = document.getElementById('testiModalOverlay'), g = document.getElementById('testiModalGrid'), countText = document.getElementById('testiModalCount');
        if (!o || !g) return;
        const dataDB = (Array.isArray(suggestions) ? suggestions : []).map((s, i) => ({ nama: s.nama || 'Hamba Allah', inisial: inisialDari(s.nama || 'HA'), kelas: 'Pengunjung Website', warna: WARNA_AVATAR[i % WARNA_AVATAR.length], teks: s.pesan || '', bintang: parseInt(s.rating || 5) }));
        if (countText) countText.textContent = `${dataDB.length} cerita dari pengunjung TK Aisyiyah`;
        if (dataDB.length === 0) { g.innerHTML = '<p style="text-align:center;color:#aaa;grid-column:1/-1;padding:40px 0;">Belum ada testimoni. Jadilah yang pertama! 😊</p>'; }
        else { g.innerHTML = dataDB.slice().reverse().map((t, i) => `<div class="testi-modal-card" id="tmc${i}"><div class="testi-card-header"><div class="testi-modal-avatar" style="background:${t.warna};">${t.inisial}</div><div class="testi-card-info"><p class="testi-card-name">${escHtml(t.nama)}</p><p class="testi-card-role">${t.kelas}</p></div></div><div class="testi-stars">${'<span>★</span>'.repeat(t.bintang)}${'<span style="color:#ddd">★</span>'.repeat(5 - t.bintang)}</div><p class="testi-text">"${escHtml(t.teks)}"</p></div>`).join(''); }
        o.classList.add('active'); document.body.style.overflow = 'hidden';
        dataDB.forEach((_, i) => { setTimeout(() => { const el = document.getElementById('tmc' + i); if (el) el.classList.add('visible'); }, i * 40); });
      } catch (err) { console.error("Gagal membuka modal:", err); }
    }
    function tutupModalTestimoni(){ document.getElementById('testiModalOverlay').classList.remove('active'); document.body.style.overflow=''; }
    function tutupModalTestimoniOverlay(e){ if(e.target===document.getElementById('testiModalOverlay')) tutupModalTestimoni(); }

    /* CHATBOT */
    let isChatbotOpen=false, hasSeenWelcome=false;
    function toggleChatbot(){ isChatbotOpen=!isChatbotOpen; if(isChatbotOpen){ document.getElementById('chatbotContainer').classList.add('show'); document.getElementById('chatbotToggleIcon').textContent='✕'; document.getElementById('chatbotBadge').style.display='none'; document.getElementById('chatbotInput').focus(); hasSeenWelcome=true; }else{ document.getElementById('chatbotContainer').classList.remove('show'); document.getElementById('chatbotToggleIcon').textContent='💬'; } }
    setTimeout(()=>{ if(!hasSeenWelcome&&!isChatbotOpen) document.getElementById('chatbotBadge').style.display='flex'; },5000);
    const botResponses={'halo':'Halo! 👋 Ada yang bisa saya bantu?','ppdb':'Untuk info PPDB 2026/2027:\n📞 Hubungi sekolah\n📋 Isi form PPDB online kami!','biaya':'💰 Biaya pendidikan sangat terjangkau.\nHubungi kami untuk info lengkap!','fasilitas':'🏫 Fasilitas TK Aisyiyah:\n✅ Ruang kelas nyaman\n✅ Halaman luas\n✅ Perpustakaan\n✅ Area bermain aman','lokasi':'📍 Cek Google Maps di footer halaman ini!','terima kasih':'Sama-sama! 😊'};
    function addChatMessage(msg,isUser){ const d=document.createElement('div'); d.className=`chatbot-message ${isUser?'user':'bot'}`; const b=document.createElement('div'); b.className='chatbot-message-bubble'; b.innerHTML=msg.replace(/\n/g,'<br>'); d.appendChild(b); const msgs=document.getElementById('chatbotMessages'); msgs.insertBefore(d,document.getElementById('chatbotTyping')); msgs.scrollTop=msgs.scrollHeight; }
    function getBotResponse(msg){ const l=msg.toLowerCase(); for(let k in botResponses){ if(l.includes(k)) return botResponses[k]; } return 'Terima kasih! 😊 Untuk info lebih lanjut silakan hubungi sekolah kami.'; }
    function sendChatMessage(){ const m=document.getElementById('chatbotInput').value.trim(); if(!m) return; addChatMessage(m,true); document.getElementById('chatbotInput').value=''; const t=document.getElementById('chatbotTyping'); t.style.display='block'; document.getElementById('chatbotMessages').scrollTop=9999; setTimeout(()=>{ t.style.display='none'; addChatMessage(getBotResponse(m),false); },600+Math.random()*600); }
    function sendQuickReply(t){ document.getElementById('chatbotInput').value=t; sendChatMessage(); }
    document.getElementById('chatbotInput').addEventListener('keypress',e=>{ if(e.key==='Enter') sendChatMessage(); });

    /* FORM MASUKAN */
    let selectedBintang = 5;
    function bukaFormMasukan(){ document.getElementById('chatbotFormMasukan').classList.add('show'); document.getElementById('chatbotInput').disabled = true; document.querySelector('.chatbot-send').disabled = true; updateBintangUI(5); selectedBintang = 5; document.getElementById('masukanNama').focus(); }
    function bukaChatbotMasukan(){ if(!isChatbotOpen){ toggleChatbot(); } setTimeout(bukaFormMasukan, 450); }
    function tutupFormMasukan(){ document.getElementById('chatbotFormMasukan').classList.remove('show'); document.getElementById('chatbotInput').disabled = false; document.querySelector('.chatbot-send').disabled = false; document.getElementById('masukanNama').value = ''; document.getElementById('masukanTeks').value = ''; selectedBintang = 5; updateBintangUI(5); }
    document.querySelectorAll('#masukanStars span').forEach(el => {
      el.addEventListener('click', () => { selectedBintang = parseInt(el.dataset.v); updateBintangUI(selectedBintang); });
      el.addEventListener('mouseover', () => { updateBintangUI(parseInt(el.dataset.v)); });
      el.addEventListener('mouseleave', () => { updateBintangUI(selectedBintang); });
    });
    function updateBintangUI(val) { document.querySelectorAll('#masukanStars span').forEach(el => { el.classList.toggle('lit', parseInt(el.dataset.v) <= val); }); }
    updateBintangUI(5);
    function kirimMasukan() {
      const nama = document.getElementById('masukanNama').value.trim();
      const pesan = document.getElementById('masukanTeks').value.trim();
      const rating = selectedBintang;
      if(!nama){ alert("Nama harus diisi"); return; }
      if(pesan.length < 10){ alert("Masukan minimal 10 karakter"); return; }
      fetch("/suggestion", { method: "POST", headers: { "Content-Type": "application/json", "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content') }, body: JSON.stringify({ nama, pesan, rating }) })
      .then(res => res.json()).then(data => { if(data.success){ tutupFormMasukan(); showToast("Masukan berhasil dikirim! Terima kasih 🙏"); setTimeout(() => location.reload(), 1500); } })
      .catch(err => { console.error(err); alert("Terjadi kesalahan, coba lagi."); });
    }
    function showToast(msg){ const t=document.getElementById('toastNotif'); t.textContent=msg; t.classList.add('show'); setTimeout(()=>t.classList.remove('show'),3800); }
  </script>
</body>
</html>