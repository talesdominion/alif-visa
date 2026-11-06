import Link from 'next/link';
import SearchCard from '@/components/SearchCard';
import { Cta, FlightPath, Plane, SectionHead } from '@/components/ui';
import { destinations } from '@/data/destinations';
import { routes } from '@/data/routes';
import { services } from '@/data/services';
import { faqs } from '@/data/faqs';
import { getPosts, readingTime } from '@/lib/wp';

const steps = [
  { t: 'Check your route', d: 'Tell us your nationality, destination and reason for travel. We show the routes that apply and exactly what each one asks for.' },
  { t: 'Complete the form', d: 'Work through the form in your own time. Everything saves as you go, so you can pick it up again on any device.' },
  { t: 'Upload and review', d: 'Add documents against a checklist built for your application. A specialist reviews each one before submission.' },
  { t: 'Track to a decision', d: 'Follow every stage from submission to decision, and message your assigned agent whenever you have a question.' },
];

const reasons = [
  { t: 'Checked before it goes anywhere', d: 'A visa specialist reviews your application and tells you plainly if something is likely to cause a problem.' },
  { t: 'A checklist built for you', d: 'No generic lists. You get the documents your nationality, destination and purpose actually call for.' },
  { t: 'Private by default', d: 'Passports and personal records are visible only to you and the staff working on your file.' },
  { t: 'Always know where you are', d: 'A timeline shows the stage your application has reached and what needs to happen next.' },
];

export default async function Home() {
  const posts = (await getPosts(3)).slice(0, 3);
  return (
    <>
      <section className="hero">
        <FlightPath />
        <Plane />
        <div className="wrap hero-grid">
          <div>
            <span className="label">UK-registered visa assistance</span>
            <h1>Your visa, prepared properly. <em>Without the stress.</em></h1>
            <p className="lead">Check what your trip needs, prepare a complete file with a specialist, and follow it to a decision, 100% online.</p>
            <ul className="hero-points">
              <li><i className="tick" />Requirements by nationality</li>
              <li><i className="tick" />Specialist document review</li>
              <li><i className="tick" />Track every stage</li>
            </ul>
          </div>
          <SearchCard />
        </div>
      </section>

      <section className="trust" aria-label="Why travellers use Alif Visa">
        <div className="wrap">
          <div className="trust-item"><strong>Embassy-ready files</strong><span>Checklists matched to nationality, destination and purpose.</span></div>
          <div className="trust-item"><strong>One private account</strong><span>Travellers, documents, fees and messages on one file.</span></div>
          <div className="trust-item"><strong>A named specialist</strong><span>Every application has an agent you can message.</span></div>
          <div className="trust-item"><strong>Clear, separate fees</strong><span>Government fees are never mixed with ours.</span></div>
        </div>
      </section>

      <section className="section">
        <div className="wrap">
          <SectionHead label="Destinations" title="Popular visa destinations" text="Open a destination to see the visa routes available, what each one requires and how applications are assessed." action={<Link className="link arrow" href="/countries/">All destinations</Link>} />
          <div className="grid g4">
            {destinations.slice(0, 12).map((d) => (
              <Link key={d.slug} href={`/countries/${d.slug}/`} className="card dest">
                <img className="flag" src={`/flags/${d.code}.svg`} alt="" width={40} height={28} />
                <span><span className="name">{d.name}</span><br /><span className="region">{d.region}</span></span>
                <span className="go" aria-hidden="true">→</span>
              </Link>
            ))}
          </div>
        </div>
      </section>

      <section className="section wash">
        <div className="wrap">
          <SectionHead label="How it works" title="Four steps to a complete visa file" text="The same clear process for every destination, so you always know where you are and what happens next." />
          <div className="steps">
            {steps.map((s, i) => (
              <div className="step" key={s.t}>
                <span className="n">STEP {String(i + 1).padStart(2, '0')}</span>
                <h3>{s.t}</h3>
                <p>{s.d}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      <section className="section">
        <div className="wrap">
          <SectionHead label="Visa types" title="Visa routes that match your trip" text="Each category has its own evidence requirements. Choose the one that matches your reason for travel." action={<Link className="link arrow" href="/visa/">All visa types</Link>} />
          <div className="grid g3">
            {routes.slice(0, 6).map((r) => (
              <Link key={r.slug} href={`/visa/${r.slug}/`} className="card route">
                <span className="icon">{String(routes.findIndex((x) => x.slug === r.slug) + 1).padStart(2, '0')}</span>
                <h3>{r.name}</h3>
                <p>{r.short}</p>
                <span className="more arrow">View requirements</span>
              </Link>
            ))}
          </div>
        </div>
      </section>

      <section className="section wash">
        <div className="wrap split">
          <div>
            <span className="label">Why Alif Visa</span>
            <h2 style={{ fontSize: 'clamp(28px,3.4vw,40px)', margin: '10px 0 16px' }}>Visa assistance without the complexity</h2>
            <p className="lead">Applications are refused for avoidable reasons far more often than people expect: a missing statement, an inconsistent date, an unexplained gap. Our job is to remove those risks before you submit.</p>
            <p className="notice">Decisions are made solely by the issuing authority. Alif Visa does not guarantee, and cannot influence, the outcome of any application.</p>
          </div>
          <ul className="checklist">
            {reasons.map((r) => (
              <li key={r.t}><i className="tick" style={{ marginTop: 4 }} /><div><strong>{r.t}</strong><span>{r.d}</span></div></li>
            ))}
          </ul>
        </div>
      </section>

      <section className="section band">
        <div className="wrap">
          <SectionHead label="Travel services" title="The documents your visa file needs" text="Most refusals come down to supporting evidence rather than the form itself. These services make that evidence straightforward." action={<Link className="btn btn-ghost btn-sm" href="/services/">All travel services</Link>} />
          <div className="grid g3">
            {services.map((s) => (
              <Link key={s.slug} href={`/services/${s.slug}/`} className="card">
                <h3>{s.name}</h3>
                <p>{s.short}</p>
                <span className="more arrow" style={{ color: '#1FCE7C' }}>Learn more</span>
              </Link>
            ))}
          </div>
        </div>
      </section>

      <section className="section">
        <div className="wrap">
          <SectionHead label="Guides" title="Read this before you apply" text="Practical notes on documents, funding evidence and common routes, written for applicants." action={<Link className="link arrow" href="/blog/">All guides</Link>} />
          <div className="grid g3">
            {posts.map((p) => (
              <Link key={p.slug} href={`/${p.slug}/`} className="card post-card">
                <span className="meta">GUIDE · {readingTime(p)} MIN READ</span>
                <h3>{p.title}</h3>
                <p>{p.excerpt.slice(0, 140)}{p.excerpt.length > 140 ? '…' : ''}</p>
                <span className="more arrow">Read guide</span>
              </Link>
            ))}
          </div>
        </div>
      </section>

      <section className="section wash">
        <div className="wrap split">
          <div>
            <span className="label">Questions</span>
            <h2 style={{ fontSize: 'clamp(28px,3.4vw,40px)', margin: '10px 0 16px' }}>Visa application questions</h2>
            <p className="lead">If something here does not cover your situation, ask us. We would rather tell you early that a route is difficult than take an application we do not believe in.</p>
            <Link className="btn btn-ghost" href="/contact/">Ask a question</Link>
          </div>
          <div className="faq">
            {faqs.slice(0, 5).map((f) => (
              <details key={f.q}><summary>{f.q}</summary><p>{f.a}</p></details>
            ))}
          </div>
        </div>
      </section>

      <section className="section-tight">
        <div className="wrap split" style={{ alignItems: 'center' }}>
          <div>
            <span className="label">Already applied?</span>
            <h2 style={{ fontSize: 'clamp(26px,3vw,34px)', margin: '10px 0 12px' }}>Track an existing application</h2>
            <p className="muted" style={{ margin: 0 }}>Use the reference from your confirmation email, in the format ALF-2026-000123, and the email address on the application.</p>
          </div>
          <form className="search-card" action="/track-application/" method="get" style={{ boxShadow: 'none' }}>
            <div className="row2">
              <div className="field"><label htmlFor="ref">Application number</label><input id="ref" name="ref" placeholder="ALF-2026-000123" /></div>
              <div className="field"><label htmlFor="em">Email address</label><input id="em" name="email" type="email" placeholder="you@example.com" /></div>
            </div>
            <button className="btn btn-primary" type="submit">Track application</button>
          </form>
        </div>
      </section>

      <Cta />
    </>
  );
}
