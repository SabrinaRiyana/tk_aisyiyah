<!DOCTYPE html>
<html lang="id">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes" />
  <meta charset="utf-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Profil Sekolah – TK Aisyiyah Mimika</title>
  <style>
    *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
    html, body { overflow-x: hidden; width: 100%; font-family: "Aeonik TRIAL-Regular", Helvetica, Arial, sans-serif; scroll-behavior: smooth; background: #fff; color: #222; font-size: 16px; }
    .navbar { position: fixed; top: 20px; left: 50%; transform: translateX(-50%); width: 94%; max-width: 1620px; display: flex; align-items: center; justify-content: space-between; padding: 8px 12px 8px 16px; border-radius: 100px; backdrop-filter: blur(30px) saturate(105%); -webkit-backdrop-filter: blur(30px) saturate(105%); box-shadow: inset 0 1px 0 rgba(255,255,255,.3), 0 8px 32px rgba(20,130,50,.25); background: linear-gradient(102deg, #1fb149 0%, #1fb149 100%); z-index: 1000; }
    .nav-logo { display: flex; align-items: center; gap: 10px; flex-shrink: 0; }
    .logo-wrapper { width: 46px; height: 46px; background: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
    .logo-img { width: 36px; height: 36px; object-fit: contain; }
    .nav-brand { font-size: clamp(.85rem, 1.5vw, 1.18rem); font-weight: 600; color: #fff; white-space: nowrap; }
    .nav-right { display: flex; align-items: center; gap: 6px; flex-shrink: 0; }
    .nav-item { padding: 8px 12px; font-size: clamp(.8rem, 1.2vw, 1rem); color: #fff; cursor: pointer; white-space: nowrap; transition: color .25s; }
    .nav-item:hover { color: rgba(255,255,255,.75); }
    .nav-dropdown { position: relative; display: flex; align-items: center; gap: 6px; cursor: pointer; padding: 8px 12px; flex-shrink: 0; }
    .nav-dropdown > span { color: #fff; font-size: clamp(.8rem, 1.2vw, 1rem); }
    .nav-dd-arrow { font-size: .6rem; color: #fff; transition: transform .25s; }
    .nav-dropdown.open .nav-dd-arrow { transform: rotate(180deg); }
    .nav-dd-menu { position: absolute; top: calc(100% + 10px); left: 0; background-color: rgba(20,150,60,0.97); border-radius: 15px; padding: 10px 0; min-width: 200px; opacity: 0; visibility: hidden; transform: translateY(-10px); transition: all .3s; z-index: 1001; box-shadow: 0 4px 20px rgba(0,0,0,.25); border: 1px solid rgba(255,255,255,.2); }
    .nav-dd-menu.show { opacity: 1; visibility: visible; transform: translateY(0); }
    .nav-dd-item { padding: 11px 18px; color: #fff; cursor: pointer; font-size: clamp(.82rem, 1.1vw, 1rem); transition: background .2s; }
    .nav-dd-item:hover { background: rgba(255,255,255,.15); }
    .btn-admin { padding: 8px 16px; border: 1.5px solid rgba(255,255,255,.8); border-radius: 100px; background: rgba(255,255,255,.15); color: #fff; font-size: clamp(.78rem, 1.1vw, 1rem); cursor: pointer; transition: all .25s; white-space: nowrap; }
    .btn-admin:hover { background: rgba(255,255,255,.25); }
    .btn-ppdb { padding: 8px 18px; border: none; border-radius: 100px; background: #fff; color: #1fb149; font-size: clamp(.78rem, 1.1vw, 1rem); font-weight: 700; cursor: pointer; transition: all .25s; white-space: nowrap; }
    .btn-ppdb:hover { transform: translateY(-2px); box-shadow: 0 4px 14px rgba(0,0,0,.2); }
    .nav-hamburger { display: none; flex-direction: column; gap: 5px; cursor: pointer; padding: 8px; flex-shrink: 0; }
    .nav-hamburger span { display: block; width: 24px; height: 2.5px; background: #fff; border-radius: 2px; transition: all .3s; }
    .nav-hamburger.open span:nth-child(1) { transform: translateY(7.5px) rotate(45deg); }
    .nav-hamburger.open span:nth-child(2) { opacity: 0; }
    .nav-hamburger.open span:nth-child(3) { transform: translateY(-7.5px) rotate(-45deg); }
    .nav-mobile-menu { display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(20,150,60,0.98); z-index: 999; flex-direction: column; align-items: center; justify-content: center; gap: 24px; }
    .nav-mobile-menu.open { display: flex; }
    .nav-mobile-item { color: #fff; font-size: 1.4rem; font-weight: 600; cursor: pointer; padding: 10px 24px; border-radius: 12px; transition: background .2s; }
    .nav-mobile-item:hover { background: rgba(255,255,255,.15); }
    .nav-mobile-sub { display: flex; flex-direction: column; align-items: center; gap: 10px; }
    .nav-mobile-sub-title { color: rgba(255,255,255,.7); font-size: 1rem; text-transform: uppercase; letter-spacing: 1px; }
    .nav-mobile-sub-item { color: #fff; font-size: 1.15rem; cursor: pointer; padding: 8px 20px; border-radius: 10px; transition: background .2s; }
    .nav-mobile-sub-item:hover { background: rgba(255,255,255,.15); }
    .nav-mobile-btns { display: flex; gap: 12px; flex-wrap: wrap; justify-content: center; margin-top: 10px; }
    .nav-mobile-close { position: absolute; top: 24px; right: 24px; font-size: 2rem; color: #fff; cursor: pointer; background: none; border: none; }
    .page-wrapper { padding-top: 90px; }
    .section-hero-profil { position: relative; width: 100%; height: clamp(220px, 40vw, 380px); overflow: hidden; }
    .hero-bg { width: 100%; height: 100%; object-fit: cover; object-position: center 30%; filter: brightness(.5); }
    .hero-overlay { position: absolute; inset: 0; background: linear-gradient(to right, rgba(10,100,40,.75) 0%, rgba(10,100,40,.2) 60%, transparent 100%); display: flex; flex-direction: column; align-items: flex-start; justify-content: center; padding: 0 clamp(20px, 6vw, 80px); }
    .hero-breadcrumb { display: flex; align-items: center; gap: 6px; font-size: clamp(.72rem, 1.5vw, .85rem); color: rgba(255,255,255,.7); margin-bottom: clamp(10px, 2vw, 18px); }
    .hero-breadcrumb .hbc-link { cursor: pointer; transition: color .2s; }
    .hero-breadcrumb .hbc-link:hover { color: #3dff6e; }
    .hero-breadcrumb .hbc-sep { color: rgba(255,255,255,.4); }
    .hero-breadcrumb .hbc-active { color: #fff; font-weight: 600; }
    .hero-title { font-family: "Coolvetica-Regular","Arial Black",sans-serif; font-size: clamp(1.8rem, 6vw, 4rem); font-weight: 900; color: #fff; line-height: 1.15; }
    .hero-title em { font-style: normal; color: #5dff8a; }
    .hero-bar { width: clamp(40px, 8vw, 72px); height: 5px; background: #2ed463; border-radius: 4px; margin-top: clamp(12px, 2.5vw, 20px); }
    .section-visimisi { background: #fff; padding: 0; }
    .vm-header { background: linear-gradient(102deg, #178c3a 0%, #1fb149 50%, #20b84d 100%); padding: clamp(18px, 3vw, 36px) clamp(20px, 6vw, 80px); display: flex; align-items: center; justify-content: space-between; gap: 20px; flex-wrap: wrap; }
    .vm-breadcrumb { font-size: clamp(.82rem, 1.5vw, 1.2rem); color: rgba(255,255,255,.85); }
    .vm-header-title { font-family: "Coolvetica-Regular","Arial Black",sans-serif; font-size: clamp(1.4rem, 3.5vw, 3rem); font-weight: 900; color: #fff; }
    .vm-body { display: grid; grid-template-columns: 1fr 1.8fr; background: #f4fbf4; align-items: stretch; }
    .vm-visi-col { background: #fff; padding: clamp(28px, 5vw, 60px) clamp(20px, 4.5vw, 56px); display: flex; flex-direction: column; justify-content: center; align-items: flex-start; border-right: 2px solid #e0f4e0; }
    .vm-visi-label { font-family: "Coolvetica-Regular","Arial Black",sans-serif; font-size: clamp(1.3rem, 2.5vw, 2.2rem); font-weight: 900; color: #1fb149; margin-bottom: clamp(10px, 1.5vw, 18px); }
    .vm-visi-text { font-size: clamp(1rem, 1.6vw, 1.3rem); line-height: 1.85; color: #444; border-left: 4px solid #2ed463; padding-left: clamp(12px, 2vw, 20px); font-style: italic; }
    .vm-misi-col { background: #f4fbf4; padding: clamp(28px, 5vw, 60px) clamp(20px, 4.5vw, 56px); display: flex; flex-direction: column; justify-content: center; }
    .vm-misi-header { margin-bottom: clamp(16px, 2.5vw, 28px); }
    .vm-misi-header-label { font-family: "Coolvetica-Regular","Arial Black",sans-serif; font-size: clamp(1.3rem, 2.5vw, 2.2rem); font-weight: 900; color: #1fb149; margin-bottom: 6px; }
    .vm-misi-header-sub { font-size: clamp(1rem, 1.5vw, 1.2rem); color: #777; }
    .vm-misi-grid { display: grid; gap: 20px; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); }
    .vm-misi-card { background: #1fb149; border-radius: 14px; padding: clamp(16px, 2.5vw, 24px) clamp(14px, 2vw, 22px); transition: transform .25s, box-shadow .25s; position: relative; overflow: hidden; display: flex; flex-direction: column; }
    .vm-misi-card::before { content: ''; position: absolute; top: -20px; right: -20px; width: 80px; height: 80px; border-radius: 50%; background: rgba(255,255,255,.08); }
    .vm-misi-card:hover { transform: translateY(-5px); box-shadow: 0 12px 32px rgba(20,130,50,.35); }
    .vm-misi-card-tag { font-size: clamp(.68rem, 1vw, .78rem); font-weight: 800; color: rgba(255,255,255,.7); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px; }
    .vm-misi-card-text { font-size: clamp(1rem, 1.5vw, 1.2rem); line-height: 1.65; color: #fff; font-weight: 500; }

    /* =====================================================
       SECTION SYARAT PENDAFTARAN — redesigned premium
       ===================================================== */
    .section-syarat {
      background: linear-gradient(160deg, #f0faf3 0%, #e8f8ed 50%, #f4fbf4 100%);
      padding: clamp(40px, 6vw, 72px) 0;
      position: relative; overflow: hidden;
    }
    /* Decorative SVG leaf shapes */
    .syarat-leaf {
      position: absolute; pointer-events: none; z-index: 0;
    }
    .syarat-leaf-1 { top: -20px; left: -70px; width: clamp(180px,20vw,280px); opacity: .55; transform: rotate(-25deg); }
    .syarat-leaf-2 { top: 0; right: -55px; width: clamp(130px,14vw,210px); opacity: .45; transform: rotate(18deg); }
    .syarat-leaf-3 { bottom: -30px; right: 18%; width: clamp(90px,9vw,140px); opacity: .35; transform: rotate(-8deg); }
    .syarat-leaf-4 { bottom: 20px; left: -30px; width: clamp(100px,10vw,160px); opacity: .30; transform: rotate(35deg); }
    .syarat-inner { max-width: 1300px; margin: 0 auto; padding: 0 clamp(16px, 5vw, 60px); position: relative; z-index: 1; }

    /* Label atas */
    .syarat-section-label {
      display: inline-flex; align-items: center; gap: 8px;
      background: #1fb149; color: #fff;
      font-size: clamp(.7rem, 1vw, .78rem); font-weight: 700;
      letter-spacing: 1.2px; text-transform: uppercase;
      padding: 5px 16px; border-radius: 100px;
      margin-bottom: 14px;
      box-shadow: 0 4px 14px rgba(31,177,73,.3);
    }
    .syarat-section-label::before { content: ''; width: 6px; height: 6px; border-radius: 50%; background: #b6ffd0; flex-shrink: 0; }

    /* Judul besar */
    .syarat-section-title {
      font-family: "Coolvetica-Regular","Arial Black",sans-serif;
      font-size: clamp(1.6rem, 4vw, 3rem); font-weight: 900; color: #0e7230;
      margin-bottom: clamp(28px, 4vw, 48px); line-height: 1.15;
    }
    .syarat-section-title em { font-style: normal; color: #1fb149; }

    /* Grid tiga kartu */
    .syarat-body {
      display: grid;
      grid-template-columns: 1fr 1.15fr 1.65fr;
      gap: clamp(16px, 2.5vw, 28px);
      align-items: start;
      margin-bottom: clamp(24px, 3.5vw, 40px);
    }
    .syarat-card {
      background: #fff;
      border-radius: 24px;
      padding: clamp(24px, 3.5vw, 40px) clamp(20px, 3vw, 34px);
      display: flex; flex-direction: column; gap: 18px;
      box-shadow: 0 4px 24px rgba(20,130,50,.09), 0 1px 4px rgba(0,0,0,.05);
      border: 1.5px solid rgba(31,177,73,.12);
      transition: transform .3s, box-shadow .3s;
      position: relative; overflow: hidden;
    }
    .syarat-card::before {
      content: ''; position: absolute; top: 0; left: 0; right: 0; height: 4px;
      background: linear-gradient(90deg, #1fb149, #2ed463);
      border-radius: 24px 24px 0 0;
    }
    .syarat-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 16px 48px rgba(20,130,50,.16), 0 2px 8px rgba(0,0,0,.06);
    }

    /* Icon wrapper */
    .syarat-card-icon-wrap {
      width: 52px; height: 52px; border-radius: 16px;
      background: linear-gradient(135deg, #e8f8ed, #d0f4dc);
      display: flex; align-items: center; justify-content: center;
      font-size: 1.6rem; flex-shrink: 0;
      box-shadow: 0 2px 10px rgba(31,177,73,.15);
    }
    .syarat-card-label {
      font-family: "Coolvetica-Regular","Arial Black",sans-serif;
      font-size: clamp(1rem, 1.8vw, 1.4rem);
      font-weight: 900; color: #0e7230;
      letter-spacing: .3px;
    }

    /* List item */
    .syarat-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 10px; }
    .syarat-list li {
      font-size: clamp(.85rem, 1.2vw, .97rem); color: #444; line-height: 1.65;
      display: flex; align-items: flex-start; gap: 10px;
    }
    .syarat-list li::before {
      content: ''; width: 8px; height: 8px; border-radius: 50%;
      background: #1fb149; flex-shrink: 0; margin-top: 7px;
    }
    .syarat-list li em { color: #aaa; font-style: italic; font-size: .88em; }
    .syarat-tag {
      display: inline-flex; align-items: center;
      background: linear-gradient(135deg, #1fb149, #2ed463); color: #fff;
      font-size: .68rem; font-weight: 800;
      padding: 3px 10px; border-radius: 100px;
      margin-right: 6px; letter-spacing: .5px;
      white-space: nowrap; flex-shrink: 0;
      box-shadow: 0 2px 8px rgba(31,177,73,.3);
    }

    /* Biaya grid */
    .syarat-biaya-grid { display: flex; flex-direction: column; gap: 0; }
    .syarat-biaya-row {
      display: flex; justify-content: space-between; align-items: center;
      font-size: clamp(.8rem, 1.15vw, .92rem); color: #555;
      padding: 9px 12px; border-radius: 10px;
      transition: background .2s;
    }
    .syarat-biaya-row:hover { background: #f4fbf4; }
    .syarat-biaya-val {
      font-weight: 700; color: #1fb149;
      white-space: nowrap; margin-left: 12px;
      font-size: clamp(.82rem, 1.2vw, .95rem);
    }
    .syarat-biaya-group { padding-left: 26px; color: #888; font-size: clamp(.76rem, 1.05vw, .86rem); }
    .syarat-biaya-group-last { padding-left: 26px; color: #888; font-size: clamp(.76rem, 1.05vw, .86rem); }
    .syarat-biaya-divider {
      height: 1px; background: #eef7f0; margin: 4px 0;
    }

    /* Contact bar */
    .syarat-contact {
      background: linear-gradient(102deg, #0a5c24 0%, #0e7230 40%, #1fb149 100%);
      border-radius: 20px;
      padding: clamp(20px, 3vw, 32px) clamp(24px, 5vw, 52px);
      display: flex; align-items: center; gap: clamp(16px, 4vw, 48px);
      flex-wrap: wrap;
      box-shadow: 0 8px 32px rgba(14,114,48,.35), 0 2px 8px rgba(0,0,0,.1);
      position: relative; overflow: hidden;
    }
    .syarat-contact::before {
      content: ''; position: absolute; top: -40px; right: -40px;
      width: 160px; height: 160px; border-radius: 50%;
      background: rgba(255,255,255,.06); pointer-events: none;
    }
    .syarat-contact-title {
      display: flex; align-items: center; gap: 10px;
      font-size: clamp(.85rem, 1.3vw, 1rem);
      font-weight: 800; color: #fff; white-space: nowrap;
      background: rgba(255,255,255,.15);
      padding: 10px 22px; border-radius: 100px;
      border: 1.5px solid rgba(255,255,255,.28);
      backdrop-filter: blur(6px);
      box-shadow: inset 0 1px 0 rgba(255,255,255,.2);
    }
    .syarat-contact-title::before { content: '🔍'; font-size: 1rem; }
    .syarat-contact-items { display: flex; gap: clamp(16px, 4vw, 40px); flex-wrap: wrap; }
    .syarat-contact-item {
      display: flex; align-items: flex-start; gap: 12px;
      color: rgba(255,255,255,.9);
      font-size: clamp(.8rem, 1.15vw, .93rem); line-height: 1.65;
    }
    .syarat-contact-icon {
      width: 36px; height: 36px; border-radius: 10px; flex-shrink: 0;
      background: rgba(255,255,255,.15); border: 1px solid rgba(255,255,255,.2);
      display: flex; align-items: center; justify-content: center;
      font-size: 1rem; margin-top: 1px;
    }
    .syarat-contact-item strong { color: #fff; font-weight: 700; }

    /* Responsive */
    @media (max-width: 1100px) {
      .syarat-body { grid-template-columns: 1fr 1fr; }
      .syarat-card:nth-child(3) { grid-column: 1 / -1; }
    }
    @media (max-width: 640px) {
      .syarat-body { grid-template-columns: 1fr; }
      .syarat-contact { flex-direction: column; align-items: flex-start; gap: 14px; border-radius: 16px; }
      .syarat-contact-title { white-space: normal; }
    }
    /* ===================================================== */

    .section-kurikulum { background: #fff; padding: clamp(36px, 5vw, 60px) 0; }
    .kurikulum-inner { max-width: 1300px; margin: 0 auto; padding: 0 clamp(20px, 5vw, 60px); display: grid; grid-template-columns: 1fr 1fr; gap: clamp(30px, 5vw, 60px); align-items: center; }
    .kurikulum-img { border-radius: 20px; overflow: hidden; box-shadow: 0 8px 32px rgba(0,0,0,.12); }
    .kurikulum-img img { width: 100%; height: 100%; object-fit: cover; display: block; }
    .kurikulum-breadcrumb { font-size: clamp(.8rem, 1.2vw, .88rem); color: #1fb149; margin-bottom: clamp(12px, 2vw, 20px); }
    .kurikulum-breadcrumb span { color: #aaa; }
    .kurikulum-title { font-family: "Coolvetica-Regular","Arial Black",sans-serif; font-size: clamp(1.4rem, 3vw, 2.2rem); font-weight: 900; color: #1fb149; margin-bottom: clamp(12px, 2vw, 20px); }
    .kurikulum-text { font-size: clamp(1rem, 1.5vw, 1.15rem); line-height: 1.9; color: #444; }
    .section-staff { background: #f9fdf9; padding: clamp(40px, 6vw, 70px) 0; }
    .staff-inner { max-width: 1300px; margin: 0 auto; padding: 0 clamp(16px, 5vw, 60px); }
    .staff-breadcrumb { display: inline-flex; align-items: center; gap: 6px; padding: 5px 12px; background: #1fb149; border-radius: 100px; color: #fff; font-size: clamp(.72rem, 1vw, .8rem); font-weight: 600; margin-bottom: 14px; }
    .staff-head-row { display: flex; align-items: flex-end; justify-content: space-between; margin-bottom: clamp(20px, 3vw, 32px); gap: 16px; flex-wrap: wrap; }
    .staff-title { font-family: "Coolvetica-Regular","Arial Black",sans-serif; font-size: clamp(1.3rem, 3vw, 2.4rem); font-weight: 900; color: #1fb149; margin-bottom: 6px; }
    .staff-sub { font-size: clamp(.78rem, 1.1vw, .9rem); color: #888; }
    .staff-arrows { display: flex; gap: 10px; flex-shrink: 0; }
    .staff-arr-btn { width: clamp(38px, 5vw, 48px); height: clamp(38px, 5vw, 48px); background: #1fb149; border: none; border-radius: 12px; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 14px rgba(31,177,73,.35); transition: all .25s; }
    .staff-arr-btn:hover { background: #178c3a; transform: scale(1.07); }
    .staff-arr-btn::before { content: ''; width: 9px; height: 9px; border-top: 2.5px solid #fff; border-right: 2.5px solid #fff; }
    .staff-arr-btn.arr-prev::before { transform: rotate(-135deg); margin-left: 3px; }
    .staff-arr-btn.arr-next::before { transform: rotate(45deg); margin-right: 3px; }
    .staff-slider-wrap { position: relative; }
    .staff-outer { overflow: hidden; }
    .staff-track { display: flex; transition: transform .5s cubic-bezier(.25,.46,.45,.94); }
    .staff-slide { flex: 0 0 25%; padding: 0 8px; box-sizing: border-box; }
    .staff-card { border-radius: 18px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,.1); transition: transform .25s, box-shadow .25s; background: #fff; }
    .staff-card:hover { transform: translateY(-7px); box-shadow: 0 14px 36px rgba(0,0,0,.16); }
    .staff-card-img-wrap { width: 100%; aspect-ratio: 3/4; overflow: hidden; position: relative; }
    .staff-card-img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform .4s; }
    .staff-card:hover .staff-card-img { transform: scale(1.05); }
    .staff-card-overlay { position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(to top, rgba(10,100,40,.9) 0%, transparent 100%); padding: 36px 14px 14px; opacity: 0; transition: opacity .35s ease; }
    .staff-card:hover .staff-card-overlay, .staff-card.touched .staff-card-overlay { opacity: 1; }
    .staff-card-name { color: #fff; font-size: clamp(.82rem, 1.2vw, 1rem); font-weight: 700; margin-bottom: 3px; }
    .staff-card-role { color: rgba(255,255,255,.8); font-size: clamp(.72rem, 1vw, .82rem); }
    .staff-card-info { display: none; padding: 12px 14px; background: #fff; }
    .staff-card-info-name { font-size: .88rem; font-weight: 700; color: #222; }
    .staff-card-info-role { font-size: .78rem; color: #1fb149; }
    .staff-dots { display: flex; justify-content: center; gap: 8px; margin-top: 20px; flex-wrap: wrap; }
    .sd-dot { width: 8px; height: 8px; border-radius: 50%; background: #ccc; cursor: pointer; transition: all .25s; }
    .sd-dot.active { background: #1fb149; transform: scale(1.4); }
    .section-cta-profil { background: #fff; padding: clamp(40px, 6vw, 70px) clamp(20px, 5vw, 60px); text-align: center; }
    .cta-profil-title { font-family: "Coolvetica-Regular","Arial Black",sans-serif; font-size: clamp(1.5rem, 4vw, 3rem); font-weight: 900; color: #1fb149; line-height: 1.3; margin-bottom: clamp(20px, 3vw, 36px); }
    .cta-profil-btn { display: inline-block; padding: clamp(12px, 2vw, 18px) clamp(28px, 5vw, 56px); background: #1fb149; color: #fff; border: none; border-radius: 100px; font-size: clamp(.9rem, 1.5vw, 1.1rem); font-weight: 800; cursor: pointer; transition: all .3s; box-shadow: 0 8px 28px rgba(31,177,73,.35); text-decoration: none; }
    .cta-profil-btn:hover { background: #178c3a; transform: translateY(-3px); }
    @keyframes fadeUp { from{opacity:0;transform:translateY(30px);}to{opacity:1;transform:translateY(0);} }
    .fu { animation: fadeUp .65s ease both; } .fu-1 { animation-delay: .12s; } .fu-2 { animation-delay: .24s; }
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
    .form-masukan-title { font-size: .84rem; font-weight: 800; color: #00a832; }
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
    .btn-back-to-top { position: fixed; bottom: clamp(16px,3vw,30px); right: clamp(16px,3vw,30px); padding: clamp(10px,2vw,15px) clamp(18px,3vw,30px); border: none; border-radius: 100px; background: linear-gradient(102deg,#00af29,#00cc30); color: #fff; font-size: clamp(.85rem,1.5vw,1.05rem); font-weight: 500; cursor: pointer; transition: all .3s; box-shadow: 0 4px 15px rgba(0,168,50,.4); z-index: 9996; display: none; }
    .btn-back-to-top.show { display: inline-flex; align-items: center; gap: 8px; } .btn-back-to-top:hover { transform: translateY(-3px); } .btn-back-to-top::after { content: '⌃'; font-size: 1.2rem; font-weight: bold; }
    .toast-notif { position: fixed; bottom: 32px; left: 50%; transform: translateX(-50%) translateY(60px); background: linear-gradient(135deg,#00af29,#00cc30); color: white; padding: 14px 30px; border-radius: 100px; font-size: .95rem; font-weight: 700; box-shadow: 0 8px 28px rgba(0,204,48,.4); z-index: 99999; transition: transform .4s cubic-bezier(.22,1,.36,1), opacity .4s; opacity: 0; pointer-events: none; white-space: nowrap; }
    .toast-notif.show { transform: translateX(-50%) translateY(0); opacity: 1; }
    @media (max-width: 1100px) { .vm-body { grid-template-columns: 1fr; } .vm-visi-col { border-right: none; border-bottom: 2px solid #e0f4e0; } .kurikulum-inner { grid-template-columns: 1fr; } .staff-slide { flex: 0 0 33.333%; } }
    @media (max-width: 768px) { .page-wrapper { padding-top: 80px; } .nav-right { display: none; } .nav-hamburger { display: flex; } .vm-misi-grid { grid-template-columns: 1fr 1fr; } .staff-slide { flex: 0 0 50%; } .staff-card-overlay { display: none; } .staff-card-info { display: block; } }
    @media (max-width: 1000px) { .footer-top { grid-template-columns: 1fr 1fr; } }
    @media (max-width: 600px) { .footer-top { grid-template-columns: 1fr; } .footer-tagline { max-width: 100%; } .footer-bottom { flex-direction: column; align-items: flex-start; } }
    @media (max-width: 480px) { .staff-slide { flex: 0 0 100%; } .vm-misi-grid { grid-template-columns: 1fr; } .chatbot-container { right: 12px; bottom: 140px; width: calc(100vw - 24px); } .chatbot-toggle { right: 12px; } .btn-back-to-top { right: 12px; bottom: 18px; } }
    @media (max-width: 420px) { .footer-left { flex-direction: column; } }
  </style>
</head>
<body>
  <div class="nav-mobile-menu" id="mobileMenu">
    <button class="nav-mobile-close" onclick="closeMobileMenu()">✕</button>
    <div class="nav-mobile-item" onclick="goto('/')">Beranda</div>
    <div class="nav-mobile-sub">
      <div class="nav-mobile-sub-title">Profil Sekolah</div>
      <div class="nav-mobile-sub-item" onclick="goto('/profil#visi-misi')">Visi &amp; Misi</div>
      <div class="nav-mobile-sub-item" onclick="goto('/profil#syarat-pendaftaran')">Syarat Pendaftaran</div>
      <div class="nav-mobile-sub-item" onclick="goto('/profil#kurikulum')">Kurikulum</div>
      <div class="nav-mobile-sub-item" onclick="goto('/galeri')">Fasilitas</div>
      <div class="nav-mobile-sub-item" onclick="goto('/profil#staff-pengajar')">Staff Pengajar</div>
    </div>
    <div class="nav-mobile-item" onclick="goto('/galeri')">Galeri</div>
    <div class="nav-mobile-btns">
      <button class="btn-admin" onclick="window.location.href='/admin/login'">Admin Login</button>
      <button class="btn-ppdb" onclick="window.location.href='/ppdb'">PPDB 2027/2028</button>
    </div>
  </div>
  <nav class="navbar">
    <div class="nav-logo" onclick="window.location.href='/'" style="cursor:pointer">
      <div class="logo-wrapper"><img class="logo-img" src="{{ asset('assets/images/Logo TK.png') }}" alt="Logo" /></div>
      <span class="nav-brand">TK Aisyiyah Mimika</span>
    </div>
    <div class="nav-right">
      <div class="nav-item" onclick="window.location.href='/'">Beranda</div>
      <div class="nav-dropdown" id="navDd">
        <span>Profil Sekolah</span><span class="nav-dd-arrow">▾</span>
        <div class="nav-dd-menu" id="navDdMenu">
          <div class="nav-dd-item" onclick="window.location.href='/profil#visi-misi'">Visi &amp; Misi</div>
          <div class="nav-dd-item" onclick="window.location.href='/profil#syarat-pendaftaran'">Syarat Pendaftaran</div>
          <div class="nav-dd-item" onclick="window.location.href='/profil#kurikulum'">Kurikulum</div>
          <div class="nav-dd-item" onclick="window.location.href='/galeri'">Fasilitas</div>
          <div class="nav-dd-item" onclick="window.location.href='/profil#staff-pengajar'">Staff Pengajar</div>
        </div>
      </div>
      <div class="nav-item" onclick="window.location.href='/galeri'">Galeri</div>
      <button class="btn-admin" onclick="window.location.href='/admin/login'">Admin Login</button>
      <button class="btn-ppdb" onclick="window.location.href='/ppdb'">PPDB 2027/2028</button>
    </div>
    <div class="nav-hamburger" id="hamburger" onclick="toggleMobileMenu()"><span></span><span></span><span></span></div>
  </nav>
  <div class="page-wrapper">
    <section class="section-hero-profil">
      @if($banner)
        <img src="{{ asset('storage/' . $banner->image) }}" class="hero-bg" alt="Hero Profil">
      @endif
      <div class="hero-overlay">
        <div class="hero-breadcrumb">
          <span class="hbc-link" onclick="window.location.href='/'">Beranda</span>
          <span class="hbc-sep">›</span>
          <span class="hbc-active">Profil Sekolah</span>
        </div>
        <h1 class="hero-title fu"><em>Profil</em><br>TK Aisyiyah Mimika</h1>
        <div class="hero-bar fu fu-1"></div>
      </div>
    </section>

    <section class="section-visimisi" id="visi-misi">
      <div class="vm-header">
        <div class="vm-breadcrumb">Profil Sekolah &nbsp;›&nbsp; Visi &amp; Misi</div>
        <h2 class="vm-header-title">VISI DAN MISI KAMI</h2>
      </div>
      <div class="vm-body">
        <div class="vm-visi-col fu">
          <div class="vm-visi-label">VISI</div>
          <p class="vm-visi-text">{{ $profile->visi ?? 'Visi belum diisi.' }}</p>
          <div class="vm-visi-label" style="margin-top: clamp(20px,3vw,36px);">TUJUAN</div>
          <p class="vm-visi-text">{{ $profile->tujuan ?? 'Tujuan belum diisi.' }}</p>
        </div>
        <div class="vm-misi-col fu fu-2">
          <div class="vm-misi-header">
            <div class="vm-misi-header-label">MISI</div>
            <p class="vm-misi-header-sub">Langkah kami dalam mewujudkan visi bersama</p>
          </div>
          <div class="vm-misi-grid" style="display:grid!important;grid-template-columns:repeat(2,1fr)!important;gap:20px;">
            @if($profile && isset($profile->misi) && is_array($profile->misi))
              @foreach(array_slice($profile->misi, 0, 4) as $index => $m)
                <div class="vm-misi-card">
                  <div class="vm-misi-card-tag">MISI {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                  <p class="vm-misi-card-text">{{ $m['item'] }}</p>
                </div>
              @endforeach
            @else
              <p>Data misi belum tersedia.</p>
            @endif
          </div>
        </div>
      </div>
    </section>

    {{-- ===== SYARAT PENDAFTARAN ===== --}}
    <section class="section-syarat" id="syarat-pendaftaran">
      {{-- Decorative leaf shapes --}}
      <svg class="syarat-leaf syarat-leaf-1" viewBox="0 0 200 120" xmlns="http://www.w3.org/2000/svg">
        <path d="M10,60 Q50,-20 190,10 Q160,110 10,60 Z" fill="#1fb149"/>
      </svg>
      <svg class="syarat-leaf syarat-leaf-2" viewBox="0 0 200 120" xmlns="http://www.w3.org/2000/svg">
        <path d="M190,60 Q150,-20 10,10 Q40,110 190,60 Z" fill="#178c3a"/>
      </svg>
      <svg class="syarat-leaf syarat-leaf-3" viewBox="0 0 200 120" xmlns="http://www.w3.org/2000/svg">
        <path d="M10,60 Q50,-20 190,10 Q160,110 10,60 Z" fill="#2ed463"/>
      </svg>
      <svg class="syarat-leaf syarat-leaf-4" viewBox="0 0 200 120" xmlns="http://www.w3.org/2000/svg">
        <path d="M190,60 Q150,-20 10,10 Q40,110 190,60 Z" fill="#0e7230"/>
      </svg>

      <div class="syarat-inner">
        <div class="syarat-section-label">Profil Sekolah &nbsp;›&nbsp; Syarat Pendaftaran</div>
        <h2 class="syarat-section-title">SYARAT <em>PENDAFTARAN</em></h2>

        <div class="syarat-body">

          {{-- USIA --}}
          <div class="syarat-card">
            <div class="syarat-card-icon-wrap">🎂</div>
            <div class="syarat-card-label">USIA</div>
            <ul class="syarat-list">
              <li><span class="syarat-tag">TK A</span> 4–5 Tahun per 1 Juli 2026</li>
              <li><span class="syarat-tag">TK B</span> 5–6 Tahun per 1 Juli 2026</li>
            </ul>
          </div>

          {{-- DOKUMEN --}}
          <div class="syarat-card">
            <div class="syarat-card-icon-wrap">📄</div>
            <div class="syarat-card-label">DOKUMEN</div>
            <ul class="syarat-list">
              <li>Fotocopy Akta Kelahiran (2 lembar)</li>
              <li>Fotocopy Kartu Keluarga (2 lembar)</li>
              <li>Pas Foto ukuran 3×4 (2 lembar)</li>
              <li>Fotocopy Buku Pink / Buku Menimbang bagian Imunisasi (2 lembar) <em>— jika ada</em></li>
            </ul>
          </div>

          {{-- BIAYA --}}
          <div class="syarat-card">
            <div class="syarat-card-icon-wrap">💰</div>
            <div class="syarat-card-label">BIAYA ADMINISTRASI</div>
            <div class="syarat-biaya-grid">
              <div class="syarat-biaya-row"><span>Formulir Pendaftaran</span><span class="syarat-biaya-val">Rp 50.000</span></div>
              <div class="syarat-biaya-divider"></div>
              <div class="syarat-biaya-row syarat-biaya-group"><span>Infak Gedung – Tahap 1</span><span class="syarat-biaya-val">Rp 1.250.000</span></div>
              <div class="syarat-biaya-row syarat-biaya-group-last"><span>Infak Gedung – Tahap 2</span><span class="syarat-biaya-val">Rp 1.500.000</span></div>
              <div class="syarat-biaya-divider"></div>
              <div class="syarat-biaya-row"><span>Seragam Sekolah</span><span class="syarat-biaya-val">Rp 750.000</span></div>
              <div class="syarat-biaya-row"><span>Buku dan ATS</span><span class="syarat-biaya-val">Rp 450.000</span></div>
              <div class="syarat-biaya-row"><span>Rapot</span><span class="syarat-biaya-val">Rp 150.000</span></div>
              <div class="syarat-biaya-row"><span>Kegiatan Semester</span><span class="syarat-biaya-val">Rp 400.000</span></div>
              <div class="syarat-biaya-row"><span>SPP dan Komite</span><span class="syarat-biaya-val">Rp 250.000</span></div>
            </div>
          </div>

        </div>

        {{-- INFORMASI LANJUT --}}
        <div class="syarat-contact">
          <div class="syarat-contact-title">INFORMASI LEBIH LANJUT</div>
          <div class="syarat-contact-items">
            <div class="syarat-contact-item">
              <div class="syarat-contact-icon">📞</div>
              <div>+62 813 54172964 <strong>(Umi Lia)</strong><br>+62 812 64679202 <strong>(Umi Marwa)</strong></div>
            </div>
            <div class="syarat-contact-item">
              <div class="syarat-contact-icon">📍</div>
              <div>Jl. Bhayangkara Jalur 5,<br>Koperapoka, Mimika Baru</div>
            </div>
          </div>
        </div>
      </div>
    </section>
    {{-- ===== END SYARAT PENDAFTARAN ===== --}}

    <section class="section-kurikulum" id="kurikulum">
      <div class="kurikulum-inner">
        @if($curriculum)
          <div class="kurikulum-img">
            <img src="{{ asset('storage/' . $curriculum->image) }}" alt="{{ $curriculum->title }}" />
          </div>
          <div class="kurikulum-content">
            <div class="kurikulum-breadcrumb">Profil Sekolah &nbsp;›&nbsp; <span>Kurikulum</span></div>
            <div class="kurikulum-title">{{ $curriculum->title }}</div>
            <div class="kurikulum-text">{!! $curriculum->description !!}</div>
          </div>
        @else
          <div class="kurikulum-content"><p>Data kurikulum belum tersedia.</p></div>
        @endif
      </div>
    </section>
    <section class="section-staff" id="staff-pengajar">
      <div class="staff-inner">
        <div class="staff-breadcrumb"><span>Profil Sekolah</span><span> › </span><span>Staff Pengajar</span></div>
        <div class="staff-head-row">
          <div>
            <h2 class="staff-title">Mentor, Inspirator, dan Sahabat Belajar</h2>
            <p class="staff-sub">Staff Pengajar / Tenaga Kependidikan</p>
          </div>
          <div class="staff-arrows">
            <button class="staff-arr-btn arr-prev" onclick="moveStaff(-1)"></button>
            <button class="staff-arr-btn arr-next" onclick="moveStaff(1)"></button>
          </div>
        </div>
        <div class="staff-slider-wrap">
          <div class="staff-outer" id="staffOuter">
            <div class="staff-track" id="staffTrack">
              @foreach($teachers as $teacher)
              <div class="staff-slide">
                <div class="staff-card">
                  <div class="staff-card-img-wrap">
                    <img src="{{ Storage::url($teacher->foto) }}" alt="{{ $teacher->nama }}" class="staff-card-img" />
                    <div class="staff-card-overlay">
                      <div class="staff-card-name">{{ $teacher->nama }}</div>
                      <div class="staff-card-role">{{ $teacher->jabatan }}</div>
                    </div>
                  </div>
                  <div class="staff-card-info">
                    <div class="staff-card-info-name">{{ $teacher->nama }}</div>
                    <div class="staff-card-info-role">{{ $teacher->jabatan }}</div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          <div class="staff-dots" id="staffDots"></div>
        </div>
      </div>
    </section>
    <section class="section-cta-profil">
      <h2 class="cta-profil-title">Mulai Petualangan Si Kecil bersama kami!<br>Daftar Sekarang !</h2>
      <a href="/ppdb" class="cta-profil-btn">PPDB 2027/2028</a>
    </section>
    <footer class="footer">
      <div class="footer-top">
        <div class="footer-brand">
          <div class="footer-logo-row">
            <div class="footer-logo-circle"><img src="{{ asset('assets/images/Logo TK.png') }}" alt="Logo TK Aisyiyah" /></div>
            <div class="footer-school-name">TK Aisyiyah<br>Mimika</div>
          </div>
          <p class="footer-tagline">Tempat aman dan nyaman untuk belajar sambil bermain bagi anak usia dini di Mimika, Papua Tengah.</p>
          <div class="footer-socials">
            <a class="footer-social-btn" href="#" target="_blank" rel="noopener" title="Instagram">📸</a>
            <a class="footer-social-btn" href="#" target="_blank" rel="noopener" title="Facebook">📘</a>
            <a class="footer-social-btn" href="https://api.whatsapp.com/send/?phone=6281354172964&text=Halo%2C+saya+ingin+mendaftar+di+sekolah+TK+Aisyiyah+Mimika.&type=phone_number&app_absent=0&utm_source=chatgpt.com{{ preg_replace('/\D/','',schoolInfo('telepon')) }}" target="_blank" rel="noopener" title="WhatsApp">💬</a>
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
            <div class="footer-contact-item"><div class="footer-contact-icon">📧</div><div class="footer-contact-text">{{ schoolInfo('email') }}</div></div>
            <div class="footer-contact-item"><div class="footer-contact-icon">📱</div><div class="footer-contact-text">{{ schoolInfo('instagram') }}</div></div>
            <div class="footer-contact-item"><div class="footer-contact-icon">📞</div><div class="footer-contact-text">{{ schoolInfo('telepon') }}</div></div>
            <div class="footer-contact-item"><div class="footer-contact-icon">📍</div><div class="footer-contact-text">{{ schoolInfo('alamat') }}</div></div>
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
  </div>
  <button class="btn-back-to-top" id="backToTop" onclick="scrollToTop()">Back To The Top</button>
  <div class="toast-notif" id="toastNotif"></div>
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
      <div class="chatbot-message bot"><div class="chatbot-message-bubble">Halo! 👋 Selamat datang di TK Aisyiyah Mimika. Saya siap membantu Anda! 😊</div></div>
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
    function toggleMobileMenu(){const m=document.getElementById('mobileMenu'),h=document.getElementById('hamburger');m.classList.toggle('open');h.classList.toggle('open');document.body.style.overflow=m.classList.contains('open')?'hidden':'';}
    function closeMobileMenu(){document.getElementById('mobileMenu').classList.remove('open');document.getElementById('hamburger').classList.remove('open');document.body.style.overflow='';}
    function goto(url){closeMobileMenu();window.location.href=url;}
    document.addEventListener('keydown',e=>{if(e.key==='Escape')closeMobileMenu();});
    const navDd=document.getElementById('navDd'),navDdMenu=document.getElementById('navDdMenu');
    if(navDd){navDd.addEventListener('click',e=>{e.stopPropagation();navDd.classList.toggle('open');navDdMenu.classList.toggle('show');});document.addEventListener('click',()=>{navDd.classList.remove('open');navDdMenu.classList.remove('show');});}
    const io=new IntersectionObserver(entries=>{entries.forEach(e=>{if(e.isIntersecting){e.target.style.animationPlayState='running';io.unobserve(e.target);}});},{threshold:0.1});
    document.querySelectorAll('.fu').forEach(el=>{el.style.animationPlayState='paused';io.observe(el);});
    let staffTotal={{ count($teachers) }},staffIdx=0;
    function staffPV(){return window.innerWidth<=480?1:window.innerWidth<=768?2:window.innerWidth<=1100?3:4;}
    function buildStaffDots(){const pv=staffPV();const total=Math.max(1,staffTotal-pv+1);const c=document.getElementById('staffDots');c.innerHTML='';for(let i=0;i<total;i++){const d=document.createElement('div');d.className='sd-dot'+(i===staffIdx?' active':'');d.onclick=()=>{staffIdx=i;applyStaff();buildStaffDots();};c.appendChild(d);}}
    function applyStaff(){document.getElementById('staffTrack').style.transform=`translateX(-${staffIdx*(100/staffPV())}%)`;}
    function moveStaff(dir){const max=Math.max(0,staffTotal-staffPV());staffIdx=Math.max(0,Math.min(max,staffIdx+dir));applyStaff();buildStaffDots();}
    window.addEventListener('resize',()=>{staffIdx=0;applyStaff();buildStaffDots();});
    let txStart=0;
    document.getElementById('staffOuter').addEventListener('touchstart',e=>{txStart=e.touches[0].clientX;},{passive:true});
    document.getElementById('staffOuter').addEventListener('touchend',e=>{const diff=txStart-e.changedTouches[0].clientX;if(Math.abs(diff)>40)moveStaff(diff>0?1:-1);});
    document.querySelectorAll('.staff-card').forEach(card=>{card.addEventListener('touchstart',()=>{document.querySelectorAll('.staff-card.touched').forEach(c=>c.classList.remove('touched'));card.classList.add('touched');},{passive:true});});
    document.addEventListener('touchstart',e=>{if(!e.target.closest('.staff-card'))document.querySelectorAll('.staff-card.touched').forEach(c=>c.classList.remove('touched'));},{passive:true});
    window.addEventListener('scroll',()=>document.getElementById('backToTop').classList.toggle('show',window.pageYOffset>window.innerHeight/2));
    function scrollToTop(){window.scrollTo({top:0,behavior:'smooth'});}
    let isChatbotOpen=false,hasSeenWelcome=false;
    const chatbotContainer=document.getElementById('chatbotContainer'),chatbotMessages=document.getElementById('chatbotMessages'),chatbotInput=document.getElementById('chatbotInput'),chatbotTyping=document.getElementById('chatbotTyping'),chatbotBadge=document.getElementById('chatbotBadge'),chatbotToggleIcon=document.getElementById('chatbotToggleIcon');
    function toggleChatbot(){isChatbotOpen=!isChatbotOpen;if(isChatbotOpen){chatbotContainer.classList.add('show');chatbotToggleIcon.textContent='✕';chatbotBadge.style.display='none';chatbotInput.focus();hasSeenWelcome=true;}else{chatbotContainer.classList.remove('show');chatbotToggleIcon.textContent='💬';}}
    setTimeout(()=>{if(!hasSeenWelcome&&!isChatbotOpen)chatbotBadge.style.display='flex';},5000);
    const botResponses={'halo':'Halo! 👋 Ada yang bisa saya bantu?\n\nKlik "📝 Beri Masukan" untuk berbagi pengalaman!','ppdb':'Untuk info PPDB 2027/2028:\n📞 Hubungi sekolah\n📋 Isi form PPDB online kami!','biaya':'💰 Biaya pendidikan sangat terjangkau.\nHubungi kami untuk info lengkap!','fasilitas':'🏫 Fasilitas TK Aisyiyah:\n✅ Ruang kelas nyaman\n✅ Halaman luas\n✅ Perpustakaan\n✅ Area bermain aman','lokasi':'📍 Cek Google Maps di footer halaman ini!','terima kasih':'Sama-sama! 😊'};
    function addChatMessage(msg,isUser){const d=document.createElement('div');d.className=`chatbot-message ${isUser?'user':'bot'}`;const b=document.createElement('div');b.className='chatbot-message-bubble';b.innerHTML=msg.replace(/\n/g,'<br>');d.appendChild(b);chatbotMessages.insertBefore(d,chatbotTyping);chatbotMessages.scrollTop=chatbotMessages.scrollHeight;}
    function getBotResponse(msg){const l=msg.toLowerCase();for(let k in botResponses){if(l.includes(k))return botResponses[k];}return 'Terima kasih! 😊 Untuk info lebih lanjut hubungi sekolah kami.';}
    function sendChatMessage(){const m=chatbotInput.value.trim();if(!m)return;addChatMessage(m,true);chatbotInput.value='';chatbotTyping.style.display='block';chatbotMessages.scrollTop=9999;setTimeout(()=>{chatbotTyping.style.display='none';addChatMessage(getBotResponse(m),false);},600+Math.random()*600);}
    function sendQuickReply(t){chatbotInput.value=t;sendChatMessage();}
    chatbotInput.addEventListener('keypress',e=>{if(e.key==='Enter')sendChatMessage();});
    let selectedBintang=5;
    function bukaFormMasukan(){document.getElementById('chatbotFormMasukan').classList.add('show');chatbotInput.disabled=true;document.querySelector('.chatbot-send').disabled=true;updateBintangUI(5);selectedBintang=5;document.getElementById('masukanNama').focus();}
    function tutupFormMasukan(){document.getElementById('chatbotFormMasukan').classList.remove('show');chatbotInput.disabled=false;document.querySelector('.chatbot-send').disabled=false;document.getElementById('masukanNama').value='';document.getElementById('masukanTeks').value='';selectedBintang=5;updateBintangUI(5);}
    document.querySelectorAll('#masukanStars span').forEach(el=>{el.addEventListener('click',()=>{selectedBintang=parseInt(el.dataset.v);updateBintangUI(selectedBintang);});el.addEventListener('mouseover',()=>{updateBintangUI(parseInt(el.dataset.v));});el.addEventListener('mouseleave',()=>{updateBintangUI(selectedBintang);});});
    function updateBintangUI(val){document.querySelectorAll('#masukanStars span').forEach(el=>{el.classList.toggle('lit',parseInt(el.dataset.v)<=val);});}
    updateBintangUI(5);
    function kirimMasukan(){const nama=document.getElementById('masukanNama').value.trim();const pesan=document.getElementById('masukanTeks').value.trim();const rating=selectedBintang;if(!nama){alert("Nama harus diisi");return;}if(pesan.length<10){alert("Masukan minimal 10 karakter");return;}fetch("/suggestion",{method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute('content')},body:JSON.stringify({nama,pesan,rating})}).then(res=>res.json()).then(data=>{if(data.success){tutupFormMasukan();showToast("Masukan berhasil dikirim!");location.reload();}}).catch(err=>{console.error(err);alert("Terjadi kesalahan");});}
    function showToast(msg){const t=document.getElementById('toastNotif');t.textContent=msg;t.classList.add('show');setTimeout(()=>t.classList.remove('show'),3800);}
    buildStaffDots();
  </script>
</body>
</html>