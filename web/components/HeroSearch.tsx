import { destinations, nationalities } from '@/data/destinations';

/** Boarding-pass style search bar: one row on desktop, stacked on phones. */
export default function HeroSearch() {
  return (
    <form className="pass" action="/visa/search/" method="get" aria-label="Check visa requirements">
      <div className="pass-field">
        <label htmlFor="h-from">From · Nationality</label>
        <select id="h-from" name="from" defaultValue="">
          <option value="" disabled>Choose nationality</option>
          {nationalities.map(([c, n]) => <option key={c} value={c}>{n}</option>)}
        </select>
      </div>
      <span className="pass-arrow" aria-hidden="true">
        <svg viewBox="0 0 24 24" width="18" height="18"><path d="M3 12h15m-5-5 5 5-5 5" fill="none" stroke="currentColor" strokeWidth="1.8" strokeLinecap="round" strokeLinejoin="round" /></svg>
      </span>
      <div className="pass-field">
        <label htmlFor="h-to">To · Destination</label>
        <select id="h-to" name="to" defaultValue="">
          <option value="" disabled>Where are you going?</option>
          {destinations.map((d) => <option key={d.slug} value={d.slug}>{d.name}</option>)}
        </select>
      </div>
      <div className="pass-field">
        <label htmlFor="h-purpose">Purpose</label>
        <select id="h-purpose" name="purpose" defaultValue="visit-visa">
          <option value="visit-visa">Tourism or family</option>
          <option value="business-visa">Business</option>
          <option value="conference-visa">Conference</option>
          <option value="transit-visa">Transit</option>
          <option value="family-visa">Joining family</option>
        </select>
      </div>
      <button className="pass-go" type="submit">
        Check requirements
        <svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path d="M5 12h13m-5-5 5 5-5 5" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" /></svg>
      </button>
    </form>
  );
}
