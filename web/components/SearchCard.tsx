import { destinations, nationalities } from '@/data/destinations';

export default function SearchCard({ title = 'Check your visa requirements' }: { title?: string }) {
  return (
    <form className="search-card" action="/visa/search/" method="get">
      <h2>{title}</h2>
      <p className="sub">Free to check. No account needed.</p>
      <div className="field">
        <label htmlFor="from">Your nationality</label>
        <select id="from" name="from" defaultValue="">
          <option value="" disabled>Select your nationality</option>
          {nationalities.map(([c, n]) => <option key={c} value={c}>{n}</option>)}
        </select>
      </div>
      <div className="field">
        <label htmlFor="to">Destination</label>
        <select id="to" name="to" defaultValue="">
          <option value="" disabled>Select your destination</option>
          {destinations.map((d) => <option key={d.slug} value={d.slug}>{d.name}</option>)}
        </select>
      </div>
      <div className="field">
        <label htmlFor="purpose">Reason for travel</label>
        <select id="purpose" name="purpose" defaultValue="visit-visa">
          <option value="visit-visa">Tourism or visiting family</option>
          <option value="business-visa">Business</option>
          <option value="conference-visa">Conference or event</option>
          <option value="transit-visa">Transit</option>
          <option value="family-visa">Joining family</option>
        </select>
      </div>
      <button className="btn btn-accent" type="submit">Show my visa options</button>
      <p className="fine">We show the routes that normally apply and the documents each one needs.</p>
    </form>
  );
}
