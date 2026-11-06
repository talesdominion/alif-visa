import Link from 'next/link';
import { Cta, PageHead } from '@/components/ui';
import { destinations } from '@/data/destinations';

export const metadata = { title: 'Visa destinations', description: 'Choose a destination to see the visa routes available and what each one requires.' };

export default function Countries() {
  const regions = [...new Set(destinations.map((d) => d.region))];
  return (
    <>
      <PageHead label="Destinations" title="Where are you travelling?" lead="Choose a destination to see the visa routes available, what each one requires and how applications are assessed." crumbs={[{ label: 'Destinations' }]} />
      <section className="section-tight">
        <div className="wrap">
          {regions.map((r) => (
            <div key={r}>
              <h2 className="region-title">{r}</h2>
              <div className="grid g4">
                {destinations.filter((d) => d.region === r).map((d) => (
                  <Link key={d.slug} href={`/countries/${d.slug}/`} className="card dest">
                    <img className="flag" src={`/flags/${d.code}.svg`} alt="" width={40} height={28} />
                    <span><span className="name">{d.name}</span><br /><span className="region">{d.routes.length} visa routes</span></span>
                    <span className="go" aria-hidden="true">→</span>
                  </Link>
                ))}
              </div>
            </div>
          ))}
        </div>
      </section>
      <Cta />
    </>
  );
}
