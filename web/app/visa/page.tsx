import Link from 'next/link';
import { Cta, PageHead } from '@/components/ui';
import { routes } from '@/data/routes';

export const metadata = { title: 'Visa types', description: 'Visit, business, eVisa, family, transit, conference and invitation routes explained.' };

export default function Visas() {
  return (
    <>
      <PageHead label="Visa types" title="Find the right visa for your trip" lead="Each category has its own evidence requirements. Choose the one that matches your reason for travel, or search by destination." crumbs={[{ label: 'Visa types' }]} />
      <section className="section-tight">
        <div className="wrap grid g3">
          {routes.map((r) => (
            <Link key={r.slug} href={`/visa/${r.slug}/`} className="card route">
              <span className="icon">{String(routes.findIndex((x) => x.slug === r.slug) + 1).padStart(2, '0')}</span>
              <h3>{r.name}</h3>
              <p>{r.short}</p>
              <span className="more arrow">View requirements</span>
            </Link>
          ))}
          <Link href="/visa/search/" className="card" style={{ background: 'var(--wash)' }}>
            <h3>Not sure which route fits?</h3>
            <p>Search by nationality and destination to see the routes available to you.</p>
            <span className="more arrow">Check requirements</span>
          </Link>
        </div>
      </section>
      <Cta />
    </>
  );
}
