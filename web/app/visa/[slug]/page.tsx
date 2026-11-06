import Link from 'next/link';
import { notFound } from 'next/navigation';
import { Cta, Disclaimer, PageHead } from '@/components/ui';
import { routeBySlug, routes } from '@/data/routes';
import { destinations } from '@/data/destinations';

export const dynamicParams = false;
export function generateStaticParams() { return routes.map((r) => ({ slug: r.slug })); }
export async function generateMetadata({ params }: { params: Promise<{ slug: string }> }) {
  const r = routeBySlug((await params).slug);
  return { title: r?.name ?? 'Visa type', description: r?.short };
}

export default async function Route({ params }: { params: Promise<{ slug: string }> }) {
  const r = routeBySlug((await params).slug);
  if (!r) notFound();
  const where = destinations.filter((d) => d.routes.includes(r.slug));
  const others = routes.filter((o) => o.slug !== r.slug).slice(0, 3);
  return (
    <>
      <PageHead label="Visa type" title={r.name} lead={r.intro} crumbs={[{ label: 'Visa types', href: '/visa/' }, { label: r.name }]} />
      <section className="section-tight">
        <div className="wrap layout">
          <div>
            <h2 style={{ fontSize: 26, marginBottom: 14 }}>Who this route is for</h2>
            <div className="pills">{r.who.map((w) => <span className="pill" key={w}>{w}</span>)}</div>
            <h2 style={{ fontSize: 26, margin: '40px 0 8px' }}>Documents you will usually need</h2>
            <p className="muted">This is the baseline list. Your final checklist depends on your nationality, the destination and your circumstances, and we confirm it before you submit.</p>
            <ol className="numbered">{r.documents.map((d) => <li key={d}>{d}</li>)}</ol>
            <h2 style={{ fontSize: 26, margin: '40px 0 10px' }}>How Alif Visa helps</h2>
            <p className="prose" style={{ fontSize: 16.5 }}>We confirm the document list for your nationality and destination, review your uploads before submission and keep you updated as the file moves. Government fees and our service fee are always quoted separately.</p>
            {where.length > 0 && (
              <>
                <h2 style={{ fontSize: 22, margin: '36px 0 14px' }}>Popular destinations for this route</h2>
                <div className="pills">{where.map((d) => <Link className="pill" key={d.slug} href={`/countries/${d.slug}/`}>{d.name}</Link>)}</div>
              </>
            )}
            <Disclaimer />
          </div>
          <aside className="aside">
            <div className="facts">
              <div className="h">Route summary</div>
              <dl>
                <dt>Typical stay</dt><dd>{r.stay}</dd>
                <dt>Entries</dt><dd>{r.entries}</dd>
                <dt>Processing time</dt><dd>Set by the destination authority</dd>
              </dl>
              <div className="p"><Link className="btn btn-primary" href={`/visa/search/?purpose=${r.slug}`}>Check this route</Link></div>
            </div>
            <div className="facts">
              <div className="h">Other routes</div>
              <dl>{others.map((o) => <dd key={o.slug} style={{ marginTop: 12 }}><Link className="link arrow" href={`/visa/${o.slug}/`}>{o.name}</Link></dd>)}</dl>
            </div>
          </aside>
        </div>
      </section>
      <Cta />
    </>
  );
}
