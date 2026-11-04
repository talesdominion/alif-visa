

/* ===== Alif guided application form (4 Nov 2026, v2.1). Old form stays underneath; add ?classic=1 to see it. ===== */
function alif_gx_css() {
    return <<<'GXCSS'
/* Alif guided application (sits on top of #alif-apply-wizard) */
.gx-on > [data-wizard-step]{display:none!important}
#main .gx-on > .avx-steps{margin:0 0 18px!important}
.gx-side-on > :not(.gx-aside){display:none!important}
.gx{--ink:#10241c;--muted:#5a6e65;--line:#dde6e1;--line2:#c6d3cc;--brand:#0b6b4a;--accent:#1fce7c;--accent-ink:#06321f;--mint:#e7f7ee;--mint-line:#bfe9d2;--soft:#f7faf8;--err:#c63b2f;--warn-bg:#fff6e5;--warn-ink:#7a4a00;--warn-line:#f3d79c;font-family:"Plus Jakarta Sans",ui-sans-serif,system-ui,-apple-system,"Segoe UI",Roboto,sans-serif;color:var(--ink);background:#fff;border:1px solid var(--line);border-radius:20px;box-shadow:0 1px 2px rgba(16,36,28,.06),0 12px 32px -18px rgba(16,36,28,.25);padding:clamp(20px,3.6vw,38px);font-size:16px;line-height:1.55;text-align:left}
.gx *,.gx-aside *{box-sizing:border-box}
.gx button,.gx input,.gx select,.gx textarea{font-family:inherit;color:inherit;letter-spacing:normal;text-transform:none}
.gx :focus-visible,.gx-aside :focus-visible{outline:3px solid var(--accent)!important;outline-offset:2px}
.gx svg{flex:0 0 auto}
.gx-prog{display:flex;flex-direction:column;gap:8px;margin:0 0 22px}
.gx-prog-top{display:flex;justify-content:space-between;gap:12px;font-size:13px;font-weight:700;color:var(--muted)}
.gx-prog-top b{color:var(--brand);letter-spacing:.06em;text-transform:uppercase;font-size:12.5px}
.gx-stages{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:8px}
.gx-stages span{display:block;height:6px;border-radius:99px;background:var(--line);overflow:hidden}
.gx-stages i{display:block;height:100%;background:var(--accent);border-radius:inherit;transition:width .35s ease}
.gx-stagenames{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:8px;font-size:12.5px;font-weight:700;color:var(--muted)}
.gx-stagenames .on{color:var(--ink)}
.gx h2.gx-title{margin:0!important;font-size:clamp(23px,3vw,30px)!important;line-height:1.2!important;letter-spacing:-.02em!important;font-weight:800!important;color:var(--ink)!important;text-wrap:balance;padding:0!important;border:0!important}
.gx-lead{margin:8px 0 0!important;color:var(--muted)!important;max-width:62ch;font-size:15.5px!important}
.gx-fields{display:flex;flex-direction:column;gap:22px;margin-top:26px}
.gx-row2{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:16px}
.gx-date{display:grid;grid-template-columns:1.4fr 1fr 1fr;gap:10px}
.gx-f{display:flex;flex-direction:column;gap:7px;min-width:0;margin:0!important}
.gx-lbl{font-weight:700!important;font-size:14.5px!important;color:var(--ink)!important;margin:0!important}
.gx-opt{font-weight:500;color:var(--muted);font-size:13px}
.gx-hint{margin:0!important;font-size:13px!important;color:var(--muted)!important;line-height:1.45!important}
.gx .gx-inp,.gx .gx-sel{width:100%!important;min-height:52px!important;height:auto!important;border:1.5px solid var(--line2)!important;border-radius:14px!important;background:#fff!important;padding:12px 14px!important;font-size:16px!important;box-shadow:none!important;margin:0!important;color:var(--ink)!important}
.gx .gx-inp::placeholder{color:#97a8a0!important;opacity:1}
.gx .gx-inp:focus,.gx .gx-sel:focus{border-color:var(--brand)!important;outline:none!important;box-shadow:0 0 0 4px var(--mint)!important}
.gx .gx-sel{appearance:none;-webkit-appearance:none;background-image:linear-gradient(45deg,transparent 50%,#5a6e65 50%),linear-gradient(135deg,#5a6e65 50%,transparent 50%)!important;background-position:calc(100% - 20px) 50%,calc(100% - 14px) 50%!important;background-size:6px 6px!important;background-repeat:no-repeat!important;padding-right:36px!important}
.gx-bad .gx-inp,.gx-bad .gx-sel,.gx-bad .gx-csb,.gx-bad .gx-choice,.gx-bad .gx-yn button{border-color:var(--err)!important}
.gx-err{margin:0!important;font-size:13px!important;font-weight:600!important;color:var(--err)!important;display:flex;gap:6px;align-items:flex-start}
.gx-err svg{width:16px;height:16px;margin-top:2px}
.gx-choices{display:grid;grid-template-columns:repeat(auto-fill,minmax(190px,1fr));gap:12px}
.gx-choices.c2{grid-template-columns:repeat(2,minmax(0,1fr))}
.gx .gx-choice{display:flex!important;align-items:flex-start;gap:12px;text-align:left;width:100%;padding:14px!important;border:1.5px solid var(--line2)!important;border-radius:14px!important;background:#fff!important;cursor:pointer;margin:0!important;box-shadow:none!important;min-height:0!important;height:auto!important;color:var(--ink)!important;font-weight:400!important}
.gx .gx-choice:hover{border-color:var(--muted)!important}
.gx .gx-choice[aria-pressed="true"]{border-color:var(--brand)!important;background:var(--mint)!important;box-shadow:inset 0 0 0 1px var(--brand)!important}
.gx-choice .gx-ic{width:38px;height:38px;border-radius:10px;display:grid;place-items:center;background:var(--soft);color:var(--brand);border:1px solid var(--line);flex:0 0 auto}
.gx-choice[aria-pressed="true"] .gx-ic{background:var(--brand);color:#fff;border-color:var(--brand)}
.gx-choice .gx-ic svg{width:20px;height:20px}
.gx-choice b{display:block;font-size:15px;font-weight:700;line-height:1.3}
.gx-choice small{display:block;font-size:13px;color:var(--muted);line-height:1.4;margin-top:2px}
.gx-yn{display:grid;grid-template-columns:repeat(auto-fit,minmax(130px,1fr));gap:12px}
.gx .gx-yn button{display:flex!important;align-items:center;gap:12px;min-height:54px!important;height:auto!important;padding:10px 16px!important;border:1.5px solid var(--line2)!important;border-radius:14px!important;background:#fff!important;cursor:pointer;font-weight:600!important;font-size:15.5px!important;text-align:left;margin:0!important;box-shadow:none!important;color:var(--ink)!important;line-height:1.3!important}
.gx .gx-yn button::before{content:"";flex:0 0 auto;width:20px;height:20px;border-radius:50%;border:2px solid var(--line2);background:#fff}
.gx .gx-yn button[aria-pressed="true"]{border-color:var(--brand)!important;background:var(--mint)!important}
.gx .gx-yn button[aria-pressed="true"]::before{border:6px solid var(--brand)}
.gx-cs{position:relative}.gx-cs:has(.gx-panel){z-index:6}
.gx .gx-csb{width:100%!important;min-height:52px!important;height:auto!important;display:flex!important;align-items:center;gap:10px;border:1.5px solid var(--line2)!important;border-radius:14px!important;background:#fff!important;padding:10px 14px!important;cursor:pointer;text-align:left;font-size:16px!important;font-weight:500!important;margin:0!important;box-shadow:none!important;color:var(--ink)!important}
.gx-csb .gx-ph{color:#8a9c94}
.gx-csb .gx-chev{margin-left:auto;width:16px;height:16px;color:var(--muted)}
.gx-flag{width:24px;height:17px;border-radius:3px;object-fit:cover;display:block;flex:0 0 auto;box-shadow:0 0 0 1px rgba(16,36,28,.08)}
.gx-panel{position:absolute;z-index:40;left:0;right:0;top:calc(100% + 6px);background:#fff;border:1px solid var(--line2);border-radius:14px;box-shadow:0 20px 50px -20px rgba(16,36,28,.45);padding:8px}
.gx-panel.narrow{right:auto;width:min(340px,calc(100vw - 64px))}
.gx .gx-search{width:100%!important;height:46px!important;border:1.5px solid var(--line2)!important;border-radius:10px!important;padding:0 12px!important;font-size:16px!important;background:#fff!important;margin:0!important;box-shadow:none!important}
.gx .gx-search:focus{outline:none!important;border-color:var(--brand)!important}
.gx-list{max-height:280px;overflow:auto;margin-top:6px;overscroll-behavior:contain}
.gx-grp{margin:8px 8px 4px!important;font-size:11.5px!important;font-weight:700!important;letter-spacing:.08em;text-transform:uppercase;color:var(--muted)!important}
.gx .gx-o{display:flex!important;align-items:center;gap:10px;width:100%;padding:10px 8px!important;border:0!important;border-radius:8px!important;background:none!important;cursor:pointer;text-align:left;font-size:15px!important;font-weight:500!important;margin:0!important;box-shadow:none!important;color:var(--ink)!important;min-height:0!important;height:auto!important}
.gx .gx-o:hover,.gx .gx-o.on{background:var(--mint)!important}
.gx-o span{flex:1;min-width:0;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.gx-o em{font-style:normal;color:var(--muted);font-weight:600;font-variant-numeric:tabular-nums}
.gx-empty{padding:12px 8px;color:var(--muted);font-size:14px;margin:0!important}
.gx-phone{display:grid;grid-template-columns:minmax(118px,auto) minmax(0,1fr);gap:10px}
.gx-suggest{display:flex;flex-wrap:wrap;gap:8px;align-items:center;font-size:13px;color:var(--muted)}
.gx .gx-chip{border:1px solid var(--mint-line)!important;background:var(--mint)!important;color:var(--brand)!important;border-radius:99px!important;padding:5px 12px!important;font-size:13px!important;font-weight:700!important;cursor:pointer;margin:0!important;min-height:0!important;height:auto!important;box-shadow:none!important}
.gx-why{border:1px solid var(--line);border-radius:14px;background:var(--soft);margin:0!important}
.gx-why summary{cursor:pointer;list-style:none;padding:12px 14px;font-weight:700;font-size:14px;display:flex;align-items:center;gap:8px;color:var(--brand)}
.gx-why summary::-webkit-details-marker{display:none}
.gx-why summary svg{width:16px;height:16px}
.gx-why summary::after{content:"+";margin-left:auto;font-size:18px;line-height:1}
.gx-why[open] summary::after{content:"\2013"}
.gx-why p{margin:0!important;padding:0 14px 14px!important;font-size:14px!important;color:var(--muted)!important}
.gx-note{display:flex;gap:10px;align-items:flex-start;border-radius:14px;padding:12px 14px;font-size:14px;line-height:1.5}
.gx-note svg{width:18px;height:18px;margin-top:2px}
.gx-note.warn{background:var(--warn-bg);color:var(--warn-ink);border:1px solid var(--warn-line)}
.gx-note.info{background:var(--mint);color:var(--ink);border:1px solid var(--mint-line)}
.gx-note.info svg{color:var(--brand)}
.gx-nav{display:flex;gap:12px;justify-content:space-between;align-items:center;margin-top:30px;padding-top:22px;border-top:1px solid var(--line)}
.gx .gx-btn{display:inline-flex!important;align-items:center;justify-content:center;gap:8px;min-height:52px!important;height:auto!important;padding:0 26px!important;border-radius:99px!important;font-weight:700!important;font-size:16px!important;cursor:pointer;margin:0!important;box-shadow:none!important;line-height:1.2!important;text-decoration:none!important}
.gx .gx-go{background:var(--accent)!important;color:var(--accent-ink)!important;border:0!important;min-width:170px}
.gx .gx-go:hover{filter:brightness(1.05)}
.gx .gx-go[disabled]{opacity:.6;cursor:wait}
.gx .gx-ghost{background:#fff!important;color:var(--ink)!important;border:1.5px solid var(--line2)!important}
.gx-btn svg{width:18px;height:18px}
.gx-ready{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:12px;margin:26px 0 0!important;padding:0!important;list-style:none!important}
.gx-ready li{list-style:none!important;display:flex;gap:12px;align-items:flex-start;padding:14px!important;margin:0!important;border:1px solid var(--line);border-radius:14px;background:var(--soft)}
.gx-ready li::before,.gx-ready li::marker{content:none!important}
.gx-ready .gx-ic{width:38px;height:38px;border-radius:10px;display:grid;place-items:center;background:var(--mint);color:var(--brand);flex:0 0 auto}
.gx-ready .gx-ic svg{width:20px;height:20px}
.gx-ready b{display:block;font-size:15px}
.gx-ready small{color:var(--muted);font-size:13px;line-height:1.45;display:block}
.gx-facts{display:flex;flex-wrap:wrap;gap:8px 20px;margin-top:20px;font-size:14px;color:var(--muted)}
.gx-facts span{display:inline-flex;gap:7px;align-items:center}
.gx-facts svg{width:16px;height:16px;color:var(--brand)}
.gx-slot:empty{display:none}
.gx-rv{display:flex;flex-direction:column;gap:14px;margin-top:24px}
.gx-sec{border:1px solid var(--line);border-radius:14px;overflow:hidden}
.gx-sech{display:flex;align-items:center;justify-content:space-between;padding:10px 16px;background:var(--soft);border-bottom:1px solid var(--line)}
.gx-sech h3{margin:0!important;font-size:15px!important;font-weight:800!important;color:var(--ink)!important}
.gx .gx-link{background:none!important;border:0!important;color:var(--brand)!important;font-weight:700!important;cursor:pointer;padding:6px!important;font-size:14px!important;margin:0!important;min-height:0!important;height:auto!important;box-shadow:none!important}
.gx-sec dl{margin:0!important;display:grid;grid-template-columns:minmax(120px,38%) minmax(0,1fr)}
.gx-sec dt,.gx-sec dd{margin:0!important;padding:10px 16px!important;border-bottom:1px solid var(--line);font-size:14.5px}
.gx-sec dt{color:var(--muted);font-weight:500}
.gx-sec dd{font-weight:600;overflow-wrap:anywhere}
.gx-sec dl > :nth-last-child(-n+2){border-bottom:0}
.gx-miss{color:var(--err)}
.gx-check{display:flex;gap:12px;align-items:flex-start;font-size:14.5px;cursor:pointer;margin-top:20px;line-height:1.5}
.gx-check input{width:20px!important;height:20px!important;margin-top:2px!important;accent-color:var(--brand);flex:0 0 auto}
.gx-check a{color:var(--brand);font-weight:700}
.gx-aside{display:flex;flex-direction:column;gap:16px;font-family:"Plus Jakarta Sans",ui-sans-serif,system-ui,sans-serif;color:#10241c;position:sticky;top:96px}
.gx-box{background:#fff;border:1px solid #dde6e1;border-radius:20px;padding:20px}
.gx-box h4{margin:0 0 12px!important;font-size:12.5px!important;font-weight:700!important;letter-spacing:.08em;text-transform:uppercase;color:#5a6e65!important}
.gx-dest{display:flex;align-items:center;gap:10px;font-weight:800;font-size:17px;line-height:1.3}
.gx-dest small{display:block;font-size:13px;font-weight:600;color:#5a6e65}
.gx-sum{margin:14px 0 0!important}
.gx-sum div{display:flex;justify-content:space-between;gap:12px;padding:9px 0;border-top:1px solid #dde6e1;font-size:14px}
.gx-sum dt{color:#5a6e65;margin:0!important;font-weight:500}
.gx-sum dd{margin:0!important;font-weight:600;text-align:right;overflow-wrap:anywhere}
.gx-todo{list-style:none!important;margin:0!important;padding:0!important;display:flex;flex-direction:column;gap:10px}
.gx-todo li{display:flex;gap:10px;align-items:center;font-size:14px;margin:0!important;padding:0!important}
.gx-todo li::before{content:none!important}
.gx-todo i{flex:0 0 auto;width:20px;height:20px;border-radius:50%;border:2px solid #c6d3cc;display:grid;place-items:center}
.gx-todo li.ok i{background:#1fce7c;border-color:#1fce7c}
.gx-todo li.ok i::after{content:"";width:8px;height:5px;border-left:2px solid #06321f;border-bottom:2px solid #06321f;transform:rotate(-45deg) translate(1px,-1px)}
.gx-todo li.ok span{color:#5a6e65}
.gx-help{background:#e7f7ee;border-color:#bfe9d2}
.gx-help p{margin:0!important;font-size:14px}
.gx-help a{display:inline-flex;align-items:center;gap:8px;margin-top:10px;font-weight:800;font-size:16px;color:#0b6b4a!important;text-decoration:none!important}
.gx-trust{display:flex;flex-direction:column;gap:8px;font-size:13px;color:#5a6e65}
.gx-trust span{display:flex;gap:8px;align-items:center}
.gx-trust svg{width:16px;height:16px;color:#0b6b4a;flex:0 0 auto}
.gx-msum{display:none;margin:0 0 16px}
@media (max-width:1020px){
  .gx-aside{position:static}
  .gx-aside > .gx-box:nth-child(-n+2){display:none!important}
  .gx-msum{display:block;border:1px solid #dde6e1;border-radius:16px;background:#fff;padding:14px 16px}
  .gx-msum summary{list-style:none;cursor:pointer;display:flex;align-items:center;gap:10px;font-weight:700;font-size:15px}
  .gx-msum summary::-webkit-details-marker{display:none}
  .gx-msum summary::after{content:"Show";margin-left:auto;font-size:13px;color:#0b6b4a}
  .gx-msum[open] summary::after{content:"Hide"}
}
@media (max-width:640px){
  .gx-row2,.gx-choices.c2,.gx-ready{grid-template-columns:minmax(0,1fr)}
  .gx-date{grid-template-columns:1.3fr 1fr 1fr;gap:8px}
  .gx-nav{position:sticky;bottom:0;z-index:5;background:#fff;margin-left:calc(-1 * clamp(20px,3.6vw,38px));margin-right:calc(-1 * clamp(20px,3.6vw,38px));padding:12px clamp(20px,3.6vw,38px) calc(12px + env(safe-area-inset-bottom,0px));border-radius:0 0 20px 20px}
  .gx .gx-go{flex:1;min-width:0}
  .gx-sec dl{grid-template-columns:minmax(0,1fr)}
  .gx-sec dt{padding-bottom:0!important;border-bottom:0}
  .gx-stagenames{display:none}
}
@media (prefers-reduced-motion:no-preference){.gx-screen{animation:gxIn .25s ease}}
@keyframes gxIn{from{opacity:.4;transform:translateY(6px)}to{opacity:1;transform:none}}

/* ===== v2 refresh ===== */
.gx{border-color:#e4ebe7;box-shadow:0 1px 2px rgba(16,36,28,.05),0 24px 48px -28px rgba(16,36,28,.28);border-radius:24px}
.gx-code{display:inline-grid;place-items:center;min-width:30px;height:22px;padding:0 5px;border-radius:6px;background:var(--mint);color:var(--brand);font-size:11.5px;font-weight:800;letter-spacing:.04em;border:1px solid var(--mint-line);flex:0 0 auto}
/* one progress indicator, at the top */
.gx-prog{gap:10px;margin:0 0 26px}
.gx-steps{display:flex;align-items:center;gap:10px}
.gx-st{display:flex;align-items:center;gap:8px;flex:0 0 auto;font-size:13.5px;font-weight:700;color:var(--muted)}
.gx-st i{width:26px;height:26px;border-radius:50%;display:grid;place-items:center;font-style:normal;font-size:12.5px;font-weight:800;background:#fff;border:1.5px solid var(--line2);color:var(--muted)}
.gx-st i svg{width:14px;height:14px}
.gx-st.on{color:var(--ink)}
.gx-st.on i{background:var(--ink);border-color:var(--ink);color:#fff}
.gx-st.done{color:var(--brand)}
.gx-st.done i{background:var(--mint);border-color:var(--mint-line);color:var(--brand)}
.gx-stl{flex:1 1 auto;height:1.5px;background:var(--line);border-radius:2px;min-width:12px}
.gx-stl.done{background:var(--mint-line)}
.gx-pbar{height:4px;border-radius:99px;background:#eef3f0;overflow:hidden}
.gx-pbar i{display:block;height:100%;border-radius:inherit;background:linear-gradient(90deg,#1fce7c,#0fa968);transition:width .4s ease}
.gx-pmeta{display:flex;justify-content:space-between;gap:12px;font-size:12.5px;font-weight:600;color:var(--muted)}
/* answer tiles */
.gx .gx-choice{position:relative;flex-direction:column!important;align-items:flex-start;gap:12px;padding:16px 16px 18px!important;border:1.5px solid #e1e8e4!important;border-radius:16px!important;transition:border-color .15s,box-shadow .15s,transform .15s}
.gx .gx-choice:hover{border-color:#b9c9c0!important;box-shadow:0 8px 20px -14px rgba(16,36,28,.35)!important;transform:translateY(-1px)}
.gx .gx-choice[aria-checked="true"]{border-color:var(--brand)!important;background:#fff!important;box-shadow:0 0 0 3px rgba(31,206,124,.18)!important}
.gx-choice .gx-ic{width:42px;height:42px;border-radius:12px;background:#f1f6f3;border:0}
.gx-choice[aria-checked="true"] .gx-ic{background:var(--brand);color:#fff}
.gx-ct b{display:block;font-size:15.5px;font-weight:700;line-height:1.3}
.gx-ct small{display:block;font-size:13px;color:var(--muted);line-height:1.4;margin-top:3px}
.gx-tick{position:absolute;top:14px;right:14px;width:22px;height:22px;border-radius:50%;border:1.5px solid var(--line2);display:grid;place-items:center;color:transparent;background:#fff}
.gx-tick svg{width:13px;height:13px}
.gx-choice[aria-checked="true"] .gx-tick{background:var(--accent);border-color:var(--accent);color:var(--accent-ink)}
.gx-choices{grid-template-columns:repeat(3,minmax(0,1fr))}
.gx-choices.c2{grid-template-columns:repeat(4,minmax(0,1fr))}
/* segmented yes / no */
.gx-seg{display:inline-flex;gap:4px;padding:4px;background:#f1f5f3;border:1px solid #e3eae6;border-radius:14px;align-self:flex-start;max-width:100%;flex-wrap:wrap}
.gx .gx-seg button{display:inline-flex!important;align-items:center;justify-content:center;gap:6px;min-width:96px;min-height:42px!important;height:auto!important;padding:8px 18px!important;border:0!important;border-radius:10px!important;background:transparent!important;color:var(--muted)!important;font-weight:700!important;font-size:14.5px!important;cursor:pointer;margin:0!important;box-shadow:none!important;transition:background .15s,color .15s}
.gx .gx-seg button:hover{color:var(--ink)!important}
.gx .gx-seg button[aria-checked="true"]{background:#fff!important;color:var(--ink)!important;box-shadow:0 1px 2px rgba(16,36,28,.12),0 4px 12px -6px rgba(16,36,28,.25)!important}
.gx-seg button svg{width:15px;height:15px;color:var(--brand)}
.gx-bad .gx-seg{border-color:var(--err)}
/* question rows */
.gx-qlist{display:flex;flex-direction:column;border:1px solid #e4ebe7;border-radius:16px;overflow:hidden;background:#fff}
.gx-qlist > *{padding:16px 18px}
.gx-qlist > * + *{border-top:1px solid #edf2ef}
.gx-q{display:flex;align-items:center;justify-content:space-between;gap:16px}
.gx-q-t{min-width:0;display:flex;flex-direction:column;gap:3px}
.gx-q-t b{font-size:15px;font-weight:700;line-height:1.35}
.gx-q-t small{font-size:13px;color:var(--muted);line-height:1.4}
.gx-q .gx-seg{flex:0 0 auto}
.gx-q.gx-bad{background:#fdf5f4}
.gx-qlist > .gx-f,.gx-qlist > .gx-note{background:#fafcfb}
.gx-qlist > .gx-note{border-radius:0;border-left:0;border-right:0}
/* work chips */
.gx-chips{display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:10px}
.gx .gx-chipo{display:flex!important;align-items:center;gap:12px;padding:12px 14px!important;border:1.5px solid #e1e8e4!important;border-radius:14px!important;background:#fff!important;cursor:pointer;text-align:left;margin:0!important;min-height:0!important;height:auto!important;box-shadow:none!important;color:var(--ink)!important;font-weight:400!important;transition:border-color .15s,box-shadow .15s}
.gx .gx-chipo:hover{border-color:#b9c9c0!important}
.gx .gx-chipo[aria-checked="true"]{border-color:var(--brand)!important;box-shadow:0 0 0 3px rgba(31,206,124,.18)!important}
.gx-chipo-ic{width:36px;height:36px;border-radius:10px;display:grid;place-items:center;background:#f1f6f3;color:var(--brand);flex:0 0 auto}
.gx-chipo[aria-checked="true"] .gx-chipo-ic{background:var(--accent);color:var(--accent-ink)}
.gx-chipo-ic svg{width:18px;height:18px}
.gx-chipo b{display:block;font-size:14.5px;font-weight:700}
.gx-chipo small{display:block;font-size:12.5px;color:var(--muted)}
/* balance scale */
.gx-scale{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:10px}
.gx .gx-scale button{display:flex!important;flex-direction:column;align-items:flex-start;gap:10px;padding:14px!important;border:1.5px solid #e1e8e4!important;border-radius:14px!important;background:#fff!important;cursor:pointer;margin:0!important;min-height:0!important;height:auto!important;box-shadow:none!important;color:var(--ink)!important;text-align:left}
.gx .gx-scale button:hover{border-color:#b9c9c0!important}
.gx .gx-scale button[aria-checked="true"]{border-color:var(--brand)!important;box-shadow:0 0 0 3px rgba(31,206,124,.18)!important}
.gx-scale b{font-size:15px;font-weight:800;font-variant-numeric:tabular-nums}
.gx-bars{display:flex;align-items:flex-end;gap:3px;height:18px}
.gx-bars i{width:6px;border-radius:2px;background:#dfe7e2}
.gx-bars i:nth-child(1){height:6px}.gx-bars i:nth-child(2){height:10px}.gx-bars i:nth-child(3){height:14px}.gx-bars i:nth-child(4){height:18px}
.gx-bars i.on{background:#9adfbd}
.gx-scale button[aria-checked="true"] .gx-bars i.on{background:var(--brand)}
/* typed date */
.gx-dt{display:flex;align-items:center;gap:6px;min-height:54px;padding:0 14px;border:1.5px solid var(--line2);border-radius:14px;background:#fff;cursor:text;max-width:100%}
.gx-dt:focus-within{border-color:var(--brand);box-shadow:0 0 0 4px var(--mint)}
.gx-dt-ic{color:var(--muted);display:grid;place-items:center}
.gx-dt-ic svg{width:18px;height:18px}
.gx .gx-dt input{border:0!important;outline:0!important;box-shadow:none!important;background:transparent!important;padding:0!important;margin:0!important;height:40px!important;min-height:0!important;font-size:17px!important;font-weight:600!important;text-align:center;font-variant-numeric:tabular-nums;color:var(--ink)!important;width:2.4ch}
.gx .gx-dt input[data-seg="y"]{width:4.6ch}
.gx .gx-dt input::placeholder{color:#a9b8b0!important;font-weight:500}
.gx-dt i{font-style:normal;color:#b6c4bc;font-weight:600}
.gx-dt-out{margin-left:auto;padding-left:10px;font-size:13px;font-weight:600;color:var(--brand);white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.gx-bad .gx-dt,.gx-bad .gx-range{border-color:var(--err)!important}
/* travel dates range */
.gx-range{display:grid;grid-template-columns:minmax(0,1fr) auto minmax(0,1fr);align-items:center;border:1.5px solid var(--line2);border-radius:16px;background:#fff;padding:4px}
.gx .gx-rb{display:flex!important;align-items:center;gap:12px;padding:10px 12px!important;border:0!important;border-radius:12px!important;background:transparent!important;cursor:pointer;text-align:left;margin:0!important;min-height:58px!important;height:auto!important;box-shadow:none!important;color:var(--ink)!important;min-width:0}
.gx .gx-rb:hover{background:#f6faf8!important}
.gx .gx-rb.on{background:var(--mint)!important;box-shadow:inset 0 0 0 1.5px var(--brand)!important}
.gx-rb-ic{width:36px;height:36px;border-radius:10px;display:grid;place-items:center;background:#f1f6f3;color:var(--brand);flex:0 0 auto}
.gx-rb-ic svg{width:18px;height:18px}
.gx-rb-t{display:flex;flex-direction:column;min-width:0}
.gx-rb-t small{font-size:12px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:var(--muted)}
.gx-rb-t b{font-size:15.5px;font-weight:700;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.gx-rb-t em{font-style:normal;font-weight:500;color:#97a8a0}
.gx-rsep{display:grid;place-items:center;color:var(--muted);padding:0 6px}
.gx-rsep svg{width:16px;height:16px}
.gx-nights{display:inline-flex;align-items:center;gap:5px;padding:4px 10px;border-radius:99px;background:var(--mint);color:var(--brand);font-size:12.5px;font-weight:800;white-space:nowrap}
.gx-nights svg{width:13px;height:13px}
.gx-cal{position:relative;z-index:8;margin-top:-6px;background:#fff;border:1px solid #dfe7e2;border-radius:18px;box-shadow:0 24px 60px -24px rgba(16,36,28,.45);padding:16px;animation:gxIn .18s ease}
.gx-cal-top{display:flex;align-items:center;justify-content:space-between;gap:10px;margin-bottom:6px}
.gx-cal-tip{margin:0!important;font-size:13.5px!important;font-weight:700;color:var(--brand)!important}
.gx .gx-cal-nav{width:38px;height:38px!important;min-height:0!important;border-radius:50%!important;border:1px solid var(--line)!important;background:#fff!important;display:grid!important;place-items:center;cursor:pointer;padding:0!important;margin:0!important;box-shadow:none!important;color:var(--ink)!important}
.gx .gx-cal-nav[disabled]{opacity:.35;cursor:default}
.gx-cal-nav svg{width:16px;height:16px}
.gx-cms{display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:24px}
.gx-cm-h{margin:0 0 8px!important;text-align:center;font-weight:800;font-size:15px}
.gx-dow,.gx-days{display:grid;grid-template-columns:repeat(7,minmax(0,1fr))}
.gx-dow span{text-align:center;font-size:11.5px;font-weight:700;color:var(--muted);padding:4px 0}
.gx .gx-days button{height:40px!important;min-height:0!important;border:0!important;background:transparent!important;border-radius:10px!important;font-size:14px!important;font-weight:600!important;color:var(--ink)!important;cursor:pointer;padding:0!important;margin:0!important;box-shadow:none!important;font-variant-numeric:tabular-nums}
.gx .gx-days button:hover:not([disabled]){background:#eef6f1!important}
.gx .gx-days button[disabled]{color:#c7d2cc!important;cursor:default}
.gx .gx-days button.t{box-shadow:inset 0 0 0 1px var(--line2)!important}
.gx .gx-days button.in{background:var(--mint)!important;border-radius:0!important}
.gx .gx-days button.s,.gx .gx-days button.e{background:var(--brand)!important;color:#fff!important}
.gx-cal-foot{display:flex;justify-content:space-between;align-items:center;gap:12px;margin-top:12px;padding-top:12px;border-top:1px solid #edf2ef}
.gx .gx-sm{min-height:40px!important;padding:0 20px!important;font-size:14.5px!important;min-width:0}
/* nav */
.gx .gx-ghost{border:0!important;background:transparent!important;padding:0 10px!important;color:var(--muted)!important}
.gx .gx-ghost:hover{color:var(--ink)!important}
@media (max-width:900px){.gx-choices.c2{grid-template-columns:repeat(2,minmax(0,1fr))}.gx-choices{grid-template-columns:repeat(2,minmax(0,1fr))}}
@media (max-width:640px){
  .gx-st span{display:none}.gx-st.on span{display:inline}
  .gx-choices,.gx-choices.c2{grid-template-columns:repeat(2,minmax(0,1fr))}
  .gx .gx-choice{padding:14px!important;gap:10px}
  .gx-ct small{display:none}
  .gx-q{flex-direction:column;align-items:stretch;gap:10px}
  .gx-q .gx-seg,.gx-seg{display:flex;width:100%}
  .gx .gx-seg button{flex:1;min-width:0}
  .gx-scale{grid-template-columns:repeat(2,minmax(0,1fr))}
  .gx-chips{grid-template-columns:minmax(0,1fr)}
  .gx-range{grid-template-columns:minmax(0,1fr)}
  .gx-rsep{padding:2px 0;justify-content:start;padding-left:60px}
  .gx-rsep > svg{transform:rotate(90deg)}
  .gx-cal{padding:12px}
  .gx-dt-out{display:none}
}

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

  /* ---------- field builders ---------- */
  function err(k) { return S.errs[k] ? '<p class="gx-err" id="gx-' + k + '-err">' + ic("warn") + esc(S.errs[k]) + "</p>" : ""; }
  function bad(k) { return S.errs[k] ? " gx-bad" : ""; }
  function why(t) { return '<details class="gx-why"><summary>' + ic("info") + "Why we ask</summary><p>" + t + "</p></details>"; }
  function note(type, t) { return '<div class="gx-note ' + type + '">' + ic(type === "warn" ? "warn" : "info") + "<span>" + t + "</span></div>"; }
  function text(k, lbl, o) {
    o = o || {};
    return '<div class="gx-f' + bad(k) + '"><label class="gx-lbl" for="gx-' + k + '">' + lbl + (o.opt ? ' <span class="gx-opt">(optional)</span>' : "") + "</label>" +
      '<input class="gx-inp" id="gx-' + k + '" data-k="' + k + '" type="' + (o.type || "text") + '" value="' + esc(S[k] || "") + '" placeholder="' + esc(o.ph || "") + '"' + (o.auto ? ' autocomplete="' + o.auto + '"' : "") + (o.mode ? ' inputmode="' + o.mode + '"' : "") + (o.upper ? ' data-upper="1" autocapitalize="characters"' : "") + ">" +
      (o.hint ? '<p class="gx-hint">' + o.hint + "</p>" : "") + err(k) + "</div>";
  }
  function country(k, lbl, o) {
    o = o || {}; var v = S[k];
    var inner = v && NAME[v] ? flag(v) + "<span>" + esc(NAME[v]) + "</span>" : '<span class="gx-ph">' + esc(o.ph || "Search or select a country") + "</span>";
    return '<div class="gx-f' + bad(k) + '"><span class="gx-lbl" id="gx-' + k + '-lbl">' + lbl + "</span>" +
      '<div class="gx-cs" data-cs="' + k + '" data-pop="' + (o.pop || "from") + '"><button type="button" class="gx-csb" aria-haspopup="listbox" aria-expanded="false" aria-labelledby="gx-' + k + '-lbl" id="gx-' + k + '">' + inner + ic("chev", "gx-chev") + "</button></div>" +
      (o.suggest || "") + (o.hint ? '<p class="gx-hint">' + o.hint + "</p>" : "") + err(k) + "</div>";
  }
  function pad(n) { return ("0" + n).slice(-2); }
  function dkey(d) { return d.getFullYear() + "-" + pad(d.getMonth() + 1) + "-" + pad(d.getDate()); }
  function toObj(d) { return { y: String(d.getFullYear()), m: String(d.getMonth() + 1), d: String(d.getDate()) }; }
  function long(k) { var d = dateOf(k); return d && d !== "bad" ? d.toLocaleDateString("en-GB", { weekday: "short", day: "numeric", month: "short", year: "numeric" }) : ""; }
  /* typed date: DD / MM / YYYY in one box */
  function typed(k, lbl, hint) {
    var v = S[k] || {};
    return '<div class="gx-f' + bad(k) + '"><label class="gx-lbl" for="gx-' + k + '">' + lbl + "</label>" +
      '<div class="gx-dt" data-dt="' + k + '"><span class="gx-dt-ic">' + ic("cal") + "</span>" +
      '<input id="gx-' + k + '" data-seg="d" inputmode="numeric" autocomplete="off" maxlength="2" placeholder="DD" aria-label="Day" value="' + esc(v.d ? pad(v.d) : "") + '">' +
      '<i>/</i><input data-seg="m" inputmode="numeric" autocomplete="off" maxlength="2" placeholder="MM" aria-label="Month" value="' + esc(v.m ? pad(v.m) : "") + '">' +
      '<i>/</i><input data-seg="y" inputmode="numeric" autocomplete="off" maxlength="4" placeholder="YYYY" aria-label="Year" value="' + esc(v.y || "") + '">' +
      '<span class="gx-dt-out" data-dt-out="' + k + '">' + esc(dtOut(k)) + "</span></div>" +
      (hint ? '<p class="gx-hint">' + hint + "</p>" : "") + err(k) + "</div>";
  }
  function dtOut(k) {
    var d = dateOf(k); if (!d || d === "bad") return "";
    var txt = d.toLocaleDateString("en-GB", { day: "numeric", month: "long", year: "numeric" });
    if (k === "dob") { var age = TODAY.getFullYear() - d.getFullYear() - ((TODAY.getMonth() < d.getMonth() || (TODAY.getMonth() === d.getMonth() && TODAY.getDate() < d.getDate())) ? 1 : 0); return age >= 0 && age < 130 ? txt + " \u00b7 age " + age : txt; }
    return txt;
  }
  /* travel dates: one range field with a calendar */
  function range() {
    var a = long("arrive"), l = long("leave"), nights = "";
    var A = dateOf("arrive"), L = dateOf("leave");
    if (A && L && A !== "bad" && L !== "bad" && L > A) { var n = Math.round((L - A) / 864e5); nights = n + (n === 1 ? " night" : " nights"); }
    return '<div class="gx-f' + bad("arrive") + bad("leave") + '"><span class="gx-lbl">Travel dates</span>' +
      '<div class="gx-range" id="gx-arrive">' +
      '<button type="button" class="gx-rb" data-rfocus="arrive"><span class="gx-rb-ic">' + ic("cal") + '</span><span class="gx-rb-t"><small>Arrival</small><b>' + (a || '<em>Add date</em>') + "</b></span></button>" +
      '<span class="gx-rsep">' + (nights ? '<span class="gx-nights">' + ic("moon") + nights + "</span>" : ic("arrowR")) + "</span>" +
      '<button type="button" class="gx-rb" id="gx-leave" data-rfocus="leave"><span class="gx-rb-ic">' + ic("cal") + '</span><span class="gx-rb-t"><small>Return</small><b>' + (l || '<em>Add date</em>') + "</b></span></button>" +
      "</div>" + '<p class="gx-hint">Not fixed yet? Pick your best guess. You can change dates later.</p>' + err("arrive") + err("leave") + "</div>";
  }
  function seg(k, opts) {
    return '<div class="gx-seg" role="radiogroup" id="gx-' + k + '">' + opts.map(function (o) { return '<button type="button" role="radio" data-pick="' + k + '" data-v="' + esc(o[0]) + '" aria-checked="' + (S[k] === o[0]) + '">' + (S[k] === o[0] ? ic("check") : "") + esc(o[1]) + "</button>"; }).join("") + "</div>";
  }
  function yn(k, lbl, opts, hint) {
    opts = opts || [["yes", "Yes"], ["no", "No"]];
    return '<div class="gx-f' + bad(k) + '"><span class="gx-lbl" id="gx-' + k + '-lbl">' + lbl + "</span>" + (hint ? '<p class="gx-hint">' + hint + "</p>" : "") + seg(k, opts) + err(k) + "</div>";
  }
  /* question list: one row per yes/no question */
  function qlist(rows) {
    return '<div class="gx-qlist">' + rows.map(function (r) {
      return '<div class="gx-q' + bad(r[0]) + '"><div class="gx-q-t"><b>' + r[1] + "</b>" + (r[2] ? "<small>" + r[2] + "</small>" : "") + err(r[0]) + "</div>" + seg(r[0], r[3] || [["Yes", "Yes"], ["No", "No"]]) + "</div>" + (r[4] || "");
    }).join("") + "</div>";
  }
  function chips(k, lbl, list) {
    return '<div class="gx-f' + bad(k) + '"><span class="gx-lbl">' + lbl + '</span><div class="gx-chips" role="radiogroup" id="gx-' + k + '">' +
      list.map(function (o) { return '<button type="button" role="radio" class="gx-chipo" data-pick="' + k + '" data-v="' + esc(o.v) + '" aria-checked="' + (S[k] === o.v) + '"><span class="gx-chipo-ic">' + ic(S[k] === o.v ? "check" : o.icon) + "</span><span><b>" + esc(o.t) + "</b><small>" + esc(o.d) + "</small></span></button>"; }).join("") + "</div>" + err(k) + "</div>";
  }
  function scale(k, lbl, hint) {
    return '<div class="gx-f' + bad(k) + '"><span class="gx-lbl">' + lbl + "</span>" + (hint ? '<p class="gx-hint">' + hint + "</p>" : "") + '<div class="gx-scale" role="radiogroup" id="gx-' + k + '">' +
      BALANCES.map(function (v, i) { var bars = ""; for (var j = 0; j < 4; j++) bars += "<i" + (j <= i ? ' class="on"' : "") + "></i>"; return '<button type="button" role="radio" data-pick="' + k + '" data-v="' + esc(v) + '" aria-checked="' + (S[k] === v) + '" aria-label="' + esc(v) + '"><span class="gx-bars">' + bars + "</span><b>" + BAL_SHORT[i] + "</b></button>"; }).join("") + "</div>" + err(k) + "</div>";
  }
  function choices(k, lbl, list, cls) {
    return '<div class="gx-f' + bad(k) + '"><span class="gx-lbl" id="gx-' + k + '-lbl">' + lbl + "</span>" +
      '<div class="gx-choices ' + (cls || "") + '" role="radiogroup" aria-labelledby="gx-' + k + '-lbl" id="gx-' + k + '">' +
      list.map(function (o) { return '<button type="button" class="gx-choice" role="radio" data-pick="' + k + '" data-v="' + esc(o.v) + '" aria-checked="' + (S[k] === o.v) + '"><span class="gx-ic">' + ic(o.icon) + '</span><span class="gx-ct"><b>' + esc(o.t) + "</b>" + (o.d ? "<small>" + esc(o.d) + "</small>" : "") + '</span><span class="gx-tick">' + ic("check") + "</span></button>"; }).join("") +
      "</div>" + err(k) + "</div>";
  }
  function select(k, lbl, list, ph) {
    return '<div class="gx-f' + bad(k) + '"><label class="gx-lbl" for="gx-' + k + '">' + lbl + '</label><select class="gx-sel" id="gx-' + k + '" data-k="' + k + '"><option value="">' + ph + "</option>" +
      list.map(function (v) { return "<option" + (S[k] === v ? " selected" : "") + ">" + esc(v) + "</option>"; }).join("") + "</select>" + err(k) + "</div>";
  }
  function phone() {
    var c = S.code;
    return '<div class="gx-f' + bad("phone") + bad("code") + '"><label class="gx-lbl" for="gx-phone">Mobile number</label>' +
      '<div class="gx-phone"><div class="gx-cs" data-cs="code" data-dial="1"><button type="button" class="gx-csb" aria-haspopup="listbox" aria-expanded="false" aria-label="Country code" id="gx-code">' +
      (c ? flag(c) + "<span>" + esc(DIAL[c] || "") + "</span>" : '<span class="gx-ph">Code</span>') + ic("chev", "gx-chev") + "</button></div>" +
      '<input class="gx-inp" id="gx-phone" data-k="phone" type="tel" inputmode="tel" autocomplete="tel-national" placeholder="3001234567" value="' + esc(S.phone || "") + '"></div>' +
      '<p class="gx-hint">Search the code by country name or number, for example "Pakistan" or "92". Leave out the first 0.</p>' + err("code") + err("phone") + "</div>";
  }

  /* ---------- screens ---------- */
  var SCREENS = [
    { id: "start", stage: 0, title: "Apply for your visa in about 6 minutes", lead: "We ask one short group of questions at a time. Have these ready and you won't need to stop halfway.",
      body: function () {
        return '<ul class="gx-ready">' +
          '<li><span class="gx-ic">' + ic("passport") + "</span><span><b>Your passport</b><small>Passport number and expiry date</small></span></li>" +
          '<li><span class="gx-ic">' + ic("plane") + "</span><span><b>Your travel plans</b><small>Rough arrival and return dates are fine</small></span></li>" +
          '<li><span class="gx-ic">' + ic("pin") + "</span><span><b>Your home address</b><small>Where you live now, with postcode</small></span></li>" +
          '<li><span class="gx-ic">' + ic("bank") + "</span><span><b>Work and money</b><small>Your job and an idea of your bank balance</small></span></li></ul>" +
          '<div class="gx-facts"><span>' + ic("save") + "Answers save as you go</span><span>" + ic("lock") + "256-bit encrypted</span><span>" + ic("shield") + "Nothing to pay until you review everything</span></div>";
      }, next: "Start my application" },
    { id: "trip", stage: 0, title: "Where are you going, and why?", lead: "This decides which visa you need and which documents we ask for.",
      body: function () {
        return country("to", "Destination country", { ph: "Where are you travelling to?", pop: "to" }) +
          country("from", "Passport country", { ph: "Which country issued your passport?", hint: "Choose the country printed on your passport, even if you live somewhere else." }) +
          choices("purpose", "Main reason for your trip", PURPOSES) +
          (S.purpose === "other" ? text("purpose_other", "Tell us about your trip", { ph: "For example: medical treatment, a wedding, a sports event" }) : "") +
          why("Visa rules depend on your passport, not where you live. A Pakistani passport holder living in Dubai still applies as a Pakistani citizen.");
      },
      check: function () { return { to: !S.to && "Choose the country you are travelling to.", from: !S.from && "Choose the country that issued your passport.", same: S.to && S.to === S.from && "Your destination and passport country are the same. Check both.", purpose: !S.purpose && "Pick the main reason for your trip.", purpose_other: S.purpose === "other" && !S.purpose_other && "Tell us briefly what the trip is for." }; } },
    { id: "dates", stage: 0, title: "When are you travelling?", lead: "Pick your arrival and return dates. Your best estimate is fine.",
      body: function () {
        return range() + choices("stay", "Where will you stay?", STAYS, "c2") +
          yn("flights", "Have you booked your flights?", [["yes", "Yes, booked"], ["no", "Not yet"]]) +
          (S.flights === "no" ? note("info", "You don't need to buy tickets before your visa is approved. If the embassy asks for a flight plan, we can arrange a flight reservation for you.") : "") +
          why("Embassies check that your trip has a clear start and end date and that the length of stay matches the visa.");
      },
      check: function () {
        var a = dateOf("arrive"), l = dateOf("leave");
        return { arrive: !a ? "Choose your arrival date." : a === "bad" ? "Choose a valid arrival date." : a < TODAY ? "Your arrival date can't be in the past." : "",
          leave: !l ? "Choose your return date." : l === "bad" ? "Choose a valid return date." : (a && a !== "bad" && l <= a) ? "Your return date must be after your arrival date." : "",
          stay: !S.stay && "Choose where you will stay.", flights: !S.flights && "Tell us if your flights are booked." };
      } },
    { id: "you", stage: 1, title: "Tell us about yourself", lead: "Type your name exactly as it appears on your passport, including middle names.",
      body: function () {
        return '<div class="gx-slot" data-slot="scan"></div>' +
          '<div class="gx-row2">' + text("first", "First and middle names", { ph: "Muhammad Ali", auto: "given-name" }) + text("last", "Last name (surname)", { ph: "Khan", auto: "family-name" }) + "</div>" +
          typed("dob", "Date of birth", "Type it as day, month, year. For example 20 05 1990.") +
          yn("gender", "Gender as shown on your passport", [["Male", "Male"], ["Female", "Female"], ["Other", "Other"]]) +
          select("marital", "Marital status", ["Single", "Married", "Divorced", "Widowed"], "Choose your status") +
          why("Your visa is checked against your passport at the border. A single wrong letter in your name can mean a refused or invalid visa.");
      },
      check: function () {
        var d = dateOf("dob");
        return { first: !S.first && "Enter your first name exactly as on your passport.", last: !S.last && "Enter your last name (surname) as on your passport.",
          dob: !d ? "Enter your full date of birth." : d === "bad" ? "That date doesn't exist. Check the day and month." : d > TODAY ? "Your date of birth can't be in the future." : d.getFullYear() < YEAR - 120 ? "Check the year of birth." : "",
          gender: !S.gender && "Choose the gender shown on your passport.", marital: !S.marital && "Choose your marital status." };
      } },
    { id: "contact", stage: 1, title: "How can we reach you?", lead: "We send updates about your application here, and your adviser may message you if a document is missing.",
      body: function () {
        return text("email", "Email address", { type: "email", ph: "you@example.com", auto: "email", mode: "email", hint: "Your confirmation and visa documents are sent to this address." }) +
          phone() + yn("wa", "Can we message you on WhatsApp on this number?", [["yes", "Yes"], ["no", "No, phone and email only"]]) +
          why("Embassies sometimes ask for a document at short notice. A WhatsApp message is the fastest way for your adviser to reach you.");
      },
      check: function () {
        var p = (S.phone || "").replace(/[\s-]/g, "").replace(/^0+/, "");
        return { email: !S.email ? "Enter your email address." : !/^[^@\s]+@[^@\s]+\.[^@\s]{2,}$/.test(S.email) ? "Check your email address. It should look like name@example.com." : "",
          code: !S.code && "Choose your country code.", phone: !p ? "Enter your mobile number." : !/^\d{6,14}$/.test(p) ? "Use numbers only, without the country code." : "", wa: !S.wa && "Choose Yes or No." };
      } },
    { id: "address", stage: 1, title: "Where do you live?", lead: "Your home address now. It must be in the country where you live.",
      body: function () {
        return country("res", "Country of residence", { ph: "Search or select a country", hint: "The country where you live permanently." }) +
          text("addr", "Home address", { ph: "House 12, Street 4, Block B", auto: "street-address" }) +
          '<div class="gx-row2">' + text("city", "City or town", { ph: "Lahore", auto: "address-level2" }) + text("region", "State or province", { ph: "Punjab", auto: "address-level1", opt: true }) + "</div>" +
          text("zip", "Postcode or ZIP", { ph: "54000", auto: "postal-code", opt: true }) +
          why("You usually apply from the country where you live. Your address also tells us which visa centre or embassy handles your file.");
      },
      check: function () { return { res: !S.res && "Choose the country where you live.", addr: !S.addr && "Enter your home address.", city: !S.city && "Enter your city or town." }; } },
    { id: "passport", stage: 1, title: "Your passport", lead: "Open your passport at the photo page. Everything we need is printed there.",
      body: function () {
        return text("pp_no", "Passport number", { ph: "AB1234567", upper: true, hint: "Usually 7 to 9 letters and numbers, top right of the photo page. No spaces." }) +
          typed("pp_exp", "Expiry date", "Printed under \u201cDate of expiry\u201d on the photo page.") +
          warnHtml() +
          why("Most countries need your passport to be valid for at least 6 months after you return, with two blank pages. We check this now so there are no surprises later.");
      },
      check: function () {
        var e = dateOf("pp_exp");
        return { pp_no: !S.pp_no ? "Enter your passport number." : !/^[A-Z0-9]{5,12}$/.test(S.pp_no) ? "Use letters and numbers only, with no spaces or dashes." : "",
          pp_exp: !e ? "Enter your passport's expiry date." : e === "bad" ? "That date doesn't exist. Check the day and month." : e < TODAY ? "This passport has expired. You need a valid passport to apply." : e.getFullYear() > YEAR + 20 ? "Check the year. Passports are valid for 10 years at most." : "" };
      } },
    { id: "money", stage: 1, title: "Work & finances", lead: "Quick questions so your adviser knows which documents to prepare. Pick the closest answers.",
      body: function () {
        return chips("emp", "Your work", JOBS) +
          scale("bal", "Money in your bank account", "Roughly, in US dollars. An estimate is fine.") +
          '<div class="gx-f"><span class="gx-lbl">A few quick checks</span>' + qlist([
            ["stmt", "Can you get a 6-month bank statement?", "Most embassies ask for the last 3 to 6 months."],
            ["prop", "Do you own property at home?", "A house, flat or land in your name."],
            ["sponsor", "Is someone else paying for this trip?", "For example a family member or your employer.", [["yes", "Yes"], ["no", "No"]], S.sponsor === "yes" ? note("info", "We'll ask for your sponsor's details and a support letter later.") : ""]
          ]) + "</div>" +
          why("These answers build your personal document checklist. They are only used for your application.");
      },
      check: function () { return { emp: !S.emp && "Choose your work situation.", bal: !S.bal && "Choose the closest amount.", stmt: !S.stmt && "Choose Yes or No.", prop: !S.prop && "Choose Yes or No.", sponsor: !S.sponsor && "Choose Yes or No." }; } },
    { id: "history", stage: 1, title: "Travel history", lead: "Answer honestly. Embassies can see past applications, and a wrong answer can lead to a refusal.",
      body: function () {
        return qlist([
          ["travelled", "Have you travelled abroad in the last 10 years?", "", null, S.travelled === "Yes" ? text("travelled_where", "Which countries?", { ph: "UAE, Saudi Arabia, Türkiye", hint: "Any order. Dates are not needed now." }) : ""],
          ["refused", "Have you ever been refused a visa?", "For any country.", [["yes", "Yes"], ["no", "No"]], S.refused === "yes" ? text("refused_where", "Which country, and roughly when?", { ph: "United Kingdom, 2023" }) + note("info", "A past refusal doesn't stop you applying. Your adviser will help you address it.") : ""],
          ["crim", "Have you ever been convicted of a criminal offence?", "In any country. Many visa forms ask this."]
        ]);
      },
      check: function () { return { travelled: !S.travelled && "Choose Yes or No.", travelled_where: S.travelled === "Yes" && !S.travelled_where && "List the countries you visited.", refused: !S.refused && "Choose Yes or No.", refused_where: S.refused === "yes" && !S.refused_where && "Tell us which country and roughly when.", crim: !S.crim && "Choose Yes or No." }; } },
    { id: "people", stage: 1, title: "Is anyone travelling with you?", lead: "Add family members or colleagues who need a visa for the same trip. If it's just you, press Continue.",
      body: function () { return '<div class="gx-slot" data-slot="extra"></div>'; } },
    { id: "review", stage: 2, title: "Check your answers", lead: "Make sure everything matches your passport. Use Edit to change anything.",
      body: function () {
        function row(k, v) { return "<dt>" + k + "</dt><dd>" + (v ? esc(v) : '<span class="gx-miss">Missing</span>') + "</dd>"; }
        function sec(t, id, rows) { return '<section class="gx-sec"><div class="gx-sech"><h3>' + t + '</h3><button type="button" class="gx-link" data-goto="' + id + '">Edit</button></div><dl>' + rows + "</dl></section>"; }
        var extra = [].map.call(form.querySelectorAll("[data-extra-list] li[data-saved='1']"), function (li) { var b = li.querySelector("strong,b,h4,p"); return b ? b.textContent.trim() : ""; }).filter(Boolean);
        var yesno = function (v) { return v === "yes" || v === "Yes" ? "Yes" : v === "no" || v === "No" ? "No" : ""; };
        return '<div class="gx-rv">' +
          sec("Trip", "trip", row("Destination", NAME[S.to]) + row("Passport country", NAME[S.from]) + row("Reason", S.purpose === "other" ? (S.purpose_other || "Other") : label(PURPOSES, S.purpose))) +
          sec("Dates and stay", "dates", row("Arrival", fmt("arrive")) + row("Return", fmt("leave")) + row("Staying at", label(STAYS, S.stay)) + row("Flights", S.flights === "yes" ? "Booked" : S.flights === "no" ? "Not booked yet" : "")) +
          sec("About you", "you", row("Name", [S.first, S.last].filter(Boolean).join(" ")) + row("Date of birth", fmt("dob")) + row("Gender", S.gender) + row("Marital status", S.marital)) +
          sec("Passport", "passport", row("Number", S.pp_no) + row("Expires", fmt("pp_exp"))) +
          sec("Contact", "contact", row("Email", S.email) + row("Mobile", S.code && S.phone ? (DIAL[S.code] || "") + " " + S.phone : "") + row("WhatsApp", yesno(S.wa))) +
          sec("Address", "address", row("Country", NAME[S.res]) + row("Address", [S.addr, S.city, S.region, S.zip].filter(Boolean).join(", "))) +
          sec("Work and money", "money", row("Work", label(JOBS, S.emp)) + row("Bank balance", S.bal) + row("Bank statement", yesno(S.stmt)) + row("Owns property", yesno(S.prop)) + row("Paid by", S.sponsor === "yes" ? "Sponsor" : S.sponsor === "no" ? "Applicant" : "")) +
          sec("Travel history", "history", row("Travelled abroad", S.travelled === "Yes" ? "Yes" + (S.travelled_where ? ", " + S.travelled_where : "") : yesno(S.travelled)) + row("Visa refused before", S.refused === "yes" ? "Yes" + (S.refused_where ? ", " + S.refused_where : "") : yesno(S.refused)) + row("Criminal conviction", yesno(S.crim))) +
          sec("Travellers", "people", row("Main applicant", [S.first, S.last].filter(Boolean).join(" ")) + "<dt>Also travelling</dt><dd>" + (extra.length ? esc(extra.join(", ")) : "No one else") + "</dd>") +
          "</div>" +
          '<label class="gx-check' + bad("agree") + '"><input type="checkbox" id="gx-agree" data-agree="1"' + (rget("agree_terms") ? " checked" : "") + '><span>I confirm the information is correct and complete, and I agree to the Alif Visa <a href="/terms/" target="_blank" rel="noopener">Terms and Conditions</a> and <a href="/refund-policy/" target="_blank" rel="noopener">Refund Policy</a>. False information may lead to my application being refused.</span></label>' +
          err("agree") +
          '<div style="margin-top:16px">' + note("info", (LOGGED_IN ? "" : "You'll sign in or create a free account next, so you can track your application. ") + "Your Alif Visa service fee is shown before you pay. Card payments are handled securely by Stripe. Government or visa-centre fees are separate where they apply.") + "</div>";
      },
      check: function () {
        var miss = SCREENS.slice(1, 10).filter(function (s) { return s.check && hasErr(s.check()); })[0];
        return { agree: miss ? "Some answers are missing in “" + miss.title + "”. Press Edit to complete them." : !rget("agree_terms") && "Tick the box to confirm your details and accept the Terms." };
      }, next: LOGGED_IN ? "Continue to payment" : "Continue" }
  ];
  var IDX = {}; SCREENS.forEach(function (s, i) { IDX[s.id] = i; });
  var TOTAL = SCREENS.length - 1;
  function hasErr(e) { for (var k in e) if (e[k]) return true; return false; }

  /* ---------- mount ---------- */
  var root = document.createElement("div"); root.className = "gx"; root.id = "gx";
  var holder = document.createElement("div"); holder.hidden = true; holder.className = "gx-holder";
  var steps = form.querySelector(".avx-steps");
  if (steps && steps.nextSibling) form.insertBefore(root, steps.nextSibling); else form.insertBefore(root, form.firstChild);
  form.appendChild(holder);
  form.classList.add("gx-on");
  var scanNode = form.querySelector(".alif-passport-scan");
  var extraNode = form.querySelector(".alif-extra-travellers");
  var addNode = form.querySelector("[data-extra-add-wrap]");
  var MOVE = { scan: [scanNode], extra: [extraNode, addNode] };
  function park() { [scanNode, extraNode, addNode].forEach(function (n) { if (n && n.parentNode !== holder) holder.appendChild(n); }); }
  park();
  var side = document.querySelector(".avf__help");
  var aside = document.createElement("div"); aside.className = "gx-aside";
  if (side) { side.appendChild(aside); side.classList.add("gx-side-on"); }
  var heroP = document.querySelector(".avx-hero p"); if (heroP) heroP.textContent = "Answer a few short questions, one screen at a time. Your answers save as you go.";

  function sumHtml() {
    var dest = S.to && NAME[S.to] ? flag(S.to) + "<span>" + esc(NAME[S.to]) + " visa" + (S.purpose ? "<small>" + esc(label(PURPOSES, S.purpose)) + "</small>" : "") + "</span>" : '<span style="color:#5a6e65;font-weight:600;font-size:15px">Choose a destination to begin</span>';
    var extra = form.querySelectorAll("[data-extra-list] li[data-saved='1']").length;
    var rows = [["Passport", NAME[S.from]], ["Travel dates", fmt("arrive") && fmt("leave") ? fmt("arrive") + " – " + fmt("leave") : ""], ["Travellers", S.first ? S.first + " " + (S.last || "") + (extra ? " +" + extra : "") : ""]];
    return '<div class="gx-dest">' + dest + '</div><dl class="gx-sum">' + rows.map(function (r) { return "<div><dt>" + r[0] + "</dt><dd>" + (r[1] ? esc(r[1]) : '<span style="color:#5a6e65;font-weight:500">–</span>') + "</dd></div>"; }).join("") + "</dl>";
  }
  function renderAside() {
    var todo = [["Trip details", S.to && S.from && S.purpose && dateOf("arrive") && dateOf("leave")], ["Personal details", S.first && S.last && dateOf("dob") && S.gender], ["Passport", S.pp_no && dateOf("pp_exp")], ["Contact and address", S.email && S.phone && S.res && S.addr], ["Work and travel history", S.emp && S.bal && S.crim]];
    aside.innerHTML = '<div class="gx-box">' + sumHtml() + "</div>" +
      '<div class="gx-box gx-help"><p>Stuck on a question? Message a UK adviser on WhatsApp.</p><a href="https://wa.me/447482331249" target="_blank" rel="noopener">' + ic("chat") + "+44 7482 331249</a><p style=\"margin-top:6px!important;color:#5a6e65;font-size:13px\">Monday to Friday, 09:00 to 18:00 UK time</p></div>" +
      '<div class="gx-box"><div class="gx-trust"><span>' + ic("shield") + "UK-registered company, Wolverhampton</span><span>" + ic("lock") + "256-bit encrypted form</span><span>" + ic("info") + "Private service, not a government website</span></div></div>";
  }
  function render(focusErr, keepScroll) {
    var y = window.scrollY;
    park();
    var sc = SCREENS[S.step], cur = sc.stage;
    var inStage = SCREENS.filter(function (s) { return s.stage === cur && s.id !== "start"; });
    var pos = inStage.indexOf(sc);
    var steps = STAGES.map(function (n, i) { return '<div class="gx-st' + (i < cur ? " done" : i === cur ? " on" : "") + '"' + (i === cur ? ' aria-current="step"' : "") + '><i>' + (i < cur ? ic("check") : i + 1) + "</i><span>" + n + "</span></div>" + (i < 2 ? '<b class="gx-stl' + (i < cur ? " done" : "") + '"></b>' : ""); }).join("");
    var pct = Math.round(S.step / TOTAL * 100), left = Math.max(1, Math.round((TOTAL - S.step) * 0.6));
    var meta = S.step === 0 ? "Takes about 6 minutes" : S.step === TOTAL ? "Last step" : "About " + left + " min left";
    var back = S.step > 0 ? '<button type="button" class="gx-btn gx-ghost" id="gx-back">' + ic("arrowL") + "Back</button>" : "<span></span>";
    root.innerHTML = '<details class="gx-msum"><summary>' + ic("passport") + 'Your application</summary><div style="margin-top:12px">' + sumHtml() + "</div></details>" +
      '<div class="gx-screen">' +
      '<h2 class="gx-title" id="gx-h" tabindex="-1">' + sc.title + '</h2><p class="gx-lead">' + sc.lead + '</p><div class="gx-fields">' + sc.body() + "</div>" +
      (S.errs.same ? '<p class="gx-err" style="margin-top:14px!important">' + ic("warn") + esc(S.errs.same) + "</p>" : "") +
      '<div class="gx-nav">' + back + '<button type="button" class="gx-btn gx-go" id="gx-next">' + (sc.next || "Continue") + ic("arrowR") + "</button></div></div>";
    root.querySelectorAll("[data-slot]").forEach(function (slot) { (MOVE[slot.getAttribute("data-slot")] || []).forEach(function (n) { if (n) slot.appendChild(n); }); });
    renderAside(); bind(); syncSteps();
    if (keepScroll) window.scrollTo(0, y);
    if (focusErr) {
      var k = Object.keys(S.errs).filter(function (x) { return S.errs[x]; })[0];
      var el = k && (document.getElementById("gx-" + k) || document.getElementById("gx-" + k + "-err"));
      if (el) { el.scrollIntoView({ block: "center", behavior: "smooth" }); try { el.focus({ preventScroll: true }); } catch (e) {} }
    }
  }
  var OLD_STEP = { start: 1, trip: 1, dates: 1, you: 2, contact: 2, address: 2, passport: 3, money: 3, history: 3, people: 3, review: 4 };
  function syncSteps() {
    if (!steps) return;
    var cur = OLD_STEP[SCREENS[S.step].id] || 1;
    steps.querySelectorAll("li[data-avx-step]").forEach(function (li) {
      var n = +li.getAttribute("data-avx-step");
      li.classList.toggle("is-cur", n === cur); li.classList.toggle("is-done", n < cur);
      if (n === cur) li.setAttribute("aria-current", "step"); else li.removeAttribute("aria-current");
    });
    steps.style.setProperty("--avx-p", Math.max(4, Math.round(S.step / TOTAL * 100)) + "%");
  }
  if (steps) new MutationObserver(function () { var li = steps.querySelector("li.is-cur"); var want = String(OLD_STEP[SCREENS[S.step].id] || 1); if (!li || li.getAttribute("data-avx-step") !== want) syncSteps(); }).observe(steps, { attributes: true, subtree: true, attributeFilter: ["class"] });
  function go(i) {
    S.step = Math.max(0, Math.min(TOTAL, i)); S.errs = {};
    try { sessionStorage.setItem("alifGxStep", String(S.step)); } catch (e) {}
    render();
    var top = root.getBoundingClientRect().top + window.scrollY - 100;
    window.scrollTo({ top: Math.max(0, top), behavior: "smooth" });
    var h = document.getElementById("gx-h"); if (h) try { h.focus({ preventScroll: true }); } catch (e) {}
  }
  function passportWarn() {
    S.warn = "";
    var e = dateOf("pp_exp"), l = dateOf("leave");
    if (e && e !== "bad" && e >= TODAY && l && l !== "bad") {
      var need = new Date(l); need.setMonth(need.getMonth() + 6);
      if (e < need) S.warn = "Your passport expires less than 6 months after your return date (" + fmt("leave") + "). Many countries will refuse entry. Renew it first if you can, or talk to an adviser.";
    }
  }

  /* ---------- events ---------- */
  function bind() {
    root.querySelectorAll("[data-k]").forEach(function (el) {
      el.addEventListener(el.tagName === "SELECT" ? "change" : "input", function () {
        var k = el.getAttribute("data-k"), v = el.value;
        if (el.getAttribute("data-upper")) { v = v.toUpperCase().replace(/\s+/g, ""); el.value = v; }
        S[k] = v; push();
        if (S.errs[k]) { S.errs[k] = ""; var f = el.closest(".gx-f"); if (f) f.classList.remove("gx-bad"); var m = document.getElementById("gx-" + k + "-err"); if (m) m.remove(); }
        renderAside();
      });
    });
    root.querySelectorAll("[data-dt]").forEach(bindTyped);
    root.querySelectorAll("[data-rfocus]").forEach(function (b) { b.addEventListener("click", function (e) { e.stopPropagation(); openCal(b.getAttribute("data-rfocus")); }); });
    root.querySelectorAll("[data-pick]").forEach(function (el) {
      el.addEventListener("click", function () {
        var k = el.getAttribute("data-pick"), v = el.getAttribute("data-v");
        S[k] = v; S.errs[k] = ""; push(); render(false, true);
        var again = root.querySelector('[data-pick="' + k + '"][data-v="' + v.replace(/"/g, '\\"') + '"]'); if (again) again.focus();
      });
    });
    root.querySelectorAll("[data-set]").forEach(function (el) { el.addEventListener("click", function () { S[el.getAttribute("data-set")] = el.getAttribute("data-v"); S.errs.res = ""; push(); render(false, true); }); });
    root.querySelectorAll("[data-goto]").forEach(function (el) { el.addEventListener("click", function () { go(IDX[el.getAttribute("data-goto")]); }); });
    var ag = root.querySelector("[data-agree]"); if (ag) ag.addEventListener("change", function () { rset("agree_terms", ag.checked ? "1" : ""); S.errs.agree = ""; });
    root.querySelectorAll("[data-cs]").forEach(bindPicker);
    var back = document.getElementById("gx-back"); if (back) back.addEventListener("click", function () { go(S.step - 1); });
    document.getElementById("gx-next").addEventListener("click", next);
  }
  function next() {
    var sc = SCREENS[S.step], e = sc.check ? sc.check() : {}, clean = {};
    for (var k in e) if (e[k]) clean[k] = e[k];
    if (sc.id === "people") { var open = form.querySelector("[data-extra-list] li.is-editing"); if (open) { open.scrollIntoView({ block: "center", behavior: "smooth" }); var msg = open.querySelector(".gx-err") || document.createElement("p"); msg.className = "gx-err"; msg.textContent = "Save or cancel this traveller before you continue."; if (!msg.parentNode) open.appendChild(msg); return; } }
    if (hasErr(clean)) { S.errs = clean; return render(true, true); }
    push();
    if (sc.id === "passport") passportWarn();
    if (sc.id === "review") return submit();
    go(S.step + 1);
  }
  function submit() {
    push(); rset("agree_terms", "1");
    var real = form.querySelector("[data-wizard-step='review'] [data-go-stripe]");
    var btn = document.getElementById("gx-next");
    if (LOGGED_IN && btn) { btn.disabled = true; btn.textContent = "Opening secure payment…"; }
    if (real) real.click(); else HTMLFormElement.prototype.submit.call(form);
    window.addEventListener("pageshow", function () { var b = document.getElementById("gx-next"); if (b) { b.disabled = false; } });
  }

  /* typed DD / MM / YYYY */
  function bindTyped(box) {
    var k = box.getAttribute("data-dt"), ins = box.querySelectorAll("input"), out = box.querySelector("[data-dt-out]");
    function save() {
      var o = { d: String(+ins[0].value || ""), m: String(+ins[1].value || ""), y: ins[2].value.length === 4 ? ins[2].value : "" };
      if (o.d === "0") o.d = ""; if (o.m === "0") o.m = "";
      S[k] = o; push(); out.textContent = dtOut(k);
      if (S.errs[k]) { S.errs[k] = ""; var f = box.closest(".gx-f"); if (f) f.classList.remove("gx-bad"); var m = document.getElementById("gx-" + k + "-err"); if (m) m.remove(); }
      if (k === "pp_exp") { var had = S.warn; passportWarn(); if (had !== S.warn) { var w = root.querySelector("[data-warn]"); if (w) w.outerHTML = warnHtml(); } }
      renderAside();
    }
    ins.forEach(function (inp, i) {
      inp.addEventListener("input", function () {
        var v = inp.value.replace(/\D/g, ""); var max = i === 2 ? 4 : 2;
        if (i === 0 && v.length === 1 && +v > 3) v = "0" + v;
        if (i === 1 && v.length === 1 && +v > 1) v = "0" + v;
        if (i === 1 && +v > 12) v = "12"; if (i === 0 && +v > 31) v = "31";
        inp.value = v.slice(0, max);
        if (inp.value.length === max && ins[i + 1]) { ins[i + 1].focus(); ins[i + 1].select(); }
        save();
      });
      inp.addEventListener("keydown", function (e) { if (e.key === "Backspace" && !inp.value && ins[i - 1]) { e.preventDefault(); ins[i - 1].focus(); } });
      inp.addEventListener("paste", function (e) {
        var t = (e.clipboardData || window.clipboardData).getData("text"), m = /(\d{1,2})\D+(\d{1,2})\D+(\d{4})/.exec(t);
        if (m) { e.preventDefault(); ins[0].value = pad(m[1]); ins[1].value = pad(m[2]); ins[2].value = m[3]; save(); ins[2].focus(); }
      });
    });
    box.addEventListener("click", function (e) { if (e.target === box || e.target.closest(".gx-dt-ic")) { var first = [].filter.call(ins, function (x) { return !x.value; })[0] || ins[0]; first.focus(); } });
  }
  function warnHtml() { return '<div data-warn>' + (S.warn ? note("warn", S.warn) : "") + "</div>"; }

  /* range calendar */
  var calFocus = "arrive", calView = null;
  function openCal(focus) {
    calFocus = focus;
    var A = dateOf("arrive"); var base = (focus === "leave" && dateOf("leave") && dateOf("leave") !== "bad") ? dateOf("leave") : (A && A !== "bad" ? A : TODAY);
    calView = new Date(base.getFullYear(), base.getMonth(), 1);
    if (focus === "leave" && A && A !== "bad") calView = new Date(A.getFullYear(), A.getMonth(), 1);
    drawCal();
  }
  function closeCal() { var p = root.querySelector(".gx-cal"); if (p) p.remove(); root.querySelectorAll("[data-rfocus]").forEach(function (b) { b.classList.remove("on"); }); }
  function drawCal() {
    var wrap = root.querySelector(".gx-range"); if (!wrap) return;
    var old = root.querySelector(".gx-cal"); if (old) old.remove();
    root.querySelectorAll("[data-rfocus]").forEach(function (b) { b.classList.toggle("on", b.getAttribute("data-rfocus") === calFocus); });
    var A = dateOf("arrive"), L = dateOf("leave"); if (A === "bad") A = null; if (L === "bad") L = null;
    var two = window.matchMedia("(min-width: 760px)").matches, html = "";
    for (var mo = 0; mo < (two ? 2 : 1); mo++) {
      var first = new Date(calView.getFullYear(), calView.getMonth() + mo, 1), days = new Date(first.getFullYear(), first.getMonth() + 1, 0).getDate();
      var lead = (first.getDay() + 6) % 7, cells = "";
      for (var e = 0; e < lead; e++) cells += "<span></span>";
      for (var d = 1; d <= days; d++) {
        var dt = new Date(first.getFullYear(), first.getMonth(), d), dis = dt < TODAY || (calFocus === "leave" && A && dt <= A) || dt > new Date(YEAR + 2, 11, 31);
        var cls = []; if (A && +dt === +A) cls.push("s"); if (L && +dt === +L) cls.push("e"); if (A && L && dt > A && dt < L) cls.push("in"); if (+dt === +TODAY) cls.push("t");
        cells += '<button type="button" data-day="' + dkey(dt) + '" class="' + cls.join(" ") + '"' + (dis ? " disabled" : "") + ' aria-label="' + dt.toDateString() + '">' + d + "</button>";
      }
      html += '<div class="gx-cm"><p class="gx-cm-h">' + MONTHS[first.getMonth()] + " " + first.getFullYear() + '</p><div class="gx-dow"><span>Mo</span><span>Tu</span><span>We</span><span>Th</span><span>Fr</span><span>Sa</span><span>Su</span></div><div class="gx-days">' + cells + "</div></div>";
    }
    var canPrev = new Date(calView.getFullYear(), calView.getMonth(), 1) > new Date(YEAR, NOW.getMonth(), 1);
    var p = document.createElement("div"); p.className = "gx-cal";
    p.innerHTML = '<div class="gx-cal-top"><button type="button" class="gx-cal-nav" data-cnav="-1" aria-label="Previous month"' + (canPrev ? "" : " disabled") + ">" + ic("left") + '</button><p class="gx-cal-tip">' + (calFocus === "arrive" ? "Select your arrival date" : "Select your return date") + '</p><button type="button" class="gx-cal-nav" data-cnav="1" aria-label="Next month">' + ic("right") + "</button></div>" +
      '<div class="gx-cms">' + html + '</div><div class="gx-cal-foot"><button type="button" class="gx-link" data-cclear>Clear dates</button><button type="button" class="gx-btn gx-go gx-sm" data-cdone>Done</button></div>';
    wrap.parentNode.insertBefore(p, wrap.nextSibling);
    p.addEventListener("click", function (ev) {
      ev.stopPropagation();
      var nav = ev.target.closest("[data-cnav]"), day = ev.target.closest("[data-day]");
      if (nav && !nav.disabled) { calView = new Date(calView.getFullYear(), calView.getMonth() + (+nav.getAttribute("data-cnav")), 1); return drawCal(); }
      if (ev.target.closest("[data-cclear]")) { S.arrive = {}; S.leave = {}; push(); calFocus = "arrive"; return refreshRange(); }
      if (ev.target.closest("[data-cdone]")) { closeCal(); return; }
      if (day && !day.disabled) {
        var m = day.getAttribute("data-day").split("-"), picked = new Date(+m[0], +m[1] - 1, +m[2]);
        var A2 = dateOf("arrive");
        if (calFocus === "arrive" || !A2 || A2 === "bad" || picked <= A2) { S.arrive = toObj(picked); var L2 = dateOf("leave"); if (L2 && L2 !== "bad" && L2 <= picked) S.leave = {}; calFocus = "leave"; S.errs.arrive = ""; push(); refreshRange(); }
        else { S.leave = toObj(picked); S.errs.leave = ""; push(); refreshRange(); closeCal(); }
      }
    });
  }
  function refreshRange() {
    var f = root.querySelector(".gx-range").closest(".gx-f"), open = !!root.querySelector(".gx-cal");
    var tmp = document.createElement("div"); tmp.innerHTML = range(); var nf = tmp.firstChild;
    f.parentNode.replaceChild(nf, f);
    nf.querySelectorAll("[data-rfocus]").forEach(function (b) { b.addEventListener("click", function (e) { e.stopPropagation(); openCal(b.getAttribute("data-rfocus")); }); });
    if (open) drawCal();
    renderAside();
  }
  document.addEventListener("click", function (e) { if (!e.target.closest(".gx-cal") && !e.target.closest("[data-rfocus]")) closeCal(); });
  document.addEventListener("keydown", function (e) { if (e.key === "Escape") closeCal(); });

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
  form.addEventListener("input", function (e) { if (writing || root.contains(e.target)) return; if (e.target.closest && e.target.closest("[data-extra-list]")) return; clearTimeout(pullTimer); pullTimer = setTimeout(function () { pull(); renderAside(); }, 300); });
  if (extraNode) new MutationObserver(function () { renderAside(); }).observe(extraNode, { childList: true, subtree: true, attributes: true, attributeFilter: ["data-saved"] });

  pull();
  var start = 0;
  try { var saved = +sessionStorage.getItem("alifGxStep"); if (saved > 0 && saved <= TOTAL && SCREENS.slice(1, saved).every(function (s) { return !s.check || !hasErr(s.check()); })) start = saved; } catch (e) {}
  if (SCREENS.slice(1, 10).every(function (s) { return !s.check || !hasErr(s.check()); })) start = IDX.review;
  if (/alif_error=1/.test(location.search)) start = IDX.review;
  S.step = start;
  render();
  setTimeout(function () {
    pull();
    if (form.querySelector("[data-wizard-step='review'] [style*='e7f8ef']") || SCREENS.slice(1, 10).every(function (s) { return !s.check || !hasErr(s.check()); })) S.step = IDX.review;
    render();
  }, 600);
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
