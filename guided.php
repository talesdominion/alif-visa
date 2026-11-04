

/* ===== Alif guided application form (4 Nov 2026, v4). Old form stays underneath; add ?classic=1 to see it. ===== */
function alif_gx_css() {
    return <<<'GXCSS'
/* Alif application form v4: iVisa-style layout on top of #alif-apply-wizard */
#main .gx-on > [data-wizard-step],#main .gx-on > .avx-steps,.gx-on > [data-wizard-step]{display:none!important}
.iv-page #main .avf{grid-template-columns:minmax(0,1fr)!important}
.iv-page #main .avf__help{display:none!important}
.iv{--ink:#0f2a22;--text:#33443d;--muted:#6b7a74;--line:#e3e9e6;--field:#d5ddd9;--brand:#0b6b4a;--btn:#12a26b;--btn-dk:#0d8a5a;--soft:#eef8f3;--err:#c23a2b;
  font-family:"Plus Jakarta Sans",ui-sans-serif,system-ui,-apple-system,"Segoe UI",Roboto,sans-serif;color:var(--text);font-size:16px;line-height:1.5;text-align:left}
.iv *{box-sizing:border-box}
.iv button,.iv input,.iv select{font-family:inherit;letter-spacing:normal;text-transform:none}
.iv :focus-visible{outline:3px solid #1fce7c!important;outline-offset:2px}
.iv svg{flex:0 0 auto}
/* progress line */
.iv-prog{display:flex;align-items:center;gap:18px;margin:0 0 26px}
.iv-ps{display:flex;align-items:center;gap:10px;flex:0 0 auto;font-weight:700;font-size:17px;color:var(--ink)}
.iv-ps i{font-style:normal;width:30px;height:30px;border-radius:50%;display:grid;place-items:center;font-size:14px;font-weight:700;border:1.5px solid var(--ink);color:var(--ink);background:#fff}
.iv-ps i svg{width:15px;height:15px}
.iv-ps.on i{background:var(--ink);color:#fff}
.iv-ps.done i{background:var(--btn);border-color:var(--btn);color:#fff}
.iv-ps:not(.on):not(.done){color:var(--muted)}
.iv-ps:not(.on):not(.done) i{border-color:#b9c5c0;color:var(--muted)}
.iv-pl{flex:1;height:3px;border-radius:3px;background:#d7e0dc;position:relative;overflow:hidden;min-width:20px}
.iv-pl b{position:absolute;inset:0 auto 0 0;background:var(--btn);border-radius:3px;transition:width .4s ease}
.iv-cols{display:grid;grid-template-columns:320px minmax(0,1fr);gap:26px;align-items:start}
/* summary */
.iv-sum{background:#fff;border:1px solid var(--line);border-radius:22px;overflow:hidden;position:sticky;top:100px}
.iv-sum-top{position:relative;height:90px;background:linear-gradient(135deg,#0d4a34 0%,#0b6b4a 55%,#18a46d 100%)}
.iv-sum-top::after{content:"";position:absolute;inset:0;background:radial-gradient(circle at 85% 20%,rgba(255,255,255,.25),transparent 40%),repeating-linear-gradient(115deg,rgba(255,255,255,.05) 0 14px,transparent 14px 28px)}
.iv-sum-flag{position:absolute;left:22px;bottom:-22px;z-index:1;width:52px;height:52px;border-radius:14px;background:#fff;box-shadow:0 8px 20px -10px rgba(0,0,0,.35);display:grid;place-items:center}
.iv-sum-flag .gx-flag{width:32px;height:22px;border-radius:3px;object-fit:cover}
.iv-sum-body{padding:32px 22px 22px}
.iv-sum-body h3{margin:0!important;color:var(--ink)!important;font-size:19px!important;font-weight:800!important;line-height:1.3!important;text-transform:none}
.iv-sub{margin:3px 0 0!important;color:var(--muted)!important;font-size:14px!important}
.iv-row{display:flex;gap:12px;align-items:center;padding:14px 0;border-top:1px solid var(--line);margin-top:14px}
.iv-row + .iv-row{margin-top:0}
.iv-row svg{width:20px;height:20px;color:var(--brand)}
.iv-row span{display:flex;flex-direction:column;font-size:13.5px;color:var(--muted);min-width:0}
.iv-row b{color:var(--ink);font-size:15px;font-weight:700;overflow-wrap:anywhere}
.iv-help-box{display:block;margin-top:4px;padding:14px;border-radius:14px;background:var(--soft);font-size:14px;color:var(--text)!important;text-decoration:none!important}
.iv-help-box b{display:block;color:var(--ink)}
/* card */
.iv-card{background:#fff;border:1px solid var(--line);border-radius:22px;padding:clamp(22px,4vw,44px);box-shadow:0 30px 60px -48px rgba(15,42,34,.4);min-width:0}
.iv-card h2{margin:0!important;color:var(--ink)!important;font-size:clamp(26px,3vw,32px)!important;font-weight:800!important;letter-spacing:-.02em!important;line-height:1.2!important;border:0!important;padding:0!important;outline:none;text-transform:none}
.iv-lede{margin:10px 0 0!important;color:var(--text)!important;font-size:16.5px!important}
.iv-fields{display:flex;flex-direction:column;gap:24px;margin-top:28px}
.iv-two{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:18px}
.iv-three{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:12px}
.iv-f{display:flex;flex-direction:column;gap:8px;min-width:0;margin:0!important}
.iv-f > label,.iv-lbl{font-weight:600!important;font-size:16px!important;color:var(--ink)!important;margin:0!important;line-height:1.35!important}
.iv-opt{font-weight:500;color:var(--muted)}
.iv-help{margin:0!important;font-size:14px!important;color:var(--muted)!important;line-height:1.45!important}
.iv .iv-in{width:100%!important;height:56px!important;min-height:56px!important;border:1.5px solid var(--field)!important;border-radius:14px!important;background:#fff!important;padding:0 18px!important;font-size:17px!important;font-weight:500!important;color:var(--ink)!important;box-shadow:none!important;margin:0!important;line-height:normal!important}
.iv .iv-in::placeholder{color:#a6b2ad!important;opacity:1}
.iv .iv-in:focus{outline:none!important;border-color:var(--brand)!important;box-shadow:0 0 0 4px var(--soft)!important}
.iv .iv-sel{appearance:none;-webkit-appearance:none;background:#fff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='9' viewBox='0 0 14 9'%3E%3Cpath d='M1.5 1.5 7 7l5.5-5.5' fill='none' stroke='%230f2a22' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E") no-repeat right 18px center!important;padding-right:44px!important;cursor:pointer}
.iv .iv-sel.ph{color:#a6b2ad!important}
.iv .iv-sel option{color:var(--ink)}
.iv .iv-date{cursor:pointer}
.iv .iv-date::-webkit-calendar-picker-indicator{cursor:pointer;opacity:.7}
.iv-bad .iv-in,.iv-bad .iv-r{border-color:var(--err)!important}
.gx-err{margin:0!important;font-size:14px!important;font-weight:600!important;color:var(--err)!important;display:flex;gap:6px;align-items:flex-start}
.gx-err svg{width:16px;height:16px;margin-top:2px}
/* radio boxes */
.iv-rb{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:12px}
.iv-rb.iv-c3{grid-template-columns:repeat(3,minmax(0,1fr))}
.iv .iv-r{display:flex!important;align-items:center;gap:14px;min-height:60px!important;height:auto!important;padding:12px 18px!important;border:1.5px solid var(--field)!important;border-radius:14px!important;background:#fff!important;cursor:pointer;font-weight:500!important;font-size:16.5px!important;color:var(--ink)!important;text-align:left;margin:0!important;box-shadow:none!important;line-height:1.3!important;transition:border-color .15s}
.iv .iv-r:hover{border-color:#9fb1a9!important}
.iv-r i{flex:0 0 auto;width:24px;height:24px;border-radius:50%;border:2px solid #7d8b85;background:#fff;display:grid;place-items:center}
.iv-r i::after{content:"";width:10px;height:10px;border-radius:50%;background:#fff;transform:scale(0);transition:transform .12s}
.iv .iv-r.on{border-color:var(--ink)!important;font-weight:700!important}
.iv-r.on i{background:var(--ink);border-color:var(--ink)}
.iv-r.on i::after{transform:scale(1)}
.iv-r small{display:block;font-size:13.5px;font-weight:500;color:var(--muted)}
.iv-chk{display:flex;gap:14px;align-items:flex-start;font-size:15.5px;color:var(--text);cursor:pointer;margin:0!important;line-height:1.5}
.iv-chk input{width:22px!important;height:22px!important;flex:0 0 auto;margin:1px 0 0!important;accent-color:var(--ink)}
.iv-chk a{color:var(--ink)!important;font-weight:700;text-decoration:underline}
.iv-chk.iv-bad{color:var(--err)}
.iv-phone{display:grid;grid-template-columns:150px minmax(0,1fr);gap:12px}
.iv-note{display:flex;gap:12px;padding:14px 16px;border-radius:14px;font-size:15px;line-height:1.5}
.iv-note svg{width:20px;height:20px;margin-top:1px}
.iv-note.info{background:var(--soft);color:var(--text)}.iv-note.info svg{color:var(--brand)}
.iv-note.warn{background:#fffaeb;border:1px solid #fedf89;color:#7a4d00}.iv-note.warn svg{color:#b54708}
.iv-or{display:flex;align-items:center;gap:16px;color:var(--muted);font-size:14.5px}
.iv-or::before,.iv-or::after{content:"";flex:1;height:1px;background:var(--line)}
.gx-slot:empty,.gx-slot:empty + .iv-or{display:none}
.iv-trav{display:flex;align-items:center;gap:14px;padding:16px 18px;border:1.5px solid var(--line);border-radius:14px}
.iv-av{width:42px;height:42px;border-radius:50%;background:var(--ink);color:#fff;display:grid;place-items:center;font-weight:700;flex:0 0 auto}
.iv-trav b{display:block;color:var(--ink);font-size:16.5px}
.iv-trav small{color:var(--muted)}
/* review */
.iv-rv{border:1.5px solid var(--line);border-radius:16px;overflow:hidden}
.iv-rvh{display:flex;justify-content:space-between;align-items:center;padding:12px 18px;border-bottom:1px solid var(--line);background:#fafcfb}
.iv-rvh b{color:var(--ink);font-size:16.5px}
.iv .iv-link{background:none!important;border:0!important;color:var(--brand)!important;font-weight:700!important;font-size:15px!important;cursor:pointer;padding:4px!important;margin:0!important;min-height:0!important;height:auto!important;box-shadow:none!important}
.iv-rv dl{margin:0!important;padding:10px 18px 14px;display:grid;grid-template-columns:minmax(130px,38%) minmax(0,1fr);row-gap:8px;column-gap:12px}
.iv-rv dt{color:var(--muted);margin:0!important;font-weight:500}
.iv-rv dd{margin:0!important;color:var(--ink);font-weight:600;overflow-wrap:anywhere}
.iv-miss{color:var(--err);font-weight:700}
.iv-total{display:flex;justify-content:space-between;align-items:center;gap:12px;padding:16px 18px;border-radius:16px;background:var(--ink);color:#fff}
.iv-total span{opacity:.85}.iv-total b{font-size:17px}
/* footer */
.iv-foot{display:flex;justify-content:flex-end;align-items:center;gap:20px;margin-top:34px}
.iv .iv-back{background:none!important;border:0!important;color:var(--ink)!important;font-weight:600!important;font-size:16px!important;margin:0 auto 0 0!important;padding:8px 0!important;cursor:pointer;box-shadow:none!important;min-height:0!important;height:auto!important}
.iv .iv-go{display:inline-flex!important;align-items:center;justify-content:center;height:58px!important;min-height:58px!important;padding:0 40px!important;border:0!important;border-radius:16px!important;background:var(--btn)!important;color:#fff!important;font-weight:700!important;font-size:18px!important;cursor:pointer;margin:0!important;box-shadow:none!important;transition:background .15s}
.iv .iv-go:hover{background:var(--btn-dk)!important}
.iv .iv-go[disabled]{opacity:.65;cursor:wait}
/* country / code picker */
.gx-cs{position:relative}
.gx-cs:has(.gx-panel){z-index:20}
.iv .gx-csb{display:flex!important;align-items:center;gap:12px;text-align:left;cursor:pointer}
.gx-csb .iv-ph{color:#a6b2ad}
.gx-csb .gx-chev{margin-left:auto;width:16px;height:16px;color:var(--ink)}
.gx-flag{width:26px;height:18px;border-radius:3px;object-fit:cover;display:block;flex:0 0 auto;box-shadow:0 0 0 1px rgba(15,42,34,.08)}
.gx-code{display:inline-grid;place-items:center;min-width:30px;height:22px;padding:0 5px;border-radius:6px;background:var(--soft);color:var(--brand);font-size:11.5px;font-weight:800;flex:0 0 auto}
.gx-panel{position:absolute;z-index:40;left:0;right:0;top:calc(100% + 6px);background:#fff;border:1px solid var(--field);border-radius:14px;box-shadow:0 20px 50px -20px rgba(15,42,34,.45);padding:8px}
.gx-panel.narrow{right:auto;width:min(340px,calc(100vw - 64px))}
.iv .gx-search{width:100%!important;height:48px!important;border:1.5px solid var(--field)!important;border-radius:10px!important;padding:0 12px!important;font-size:16px!important;background:#fff!important;margin:0!important;box-shadow:none!important}
.iv .gx-search:focus{outline:none!important;border-color:var(--brand)!important}
.gx-list{max-height:290px;overflow:auto;margin-top:6px;overscroll-behavior:contain}
.gx-grp{margin:8px 8px 4px!important;font-size:11.5px!important;font-weight:700!important;letter-spacing:.08em;text-transform:uppercase;color:var(--muted)!important}
.iv .gx-o{display:flex!important;align-items:center;gap:10px;width:100%;padding:10px 8px!important;border:0!important;border-radius:8px!important;background:none!important;cursor:pointer;text-align:left;font-size:15px!important;font-weight:500!important;margin:0!important;box-shadow:none!important;color:var(--ink)!important;min-height:0!important;height:auto!important}
.iv .gx-o:hover,.iv .gx-o.on{background:var(--soft)!important}
.gx-o span{flex:1;min-width:0;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.gx-o em{font-style:normal;color:var(--muted);font-weight:600}
.gx-empty{padding:12px 8px;color:var(--muted);font-size:14px;margin:0!important}
@media (max-width:980px){
  .iv-cols{grid-template-columns:minmax(0,1fr)}
  .iv-sum{position:static;border-radius:16px}
  .iv-sum-top,.iv-row:not(.keep),.iv-help-box{display:none}
  .iv-sum-body{padding:14px 18px}
  .iv-row.keep{border:0;margin:8px 0 0;padding:0}
}
@media (max-width:640px){
  .iv-ps span{display:none}.iv-ps.on span{display:inline;font-size:15px}.iv-prog{gap:10px}
  .iv-two{grid-template-columns:minmax(0,1fr)}
  .iv-rb,.iv-rb.iv-c3{grid-template-columns:repeat(2,minmax(0,1fr));gap:10px}
  .iv .iv-r{padding:10px 14px!important;gap:10px;font-size:15.5px!important;min-height:54px!important}
  .iv-three{gap:8px}
  .iv .iv-sel{padding:0 30px 0 12px!important;background-position:right 10px center!important;font-size:16px!important}
  .iv-phone{grid-template-columns:120px minmax(0,1fr)}
  .iv-foot{flex-direction:column-reverse;align-items:stretch;gap:10px}
  .iv .iv-back{margin:0!important;text-align:center}
  .iv .iv-go{width:100%}
  .iv-rv dl{grid-template-columns:minmax(0,1fr);row-gap:0}.iv-rv dd{margin-bottom:8px!important}
}
@media (prefers-reduced-motion:no-preference){.iv-card{animation:ivIn .25s ease}}
@keyframes ivIn{from{opacity:.4;transform:translateY(6px)}to{opacity:1;transform:none}}

GXCSS;
}
function alif_gx_js() {
    return <<<'GXJS'
(function () {
  "use strict";
  var form = document.getElementById("alif-apply-wizard");
  if (!form || /[?&]classic=1\b/.test(location.search)) return;
  var DIAL = window.ALIF_GX_DIAL || {};
  var LOGGED_IN = !!window.ALIF_GX_LOGGED_IN;
  var CFG = window.AlifVisa || {};
  function dec(s) { var t = document.createElement("textarea"); t.innerHTML = s; return t.value; }
  var COUNTRIES = (window.ALIF_GX_COUNTRIES && window.ALIF_GX_COUNTRIES.length) ? window.ALIF_GX_COUNTRIES : (CFG.countries || []).map(function (c) { return [c.code, dec(c.name)]; });
  if (window.ALIF_GX_FLAGS) CFG = { flagBase: window.ALIF_GX_FLAGS };
  if (!COUNTRIES.length) return;
  var NAME = {}; COUNTRIES.forEach(function (c) { NAME[c[0]] = c[1]; });
  var POP_FROM = ["PK", "IN", "BD", "NG", "PH", "AE", "SA", "GB"];
  var POP_TO = ["GB", "US", "CA", "AU", "FR", "DE", "IT", "ES", "AE", "TR", "SA", "MY"];
  var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
  var NOW = new Date(), YEAR = NOW.getFullYear(), TODAY = new Date(YEAR, NOW.getMonth(), NOW.getDate());
  var STAGES = ["Your trip", "Traveller details", "Review & pay"];

  var I = {
    plane: '<path d="M2.5 13.5 21 6l-2 3.5-6.5 3L9 20l-2-1 1.3-5.6L3.5 15z"/>',
    family: '<circle cx="8" cy="7" r="3"/><circle cx="17" cy="9" r="2.4"/><path d="M2.5 20c.6-3.4 2.8-5.5 5.5-5.5s4.9 2.1 5.5 5.5M14 20c.3-2.5 1.6-4 3.5-4s3.2 1.5 3.5 4"/>',
    "case": '<rect x="3" y="7" width="18" height="13" rx="2.5"/><path d="M8.5 7V5.5A1.5 1.5 0 0 1 10 4h4a1.5 1.5 0 0 1 1.5 1.5V7M3 12.5h18"/>',
    transit: '<path d="M4 8h13l-3-3M20 16H7l3 3"/>',
    mail: '<rect x="3" y="5" width="18" height="14" rx="2.5"/><path d="m4 7 8 6 8-6"/>',
    dots: '<circle cx="6" cy="12" r="1.6"/><circle cx="12" cy="12" r="1.6"/><circle cx="18" cy="12" r="1.6"/>',
    hotel: '<path d="M4 20V5.5A1.5 1.5 0 0 1 5.5 4h9A1.5 1.5 0 0 1 16 5.5V20M16 10h2.5A1.5 1.5 0 0 1 20 11.5V20M3 20h18M8 8h1M11 8h1M8 12h1M11 12h1M9 20v-3h2v3"/>',
    home: '<path d="M3.5 11 12 4l8.5 7M5.5 9.5V20h13V9.5M10 20v-5h4v5"/>',
    key: '<circle cx="8" cy="15" r="4"/><path d="m11 12 9-9M17 6l2.5 2.5M14.5 8.5 16.5 10.5"/>',
    clock: '<circle cx="12" cy="12" r="8.5"/><path d="M12 7.5V12l3 2"/>',
    passport: '<rect x="5" y="3" width="14" height="18" rx="2"/><circle cx="12" cy="10" r="3"/><path d="M9 16.5h6"/>',
    pin: '<path d="M12 21s-6.5-5.6-6.5-11a6.5 6.5 0 0 1 13 0c0 5.4-6.5 11-6.5 11z"/><circle cx="12" cy="10" r="2.3"/>',
    bank: '<path d="M3 9.5 12 4l9 5.5M5 10v7M9.5 10v7M14.5 10v7M19 10v7M3.5 20h17"/>',
    lock: '<rect x="5" y="10.5" width="14" height="10" rx="2"/><path d="M8.5 10.5V8a3.5 3.5 0 0 1 7 0v2.5"/>',
    shield: '<path d="M12 3 4.5 6v6c0 4.4 3.2 7.8 7.5 9 4.3-1.2 7.5-4.6 7.5-9V6z"/><path d="m9 12 2.2 2.2L15.5 10"/>',
    save: '<path d="M5 4h11l3 3v13H5z"/><path d="M8 4v5h7V4M8 20v-6h8v6"/>',
    info: '<circle cx="12" cy="12" r="9"/><path d="M12 11v5M12 8h.01"/>',
    warn: '<path d="M12 4 2.5 20h19z"/><path d="M12 10v4.5M12 17.5h.01"/>',
    arrowR: '<path d="M5 12h14M13 6l6 6-6 6"/>',
    arrowL: '<path d="M19 12H5M11 6l-6 6 6 6"/>',
    chev: '<path d="m6 9 6 6 6-6"/>',
    work: '<rect x="3" y="7" width="18" height="12" rx="2"/><path d="M9 7V5h6v2"/>',
    self: '<path d="M4 20V9l8-5 8 5v11"/><path d="M9 20v-6h6v6"/>',
    study: '<path d="M2.5 9 12 4.5 21.5 9 12 13.5z"/><path d="M6.5 11v4.5c1.5 1.5 3.4 2.2 5.5 2.2s4-.7 5.5-2.2V11"/>',
    retire: '<circle cx="12" cy="7" r="3"/><path d="M6 21v-3.5A5.5 5.5 0 0 1 11.5 12h1a5.5 5.5 0 0 1 5.5 5.5V21"/>',
    pause: '<circle cx="12" cy="12" r="9"/><path d="M10 9v6M14 9v6"/>',
    chat: '<path d="M20 12a8 8 0 0 1-11.6 7.1L4 20l1-4A8 8 0 1 1 20 12z"/>',
    user: '<circle cx="12" cy="8" r="3.5"/><path d="M5 20c.8-3.6 3.6-6 7-6s6.2 2.4 7 6"/>',
    cal: '<rect x="3.5" y="5" width="17" height="15.5" rx="3"/><path d="M8 3v4M16 3v4M3.5 10h17"/>',
    check: '<path d="m5 12.5 4.5 4.5L19 7.5"/>',
    left: '<path d="m15 6-6 6 6 6"/>', right: '<path d="m9 6 6 6-6 6"/>',
    moon: '<path d="M20 14.5A8 8 0 0 1 9.5 4a8 8 0 1 0 10.5 10.5z"/>'
  };
  function ic(n, cls) { return '<svg class="' + (cls || "") + '" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' + (I[n] || "") + "</svg>"; }
  function esc(s) { return String(s == null ? "" : s).replace(/[&<>"]/g, function (c) { return { "&": "&amp;", "<": "&lt;", ">": "&gt;", '"': "&quot;" }[c]; }); }
  function flag(c) { return CFG.flagBase ? '<img class="gx-flag" src="' + esc(CFG.flagBase + String(c).toLowerCase() + ".svg") + '" alt="" width="24" height="17">' : '<span class="gx-code">' + esc(c) + "</span>"; }

  var PURPOSES = [
    { v: "tourism", t: "Visit & Tourism", d: "Holidays, sightseeing and short trips", icon: "plane" },
    { v: "family-visit", t: "Family & friends", d: "Visiting or staying with people you know", icon: "family" },
    { v: "business", t: "Business", d: "Meetings, conferences or trade fairs", icon: "case" },
    { v: "transit", t: "Transit", d: "Passing through to another country", icon: "transit" },
    { v: "visa-invitation", t: "Invitation letter", d: "You need an invitation for your visa file", icon: "mail" },
    { v: "other", t: "Something else", d: "Tell us more and an adviser will check", icon: "dots" }
  ];
  var STAYS = [
    { v: "Hotel", t: "Hotel", d: "Booked or planning to book", icon: "hotel" },
    { v: "Staying with family or friends", t: "With family or friends", d: "Your host's address will be needed", icon: "home" },
    { v: "Rented apartment", t: "Rented flat or holiday home", d: "For example Airbnb", icon: "key" },
    { v: "Not booked yet", t: "Not booked yet", d: "That's fine, you can confirm later", icon: "clock" }
  ];
  var JOBS = [
    { v: "employed", t: "Employed", d: "Salaried job", icon: "work" },
    { v: "business", t: "Self-employed", d: "Business owner or freelancer", icon: "self" },
    { v: "student", t: "Student", d: "School, college or university", icon: "study" },
    { v: "retired", t: "Retired", d: "Receiving a pension", icon: "retire" },
    { v: "unemployed", t: "Not working", d: "Homemaker or between jobs", icon: "pause" }
  ];
  var BALANCES = ["Under $2,000", "$2,000 – $5,999", "$6,000 – $14,999", "$15,000 or more"];
  var BAL_SHORT = ["Under $2k", "$2k – $6k", "$6k – $15k", "$15k +"];

  /* ---------- real form bridge ---------- */
  function els(n) { return form.querySelectorAll('[name="' + n + '"]'); }
  function rget(n) {
    var l = els(n); if (!l.length) return "";
    if (l[0].type === "radio") { for (var i = 0; i < l.length; i++) if (l[i].checked) return l[i].value; return ""; }
    if (l[0].type === "checkbox") return l[0].checked ? l[0].value : "";
    return l[0].value || "";
  }
  var writing = false;
  function fire(el) { el.dispatchEvent(new Event("input", { bubbles: true })); el.dispatchEvent(new Event("change", { bubbles: true })); }
  function rset(n, v) {
    var l = els(n); if (!l.length) return;
    writing = true;
    try {
      if (l[0].type === "radio") { l.forEach(function (r) { r.checked = (r.value === v); }); var c = [].filter.call(l, function (r) { return r.checked; })[0] || l[0]; fire(c); }
      else if (l[0].type === "checkbox") { l[0].checked = !!v; fire(l[0]); }
      else if (l[0].value !== String(v == null ? "" : v)) { l[0].value = v == null ? "" : v; fire(l[0]); }
    } finally { writing = false; }
  }
  function setCode(iso) {
    var s = form.querySelector('select[name="phone_code"]'); if (!s) return;
    var o = s.querySelector('option[data-iso="' + iso + '"]');
    if (!o) { var dial = DIAL[iso]; o = [].filter.call(s.options, function (x) { return x.value === dial; })[0]; }
    if (o) { writing = true; o.selected = true; fire(s); writing = false; }
  }
  function getCode() { var s = form.querySelector('select[name="phone_code"]'); var o = s && s.selectedOptions && s.selectedOptions[0]; return o && o.value ? (o.getAttribute("data-iso") || "") : ""; }
  function ymd(o) { return o && o.y && o.m && o.d ? o.y + "-" + ("0" + o.m).slice(-2) + "-" + ("0" + o.d).slice(-2) : ""; }
  function parseYmd(v) { var m = /^(\d{4})-(\d{2})-(\d{2})$/.exec(v || ""); return m ? { y: m[1], m: String(+m[2]), d: String(+m[3]) } : {}; }

  var NOTE_KEYS = { "Country of residence": "res", "State or province": "region", "Flights booked": "flights", "WhatsApp contact": "wa", "Trip paid by": "sponsor", "Refused a visa before": "refused", "Refusal details": "refused_where", "Passport issued": "pp_issue_txt", "Trip details": "purpose_other" };
  function parseNotes(t) {
    var out = {}, rest = [];
    String(t || "").split(/\n/).forEach(function (line) {
      var m = /^([^:]{3,40}):\s*(.*)$/.exec(line.trim());
      if (m && NOTE_KEYS[m[1]]) out[NOTE_KEYS[m[1]]] = m[2]; else if (line.trim()) rest.push(line);
    });
    out._rest = rest.join("\n"); return out;
  }

  var S = { step: 0, errs: {}, warn: "" };
  function pull() {
    S.to = rget("to"); S.from = rget("from") || rget("main_nationality"); S.purpose = rget("purpose");
    S.arrive = parseYmd(rget("travel_date")); S.leave = parseYmd(rget("return_date")); S.stay = rget("accommodation");
    S.first = rget("main_first_name"); S.last = rget("main_last_name"); S.dob = parseYmd(rget("main_dob"));
    S.gender = rget("gender"); S.marital = rget("marital_status"); S.email = rget("email"); S.phone = rget("phone"); S.code = getCode();
    S.addr = rget("address"); S.city = rget("city"); S.zip = rget("postal_code");
    S.pp_no = rget("main_passport"); S.pp_exp = parseYmd(rget("main_passport_expiry"));
    S.emp = rget("employment_status"); S.bal = rget("bank_balance"); S.stmt = rget("bank_statement"); S.prop = rget("property_owner");
    S.crim = rget("criminal_record"); S.travelled = rget("travelled_abroad"); S.travelled_where = rget("countries_visited");
    var n = parseNotes(rget("trip_notes"));
    var MAP = { flights: { "Yes": "yes", "Not yet": "no" }, wa: { "Yes": "yes", "No": "no" }, sponsor: { "Sponsor": "yes", "Applicant": "no" }, refused: { "Yes": "yes", "No": "no" } };
    ["res", "region", "flights", "wa", "sponsor", "refused", "refused_where", "purpose_other"].forEach(function (k) { if (n[k] != null && S[k] == null) S[k] = MAP[k] ? (MAP[k][n[k]] || "") : n[k]; });
    S._rest = n._rest || "";
    if (S.res && NAME[S.res] == null) { var hit = COUNTRIES.filter(function (c) { return c[1] === S.res; })[0]; S.res = hit ? hit[0] : ""; }
  }
  function notes() {
    var L = [];
    if (S.res) L.push("Country of residence: " + (NAME[S.res] || S.res));
    if (S.region) L.push("State or province: " + S.region);
    if (S.flights) L.push("Flights booked: " + (S.flights === "yes" ? "Yes" : "Not yet"));
    if (S.wa) L.push("WhatsApp contact: " + (S.wa === "yes" ? "Yes" : "No"));
    if (S.sponsor) L.push("Trip paid by: " + (S.sponsor === "yes" ? "Sponsor" : "Applicant"));
    if (S.refused) L.push("Refused a visa before: " + (S.refused === "yes" ? "Yes" : "No"));
    if (S.refused === "yes" && S.refused_where) L.push("Refusal details: " + S.refused_where);
    if (S.purpose === "other" && S.purpose_other) L.push("Trip details: " + S.purpose_other);
    var pi = fmt("pp_issue"); if (pi) L.push("Passport issued: " + pi);
    if (S._rest) L.push(S._rest);
    return L.join("\n");
  }
  function push() {
    if (S.from) { rset("from", S.from); rset("main_nationality", S.from); }
    if (S.to) rset("to", S.to);
    if (S.purpose) rset("purpose", S.purpose);
    rset("travel_date", ymd(S.arrive)); rset("return_date", ymd(S.leave)); if (S.stay) rset("accommodation", S.stay);
    rset("main_first_name", S.first || ""); rset("main_last_name", S.last || ""); rset("main_dob", ymd(S.dob));
    if (S.gender) rset("gender", S.gender); if (S.marital) rset("marital_status", S.marital);
    rset("email", S.email || ""); rset("phone", (S.phone || "").replace(/[\s-]/g, "").replace(/^0+/, "")); if (S.code) setCode(S.code);
    rset("address", S.addr || ""); rset("city", S.city || ""); rset("postal_code", S.zip || "");
    rset("main_passport", S.pp_no || ""); rset("main_passport_expiry", ymd(S.pp_exp));
    if (S.emp) rset("employment_status", S.emp); if (S.bal) rset("bank_balance", S.bal);
    if (S.stmt) rset("bank_statement", S.stmt); if (S.prop) rset("property_owner", S.prop); if (S.crim) rset("criminal_record", S.crim);
    if (S.travelled) rset("travelled_abroad", S.travelled); rset("countries_visited", S.travelled === "Yes" ? (S.travelled_where || "") : "");
    rset("trip_notes", notes());
    var vt = form.querySelector('[name="visa_type"]');
    document.querySelectorAll("[data-avr-to]").forEach(function (e) { if (S.to && NAME[S.to]) e.textContent = NAME[S.to]; });
    document.querySelectorAll("[data-avr-from]").forEach(function (e) { if (S.from && NAME[S.from]) e.textContent = NAME[S.from]; });
    var h = document.querySelector(".avx-hero h1"); if (h && S.to && NAME[S.to]) h.textContent = "Apply for your " + NAME[S.to] + " visa";
    var rf = document.querySelector(".avx-route .alif-flag img"); if (rf && S.from) rf.src = (CFG.flagBase || "") + S.from.toLowerCase() + ".svg";
    return vt;
  }

  function dateOf(k) { var v = S[k]; if (!v || !v.y || !v.m || !v.d) return null; var d = new Date(+v.y, +v.m - 1, +v.d); return d.getDate() == +v.d ? d : "bad"; }
  function fmt(k) { var d = dateOf(k); return d && d !== "bad" ? d.toLocaleDateString("en-GB", { day: "numeric", month: "short", year: "numeric" }) : ""; }
  function label(list, v) { var o = list.filter(function (x) { return x.v === v; })[0]; return o ? o.t : (v || ""); }

  /* ---------- small builders (iVisa-style layout) ---------- */
  function err(k) { return S.errs[k] ? '<p class="gx-err" id="gx-' + k + '-err">' + ic("warn") + esc(S.errs[k]) + "</p>" : ""; }
  function bad(k) { return S.errs[k] ? " iv-bad" : ""; }
  function note(type, t) { return '<div class="iv-note ' + type + '">' + ic(type === "warn" ? "warn" : "info") + "<span>" + t + "</span></div>"; }
  function pad(n) { return ("0" + n).slice(-2); }
  function text(k, lbl, o) {
    o = o || {};
    return '<div class="iv-f' + bad(k) + '"><label for="gx-' + k + '">' + lbl + (o.opt ? ' <span class="iv-opt">(optional)</span>' : "") + "</label>" +
      '<input class="iv-in" id="gx-' + k + '" data-k="' + k + '" type="' + (o.type || "text") + '" value="' + esc(S[k] || "") + '" placeholder="' + esc(o.ph || "") + '"' + (o.auto ? ' autocomplete="' + o.auto + '"' : "") + (o.mode ? ' inputmode="' + o.mode + '"' : "") + (o.upper ? ' data-upper="1" autocapitalize="characters"' : "") + ">" +
      (o.help ? '<p class="iv-help">' + o.help + "</p>" : "") + err(k) + "</div>";
  }
  function select(k, lbl, list, ph, help) {
    return '<div class="iv-f' + bad(k) + '"><label for="gx-' + k + '">' + lbl + '</label><select class="iv-in iv-sel' + (S[k] ? "" : " ph") + '" id="gx-' + k + '" data-k="' + k + '"><option value="">' + ph + "</option>" +
      list.map(function (o) { var v = o.v || o, t = o.t || o; return '<option value="' + esc(v) + '"' + (S[k] === v ? " selected" : "") + ">" + esc(t) + "</option>"; }).join("") + "</select>" + (help ? '<p class="iv-help">' + help + "</p>" : "") + err(k) + "</div>";
  }
  function radios(k, lbl, list, cls, help) {
    return '<div class="iv-f' + bad(k) + '"><span class="iv-lbl" id="gx-' + k + '-lbl">' + lbl + "</span>" + (help ? '<p class="iv-help">' + help + "</p>" : "") +
      '<div class="iv-rb ' + (cls || "") + '" role="radiogroup" aria-labelledby="gx-' + k + '-lbl" id="gx-' + k + '">' +
      list.map(function (o) { var on = S[k] === o.v; return '<button type="button" class="iv-r' + (on ? " on" : "") + '" role="radio" aria-checked="' + on + '" data-pick="' + k + '" data-v="' + esc(o.v) + '"><i></i><span>' + esc(o.t) + (o.d ? "<small>" + esc(o.d) + "</small>" : "") + "</span></button>"; }).join("") +
      "</div>" + err(k) + "</div>";
  }
  function yn(k, lbl, vals, help) { vals = vals || ["Yes", "No"]; return radios(k, lbl, [{ v: vals[0], t: "Yes" }, { v: vals[1], t: "No" }], "", help); }
  function country(k, lbl, o) {
    o = o || {}; var v = S[k];
    var inner = v && NAME[v] ? flag(v) + "<span>" + esc(NAME[v]) + "</span>" : '<span class="iv-ph">' + esc(o.ph || "Select country") + "</span>";
    return '<div class="iv-f' + bad(k) + '"><span class="iv-lbl" id="gx-' + k + '-lbl">' + lbl + "</span>" +
      '<div class="gx-cs" data-cs="' + k + '" data-pop="' + (o.pop || "from") + '"><button type="button" class="gx-csb iv-in" aria-haspopup="listbox" aria-expanded="false" aria-labelledby="gx-' + k + '-lbl" id="gx-' + k + '">' + inner + ic("chev", "gx-chev") + "</button></div>" +
      (o.help ? '<p class="iv-help">' + o.help + "</p>" : "") + err(k) + "</div>";
  }
  function date3(k, lbl, from, to, desc, help) {
    var v = S[k] || {}, years = [], y;
    if (desc) for (y = to; y >= from; y--) years.push(y); else for (y = from; y <= to; y++) years.push(y);
    var mo = MONTHS.map(function (m, i) { return '<option value="' + (i + 1) + '"' + (+v.m === i + 1 ? " selected" : "") + ">" + m + "</option>"; }).join("");
    var da = ""; for (var d = 1; d <= 31; d++) da += '<option value="' + d + '"' + (+v.d === d ? " selected" : "") + ">" + d + "</option>";
    var ye = years.map(function (yy) { return '<option value="' + yy + '"' + (+v.y === yy ? " selected" : "") + ">" + yy + "</option>"; }).join("");
    return '<div class="iv-f' + bad(k) + '"><span class="iv-lbl" id="gx-' + k + '-lbl">' + lbl + '</span><div class="iv-three" role="group" aria-labelledby="gx-' + k + '-lbl">' +
      '<select class="iv-in iv-sel' + (v.m ? "" : " ph") + '" id="gx-' + k + '" data-d3="' + k + '" data-part="m" aria-label="Month"><option value="">Month</option>' + mo + "</select>" +
      '<select class="iv-in iv-sel' + (v.d ? "" : " ph") + '" data-d3="' + k + '" data-part="d" aria-label="Day"><option value="">Day</option>' + da + "</select>" +
      '<select class="iv-in iv-sel' + (v.y ? "" : " ph") + '" data-d3="' + k + '" data-part="y" aria-label="Year"><option value="">Year</option>' + ye + "</select>" +
      "</div>" + (help ? '<p class="iv-help">' + help + "</p>" : "") + err(k) + "</div>";
  }
  function ymdStr(k) { var v = S[k]; return v && v.y && v.m && v.d ? v.y + "-" + pad(v.m) + "-" + pad(v.d) : ""; }
  function dateIn(k, lbl, min) {
    return '<div class="iv-f' + bad(k) + '"><label for="gx-' + k + '">' + lbl + '</label><input class="iv-in iv-date" type="date" id="gx-' + k + '" data-dn="' + k + '" value="' + ymdStr(k) + '" min="' + min + '">' + err(k) + "</div>";
  }
  function phone() {
    var c = S.code;
    return '<div class="iv-f' + bad("phone") + bad("code") + '"><label for="gx-phone">Mobile number</label>' +
      '<div class="iv-phone"><div class="gx-cs" data-cs="code" data-dial="1"><button type="button" class="gx-csb iv-in" aria-haspopup="listbox" aria-expanded="false" aria-label="Country code" id="gx-code">' +
      (c ? flag(c) + "<span>" + esc(DIAL[c] || "") + "</span>" : '<span class="iv-ph">Code</span>') + ic("chev", "gx-chev") + "</button></div>" +
      '<input class="iv-in" id="gx-phone" data-k="phone" type="tel" inputmode="tel" autocomplete="tel-national" placeholder="300 1234567" value="' + esc(S.phone || "") + '"></div>' +
      '<p class="iv-help">Leave out the first 0.</p>' + err("code") + err("phone") + "</div>";
  }
  function isoToday(d) { d = d || TODAY; return d.getFullYear() + "-" + pad(d.getMonth() + 1) + "-" + pad(d.getDate()); }

  /* ---------- screens ---------- */
  var REASONS = [{ v: "tourism", t: "Visit & tourism" }, { v: "family-visit", t: "Family & friends" }, { v: "business", t: "Business" }, { v: "transit", t: "Transit" }, { v: "visa-invitation", t: "Invitation letter" }, { v: "other", t: "Something else" }];
  var WORK = [{ v: "employed", t: "Employed" }, { v: "business", t: "Self-employed" }, { v: "student", t: "Student" }, { v: "retired", t: "Retired" }, { v: "unemployed", t: "Not working" }];
  var STAYOPT = [{ v: "Hotel", t: "Hotel" }, { v: "Staying with family or friends", t: "With family or friends" }, { v: "Rented apartment", t: "Rented flat or apartment" }, { v: "Not booked yet", t: "Not booked yet" }];
  var SC = [
    { id: "trip", stage: 1, pct: 12, h: "Your trip", lede: "Tell us where you're going and why.",
      body: function () { var minLeave = dateOf("arrive"); minLeave = minLeave && minLeave !== "bad" ? isoToday(new Date(minLeave.getFullYear(), minLeave.getMonth(), minLeave.getDate() + 1)) : isoToday();
        return country("to", "Where are you going?", { pop: "to", ph: "Select country" }) +
          radios("purpose", "Main reason for your trip", REASONS) +
          (S.purpose === "other" ? text("purpose_other", "Tell us about your trip", { ph: "For example: a wedding or medical treatment" }) : "") +
          '<div class="iv-two">' + dateIn("arrive", "Arrival date", isoToday()) + dateIn("leave", "Return date", minLeave) + "</div>" +
          select("stay", "Where will you stay?", STAYOPT, "Select an option"); },
      check: function () { var a = dateOf("arrive"), l = dateOf("leave");
        return { to: !S.to && "Select the country you're going to.", purpose: !S.purpose && "Select the main reason for your trip.", purpose_other: S.purpose === "other" && !S.purpose_other && "Tell us briefly what the trip is for.",
          arrive: !a || a === "bad" ? "Enter your arrival date." : a < TODAY ? "Your arrival date can't be in the past." : "",
          leave: !l || l === "bad" ? "Enter your return date." : (a && a !== "bad" && l <= a) ? "Your return date must be after your arrival date." : "",
          stay: !S.stay && "Select where you'll stay." }; } },
    { id: "you", stage: 1, pct: 26, h: "Personal details", lede: "Enter the details as they appear on your passport.",
      body: function () { return '<div class="gx-slot iv-scan" data-slot="scan"></div>' + (scanNode ? '<div class="iv-or">Or fill in manually</div>' : "") +
          country("from", "Passport", { ph: "Select country" }) +
          '<div class="iv-two">' + text("first", "First and middle name", { ph: "Muhammad Ali", auto: "given-name" }) + text("last", "Last name", { ph: "Khan", auto: "family-name" }) + "</div>" +
          date3("dob", "Date of birth", YEAR - 100, YEAR, true) +
          '<div class="iv-two">' + radios("gender", "Gender", [{ v: "Male", t: "Male" }, { v: "Female", t: "Female" }]) + select("marital", "Marital status", ["Single", "Married", "Divorced", "Widowed"], "Select") + "</div>"; },
      check: function () { var d = dateOf("dob");
        return { from: !S.from ? "Select the country that issued your passport." : S.from === S.to ? "Your passport country and destination are the same. Please check." : "", first: !S.first && "Enter your first name.", last: !S.last && "Enter your last name.",
          dob: !d ? "Enter your date of birth." : d === "bad" ? "That date doesn't exist." : d > TODAY ? "Date of birth can't be in the future." : "", gender: !S.gender && "Select your gender.", marital: !S.marital && "Select your marital status." }; } },
    { id: "passport", stage: 1, pct: 40, h: "Passport details", lede: "You'll find these on the photo page of your passport.",
      body: function () { return text("pp_no", "Passport number", { ph: "AB1234567", upper: true }) +
          date3("pp_issue", "Issue date", YEAR - 15, YEAR, true) +
          date3("pp_exp", "Expiry date", YEAR, YEAR + 15, false, "Your passport should be valid for at least 6 months after you return.") +
          '<div data-warn>' + (S.warn ? note("warn", S.warn) : "") + "</div>"; },
      check: function () { var i = dateOf("pp_issue"), e = dateOf("pp_exp");
        return { pp_no: !S.pp_no ? "Enter your passport number." : !/^[A-Z0-9]{5,12}$/.test(S.pp_no) ? "Use letters and numbers only, with no spaces." : "",
          pp_issue: !i ? "Enter the issue date." : i === "bad" ? "That date doesn't exist." : i > TODAY ? "The issue date can't be in the future." : "",
          pp_exp: !e ? "Enter the expiry date." : e === "bad" ? "That date doesn't exist." : e < TODAY ? "This passport has expired. You need a valid passport to apply." : "" }; } },
    { id: "contact", stage: 1, pct: 54, h: "Contact details", lede: "We'll send your visa and any updates here.",
      body: function () { return text("email", "Email address", { type: "email", ph: "name@example.com", auto: "email", mode: "email", help: "Your visa will be sent to this email address." }) + phone() +
          '<label class="iv-chk"><input type="checkbox" id="gx-wa" data-wa="1"' + (S.wa === "yes" ? " checked" : "") + "><span>You can contact me on WhatsApp about my application</span></label>"; },
      check: function () { var p = (S.phone || "").replace(/[\s-]/g, "").replace(/^0+/, "");
        return { email: !S.email ? "Enter your email address." : !/^[^@\s]+@[^@\s]+\.[^@\s]{2,}$/.test(S.email) ? "Enter an email address like name@example.com." : "", code: !S.code && "Select your country code.", phone: !p ? "Enter your mobile number." : !/^\d{6,14}$/.test(p) ? "Use numbers only, without the country code." : "" }; } },
    { id: "address", stage: 1, pct: 66, h: "Address details", lede: "Your home address in the country where you live.",
      body: function () { return country("res", "Country of residence", { ph: "Select country", help: "The country where you live permanently." }) +
          '<div class="iv-two">' + text("addr", "Home address", { ph: "House 12, Street 4", auto: "street-address" }) + text("city", "City or town", { auto: "address-level2" }) + "</div>" +
          '<div class="iv-two">' + text("region", "State or province", { auto: "address-level1", opt: true }) + text("zip", "Postcode", { auto: "postal-code", opt: true }) + "</div>"; },
      check: function () { return { res: !S.res && "Select the country where you live.", addr: !S.addr && "Enter your home address.", city: !S.city && "Enter your city or town." }; } },
    { id: "money", stage: 1, pct: 80, h: "Work and finances", lede: "A few quick questions about your job and savings.",
      body: function () { return radios("emp", "What do you do?", WORK, "iv-c3") +
          select("bal", "Roughly how much is in your bank account?", BALANCES, "Select an amount", "In US dollars. A rough figure is fine.") +
          yn("stmt", "Can you get a bank statement for the last 6 months?") +
          yn("prop", "Do you own property in your home country?"); },
      check: function () { return { emp: !S.emp && "Select what you do.", bal: !S.bal && "Select an amount.", stmt: !S.stmt && "Select Yes or No.", prop: !S.prop && "Select Yes or No." }; } },
    { id: "history", stage: 1, pct: 94, h: "Additional information", lede: "Please answer honestly. Embassies check this.",
      body: function () { return yn("travelled", "Have you travelled abroad in the last 10 years?") +
          (S.travelled === "Yes" ? text("travelled_where", "Which countries?", { ph: "UAE, Saudi Arabia" }) : "") +
          yn("refused", "Have you ever been refused a visa?", ["yes", "no"]) +
          (S.refused === "yes" ? text("refused_where", "Which country, and when?", { ph: "United Kingdom, 2023" }) : "") +
          yn("crim", "Have you ever been convicted of a criminal offence?"); },
      check: function () { return { travelled: !S.travelled && "Select Yes or No.", travelled_where: S.travelled === "Yes" && !S.travelled_where && "List the countries you visited.", refused: !S.refused && "Select Yes or No.", refused_where: S.refused === "yes" && !S.refused_where && "Tell us which country and when.", crim: !S.crim && "Select Yes or No." }; } },
    { id: "people", stage: 2, pct: 50, h: "Add travellers", lede: "Is anyone else travelling with you on this trip? If not, continue.",
      body: function () { return '<div class="iv-trav"><span class="iv-av">' + esc(((S.first || "Y")[0] + ((S.last || "")[0] || "")).toUpperCase()) + "</span><div><b>" + esc([S.first, S.last].filter(Boolean).join(" ") || "You") + "</b><small>Main applicant</small></div></div>" + '<div class="gx-slot" data-slot="extra"></div>'; } },
    { id: "review", stage: 3, pct: 50, h: "Review your order", lede: "Check your details, then continue to payment.",
      body: function () {
        function row(k, v) { return "<dt>" + k + "</dt><dd>" + (v ? esc(v) : '<span class="iv-miss">Missing</span>') + "</dd>"; }
        function sec(t, id, rows) { return '<div class="iv-rv"><div class="iv-rvh"><b>' + t + '</b><button type="button" class="iv-link" data-goto="' + id + '">Edit</button></div><dl>' + rows + "</dl></div>"; }
        var yesno = function (v) { return /^yes$/i.test(v || "") ? "Yes" : /^no$/i.test(v || "") ? "No" : ""; };
        var extra = [].map.call(form.querySelectorAll("[data-extra-list] li[data-saved='1']"), function (li) { var b = li.querySelector("strong,b,h4,p"); return b ? b.textContent.trim() : ""; }).filter(Boolean);
        return sec("Trip", "trip", row("Destination", NAME[S.to]) + row("Reason", S.purpose === "other" ? (S.purpose_other || "Something else") : label(REASONS, S.purpose)) + row("Dates", fmt("arrive") && fmt("leave") ? fmt("arrive") + " – " + fmt("leave") : "") + row("Staying at", label(STAYOPT, S.stay))) +
          sec("Personal details", "you", row("Name", [S.first, S.last].filter(Boolean).join(" ")) + row("Passport", NAME[S.from]) + row("Date of birth", fmt("dob")) + row("Gender", S.gender) + row("Marital status", S.marital)) +
          sec("Passport", "passport", row("Number", S.pp_no) + row("Issued", fmt("pp_issue")) + row("Expires", fmt("pp_exp"))) +
          sec("Contact and address", "contact", row("Email", S.email) + row("Mobile", S.code && S.phone ? (DIAL[S.code] || "") + " " + S.phone : "") + row("Lives in", NAME[S.res]) + row("Address", [S.addr, S.city, S.region, S.zip].filter(Boolean).join(", "))) +
          sec("Work and history", "money", row("Work", label(WORK, S.emp)) + row("Bank balance", S.bal) + row("Bank statement", yesno(S.stmt)) + row("Owns property", yesno(S.prop)) + row("Travelled abroad", S.travelled === "Yes" ? "Yes" + (S.travelled_where ? ", " + S.travelled_where : "") : yesno(S.travelled)) + row("Refused a visa", S.refused === "yes" ? "Yes" + (S.refused_where ? ", " + S.refused_where : "") : yesno(S.refused)) + row("Criminal conviction", yesno(S.crim))) +
          sec("Travellers", "people", row("Main applicant", [S.first, S.last].filter(Boolean).join(" ")) + "<dt>Also travelling</dt><dd>" + (extra.length ? esc(extra.join(", ")) : "No one else") + "</dd>") +
          '<div class="iv-total"><span>Alif Visa service fee</span><b>Shown before you pay</b></div>' +
          '<label class="iv-chk' + bad("agree") + '"><input type="checkbox" id="gx-agree" data-agree="1"' + (rget("agree_terms") ? " checked" : "") + '><span>I confirm my details are correct and I agree to the <a href="/terms/" target="_blank" rel="noopener">Terms and Conditions</a> and <a href="/refund-policy/" target="_blank" rel="noopener">Refund Policy</a>.</span></label>' + err("agree") +
          (LOGGED_IN ? "" : '<p class="iv-help" style="margin-top:-8px!important">You\'ll sign in or create a free account before paying, so you can track your application.</p>'); },
      go: LOGGED_IN ? "Continue to payment" : "Continue" }
  ];
  var IDX = {}; SC.forEach(function (s, i) { IDX[s.id] = i; });
  var TOTAL = SC.length - 1;
  function hasErr(e) { for (var k in e) if (e[k]) return true; return false; }
  function firstGap() { for (var i = 0; i < TOTAL; i++) if (SC[i].check && hasErr(SC[i].check())) return i; return -1; }

  /* ---------- mount ---------- */
  var root = document.createElement("div"); root.className = "iv"; root.id = "gx";
  var holder = document.createElement("div"); holder.hidden = true; holder.className = "gx-holder";
  var steps = form.querySelector(".avx-steps");
  form.insertBefore(root, form.firstChild);
  form.appendChild(holder);
  form.classList.add("gx-on");
  document.documentElement.classList.add("iv-page");
  var scanNode = form.querySelector(".alif-passport-scan");
  var extraNode = form.querySelector(".alif-extra-travellers");
  var addNode = form.querySelector("[data-extra-add-wrap]");
  var MOVE = { scan: [scanNode], extra: [extraNode, addNode] };
  function park() { [scanNode, extraNode, addNode].forEach(function (n) { if (n && n.parentNode !== holder) holder.appendChild(n); }); }
  park();
  var heroP = document.querySelector(".avx-hero p"); if (heroP) heroP.textContent = "A few short steps. Your answers save as you go.";
  root.addEventListener("click", function (e) { var g = e.target.closest("[data-goto]"); if (g) { S.ret = true; go(IDX[g.getAttribute("data-goto")]); } });

  function visaName() { var el = document.querySelector("[data-avr-vname]"); var v = el ? el.textContent.trim() : ""; return v || "visa"; }
  function sumHtml() {
    var extra = [].map.call(form.querySelectorAll("[data-extra-list] li[data-saved='1']"), function (li) { var b = li.querySelector("strong,b,h4,p"); return b ? b.textContent.trim() : ""; }).filter(Boolean);
    var names = [[S.first, S.last].filter(Boolean).join(" ")].concat(extra).filter(Boolean).join(", ");
    var dates = fmt("arrive") && fmt("leave") ? fmt("arrive").replace(/ \d{4}$/, "") + " – " + fmt("leave") : "";
    return '<aside class="iv-sum"><div class="iv-sum-top">' + (S.to ? '<div class="iv-sum-flag">' + flag(S.to) + "</div>" : "") + '</div><div class="iv-sum-body">' +
      "<h3>" + (S.to && NAME[S.to] ? esc(NAME[S.to]) + " " + esc(visaName().toLowerCase()) : "Your visa application") + "</h3>" +
      '<p class="iv-sub">' + (S.purpose ? esc(label(REASONS, S.purpose)) : "Choose your destination to start") + "</p>" +
      '<div class="iv-row keep">' + ic("cal") + "<span>Travel dates<b>" + (dates ? esc(dates) : "Not set yet") + "</b></span></div>" +
      (names ? '<div class="iv-row">' + ic("user") + "<span>Travellers<b>" + esc(names) + "</b></span></div>" : "") +
      '<div class="iv-row">' + ic("lock") + "<span>Secure and safe<b>256-bit encrypted</b></span></div>" +
      '<a class="iv-help-box" href="https://wa.me/447482331249" target="_blank" rel="noopener"><b>Need help?</b>WhatsApp a UK adviser on +44 7482 331249</a></div></aside>';
  }
  function progHtml(s) {
    var n = ["Application", "Add travellers", "Review & pay"];
    return '<div class="iv-prog">' + n.map(function (t, i) { var st = i + 1 < s.stage ? "done" : i + 1 === s.stage ? "on" : ""; return '<div class="iv-ps ' + st + '"' + (st === "on" ? ' aria-current="step"' : "") + "><i>" + (st === "done" ? ic("check") : i + 1) + "</i><span>" + t + "</span></div>" + (i < 2 ? '<div class="iv-pl"><b style="width:' + (i + 1 < s.stage ? 100 : i + 1 === s.stage ? s.pct : 0) + '%"></b></div>' : ""); }).join("") + "</div>";
  }
  function render(focusErr, keep) {
    var y = window.scrollY; park();
    var s = SC[S.step];
    root.innerHTML = progHtml(s) + '<div class="iv-cols">' + sumHtml() + '<div class="iv-card"><h2 id="gx-h" tabindex="-1">' + s.h + '</h2><p class="iv-lede">' + s.lede + '</p><div class="iv-fields">' + s.body() + "</div>" +
      '<div class="iv-foot">' + (S.step > 0 ? '<button type="button" class="iv-back" id="gx-back">Back</button>' : "") + '<button type="button" class="iv-go" id="gx-next">' + (S.ret && s.id !== "review" ? "Save and review" : (s.go || "Continue")) + "</button></div></div></div>";
    root.querySelectorAll("[data-slot]").forEach(function (slot) { (MOVE[slot.getAttribute("data-slot")] || []).forEach(function (n) { if (n) slot.appendChild(n); }); });
    bind();
    if (keep) window.scrollTo(0, y);
    if (focusErr) { var k = Object.keys(S.errs).filter(function (x) { return S.errs[x]; })[0]; var el = k && (document.getElementById("gx-" + k) || document.getElementById("gx-" + k + "-err")); if (el) { el.scrollIntoView({ block: "center", behavior: "smooth" }); try { el.focus({ preventScroll: true }); } catch (e) {} } }
  }
  function renderSum() { var a = root.querySelector(".iv-sum"); if (a) { var t = document.createElement("div"); t.innerHTML = sumHtml(); a.parentNode.replaceChild(t.firstChild, a); } }
  function go(i) {
    S.step = Math.max(0, Math.min(TOTAL, i)); S.errs = {};
    try { sessionStorage.setItem("alifGxStep", String(S.step)); } catch (e) {}
    render();
    var top = root.getBoundingClientRect().top + window.scrollY - 90;
    window.scrollTo({ top: Math.max(0, top), behavior: "smooth" });
    var h = document.getElementById("gx-h"); if (h) try { h.focus({ preventScroll: true }); } catch (e) {}
  }
  function passportWarn() {
    S.warn = ""; var e = dateOf("pp_exp"), l = dateOf("leave");
    if (e && e !== "bad" && e >= TODAY && l && l !== "bad") { var need = new Date(l); need.setMonth(need.getMonth() + 6); if (e < need) S.warn = "Your passport expires less than 6 months after your return date (" + fmt("leave") + "). Many countries won't accept this. If you can, renew it before you apply."; }
  }
  function clearErr(k, el) { if (!S.errs[k]) return; S.errs[k] = ""; var m = document.getElementById("gx-" + k + "-err"); if (m) m.remove(); var w = el && el.closest(".iv-bad"); if (w) w.classList.remove("iv-bad"); }

  function bind() {
    root.querySelectorAll("[data-k]").forEach(function (el) {
      el.addEventListener(el.tagName === "SELECT" ? "change" : "input", function () {
        var k = el.getAttribute("data-k"), v = el.value;
        if (el.getAttribute("data-upper")) { v = v.toUpperCase().replace(/\s+/g, ""); el.value = v; }
        if (el.tagName === "SELECT") el.classList.toggle("ph", !v);
        S[k] = v; push(); clearErr(k, el); renderSum();
      });
    });
    root.querySelectorAll("[data-d3]").forEach(function (el) {
      el.addEventListener("change", function () {
        var k = el.getAttribute("data-d3"), o = {}; for (var p in (S[k] || {})) o[p] = S[k][p];
        o[el.getAttribute("data-part")] = el.value; S[k] = o; el.classList.toggle("ph", !el.value); push(); clearErr(k, el);
        if (k === "pp_exp") { passportWarn(); var w = root.querySelector("[data-warn]"); if (w) w.innerHTML = S.warn ? note("warn", S.warn) : ""; }
      });
    });
    root.querySelectorAll("[data-dn]").forEach(function (el) {
      el.addEventListener("change", function () {
        var k = el.getAttribute("data-dn"), m = /^(\d{4})-(\d{2})-(\d{2})$/.exec(el.value);
        S[k] = m ? { y: m[1], m: String(+m[2]), d: String(+m[3]) } : {}; push(); clearErr(k, el);
        if (k === "arrive") { var L = dateOf("leave"), A = dateOf("arrive"); var lv = root.querySelector('[data-dn="leave"]'); if (lv && A && A !== "bad") { lv.min = isoToday(new Date(A.getFullYear(), A.getMonth(), A.getDate() + 1)); if (L && L !== "bad" && L <= A) { S.leave = {}; lv.value = ""; push(); } } }
        renderSum();
      });
    });
    root.querySelectorAll("[data-pick]").forEach(function (el) {
      el.addEventListener("click", function () {
        var k = el.getAttribute("data-pick"), v = el.getAttribute("data-v"), before = S[k];
        S[k] = v; push();
        var follow = (k === "purpose" && (v === "other") !== (before === "other")) || (k === "travelled" && (v === "Yes") !== (before === "Yes")) || (k === "refused" && (v === "yes") !== (before === "yes"));
        if (follow) { S.errs[k] = ""; render(false, true); var again = root.querySelector('[data-pick="' + k + '"][data-v="' + v + '"]'); if (again) again.focus(); return; }
        root.querySelectorAll('[data-pick="' + k + '"]').forEach(function (b) { var on = b === el; b.classList.toggle("on", on); b.setAttribute("aria-checked", on); });
        clearErr(k, el); renderSum();
      });
    });
    var wa = root.querySelector("[data-wa]"); if (wa) wa.addEventListener("change", function () { S.wa = wa.checked ? "yes" : "no"; push(); });
    var ag = root.querySelector("[data-agree]"); if (ag) ag.addEventListener("change", function () { rset("agree_terms", ag.checked ? "1" : ""); clearErr("agree", ag); });
    root.querySelectorAll("[data-cs]").forEach(bindPicker);
    var back = document.getElementById("gx-back"); if (back) back.addEventListener("click", function () { if (S.ret) { S.ret = false; return go(IDX.review); } go(S.step - 1); });
    document.getElementById("gx-next").addEventListener("click", next);
  }
  function next() {
    var s = SC[S.step];
    if (s.id === "people") { var open = form.querySelector("[data-extra-list] li.is-editing"); if (open) { open.scrollIntoView({ block: "center", behavior: "smooth" }); var msg = open.querySelector(".gx-err") || document.createElement("p"); msg.className = "gx-err"; msg.textContent = "Save or cancel this traveller before you continue."; if (!msg.parentNode) open.appendChild(msg); return; } }
    if (s.id === "review") {
      var gap = firstGap(); if (gap >= 0) { S.errs = { agree: "Some answers are missing. Press Edit next to “Missing” to add them." }; return render(true, true); }
      if (!rget("agree_terms")) { S.errs = { agree: "Tick the box to confirm your details and accept the Terms." }; return render(true, true); }
      return submit();
    }
    var e = s.check ? s.check() : {}, clean = {}; for (var k in e) if (e[k]) clean[k] = e[k];
    if (hasErr(clean)) { S.errs = clean; return render(true, true); }
    push(); if (s.id === "passport") passportWarn();
    if (S.ret) { S.ret = false; return go(IDX.review); }
    go(S.step + 1);
  }
  function submit() {
    push(); rset("agree_terms", "1");
    var real = form.querySelector("[data-wizard-step='review'] [data-go-stripe]"), btn = document.getElementById("gx-next");
    if (LOGGED_IN && btn) { btn.disabled = true; btn.textContent = "Opening secure payment…"; }
    if (real) real.click(); else HTMLFormElement.prototype.submit.call(form);
    window.addEventListener("pageshow", function () { var b = document.getElementById("gx-next"); if (b) b.disabled = false; });
  }


  /* searchable country / code picker */
  function fold(s) { s = String(s || "").toLowerCase(); try { s = s.normalize("NFD").replace(/[̀-ͯ]/g, ""); } catch (e) {} return s; }
  function bindPicker(cs) {
    var k = cs.getAttribute("data-cs"), dial = !!cs.getAttribute("data-dial"), btn = cs.querySelector(".gx-csb");
    btn.addEventListener("click", function (e) { e.stopPropagation(); if (cs.querySelector(".gx-panel")) close(); else open(); });
    function open() {
      root.querySelectorAll(".gx-panel").forEach(function (p) { p.remove(); });
      var p = document.createElement("div"); p.className = "gx-panel" + (dial ? " narrow" : "");
      p.innerHTML = '<input class="gx-search" type="search" placeholder="' + (dial ? "Search country or code" : "Type to search") + '" aria-label="Search countries" autocomplete="off"><div class="gx-list" role="listbox"></div>';
      cs.appendChild(p); btn.setAttribute("aria-expanded", "true");
      var q = p.querySelector("input"), list = p.querySelector(".gx-list"), active = 0;
      function draw() {
        var s = fold(q.value.trim()), digits = s.replace(/[^\d]/g, ""), res = COUNTRIES.filter(function (c) { return !dial || DIAL[c[0]]; });
        if (s) {
          res = res.filter(function (c) { return (digits && /^[+\d\s]+$/.test(s)) ? String(DIAL[c[0]] || "").replace("+", "").indexOf(digits) === 0 : fold(c[1]).indexOf(s) > -1 || c[0].toLowerCase() === s; });
          res.sort(function (a, b) { return (fold(a[1]).indexOf(s) === 0 ? 0 : 1) - (fold(b[1]).indexOf(s) === 0 ? 0 : 1); });
        }
        var pop = cs.getAttribute("data-pop") === "to" ? POP_TO : POP_FROM, n = 0, html = "";
        function opt(c) { var i = n++; return '<button type="button" class="gx-o' + (i === active ? " on" : "") + '" role="option" data-code="' + c[0] + '">' + flag(c[0]) + "<span>" + esc(c[1]) + "</span>" + (dial ? "<em>" + esc(DIAL[c[0]] || "") + "</em>" : "") + "</button>"; }
        if (!s) html += '<p class="gx-grp">Most chosen</p>' + pop.filter(function (c) { return NAME[c]; }).map(function (c) { return opt([c, NAME[c]]); }).join("") + '<p class="gx-grp">All countries</p>';
        html += res.map(opt).join("");
        list.innerHTML = html || '<p class="gx-empty">No country matches “' + esc(q.value) + '”. Check the spelling.</p>';
      }
      draw(); setTimeout(function () { q.focus(); }, 0);
      q.addEventListener("input", function () { active = 0; draw(); });
      q.addEventListener("keydown", function (e) {
        var opts = list.querySelectorAll(".gx-o");
        if (e.key === "ArrowDown") { e.preventDefault(); active = Math.min(opts.length - 1, active + 1); }
        else if (e.key === "ArrowUp") { e.preventDefault(); active = Math.max(0, active - 1); }
        else if (e.key === "Enter") { e.preventDefault(); if (opts[active]) pick(opts[active].getAttribute("data-code")); return; }
        else if (e.key === "Escape") { close(); btn.focus(); return; } else return;
        opts.forEach(function (o, i) { o.classList.toggle("on", i === active); }); if (opts[active]) opts[active].scrollIntoView({ block: "nearest" });
      });
      list.addEventListener("click", function (e) { var o = e.target.closest(".gx-o"); if (o) pick(o.getAttribute("data-code")); });
      p.addEventListener("click", function (e) { e.stopPropagation(); });
    }
    function close() { var p = cs.querySelector(".gx-panel"); if (p) p.remove(); btn.setAttribute("aria-expanded", "false"); }
    function pick(code) {
      S[k] = code; S.errs[k] = ""; S.errs.same = "";
      push(); render(false, true); var b = document.getElementById("gx-" + k); if (b) b.focus();
    }
  }
  document.addEventListener("click", function () { root.querySelectorAll(".gx-panel").forEach(function (p) { p.remove(); }); });

  /* other scripts (passport scan, restore after sign-in) may fill the real form: keep in step */
  var pullTimer;
  form.addEventListener("change", function (e) { if (writing || root.contains(e.target)) return; clearTimeout(pullTimer); pullTimer = setTimeout(function () { pull(); render(false, true); }, 150); });
  form.addEventListener("input", function (e) { if (writing || root.contains(e.target)) return; if (e.target.closest && e.target.closest("[data-extra-list]")) return; clearTimeout(pullTimer); pullTimer = setTimeout(function () { pull(); renderSum(); }, 300); });
  if (extraNode) new MutationObserver(function () { renderSum(); }).observe(extraNode, { childList: true, subtree: true, attributes: true, attributeFilter: ["data-saved"] });

  pull();
  (function () {
    var start = 0, gap = firstGap();
    if (/alif_error=1/.test(location.search) || gap < 0) start = IDX.review;
    else { try { var saved = +sessionStorage.getItem("alifGxStep") || 0; if (saved > 0) start = Math.min(saved, gap); } catch (e) {} }
    S.step = start;
  })();
  render();
  setTimeout(function () { pull(); if (firstGap() < 0 && S.step !== IDX.review) { S.step = IDX.review; render(); } else renderSum(); }, 600);
})();

GXJS;
}
add_action('wp_head', function () {
    if (!is_page('apply') || isset($_GET['classic'])) {
        return;
    }
    echo '<style id="alif-gx-css">' . alif_gx_css() . '</style>';
}, 60);
add_action('wp_footer', function () {
    if (!is_page('apply') || isset($_GET['classic']) || isset($_GET['submitted']) || isset($_GET['ref'])) {
        return;
    }
    $dial = function_exists('alif_dial_codes') ? alif_dial_codes() : [];
    $countries = [];
    foreach (alif_get_countries() as $c) {
        $countries[] = [$c['code'], html_entity_decode((string) $c['name'], ENT_QUOTES, 'UTF-8')];
    }
    $flags = function_exists('alif_asset') ? alif_asset('flags/') : '';
    echo '<script data-no-optimize="1" data-no-defer="1" data-cfasync="false">window.ALIF_GX_DIAL=' . wp_json_encode($dial) . ';window.ALIF_GX_COUNTRIES=' . wp_json_encode($countries) . ';window.ALIF_GX_FLAGS=' . wp_json_encode($flags) . ';window.ALIF_GX_LOGGED_IN=' . (is_user_logged_in() ? 'true' : 'false') . ';</script>';
    echo '<script id="alif-gx-js" data-no-optimize="1" data-no-defer="1" data-cfasync="false">' . alif_gx_js() . '</script>';
}, 60);
/* ===== end Alif guided application form ===== */
