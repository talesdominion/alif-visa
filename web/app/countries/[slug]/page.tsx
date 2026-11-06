import Link from 'next/link';
import { notFound } from 'next/navigation';
import { Cta, Disclaimer, PageHead } from '@/components/ui';
import { bySlug, destinations } from '@/data/destinations';
import { routeBySlug, routes } from '@/data/routes';

export const dynamicParams = false;
export function generateStaticParams() { return destinations.map((d) => ({ slug: d.slug })); }
export async function generateMetadata({ params }: { params: Promise<{ slug: string }> }) {
  const d = bySlug((await params).slug);
  return { title: d ? `${d.name} visa requirements` : 'Destination' };
}

export default async function Country({ params }: { params: Promise<{ slug: string }> }) {
  const d = bySlug((await params).slug);
  if (!d) notFound();
  return (
    <>
      <PageHead label={`${d.region} · Visa routes`} title={`${d.name} visa requirements`} lead={d.summary} crumbs={[{ label: 'Destinations', href: '/countries/' }, { label: d.name }]}>
        <img className="head-flag" src={`/flags/${d.code}.svg`} alt={`Flag of ${d.name}`} width={64} height={44} />
      </PageHead>
      <section className="section-tight">
        <div className="wrap layout">
          <div>
            <h2 style={{ fontSize: 26, marginBottom: 8 }}>Visa categories for {d.name}</h2>
            <p className="muted">Select a visa type to see what it covers, the documents it usually needs and how we help with preparation and tracking.</p>
            <div className="grid g2" style={{ marginTop: 22 }}>
              {d.routes.map((slug) => {
                const r = routeBySlug(slug)!;
                return (
                  <Link key={slug} href={`/visa/${slug}/`} className="card route">
                    <span className="icon">{String(routes.findIndex((x) => x.slug === r.slug) + 1).padStart(2, '0')}</span>
                    <h3>{d.name} {r.name}</h3>
                    <p>{r.short}</p>
                    <span className="more arrow">Requirements</span>
                  </Link>
                );
              })}
            </div>
            <h2 style={{ fontSize: 26, margin: '44px 0 12px' }}>How we help with your {d.name} application</h2>
            <ol className="numbered">
              <li>We confirm which route applies to your nationality and reason for travel.</li>
              <li>You get a document checklist built for your application, not a generic list.</li>
              <li>A specialist reviews every upload before anything is submitted.</li>
              <li>You follow your file from submission to decision in your account.</li>
            </ol>
            <Disclaimer />
          </div>
          <aside className="aside">
            <div className="facts">
              <div className="h">At a glance</div>
              <dl>
                <dt>Region</dt><dd>{d.region}</dd>
                <dt>Routes we support</dt><dd>{d.routes.length}</dd>
                <dt>Requirements depend on</dt><dd>Nationality, purpose and length of stay</dd>
              </dl>
              <div className="p"><Link className="btn btn-primary" href={`/visa/search/?to=${d.slug}`}>Check my requirements</Link></div>
            </div>
          </aside>
        </div>
      </section>
      <Cta title={`Ready to apply for ${d.name}?`} text="Confirm your nationality and travel dates, then we show the documents required for your route." />
    </>
  );
}
