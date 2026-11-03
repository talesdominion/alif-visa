
/* ===== Alif form fixes: all dialling codes, searchable pickers, no default countries ===== */
function alif_dial_codes() {
    return ['AF'=>'+93','AX'=>'+358','AL'=>'+355','DZ'=>'+213','AS'=>'+1684','AD'=>'+376','AO'=>'+244','AI'=>'+1264','AG'=>'+1268','AR'=>'+54','AM'=>'+374','AW'=>'+297','AC'=>'+247','AU'=>'+61','AT'=>'+43','AZ'=>'+994','BS'=>'+1242','BH'=>'+973','BD'=>'+880','BB'=>'+1246','BY'=>'+375','BE'=>'+32','BZ'=>'+501','BJ'=>'+229','BM'=>'+1441','BT'=>'+975','BO'=>'+591','BQ'=>'+599','BA'=>'+387','BW'=>'+267','BR'=>'+55','IO'=>'+246','VG'=>'+1284','BN'=>'+673','BG'=>'+359','BF'=>'+226','BI'=>'+257','KH'=>'+855','CM'=>'+237','CA'=>'+1','CV'=>'+238','KY'=>'+1345','CF'=>'+236','TD'=>'+235','CL'=>'+56','CN'=>'+86','CX'=>'+61','CC'=>'+61','CO'=>'+57','KM'=>'+269','CG'=>'+242','CD'=>'+243','CK'=>'+682','CR'=>'+506','CI'=>'+225','HR'=>'+385','CU'=>'+53','CW'=>'+599','CY'=>'+357','CZ'=>'+420','DK'=>'+45','DJ'=>'+253','DM'=>'+1767','DO'=>'+1809','EC'=>'+593','EG'=>'+20','SV'=>'+503','GQ'=>'+240','ER'=>'+291','EE'=>'+372','SZ'=>'+268','ET'=>'+251','FK'=>'+500','FO'=>'+298','FJ'=>'+679','FI'=>'+358','FR'=>'+33','GF'=>'+594','PF'=>'+689','GA'=>'+241','GM'=>'+220','GE'=>'+995','DE'=>'+49','GH'=>'+233','GI'=>'+350','GR'=>'+30','GL'=>'+299','GD'=>'+1473','GP'=>'+590','GU'=>'+1671','GT'=>'+502','GG'=>'+44','GN'=>'+224','GW'=>'+245','GY'=>'+592','HT'=>'+509','HN'=>'+504','HK'=>'+852','HU'=>'+36','IS'=>'+354','IN'=>'+91','ID'=>'+62','IR'=>'+98','IQ'=>'+964','IE'=>'+353','IM'=>'+44','IL'=>'+972','IT'=>'+39','JM'=>'+1876','JP'=>'+81','JE'=>'+44','JO'=>'+962','KZ'=>'+7','KE'=>'+254','KI'=>'+686','XK'=>'+383','KW'=>'+965','KG'=>'+996','LA'=>'+856','LV'=>'+371','LB'=>'+961','LS'=>'+266','LR'=>'+231','LY'=>'+218','LI'=>'+423','LT'=>'+370','LU'=>'+352','MO'=>'+853','MG'=>'+261','MW'=>'+265','MY'=>'+60','MV'=>'+960','ML'=>'+223','MT'=>'+356','MH'=>'+692','MQ'=>'+596','MR'=>'+222','MU'=>'+230','YT'=>'+262','MX'=>'+52','FM'=>'+691','MD'=>'+373','MC'=>'+377','MN'=>'+976','ME'=>'+382','MS'=>'+1664','MA'=>'+212','MZ'=>'+258','MM'=>'+95','NA'=>'+264','NR'=>'+674','NP'=>'+977','NL'=>'+31','NC'=>'+687','NZ'=>'+64','NI'=>'+505','NE'=>'+227','NG'=>'+234','NU'=>'+683','NF'=>'+672','KP'=>'+850','MK'=>'+389','MP'=>'+1670','NO'=>'+47','OM'=>'+968','PK'=>'+92','PW'=>'+680','PS'=>'+970','PA'=>'+507','PG'=>'+675','PY'=>'+595','PE'=>'+51','PH'=>'+63','PN'=>'+64','PL'=>'+48','PT'=>'+351','PR'=>'+1787','QA'=>'+974','RE'=>'+262','RO'=>'+40','RU'=>'+7','RW'=>'+250','BL'=>'+590','SH'=>'+290','KN'=>'+1869','LC'=>'+1758','MF'=>'+590','PM'=>'+508','VC'=>'+1784','WS'=>'+685','SM'=>'+378','ST'=>'+239','SA'=>'+966','SN'=>'+221','RS'=>'+381','SC'=>'+248','SL'=>'+232','SG'=>'+65','SX'=>'+1721','SK'=>'+421','SI'=>'+386','SB'=>'+677','SO'=>'+252','ZA'=>'+27','KR'=>'+82','SS'=>'+211','ES'=>'+34','LK'=>'+94','SD'=>'+249','SR'=>'+597','SJ'=>'+47','SE'=>'+46','CH'=>'+41','SY'=>'+963','TW'=>'+886','TJ'=>'+992','TZ'=>'+255','TH'=>'+66','TL'=>'+670','TG'=>'+228','TK'=>'+690','TO'=>'+676','TT'=>'+1868','TA'=>'+290','TN'=>'+216','TR'=>'+90','TM'=>'+993','TC'=>'+1649','TV'=>'+688','UG'=>'+256','UA'=>'+380','AE'=>'+971','GB'=>'+44','US'=>'+1','UY'=>'+598','VI'=>'+1340','UZ'=>'+998','VU'=>'+678','VA'=>'+39','VE'=>'+58','VN'=>'+84','WF'=>'+681','EH'=>'+212','YE'=>'+967','ZM'=>'+260','ZW'=>'+263'];
}

/** <option> list with every country's dialling code. $selected_iso picks the default (empty = none). */
function alif_dial_code_options($selected_iso = '') {
    $selected_iso = strtoupper((string) $selected_iso);
    $dial = alif_dial_codes();
    $rows = [];
    foreach (alif_get_countries() as $c) {
        if (isset($dial[$c['code']])) {
            $rows[$c['code']] = html_entity_decode((string) $c['name'], ENT_QUOTES, 'UTF-8');
        }
    }
    if (!isset($rows['XK'])) {
        $rows['XK'] = 'Kosovo';
    }
    asort($rows, SORT_NATURAL | SORT_FLAG_CASE);
    $out = '<option value="">Code</option>';
    foreach ($rows as $iso => $name) {
        $out .= sprintf(
            '<option value="%s" data-iso="%s"%s>%s (%s)</option>',
            esc_attr($dial[$iso]),
            esc_attr($iso),
            $iso === $selected_iso ? ' selected' : '',
            esc_html($name),
            esc_html($dial[$iso])
        );
    }
    return $out;
}

function alif_form_fixes_footer() {
    if (is_admin()) {
        return;
    }
    ?>
<style id="alif-form-fixes">
.avd{position:relative;flex:0 0 auto;display:flex}
.avd__native{position:absolute!important;opacity:0!important;pointer-events:none!important;width:1px!important;height:1px!important;left:0;bottom:0}
.avd__btn{display:flex;align-items:center;gap:6px;min-height:48px;height:100%;padding:0 10px 0 12px;border:1px solid #d6dde3;border-radius:12px;background:#fff;color:#0f172a;font:inherit;font-weight:600;font-size:15px;cursor:pointer;white-space:nowrap}
.avd__btn:focus-visible{outline:2px solid #10b981;outline-offset:2px}
.avd__btn img{width:22px;height:16px;border-radius:2px;object-fit:cover;display:block}
.avd__btn svg{width:14px;height:14px;opacity:.6}
.avd__ph{color:#64748b;font-weight:500}
.avd__panel{position:absolute;z-index:80;top:calc(100% + 6px);left:0;width:min(340px,calc(100vw - 32px));background:#fff;border:1px solid #e2e8f0;border-radius:14px;box-shadow:0 18px 40px rgba(15,23,42,.18);padding:8px}
.avd__search{width:100%;height:44px;border:1px solid #d6dde3;border-radius:10px;padding:0 12px;font:inherit;font-size:16px;box-sizing:border-box}
.avd__list{max-height:280px;overflow:auto;margin-top:6px;overscroll-behavior:contain}
.avd__opt{display:flex;align-items:center;gap:10px;width:100%;padding:10px 8px;border:0;background:none;text-align:left;font:inherit;font-size:15px;color:#0f172a;border-radius:8px;cursor:pointer}
.avd__opt img{width:22px;height:16px;border-radius:2px;object-fit:cover;flex:0 0 auto}
.avd__opt span{flex:1;min-width:0;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.avd__opt b{font-weight:600;color:#475569}
.avd__opt:hover,.avd__opt.is-active{background:#ecfdf5}
.avd__empty{padding:12px 8px;color:#64748b;font-size:14px;margin:0}
.avd-row{display:flex;gap:8px;align-items:stretch}
.avd-row>input{flex:1;min-width:0}
.avd.is-invalid .avd__btn{border-color:#dc2626}
.alif-country-select.is-invalid .alif-country-select__trigger{border-color:#dc2626!important;box-shadow:0 0 0 3px rgba(220,38,38,.12)!important}
.alif-cs-err{color:#dc2626;font-size:13px;font-weight:600;margin:6px 0 0}
.alif-country-select__placeholder{color:#64748b}
</style>
<script id="alif-form-fixes-js">
(function(){
  var DIAL = <?php echo wp_json_encode(alif_dial_codes()); ?>;
  var FLAGS = <?php echo wp_json_encode(function_exists('alif_asset') ? alif_asset('flags/') : ''); ?>;
  function dec(s){var t=document.createElement('textarea');t.innerHTML=s;return t.value;}
  function esc(s){return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/"/g,'&quot;');}
  function fold(s){s=String(s||'').toLowerCase();try{s=s.normalize('NFD').replace(/[̀-ͯ]/g,'');}catch(e){}return s;}
  function flag(iso){return (FLAGS||((window.AlifVisa&&AlifVisa.flagBase)||''))+String(iso).toLowerCase()+'.svg';}
  function names(){var m={};((window.AlifVisa&&AlifVisa.countries)||[]).forEach(function(c){m[c.code]=dec(c.name);});if(!m.XK)m.XK='Kosovo';return m;}
  var CHEV='<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>';

  function fillOptions(sel){
    var n=names(),rows=[];
    Object.keys(DIAL).forEach(function(iso){if(n[iso])rows.push([iso,n[iso],DIAL[iso]]);});
    rows.sort(function(a,b){return a[1].localeCompare(b[1]);});
    sel.innerHTML='<option value="">Code</option>'+rows.map(function(r){return '<option value="'+r[2]+'" data-iso="'+r[0]+'">'+esc(r[1])+' ('+r[2]+')</option>';}).join('');
  }

  function enhance(sel){
    if(!sel||sel.getAttribute('data-avd')==='1')return;
    sel.setAttribute('data-avd','1');
    if(sel.options.length<20)fillOptions(sel);
    var wrap=document.createElement('div');wrap.className='avd';
    sel.parentNode.insertBefore(wrap,sel);wrap.appendChild(sel);
    sel.classList.add('avd__native');sel.tabIndex=-1;sel.setAttribute('aria-hidden','true');
    var btn=document.createElement('button');btn.type='button';btn.className='avd__btn';btn.setAttribute('aria-haspopup','listbox');btn.setAttribute('aria-expanded','false');btn.setAttribute('aria-label','Phone country code');
    var panel=document.createElement('div');panel.className='avd__panel';panel.hidden=true;
    panel.innerHTML='<input type="search" class="avd__search" placeholder="Search country or code" autocomplete="off" aria-label="Search country or code"><div class="avd__list" role="listbox"></div>';
    wrap.appendChild(btn);wrap.appendChild(panel);
    var search=panel.querySelector('input'),list=panel.querySelector('.avd__list');
    var opts=[].slice.call(sel.options).filter(function(o){return o.value;}).map(function(o){
      var name=o.textContent.replace(/\s*\(\+\d+\)\s*$/,'');
      return {o:o,iso:o.getAttribute('data-iso')||'',code:o.value,name:name,key:fold(name)};
    });
    function paint(){
      var o=sel.selectedOptions&&sel.selectedOptions[0];
      if(o&&o.value){var iso=o.getAttribute('data-iso');btn.innerHTML=(iso?'<img src="'+flag(iso)+'" alt="" width="22" height="16">':'')+'<span>'+esc(o.value)+'</span>'+CHEV;}
      else btn.innerHTML='<span class="avd__ph">Code</span>'+CHEV;
    }
    function render(q){
      q=fold(q).trim();var digits=q.replace(/[^\d]/g,'');var html='';
      var res=opts.filter(function(r){
        if(!q)return true;
        if(digits&&/^[+\d\s]+$/.test(q))return r.code.replace('+','').indexOf(digits)===0;
        return r.key.indexOf(q)!==-1||r.iso.toLowerCase()===q;
      });
      if(q&&!digits)res.sort(function(a,b){return (a.key.indexOf(q)===0?0:1)-(b.key.indexOf(q)===0?0:1);});
      res.forEach(function(r){html+='<button type="button" class="avd__opt" role="option" data-v="'+esc(r.code)+'" data-iso="'+esc(r.iso)+'"><img src="'+flag(r.iso)+'" alt="" width="22" height="16" loading="lazy"><span>'+esc(r.name)+'</span><b>'+esc(r.code)+'</b></button>';});
      list.innerHTML=html||'<p class="avd__empty">No country matches that search.</p>';
    }
    function open(){panel.hidden=false;btn.setAttribute('aria-expanded','true');search.value='';render('');setTimeout(function(){search.focus();},0);}
    function close(){panel.hidden=true;btn.setAttribute('aria-expanded','false');}
    btn.addEventListener('click',function(){panel.hidden?open():close();});
    search.addEventListener('input',function(){render(search.value);});
    search.addEventListener('keydown',function(e){if(e.key==='Escape'){close();btn.focus();}if(e.key==='Enter'){e.preventDefault();var f=list.querySelector('.avd__opt');if(f)f.click();}});
    list.addEventListener('click',function(e){var b=e.target.closest('.avd__opt');if(!b)return;setIso(b.getAttribute('data-iso'),true);close();btn.focus();});
    document.addEventListener('click',function(e){if(!wrap.contains(e.target))close();});
    function setIso(iso,byUser){
      var o=opts.filter(function(r){return r.iso===iso;})[0];if(!o)return;
      o.o.selected=true;if(byUser)wrap.setAttribute('data-touched','1');
      wrap.classList.remove('is-invalid');paint();
      sel.dispatchEvent(new Event('change',{bubbles:true}));
    }
    wrap._setIso=setIso;
    paint();
    var syncId=sel.getAttribute('data-dial-sync');
    if(syncId){
      var hid=document.getElementById(syncId);
      if(hid&&hid.value&&!sel.value)setIso(hid.value,false);
      document.addEventListener('click',function(e){
        var opt=e.target.closest('.alif-country-select__option');if(!opt)return;
        var root=opt.closest('[data-country-select]');if(!root||!root.querySelector('#'+syncId))return;
        if(wrap.getAttribute('data-touched')==='1')return;
        setIso(opt.getAttribute('data-code'),false);
      });
    }
    return wrap;
  }

  /* Phone fields that are a single box: add a code picker and join code + number on submit. */
  function addPicker(telId,syncId){
    var tel=document.getElementById(telId);if(!tel||tel.getAttribute('data-avd-tel'))return;
    tel.setAttribute('data-avd-tel','1');
    var row=document.createElement('div');row.className='avd-row';
    tel.parentNode.insertBefore(row,tel);
    var sel=document.createElement('select');sel.setAttribute('data-dial-select','');if(syncId)sel.setAttribute('data-dial-sync',syncId);
    row.appendChild(sel);row.appendChild(tel);
    if(tel.placeholder&&/^\+/.test(tel.placeholder))tel.placeholder='Phone number';
    var v=String(tel.value||'').trim();
    enhance(sel);
    if(/^\+/.test(v)){var best='';Object.keys(DIAL).forEach(function(iso){var c=DIAL[iso];if(v.replace(/\s/g,'').indexOf(c)===0&&c.length>((DIAL[best]||'').length))best=iso;});if(best){sel.parentNode._setIso(best,true);tel.value=v.replace(/\s/g,'').slice(DIAL[best].length);}}
    var form=tel.form;if(form)form.addEventListener('submit',function(){
      var num=String(tel.value||'').trim();
      if(sel.value&&num&&num.charAt(0)!=='+')tel.value=sel.value+' '+num.replace(/^0+/,'');
      sel.disabled=true;
    },true);
  }

  /* Required country pickers: block Next / submit until a country is chosen. */
  function checkCountries(scope){
    var bad=null;
    scope.querySelectorAll('[data-country-select]').forEach(function(r){
      var h=r.querySelector('input[type=hidden][required]');if(!h||r.offsetParent===null)return;
      var empty=!h.value;r.classList.toggle('is-invalid',empty);
      var m=r.nextElementSibling&&r.nextElementSibling.classList.contains('alif-cs-err')?r.nextElementSibling:null;
      if(empty){if(!m){m=document.createElement('p');m.className='alif-cs-err';m.textContent='Please select a country.';r.parentNode.insertBefore(m,r.nextSibling);}if(!bad)bad=r;}
      else if(m)m.remove();
    });
    return bad;
  }
  function stopIfBad(scope,e){var bad=checkCountries(scope);if(bad){e.preventDefault();e.stopImmediatePropagation();try{bad.scrollIntoView({block:'center',behavior:'smooth'});}catch(x){}return true;}return false;}
  document.addEventListener('click',function(e){
    var b=e.target.closest('[data-wizard-next]');
    if(b){var s=b.closest('[data-wizard-step]')||b.closest('form');if(s)stopIfBad(s,e);return;}
    var opt=e.target.closest('.alif-country-select__option');
    if(opt){var r=opt.closest('[data-country-select]');setTimeout(function(){if(r&&r.classList.contains('is-invalid'))checkCountries(r.parentNode);},0);}
  },true);
  document.addEventListener('submit',function(e){var f=e.target;if(f&&f.querySelector&&f.querySelector('[data-country-select]'))stopIfBad(f,e);},true);

  function init(){
    document.querySelectorAll('select[data-dial-select]').forEach(enhance);
    addPicker('phone','residence_code');
    addPicker('contact-phone','');
  }
  if(document.readyState==='loading')document.addEventListener('DOMContentLoaded',init);else init();
})();
</script>
    <?php
}
add_action('wp_footer', 'alif_form_fixes_footer', 40);
/* ===== end Alif form fixes ===== */
