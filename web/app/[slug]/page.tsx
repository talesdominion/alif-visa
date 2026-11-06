import Link from 'next/link';
import { notFound } from 'next/navigation';
import { Cta, PageHead } from '@/components/ui';
import { getPost, getPostSlugs, getPosts, readingTime } from '@/lib/wp';

// WordPress posts keep their existing URLs (alifvisa.com/<slug>/),
// so rankings and backlinks carry over unchanged.
export const revalidate = 600;
export async function generateStaticParams() { return (await getPostSlugs()).map((slug) => ({ slug })); }
export async function generateMetadata({ params }: { params: Promise<{ slug: string }> }) {
  const p = await getPost((await params).slug);
  return p ? { title: p.title, description: p.excerpt } : {};
}

export default async function PostPage({ params }: { params: Promise<{ slug: string }> }) {
  const p = await getPost((await params).slug);
  if (!p) notFound();
  const more = (await getPosts(8)).filter((x) => x.slug !== p.slug).slice(0, 3);
  return (
    <>
      <PageHead label={`Guide · ${readingTime(p)} min read · Updated ${new Date(p.date).toLocaleDateString('en-GB', { day: 'numeric', month: 'long', year: 'numeric' })}`} title={p.title} lead={p.excerpt} crumbs={[{ label: 'Guides', href: '/blog/' }, { label: p.title }]} />
      <section className="section-tight">
        <div className="wrap layout">
          <article className="prose" dangerouslySetInnerHTML={{ __html: p.content }} />
          <aside className="aside">
            <div className="facts">
              <div className="h">Need help with your file?</div>
              <div className="p" style={{ paddingTop: 14 }}>
                <p className="muted small">A specialist can review your documents before you submit, so avoidable problems are fixed first.</p>
                <div style={{ display: 'grid', gap: 10 }}><Link className="btn btn-primary" href="/visa/search/">Check requirements</Link><Link className="btn btn-ghost" href="/contact/">Talk to us</Link></div>
              </div>
            </div>
            <div className="facts">
              <div className="h">More guides</div>
              <dl>{more.map((m) => <dd key={m.slug} style={{ marginTop: 12, lineHeight: 1.4 }}><Link className="link" href={`/${m.slug}/`}>{m.title}</Link></dd>)}</dl>
            </div>
          </aside>
        </div>
      </section>
      <Cta />
    </>
  );
}
