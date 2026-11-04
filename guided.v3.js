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

  /* ---------- questions: one per screen ---------- */
  var YN = [["Yes", "Yes"], ["No", "No"]], yn2 = [["yes", "Yes"], ["no", "No"]];
  var Q = [
    { id: "start", sec: 1, type: "intro" },
    { id: "to", sec: 1, type: "country", k: "to", pop: "to", q: "Where are you travelling to?", sub: "Choose the country you want a visa for.", tip: "We currently help with visit, business, family and transit visas for most countries." },
    { id: "from", sec: 1, type: "country", k: "from", pop: "from", q: "Which country issued your passport?", sub: "This is the country printed on your passport.", tip: "Visa rules depend on your passport, not where you live. A Pakistani passport holder living in Dubai still applies as a Pakistani citizen." },
    { id: "purpose", sec: 1, type: "choice", k: "purpose", auto: true, opts: PURPOSES, q: "What is the main reason for your trip?", sub: "Pick the one that fits best.", tip: "This decides which visa you need and which documents we ask for." },
    { id: "purpose_other", sec: 1, type: "text", follow: true, when: function () { return S.purpose === "other"; }, fields: [{ k: "purpose_other", label: "Your trip", ph: "For example: medical treatment, a wedding, a sports event" }], q: "Tell us a little about your trip", sub: "One line is enough. An adviser will check the right visa for you." },
    { id: "arrive", sec: 1, type: "date", k: "arrive", q: "When do you plan to arrive?", sub: "A rough date is fine. You can change it later.", tip: "Most embassies let you apply up to 3 to 6 months before you travel." },
    { id: "leave", sec: 1, type: "date", k: "leave", q: "And when will you return home?", sub: "Pick the day you fly back.", tip: "Embassies check that your stay length matches the visa you apply for." },
    { id: "stay", sec: 1, type: "choice", k: "stay", auto: true, opts: STAYS, q: "Where will you stay?", sub: "Your best plan for now.", tip: "If you stay with family or friends, we'll ask for your host's details later." },
    { id: "flights", sec: 1, type: "choice", k: "flights", auto: true, opts: [{ v: "yes", t: "Yes, booked", d: "I have my tickets", icon: "plane" }, { v: "no", t: "Not yet", d: "That's normal before a visa", icon: "clock" }], q: "Have you booked your flights?", tip: "You don't need to buy tickets before your visa is approved. If the embassy asks for a flight plan, we can arrange a reservation." },
    { id: "name", sec: 2, type: "text", slot: "scan", fields: [{ k: "first", label: "First and middle names", ph: "Muhammad Ali", auto: "given-name" }, { k: "last", label: "Last name (surname)", ph: "Khan", auto: "family-name" }], q: "What is your full name?", sub: "Type it exactly as it appears on your passport.", tip: "A single wrong letter can make a visa invalid at the border." },
    { id: "dob", sec: 2, type: "typed", k: "dob", q: "What is your date of birth?", sub: "Type day, month and year.", tip: "For example 20 05 1990. We'll check it against your passport." },
    { id: "gender", sec: 2, type: "choice", k: "gender", auto: true, opts: [{ v: "Male", t: "Male" }, { v: "Female", t: "Female" }, { v: "Other", t: "Other" }], q: "What gender is shown on your passport?" },
    { id: "marital", sec: 2, type: "choice", k: "marital", auto: true, opts: [{ v: "Single", t: "Single" }, { v: "Married", t: "Married" }, { v: "Divorced", t: "Divorced" }, { v: "Widowed", t: "Widowed" }], q: "What is your marital status?" },
    { id: "email", sec: 2, type: "text", fields: [{ k: "email", label: "Email address", ph: "you@example.com", auto: "email", type: "email", mode: "email" }], q: "What is your email address?", sub: "Your confirmation and visa documents are sent here.", tip: "Use an email you check often. Your adviser may ask for a document." },
    { id: "phone", sec: 2, type: "phone", q: "What is your mobile number?", sub: "Choose your country code, then type your number.", tip: "Leave out the first 0. For example 300 1234567." },
    { id: "wa", sec: 2, type: "choice", k: "wa", auto: true, opts: [{ v: "yes", t: "Yes, WhatsApp is fine", icon: "chat" }, { v: "no", t: "No, phone and email only", icon: "mail" }], q: "Can we message you on WhatsApp?", tip: "WhatsApp is the fastest way for your adviser to reach you if the embassy needs something." },
    { id: "res", sec: 2, type: "country", k: "res", pop: "from", q: "Which country do you live in?", sub: "Where you live permanently right now.", tip: "You usually apply from the country where you live. It decides which visa centre handles your file." },
    { id: "address", sec: 2, type: "text", fields: [{ k: "addr", label: "Home address", ph: "House 12, Street 4, Block B", auto: "street-address" }, { k: "city", label: "City or town", ph: "Lahore", auto: "address-level2" }, { k: "region", label: "State or province", ph: "Punjab", auto: "address-level1", opt: true }, { k: "zip", label: "Postcode", ph: "54000", auto: "postal-code", opt: true }], q: "What is your home address?", sub: "Where you live now." },
    { id: "passport", sec: 3, type: "passport", q: "Your passport details", sub: "Open your passport at the photo page.", tip: "Most countries need your passport valid for 6 months after you return." },
    { id: "emp", sec: 3, type: "choice", k: "emp", auto: true, opts: JOBS, q: "What do you do for work?", sub: "Pick the closest one.", tip: "Embassies want to see a reason to return home, like a job or studies." },
    { id: "bal", sec: 3, type: "choice", k: "bal", auto: true, opts: BALANCES.map(function (b, i) { return { v: b, t: b, d: ["A smaller budget", "Enough for a short trip", "A comfortable amount", "A strong balance"][i], icon: "bank" }; }), q: "Roughly how much is in your bank account?", sub: "In US dollars. An estimate is fine.", tip: "This helps us plan which financial documents to include. It's never shared outside your application." },
    { id: "stmt", sec: 3, type: "choice", k: "stmt", auto: true, opts: [{ v: "Yes", t: "Yes", d: "I can get one from my bank", icon: "check" }, { v: "No", t: "No", d: "I'm not sure I can", icon: "info" }], q: "Can you get a 6-month bank statement?", tip: "Most embassies ask for the last 3 to 6 months of statements." },
    { id: "prop", sec: 3, type: "choice", k: "prop", auto: true, opts: [{ v: "Yes", t: "Yes", d: "House, flat or land in my name", icon: "home" }, { v: "No", t: "No", icon: "info" }], q: "Do you own property in your home country?", tip: "Property helps show strong ties to home. It's fine if you don't." },
    { id: "sponsor", sec: 3, type: "choice", k: "sponsor", auto: true, opts: [{ v: "no", t: "I'm paying myself", icon: "user" }, { v: "yes", t: "Someone else is paying", d: "Family member, host or employer", icon: "family" }], q: "Who is paying for this trip?", tip: "If someone else pays, we'll ask for a support letter from them later." },
    { id: "travelled", sec: 3, type: "choice", k: "travelled", auto: true, opts: [{ v: "Yes", t: "Yes", icon: "plane" }, { v: "No", t: "No, this is my first trip abroad", icon: "home" }], q: "Have you travelled abroad in the last 10 years?" },
    { id: "travelled_where", sec: 3, type: "text", follow: true, when: function () { return S.travelled === "Yes"; }, fields: [{ k: "travelled_where", label: "Countries", ph: "UAE, Saudi Arabia, Türkiye" }], q: "Which countries have you visited?", sub: "Any order. Dates are not needed." },
    { id: "refused", sec: 3, type: "choice", k: "refused", auto: true, opts: [{ v: "no", t: "No", icon: "check" }, { v: "yes", t: "Yes", d: "For any country", icon: "info" }], q: "Have you ever been refused a visa?", tip: "Answer honestly. A past refusal doesn't stop you applying, and your adviser will help you address it." },
    { id: "refused_where", sec: 3, type: "text", follow: true, when: function () { return S.refused === "yes"; }, fields: [{ k: "refused_where", label: "Country and year", ph: "United Kingdom, 2023" }], q: "Which country refused you, and roughly when?" },
    { id: "crim", sec: 3, type: "choice", k: "crim", auto: true, opts: [{ v: "No", t: "No", icon: "check" }, { v: "Yes", t: "Yes", icon: "info" }], q: "Have you ever been convicted of a criminal offence?", sub: "In any country.", tip: "Many visa forms ask this. Your answer is only used for your application." },
    { id: "people", sec: 3, type: "people", q: "Is anyone travelling with you?", sub: "Add family members or colleagues on the same trip. If it's just you, press Continue." },
    { id: "review", sec: 4, type: "review" }
  ];
  var IDX = {}; Q.forEach(function (s, i) { IDX[s.id] = i; });
  var TOTAL = Q.length - 1;
  function hasErr(e) { for (var k in e) if (e[k]) return true; return false; }
  function vis(i) { var s = Q[i]; return s && (!s.when || s.when()); }
  function nextIdx(i) { var j = i + 1; while (j < Q.length && !vis(j)) j++; return Math.min(j, TOTAL); }
  function prevIdx(i) { var j = i - 1; while (j > 0 && !vis(j)) j--; return Math.max(j, 0); }
  function qNum() { var n = 0, tot = 0; for (var i = 1; i < TOTAL; i++) if (vis(i)) { tot++; if (i <= S.step) n++; } return [n, tot]; }

  function check(s) {
    var e = {};
    if (s.type === "country") { if (!S[s.k]) e[s.k] = "Choose a country to continue."; if (s.k === "from" && S.from && S.from === S.to) e.from = "Your passport country and destination are the same. Check both."; }
    if (s.type === "choice" && !S[s.k]) e[s.k] = "Choose one option to continue.";
    if (s.type === "text") s.fields.forEach(function (f) { if (!f.opt && !String(S[f.k] || "").trim()) e[f.k] = "Please fill this in."; });
    if (s.id === "email" && S.email && !/^[^@\s]+@[^@\s]+\.[^@\s]{2,}$/.test(S.email)) e.email = "Check your email. It should look like name@example.com.";
    if (s.type === "date") {
      var d = dateOf(s.k), a = dateOf("arrive");
      if (!d || d === "bad") e[s.k] = "Choose a date on the calendar.";
      else if (s.k === "arrive" && d < TODAY) e.arrive = "Your arrival date can't be in the past.";
      else if (s.k === "leave" && a && a !== "bad" && d <= a) e.leave = "Your return date must be after you arrive (" + fmt("arrive") + ").";
    }
    if (s.type === "typed") { var b = dateOf("dob"); e.dob = !b ? "Type your full date of birth." : b === "bad" ? "That date doesn't exist. Check the day and month." : b > TODAY ? "Your date of birth can't be in the future." : b.getFullYear() < YEAR - 120 ? "Check the year of birth." : ""; }
    if (s.type === "phone") { var p = (S.phone || "").replace(/[\s-]/g, "").replace(/^0+/, ""); if (!S.code) e.code = "Choose your country code."; e.phone = !p ? "Type your mobile number." : !/^\d{6,14}$/.test(p) ? "Use numbers only, without the country code." : ""; }
    if (s.type === "passport") { var x = dateOf("pp_exp"); e.pp_no = !S.pp_no ? "Type your passport number." : !/^[A-Z0-9]{5,12}$/.test(S.pp_no) ? "Letters and numbers only, no spaces." : ""; e.pp_exp = !x ? "Type the expiry date." : x === "bad" ? "That date doesn't exist. Check the day and month." : x < TODAY ? "This passport has expired. You need a valid passport to apply." : x.getFullYear() > YEAR + 20 ? "Check the year." : ""; }
    return e;
  }
  function firstGap() { for (var i = 1; i < TOTAL; i++) if (vis(i) && hasErr(check(Q[i]))) return i; return -1; }

  /* ---------- bits of markup ---------- */
  var LETTERS = "ABCDEFGH";
  function opts(s) {
    return '<div class="gq-opts' + (s.opts.length > 4 ? " two" : "") + '" role="radiogroup">' + s.opts.map(function (o, i) {
      var on = S[s.k] === o.v;
      return '<button type="button" class="gq-opt' + (on ? " on" : "") + '" role="radio" aria-checked="' + on + '" data-pick="' + s.k + '" data-v="' + esc(o.v) + '"><kbd>' + LETTERS[i] + "</kbd>" +
        (o.icon ? '<span class="gq-oi">' + ic(o.icon) + "</span>" : "") + '<span class="gq-ot"><b>' + esc(o.t) + "</b>" + (o.d ? "<small>" + esc(o.d) + "</small>" : "") + '</span><span class="gq-ok">' + ic("check") + "</span></button>";
    }).join("") + "</div>";
  }
  function field(f) {
    return '<label class="gq-in' + bad(f.k) + '"><span>' + f.label + (f.opt ? " <em>optional</em>" : "") + '</span><input id="gx-' + f.k + '" data-k="' + f.k + '" type="' + (f.type || "text") + '" value="' + esc(S[f.k] || "") + '" placeholder="' + esc(f.ph || "") + '"' + (f.auto ? ' autocomplete="' + f.auto + '"' : "") + (f.mode ? ' inputmode="' + f.mode + '"' : "") + (f.upper ? ' data-upper="1" autocapitalize="characters"' : "") + ">" + err(f.k) + "</label>";
  }
  function countryQ(s) {
    var v = S[s.k];
    return (v && NAME[v] ? '<div class="gq-picked">' + flag(v) + "<b>" + esc(NAME[v]) + '</b><span class="gq-tickc">' + ic("check") + "</span></div>" : "") +
      '<div class="gq-search"><span>' + ic("pin") + '</span><input id="gx-' + s.k + '" data-csearch="' + s.k + '" type="search" autocomplete="off" placeholder="' + (v ? "Search for a different country" : "Start typing a country name") + '" aria-label="Search countries"></div>' +
      '<div class="gq-res" data-cres="' + s.k + '">' + countryList(s, "") + "</div>" + err(s.k);
  }
  function countryList(s, q) {
    q = fold(q.trim()); var pop = s.pop === "to" ? POP_TO : POP_FROM, list;
    if (!q) list = pop.filter(function (c) { return NAME[c]; }).map(function (c) { return [c, NAME[c]]; });
    else { list = COUNTRIES.filter(function (c) { return fold(c[1]).indexOf(q) > -1 || c[0].toLowerCase() === q; }); list.sort(function (a, b) { return (fold(a[1]).indexOf(q) === 0 ? 0 : 1) - (fold(b[1]).indexOf(q) === 0 ? 0 : 1); }); list = list.slice(0, 8); }
    if (!list.length) return '<p class="gq-none">No country matches that. Check the spelling.</p>';
    return (q ? "" : '<p class="gq-lab">Most chosen</p>') + '<div class="gq-cgrid">' + list.map(function (c) { return '<button type="button" class="gq-cbtn' + (S[s.k] === c[0] ? " on" : "") + '" data-cpick="' + s.k + '" data-code="' + c[0] + '">' + flag(c[0]) + "<span>" + esc(c[1]) + "</span></button>"; }).join("") + "</div>";
  }
  function dateQ(s) {
    var k = s.k, d = dateOf(k), A = dateOf("arrive"); if (d === "bad") d = null; if (A === "bad") A = null;
    var chips;
    if (k === "arrive") chips = [["In 2 weeks", 14], ["In 1 month", 30], ["In 2 months", 61], ["In 3 months", 91]].map(function (c) { var t = new Date(TODAY); t.setDate(t.getDate() + c[1]); return [c[0], t]; });
    else { var base = A || TODAY; chips = [["1 week", 7], ["2 weeks", 14], ["3 weeks", 21], ["1 month", 30]].map(function (c) { var t = new Date(base); t.setDate(t.getDate() + c[1]); return [c[0] + " trip", t]; }); }
    var nights = (k === "leave" && d && A && d > A) ? Math.round((d - A) / 864e5) : 0;
    return '<div class="gq-dshow">' + ic("cal") + "<b>" + (d ? esc(long(k)) : '<em>No date chosen yet</em>') + "</b>" + (nights ? '<span class="gq-n">' + nights + (nights === 1 ? " night" : " nights") + "</span>" : "") + "</div>" +
      '<div class="gq-chips">' + chips.map(function (c) { return '<button type="button" class="gq-chip' + (d && +d === +c[1] ? " on" : "") + '" data-qd="' + dkey(c[1]) + '">' + c[0] + "</button>"; }).join("") + "</div>" +
      '<div class="gq-cal" data-cal="' + k + '"></div>' + err(k);
  }
  function passportQ() {
    return '<div class="gq-fields">' + field({ k: "pp_no", label: "Passport number", ph: "AB1234567", upper: true }) + "</div>" +
      typed("pp_exp", "Expiry date", "Printed under “Date of expiry” on the photo page.") + warnHtml();
  }
  function reviewQ() {
    function row(k, v, id) { return '<div class="gq-rr"><span>' + k + "</span><b>" + (v ? esc(v) : '<em class="gx-miss">Missing</em>') + '</b><button type="button" class="gx-link" data-goto="' + id + '">Edit</button></div>'; }
    function sec(t, rows) { return '<section class="gq-rs"><h3>' + ic("check") + t + "</h3>" + rows + "</section>"; }
    var yn = function (v) { return v === "yes" || v === "Yes" ? "Yes" : v === "no" || v === "No" ? "No" : ""; };
    var extra = [].map.call(form.querySelectorAll("[data-extra-list] li[data-saved='1']"), function (li) { var b = li.querySelector("strong,b,h4,p"); return b ? b.textContent.trim() : ""; }).filter(Boolean);
    return sec("Trip", row("Destination", NAME[S.to], "to") + row("Passport", NAME[S.from], "from") + row("Reason", S.purpose === "other" ? (S.purpose_other || "Other") : label(PURPOSES, S.purpose), "purpose") + row("Arrive", fmt("arrive"), "arrive") + row("Return", fmt("leave"), "leave") + row("Staying at", label(STAYS, S.stay), "stay") + row("Flights booked", yn(S.flights), "flights")) +
      sec("About you", row("Name", [S.first, S.last].filter(Boolean).join(" "), "name") + row("Date of birth", fmt("dob"), "dob") + row("Gender", S.gender, "gender") + row("Marital status", S.marital, "marital") + row("Email", S.email, "email") + row("Mobile", S.code && S.phone ? (DIAL[S.code] || "") + " " + S.phone : "", "phone") + row("WhatsApp", yn(S.wa), "wa") + row("Country you live in", NAME[S.res], "res") + row("Address", [S.addr, S.city, S.region, S.zip].filter(Boolean).join(", "), "address")) +
      sec("Passport & background", row("Passport number", S.pp_no, "passport") + row("Expires", fmt("pp_exp"), "passport") + row("Work", label(JOBS, S.emp), "emp") + row("Bank balance", S.bal, "bal") + row("6-month statement", yn(S.stmt), "stmt") + row("Owns property", yn(S.prop), "prop") + row("Paid by", S.sponsor === "yes" ? "Sponsor" : S.sponsor === "no" ? "Me" : "", "sponsor") + row("Travelled abroad", S.travelled === "Yes" ? "Yes" + (S.travelled_where ? ", " + S.travelled_where : "") : yn(S.travelled), "travelled") + row("Refused a visa", S.refused === "yes" ? "Yes" + (S.refused_where ? ", " + S.refused_where : "") : yn(S.refused), "refused") + row("Criminal conviction", yn(S.crim), "crim") + row("Also travelling", extra.length ? extra.join(", ") : "No one else", "people")) +
      '<label class="gx-check' + bad("agree") + '"><input type="checkbox" id="gx-agree" data-agree="1"' + (rget("agree_terms") ? " checked" : "") + '><span>I confirm the information is correct and complete, and I agree to the Alif Visa <a href="/terms/" target="_blank" rel="noopener">Terms and Conditions</a> and <a href="/refund-policy/" target="_blank" rel="noopener">Refund Policy</a>.</span></label>' + err("agree") +
      '<div style="margin-top:14px">' + note("info", (LOGGED_IN ? "" : "Next, you'll sign in or create a free account so you can track your application. ") + "Your service fee is shown before you pay. Card payments are handled securely by Stripe.") + "</div>";
  }
  function warnHtml() { return '<div data-warn>' + (S.warn ? note("warn", S.warn) : "") + "</div>"; }

  /* ---------- mount ---------- */
  var root = document.createElement("div"); root.className = "gx gq-root"; root.id = "gx";
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
  root.addEventListener("click", function (e) { rootClick(e); });
  var heroP = document.querySelector(".avx-hero p"); if (heroP) heroP.textContent = "One simple question at a time. Your answers save as you go.";

  function renderAside() {
    var dest = S.to && NAME[S.to] ? flag(S.to) + "<span>" + esc(NAME[S.to]) + " visa" + (S.purpose ? "<small>" + esc(label(PURPOSES, S.purpose)) + "</small>" : "") + "</span>" : '<span style="color:#5a6e65;font-weight:600;font-size:15px">Your trip will appear here</span>';
    var rows = [["Passport", NAME[S.from]], ["Dates", fmt("arrive") && fmt("leave") ? fmt("arrive") + " – " + fmt("leave") : ""], ["Traveller", S.first ? S.first + " " + (S.last || "") : ""]];
    aside.innerHTML = '<div class="gx-box"><div class="gx-dest">' + dest + '</div><dl class="gx-sum">' + rows.map(function (r) { return "<div><dt>" + r[0] + "</dt><dd>" + (r[1] ? esc(r[1]) : '<span style="color:#5a6e65;font-weight:500">–</span>') + "</dd></div>"; }).join("") + "</dl></div>" +
      '<div class="gx-box gx-help"><p>Stuck on a question? Message a UK adviser on WhatsApp.</p><a href="https://wa.me/447482331249" target="_blank" rel="noopener">' + ic("chat") + "+44 7482 331249</a><p style=\"margin-top:6px!important;color:#5a6e65;font-size:13px\">Monday to Friday, 09:00 to 18:00 UK time</p></div>" +
      '<div class="gx-box"><div class="gx-trust"><span>' + ic("shield") + "UK-registered company, Wolverhampton</span><span>" + ic("lock") + "256-bit encrypted form</span><span>" + ic("info") + "Private service, not a government website</span></div></div>";
  }
  function syncSteps() {
    if (!steps) return;
    var cur = Q[S.step].sec || 1;
    steps.querySelectorAll("li[data-avx-step]").forEach(function (li) { var n = +li.getAttribute("data-avx-step"); li.classList.toggle("is-cur", n === cur); li.classList.toggle("is-done", n < cur); if (n === cur) li.setAttribute("aria-current", "step"); else li.removeAttribute("aria-current"); });
    var qn = qNum(); steps.style.setProperty("--avx-p", (S.step >= TOTAL ? 100 : Math.max(4, Math.round(qn[0] / Math.max(1, qn[1]) * 100))) + "%");
  }
  if (steps) new MutationObserver(function () { var li = steps.querySelector("li.is-cur"); if (!li || li.getAttribute("data-avx-step") !== String(Q[S.step].sec || 1)) syncSteps(); }).observe(steps, { attributes: true, subtree: true, attributeFilter: ["class"] });

  function render(focusErr) {
    park();
    var s = Q[S.step], qn = qNum(), html;
    if (s.type === "intro") {
      html = '<div class="gq gq-intro"><p class="gq-kicker">Visa application</p><h2 class="gq-q">Let’s get your visa started</h2><p class="gq-sub">We’ll ask one simple question at a time. Most people finish in about 6 minutes.</p>' +
        '<ul class="gx-ready"><li><span class="gx-ic">' + ic("passport") + "</span><span><b>Your passport</b><small>Number and expiry date</small></span></li><li><span class=\"gx-ic\">" + ic("plane") + "</span><span><b>Your travel plans</b><small>Rough dates are fine</small></span></li><li><span class=\"gx-ic\">" + ic("pin") + "</span><span><b>Your home address</b><small>Where you live now</small></span></li><li><span class=\"gx-ic\">" + ic("bank") + "</span><span><b>Work and money</b><small>Simple multiple choice</small></span></li></ul>" +
        '<div class="gx-facts"><span>' + ic("save") + "Answers save as you go</span><span>" + ic("lock") + "256-bit encrypted</span><span>" + ic("shield") + "Nothing to pay until you review everything</span></div>" +
        '<div class="gq-foot"><button type="button" class="gx-btn gx-go gq-go" id="gx-next">Start now' + ic("arrowR") + '</button><span class="gq-key">press <b>Enter ↵</b></span></div></div>';
    } else if (s.type === "review") {
      html = '<div class="gq"><div class="gq-top"><button type="button" class="gq-back" id="gx-back">' + ic("arrowL") + 'Back</button><span>Last step</span></div><h2 class="gq-q">Check your answers</h2><p class="gq-sub">Make sure everything matches your passport. Tap Edit to change anything.</p><div class="gq-review">' + reviewQ() + '</div><div class="gq-foot"><button type="button" class="gx-btn gx-go gq-go" id="gx-next">' + (LOGGED_IN ? "Continue to payment" : "Continue") + ic("arrowR") + "</button></div></div>";
    } else {
      var body = s.type === "choice" ? opts(s) : s.type === "country" ? countryQ(s) : s.type === "date" ? dateQ(s) : s.type === "typed" ? typed(s.k, "", "") : s.type === "phone" ? phone() : s.type === "passport" ? passportQ() : s.type === "people" ? '<div class="gx-slot" data-slot="extra"></div>' : '<div class="gq-fields">' + s.fields.map(field).join("") + "</div>";
      var auto = s.type === "choice" || s.type === "country";
      html = '<div class="gq"><div class="gq-top"><button type="button" class="gq-back" id="gx-back">' + ic("arrowL") + 'Back</button><span>Question ' + qn[0] + " of " + qn[1] + "</span></div>" +
        '<div class="gq-adv"><span class="gq-av">AV</span>Your Alif Visa adviser asks</div>' +
        '<h2 class="gq-q" id="gx-h" tabindex="-1">' + s.q + "</h2>" + (s.sub ? '<p class="gq-sub">' + s.sub + "</p>" : "") +
        (s.slot ? '<div class="gx-slot" data-slot="' + s.slot + '"></div>' : "") +
        '<div class="gq-body">' + body + "</div>" +
        (s.tip ? '<p class="gq-tip">' + ic("info") + "<span>" + s.tip + "</span></p>" : "") +
        '<div class="gq-foot"><button type="button" class="gx-btn gx-go gq-go" id="gx-next">' + (S.ret ? "Save and back to review" : auto && S[s.k] ? "Continue" : "OK") + ic("check") + '</button><span class="gq-key">' + (s.type === "choice" ? "or press a letter key" : "or press <b>Enter ↵</b>") + "</span></div></div>";
    }
    root.innerHTML = html;
    root.querySelectorAll("[data-slot]").forEach(function (slot) { (MOVE[slot.getAttribute("data-slot")] || []).forEach(function (n) { if (n) slot.appendChild(n); }); });
    root.querySelectorAll(".gq-typed-fix .gx-lbl").forEach(function (l) { l.remove(); });
    renderAside(); bind(); syncSteps();
    var cal = root.querySelector("[data-cal]"); if (cal) drawCal(cal);
    if (focusErr) { var k = Object.keys(S.errs).filter(function (x) { return S.errs[x]; })[0]; var el = k && document.getElementById("gx-" + k); if (el) try { el.focus(); } catch (e) {} }
    else if (window.matchMedia("(min-width: 760px)").matches) { var f = root.querySelector(".gq-body input:not([type=checkbox])"); if (f && !f.value) try { f.focus({ preventScroll: true }); } catch (e) {} }
  }
  function go(i, back) {
    S.step = Math.max(0, Math.min(TOTAL, i)); S.errs = {};
    try { sessionStorage.setItem("alifGxStep", String(S.step)); } catch (e) {}
    render();
    root.classList.remove("gq-in-back", "gq-in-fwd"); void root.offsetWidth; root.classList.add(back ? "gq-in-back" : "gq-in-fwd");
    var top = (steps || root).getBoundingClientRect().top + window.scrollY - 90;
    if (Math.abs(window.scrollY - top) > 40) window.scrollTo({ top: Math.max(0, top), behavior: "smooth" });
  }
  function passportWarn() {
    S.warn = "";
    var e = dateOf("pp_exp"), l = dateOf("leave");
    if (e && e !== "bad" && e >= TODAY && l && l !== "bad") { var need = new Date(l); need.setMonth(need.getMonth() + 6); if (e < need) S.warn = "Your passport expires less than 6 months after your return date (" + fmt("leave") + "). Many countries will refuse entry. Renew it first if you can, or talk to an adviser."; }
  }

  /* ---------- events ---------- */
  var advancing = null;
  function bind() {
    root.querySelectorAll("[data-k]").forEach(function (el) {
      el.addEventListener("input", function () {
        var k = el.getAttribute("data-k"), v = el.value;
        if (el.getAttribute("data-upper")) { v = v.toUpperCase().replace(/\s+/g, ""); el.value = v; }
        S[k] = v; push();
        if (S.errs[k]) { S.errs[k] = ""; var m = document.getElementById("gx-" + k + "-err"); if (m) m.remove(); var w = el.closest(".gx-bad"); if (w) w.classList.remove("gx-bad"); }
        renderAside();
      });
    });
    root.querySelectorAll("[data-dt]").forEach(bindTyped);
    root.querySelectorAll("[data-pick]").forEach(function (el) {
      el.addEventListener("click", function () {
        var k = el.getAttribute("data-pick"), v = el.getAttribute("data-v");
        S[k] = v; S.errs[k] = ""; push();
        root.querySelectorAll('[data-pick="' + k + '"]').forEach(function (b) { var on = b === el; b.classList.toggle("on", on); b.setAttribute("aria-checked", on); });
        var m = document.getElementById("gx-" + k + "-err"); if (m) m.remove();
        renderAside();
        var s = Q[S.step]; if (s.auto) { clearTimeout(advancing); advancing = setTimeout(next, 280); }
      });
    });
    root.querySelectorAll("[data-csearch]").forEach(function (inp) {
      var s = Q[S.step], box = root.querySelector('[data-cres="' + s.k + '"]');
      inp.addEventListener("input", function () { box.innerHTML = countryList(s, inp.value); });
      inp.addEventListener("keydown", function (e) { if (e.key === "Enter") { e.preventDefault(); e.stopPropagation(); var b = box.querySelector("[data-cpick]"); if (b && inp.value.trim()) b.click(); else if (S[s.k]) next(); } });
    });
    root.querySelectorAll("[data-cs]").forEach(bindPicker);
    var ag = root.querySelector("[data-agree]"); if (ag) ag.addEventListener("change", function () { rset("agree_terms", ag.checked ? "1" : ""); S.errs.agree = ""; });
    var back = document.getElementById("gx-back"); if (back) back.addEventListener("click", function () { if (S.ret) { S.ret = false; return go(IDX.review, true); } go(prevIdx(S.step), true); });
    document.getElementById("gx-next").addEventListener("click", function () { clearTimeout(advancing); next(); });
  }
  function rootClick(e) {
    var c = e.target.closest("[data-cpick]");
    if (c) { var k = c.getAttribute("data-cpick"); S[k] = c.getAttribute("data-code"); S.errs[k] = ""; push(); root.querySelectorAll("[data-cpick]").forEach(function (b) { b.classList.toggle("on", b === c); }); clearTimeout(advancing); advancing = setTimeout(next, 260); return; }
    var g = e.target.closest("[data-goto]");
    if (g) { S.ret = true; go(IDX[g.getAttribute("data-goto")]); return; }
    var qd = e.target.closest("[data-qd]");
    if (qd) { var k2 = Q[S.step].k, m = qd.getAttribute("data-qd").split("-"); S[k2] = { y: m[0], m: String(+m[1]), d: String(+m[2]) }; S.errs[k2] = ""; push(); if (k2 === "arrive") { var L = dateOf("leave"), A = dateOf("arrive"); if (L && L !== "bad" && A && L <= A) S.leave = {}; } refreshDate(); }
  }
  function refreshDate() { var s = Q[S.step]; var b = root.querySelector(".gq-body"); b.innerHTML = dateQ(s); drawCal(b.querySelector("[data-cal]")); var n = document.getElementById("gx-next"); renderAside(); }
  var calView = {};
  function drawCal(box) {
    if (!box) return;
    var k = box.getAttribute("data-cal"), d = dateOf(k), A = dateOf("arrive"); if (d === "bad") d = null; if (A === "bad") A = null;
    var min = k === "leave" && A ? new Date(A.getFullYear(), A.getMonth(), A.getDate() + 1) : TODAY;
    if (!calView[k]) { var b = d || min; calView[k] = new Date(b.getFullYear(), b.getMonth(), 1); }
    if (d && (d.getMonth() !== calView[k].getMonth() || d.getFullYear() !== calView[k].getFullYear()) && box.getAttribute("data-follow") !== "0") calView[k] = new Date(d.getFullYear(), d.getMonth(), 1);
    var first = calView[k], days = new Date(first.getFullYear(), first.getMonth() + 1, 0).getDate(), lead = (first.getDay() + 6) % 7, cells = "";
    for (var i = 0; i < lead; i++) cells += "<span></span>";
    for (var dd = 1; dd <= days; dd++) {
      var dt = new Date(first.getFullYear(), first.getMonth(), dd), dis = dt < min || dt > new Date(YEAR + 2, 11, 31), cls = [];
      if (d && +dt === +d) cls.push("s"); if (k === "leave" && A && +dt === +A) cls.push("a"); if (k === "leave" && A && d && dt > A && dt < d) cls.push("in"); if (+dt === +TODAY) cls.push("t");
      cells += '<button type="button" data-day="' + dkey(dt) + '" class="' + cls.join(" ") + '"' + (dis ? " disabled" : "") + ' aria-label="' + dt.toDateString() + '">' + dd + "</button>";
    }
    var canPrev = first > new Date(min.getFullYear(), min.getMonth(), 1);
    box.innerHTML = '<div class="gq-ch"><button type="button" data-cm="-1" aria-label="Previous month"' + (canPrev ? "" : " disabled") + ">" + ic("left") + "</button><b>" + MONTHS[first.getMonth()] + " " + first.getFullYear() + '</b><button type="button" data-cm="1" aria-label="Next month">' + ic("right") + '</button></div><div class="gq-dow"><span>Mo</span><span>Tu</span><span>We</span><span>Th</span><span>Fr</span><span>Sa</span><span>Su</span></div><div class="gq-days">' + cells + "</div>";
    box.onclick = function (e) {
      var nav = e.target.closest("[data-cm]"), day = e.target.closest("[data-day]");
      if (nav && !nav.disabled) { calView[k] = new Date(first.getFullYear(), first.getMonth() + (+nav.getAttribute("data-cm")), 1); box.setAttribute("data-follow", "0"); drawCal(box); box.setAttribute("data-follow", "1"); return; }
      if (day && !day.disabled) { var m = day.getAttribute("data-day").split("-"); S[k] = { y: m[0], m: String(+m[1]), d: String(+m[2]) }; S.errs[k] = ""; if (k === "arrive") { var L = dateOf("leave"), A2 = dateOf("arrive"); if (L && L !== "bad" && L <= A2) S.leave = {}; } push(); refreshDate(); clearTimeout(advancing); advancing = setTimeout(next, 450); }
    };
  }
  function next() {
    var s = Q[S.step];
    if (s.type === "people") { var open = form.querySelector("[data-extra-list] li.is-editing"); if (open) { open.scrollIntoView({ block: "center", behavior: "smooth" }); var msg = open.querySelector(".gx-err") || document.createElement("p"); msg.className = "gx-err"; msg.textContent = "Save or cancel this traveller before you continue."; if (!msg.parentNode) open.appendChild(msg); return; } }
    if (s.type === "review") {
      var gap = firstGap(); if (gap > 0) { S.errs = { agree: "Some answers are missing. Tap Edit next to the red “Missing” to complete them." }; return render(true); }
      if (!rget("agree_terms")) { S.errs = { agree: "Tick the box to confirm your details and accept the Terms." }; return render(true); }
      return submit();
    }
    var e = check(s), clean = {}; for (var k in e) if (e[k]) clean[k] = e[k];
    if (hasErr(clean)) { S.errs = clean; return render(true); }
    push();
    if (s.type === "passport") passportWarn();
    var n = nextIdx(S.step);
    if (S.ret) { if (Q[n] && Q[n].follow && vis(n)) return go(n); S.ret = false; return go(IDX.review); }
    go(n);
  }
  function submit() {
    push(); rset("agree_terms", "1");
    var real = form.querySelector("[data-wizard-step='review'] [data-go-stripe]");
    var btn = document.getElementById("gx-next");
    if (LOGGED_IN && btn) { btn.disabled = true; btn.textContent = "Opening secure payment…"; }
    if (real) real.click(); else HTMLFormElement.prototype.submit.call(form);
    window.addEventListener("pageshow", function () { var b = document.getElementById("gx-next"); if (b) b.disabled = false; });
  }
  document.addEventListener("keydown", function (e) {
    if (!root.isConnected || e.ctrlKey || e.metaKey || e.altKey) return;
    var t = e.target, typing = t && (t.tagName === "INPUT" || t.tagName === "TEXTAREA" || t.tagName === "SELECT");
    if (t && t.closest && (t.closest(".gx-panel") || t.closest("[data-extra-list]") || t.closest(".avg-modal"))) return;
    if (e.key === "Enter" && !(t && t.tagName === "BUTTON") && !(t && t.type === "checkbox") && (!typing || root.contains(t))) { if (t && t.getAttribute && t.getAttribute("data-csearch")) return; e.preventDefault(); clearTimeout(advancing); next(); return; }
    if (typing) return;
    var s = Q[S.step]; if (s.type !== "choice") return;
    var i = LETTERS.indexOf(e.key.toUpperCase()); if (i < 0 || i >= s.opts.length) return;
    var b = root.querySelectorAll("[data-pick]")[i]; if (b) { e.preventDefault(); b.click(); }
  });


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
  form.addEventListener("change", function (e) { if (writing || root.contains(e.target)) return; clearTimeout(pullTimer); pullTimer = setTimeout(function () { pull(); render(); }, 150); });
  form.addEventListener("input", function (e) { if (writing || root.contains(e.target)) return; if (e.target.closest && e.target.closest("[data-extra-list]")) return; clearTimeout(pullTimer); pullTimer = setTimeout(function () { pull(); renderAside(); }, 300); });
  if (extraNode) new MutationObserver(function () { renderAside(); }).observe(extraNode, { childList: true, subtree: true, attributes: true, attributeFilter: ["data-saved"] });

  pull();
  function startStep() {
    if (/alif_error=1/.test(location.search) || firstGap() < 0) return IDX.review;
    var saved = 0; try { saved = +sessionStorage.getItem("alifGxStep") || 0; } catch (e) {}
    var gap = firstGap();
    if (saved > 0 && saved <= TOTAL) return Math.min(saved, gap > 0 ? gap : saved);
    return 0;
  }
  S.step = startStep();
  render();
  setTimeout(function () { pull(); if (firstGap() < 0) { S.step = IDX.review; render(); } }, 600);
})();
