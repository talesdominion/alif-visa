import Link from 'next/link';
export default function NotFound() {
  return (
    <section className="section"><div className="wrap" style={{ maxWidth: 640 }}>
      <span className="label">Page not found</span>
      <h1 style={{ fontSize: 40, margin: '10px 0 14px' }}>This page has moved or no longer exists.</h1>
      <p className="lead">Try checking your visa requirements, or go back to the homepage.</p>
      <div style={{ display: 'flex', gap: 12 }}><Link className="btn btn-primary" href="/visa/search/">Check requirements</Link><Link className="btn btn-ghost" href="/">Homepage</Link></div>
    </div></section>
  );
}
