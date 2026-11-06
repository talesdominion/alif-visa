import Link from 'next/link';
import { notFound } from 'next/navigation';
import { Cta, PageHead } from '@/components/ui';
import { serviceBySlug, services } from '@/data/services';

export const dynamicParams = false;
export function generateStaticParams() { return services.map((s) => ({ slug: s.slug })); }
export async function generateMetadata({ params }: { params: Promise<{ slug: string }> }) {
  const s = serviceBySlug((await params).slug);
  return { title: s?.name ?? 'Travel service', description: s?.short };
}

export default async function Service({ params }: { params: Promise<{ slug: string }> }) {
  const s = serviceBySlug((await params).slug);
  if (!s) notFound();
  return (
    <>
      <PageHead label="Travel service" title={s.name} lead={s.intro} crumbs={[{ label: 'Travel services', href: '/services/' }, { label: s.name }]} />
      <section className="section-tight">
        <div className="wrap layout">
          <div>
            <h2 style={{ fontSize: 26, marginBottom: 10 }}>What&apos;s included</h2>
            <ul className="checklist">{s.includes.map((i) => <li key={i}><i className="tick" style={{ marginTop: 3 }} /><div><strong>{i}</strong></div></li>)}</ul>
            <h2 style={{ fontSize: 26, margin: '40px 0 10px' }}>How it works with your application</h2>
            <p className="prose" style={{ fontSize: 16.5 }}>This service is added alongside your visa application. Once requested, a member of our team confirms the details with you and adds the resulting documents to your application file, ready for review.</p>
          </div>
          <aside className="aside">
            <div className="facts">
              <div className="h">Add {s.name.toLowerCase()}</div>
              <dl><dt>Available with</dt><dd>Any Alif Visa application</dd><dt>Questions?</dt><dd>Our team replies on working days</dd></dl>
              <div className="p" style={{ display: 'grid', gap: 10 }}><Link className="btn btn-primary" href="/apply/">Start an application</Link><Link className="btn btn-ghost" href="/contact/">Talk to us</Link></div>
            </div>
          </aside>
        </div>
      </section>
      <Cta />
    </>
  );
}
