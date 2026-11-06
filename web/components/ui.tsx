import Link from 'next/link';
import { site } from '@/data/site';

export function Plane({ className }: { className?: string }) {
  return <img src="/brand/plane.png" alt="" aria-hidden="true" className={className ?? 'plane'} />;
}

/** The dashed flight path from the letterhead. */
export function FlightPath() {
  return (
    <svg className="flight" viewBox="0 0 1200 600" preserveAspectRatio="none" aria-hidden="true">
      <path d="M -20 560 C 300 520, 700 420, 1110 120" fill="none" stroke="#16A974" strokeOpacity=".22" strokeWidth="1.4" strokeDasharray="5 8" />
    </svg>
  );
}

export function Crumbs({ items }: { items: { label: string; href?: string }[] }) {
  return (
    <nav className="crumbs" aria-label="Breadcrumb">
      <Link href="/">Home</Link>
      {items.map((c) => (
        <span key={c.label} style={{ display: 'contents' }}>
          <span aria-hidden="true">/</span>
          {c.href ? <Link href={c.href}>{c.label}</Link> : <span aria-current="page">{c.label}</span>}
        </span>
      ))}
    </nav>
  );
}

export function PageHead({ label, title, lead, crumbs, children }: { label?: string; title: string; lead?: string; crumbs?: { label: string; href?: string }[]; children?: React.ReactNode }) {
  return (
    <header className="page-head">
      <Plane />
      <div className="wrap">
        {crumbs && <Crumbs items={crumbs} />}
        {children}
        {label && <span className="label">{label}</span>}
        <h1>{title}</h1>
        {lead && <p className="lead">{lead}</p>}
        <div className="rule" />
      </div>
    </header>
  );
}

export function SectionHead({ label, title, text, action }: { label: string; title: string; text?: string; action?: React.ReactNode }) {
  return (
    <div className="section-head">
      <div>
        <span className="label">{label}</span>
        <h2>{title}</h2>
        {text && <p>{text}</p>}
      </div>
      {action}
      <div className="rule" />
    </div>
  );
}

export function Cta({ title = 'Ready to start your visa application?', text = 'Check the requirements first, or start your application now. Either way, it takes a few minutes.' }: { title?: string; text?: string }) {
  return (
    <section className="section-tight">
      <div className="wrap">
        <div className="cta">
          <Plane />
          <div>
            <span className="label">Start today</span>
            <h2>{title}</h2>
            <p>{text}</p>
          </div>
          <div className="buttons">
            <Link className="btn btn-ghost" href="/visa/search/">Check requirements</Link>
            <Link className="btn btn-primary" href="/apply/">Start application</Link>
          </div>
        </div>
      </div>
    </section>
  );
}

export function Disclaimer() {
  return (
    <p className="notice">
      {site.name} is a private visa assistance company. We are not affiliated with any government, embassy or visa application centre, and no agency can guarantee the outcome of an application. Government fees are set by the destination authority and shown separately from our service fee.
    </p>
  );
}
