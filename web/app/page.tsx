import Link from 'next/link';
import HeroSearch from '@/components/HeroSearch';
import HeroVisual from '@/components/HeroVisual';
import { SectionHead } from '@/components/ui';
import { destinations } from '@/data/destinations';
import { routes } from '@/data/routes';
import { services } from '@/data/services';
import { faqs } from '@/data/faqs';
import { site } from '@/data/site';
import { getPosts, readingTime } from '@/lib/wp';

const steps = [
  { t: 'Check your route', d: 'Tell us your nationality, destination and reason for travel. We show the routes that apply and what each one asks for.' },
  { t: 'Complete the form', d: 'Answer at your own pace. Everything saves as you go, so you can continue on any device.' },
  { t: 'Upload for review', d: 'Add documents against a checklist built for you. A specialist checks each one before submission.' },
  { t: 'Track to a decision', d: 'Follow every stage in your account and message your specialist whenever you need to.' },
];

const Check = () => (
  <svg viewBox="0 0 20 20" width="14" height="14" aria-hidden="true"><path d="m5 10.5 3 3 7-7" fill="none" stroke="currentColor" strokeWidth="2.2" strokeLinecap="round" strokeLinejoin="round" /></svg>
);

export default async function Home() {
  const posts = (await getPosts(3)).slice(0, 3);
  const ticker = [...destinations, ...destinations];
  return (
    <>
      {/* ───────────── HERO ───────────── */}
      <section className="h2-hero">
        <div className="h2-bg" aria-hidden="true" />
        <div className="wrap h2-grid">
          <div className="h2-copy">
            <span className="h2-eyebrow"><i />UK-registered visa specialists · Every nationality</span>
            <h1>
              Visas, handled
              <br />
              with <span className="h2-accent">care<svg viewBox="0 0 200 14" preserveAspectRatio="none" aria-hidden="true"><path d="M2 10 C 50 2, 150 2, 198 8" fill="none" stroke="currentColor" strokeWidth="3" strokeLinecap="round" /></svg></span>.
            </h1>
            <p className="h2-lead">
              Check what your trip needs, prepare a complete file with a dedicated specialist, and follow it to a decision. All online, for travellers of every nationality.
            </p>
            <div className="h2-ctas">
              <Link className="btn btn-primary btn-lg" href="/apply/">Start your application</Link>
              <Link className="btn btn-ghost btn-lg" href="/track-application/">Track an application</Link>
            </div>
            <ul className="h2-proof">
              <li><span className="h2-ic"><Check /></span>Specialist review before submission</li>
              <li><span className="h2-ic"><Check /></span>Government fees shown separately</li>
              <li><span className="h2-ic"><Check /></span>Private, encrypted document storage</li>
            </ul>
          </div>
          <HeroVisual />
        </div>
        <div className="wrap h2-search">
          <HeroSearch />
          <p className="h2-fine">Free to check · No account needed · Results in seconds</p>
        </div>
      </section>

      {/* ───────────── DESTINATION TICKER ───────────── */}
      <section className="tick-band" aria-label="Popular destinations">
        <div className="tick-label">Popular destinations</div>
        <div className="tick-track">
          <div className="tick-row">
            {ticker.map((d, i) => (
              <Link key={d.slug + i} href={`/countries/${d.slug}/`} className="tick-item" tabIndex={i >= destinations.length ? -1 : 0}>
                <img src={`/flags/${d.code}.svg`} alt="" width={26} height={18} />
                {d.name}
              </Link>
            ))}
          </div>
        </div>
      </section>

      {/* ───────────── WHY (BENTO) ───────────── */}
      <section className="section">
        <div className="wrap">
          <SectionHead label="Why Alif Visa" title="Built to remove the reasons visas get refused" text="Applications fail for avoidable reasons: a missing statement, a date that does not match, an unexplained gap. We find those before an officer does." />
          <div className="bento">
            <article className="bx bx-review">
              <span className="label">Specialist review</span>
              <h3>Every document checked before it goes anywhere</h3>
              <p>Your specialist reviews each upload against the rules for your route and tells you plainly what to fix.</p>
              <div className="bx-ui">
                <div className="bx-doc ok"><span className="bx-dot" />Bank statement · 6 months<em>Approved</em></div>
                <div className="bx-doc ok"><span className="bx-dot" />Employer letter<em>Approved</em></div>
                <div className="bx-doc fix"><span className="bx-dot" />Hotel booking<em>Dates don’t match flights</em></div>
              </div>
            </article>
            <article className="bx bx-check">
              <span className="label">Your checklist</span>
              <h3>Made for your nationality, destination and purpose</h3>
              <p>No generic lists. Only the documents your trip actually calls for.</p>
            </article>
            <article className="bx bx-fees">
              <span className="label">Clear pricing</span>
              <h3>Fees you can understand</h3>
              <div className="bx-fee"><span>Government fee</span><span>Paid to the authority</span></div>
              <div className="bx-fee"><span>Alif Visa service</span><span>Shown separately</span></div>
            </article>
            <article className="bx bx-private bx-dark">
              <span className="label">Private by default</span>
              <h3>Your passport stays between you and your specialist</h3>
              <p>Encrypted uploads and private storage, visible only to you and the staff on your file.</p>
            </article>
            <article className="bx bx-track">
              <span className="label">Always informed</span>
              <h3>See exactly where your file is</h3>
              <div className="bx-bar"><span style={{ width: '62%' }} /></div>
              <p className="small muted" style={{ margin: '10px 0 0' }}>Stage 3 of 5 · Ready for submission</p>
            </article>
          </div>
          <p className="notice" style={{ marginTop: 22 }}>Decisions are made solely by the issuing authority. Alif Visa does not guarantee, and cannot influence, the outcome of any application.</p>
        </div>
      </section>

      {/* ───────────── HOW IT WORKS ───────────── */}
      <section className="section wash">
        <div className="wrap">
          <SectionHead label="How it works" title="From first question to final decision" text="The same clear process for every destination, so you always know what happens next." />
          <ol className="flow">
            {steps.map((s, i) => (
              <li key={s.t}>
                <span className="flow-n">{String(i + 1).padStart(2, '0')}</span>
                <h3>{s.t}</h3>
                <p>{s.d}</p>
              </li>
            ))}
          </ol>
        </div>
      </section>

      {/* ───────────── DESTINATIONS ───────────── */}
      <section className="section">
        <div className="wrap">
          <SectionHead label="Destinations" title="Where are you travelling?" text="Open a destination to see its visa routes, what each one requires and how applications are assessed." action={<Link className="link arrow" href="/countries/">All destinations</Link>} />
          <div className="dest2">
            {destinations.slice(0, 9).map((d, i) => (
              <Link key={d.slug} href={`/countries/${d.slug}/`} className={`d2${i === 0 ? ' d2-lg' : ''}`}>
                <img className="d2-flag" src={`/flags/${d.code}.svg`} alt="" />
                <span className="d2-region">{d.region}</span>
                <strong>{d.name}</strong>
                <span className="d2-sum">{d.summary}</span>
                <span className="d2-meta">{d.routes.length} visa routes <span className="arrow" /></span>
              </Link>
            ))}
          </div>
        </div>
      </section>

      {/* ───────────── VISA TYPES ───────────── */}
      <section className="section wash">
        <div className="wrap split">
          <div>
            <span className="label">Visa types</span>
            <h2 className="h2-title">A route for every reason to travel</h2>
            <p className="lead">Each visa type has its own evidence rules. Pick the one that matches your trip, or let the search choose for you.</p>
            <Link className="btn btn-primary" href="/visa/search/">Find my visa</Link>
          </div>
          <div className="rlist">
            {routes.map((r) => (
              <Link key={r.slug} href={`/visa/${r.slug}/`} className="rrow">
                <div><strong>{r.name}</strong><span>{r.short}</span></div>
                <span className="rrow-go" aria-hidden="true">→</span>
              </Link>
            ))}
          </div>
        </div>
      </section>

      {/* ───────────── SERVICES ───────────── */}
      <section className="section band">
        <div className="wrap">
          <SectionHead label="Travel services" title="Everything your visa file needs, in one place" text="Most refusals come down to supporting evidence, not the form. These services make that evidence simple." action={<Link className="btn btn-ghost btn-sm" href="/services/">All travel services</Link>} />
          <div className="grid g3">
            {services.map((s, i) => (
              <Link key={s.slug} href={`/services/${s.slug}/`} className="card svc">
                <span className="svc-n">{String(i + 1).padStart(2, '0')}</span>
                <h3>{s.name}</h3>
                <p>{s.short}</p>
                <span className="more arrow" style={{ color: '#1FCE7C' }}>Learn more</span>
              </Link>
            ))}
          </div>
        </div>
      </section>

      {/* ───────────── GUIDES ───────────── */}
      <section className="section">
        <div className="wrap">
          <SectionHead label="Guides" title="Read this before you apply" text="Practical, plain-English guides on documents, funds, interviews and refusals." action={<Link className="link arrow" href="/blog/">All guides</Link>} />
          <div className="grid g3">
            {posts.map((p) => (
              <Link key={p.slug} href={`/${p.slug}/`} className="card post-card">
                <span className="meta">GUIDE · {readingTime(p)} MIN READ</span>
                <h3>{p.title}</h3>
                <p>{p.excerpt.slice(0, 130)}{p.excerpt.length > 130 ? '…' : ''}</p>
                <span className="more arrow">Read guide</span>
              </Link>
            ))}
          </div>
        </div>
      </section>

      {/* ───────────── FAQ ───────────── */}
      <section className="section wash">
        <div className="wrap split">
          <div>
            <span className="label">Questions</span>
            <h2 className="h2-title">Answers before you apply</h2>
            <p className="lead">If your situation is not covered here, ask us. We would rather tell you early that a route is difficult than take an application we do not believe in.</p>
            <div style={{ display: 'flex', gap: 10, flexWrap: 'wrap' }}>
              <Link className="btn btn-ghost" href="/contact/">Ask a question</Link>
              <a className="btn btn-ghost" href={site.whatsapp} target="_blank" rel="noopener noreferrer">WhatsApp us</a>
            </div>
          </div>
          <div className="faq">
            {faqs.map((f) => (
              <details key={f.q}><summary>{f.q}</summary><p>{f.a}</p></details>
            ))}
          </div>
        </div>
      </section>

      {/* ───────────── FINAL CTA ───────────── */}
      <section className="final">
        <svg className="final-path" viewBox="0 0 1200 400" preserveAspectRatio="none" aria-hidden="true">
          <path d="M-20 380 C 300 360, 700 260, 1120 40" fill="none" stroke="#1FCE7C" strokeOpacity=".35" strokeWidth="1.5" strokeDasharray="5 8" />
        </svg>
        <img className="final-plane" src="/brand/plane.png" alt="" aria-hidden="true" />
        <div className="wrap final-in">
          <span className="label">Start today</span>
          <h2>Your next trip starts with a complete file.</h2>
          <p>Check your requirements in seconds, or start your application now. A specialist will be with you at every step.</p>
          <div className="h2-ctas" style={{ justifyContent: 'center' }}>
            <Link className="btn btn-accent btn-lg" href="/apply/">Start your application</Link>
            <Link className="btn btn-ghost btn-lg" href="/visa/search/">Check requirements</Link>
          </div>
        </div>
      </section>
    </>
  );
}
