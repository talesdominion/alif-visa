import Link from 'next/link';
import { Cta, PageHead } from '@/components/ui';
import { getPosts, readingTime } from '@/lib/wp';

export const metadata = { title: 'Visa guides and articles', description: 'Practical visa guides on documents, funds, interviews, refusals and travel rules.' };

export default async function Blog() {
  const posts = await getPosts(24);
  const [first, ...rest] = posts;
  return (
    <>
      <PageHead label="Guides" title="Visa guides and articles" lead="Practical notes on documents, funding evidence, interviews and common routes, written for applicants." crumbs={[{ label: 'Guides' }]} />
      <section className="section-tight">
        <div className="wrap">
          {first && (
            <Link href={`/${first.slug}/`} className="card post-card" style={{ padding: 36, marginBottom: 24, background: 'linear-gradient(120deg,#fff,var(--wash))' }}>
              <span className="meta">LATEST GUIDE · {readingTime(first)} MIN READ</span>
              <h3 style={{ fontSize: 'clamp(24px,3vw,32px)', maxWidth: '24ch' }}>{first.title}</h3>
              <p style={{ maxWidth: '70ch', fontSize: 16.5 }}>{first.excerpt}</p>
              <span className="more arrow">Read guide</span>
            </Link>
          )}
          <div className="grid g3">
            {rest.map((p) => (
              <Link key={p.slug} href={`/${p.slug}/`} className="card post-card">
                <span className="meta">GUIDE · {readingTime(p)} MIN READ</span>
                <h3>{p.title}</h3>
                <p>{p.excerpt.slice(0, 150)}{p.excerpt.length > 150 ? '…' : ''}</p>
                <span className="more arrow">Read guide</span>
              </Link>
            ))}
          </div>
        </div>
      </section>
      <Cta />
    </>
  );
}
