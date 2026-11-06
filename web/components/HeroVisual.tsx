/**
 * Hero visual: an Alif Visa application file as the customer sees it.
 * Example data only, clearly a sample (reference format ALF-2026-000123).
 */
const stages = [
  { t: 'Application received', s: 'done' },
  { t: 'Documents reviewed by specialist', s: 'done' },
  { t: 'Ready for submission', s: 'now' },
  { t: 'Submitted to the authority', s: 'next' },
  { t: 'Decision received', s: 'next' },
];

export default function HeroVisual() {
  return (
    <div className="hv" aria-hidden="true">
      <svg className="hv-path" viewBox="0 0 560 520" fill="none">
        <path d="M10 500 C 120 470, 230 420, 300 330 S 470 120, 540 30" stroke="#16A974" strokeOpacity=".35" strokeWidth="1.5" strokeDasharray="5 8" />
      </svg>
      <img className="hv-plane" src="/brand/plane.png" alt="" />

      <div className="hv-card hv-main">
        <div className="hv-top">
          <div>
            <span className="hv-k">Application</span>
            <strong className="hv-ref">ALF-2026-000123</strong>
          </div>
          <span className="hv-status"><i />In progress</span>
        </div>
        <div className="hv-trip">
          <img src="/flags/gb.svg" alt="" />
          <span className="hv-line" />
          <img src="/flags/fr.svg" alt="" />
          <div className="hv-trip-t"><strong>France · Visit Visa</strong><span>Schengen short stay · 2 travellers</span></div>
        </div>
        <ol className="hv-steps">
          {stages.map((x) => (
            <li key={x.t} className={x.s}><i />{x.t}</li>
          ))}
        </ol>
      </div>

      <div className="hv-card hv-docs">
        <span className="hv-k">Document checklist</span>
        <ul>
          <li className="ok">Passport<span>Approved</span></li>
          <li className="ok">Bank statements<span>Approved</span></li>
          <li className="ok">Travel insurance<span>Approved</span></li>
          <li className="wait">Hotel booking<span>In review</span></li>
        </ul>
      </div>

      <div className="hv-card hv-agent">
        <span className="hv-avatar">AV</span>
        <div><strong>Your specialist</strong><span>“All documents look good. Booking your appointment next.”</span></div>
      </div>
    </div>
  );
}
