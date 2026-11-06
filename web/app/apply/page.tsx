import Link from 'next/link';
import { destinations, nationalities } from '@/data/destinations';
import { routes } from '@/data/routes';

export const metadata = { title: 'Start your application' };

// Preview of the redesigned first step. In production the guided form,
// accounts, payments and orders keep running on WordPress/WooCommerce,
// restyled with the same design tokens.
export default function Apply() {
  return (
    <section className="section-tight" style={{ background: 'var(--wash)', minHeight: '70vh' }}>
      <div className="wrap" style={{ maxWidth: 820 }}>
        <span className="label">New application</span>
        <h1 style={{ fontSize: 'clamp(28px,3.6vw,40px)', margin: '10px 0 22px' }}>Let&apos;s start with your trip</h1>
        <ol className="stepper">
          <li className="on">1. Trip</li><li>2. Traveller</li><li>3. Passport</li><li>4. Documents</li><li>5. Review &amp; pay</li>
        </ol>
        <form className="form-card" action="/apply/" method="get">
          <div className="row2">
            <div className="field"><label htmlFor="af">Nationality</label><select id="af" name="from" defaultValue="gb">{nationalities.map(([c, n]) => <option key={c} value={c}>{n}</option>)}</select></div>
            <div className="field"><label htmlFor="at">Destination</label><select id="at" name="to" defaultValue="france">{destinations.map((d) => <option key={d.slug} value={d.slug}>{d.name}</option>)}</select></div>
          </div>
          <div className="row2">
            <div className="field"><label htmlFor="av">Visa type</label><select id="av" name="visa" defaultValue="visit-visa">{routes.map((r) => <option key={r.slug} value={r.slug}>{r.name}</option>)}</select></div>
            <div className="field"><label htmlFor="ad">Arrival date</label><input id="ad" name="arrive" type="date" /></div>
          </div>
          <div className="row2">
            <div className="field"><label htmlFor="an">Travellers</label><select id="an" name="travellers" defaultValue="1"><option>1</option><option>2</option><option>3</option><option>4</option><option>5+</option></select></div>
            <div className="field"><label htmlFor="ar">Departure date</label><input id="ar" name="depart" type="date" /></div>
          </div>
          <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'center', gap: 12, marginTop: 8, flexWrap: 'wrap' }}>
            <span className="muted small">Your answers save as you go. <a className="link" href="/login/">Sign in</a> to continue on another device.</span>
            <button className="btn btn-primary" type="submit">Continue</button>
          </div>
        </form>
      </div>
    </section>
  );
}
